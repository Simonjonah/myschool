<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Subject;
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
        Schema::create('teacherassigns', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id');
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade')->update('cascade');
            $table->foreignIdFor(Subject::class)->constrained('subjects')->onDelete('cascade')->update('cascade');
            
            $table->string('fname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('classname')->nullable();
            $table->string('section')->nullable();
            $table->string('images')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('term')->nullable();
            
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
        Schema::dropIfExists('teacherassigns');
    }
};
