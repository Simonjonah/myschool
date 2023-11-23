<?php

namespace App\Http\Controllers;

use App\Models\Classname;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Term;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function addsubject(){
       
        return view('dashboard.admin.addsubject');
    }

    public function addsubjectsc(){

        $view_mysections = Section::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.addsubjectsc', compact('view_mysections'));
    }

    public function createsubject (Request $request){
        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            'ref_no1' => ['required', 'string', 'max:255'],
            
        ]);
        $addsubjects = new Subject();
        $addsubjects->subjectname = $request->subjectname;
        $addsubjects->section = $request->section;
        $addsubjects->user_id = $request->user_id;
        $addsubjects->ref_no1 = $request->ref_no1;
        $addsubjects->connect = substr(rand(0,time()),0, 9);
        $addsubjects->save();
        if ($addsubjects) {
            return redirect()->back()->with('success', 'you have successfully registered');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function createsubjectsc(Request $request){
        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            'ref_no1' => ['required', 'string', 'max:255'],
            
        ]);
        $addsubjects = new Subject();
        $addsubjects->subjectname = $request->subjectname;
        $addsubjects->section = $request->section;
        $addsubjects->user_id = $request->user_id;
        $addsubjects->ref_no1 = $request->ref_no1;
        $addsubjects->connect = substr(rand(0,time()),0, 9);

        $addsubjects->save();
        if ($addsubjects) {
            return redirect()->back()->with('success', 'you have successfully registered');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function viewsubject(){
        $view_subjects = Subject::latest()->get();
        return view('dashboard.admin.viewsubject', compact('view_subjects'));
    }
    public function viewallsubjects(){
        $view_mysubjects = Subject::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.viewallsubjects', compact('view_mysubjects'));
    }


    public function subjectsassgned(){
        $view_mysubjects = Subject::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.subjectsassgned', compact('view_mysubjects'));
    }
    
    
    
    public function editsubject($id){
        $edit_subject = Subject::find($id);
        return view('dashboard.admin.editsubject', compact('edit_subject'));
    }

    public function editsubjectsc($id){
        $edit_subject = Subject::find($id);
        $view_sections = Section::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.editsubjectsc', compact('view_sections', 'edit_subject'));
    }

   
    
    public function deletesubject($id){
        $subjectsdelete = Subject::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have successfully deleted');
    }
    
    
    public function updatesubjectsc (Request $request, $id){
        $edit_subject = Subject::find($id);

        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            
        ]);
        $edit_subject->subjectname = $request->subjectname;
        $edit_subject->section = $request->section;
        $edit_subject->user_id = $request->user_id;
        $edit_subject->update();
        if ($edit_subject) {
            return redirect()->back()->with('success', 'you have successfully updated');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    

    public function updatesubject (Request $request, $id){
        $edit_subject = Subject::find($id);

        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            
        ]);
        $edit_subject->subjectname = $request->subjectname;
        $edit_subject->section = $request->section;
        $edit_subject->user_id = $request->user_id;
        $edit_subject->update();
        if ($edit_subject) {
            return redirect()->back()->with('success', 'you have successfully updated');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    
    public function assignsubject($id){
        $assigned_subject = Subject::find($id);

        $assigned_teacherto_subjects = Teacher::where('status', 'approved')->get();
        $assigned_highschool_subjects = Teacher::where('status', 'approved')->get();
        $classnames = Classname::all();
        
        return view('dashboard.admin.assignsubject', compact('classnames', 'assigned_highschool_subjects', 'assigned_teacherto_subjects', 'assigned_subject'));
    }

    public function nurserysubjects(){
        $viewnursery_subjects = Subject::latest()->get();
        return view('dashboard.admin.nurserysubjects', compact('viewnursery_subjects'));
    }
     
    public function allsubjects(){
        $viewnursery_subjects = Subject::all();
        return view('dashboard.admin.allsubjects', compact('viewnursery_subjects'));
    }

    public function subdelte($id){
        $viewnursery_subjects = Subject::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }
    
    public function deletesubjectsc($id){
        $viewnursery_subjects = Subject::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }

    public function assignedsubjects($id){
        $assigned_subject = Subject::find($id);

        $assigned_teacherto_subjects = Teacher::where('user_id', auth::guard('web')->id()
        )->get();
       
        $classnames = Classname::where('user_id', auth::guard('web')->id()
        )->get();

        $sections = Section::where('user_id', auth::guard('web')->id()
        )->get();
        
        return view('dashboard.assignedsubjects', compact('classnames', 'sections', 'assigned_teacherto_subjects', 'assigned_subject'));
    }

    public function viewsinglesubjectschool($user_id){
        $view_subjects1 = Subject::where('user_id', $user_id)->first();
        $view_subjects = Subject::where('user_id', $user_id)->get();
        $view_subjectcounts = Subject::where('user_id', $user_id)->count();
        return view('dashboard.admin.viewsinglesubjectschool', compact('view_subjects1', 'view_subjectcounts', 'view_subjects'));
    }

    
}
