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
        return $this->hasOne(Councilings::class,'id','counseling');
    }
    public function callingperson(): HasOne
    {
        return $this->hasOne(Councilings::class,'id','calling_person');
    }
    public function course(): HasOne
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
    public function admissionBooth(): HasOne
    {
        return $this->hasOne(AdmissionBooth::class,'id','admission_booth_name');
    }
}
