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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade')->update('cascade');
             $table->string('user_id');
             $table->string('title');
 
             $table->string('schoolname');
             $table->string('address');
             $table->string('phone');
             $table->string('email');
         
             $table->text('images1')->nullable();
             $table->text('images2')->nullable();
             $table->text('images3')->nullable();
             $table->text('images')->nullable();
             $table->text('images5')->nullable();
             $table->text('logo')->nullable();
             $table->text('messages')->nullable();
             $table->string('slug')->nullable();
             $table->string('ref_no')->nullable();
             $table->string('status')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
