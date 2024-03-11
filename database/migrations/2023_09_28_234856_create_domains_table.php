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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade')->update('cascade');

            $table->string('teacher_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('psycomoto')->nullable();
            $table->string('cogname');
            $table->string('ref_no1');
            $table->string('ref_no');
            $table->string('connect')->nullable();
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
        Schema::dropIfExists('domains');
    }
};
