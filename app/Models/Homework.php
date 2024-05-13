<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Homework extends Model
{
    use HasFactory;

    public function scopeSearch($query, $value)
    {
        $query->where('title', 'like', "%{$value}%");
    }
    public function student(): HasOne
    {
        return $this->hasOne(Student::class,'id','student_id');
    }
}
