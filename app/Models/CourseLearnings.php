<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseLearnings extends Model
{
    use HasFactory;

    public function course(): HasOne
    {
        return $this->hasOne(Course::class,'id','course_id');
    }

}
