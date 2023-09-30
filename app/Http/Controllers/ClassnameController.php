<?php

namespace App\Http\Controllers;

use App\Models\Classname;
use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ClassnameController extends Controller
{
    public function addclass (){

        return view('dashboard.admin.addclass');
    }

    public function createclasses (Request $request){
        $request->validate([

            'user_id' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'connect' => ['required', 'string', 'max:255'],
            
        ]);
        $addclasses = new Classname();
        $addclasses->user_id = $request->user_id;
        $addclasses->classname = $request->classname;
        $addclasses->section = $request->section;
        $addclasses->connect = $request->connect;
        $addclasses->ref_no = substr(rand(0,time()),0, 9);
       
        $addclasses->save();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function addclassessc(){
        $view_classes_scs = Section::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.addclassessc', compact('view_classes_scs'));
    }


    public function createclassessc (Request $request){
        $request->validate([

            'user_id' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'ref_no1' => ['required', 'string', 'max:255'],
            
        ]);
        $addclasses = new Classname();
        $addclasses->user_id = $request->user_id;
        $addclasses->classname = $request->classname;
        $addclasses->section = $request->section;
        $addclasses->ref_no1 = $request->ref_no1;
        $addclasses->connect = substr(rand(0,time()),0, 9);
       
        $addclasses->save();

        return redirect()->back()->with('success', 'you have added successfully');
    }


    
    public function viewclassestables(){
        $view_clesses = Classname::orderBy('created_at', 'ASC')->get();
        return view('dashboard.admin.viewclassestables', compact('view_clesses'));
    }

    public function editclasses($id){
        $edit_clesses = Classname::find($id);
        return view('dashboard.admin.editclasses', compact('edit_clesses'));
    }

    public function editclas1($ref_no){
        $edit_cless1 = Classname::where('ref_no', $ref_no)->first();
        return view('dashboard.editclas1', compact('edit_cless1'));
    }
    

    public function viewallclasses(){
        $view_classesbysc = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.viewallclasses', compact('view_classesbysc'));
    }

    
    public function updatecclassessc (Request $request, $ref_no){
        $edit_cless1 = Classname::where('ref_no', $ref_no)->first();
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            
        ]);

        $edit_cless1->classname = $request->classname;
        $edit_cless1->section = $request->section;
        $edit_cless1->user_id = $request->user_id;

        $edit_cless1->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }



    public function updateclass (Request $request, $id){
        $edit_clesses = Classname::find($id);
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            
        ]);

        $edit_clesses->classname = $request->classname;
        $edit_clesses->section = $request->section;

        $edit_clesses->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function classesdelete($id){
        $classdelted = Classname::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function classrooms($classname){
        $view_classstudents = Classname::where('classname', $classname)->first();
        $view_classstudents = user::where('classname', $classname)
        ->where('section', 'Primary')->get();

        $view_student_abujas = Classname::where('classname', $classname)->first();
        $view_student_abujas = user::where('classname', $classname)
        ->where('section', 'Secondary')->get();

        $view_classes = Classname::all();
    



        return view('dashboard.admin.classrooms', compact('view_classes', 'view_student_abujas', 'view_classstudents'));
    }


    public function viewclassesbysc($classname){
        $view_classnametudents = Classname::where('classname', $classname)->first();
        $view_classnametudents = Student::where('classname', $classname)
        ->where('user_id', auth::guard('web')->id())
        ->get();

        $view_student_secondaries = Classname::where('classname', $classname)->first();
        $view_student_secondaries = Student::where('classname', $classname)->where('user_id', auth::guard('web')->id())
        ->where('section', 'Secondary')->get();

        return view('dashboard.viewclassesbysc', compact('view_student_secondaries', 'view_classnametudents'));
    }

    


    public function printregclass($classname){
        $print_studentclasses = Classname::where('classname', $classname)->first();
        $print_studentclasses = user::where('classname', $classname)
        ->where('status', null)
        ->where('section', 'Primary')->get();

        return view('dashboard.admin.printregclass', compact('print_studentclasses'));
    }


    public function classes($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = user::where('classname', $classname)
        ->where('status', null)->get();
        return view('dashboard.classes', compact('view_classes'));
    }

    public function classpayments($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = Transaction::where('classname', $classname)->get();
        return view('dashboard.account.classpayments', compact('view_classes'));
    }
   

    

    public function classpaymentad($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = Transaction::where('classname', $classname)->get();
        return view('dashboard.admin.classpaymentad', compact('view_classes'));
    }

    public function addresultsad($classname){
        $view_addresults = Classname::where('classname', $classname)->first();
        $view_addresults = User::where('role', null)->where('classname', $classname)->latest()->get();
        return view('dashboard.admin.addresultsad', compact('view_addresults'));
    }

    public function viewclassresults($classname){
        $view_addresults = Classname::where('classname', $classname)->first();
        $view_addresults = Result::where('classname', $classname)->latest()->get();
        return view('dashboard.admin.viewclassresults', compact('view_addresults'));
    }
    

    
    
}
