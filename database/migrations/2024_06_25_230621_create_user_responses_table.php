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
        Schema::create('user_responses', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->decimal('response1', 10, 2)->nullable();
            $table->decimal('response2', 10, 2)->nullable();
            $table->decimal('response3', 10, 2)->nullable();
            $table->decimal('response4', 10, 2)->nullable();
            $table->decimal('response5', 10, 2)->nullable();
            $table->decimal('response6', 10, 2)->nullable();
            $table->decimal('response7', 10, 2)->nullable();
            $table->decimal('response8', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_responses');
    }
};
