<?php

use Illuminate\Support\Facades\Route;
//〇以下コントローラー制御のために使用
use App\Http\Controllers\StartController;
use App\Http\Controllers\IntakeController; //intakesコントローラー
use App\Http\Controllers\QuestionController; //questionsコントローラー
use OpenAI\Laravel\Facades\OpenAI;

//〇最初のトップ画面
Route::get('/', function () {
    return view('top');
})->name('top');

//〇ユーザー名登録
Route::post('/start/store', [StartController::class, 'store'])->name('start.store'); //ユーザーの登録

//〇投資額と年齢、投資経験の登録についてのルート
Route::get('/intake/create', [IntakeController::class, 'create'])->name('intake.create'); // ページの表示
Route::post('/intake/store', [IntakeController::class, 'store'])->name('intake.store'); // ページの内容の登録

//〇質問関係
Route::get('/question/create', [QuestionController::class, 'create'])->name('question.create');
Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');

//〇APIのテスト
Route::get('/ai-test', function () {
    $response = OpenAI::responses()->create([
        'model' => 'gpt-5-mini',
        'input' => 'こんにちは！一言だけ返して',
    ]);

    return $response->outputText ?? '返答がありません';
});

