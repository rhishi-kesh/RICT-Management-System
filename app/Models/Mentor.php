<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    const TABLE = 'mentor';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'email',
        'mobile',
    ];
}
