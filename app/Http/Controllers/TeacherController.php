<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Alm;
use App\Models\Classname;
use App\Models\Domain;
use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //

    
    public function createteacher(Request $request){
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'phone' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'classname' => ['required', 'string'],
            'schoolname' => ['required', 'string'],
            'ref_no1' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'term' => ['required', 'string'],
            'motor' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8'],

            
        ]);
// dd($request->all());
       $add_teacher = new Teacher();
        $add_teacher->surname = $request->surname;
        $add_teacher->fname = $request->fname;
        $add_teacher->email = $request->email;
        $add_teacher->phone = $request->phone;
        $add_teacher->section = $request->section;
        $add_teacher->schoolname = $request->schoolname;
        $add_teacher->alms = $request->alms;
        $add_teacher->ref_no1 = $request->ref_no1;
        $add_teacher->academic_session = $request->academic_session;
        $add_teacher->user_id = $request->user_id;
        $add_teacher->motor = $request->motor;
        $add_teacher->logo = $request->logo;
        $add_teacher->address = $request->address;
       
        $add_teacher->term = $request->term;
        $add_teacher->ref_no = substr(rand(0,time()),0, 9);
        $add_teacher->classname = $request->classname;
        $add_teacher->password = \Hash::make($request->password);
       
        $add_teacher->save();
        if ($add_teacher) {
            return redirect()->route('teacher.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }




    public function teachercheck(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:teachers'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the teachers table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('teacher')->attempt($creds)) {
            return redirect()->route('teacher.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('teacher.login')->with('error', 'Failed to login');
        }
    }

    public function home(){
       
        
        return view('dashboard.teacher.home');
    }

    public function profile1() {
        $countresults = Result::where('teacher_id', auth::guard('teacher')->id()
        )->count();
        return view('dashboard.teacher.profile1', compact('countresults'));
    }

    public function settingsupdate(Request $request, $id){
        $edit_profiles = teacher::find($id);
        $edit_profiles = teacher::where('id', $id)->first();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'phone' => ['required', 'string'],
            'motor' => ['required', 'string'],
            'address' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
       // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_profiles['images'] = $path;
        $edit_profiles->name = $request->name;
        $edit_profiles->email = $request->email;
        $edit_profiles->address = $request->address;
        $edit_profiles->phone = $request->phone;
        $edit_profiles->motor = $request->motor;
        $edit_profiles->designation = $request->designation;


        $edit_profiles->update();

        return redirect()->back()->with('success', 'you have update successfully');

    }



    public function editstudentsc($ref_no){
        $edit_studentsc = Teacher::where('ref_no', $ref_no)->first();

        return view('dashboard.editstudentsc', compact('edit_studentsc'));
       
    }
    public function approveteacherbysc ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->first();
        $reject_student->status = 'approved';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function suspendteacherbysc ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->first();
        $reject_student->status = 'suspend';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }


    public function deleteteachersc ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->delete();
        
        return redirect()->back()->with('success', 'you have suspended successfully');
    }
    

    public function edittteachersc($ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
        $view_alms = Alm::where('user_id', auth::guard('web')->id()
        )->get();

        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sesions = Section::where('user_id', auth::guard('web')->id()
        )->get();
        $view_classes = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sessions = Academicsession::latest()->get();

        return view('dashboard.edittteachersc', compact('view_sessions', 'view_classes', 'view_sesions', 'view_terms', 'view_alms', 'edit_teacher'));
    }

    


    public function updatesteacher(Request $request, $ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'classname' => ['required', 'string'],
          
            'user_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'term' => ['required', 'string'],
            'motor' => ['nullable', 'string'],

            
        ]);
// dd($request->all());
        $edit_teacher->surname = $request->surname;
        // $edit_teacher->email = $request->email;
        $edit_teacher->phone = $request->phone;
        $edit_teacher->section = $request->section;
        // $edit_teacher->schoolname = $request->schoolname;
        $edit_teacher->alms = $request->alms;
        // $edit_teacher->ref_no1 = $request->ref_no1;
        $edit_teacher->academic_session = $request->academic_session;
        $edit_teacher->user_id = $request->user_id;
        $edit_teacher->motor = $request->motor;
       
        $edit_teacher->term = $request->term;
        $edit_teacher->classname = $request->classname;
       
        $edit_teacher->update();

        return redirect()->back()->with('success', 'you have successfully registered');

    }

    

    public function viewtteachersc($ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
        $view_alms = Alm::where('user_id', auth::guard('web')->id()
        )->get();

        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sesions = Section::where('user_id', auth::guard('web')->id()
        )->get();
        $view_classes = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sessions = Academicsession::latest()->get();

        return view('dashboard.viewtteachersc', compact('view_sessions', 'view_classes', 'view_sesions', 'view_terms', 'view_alms', 'edit_teacher'));
    }


    public function yourclassbyteacher($classname){
        $view_yourtudents = Teacher::where('classname', $classname)->first();
        $view_yourstudents = Student::where('classname', $classname)->get();
        return view('dashboard.teacher.yourclassbyteacher', compact('view_yourstudents','view_yourtudents'));
    }

    public function tecacherdomainadd($ref_no1){
        $view_yourtudents = Teacher::where('ref_no1', $ref_no1)->first();
        $view_yourdomains = Domain::where('ref_no1', $ref_no1)->get();
        return view('dashboard.teacher.tecacherdomainadd', compact('view_yourdomains','view_yourtudents'));
    }

    
    

    public function logout(){
        Auth::guard('teacher')->logout();
        return redirect('teacher/login');
    }
    

}
