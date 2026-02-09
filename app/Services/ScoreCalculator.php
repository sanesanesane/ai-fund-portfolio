<?php
namespace App\Services;
//controllerで、use App\Services\ScoreCalculator;と書けば呼び出せる。

use App\Models\Intake;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Choice;
//上記のDBと接続します。

class ScoreCalculator
{
      /**
       * 必要な要素
       * 〇intakesテーブル
       * ・投資額　age
       * ・投資経験 experience
       * ・投資額 budget
       * 
       * 〇questiionsテーブル
       * ・質問ID
       * ・質問コード　code
       * ・質問のタイプ　type
       * ・補正質問かどうか　modify
       * ・質問の正負　inversion
       * 
       * 〇answersテーブル
       * ・回答　choice_id
       * 
       */
    public function get(int $userId)
    {
    //〇intakeテーブルの情報取得
    $intake = Intake::where('user_id', $userId)
            ->latest('id')
            ->firstOrFail();
    $age = $intake->age;
    $experience = $intake->experience;
    $budget = (int) $intake->budget;

    //〇questionsテーブルの情報取得
    $questions = Question::select(['id', 'code', 'type', 'modify', 'inversion'])->get()->keyBy('id');

    //〇answersテーブルの情報取得
    $answers = Answer::where('intake_id', $intake->id)->get(); //intakeテーブルと連結しているユーザーの回答を取得。

    return compact('age', 'experience', 'budget', 'questions', 'answers');
    }

    
}