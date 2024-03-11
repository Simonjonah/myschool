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
        Schema::create('domainresults', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id');
            $table->string('student_id');
            $table->string('psycomoto');
            $table->string('cogname');
            $table->text('signature')->nullable();

            $table->string('ref_no1');
            $table->string('teacher_comment')->nullable();
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
        Schema::dropIfExists('domainresults');
    }
};
