<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'streetAddress',
        'city',
        'state',
        'zip',
        'additionalInstruction',
        'is_default'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commands(){
        return $this->hasMany(commands::class,"address_id");
    }
}
