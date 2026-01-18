<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class Intake extends Model
    {
    //DBへデータ送信の認可
    protected $fillable = 
        [
        'age',
        'budget',
        'experience',
        ];
    }


