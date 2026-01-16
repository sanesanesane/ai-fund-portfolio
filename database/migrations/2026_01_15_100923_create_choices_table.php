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
        Schema::create('choices', function (Blueprint $table)
        {
            $table->id();
            $table->string('label'); //選択肢の文章
            $table->unsignedTinyInteger('score')->comment('例：0〜5'); //回答の数値データ（0から5）
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
