<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('command_items', function (Blueprint $t) {
            $t->id();
            $t->string('command_id' ,100);
            $t->foreign("command_id")->references("command_id")->on("commands")->onDelete('cascade');
            $t->unsignedBigInteger('item_id');
            $t->foreign("item_id")->references("id")->on("foodstuffs")->onDelete('cascade');
            $t->float('quantity');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('command_items');
    }
};
