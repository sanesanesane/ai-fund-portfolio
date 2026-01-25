<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ログイン中のデータを使うよ
use Illuminate\Support\Facades\DB; //DBを使うとき必要

use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function create(Request $request)
    {
        $userId = $request->session()->get('user_id');
        if (!$userId) {
            return redirect()->route('top');
        }

        // choicesがある前提（なければ with('choices') を外す）
        $questions = Question::with('choices')->orderBy('id')->get();

        return view('question.create', compact('questions'));
    }
    
    public function store(Request $request)
    {

        //〇ユーザーログインされてない場合はじくように設定。
        $userId = $request->session()->get('user_id');
        if (!$userId) {
        return redirect()->route('top');
        }

        // 〇今回の診断回（intake）判定：sessionのintake_id
        $intakeId = $request->session()->get('intake_id');
        if (!$intakeId) {
        return redirect()->route('top'); // 本当はintake入力画面へが理想
        }

        //〇バリデーションのための準備
        $questions = Question::with('choices')->orderBy('id')->get();

        //〇バリデーション
        $rules = 
        [
            'answers' => 'required|array', //入力されているかどうか確認する。
        ];

        foreach ($questions as $q) //繰り返し
        {
            $rules["answers.{$q->id}"] //質問1問から15問を対象にする。
            = 'required|integer|exists:choices,id'; //入力されているか。数字か。選択肢のスコアの数字か。
        }

        //〇異常があった場合
        $messages = [];
        foreach ($questions as $q) 
        {
            $messages["answers.{$q->id}.required"] = "未回答の質問があります（Q{$q->id}）";
        }

        //〇バリデーション
        $validated = $request->validate($rules, $messages); //入力された内容にルールが守られているか確認。守られているデータのみ挿入。
        

        DB::transaction(function () use ($validated, $intakeId) {

        // 上書き保存（履歴を残さない方式）
        Answer::where('intake_id', $intakeId)->delete();

        $rows = [];
            foreach ($validated['answers'] as $questionId => $choiceId) 
                {
                $rows[] = [
                    'intake_id'   => $intakeId,
                    'question_id' => (int)$questionId,
                    'choice_id' => (int)$choiceId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        Answer::insert($rows);
        });

        return redirect()->route('question.create'); 

    }

}
