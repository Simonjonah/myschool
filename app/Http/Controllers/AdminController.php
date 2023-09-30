<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Classactivity;
use App\Models\Classname;
use App\Models\Result;
use App\Models\Guardian;
use App\Models\Notification;
use App\Models\Payment;
// use App\Models\Query;
use App\Models\User;
use App\Models\Subject;
use App\Models\Transaction;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function create(Request $request){
        //create method
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'agree' => ['required', 'string', 'max:255'],
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => 'required|min:5|max:30|same:cpassword'
           
        ]);
        $registration = new Admin();
        $registration->fname = $request->fname;
        $registration->surname = $request->surname;
       $registration->role = 0;
        $registration->email = $request->email;
        $registration->password = \Hash::make($request->password);
        $registration->save();
 
        if ($registration) {
            return redirect()->route('admin.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    

    public function check(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:admins'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the admins table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('admin.login')->with('error', 'Failed to login');
        }
    }

    public function home(){
        $countstudent = User::where('role', null)->count();
        $countsubjects = Subject::count();
        $countsubjecthigh = Subject::where('section', 'Secondary')->count();
        $countsubjectprim = Subject::where('section', 'Primary')->count();
      //  $countteacher = User::where('status', 'teacher')->count();
       //= User::where('section', 'Primary')
       // ->where('status', 'teacher')->count();
        // $countteachersecondary = User::where('section', 'Secondary')
        // ->where('status', 'teacher')->count();
        $countstudenttsuspend = User::where('status', 'suspend')->count();
        $countstudentapprove = User::where('status', 'suspend')->count();
        $countstudentreject = User::where('status', 'reject')->count();
        // $countsqueries = Query::count();
      //  Query::where('status', 'reply')->count();
      //  $countstransactions = Transaction::count();
        //$countspayments = Payment::count();
        //$countsnoti = Notification::count();
      //  $countsactivity = Classactivity::count();
        $countsclasses = Classname::count();
        // $countsparent = Guardian::count();
        // $countsecparent = Guardian::where('section', 'Primary')->count();
        // $countprimparent = Guardian::where('section', 'Secondary')->count();

        
        $view_lecturers = User::orderby('created_at', 'DESC')->where('status', 'teacher')->take(4)->get();
        $view_students = User::orderby('created_at', 'DESC')->where('status', null)->take(5)->get();
        // $view_payments = Transaction::orderby('created_at', 'DESC')->take(5)->get();
        // $view_results = Result::orderBy('created_at', 'DESC')->take(5)->get();
        // $count_results = Result::count();
        
        return view('dashboard.admin.home', compact('view_lecturers', 'countsclasses', 'view_students', 'countstudentreject', 'countstudentapprove', 'countstudenttsuspend', 'countsubjectprim', 'countsubjecthigh', 'countsubjects', 'countstudent'));
    }

    public function profile() {

        return view('dashboard.admin.profile');
    }

    public function settingsupdate(Request $request, $id){
        $edit_profiles = Admin::find($id);
        $edit_profiles = Admin::where('id', $id)->first();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'phone' => ['required', 'string'],
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
        $edit_profiles->designation = $request->designation;


        $edit_profiles->update();

        return redirect()->back()->with('success', 'you have update successfully');

    }



    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    
    
}
