<?php

namespace App\Services;

use App\Http\Requests\Test\GenerateTestRequest;
use App\Repositories\DifficultyRepository;
use Illuminate\Http\Request;
use App\Http\Resources\Quest\QuestResource;
use App\Repositories\QuestRepository;
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
        $questions = $this->generateRandomQuestions($countArr, $topic->id, $request->difficulty);
        if ($questions instanceof Response)
            return $questions;

        $data = $this->prepareResponseData($questions, $topic->topic, $request->title, $request->difficulty);
        return response($data, 200);
    }

    protected function getQuestionCounts(Request $request): array
    {
        $counts = [
            'fillCount' => $request->input('fillCount', null),
            'choiceCount' => $request->input('choiceCount', null),
            'blankCount' => $request->input('blankCount', null),
            'relationCount' => $request->input('relationCount', null)
        ];

        if (
            !$request->filled('fillCount') and
            !$request->filled('choiceCount') and
            !$request->filled('blankCount') and
            !$request->filled('relationCount')
        ) return $this->divideQuestionsIntoParts($request->overCount);

        // Находим поля с нулевыми значениями и поля с null
        $zeroFields = [];
        $nullFields = [];

        foreach ($counts as $key => $value) {
            if ($value === '0') {
                $zeroFields[] = $key;
            } elseif ($value === null) {
                $nullFields[] = $key;
            }
        }

        if (!empty($nullFields) and count($zeroFields) + count($nullFields) == 4)
            return $this->divideQuestionsIntoParts($request->overCount, $nullFields);

        return array_map(function ($value) {
            return (int) $value ?? 0;
        }, $counts);
    }

    protected function divideQuestionsIntoParts(int $totalQuestions, array $fieldsToDistribute = null): array
    {
        // Список всех возможных полей
        $allFields = ['fillCount', 'choiceCount', 'blankCount', 'relationCount'];

        // Если fieldsToDistribute не указан, используем все поля
        if (is_null($fieldsToDistribute) or empty($fieldsToDistribute)) {
            $fieldsToDistribute = $allFields;
        }

        // Количество полей для распределения
        $parts = count($fieldsToDistribute);

        // Расчет базовой части и остатка
        $basePart = intdiv($totalQuestions, $parts);
        $remainder = $totalQuestions % $parts;

        // Инициализируем все поля как 0
        $counts = array_fill_keys($allFields, 0);

        // Распределяем базовую часть
        foreach ($fieldsToDistribute as $field) {
            $counts[$field] = $basePart;
        }

        // Распределяем остаток
        for ($i = 0; $i < $remainder; $i++) {
            $field = $fieldsToDistribute[$i % $parts];
            $counts[$field]++;
        }
        return $counts;
    }

    protected function generateRandomQuestions(array $countArr, int $topicId, ?string $difficulty): Collection|Response
    {
        $errors = []; // Массив для накопления ошибок

        $fill = QuestRepository::getQuest('fill', $countArr['fillCount'], $topicId, $difficulty);
        $this->checkQuestCount($fill, $countArr['fillCount'], 'fill', $errors);
        $choice = QuestRepository::getQuest('choice', $countArr['choiceCount'], $topicId, $difficulty);
        $this->checkQuestCount($choice, $countArr['choiceCount'], 'choice', $errors);
        $blank = QuestRepository::getQuest('blank', $countArr['blankCount'], $topicId, $difficulty);
        $this->checkQuestCount($blank, $countArr['blankCount'], 'blank', $errors);
        $relation = QuestRepository::getQuest('relation', $countArr['relationCount'], $topicId, $difficulty);
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

    protected function checkQuestCount(Collection $questions, int $expectedCount, string $type, array &$errors): void
    {
        if ($questions->count() < $expectedCount) {
            $errors[] = "Недостаточно вопросов типа '$type'. Ожидалось: $expectedCount, найдено: {$questions->count()}";
        }
    }

    protected function prepareResponseData(Collection $questions, string $topic, ?string $title, ?string $difficulty): array
    {
        $data = [
            'quest' => new QuestResource($questions),
            'topic' => $topic,
        ];

        if ($title !== null) {
            $data['title'] = $title;
        }

        if ($difficulty !== null) {
            $data['difficulty'] = $difficulty;
        }

        return $data;
    }
}
