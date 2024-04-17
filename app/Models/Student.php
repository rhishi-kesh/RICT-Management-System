<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'name',
        'fName',
        'mName',
        'email',
        'address',
        'mobile',
        'qualification',
        'profession',
        'guardianMobileNo',
        'courseName',
        'paymentType',
        'pay',
        'due',
        'total',
        'bkashNo',
        'admissionFee',
        'discount',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Searching

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
        ->orwhere('email', 'like', "%{$value}%")
        ->orwhere('mobile', 'like', "%{$value}%");
    }
  
    public function course(): HasOne
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
}
