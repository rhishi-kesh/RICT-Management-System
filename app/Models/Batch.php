<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Batch extends Model
{
    use HasFactory;

    public function students(): HasMany
    {
        return $this->hasMany(Student::class,'batch_id','id');
    }

    public function mentors(): HasOne
    {
        return $this->hasOne(Mentor::class,'id','mentor_id');
    }
}
