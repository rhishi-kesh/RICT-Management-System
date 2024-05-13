<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HomeworkSubmit extends Model
{
    use HasFactory;

    public function homework(): HasOne
    {
        return $this->hasOne(Homework::class,'id','homework_id');
    }
}
