<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
// use Cviebrock\EloquentSluggable\Services\SlugService;

use PDF;

class EventController extends Controller
{
    //
    public function addevent(){

        return view('dashboard.admin.addevent');
    }

    public function createteevent (Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        $add_event = new Event;
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $add_event['images'] = $path;
        $add_event->slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        $add_event->title = $request->title;
        $add_event->message = $request->message;
        $add_event->ref_no = substr(rand(0,time()),0, 9);
        $add_event->save();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    public function viewevents(){
        $view_events = Event::latest()->paginate(10);
        return view('dashboard.admin.viewevents', compact('view_events'));
    }
    public function eventview($ref_no){
        $view_events = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.eventview', compact('view_events'));
    }

    public function eventedit($ref_no){
        $edit_events = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.eventedit', compact('edit_events'));
    }
    public function updateevent(Request $request, $ref_no){
        $edit_events = Event::where('ref_no', $ref_no)->first();

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
      
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_events['images'] = $path;
        $edit_events->title = $request->title;
        $edit_events->message = $request->message;
        $edit_events->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function eventeapproved($ref_no){
        $approve_event = Event::where('ref_no', $ref_no)->first();
        $approve_event->status = 'approved';
        $approve_event->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function eventesuspend($ref_no){
        $approve_event = Event::where('ref_no', $ref_no)->first();
        $approve_event->status = 'suspend';
        $approve_event->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    public function eventedelete($ref_no){
        $approve_event = Event::where('ref_no', $ref_no)->delete();
       
        return redirect()->back()->with('success', 'you have deleted successfully');
    }
    
    public function viewsingleevent($ref_no){
        $viewsingle_events = Event::where('ref_no', $ref_no)->first();
        $all_events = Event::latest()->where('status', 'approved')->get();
       
        return view('pages.viewsingleevent', compact('viewsingle_events','all_events'));
    }
}
