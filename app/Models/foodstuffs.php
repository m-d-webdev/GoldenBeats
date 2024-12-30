<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foodstuffs extends Model
{
    use HasFactory;

    public function command_items(){
        return $this->hasMany(command_items::class,"item_id");
    }
}
