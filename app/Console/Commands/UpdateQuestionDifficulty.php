<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use App\Repositories\QuestRepository;
use Illuminate\Support\Facades\Log;

class UpdateQuestionDifficulty extends Command
{
    protected $signature = 'questions:update-difficulty';
    protected $description = 'Update the difficulty of questions based on user answers.';

    public function handle()
    {
        Log::info("Начало обновления сложности вопросов");
        $typesArr = [BlankQuest::class, ChoiceQuest::class, FillQuest::class, RelationQuest::class];
        foreach ($typesArr as $type) {
            Log::info("Обновление сложности вопросов типа: {$type}");
            $quests = $type::whereHas('questsTest')->get();
            foreach ($quests as $quest) {
                try {
                    $answers = QuestRepository::getAnswers($quest);
                    $maxScore = $quest->maxScore();
                    $totalScore = $answers->sum(fn($answer) => $answer->countCorrect());

                    $count = $answers->count();
                    $percentage = ($maxScore > 0 and $count > 0) ? ($totalScore / ($maxScore * $count)) * 100 : 100;
                    $quest->update(['difficulty' => $percentage]);
                } catch (\Exception $e) {
                    Log::error("Ошибка при обновлении сложности вопроса ID {$quest->id}: " . $e->getMessage());
                }
            }
        }
        Log::info("Обновление сложности вопросов завершена");
    }
}
