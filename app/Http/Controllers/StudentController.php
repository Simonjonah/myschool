<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Alm;
use App\Models\Classname;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacherassign;
use App\Models\Term;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function addstudent(){
        $view_classes = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sesions = Academicsession::latest()->get();
        
        $view_alms = Alm::where('user_id', auth::guard('web')->id()
        )->get();

        $view_sections = Section::where('user_id', auth::guard('web')->id()
        )->get();

        return view('dashboard.addstudent', compact('view_sections', 'view_alms', 'view_terms', 'view_classes', 'view_sesions'));
    }

    

    public function createstudent (Request $request){
       
        $request->validate([
            'fname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'surname' => ['nullable', 'string'],
            'user_id' => ['nullable', 'string'],
            'schoolname' => ['nullable', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['nullable', 'string'],
            'lga' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'dob' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'term' => ['required', 'string'],
            'ref_no1' => ['required', 'string'],
            'section' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'regnumber' => ['required', 'string',  'max:255', 'unique:students'],
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new Student();

        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->surname = $request->surname;
        $add_adimission->age = $request->age;
        $add_adimission->slug = $request->slug;
        $add_adimission->state = $request->state;
        $add_adimission->fname = $request->fname;
        $add_adimission->lga = $request->lga;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;

        $add_adimission->address = $request->address;
        $add_adimission->schoolname = $request->schoolname;
        
       $add_adimission->alms = $request->alms;
        $add_adimission->classname = $request->classname;
        $add_adimission->regnumber = $request->regnumber;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        $add_adimission->user_id = $request->user_id;
        // $add_adimission->term = $request->term;
        // $add_adimission->classname = $request->classname;
         $add_adimission->ref_no = substr(rand(0,time()),0, 9);
         
        
        $add_adimission->ref_no1 = $request->ref_no1;

        $add_adimission->save();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }



    public function updatescstudent (Request $request, $ref_no1){
        $edit_primarypupils = Student::where('ref_no1', $ref_no1)->first();

        $request->validate([
            'fname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'surname' => ['nullable', 'string'],
            'schoolname' => ['nullable', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['nullable', 'string'],
            'lga' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'dob' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'term' => ['required', 'string'],
            'section' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'regnumber' => ['required', 'string',  'max:255'],
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        // $add_adimission = new Student();

        $edit_primarypupils['images'] = $path;
        $edit_primarypupils->surname = $request->surname;
        $edit_primarypupils->middlename = $request->middlename;
        $edit_primarypupils->surname = $request->surname;
        $edit_primarypupils->age = $request->age;
        $edit_primarypupils->state = $request->state;
        $edit_primarypupils->fname = $request->fname;
        $edit_primarypupils->lga = $request->lga;
        $edit_primarypupils->dob = $request->dob;
        $edit_primarypupils->gender = $request->gender;

        $edit_primarypupils->address = $request->address;
        $edit_primarypupils->schoolname = $request->schoolname;
        
       $edit_primarypupils->alms = $request->alms;
        $edit_primarypupils->classname = $request->classname;
        $edit_primarypupils->regnumber = $request->regnumber;
        $edit_primarypupils->academic_session = $request->academic_session;
        $edit_primarypupils->section = $request->section;
        $edit_primarypupils->academic_session = $request->academic_session;
        $edit_primarypupils->term = $request->term;
       
        $edit_primarypupils->update();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }


    public function viewyourstudentsprimary(){
        $view_primarypupils = Student::where('user_id', auth::guard('web')->id()
        )->where('section', 'Primary')->get();
        return view('dashboard.viewyourstudentsprimary', compact('view_primarypupils'));
    }
   
    public function viewyourstudentsecondary(){
        $view_secondarystudents = Student::where('user_id', auth::guard('web')->id())->get();
        return view('dashboard.viewyourstudentsecondary', compact('view_secondarystudents'));
    }
    
    public function editstudentsc($ref_no1){
        $edit_primarypupils = Student::where('ref_no1', $ref_no1)->first();
        $view_classes = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sesions = Academicsession::latest()->get();
        
        $view_alms = Alm::where('user_id', auth::guard('web')->id()
        )->get();

        $view_sections = Section::where('user_id', auth::guard('web')->id()
        )->get();

        return view('dashboard.editstudentsc', compact('view_sections', 'view_alms', 'view_sesions', 'view_terms', 'view_classes', 'edit_primarypupils'));
    }


    public function addresults($ref_no1){
        $view_studentsubject = Student::where('ref_no1', $ref_no1)->first();
         
        // $view_teachersubjects = Subject::all();
        $view_teachersubjects = Subject::where('user_id', auth::guard('web')->id())->get();
        return view('dashboard.addresults', compact('view_studentsubject', 'view_teachersubjects'));
    }

  public function deletestudentsc($ref_no1){
    $edit_primarypupils = Student::where('ref_no1', $ref_no1)->delete();

    return redirect()->back()->with('success', 'You have successfully deleted');
  }


  public function viewstudent($ref_no){
    $view_students = Student::where('ref_no', $ref_no)->first();
    return view('dashboard.admin.viewstudent', compact('view_students'));
    }
    public function editstudent($ref_no){
        $edit_students = Student::where('ref_no', $ref_no)->first();
        $add_class = Classname::all();
        return view('dashboard.admin.editstudent', compact('add_class', 'edit_students'));
    }
    public function studentpdf($ref_no){
        $print_students = Student::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.studentpdf', compact('print_students'));
    }

    public function schoolstudents($user_id){
        // $views_students = User::where('user_id', $user_id)->first();
        $views_students = Student::where('user_id', $user_id)->get();

        return view('dashboard.admin.schoolstudents', compact('views_students'));
    }

     

    public function suspendstudent($ref_no){
        $suspend_student = Student::where('ref_no', $ref_no)->first();
        $suspend_student->status = 'suspend';
        $suspend_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function suspendstudents(){
        $suspend_students = Student::where('status', 'suspend')->get();
        return view('dashboard.admin.suspendstudents', compact('suspend_students'));
    }

    public function viewsuspended(){
        $suspend_students = Student::where('status', 'suspend')->get();
        return view('dashboard.admin.viewsuspended', compact('suspend_students'));
    }

    public function studentsaddmit($ref_no){
        $admit_student = Student::where('ref_no', $ref_no)->first();
        $admit_student->status = 'admitted';
        $admit_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    
    public function rejectstudent($ref_no){
        $reject_student = Student::where('ref_no', $ref_no)->first();
        $reject_student->status = 'reject';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

  
  public function addresultsbyteacher($ref_no){
    $view_studentsubject = Student::where('ref_no', $ref_no)->first();
     
    //$view_teachersubjects = Subject::all();
   $view_teachersubjects = Teacherassign::where('teacher_id', auth::guard('teacher')->id()
   )->get();

    return view('dashboard.teacher.addresultsbyteacher', compact('view_teachersubjects','view_studentsubject'));
}

 

public function searchclass(Request $request){
    $request->validate([
        'classname' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
    ]);
    if($view_students = Student::where('classname', $request->classname)
    ->where('schoolname', $request->schoolname)
    ->exists()) {
        $view_students = Student::orderby('created_at', 'DESC')
        ->where('schoolname', $request->schoolname)
        ->where('classname', $request->classname)
   
        ->get(); 
        }else{
            return redirect()->back()->with('fail', 'There is no students in these class!');
        }
        return view('dashboard.admin.yourclass', compact('view_students'));

    }



    public function searchresults(Request $request){
        $request->validate([
            'classname' => ['required', 'string'],
            'schoolname' => ['required', 'string'],
        ]);
        if($view_students = Student::where('classname', $request->classname)
        ->where('schoolname', $request->schoolname)
        ->exists()) {
            $view_students = Student::orderby('created_at', 'DESC')
            ->where('schoolname', $request->schoolname)
            ->where('classname', $request->classname)
       
            ->get(); 
            }else{
                return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.yourclass', compact('view_students'));
    
        }


    public function adminprogress(){
        $view_primarypupls = Student::latest()->get();
        return view('dashboard.admin.adminprogress', compact('view_primarypupls'));
    }




}
