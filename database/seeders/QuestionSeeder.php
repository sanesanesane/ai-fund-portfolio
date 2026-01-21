<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // ① questions：code が unique なので updateOrInsert で重複エラー回避
        DB::table('questions')->updateOrInsert(
            ['code' => 'Q001'],
            ['text' => 'テスト用の質問', 'created_at' => $now, 'updated_at' => $now]
        );

        // 作成（または既存）した質問IDを取得
        $q1 = DB::table('questions')->where('code', 'Q001')->value('id');

        // ② choices：この質問の選択肢を入れ直す（既存を消してから入れる）
        DB::table('choices')->where('question_id', $q1)->delete();

        DB::table('choices')->insert([
            ['question_id' => $q1, 'label' => 'そう思わない',       'score' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => $q1, 'label' => 'あまりそう思わない', 'score' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => $q1, 'label' => 'どちらでもない',     'score' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => $q1, 'label' => '少しそう思う',       'score' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => $q1, 'label' => 'そう思う',           'score' => 5, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}


