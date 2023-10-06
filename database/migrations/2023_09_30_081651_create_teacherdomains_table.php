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
        Schema::create('teacherdomains', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id')->nullable();
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
        Schema::dropIfExists('teacherdomains');
    }
};
