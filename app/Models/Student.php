<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id', 'name', 'fName', 'mName', 'email', 'address', 'mobile', 'qualification', 'profession', 'guardianMobileNo', 'courseName', 'paymentType', 'pay', 'due', 'total', 'bkashNo', 'admissionFee', 'discount',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
        ->orwhere('fName', 'like', "%{$value}%")
        ->orwhere('mName', 'like', "%{$value}%")
        ->orwhere('email', 'like', "%{$value}%")
        ->orwhere('student_id', 'like', "%{$value}%")
        ->orwhere('batch_id', 'like', "%{$value}%")
        ->orwhere('mobile', 'like', "%{$value}%");
    }
    public function course(): HasOne
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
    public function pament_mode(): HasOne
    {
        return $this->hasOne(PaymentMode::class,'id','paymentType');
    }
    public function batch(): HasOne
    {
        return $this->hasOne(Batch::class,'id','batch_id');
    }
}
