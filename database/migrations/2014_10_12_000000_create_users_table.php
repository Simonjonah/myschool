<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('connect')->nullable();
            $table->string('schoolname')->nullable();
            $table->string('address')->nullable();
            $table->string('motor');
            $table->string('phone')->nullable();
            $table->string('establishdate')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('logo')->nullable();
            $table->text('images')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('plans')->nullable();
            $table->string('fname')->nullable();
            
            $table->string('surname')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('slug')->nullable();
            $table->string('ref_no')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
