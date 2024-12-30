<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class command_items extends Model
{
    use HasFactory;
  
    protected $fillable = [
        "id",
        "command_id",
        "item_id",
        "quantity"
    ];
    public function command()
    {
        return $this->belongsTo(commands::class, "command_id","command_id");
    }
    public function food()
    {
        return $this->belongsTo(foodstuffs::class, "item_id");
    }
}
