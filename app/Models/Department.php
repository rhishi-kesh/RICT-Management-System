<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    const TABLE = 'departments';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function course()
    {
        return $this->hasMany(Course::class);
    }

}
