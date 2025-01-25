<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestAnswer;
use App\Models\SolvedTest;
use App\Models\QuestsTest;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use Illuminate\Support\Str;

class QuestAnswerSeeder extends Seeder
{
    public function run()
    {
        $solvedTests = SolvedTest::all();
        $progressBar = $this->command->getOutput()->createProgressBar($solvedTests->count());

        foreach ($solvedTests as $solvedTest) {
            $questsTests = QuestsTest::where('test_id', $solvedTest->test_id)->get();

            foreach ($questsTests as $questTest) {
                $quest = $questTest->quest;

                // Генерация ответа в зависимости от типа вопроса
                $answer = $this->generateAnswer($quest);

                QuestAnswer::create([
                    'solved_test_id' => $solvedTest->id,
                    'quest_test_id' => $questTest->id,
                    'answer' => json_encode($answer),
                ]);
            }
            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->info("\nCreated Quest Answer quests");
    }

    protected function generateAnswer($quest): array|string|null
    {
        $type = $quest->getTable(); // Получаем тип вопроса (blank_quests, choice_quests и т.д.)

        switch ($type) {
            case 'blank_quests':
                return $this->generateBlankAnswer($quest);
            case 'choice_quests':
                return $this->generateChoiceAnswer($quest);
            case 'fill_quests':
                return $this->generateFillAnswer($quest);
            case 'relation_quests':
                return $this->generateRelationAnswer($quest);
            default:
                return null;
        }
    }

    protected function generateBlankAnswer(BlankQuest $quest): string
    {
        // Случайно выбираем, будет ли ответ правильным
        $isCorrect = rand(0, 1);

        if ($isCorrect)
            return json_decode($quest->correct)[0];
        return Str::random(10);
    }

    protected function generateChoiceAnswer(ChoiceQuest $quest): array
    {
        $correctAnswers = json_decode($quest->correct);
        $answer = [];

        // Определяем, сколько правильных ответов нужно выбрать
        $maxCorrect = count($correctAnswers);
        $correctToSelect = rand(0, $maxCorrect); // Случайное количество правильных ответов

        // Выбираем случайные правильные ответы
        $selectedCorrect = [];
        if ($correctToSelect > 0) {
            $selectedCorrect = array_rand(array_flip($correctAnswers), $correctToSelect);
            if (!is_array($selectedCorrect)) {
                $selectedCorrect = [$selectedCorrect];
            }
        }

        // Если вопрос не multiple, возвращаем только один ответ
        if (!$quest->is_multiple and count($selectedCorrect)) {
            $answer = [$selectedCorrect[array_rand($selectedCorrect)]];
        }

        return $answer;
    }

    protected function generateFillAnswer(FillQuest $quest): array
    {
        $options = json_decode($quest->options, true);
        $answers = [];

        foreach ($options as $optionGroup) {
            // Находим правильный ответ в текущей группе
            $correctAnswer = null;
            foreach ($optionGroup as $option) {
                if ($option['correct']) {
                    $correctAnswer = $option['str'];
                    break;
                }
            }

            // Случайно выбираем, будет ли ответ правильным
            $isCorrect = rand(0, 1);

            if ($isCorrect) {
                $answers[] = $correctAnswer;
            } else {
                // Выбираем случайный неправильный ответ
                $incorrectOptions = array_filter($optionGroup, fn($opt) => !$opt['correct']);
                $answers[] = $incorrectOptions[array_rand($incorrectOptions)]['str'];
            }
        }

        return $answers;
    }

    protected function generateRelationAnswer(RelationQuest $quest): array
    {
        $correctAnswers = json_decode($quest->second_column);
        $answers = [];

        foreach ($correctAnswers as $index => $correctAnswer) {
            // Случайно выбираем, будет ли ответ правильным
            $isCorrect = rand(0, 1);

            if ($isCorrect) {
                $answers[] = $correctAnswer;
            } else {
                $answers[] = Str::random(5);
            }
        }

        return $answers;
    }
}
