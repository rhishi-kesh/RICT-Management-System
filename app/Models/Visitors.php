<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Visitors extends Model
{
    use HasFactory;

    const TABLE = 'visitors';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'email',
        'mobile',
    ];
    public function councile(): HasOne
    {
        return $this->hasOne(Councilings::class,'id','course_id');
    }
}
