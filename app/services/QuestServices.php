<?php

namespace App\Services;

use App\Http\Requests\Quest\CreateQuestRequest;
use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Http\Resources\Test\BlankResource;
use App\Http\Resources\Test\ChoiceResource;
use App\Http\Resources\Test\FillResource;
use App\Http\Resources\Test\RelationResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use App\Models\Topic;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use stdClass;

class QuestServices
{
    public function reGenerate(GenerateQuestRequest $request): Response
    {
        // определяем тип
        $types = ['fill', 'blank', 'choice', 'relation'];
        $type = $request->has('type') ? $request->type : $types[array_rand($types)];

        // получаем вопрос
        $quest = $this->switchQuest($type, $request->topic);
        if ($quest instanceof Response) return $quest;

        // переполучаем вопрос если он уже есть на странице
        if ($request->has('ids')) {
            while (in_array($quest->id, $request->ids)) {
                $quest = $this->switchQuest($type, $request->topic);
                if ($quest instanceof Response) return $quest;
            }
        }
        return response(['status' => true, 'quest' => json_decode(json_encode($quest), true)]);
    }

    public function switchQuest($type, $topic): BlankResource|ChoiceResource|FillResource|RelationResource|Response
    {
        switch ($type) {
            case 'fill':
                $question = $this->getQuest(FillQuest::class, $topic);
                if ($question instanceof Response) return $question;
                return new FillResource($question);
            case 'blank':
                $question = $this->getQuest(BlankQuest::class, $topic);
                if ($question instanceof Response) return $question;
                return new BlankResource($question);
            case 'choice':
                $question = $this->getQuest(ChoiceQuest::class, $topic);
                if ($question instanceof Response) return $question;
                return new ChoiceResource($question);
            case 'relation':
                $question = $this->getQuest(RelationQuest::class, $topic);
                if ($question instanceof Response) return $question;
                return new RelationResource($question);
            default:
                return response(['status' => false, 'error' => 'unknown type quest'], 400);
        }
    }

    protected function getQuest(string $model, string $topic): Response|stdClass
    {
        $topic = Topic::query()
            ->where('topic', $topic)
            ->first();
        if ($topic == null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $question = $model::query()
            ->where('topic_id', $topic->id)
            ->inRandomOrder()
            ->first();

        $type = $question->type();
        $question = json_decode(json_encode($question));
        $question->type = $type;
        return $question;
    }

    public function create(CreateQuestRequest $request): Response
    {
        $topic = Topic::query()
            ->where('topic', $request->topic)
            ->first();
        if ($topic == null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $model = null;
        switch ($request->type) {
            case 'fill':
                $model = $this->createFill($topic->id, $request->quest);
                $model = new FillResource($model);
                break;
            case 'blank':
                $data = $request->only(['quest', 'correct']);
                $model = $this->createQuest(BlankQuest::class, $data, $topic->id);
                $model = new BlankResource($model);
                break;
            case 'choice':
                $data = $request->only(['quest', 'correct', 'uncorrect']);
                if (count($data['correct']) > 1) $data['is_multiple'] = true;
                $model = $this->createQuest(ChoiceQuest::class, $data, $topic->id);
                $model = new ChoiceResource($model);
                break;
            case 'relation':
                $data = $request->only(['quest', 'first_column', 'second_column']);
                $model = $this->createQuest(RelationQuest::class, $data, $topic->id);
                $model = new RelationResource($model);
                break;
            default:
                return response(['status' => false, 'error' => 'unknown type'], 400);
        }

        return response(['status' => true, 'quest' => $model]);
    }

    protected function createQuest(string $model, array $data, int $topic): ChoiceQuest|BlankQuest|RelationQuest
    {
        $data = $this->jsonChildren($data);
        $data['topic_id'] = $topic;
        $return = $model::create($data);
        $return->type = $return->type();
        return $return;
    }

    protected function createFill(int $topic, string $quest): FillQuest
    {
        // Регулярное выражение для поиска тегов
        $pattern = '/<([^>]+)>/';

        // Инициализация счетчика и массива для удалённых тегов
        $counter = 0;
        $removedTags = [];

        // Замена тегов на s?:n и сохранение удалённых тегов в нужном формате
        $quest = preg_replace_callback($pattern, function ($matches) use (&$counter, &$removedTags) {
            // Разделяем содержимое тега по ";"
            $tagContent = explode(';', $matches[1]);

            // Преобразуем каждую строку в теге в нужный формат
            $formattedTag = array_map(function ($index, $str) {
                return [
                    'str' => $str,
                    'correct' => $index === 0, // Первая строка помечается как "correct": true
                ];
            }, array_keys($tagContent), $tagContent);

            // Добавляем в массив удалённых тегов
            $removedTags[] = $formattedTag;

            // Возвращаем замену s?:n
            return 's?:' . $counter++;
        }, $quest);

        $return = FillQuest::create([
            'quest' => $quest,
            'options' => json_encode($removedTags),
            'topic_id' => $topic,
        ]);
        $return->type = $return->type();
        return $return;
    }

    protected function jsonChildren(array $arr): array
    {
        foreach ($arr as &$item) {
            if (is_array($item))
                $item = json_encode($item);
        }
        return $arr;
    }
}
