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
        Schema::create('addresses', function (Blueprint $table) {
            $table->string('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string("phone" ,14);
            $table->string('streetAddress');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->text('additionalInstruction')->default('');
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
