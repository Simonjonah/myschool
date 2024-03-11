<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade')->update('cascade');

            $table->string('schoolname');
            $table->string('fname');
            $table->string('middlename');
            $table->string('surname');
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->text('images')->nullable();
            $table->text('logo')->nullable();
            $table->string('preclassname')->nullable();
            $table->string('age')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            
            $table->string('term')->nullable();
            $table->string('classname')->nullable();
           
            $table->string('alms')->nullable();
            $table->string('section')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('slug')->nullable();
            $table->string('regnumber', 50)->nullable()->unique();

            $table->string('ref_no1')->nullable();
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
        Schema::dropIfExists('students');
    }
};
