<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    //
    public function eventregisters(Request $request){
        $request->validate([
            'title' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:competitions'],
            'phone' => ['required', 'string', 'unique:competitions'],
            'schoolname' => ['required', 'string'],
            'fname' => ['required', 'string'],
            'middlename' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'event_id' => ['required', 'string'],
            
            'images' => 'required|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        $add_event = new Competition();
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $add_event['images'] = $path;
        $add_event->title = $request->title;
        $add_event->event_id = $request->event_id;
        $add_event->email = $request->email;
        $add_event->phone = $request->phone;
        $add_event->fname = $request->fname;
        $add_event->middlename = $request->middlename;
        $add_event->surname = $request->surname;
        $add_event->schoolname = $request->schoolname;
        $add_event->classname = $request->classname;
        // $add_event->linkin = $request->linkin;
        
        $add_event->ref_no = substr(rand(0,time()),0, 9);
        $add_event->save();

        return redirect()->route('thankyou', ['ref_no' =>$add_event->ref_no]); 


    }

    public function thankyou($ref_no){
        $vew_regid = Competition::where('ref_no', $ref_no)->first();
        return view('pages.thankyou', compact('vew_regid'));
    }

    public function deletecomstudent($ref_no){
        $vew_regid = Competition::where('ref_no', $ref_no)->first();

        return redirect()->back()->with('success', 'You have deleted successfully');
    }
    
    public function viewcompetitions(){
        $vew_competitions = Competition::latest()->get();
        return view('dashboard.admin.viewcompetitions', compact('vew_competitions'));
    }
    

}
