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
        'counseling_id', 'status', 'name', 'mobile', 'email', 'course_id', 'address', 'amount', 'visitor_comment', 'gender', 'ref_name', 'admission_booth_name', 'calling_person', 'comments', 'call_count', 'updated_at'
    ];
    public function scopeSearch($query, $value)
    {
        $query->orwhere('status', 'like', "%{$value}%")
        ->orwhere('name', 'like', "%{$value}%")
        ->orwhere('mobile', 'like', "%{$value}%")
        ->orwhere('email', 'like', "%{$value}%")
        ->orwhere('address', 'like', "%{$value}%")
        ->orwhere('email', 'like', "%{$value}%");
    }
    public function councile(): HasOne
    {
        return $this->hasOne(Councilings::class,'id','counseling_id');
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
