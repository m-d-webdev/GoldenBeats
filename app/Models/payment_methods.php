<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_methods extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'card_name',
        'card_number',
        'expiration_date',
        'cvv',
        'card_type',
        'is_default'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commands(){
        return $this->hasMany(commands::class ,"payment_method_id");
    }
}
