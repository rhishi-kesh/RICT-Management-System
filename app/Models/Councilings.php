<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Councilings extends Model
{
    use HasFactory;

    const TABLE = 'councilings';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
    ];
}
