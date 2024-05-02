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

    public function scopeSearch($query, $value)
    {
        $query->where('counseling', 'like', "%{$value}%")
        ->orwhere('status', 'like', "%{$value}%")
        ->orwhere('name', 'like', "%{$value}%")
        ->orwhere('mobile', 'like', "%{$value}%")
        ->orwhere('email', 'like', "%{$value}%")
        ->orwhere('address', 'like', "%{$value}%")
        ->orwhere('email', 'like', "%{$value}%");
    }

    public function councile(): HasOne
    {
        return $this->hasOne(Councilings::class,'id','counseling');
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
