<?php

namespace App\Services;

use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\QuestAnswer;
use App\Models\QuestsTest;
use App\Models\RelationQuest;
use Illuminate\Console\View\Components\Choice;

class AnswerServices
{
    public function countCorrect(QuestAnswer $questAnswer): int
    {
        $answer = $this->indexCheck($questAnswer);
        $count = 0;
        switch ($answer['type']) {
            case 'fill':
                foreach ($answer['answer'] as $ans)
                    if ($ans == true)
                        $count++;
                break;
            case 'choice':
                foreach ($answer['answers'] as $ans)
                    if (isset($ans['isCorrect']) and $ans['isCorrect'] == true)
                        $count++;
                break;
            case 'blank':
                if ($answer['isCorrect'] == true)
                    $count++;
                break;
            case 'relation':
                foreach ($answer['answer'] as $ans)
                    if ($ans == true)
                        $count++;
                break;
        }
        return $count;
    }

    public function indexCheck(QuestAnswer|QuestsTest $questModel): ?array
    {
        if ($questModel instanceof QuestAnswer) {
            $questTest = $questModel->questsTest;
            $answer = json_decode($questModel->answer);
            if ($answer == null) $answer = '';
        } elseif ($questModel instanceof QuestsTest) {
            $questTest = $questModel;
            $answer = '';
        }
        $quest = $questTest->quest;
        switch ($questTest->type_quest) {
            case 'fill':
                return $this->checkFillQuest($quest, $answer);
            case 'choice':
                return $this->checkChoiceQuest($quest, $answer);
            case 'blank':
                return $this->checkBlankQuest($quest, $answer);
            case 'relation':
                return $this->checkRelationQuest($quest, $answer);
            default:
                return null;
        }
    }

    public function checkBlankQuest(BlankQuest $blankQuest, string $answer): array
    {
        return [
            'type' => 'blank',
            'quest' => $blankQuest->quest,
            'answer' => $answer,
            'isCorrect' => in_array($answer, json_decode($blankQuest->correct))
        ];
    }

    public function checkChoiceQuest(ChoiceQuest $choiceQuest, array|string $answer): array
    {
        if (!is_array($answer)) $answer = [$answer];

        $correct = collect(json_decode($choiceQuest->correct))->map(function ($item) use ($answer) {
            $response = [
                'label' => $item,
                'checked' => true,
            ];
            if (in_array($item, $answer))
                $response['isCorrect'] = true;
            return $response;
        });
        $uncorrect = collect(json_decode($choiceQuest->uncorrect))->map(function ($item) use ($answer) {
            return [
                'label' => $item,
                'checked' => in_array($item, $answer),
                'isCorrect' => in_array($item, $answer)
            ];
        });

        return [
            'type' => 'choice',
            'quest' => $choiceQuest->quest,
            'is_multiple' => $choiceQuest->is_multiple,
            'answers' => $correct->merge($uncorrect)
        ];
    }

    public function checkFillQuest(FillQuest $fillQuest, array|string $answer): array
    {
        if (!is_array($answer)) $answer = [$answer];

        $correct = $fillQuest->getCorrectAnswer();
        $checked = [];
        for ($i = 0; $i < count($correct); $i++) {
            $ans = $answer[$i] ?? '';
            $checked[] = $ans == $correct[$i];
        }

        return [
            'type' => 'fill',
            'quest' => $fillQuest->quest,
            'options' => json_decode($fillQuest->options),
            'answer' => $checked
        ];
    }

    public function checkRelationQuest(RelationQuest $relationQuest, array|string $answer): array
    {
        if (!is_array($answer)) $answer = [$answer];

        $correct = json_decode($relationQuest->second_column);
        $checked = [];
        for ($i = 0; $i < count($correct); $i++) {
            $ans = $answer[$i] ?? '';
            $checked[] = $ans == $correct[$i];
        }

        return [
            'type' => 'relation',
            'quest' => $relationQuest->quest,
            'first_column' => json_decode($relationQuest->first_column),
            'second_column' => $correct,
            'answer' => $checked
        ];
    }
}
