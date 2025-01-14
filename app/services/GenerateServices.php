<?php

namespace App\Services;

use App\Http\Requests\Test\GenerateTestRequest;
use App\Http\Resources\Test\QuestResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GenerateServices
{
    public function generateTest(GenerateTestRequest $request): Response
    {
        $topic = Topic::query()->where('topic', $request->topic)->first();
        if ($topic == null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $countQuest = $request->overCount;
        if (!$request->has('fillCount') and !$request->has('choiceCount') and !$request->has('blankCount') and !$request->has('relationCount')) {
            $part = $this->divideIntoParts($countQuest, 4);
            $countArr = [
                'fillCount' => $part[0],
                'choiceCount' => $part[1],
                'blankCount' => $part[2],
                'relationCount' => $part[3]
            ];
        } else {
            $countArr = [
                'fillCount' => $request->input('fillCount', 0),
                'choiceCount' => $request->input('choiceCount', 0),
                'blankCount' => $request->input('blankCount', 0),
                'relationCount' => $request->input('relationCount', 0)
            ];
        }

        $fill = $this->getQuest('fill', $countArr['fillCount'], $topic->id);
        $choice = $this->getQuest('choice', $countArr['choiceCount'], $topic->id);
        $blank = $this->getQuest('blank', $countArr['blankCount'], $topic->id);
        $relation = $this->getQuest('relation', $countArr['relationCount'], $topic->id);

        $response = collect()
            ->merge($fill)
            ->merge($choice)
            ->merge($blank)
            ->merge($relation)
            ->shuffle();

        $data = [
            'quest' => new QuestResource($response),
            'topic' => $topic->topic
        ];
        if ($request->has('title')) $data['title'] = $request->title;
        return response($data, 200);
    }

    protected function divideIntoParts(int $number, int $count): array
    {
        $basePart = intdiv($number, $count);
        // Вычисляем остаток
        $remainder = $number % $count;

        // Создаем массив с элементами, заполненными базовой частью
        $parts = array_fill(0, $count, $basePart);

        // Распределяем остаток случайным образом
        for ($i = 0; $i < $remainder; $i++) {
            $randomIndex = rand(0, $count - 1); // Выбираем случайный индекс
            $parts[$randomIndex]++; // Увеличиваем значение элемента с этим индексом на 1
        }

        return $parts;
    }

    protected function getQuest(string $type, int $count, int $topic): Collection
    {
        $quests = DB::table($type . '_quests')
            ->where('topic_id', $topic)
            ->where('vis', true)
            ->inRandomOrder()
            ->take($count)
            ->get()
            ->map(function ($question) use ($type) {
                $question->type = $type;
                return $question;
            });
        return $quests;
    }
}
