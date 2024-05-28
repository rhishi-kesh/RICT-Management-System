<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','attendance','date','batch_id'];
    public $timestamps = false;

    public function students(): HasOne
    {
        return $this->hasOne(Student::class,'id','student_id');
    }
}
