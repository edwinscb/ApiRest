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
        Schema::create('user_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('criteria');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('created_by_id');
            $table->timestamps();

            $table->foreign('created_by_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_histories');
    }
};
