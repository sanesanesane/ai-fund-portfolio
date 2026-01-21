<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intake;


class IntakeController extends Controller
{
    //ページ表示
    public function create() 
    {
    return view('intake.create');
    }

    //データの保存
    public function store(Request $request)
    {

    // 〇 user_idとの関連用
        $userId = $request->session()->get('user_id');
        if (!$userId)
             {
            return redirect()->route('top')
                ->withErrors(['name' => '最初に名前を入力してから診断を開始してください。']);
             }

    //データを入れるモデルを用意。
    $intake = new Intake();

    //〇入力についてのデータ保存
    $age = (string) $request->input('age');
    $budget = (string) $request->input('budget');
    $experience	= (string) $request->input('experience');

    //〇年齢のバリデーション
    $age = trim($age); //空白をなくす。
    $age = mb_convert_kana($age, 'n', 'UTF-8');//半角へ変換。（念を入れて）
    $age = str_replace(',', '', $age); //,をなくす
    $age = str_replace(['－', '−'], '-', $age); //マイナスを半角のマイナスへ変換する。

    if (preg_match('/^\-/', $age)) //入力にマイナスがあった場合
        {
        return back()
        ->withErrors(['age' => '年齢にマイナスは入力できません。'])
        ->withInput();
        }

    //〇投資額のバリデーション
    $budget = trim($budget);
    $budget = mb_convert_kana($budget, 'n', 'UTF-8');//半角へ変換。（念を入れて）
    $budget = str_replace(',', '', $budget); //,をなくす
    $budget = str_replace(['－', '−'], '-', $budget); //マイナスを半角のマイナスへ変換する。

    if (preg_match('/^\-/', $budget)) //入力にマイナスがあった場合
        {
        return back()
        ->withErrors(['budget' => '年齢にマイナスは入力できません。'])
        ->withInput();
        }
    
    //〇作った変数をDBへ代入する処理
    $intake->user_id = $userId;
    $intake->age = $age;
    $intake->budget = $budget;
    $intake->experience =$experience;

    $intake->save();
    //テスト用 return redirect()->route('top');

    return redirect()->route('question.create');
    
    }
}



