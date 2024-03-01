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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('user_history_id');
            $table->unsignedBigInteger('created_by_id');
            $table->timestamps();

            $table->foreign('created_by_id')->references('id')->on('users');
            $table->foreign('user_history_id')->references('id')->on('user_histories');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
