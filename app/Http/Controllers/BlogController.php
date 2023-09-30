<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use PDF;

class BlogController extends Controller
{
    //
    public function addblog(){

        return view('dashboard.admin.addblog');
    }

    public function createblog (Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'messages' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        $add_blog = new Blog;
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $add_blog['images'] = $path;
        $add_blog->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        $add_blog->title = $request->title;
        $add_blog->messages = $request->messages;
        $add_blog->ref_no = substr(rand(0,time()),0, 9);
        $add_blog->save();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function viewblog(){
        $view_blogs = Blog::latest()->paginate(10);
        return view('dashboard.admin.viewblog', compact('view_blogs'));
    }

    public function blogview($ref_no){
        $viewsingle_blogs = Blog::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.blogview', compact('viewsingle_blogs'));
    }

    public function blogedit($ref_no){
        $edit_blogs = Blog::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.blogedit', compact('edit_blogs'));
    }
    public function updateblog(Request $request, $ref_no){
        $edit_blogs = Blog::where('ref_no', $ref_no)->first();

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'messages' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
      
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_blogs['images'] = $path;
        $edit_blogs->title = $request->title;
        $edit_blogs->messages = $request->messages;
        $edit_blogs->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        $edit_blogs->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function blogeapproved($ref_no){
        $approve_blog = Blog::where('ref_no', $ref_no)->first();
        $approve_blog->status = 'approved';
        $approve_blog->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function blogesuspend($ref_no){
        $approve_blog = Blog::where('ref_no', $ref_no)->first();
        $approve_blog->status = 'suspend';
        $approve_blog->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function blogedelete($ref_no){
        $delete_blog = Blog::where('ref_no', $ref_no)->delete();
       
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function singleblog($slug){
        $sigle_blogs = Blog::where('slug', $slug)->first();
        $all_blogs = Blog::latest()->where('status', 'approved')->get();

        return view('pages.singleblog', compact('sigle_blogs', 'all_blogs'));
    }
    

public function search(Request $request){
    $searchQuery = $request->input('title');

    $posts = Blog::where('title', 'like', '%' . $searchQuery . '%')
                 ->orWhere('messages', 'like', '%' . $searchQuery . '%')
                 ->get();
                 
              
    return view('pages.results', ['posts' => $posts]);
}
//SCHOOL SECTION
public function addaverts(){

    $view_sesions = Academicsession::latest()->get();
    return view('dashboard.addaverts', compact('view_sesions'));
}


public function createadverts (Request $request){
    $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'messages' => ['required', 'string'],
        'email' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'user_id' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
        'address' => ['required', 'string'],
        'logo' => ['required', 'string'],
        'images' => 'nullable|mimes:jpg,png,jpeg'
    ]);
    // dd($request->all());
    $add_adverts = new Blog;
    if ($request->hasFile('images')){

        $file = $request['images'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('images')->storeAs('resourceimages', $filename);

    }
    $add_adverts['images'] = $path;
    $add_adverts->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
    $add_adverts->user_id = $request->user_id;
    $add_adverts->email = $request->email;
    $add_adverts->phone = $request->phone;
    $add_adverts->address = $request->address;
    $add_adverts->logo = $request->logo;
    $add_adverts->schoolname = $request->schoolname;
    $add_adverts->title = $request->title;
    $add_adverts->messages = $request->messages;
    $add_adverts->ref_no = substr(rand(0,time()),0, 9);
    $add_adverts->save();

    return redirect()->route('add2ndimage', ['ref_no' =>$add_adverts->ref_no]); 


}
public function updateeadverts (Request $request, $ref_no){
    $edit_myblogs = Blog::where('ref_no', $ref_no)->first();

    $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'messages' => ['required', 'string'],
        'email' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'user_id' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
        'address' => ['required', 'string'],
        'logo' => ['required', 'string'],
        'images' => 'nullable|mimes:jpg,png,jpeg'
    ]);
    // dd($request->all());
    
    if ($request->hasFile('images')){

        $file = $request['images'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('images')->storeAs('resourceimages', $filename);

    }
    $edit_myblogs['images'] = $path;
    $edit_myblogs->user_id = $request->user_id;
    $edit_myblogs->email = $request->email;
    $edit_myblogs->phone = $request->phone;
    $edit_myblogs->address = $request->address;
    $edit_myblogs->logo = $request->logo;
    $edit_myblogs->schoolname = $request->schoolname;
    $edit_myblogs->title = $request->title;
    $edit_myblogs->messages = $request->messages;
    // $edit_myblogs->ref_no = substr(rand(0,time()),0, 9);
    $edit_myblogs->update();

    return redirect()->route('add2ndimage', ['ref_no' =>$edit_myblogs->ref_no]); 

}
public function viewyouradverts(){
    $view_myblogs = Blog::where('user_id', auth::guard('web')->id())->get();
    return view('dashboard.viewyouradverts', compact('view_myblogs'));
}

public function viewadverts($slug){
    $viewsingle_myblogs = Blog::where('slug', $slug)->first();
    return view('dashboard.viewadverts', compact('viewsingle_myblogs'));
}

public function editadvert($ref_no){
    $edit_myblogs = Blog::where('ref_no', $ref_no)->first();
    return view('dashboard.editadvert', compact('edit_myblogs'));
}

public function add2ndimage($ref_no){
    $edit_myblogs = Blog::where('ref_no', $ref_no)->first();
    return view('dashboard.add2ndimage', compact('edit_myblogs'));
}

public function approveadvert($slug){
    $approved_teacher = Blog::where('slug', $slug)->first();
    $approved_teacher->status = 'approved';
    $approved_teacher->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function suspendadvert($slug){
    $approved_teacher = Blog::where('slug', $slug)->first();
    $approved_teacher->status = 'suspend';
    $approved_teacher->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function rejectadvert($slug){
    $approved_teacher = Blog::where('slug', $slug)->first();
    $approved_teacher->status = 'reject';
    $approved_teacher->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}



    
}
