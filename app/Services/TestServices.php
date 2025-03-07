<?php

namespace App\Services;

use App\Http\Requests\Test\CreateTestRequest;
use App\Http\Requests\Test\EditTestRequest;
use App\Http\Resources\Test\DescriptionTestResource;
use App\Http\Resources\Test\TestResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\QuestsTest;
use App\Models\RelationQuest;
use App\Models\Test;
use App\Repositories\TestRepository;
use App\Repositories\TopicRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TestServices
{
    public function getTest(string $alias, $teacher = null): Response|TestResource
    {
        $test = Test::query()
            ->where('url', $alias)
            ->first();
        if ($test == null) return response(['status' => false, 'error' => 'Тест не найден'], 404);

        if (($test->only_user == true and !Auth::check()) or ($teacher!=null and $test->user_id!=$teacher))
            return response(['status' => false, 'error' => 'У вас нет прав посещать ту страницу'], 403);

        return new TestResource($test);
    }

    public function createTest(CreateTestRequest $request): Response
    {
        if (!$this->validateQuestions($request->quest))
            return response(['status' => false, 'error' => 'Один или несколько вопросов не найдены'], 422);

        $topic = TopicRepository::getByName($request->topic);
        if ($topic === null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $testData = (new DescriptionTestResource($request))->toArray($request);
        $testData['topic_id'] = $topic->id;
        if (TestRepository::findByAlias($testData['url']))
            return response(['status' => false, 'error' => 'Это название теста уже занято'], 400);

        $test = Test::create($testData);
        $this->attachQuestionsToTest($test->id, $request->quest);

        return response(['status' => true, 'url' => $testData['url']]);
    }

    public function editTest(EditTestRequest $request): Response
    {
        $test = TestRepository::findByAlias($request->alias);
        if ($test == null)
            return response(['status'=>false, 'error' => 'Тест не найден'], 404);
        if($test->user_id != Auth::id())
            return response(['status'=>false, 'error' => 'У вас нет прав редактировать этот тест'], 404);

        $data = $request->only([
            'title',
            'only_user',
            'max_time',
            'is_multi',
            'is_public'
        ]);

        if (isset($data['title']))
            $data['url'] = Str::slug($data['title']);

        $test->update($data);
        $test->refresh();
        return response(['status' => true, 'url' => $test->url], 200);
    }

    protected function validateQuestions(array $questions): bool
    {
        foreach ($questions as $quest) {
            if (!$this->questionExists($quest['type'], $quest['id'])) {
                return false;
            }
        }
        return true;
    }

    protected function questionExists(string $type, int $id): bool
    {
        return match ($type) {
            'fill' => FillQuest::where('id', $id)->exists(),
            'blank' => BlankQuest::where('id', $id)->exists(),
            'choice' => ChoiceQuest::where('id', $id)->exists(),
            'relation' => RelationQuest::where('id', $id)->exists(),
            default => false,
        };
    }

    protected function attachQuestionsToTest(int $testId, array $questions): void
    {
        foreach ($questions as $quest) {
            QuestsTest::create([
                'test_id' => $testId,
                'quest_id' => $quest['id'],
                'type_quest' => $quest['type'],
            ]);
        }
    }
}
