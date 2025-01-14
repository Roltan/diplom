<?php

namespace App\Services;

use App\Http\Requests\Test\CreateTestRequest;
use App\Http\Resources\Test\TestResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\QuestsTest;
use App\Models\RelationQuest;
use App\Models\Test;
use App\Models\Topic;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TestServices
{
    public function getTest(string $alias): Response|TestResource
    {
        $test = Test::query()
            ->where('url', $alias)
            ->first();
        if ($test == null) return response(['status' => false, 'error' => 'Тест не найден'], 404);

        if ($test->only_user == true and !Auth::check())
            return response(['status' => false, 'error' => 'У вас нет прав посещать ту страницу'], 403);

        return new TestResource($test);
    }

    public function createTest(CreateTestRequest $request): Response
    {
        // проверка существования вопросов
        foreach ($request->quest as $quest) {
            switch ($quest['type']) {
                case 'fill':
                    if (!FillQuest::find($quest['id'])->exists())
                        return response(['status' => false, 'error' => "there is no question like " . $quest['type'] . " with id " . $quest['id']], 422);
                case 'blank':
                    if (!BlankQuest::find($quest['id'])->exists())
                        return response(['status' => false, 'error' => "there is no question like " . $quest['type'] . " with id " . $quest['id']], 422);
                case 'choice':
                    if (!ChoiceQuest::find($quest['id'])->exists())
                        return response(['status' => false, 'error' => "there is no question like " . $quest['type'] . " with id " . $quest['id']], 422);
                case 'relation':
                    if (!RelationQuest::find($quest['id'])->exists())
                        return response(['status' => false, 'error' => "there is no question like " . $quest['type'] . " with id " . $quest['id']], 422);
            }
        }

        $data = $request->only('title', 'only_user', 'leave');
        $topic = Topic::where('topic', $request->topic)->first();
        if ($topic == null) return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $data['user_id'] = Auth::user()->id;
        $data['url'] = Str::slug($request->title);
        $data['topic_id'] = $topic->id;
        if (Test::query()->where('url', $data['url'])->exists())
            return response(['status' => false, 'error' => 'Это название теста уже занято'], 400);
        $test = Test::create($data);

        foreach ($request->quest as $quest) {
            QuestsTest::create([
                'test_id' => $test->id,
                'quest_id' => $quest['id'],
                'type_quest' => $quest['type']
            ]);
        }
        return response(['status' => true, 'url' => $data['url']]);
    }

    public function deleteTest(int $id): Response
    {
        $test = Test::find($id);
        if ($test == null)
            return response(['status' => false, 'error' => 'Тест не найден'], 404);
        if ($test->user_id != Auth::user()->id)
            return response(['status' => false, 'error' => 'У вас нет прав удалять этот тест'], 403);
        $test->delete();
        return response(['status' => true]);
    }
}
