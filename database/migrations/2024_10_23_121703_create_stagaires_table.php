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
        Schema::create('stagaires', function (Blueprint $table) {
            $table->id();
            $table->string('cin');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('Filiere');
            $table->string('b_d');
            $table->string('tel');
            $table->string('password');
            $table->string('path_PrfPic' ,300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagaires');
    }
};
