<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Notice extends Model
{
    use HasFactory;
    public function mentor(): HasOne
    {
        return $this->hasOne(Mentor::class,'id','user_id');
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function admissionBooth(): HasOne
    {
        return $this->hasOne(AdmissionBooth::class,'id','user_id');
    }
    public function student(): HasOne
    {
        return $this->hasOne(Student::class,'id','user_id');
    }
}
