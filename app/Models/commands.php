<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commands extends Model
{
    use HasFactory;


    protected $fillable=[
        'command_id',
        'user_id',
        'address_id',
        'payment_method_id',
        'total_price'
    ];
    public function items(){
        return $this->hasMany(command_items::class ,'command_id' ,'command_id');
    }
    public function users(){
        return $this->belongsTo(User::class  ,'user_id');
    }
    
    public function payment_method(){
        return $this->belongsTo(payment_methods::class  ,'payment_method_id');
    }
    public function address(){
        return $this->belongsTo(addresses::class  ,'address_id');
    }
    
}
