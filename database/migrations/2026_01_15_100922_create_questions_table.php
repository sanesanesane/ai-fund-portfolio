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
        Schema::create('questions', function (Blueprint $table) 
        {
            $table->id();
            $table->string('code', 10)->unique(); // 質問番号
            $table->text('text'); //質問文カラム
            $table->string('type', 10)->nullable(); // 質問属性（A/Cなど）NULLもあり。
            $table->boolean('modify')->default(false);    // 補正目的なら1
            $table->boolean('inversion')->default(false); // 反転質問なら1
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
