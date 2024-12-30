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
        Schema::create('commands', function (Blueprint $table) {
            $table->string("command_id" ,100)->primary();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on('users')->onDelete('cascade');

            $table->unsignedBigInteger("address_id");
            $table->foreign("address_id")->references("id")->on('addresses')->onDelete('cascade');
            
            $table->unsignedBigInteger("payment_method_id");
            $table->foreign("payment_method_id")->references("id")->on('payment_methods')->onDelete('cascade');

            $table->decimal("total_price", 10, 2)->default(0);
            $table->enum("status", ['pending', 'in_progress', 'delivered', 'canceled'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commads');
    }
};
