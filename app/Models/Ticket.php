<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ticket_id', 'subject', 'status','created_at'];

    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }
}
