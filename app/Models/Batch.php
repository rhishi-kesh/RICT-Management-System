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

    public function mentors(): HasMany
    {
        return $this->hasMany(Mentor::class,'id','mentor_id');
    }

    public function course(): HasOne
    {
        return $this->hasOne(Course::class,'id','course_id');
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class,'batch_id','id');
    }

    protected $fillable = [
        'mentor_id',
        'name',
        'status',
        'updated_at'
    ];
}
