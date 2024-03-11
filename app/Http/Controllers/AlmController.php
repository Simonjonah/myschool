<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alm;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;


class AlmController extends Controller
{
    public function addalms(){

        return view('dashboard.addalms');
    }

    public function createalms (Request $request){
        $request->validate([

            'user_id' => ['required', 'string', 'max:255'],
            'alms' => ['required', 'string',  'max:255'],
            'ref_no1' => ['required', 'string',  'max:255'],
        ]);
        // dd($request->all());
        $add_alms = new Alm;
        $add_alms->user_id = $request->user_id;
        $add_alms->alms = $request->alms;
        $add_alms->ref_no1 = $request->ref_no1;
        $add_alms->connect = substr(rand(0,time()),0, 9);


        $add_alms->save();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    public function viewallalms(){
        $view_almss = Alm::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.viewallalms', compact('view_almss'));
    }
    public function editalms($id){
        $edit_almss = Alm::where('id', $id)->first();

        // $edit_almss = Alm::where('id', $id)->first();
        return view('dashboard.editalms', compact('edit_almss'));
    }

    public function updatealms (Request $request, $id){
        $edit_almss = Alm::where('id', $id)->first();


        $request->validate([

            'user_id' => ['required', 'string', 'max:255'],
            'alms' => ['required', 'string', 'max:255'],
        ]);
    
        $edit_almss->user_id = $request->user_id;
        $edit_almss->alms = $request->alms;
        $edit_almss->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    public function deletealms($connect){
        $edit_events = Alm::where('connect', $connect)->delete();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function viewalms($alms){
        $view_almstudents = Alm::where('alms', $alms)->first();
        $view_almstudents = Student::where('alms', $alms)->where('section', 'Primary')
        ->where('user_id', auth::guard('web')->id())
        ->get();

        $view_student_secondaries = Alm::where('alms', $alms)->first();
        $view_student_secondaries = Student::where('alms', $alms)->where('user_id', auth::guard('web')->id())
        ->where('section', 'Secondary')->get();

        return view('dashboard.viewalms', compact('view_student_secondaries', 'view_almstudents'));
    }

}