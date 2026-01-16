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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('intake_id') //intakesとの関連付け
                  ->constrained()
                  ->cascadeOnDelete(); 
            $table->text('results'); //分析結果の文章
            $table->decimal('results_number', 10, 2)->nullable(); 
            // 分析結果の数値データ
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
