<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
{
    //

    public function addterm(){

        return view('dashboard.addterm');
    }

    public function createterm (Request $request){
        $request->validate([

            'user_id' => ['required', 'string', 'max:255'],
            'term' => ['required', 'string', 'max:255'],
            'ref_no1' => ['required', 'string', 'max:255'],
        ]);
        // dd($request->all());
        $add_term = new Term;
        $add_term->user_id = $request->user_id;
        $add_term->term = $request->term;
        $add_term->ref_no1 = $request->ref_no1;
        $add_term->connect = substr(rand(0,time()),0, 9);

        $add_term->save();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    public function viewallterm(){
        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.viewallterm', compact('view_terms'));
    }
    public function editterm($id){
        $edit_terms = Term::find($id);

        // $edit_terms = Term::where('ref_no', $ref_no)->first();
        return view('dashboard.editterm', compact('edit_terms'));
    }

    public function updateclassessc (Request $request, $id){
        $edit_terms = Term::find($id);

        $request->validate([

            'user_id' => ['required', 'string', 'max:255'],
            'term' => ['required', 'string', 'max:255'],
        ]);
    
        $edit_terms->user_id = $request->user_id;
        $edit_terms->term = $request->term;
        $edit_terms->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    public function deleteterm($connect){
        $edit_events = Term::where('connect', $connect)->delete();

     

        return redirect()->back()->with('success', 'you have added successfully');

    }


    
    

    public function viewterm($term){
        $view_termtudents = Term::where('term', $term)->first();
        $view_termtudents = Student::where('term', $term)->where('section', 'Primary')
        ->where('user_id', auth::guard('web')->id())
        ->get();

        $view_student_secondaries = Term::where('term', $term)->first();
        $view_student_secondaries = Student::where('term', $term)->where('user_id', auth::guard('web')->id())
        ->where('section', 'Secondary')->get();

        return view('dashboard.viewterm', compact('view_student_secondaries', 'view_termtudents'));
    }

}
