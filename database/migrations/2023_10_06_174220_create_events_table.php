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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('title');

            $table->string('schoolname')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkin')->nullable();
            $table->text('instagram')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('images1')->nullable();
            $table->text('images2')->nullable();
            $table->text('images3')->nullable();
            $table->text('images')->nullable();
            $table->text('images5')->nullable();
            $table->text('logo')->nullable();
            $table->text('message')->nullable();
            $table->string('slug')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
