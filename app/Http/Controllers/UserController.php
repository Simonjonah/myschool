<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Alm;
use App\Models\Blog;
use App\Models\Classactivity;
use App\Models\User;
use App\Models\Classname;
use App\Models\Domain;
use App\Models\Query;
use App\Models\Subject;
use App\Models\Teacherassign;
use App\Models\Result;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Term;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Cviebrock\EloquentSluggable\Services\SlugService;
use PDF;

class UserController extends Controller
{
    public function add_childto_parents (Request $request){
       
        $request->validate([
            'schoolname' => ['nullable', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string'],
            'lga' => ['required', 'string'],
            'establishdate' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'logo' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'plans' => ['required', 'string'],
            'ref_no' => ['required', 'string'],
            'section' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => 'required|min:5|max:30|same:cpassword',
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new User();

        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->previouschoolname = $request->previouschoolname;
        $add_adimission->guardian_id = $request->guardian_id;
        $add_adimission->fname = $request->fname;
        $add_adimission->age = $request->age;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->bloodgroup = $request->bloodgroup;
        $add_adimission->genotype = $request->genotype;
        
       $add_adimission->preclassname = $request->preclassname;
        $add_adimission->classname = $request->classname;
        $add_adimission->lastschooladdress = $request->lastschooladdress;
        $add_adimission->disability = $request->disability;
        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        // $add_adimission->state = $request->state;
        // $add_adimission->term = $request->term;
        // $add_adimission->classname = $request->classname;
         $add_adimission->ref_no = $request->ref_no;
        
        // $add_adimission->password = \Hash::make($request->password);
        $add_adimission->ref_no1 = substr(rand(0,time()),0, 9);

        $add_adimission->save();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }

    public function secondregistration($ref_no){
        $addsec_registration = User::where('ref_no', $ref_no)->first();
        return view('pages.secondregistration', compact('addsec_registration'));
    }
    public function thirdregistration($ref_no){
        $addthird_registration = User::where('ref_no', $ref_no)->first();
        return view('pages.thirdregistration', compact('addthird_registration'));
    }

    


   


   

  
    public function medicalreports($ref_no){
        $addthid_admission = User::where('ref_no', $ref_no)->first();
        return view('pages.medicalreports', compact('addthid_admission'));
    }
    
    public function updateadmission (Request $request, $ref_no1){

        $edit_students = User::where('ref_no1', $ref_no1)->first();
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'middlename' => ['required', 'string'],
            'age' => ['required', 'string'],
            'bloodgroup' => ['required', 'string'],
            'genotype' => ['required', 'string'],
            'previouschoolname' => ['required', 'string'],
            'preclassname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'lastschooladdress' => ['required', 'string'],
            'disability' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'section' => ['required', 'string'],
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


        $edit_students['images'] = $path;
        $edit_students->surname = $request->surname;
        $edit_students->middlename = $request->middlename;
        $edit_students->previouschoolname = $request->previouschoolname;
        $edit_students->fname = $request->fname;
        $edit_students->age = $request->age;
        $edit_students->dob = $request->dob;
        $edit_students->gender = $request->gender;
        $edit_students->bloodgroup = $request->bloodgroup;
        $edit_students->genotype = $request->genotype;
        
       $edit_students->preclassname = $request->preclassname;
        $edit_students->classname = $request->classname;
        $edit_students->lastschooladdress = $request->lastschooladdress;
        $edit_students->disability = $request->disability;
        $edit_students->section = $request->section;
       
        $edit_students->update();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }



    public function printadmissionform($ref_no){
        $print_admissionform = User::where('ref_no', $ref_no)->first();
        return view('pages.printadmissionform', compact('print_admissionform'));
    }

   public function viewschool($ref_no1){
        $viewsingleschool = User::where('ref_no1', $ref_no1)->first();
    return view('dashboard.admin.viewschool', compact('viewsingleschool'));
   }

   
    public function viewschreview(){
        $school_reviews = User::where('status', null)->latest()->get();
    return view('dashboard.admin.viewschreview', compact('school_reviews'));
    }
    public function viewschapproved(){
        $school_approves = User::where('status', 'admitted')->latest()->get();
    return view('dashboard.admin.viewschapproved', compact('school_approves'));
    }

    public function schoolstudent($schoolname){
        $schools_students = User::where('schoolname', $schoolname)->first();
        $schools_studentddss = Student::where('schoolname', $schoolname)->latest()->get();
    return view('dashboard.admin.schoolstudent', compact('schools_studentddss', 'schools_students'));
    }

    

    public function viewschrejected(){
        $school_approves = User::where('status', 'reject')->latest()->get();
    return view('dashboard.admin.viewschrejected', compact('school_approves'));
    }
    

    public function rejectschool($ref_no1){
        $reject_student = User::where('ref_no1', $ref_no1)->first();
        $reject_student->status = 'reject';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function suspendschool($ref_no1){
        $reject_student = User::where('ref_no1', $ref_no1)->first();
        $reject_student->status = 'suspend';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    public function rejectedstudent(){
        $reject_students = User::where('status', 'reject')->get();
        return view('dashboard.admin.rejectedstudent', compact('reject_students'));
    }
    
    public function schoolsaddmit($ref_no1){
        $admit_student = User::where('ref_no1', $ref_no1)->first();
        $admit_student->status = 'admitted';
        $admit_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function admittedstudents(){
        $admit_students = User::where('section', 'Secondary')->get();
        return view('dashboard.admin.admittedstudents', compact('admit_students'));
    }
    public function addregno($ref_no1){
        $student_regno = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.addregno', compact('student_regno'));
    }

    public function addingregno(Request $request, $id){
        $student_regno = User::where('id', $id)->first();
        $request->validate([
            //'regnumber' => ['required', 'string', 'max:255'],
            'regnumber' => ['required', 'string', 'max:255', 'unique:users'],

        ]);
       
        $student_regno->regnumber = $request->regnumber;
        $student_regno->update();
        if ($student_regno) {
            return redirect()->back()->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    
    public function schoolpdf($ref_no1){
        $print_students = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.schoolpdf', compact('print_students'));
    }

    public function medicalspdf($ref_no1){
        $printmedi_students = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.medicalspdf', compact('printmedi_students'));
    }
    public function allstudents(){
        $all_students = User::latest()->where('role', null)->get();
        return view('dashboard.admin.allstudents', compact('all_students'));
    }
    public function allstudentpdf(){
        $printall_students = User::latest()->get();
        return view('dashboard.admin.allstudentpdf', compact('printall_students'));
    }

    public function allcrechepdf(){
        $printallcreche_students = User::where('section', 'Creche')->latest()->get();
        return view('dashboard.admin.allcrechepdf', compact('printallcreche_students'));
    }

    public function allnurserypdf(){
        $printallnursery_students = User::where('section', 'Nursery')->latest()->get();
        return view('dashboard.admin.allnurserypdf', compact('printallnursery_students'));
    }
    public function allprimarypdf(){
        $printallPrimary_students = User::where('section', 'Primary')->latest()->get();
        return view('dashboard.admin.allprimarypdf', compact('printallPrimary_students'));
    }

    public function allhighschpdf(){
        $printallhigh_students = User::where('section', 'High School')->latest()->get();
        return view('dashboard.admin.allhighschpdf', compact('printallhigh_students'));
    }


 

    public function checkfirst (Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the admins table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('web.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('login')->with('error', 'Failed to login');
        }

    }

    public function home(){

        $countyourresults = Result::where('user_id', auth::guard('web')->id())->count();
        $countteachers = Teacher::where('user_id', auth::guard('web')->id())->count();
        $countclasses = Classname::where('user_id', auth::guard('web')->id())->count();
        $countmysubjects = Subject::where('user_id', auth::guard('web')->id())->count();
        $countstudents = Student::where('user_id', auth::guard('web')->id())->count();
        $countpsyco = Domain::where('user_id', auth::guard('web')->id())->count();
        $countnews = Blog::where('user_id', auth::guard('web')->id())->count();

        return view('dashboard/home', compact('countnews', 'countpsyco', 'countstudents', 'countclasses','countteachers', 'countmysubjects', 'countyourresults'));
    }

    public function profile($ref_no1){
        $view_profile = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.profile', compact('view_profile'));
    }

    public function admisionletter(){

        return view('dashboard.admisionletter');
    }

    public function registerteacher(){
       $dsplay_classes = Classname::all();
        return view('dashboard.registerteacher', compact('dsplay_classes'));
    }

    public function createschool (Request $request){
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'plans' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'string'],
            'address' => ['required', 'string'],
            'schoolname' => ['required', 'string'],
            'motor' => ['required', 'string'],
            'logo' => 'required|mimes:jpg,png,jpeg'

        ]);

        if ($request->hasFile('logo')){

            $file = $request['logo'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('schools', $filename);

        }

        $add_school = new User();
        $add_school['logo'] = $path;
        $add_school->schoolname = $request->schoolname;
        $add_school->surname = $request->surname;
        $add_school->fname = $request->fname;
        $add_school->address = $request->address;
        $add_school->email = $request->email;
        $add_school->phone = $request->phone;
        $add_school->motor = $request->motor;
        $add_school->role = 'school';
        $add_school->plans = $request->plans;
        $add_school->slug = SlugService::createSlug(User::class, 'slug', $request->schoolname);

        $add_school->password = \Hash::make($request->password);
        $add_school->ref_no1 = substr(rand(0,time()),0, 9);
        $add_school->connect = substr(rand(0,time()),0, 9);
        

        $add_school->save();

    
        if ($add_school) {
            return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
   
    public function printclasses(Request $request){
        $request->validate([
            'classname' => ['required', 'string'],
            'centername' => ['required', 'string'],
        ]);
        if($getyour_classes = user::where('classname', $request->classname)
        ->where('centername', $request->centername)
        ->exists()) {
            $getyour_classes = User::orderby('created_at', 'DESC')
            ->where('centername', $request->centername)
            ->where('classname', $request->classname)
       
            ->get(); 
            }else{
                return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.printregclass', compact('getyour_classes'));

        }


        public function firsterm(){
            $view_terms = User::all();
          
            return view('dashboard.firsterm', compact('view_terms'));
        }

        public function secondterm(){
            $view_terms = User::all();
            return view('dashboard.secondterm', compact('view_terms'));
        }

        public function assignedteacher($section){
            $assign_teachers = User::where('section', $section)->first();
            $view_teachers = User::where('section', $section)
            ->where('status', 'teacher')->get();

            $view_classes = Classname::all();

            return view('dashboard.admin.assignedteacher', compact('view_classes', 'view_teachers', 'assign_teachers'));
        }

        public function assignteachertoclass (Request $request, $ref_no1){
            $add_assignteacher = User::where('ref_no1', $ref_no1)->first();
            $request->validate([
               
                'classname' => ['required', 'string', 'max:255'],
                'term' => ['required', 'string', 'max:255'],
                'section' => ['required', 'string', 'max:255'],
                
            ]);
            $add_assignteacher->classname = $request->classname;
            $add_assignteacher->term = $request->term;
            $add_assignteacher->section = $request->section;
            $add_assignteacher->update();
    
            return redirect()->back()->with('success', 'you have added successfully');
    
        }
         
        public function assignedstudent($ref_no1){
            $assign_teachers = User::where('ref_no1', $ref_no1)->first();
            $view_classes = Classname::all();
            return view('dashboard.assignedstudent', compact('view_classes', 'assign_teachers'));
        }
        
        public function thirdterm(){
            $view_terms = User::all();
          
            return view('dashboard.thirdterm', compact('view_terms'));
        }

        public function assignstudentclass(Request $request, $ref_no){
        $add_assignstudents = User::where('ref_no', $ref_no)->first();
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'term' => ['required', 'string', 'max:255'],
        ]);
        
        $add_assignstudents->classname = $request->classname;
        $add_assignstudents->term = $request->term;
 
        $add_assignstudents->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    

    
    

    public function changeclasses ($ref_no){
        $assign_classestoTeacher = User::where('ref_no', $ref_no)->first();
        $view_centernames = Studycenter::all();
        $classnames = Classname::all();
        return view('dashboard.admin.changeclasses', compact('classnames', 'view_centernames', 'assign_classestoTeacher'));
    }

    public function changgeteacherclass (Request $request, $id){
        $change_classestoTeacher = User::find($id);
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'centername' => ['required', 'string', 'max:255'],
            'term' => ['required', 'string'],
            'section' => ['required', 'string'],
        ]);
      
        $change_classestoTeacher->classname = $request->classname;
        $change_classestoTeacher->centername = $request->centername;
        $change_classestoTeacher->term = $request->term;
        $change_classestoTeacher->section = $request->section;
        $change_classestoTeacher->update();
        if ($change_classestoTeacher) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }
   
    public function addrole($id){
        $view_teachers = User::find($id);
        $view_classes = Classname::latest()->get();
        return view('dashboard.admin.addrole', compact('view_classes', 'view_teachers'));
    }

    public function viewroles(){
        $view_roles = User::where('status', 'teacher')->where('role', 'approved')->get();
        return view('dashboard.admin.viewroles', compact('view_roles'));
    }


    public function createrol (Request $request, $id){
        $add_roles = User::find($id);
        $request->validate([
            'promotion' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
        ]);
      
        $add_roles->fname = $request->fname;
        $add_roles->promotion = $request->promotion;
        $add_roles->section = $request->section;
        $add_roles->classname = $request->classname;
        $add_roles->update();
       
 
        if ($add_roles) {
            return redirect()->back()->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function promotions(){
        $view_classess = Classname::all();
        $view_classstudents = User::all();
        return view('dashboard.promotions', compact('view_classess', 'view_classstudents'));
    }



    public function crecheheads(){
        $view_classess = Classname::all();
        $view_crecheclassstudents = User::where('section', 'Creche')->get();
        return view('dashboard.crecheheads', compact('view_classess', 'view_crecheclassstudents'));
    }

    public function nurseryschoolheads(){
        $view_classess = Classname::all();
        $view_nurseryclassstudents = User::where('section', 'Nursery')->get();
        return view('dashboard.nurseryschoolheads', compact('view_classess', 'view_nurseryclassstudents'));
    }
    
    public function printstudents ($ref_no1){
        $printyouchild = User::where('ref_no1', $ref_no1)->first();

        return view('dashboard.guardian.printstudents', compact('printyouchild'));
    }

    public function preschoolheads(){
        $view_classess = Classname::all();
        $view_preschoolstudents = User::where('section', 'Pre-School')->get();
        return view('dashboard.preschoolheads', compact('view_classess', 'view_preschoolstudents'));
    }
    public function primaryheads(){
        $view_classess = Classname::where('section', 'Primary')->get();
        $view_primarystudents = User::where('section', 'Primary')->get();
        return view('dashboard.primaryheads', compact('view_classess', 'view_primarystudents'));
    }

    public function highschools(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.highschools', compact('view_classess', 'view_highstudents'));
    }
    public function viewaddresults(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.viewaddresults', compact('view_classess', 'view_highstudents'));
    }
    
    public function createsection(){
        $view_classess = Classname::all();
        $view_crechsectionstudents = User::where('section', 'Creche')->get();
        return view('dashboard.createsection', compact('view_classess', 'view_crechsectionstudents'));
    }
    public function preschoolsection(){
        $view_classess = Classname::all();
        $view_preschstudents = User::where('section', 'Pre-School')->get();
        return view('dashboard.preschoolsection', compact('view_classess', 'view_preschstudents'));
    }
    public function primarysection(){
        $view_classess = Classname::where('section', 'Primary')->get();
        $view_primarystudents = User::where('section', 'Primary')->get();
        return view('dashboard.primarysection', compact('view_classess', 'view_primarystudents'));
    }

    public function nurserysection(){
        $view_classess = Classname::all();
        $view_nuserystudents = User::where('section', 'Nursery')->get();
        return view('dashboard.nurserysection', compact('view_classess', 'view_nuserystudents'));
    }
    public function highschoolsection(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.highschoolsection', compact('view_classess', 'view_highstudents'));
    }


    

    
    public function addparent(){
        $display_acasessions = Academicsession::all();
        $view_sections = Section::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.admin.addparent', compact('view_sections', 'display_acasessions'));
    }
    
    
    public function parentviewstudent($ref_no1){
        $viewyour_child = User::where('ref_no1', $ref_no1)->first();
        $view_classes = Classname::all();
        return view('dashboard.guardian.parentviewstudent', compact('view_classes', 'viewyour_child'));
    }

    

    public function parenteditstudent ($ref_no1){
        $editby_parent = User::where('ref_no1', $ref_no1)->first();
        $view_classes = Classname::all();
        return view('dashboard.guardian.parenteditstudent', compact('view_classes', 'editby_parent'));
    }
    public function updatebyparent(Request $request, $ref_no1){

        $editby_parent = User::where('ref_no1', $ref_no1)->first();
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'middlename' => ['required', 'string'],
            'age' => ['required', 'string'],
            'bloodgroup' => ['required', 'string'],
            'genotype' => ['required', 'string'],
            'previouschoolname' => ['required', 'string'],
            'preclassname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'lastschooladdress' => ['required', 'string'],
            'disability' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'section' => ['required', 'string'],
            'term' => ['required', 'string'],
            'gender' => ['required', 'string'],
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


        $editby_parent['images'] = $path;
        $editby_parent->surname = $request->surname;
        $editby_parent->term = $request->term;
        $editby_parent->middlename = $request->middlename;
        $editby_parent->previouschoolname = $request->previouschoolname;
        $editby_parent->fname = $request->fname;
        $editby_parent->age = $request->age;
        $editby_parent->dob = $request->dob;
        $editby_parent->gender = $request->gender;
        $editby_parent->bloodgroup = $request->bloodgroup;
        $editby_parent->genotype = $request->genotype;
        
       $editby_parent->preclassname = $request->preclassname;
        $editby_parent->classname = $request->classname;
        $editby_parent->lastschooladdress = $request->lastschooladdress;
        $editby_parent->disability = $request->disability;
        $editby_parent->section = $request->section;
       
        $editby_parent->update();
        return redirect()->back()->with('success', 'You have successfully edited your child ');

    }


    public function addyourchild(){
       $view_classes = Classname::all();
       $acas = Academicsession::all();
        return view('dashboard.guardian.addyourchild', compact('acas', 'view_classes'));
    }
    public function yourchildren(){
        $viewyour_childrens = User::where('guardian_id', auth::guard('guardian')->id()
        )->get();
        return view('dashboard.guardian.yourchildren', compact('viewyour_childrens'));
    }
    public function payment(){
        $viewyour_childrens = User::where('guardian_id', auth::guard('guardian')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.guardian.payment', compact('viewyour_childrens'));
    }

    public function buspayment(){
        $bus_payments = User::where('guardian_id', auth::guard('guardian')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.guardian.buspayment', compact('bus_payments'));
    }
    public function feedingpaypayment(){
        $bus_payments = User::where('guardian_id', auth::guard('guardian')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.guardian.feedingpaypayment', compact('bus_payments'));
    }
    public function partypayment(){
        $bus_payments = User::where('guardian_id', auth::guard('guardian')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.guardian.partypayment', compact('bus_payments'));
    }
    

    public function payschoolfees($classname){
        $pay_fees = User::where('classname', $classname)->first();
        $view_classpayments = Payment::where('classname', $classname)->where('feeding', 'school')
        ->get();
        return view('dashboard.guardian.payschoolfees', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    }
    public function payfeeding($classname){
        $pay_fees = User::where('classname', $classname)->first();
        $view_classpayments = Payment::where('classname', $classname)
        ->where('feeding', 'feeding')->get();
        return view('dashboard.guardian.payfeeding', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    }

    public function paybuservicefee($classname){
        $pay_fees = User::where('classname', $classname)->first();
        $view_classpayments = Payment::where('classname', $classname)
        ->where('feeding', 'trans')->get();
        return view('dashboard.guardian.paybuservicefee', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    }

    public function paypartfee($classname){
        $pay_fees = User::where('classname', $classname)->first();
        $view_classpayments = Payment::where('classname', $classname)
        ->where('feeding', 'party')->get();
        return view('dashboard.guardian.paypartfee', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    }
    
    
    
    public function addchildbyparent (Request $request){
       
        $request->validate([
            'guardian_id' => ['nullable', 'string'],
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'middlename' => ['required', 'string'],
            'age' => ['required', 'string'],
            'bloodgroup' => ['required', 'string'],
            'genotype' => ['required', 'string'],
            'previouschoolname' => ['required', 'string'],
            'preclassname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'lastschooladdress' => ['required', 'string'],
            'disability' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'ref_no' => ['required', 'string'],
            'section' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'term' => ['required', 'string'],
            // 'password' => ['required', 'string'],
            
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new User();

        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->previouschoolname = $request->previouschoolname;
        $add_adimission->guardian_id = $request->guardian_id;
        $add_adimission->fname = $request->fname;
        $add_adimission->age = $request->age;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->bloodgroup = $request->bloodgroup;
        $add_adimission->genotype = $request->genotype;
        
       $add_adimission->preclassname = $request->preclassname;
        $add_adimission->classname = $request->classname;
        $add_adimission->lastschooladdress = $request->lastschooladdress;
        $add_adimission->disability = $request->disability;
        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        // $add_adimission->state = $request->state;
        // $add_adimission->term = $request->term;
        // $add_adimission->classname = $request->classname;
         $add_adimission->ref_no = $request->ref_no;
        
        // $add_adimission->password = \Hash::make($request->password);
        $add_adimission->ref_no1 = substr(rand(0,time()),0, 9);

        $add_adimission->save();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }


    public function teacherform(){
            $view_classes = Classname::all();
        return view('dashboard.teacherform', compact('view_classes'));
    }


    
    public function sendspec ($id){
        $viewparent_sendpecti = User::find($id);
        return view('dashboard.sendspec', compact('viewparent_sendpecti'));
    }
    

    public function addresultsad1($ref_no1){
        $view_studentsubject = User::where('ref_no1', $ref_no1)->first();
         
        $view_teachersubjects = Subject::all();
       // $view_teachersubjects = Teacherassign::where('user_id', auth::guard('web')->id())->get();
        return view('dashboard.admin.addresultsad1', compact('view_teachersubjects','view_studentsubject'));
    }
    public function currentresult(){
        $view_yourresults = User::where('guardian_id', auth::guard('guardian')->id()
        )->get();
        return view('dashboard.guardian.currentresult', compact('view_yourresults'));
    }
    


    public function registerteachers($ref_no1){

       
            $getyours = User::where('ref_no1', $ref_no1)->first();
            $getyoursterms = Term::where('ref_no1', $ref_no1)->get();
            $getclasses = Classname::where('ref_no1', $ref_no1)->get();
            $getalms = Alm::where('ref_no1', $ref_no1)->get();
            $addacademics = Academicsession::latest()->get();
            $dsplay_sections = Section::latest()->get();
            
            return view('pages.registerteachers', compact('getyoursterms', 'dsplay_sections', 'getalms', 'getclasses', 'getyours', 'addacademics'));
      
    }


   
    
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }


    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    

    
    
    
    
     

    
    
     
    
    
    
    
    
   
    
    
}
