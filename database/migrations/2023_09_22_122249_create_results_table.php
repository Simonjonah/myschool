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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade')->update('cascade');
            $table->string('teacher_id', 11);
            $table->string('student_id', 30);
            $table->string('schoolname', 191);
            $table->string('address', 191);
            $table->string('motor', 191);
            $table->text('logo')->nullable();

            $table->string('ref_no', 20)->nullable();
            $table->string('surname', 50)->nullable();
            $table->string('middlename', 50)->nullable();
            $table->string('fname', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('section', 50)->nullable();
            $table->string('academic_session', 15)->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('classname', 20)->nullable();
            $table->text('images')->nullable();
            $table->string('status', 12)->nullable();
            $table->string('term', 30)->nullable();
            $table->string('regnumber', 30)->nullable();
            $table->string('slug')->nullable();
            
            $table->string('subjectname', 30);
            $table->string('test_1', 5)->default(0)->nullable();
            $table->string('test_2', 5)->default(0)->nullable();
            $table->string('test_3', 5)->default(0)->nullable();
            $table->string('exams', 5)->default(0)->nullable();


            $table->string('polite1', 5)->nullable();
            $table->string('polite2', 5)->nullable();
            $table->string('polite3', 5)->nullable();
            $table->string('polite4', 5)->nullable();

            $table->string('punt1', 5)->nullable();
            $table->string('punt2', 5)->nullable();
            $table->string('punt3', 5)->nullable();
            $table->string('punt4', 5)->nullable();

            $table->string('respond1', 5)->nullable();
            $table->string('respond2', 5)->nullable();
            $table->string('respond3', 5)->nullable();
            $table->string('respond4', 5)->nullable();


            $table->string('corporate1', 5)->nullable();
            $table->string('corporate2', 5)->nullable();
            $table->string('corporate3', 5)->nullable();
            $table->string('corporate4', 5)->nullable();

            $table->string('neat1', 5)->nullable();
            $table->string('neat2', 5)->nullable();
            $table->string('neat3', 5)->nullable();
            $table->string('neat4', 5)->nullable();

            $table->string('attentive1', 5)->nullable();
            $table->string('attentive2', 5)->nullable();
            $table->string('attentive3', 5)->nullable();
            $table->string('attentive4', 5)->nullable();


            $table->string('init1', 5)->nullable();
            $table->string('init2', 5)->nullable();
            $table->string('init3', 5)->nullable();
            $table->string('init4', 5)->nullable();


            $table->string('organ1', 5)->nullable();
            $table->string('organ2', 5)->nullable();
            $table->string('organ3', 5)->nullable();
            $table->string('organ4', 5)->nullable();

            $table->string('pers1', 5)->nullable();
            $table->string('pers2', 5)->nullable();
            $table->string('pers3', 5)->nullable();
            $table->string('pers4', 5)->nullable();

            
            $table->string('atti1', 5)->nullable();
            $table->string('atti2', 5)->nullable();
            $table->string('atti3', 5)->nullable();
            $table->string('atti4', 5)->nullable();


            $table->string('club1', 5)->nullable();
            $table->string('club2', 5)->nullable();
            $table->string('club3', 5)->nullable();
            $table->string('club4', 5)->nullable();

            $table->string('hand1', 5)->nullable();
            $table->string('hand2', 5)->nullable();
            $table->string('hand3', 5)->nullable();
            $table->string('hand4', 5)->nullable();



            $table->string('tech1', 5)->nullable();
            $table->string('tech2', 5)->nullable();
            $table->string('tech3', 5)->nullable();
            $table->string('tech4', 5)->nullable();

            $table->string('tool1', 5)->nullable();
            $table->string('tool2', 5)->nullable();
            $table->string('tool3', 5)->nullable();
            $table->string('tool4', 5)->nullable();
            
            $table->string('pract1', 5)->nullable();
            $table->string('pract2', 5)->nullable();
            $table->string('pract3', 5)->nullable();
            $table->string('pract4', 5)->nullable();
            

            $table->string('craft1', 5)->nullable();
            $table->string('craft2', 5)->nullable();
            $table->string('craft3', 5)->nullable();
            $table->string('craft4', 5)->nullable();
            
            $table->string('music1', 5)->nullable();
            $table->string('music2', 5)->nullable();
            $table->string('music3', 5)->nullable();
            $table->string('music4', 5)->nullable();


            $table->string('comp1', 5)->nullable();
            $table->string('comp2', 5)->nullable();
            $table->string('comp3', 5)->nullable();
            $table->string('comp4', 5)->nullable();

            $table->string('paint1', 5)->nullable();
            $table->string('paint2', 5)->nullable();
            $table->string('paint3', 5)->nullable();
            $table->string('paint4', 5)->nullable();

        
            $table->string('sports1', 5)->nullable();
            $table->string('sports2', 5)->nullable();
            $table->string('sports3', 5)->nullable();
            $table->string('sports4', 5)->nullable();


            // $table->string('music1', 5)->nullable();
            // $table->string('music2', 5)->nullable();
            // $table->string('music3', 5)->nullable();
            // $table->string('music4', 5)->nullable();

            $table->string('creativity1', 5)->nullable();
            $table->string('creativity2', 5)->nullable();
            $table->string('creativity3', 5)->nullable();
            $table->string('creativity4', 5)->nullable();

            

            $table->text('teacher_comment')->nullable();
            $table->text('headteach_comment')->nullable();
            $table->string('next_term')->nullable();
            $table->string('dayschopen')->nullable();
            $table->string('dayspresent')->nullable();
            $table->string('pins')->nullable();
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
        Schema::dropIfExists('results');
    }
};
