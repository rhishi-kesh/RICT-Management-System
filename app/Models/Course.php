<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    public function department(): HasOne
    {
        return $this->hasOne(Department::class,'id','department_id');
    }

    protected $fillable = [
        'name',
        'slug',
        'fee',
        'description',
        'duration',
        'lecture',
        'project',
        'thumbnail',
        'video',
        'department_id',
        'is_web',
        'is_footer',
        'best_selling',
    ];

}
