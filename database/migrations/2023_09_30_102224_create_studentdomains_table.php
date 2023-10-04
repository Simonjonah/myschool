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
        Schema::create('studentdomains', function (Blueprint $table) {
            $table->id();
            $table->string('cogname');
            $table->string('psycomoto');
            $table->string('punt1')->nullable();
            $table->string('teacher_id');
            $table->string('student_id');
            $table->string('ref_no1');
            $table->string('punt2')->nullable();
            $table->string('punt3')->nullable();
            $table->string('punt4')->nullable();
            $table->string('punt5')->nullable();
            $table->string('term')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('connect')->nullable();
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
        Schema::dropIfExists('studentdomains');
    }
};
