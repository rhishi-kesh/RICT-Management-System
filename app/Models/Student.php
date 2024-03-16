<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
