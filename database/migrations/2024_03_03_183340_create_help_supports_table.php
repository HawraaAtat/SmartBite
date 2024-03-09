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
        Schema::create('help_supports', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained()->onDelete('cascade');
            $table->text('faqs')->nullable();
            $table->text('tutorials')->nullable();
            $table->text('customer_support_resources')->nullable();
            $table->text('reported_issues')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_supports');
    }
};
