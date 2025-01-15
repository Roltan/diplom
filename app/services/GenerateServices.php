<?php

namespace App\Services;

use App\Http\Requests\Test\GenerateTestRequest;
use App\Http\Resources\Test\QuestResource;
use App\Models\Topic;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GenerateServices
{
    public function generateTest(GenerateTestRequest $request): Response
    {
        $topic = $this->getTopicByRequest($request);
        if ($topic === null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $countArr = $this->getQuestionCounts($request);
        $questions = $this->generateRandomQuestions($countArr, $topic->id);

        $data = $this->prepareResponseData($questions, $topic->topic, $request->title);
        return response($data, 200);
    }

    protected function getTopicByRequest(GenerateTestRequest $request): ?Topic
    {
        return Topic::query()->where('topic', $request->topic)->first();
    }

    protected function getQuestionCounts(GenerateTestRequest $request): array
    {
        if (!$request->has('fillCount') && !$request->has('choiceCount') && !$request->has('blankCount') && !$request->has('relationCount'))
            return $this->divideQuestionsIntoParts($request->overCount, 4);

        return [
            'fillCount' => $request->input('fillCount', 0),
            'choiceCount' => $request->input('choiceCount', 0),
            'blankCount' => $request->input('blankCount', 0),
            'relationCount' => $request->input('relationCount', 0),
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

    protected function generateRandomQuestions(array $countArr, int $topicId): Collection
    {
        $fill = $this->getQuest('fill', $countArr['fillCount'], $topicId);
        $choice = $this->getQuest('choice', $countArr['choiceCount'], $topicId);
        $blank = $this->getQuest('blank', $countArr['blankCount'], $topicId);
        $relation = $this->getQuest('relation', $countArr['relationCount'], $topicId);

        return collect()
            ->merge($fill)
            ->merge($choice)
            ->merge($blank)
            ->merge($relation)
            ->shuffle();
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

    protected function getQuest(string $type, int $count, int $topicId): Collection
    {
        return DB::table($type . '_quests')
            ->where('topic_id', $topicId)
            ->where('vis', true)
            ->inRandomOrder()
            ->take($count)
            ->get()
            ->map(function ($question) use ($type) {
                $question->type = $type;
                return $question;
            });
    }
}
