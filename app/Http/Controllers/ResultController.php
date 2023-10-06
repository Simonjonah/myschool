<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Pin;
use App\Models\User;
use App\Models\Psycomotor;
use App\Models\Studentdomain;
use App\Models\Subject;
use App\Models\Teacherdomain;
use App\Models\Term;
use PDF;
use Illuminate\Support\Facades\Auth;
class ResultController extends Controller
{
    public function createresults(Request $request){
        $data = [];
        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        $test_3s = $request->input('test_3');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        $slugs = $request->input('slug');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        $student_ids = $request->input('student_id');
        $classnames = $request->input('classname');
        $fnames = $request->input('fname');
        $middlenames = $request->input('middlename');
        $surnames = $request->input('surname');
        $genders = $request->input('gender');
        $images_ds = $request->input('images');
        
        
        
      
        for ($i = 0; $i < count($subjectnames); $i++) {
            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                'test_3' => $test_3s[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'slug' =>$slugs[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                'student_id' => $student_ids[$i],
                'classname' => $classnames[$i],
                'fname' => $fnames[$i],
                'middlename' => $middlenames[$i],
                'surname' => $surnames[$i],
                'gender' => $genders[$i],
                'images' => $images_ds[$i],
                
            ];
        }
//dd($data);
        Result::insert($data);

        
        //return redirect()->route('psycomotor', ['ref_no' =>$user_ids->ref_no]); 
       return redirect()->back()->with('success', 'you have added successfully');
    }



    public function createresultsbyteacter(Request $request){
        $data = [];
        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        $test_3s = $request->input('test_3');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        $regnumbers = $request->input('schoolname');
        $teacher_ids = $request->input('teacher_id');
        $addresses = $request->input('address');
        $motors = $request->input('motor');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        $student_ids = $request->input('student_id');
        $classnames = $request->input('classname');
        $fnames = $request->input('fname');
        $middlenames = $request->input('middlename');
        $surnames = $request->input('surname');
        $genders = $request->input('gender');
        $images_ds = $request->input('images');
        $logo_ds = $request->input('logo');
        $schoolnames = $request->input('schoolname');
        
        
        
      
        for ($i = 0; $i < count($subjectnames); $i++) {
            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                'test_3' => $test_3s[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'teacher_id' =>$teacher_ids[$i],
                'schoolname' =>$schoolnames[$i],
                'motor' =>$motors[$i],
                'address' =>$addresses[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                'student_id' => $student_ids[$i],
                'classname' => $classnames[$i],
                'fname' => $fnames[$i],
                'middlename' => $middlenames[$i],
                'surname' => $surnames[$i],
                'gender' => $genders[$i],
                'images' => $images_ds[$i],
                'pins' => substr(rand(0,time()),0, 9),
                'logo' => $logo_ds[$i],


                
            ];
        }
//dd($data);
        Result::insert($data);

        
        //return redirect()->route('psycomotor', ['ref_no' =>$user_ids->ref_no]); 
       return redirect()->back()->with('success', 'you have added successfully');
    }


    public function createresultsad(Request $request){
        

        $data = [];
        $subjectnames = $request->input('subjectname');
        $test_1s = $request->input('test_1');
        $test_2s = $request->input('test_2');
        $test_3s = $request->input('test_3');
        $examss = $request->input('exams');
        $user_ids = $request->input('user_id');
        $teacher_ids = $request->input('teacher_id');
        $academic_sessions = $request->input('academic_session');
        $regnumbers = $request->input('regnumber');
        $terms = $request->input('term');
        $guardian_ids = $request->input('guardian_id');
        $classnames = $request->input('classname');
        
      
        for ($i = 0; $i < count($subjectnames); $i++) {
            $data[] = [

                'subjectname' => $subjectnames[$i],
                'test_1' => $test_1s[$i],
                'test_2' => $test_2s[$i],
                'test_3' => $test_3s[$i],
                'exams' => $examss[$i],
                'user_id' => $user_ids[$i],
                'teacher_id' =>$teacher_ids[$i],

                'academic_session' =>$academic_sessions[$i],
                'regnumber' =>$regnumbers[$i],
                'term' => $terms[$i],
                'guardian_id' => $guardian_ids[$i],
                'classname' => $classnames[$i],
            ];
        }
        Result::insert($data);

        //return redirect()->route('psycomotor', ['ref_no' =>$user_ids->ref_no]); 
       return redirect()->back()->with('success', 'you have added successfully');
    }


   
    public function teacherviewresults($student_id){
        $view_myresult_results = Result::where('student_id', $student_id)
        ->where('term', 'First Term')
        ->get();

        $view_results = Result::where('student_id', $student_id)->first();
           
        return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
    }

    public function teacherviewresults2nd($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)
        ->where('term', 'Second Term')
        ->get();

        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
    }


    public function teacherviewresults3rd($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)
        ->where('term', 'third Term')
        ->get();
        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.teacherviewresults3rd', compact('view_results', 'view_myresult_results'));
    }

    public function addpsychomotor($id){
        $add_psychomotor = Result::find($id);
        $view_domains = Domain::where('psycomoto', 'Cognitive Domain')->get();
        $view_pscos = Domain::where('psycomoto', 'Psychomotor Domain')->get();

        return view('dashboard.addpsychomotor', compact('view_pscos','add_psychomotor', 'view_domains'));
    }
    public function thirdtermresults(){
        $view_myresults = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'third Term')
        ->get();
        return view('dashboard.thirdtermresults', compact('view_myresults'));
    }
 
    

    public function secondtermresults(){
        $view_myresult_penultimates = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'Second Term')
        ->get();
        return view('dashboard.secondtermresults', compact('view_myresult_penultimates'));
    }
    
   
    public function checkresult(){
       $the_results = Academicsession::all();
        return view('dashboard.guardian.checkresult', compact('the_results'));
    }
    

    public function yourresult(Request $request){
        $request->validate([
            'pins' => ['required', 'string'],
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'pins.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('pins', $request->pins)
        ->exists()) {
        $getyour_results = Result::where('user_id', auth::guard('web')->id()
        )->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
       // $view_results = Result::where('user_id', $user_id)->first();
       $getyours = Result::where('user_id', auth::guard('web')->id()
       )->where('term', 'First Term')->take(1)
       ->get();

       
       
        // $pdf = PDF::loadView('dashboard.pdf', compact('getyours','getyour_results'));

        // return $pdf->download('school_report.pdf');
    return view('dashboard.guardian.yourresult', compact('getyours','getyour_results'));
      
    }

    public function printresult(Request $request, $user_id){
        $print_results = Result::where('user_id', $user_id)
        ->where('term', 'First Term')->get();
        return view('dashboard.printresult', compact('print_results'));
    }




    public function generatePDF(Request $request)
    {

        $request->validate([
            // 'classname' => ['required', 'string'],
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->exists()) {
        $getyour_results = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('classname', $request->classname)
        ->where('term', $request->term)->count();

        $total_student = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('classname', $request->classname)
        ->where('term', $request->term)->count();
        $pdf = PDF::loadView('dashboard.guardian.pdf', compact('total_student', 'total_subject', 'getyour_results'));
     
        return $pdf->download('goldendestinyschools.pdf');
    }



    public function viewresultbyadmins(){
        $view_results = Result::latest()->get();
        $view_schoolsnames = User::where('status', 'admitted')->get();
        $view_academcsessions = Academicsession::all();
        $view_terms = Term::all();
        return view('dashboard.admin.viewresultbyadmins', compact('view_terms', 'view_academcsessions', 'view_schoolsnames', 'view_results'));
    }

    public function searchresults(Request $request){
        $request->validate([
            'term' => ['required', 'string'],
            'schoolname' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
        ]);
        if($view_schholsresults = Result::where('term', $request->term)
        ->where('schoolname', $request->schoolname)
        ->where('academic_session', $request->academic_session)
        ->exists()) {
            $view_schholsresults = Result::orderby('created_at', 'DESC')
            ->where('schoolname', $request->schoolname)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->get(); 
            }else{
                return view('dashboard.admin.noresult');
                //return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.yourschoolreults', compact('view_schholsresults'));
    
        }
    
        public function searchresultsforclasses(Request $request){
            $request->validate([
                'term' => ['required', 'string'],
                'schoolname' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'classname' => ['required', 'string'],
            ]);
            if($view_schholsresults = Result::where('term', $request->term)
            ->where('schoolname', $request->schoolname)
            ->where('academic_session', $request->academic_session)
            ->where('classname', $request->classname)
            ->exists()) {
                $view_schholsresults = Result::orderby('created_at', 'DESC')
                ->where('schoolname', $request->schoolname)
                ->where('term', $request->term)
                ->where('academic_session', $request->academic_session)
                ->where('classname', $request->classname)

                ->get(); 
                }else{
                    return view('dashboard.admin.noresult');
                    //return redirect()->back()->with('fail', 'There is no students in these class!');
                }
                return view('dashboard.admin.yourschoolreults', compact('view_schholsresults'));
        
            }
        
        

    public function viewresults($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)->get();
        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.admin.viewresults', compact('view_results', 'view_myresult_results'));
    }

    public function viewresult($id){
        // $view_myresult_results = Result::where('id', $id)->get();
        $viewsingle_results = Result::where('id', $id)->first();
        
           
        return view('dashboard.admin.viewresult', compact('viewsingle_results'));
    }

    public function viewallresults(){
        $viewals_results = Result::latest()->get();
        return view('dashboard.admin.viewallresults', compact('viewals_results'));
    }

    
   

    public function approveresults($id){
        $approved_results = Result::find($id);
        $approved_results->status = 'approved';
        $approved_results->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function approvedresultsc($id){
        $approved_results = Result::find($id);
        $approved_results->status = 'approved';
        $approved_results->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function viewpins(){
        $view_pins = Result::latest()->get();
        $view_schoolsnames = User::where('status', 'admitted')->latest()->get();
        $view_academcsessions = Academicsession::all();
        $view_terms = Term::all();
        return view('dashboard.admin.viewpins', compact('view_terms', 'view_academcsessions', 'view_schoolsnames', 'view_pins'));
    }

    public function viewapproveresultsbyad(){
        $approve_results = Result::where('status', 'approved')->get();
        $view_schoolsnames = User::where('status', 'admitted')->get();
        $view_academcsessions = Academicsession::all();
        $view_terms = Term::all();
        return view('dashboard.admin.viewapproveresultsbyad', compact('view_terms', 'view_academcsessions', 'view_schoolsnames', 'approve_results'));
    }
    
    public function addpsychomotorad($id){
        $add_psychomotorad = Result::find($id);
        return view('dashboard.admin.addpsychomotorad', compact('add_psychomotorad'));
    }

   
         
      
    public function pdf1(){
        $getyour_results = Result::all();
        return view('dashboard.guardian.pdf1', compact('getyour_results'));
    }
    public function tecacherviewresultbysub(){
        // $view_results = Result::where('student_id', $student_id)->first();
        $view_myresult_results = Result::where('teacher_id', auth::guard('teacher')->id())
        ->where('status', null)->latest()->get();
        return view('dashboard.teacher.tecacherviewresultbysub', compact('view_myresult_results'));
    }

    public function tecacherviewresultbysubapproved(){
        // $view_results = Result::where('student_id', $student_id)->first();
        $view_myresult_results = Result::where('teacher_id', auth::guard('teacher')->id())
        ->where('status', 'approved')->latest()->get();
        return view('dashboard.teacher.tecacherviewresultbysubapproved', compact('view_myresult_results'));
    }

    

    public function addpsychomotorteacher($id){
        $addpsychomotor_results = Result::find($id);
        return view('dashboard.teacher.addpsychomotorteacher', compact('addpsychomotor_results'));
    }

    

    public function checkresults (){
        $addacademics = Academicsession::latest()->get();
        $getyours = Term::all();
        return view('pages.checkresults', compact('addacademics', 'getyours'));
    }


    public function checkyourresults(Request $request)
    {
        $request->validate([
            'pins' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'term' => ['required', 'string',],
            
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->exists()) {
        $getyour_results = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();

        $total_student = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();
        // $phone = User::find(1)->phone;

        $getyour_resultsdomains = Studentdomain::where('term', $request->term)->get();
        //$pdf = PDF::loadView('dashboard.guardian.pdf', compact('total_student', 'total_subject', 'getyour_results'));
     
        return view('pages.resultterm', compact('getyour_resultsdomains', 'total_student', 'total_subject', 'getyour_results'));
    }

    public function addpsychomotorteacher1($teacher_id){
        $view_yourtudents = Result::where('teacher_id', $teacher_id)->first();
        $view_yourdomains = Teacherdomain::where('teacher_id', $teacher_id)->get();
        return view('dashboard.teacher.addpsychomotorteacher1', compact('view_yourdomains','view_yourtudents'));
    }
    

    public function searchstudentresults(Request $request){
        $request->validate([
            'term' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'classname' => ['required', 'string'],
        ]);
        dd($request->all());
        if($view_schholsresults = Result::where('term', $request->term)
        ->where('regnumber', $request->regnumber)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)
        ->where('term', $request->term)
        ->exists()) {
            $view_schholsresults = Result::orderby('created_at', 'DESC')
            ->where('regnumber', $request->regnumber)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_sessbion)
            ->where('classname', $request->classname)

            ->get(); 
            }else{
                return view('dashboard.admin.noresult');
                //return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.viewresultsl', compact('view_schholsresults'));
    
        }
    public function allresults(){
        $view_resultalls = Result::where('user_id', auth::guard('web')->id())->get();

        return view('dashboard.allresults', compact('view_resultalls'));
    }


    public function reachresultbysc(Request $request){
        $request->validate([
            'classname' => ['required', 'string'],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'term.exist'=>'This email does not exist in the admins table'
        ]);
        if($view_allresults = Result::where('classname', $request->classname)->where('term', $request->term)
        // ->where('pins', $request->pins)
        ->exists()) {
        $view_allresults = Result::where('user_id', auth::guard('web')->id()
        )->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
    
            return view('dashboard.viewresultsbysc', compact('view_allresults'));
    
        }


        public function reachresultbystudentsc(Request $request){
            $request->validate([
                'classname' => ['required', 'string'],
                'regnumber' => ['required', 'string',],
                'academic_session' => ['required', 'string',],
                'term' => ['required', 'string',],
    
            ], [
                'regnumber.exist'=>'This email does not exist in the admins table'
            ]);
            if($view_myresult_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
            ->where('classname', $request->classname)
            ->exists()) {
            $view_myresult_results = Result::where('user_id', auth::guard('web')->id()
            )->where('academic_session', $request->academic_session)->get();
            }else{
                return redirect()->back()->with('fail', 'There is no results for you!');
            }
            
            $view_psyos = Studentdomain::where('term', $request->term)->get();

            $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();
        return view('dashboard.yourresultschools', compact('total_subject', 'view_psyos', 'view_myresult_results'));
          
        }


        public function yourresultfinale(Request $request){
            $request->validate([
                'pins' => ['required', 'string'],
                'regnumber' => ['required', 'string',],
                'academic_session' => ['required', 'string',],
                'term' => ['required', 'string',],
    
            ], [
                'pins.exist'=>'This email does not exist in the admins table'
            ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->exists()) {
        $getyour_results = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();

        $total_student = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();
        $getyour_resultsdomains = Studentdomain::where('term', $request->term)->get();
           
        $pdf = PDF::loadView('pages.pdf', compact('getyour_resultsdomains', 'total_subject', 'getyour_results'));
    
        return $pdf->download('school_report.pdf');
         
        }





        public function searchpins(Request $request){
            $request->validate([
                'schoolname' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'term' => ['required', 'string'],
    
            ], [
                'schoolname.exist'=>'This email does not exist in the admins table'
            ]);
        if($getyour_pins = Result::where('schoolname', $request->schoolname)->where('term', $request->term)
        ->exists()) {
        $getyour_pins = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

         
        $pdf = PDF::loadView('dashboard.admin.pdfpins', compact('getyour_pins'));
    
        return $pdf->download('school_pins.pdf');
         
        }

        public function viewschoolpins($user_id){
            $view_schoolpins = Result::where('user_id', $user_id)->latest()->get();
            $view_academcsessions = Academicsession::all();
            return view('dashboard.admin.viewschoolpins', compact('view_academcsessions', 'view_schoolpins'));
        }



        public function searchpinsforclass(Request $request){
            $request->validate([
                'schoolname' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'term' => ['required', 'string'],
                'classname' => ['required', 'string'],
    
            ], [
                'schoolname.exist'=>'This email does not exist in the admins table'
            ]);
        if($getyour_pins = Result::where('schoolname', $request->schoolname)->where('term', $request->term)
        ->where('classname', $request->classname)
        ->exists()) {
        $getyour_pins = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

         
        $pdf = PDF::loadView('dashboard.admin.pdfpinsforclass', compact('getyour_pins'));
    
        return $pdf->download('school_classpins.pdf');
         
        }
}

    


