<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HomeworkSubmit extends Model
{
    use HasFactory;

    protected $fillable = ['homework_id','url','description','feedback'];

    public function homework(): HasOne
    {
        return $this->hasOne(Homework::class,'id','homework_id');
    }
}
