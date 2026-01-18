<?php

use Illuminate\Support\Facades\Route;
//〇以下コントローラー制御のために使用
use App\Http\Controllers\IntakeController; //intakesコントローラー

//〇最初のトップ画面
Route::get('/', function () {
    return view('top');
})->name('top');

//〇投資額と年齢、投資経験の登録についてのルート
Route::get('/intake/create', [IntakeController::class, 'create'])->name('intake.create'); // ページの表示
Route::post('/intake/store', [IntakeController::class, 'store'])->name('intake.store'); // ページの内容の登録


