<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Event;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Event::class)->constrained('events')->onDelete('cascade')->update('cascade');
            $table->string('fname');
            $table->string('title');
            $table->string('middlename');
            $table->string('classname');
            $table->string('surname');
            $table->string('phone');
            $table->string('email');
            $table->string('schoolname');
            $table->text('images');
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
        Schema::dropIfExists('competitions');
    }
};
