<?php

namespace App\Services;

use App\Http\Requests\Test\GenerateTestRequest;
use App\Repositories\DifficultyRepository;
use Illuminate\Http\Request;
use App\Http\Resources\Quest\QuestResource;
use App\Repositories\TopicRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GenerateServices
{
    public function generateTest(GenerateTestRequest $request): Response
    {
        $topic = TopicRepository::findByRequest($request);
        if ($topic === null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $countArr = $this->getQuestionCounts($request);
        $questions = $this->generateRandomQuestions($countArr, $topic->id, $request->input('difficulty'));
        if ($questions instanceof Response)
            return $questions;

        $data = $this->prepareResponseData($questions, $topic->topic, $request->title);
        return response($data, 200);
    }

    protected function getQuestionCounts(Request $request): array
    {
        if (!$request->has('fillCount') && !$request->has('choiceCount') && !$request->has('blankCount') && !$request->has('relationCount'))
            return $this->divideQuestionsIntoParts($request->overCount, 4);

        return [
            'fillCount' => $request->filled('fillCount') ? (int) $request->input('fillCount') : 0,
            'choiceCount' => $request->filled('choiceCount') ? (int) $request->input('choiceCount') : 0,
            'blankCount' => $request->filled('blankCount') ? (int) $request->input('blankCount') : 0,
            'relationCount' => $request->filled('relationCount') ? (int) $request->input('relationCount') : 0
        ];
    }

    protected function divideQuestionsIntoParts(int $totalQuestions, int $parts): array
    {
        $basePart = intdiv($totalQuestions, $parts);
        $remainder = $totalQuestions % $parts;

        $counts = array_fill(0, $parts, $basePart);
        for ($i = 0; $i < $remainder; $i++) {
            $randomIndex = rand(0, $parts - 1);
            $counts[$randomIndex]++;
        }

        return [
            'fillCount' => $counts[0],
            'choiceCount' => $counts[1],
            'blankCount' => $counts[2],
            'relationCount' => $counts[3],
        ];
    }

    protected function generateRandomQuestions(array $countArr, int $topicId, ?string $difficulty): Collection|Response
    {
        $errors = []; // Массив для накопления ошибок

        $fill = $this->getQuest('fill', $countArr['fillCount'], $topicId, $difficulty);
        $this->checkQuestCount($fill, $countArr['fillCount'], 'fill', $errors);
        $choice = $this->getQuest('choice', $countArr['choiceCount'], $topicId, $difficulty);
        $this->checkQuestCount($choice, $countArr['choiceCount'], 'choice', $errors);
        $blank = $this->getQuest('blank', $countArr['blankCount'], $topicId, $difficulty);
        $this->checkQuestCount($blank, $countArr['blankCount'], 'blank', $errors);
        $relation = $this->getQuest('relation', $countArr['relationCount'], $topicId, $difficulty);
        $this->checkQuestCount($relation, $countArr['relationCount'], 'relation', $errors);

        // Если есть ошибки, выбрасываем исключение с объединённым сообщением
        if (!empty($errors))
            return response(['error' => implode("\n", $errors)], 500);

        return collect()
            ->merge($fill)
            ->merge($choice)
            ->merge($blank)
            ->merge($relation)
            ->shuffle();
    }

    protected function getQuest(string $type, int $count, int $topicId, ?string $difficulty): Collection
    {
        $difficultyRange = DifficultyRepository::getRangeByTitle($difficulty);

        return DB::table($type . '_quests')
            ->where('topic_id', $topicId)
            ->where('vis', true)
            ->whereBetween('difficulty', $difficultyRange)
            ->inRandomOrder()
            ->take($count)
            ->get()
            ->map(function ($question) use ($type) {
                $question->type = $type;
                return $question;
            });
    }

    protected function checkQuestCount(Collection $questions, int $expectedCount, string $type, array &$errors): void
    {
        if ($questions->count() < $expectedCount) {
            $errors[] = "Недостаточно вопросов типа '$type'. Ожидалось: $expectedCount, найдено: {$questions->count()}";
        }
    }

    protected function prepareResponseData(Collection $questions, string $topic, ?string $title): array
    {
        $data = [
            'quest' => new QuestResource($questions),
            'topic' => $topic,
        ];

        if ($title !== null) {
            $data['title'] = $title;
        }

        return $data;
    }
}
