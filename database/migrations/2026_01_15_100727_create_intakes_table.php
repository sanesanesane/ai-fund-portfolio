<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('intakes', function (Blueprint $table)
        {
            $table->id();//idカラムの作成
            //テスト用時に使用したもの　
            // $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')//外部キーの作成
                  ->constrained()//外部キーの連結
                  ->cascadeOnDelete();//user_idが消えたら、これも消える。
            $table->unsignedTinyInteger('age');  //整数を保存（年齢カラム） 
            $table->unsignedInteger('budget');  //もっと大きな整数を保存（投資額カラム）
            $table->unsignedTinyInteger('experience')->default(0); // 0=未経験, 1=少し経験あり, 2=経験あり
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intakes');
    }
};
