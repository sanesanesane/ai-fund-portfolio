<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; //1対複数のときに必要。
use App\Models\Choice;

class Question extends Model
{
public function choices(): HasMany //choiceとの連結
    {
        return $this->hasMany(Choice::class); //一つの質問に複数の選択肢が必要となる。
    }

public function answers(): HasMany
{
    return $this->hasMany(Answer::class);
}


}
