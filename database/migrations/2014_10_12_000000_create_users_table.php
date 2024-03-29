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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->date('DOB')->nullable();
            $table->string('gender')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->float('bmi')->nullable();
            $table->string('chronic_diseases')->nullable();
            $table->string('allergies')->nullable();
            $table->string('dietary_preferences')->nullable();
            $table->string('health_goals')->nullable();
            $table->string('ethical_meal_considerations')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
