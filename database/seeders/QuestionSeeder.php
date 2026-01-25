<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now(); //変数nowは今の時刻


        //以下の内容はテスト用の質問データを挿入用。

        // ① questions：code が unique なので updateOrInsert で重複エラー回避
        //DB::table('questions')->updateOrInsert(
           // ['code' => 'Q001'],
        //['text' => 'テスト用の質問', 'created_at' => $now, 'updated_at' => $now]
        // );

        // 作成（または既存）した質問IDを取得
        // $q1 = DB::table('questions')->where('code', 'Q001')->value('id');

        // ② choices：この質問の選択肢を入れ直す（既存を消してから入れる）
        // DB::table('choices')->where('question_id', $q1)->delete();

        // DB::table('choices')->insert([
            //['question_id' => $q1, 'label' => 'そう思わない',       'score' => 1, 'created_at' => $now, 'updated_at' => $now],
            //['question_id' => $q1, 'label' => 'あまりそう思わない', 'score' => 2, 'created_at' => $now, 'updated_at' => $now],
            //['question_id' => $q1, 'label' => 'どちらでもない',     'score' => 3, 'created_at' => $now, 'updated_at' => $now],
            //['question_id' => $q1, 'label' => '少しそう思う',       'score' => 4, 'created_at' => $now, 'updated_at' => $now],
            //['question_id' => $q1, 'label' => 'そう思う',           'score' => 5, 'created_at' => $now, 'updated_at' => $now],
        //]);

        //〇以下、seederで質問データの挿入。

        $questions = 
        [
            [
             'code' => 'Q001',
             'text' => '私は、活発で社交的なほうだと思う。'  ,
             'type' => 'E',
             'modify' => '0',
             'inversion' => '0',
             'created_at' => $now, 
             'updated_at' => $now
            ],

            [
             'code' => 'Q002',
             'text' => '他人に不満をもち、もめ事を起こしやすいと思う。'  ,
             'type' => 'E',
             'modify' => '0',
             'inversion' => '1',
             'created_at' => $now, 
             'updated_at' => $now
            ],

            [
             'code' => 'Q003',
             'text' => '長期的な計画は、途中で面倒になっても最後まで続けるほうだ。' ,
             'type' => 'C',
             'modify' => '0',
             'inversion' => '0',
             'created_at' => $now, 
             'updated_at' => $now
            ],

            [
             'code' => 'Q004',
             'text' => 'やると決めたルール（期限・回数・金額など）をつい破ってしまうことがある。' ,
             'type' => 'C',
             'modify' => '0',
             'inversion' => '1',
             'created_at' => $now, 
             'updated_at' => $now
            ],

            [
             'code' => 'Q005',
             'text' => '損をする可能性がある場面では、必要以上に悪い結果を想像してしまう。' ,
             'type' => 'N',
             'modify' => '0',
             'inversion' => '0',
             'created_at' => $now, 
             'updated_at' => $now
            ],

            [
             'code' => 'Q006',
             'text' => '想定外の出来事が起きても、気持ちの切り替えは早いほうだ。' ,
             'type' => 'N',
             'modify' => '0',
             'inversion' => '1',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q007',
             'text' => ' よく分からない仕組みでも、理解できそうだと思えば試してみたい。' ,
             'type' => 'O',
             'modify' => '0',
             'inversion' => '0',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q008',
             'text' => ' 新しい考え方や選択肢よりも今までの考えを優先してしまいがちだ。' ,
             'type' => 'O',
             'modify' => '0',
             'inversion' => '1',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q009',
             'text' => ' 自分の判断よりも、他人の立場や気持ちを優先して決めることがある。' ,
             'type' => 'A',
             'modify' => '0',
             'inversion' => '0',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q010',
             'text' => '周囲の意見よりも、自分の価値化や正義に沿って行動するほうだ。' ,
             'type' => 'A',
             'modify' => '0',
             'inversion' => '1',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q011',
             'text' => '質問文が少し長くても、最後まで読んでから答えるほうだ。' ,
             'type' => 'C',
             'modify' => '1',
             'inversion' => '0',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q012',
             'text' => '失敗やミスがあったとき、それを人に話すのはあまり得意ではない。' ,
             'type' => 'E',
             'modify' => '1',
             'inversion' => '0',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q013',
             'text' => '「こうありたい自分」と、実際の行動が一致していないと感じることがある。' ,
             'type' => 'N',
             'modify' => '1',
             'inversion' => '1',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q014',
             'text' => '直近3か月間で、衝動買いをした回数はどれくらいですか？' ,
             'type' => 'C',
             'modify' => '1',
             'inversion' => '1',
             'created_at' => $now, 
             'updated_at' => $now 
            ],

            [
             'code' => 'Q015',
             'text' => '直近1か月間で、家計や支出の確認を行った週は何週ありましたか？' ,
             'type' => 'C',
             'modify' => '1',
             'inversion' => '0',
             'created_at' => $now, 
             'updated_at' => $now 
            ],
        ];

        //〇DBへ挿入
        foreach ($questions as $q) 
        {
            DB::table('questions')->updateOrInsert
            (
                ['code' => $q['code']],
                [
                    'text'       => $q['text'],
                    'type'       => $q['type'],
                    'modify'     => (int)$q['modify'],
                    'inversion'  => (int)$q['inversion'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }

        //〇選択肢についてのseeder追加。
        $choicecommon = 
        [
            ['label' => 'そう思わない',       'score' => 1],
            ['label' => 'あまりそう思わない', 'score' => 2],
            ['label' => 'どちらでもない',     'score' => 3],
            ['label' => '少しそう思う',       'score' => 4],
            ['label' => 'そう思う',           'score' => 5],
        ];

        //〇選択肢Q14とQ15についての選択肢
          $choicespecial = 
        [
            'Q014' => 
            [
                ['label' => '0回',       'score' => 1],
                ['label' => '1〜2回',    'score' => 2],
                ['label' => '3〜4回',    'score' => 3],
                ['label' => '5〜6回',    'score' => 4],
                ['label' => '7回以上',  'score' => 5],
            ],

            'Q015' => 
            [
                ['label' => '0週', 'score' => 1],
                ['label' => '1週', 'score' => 2],
                ['label' => '2週', 'score' => 3],
                ['label' => '3週', 'score' => 4],
                ['label' => '4週', 'score' => 5],
            ],
        ];

     $question = DB::table('questions')
     ->select('id', 'code')
     ->get()
     ->pluck('id', 'code'); //codeを参照して、idを取得する。

     //〇ループ処理
     foreach ($question as $code => $qid)
        {
        //〇seederを実行するときに、既存の選択肢が消される。
        DB::table('choices')->where('question_id', $qid)->delete();
        //〇choiceの割振り
        $set = $choicespecial[$code] ?? $choicecommon;
        
        //挿入列
        $rows = [];
        foreach ($set as $c) 
            {
            $rows[] = 
                [
                    'question_id' => $qid,
                    'label'       => $c['label'],
                    'score'       => $c['score'],
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ];
            }
        //選択肢をインサートする。
        DB::table('choices')->insert($rows);
       }
    }
}

