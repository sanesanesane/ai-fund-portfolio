<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StartController extends Controller
{
    public function store(Request $request)
    {
        // 〇 入力を取得
        $name = (string) $request->input('name', '');

        // 〇 表記の整理
        $name = trim($name); // 前後の空白を削除
        $name = mb_convert_kana($name, 'ASKV', 'UTF-8'); // 半角→全角寄せ

        // 〇 バリデーション
        if ($name === '') {
            return back()->withErrors(['name' => '名前を入力してください。'])->withInput();
        }
        if (mb_strlen($name, 'UTF-8') > 20) {
            return back()->withErrors(['name' => '名前は20文字以内で入力してください。'])->withInput();
        }

        // 〇 email/passwordを自動生成する
        $email = Str::uuid()->toString() . '@local.test';
        $password = Str::random(32);

        // 〇 users作成
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // 〇 セッションに user_id を保持
        $request->session()->put('user_id', $user->id);

        // 〇 次の画面へ
        return redirect()->route('intake.create');
    }
}
