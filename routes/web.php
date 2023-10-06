<?php

use App\Http\Controllers\AcademicsessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AlmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudycenterController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClassactivityController;
use App\Http\Controllers\ClassnameController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LessonnoteController;
use App\Http\Controllers\MainsliderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PsycomotorController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SchoolfeeController;
use App\Models\Schoolnew;
use App\Http\Controllers\SchoolnewsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentdomainController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherassignController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherdomainController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VisitController;
use App\Models\Academicsession;
use App\Models\Alm;
use App\Models\Blog;
use App\Models\Classname;
use App\Models\Team;
use App\Models\Event;
use App\Models\Result;
use App\Models\Schoolnew as ModelsSchoolnew;
use App\Models\Section;
use App\Models\Student;
use App\Models\Studentdomain;
use App\Models\Teacher;
use App\Models\Teacherdomain;
use App\Models\Term;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $press_release = Blog::latest()->take(50)->get();
    $schooladverts = Schoolnew::latest()->take(50)->get();
    $schools = User::latest()->take(8)->get();
    $member_teams = Team::orderby('created_at', 'ASC')->get();
    $events = Event::latest()->take(10)->get();
    

    return view('welcome', compact('schools', 'schooladverts', 'events', 'member_teams', 'press_release'));
});

Route::get('/press_single/{slug}', function ($slug) {
    $view_pressreleases = Blog::where('slug', $slug)->first();
    $view_titles = Blog::latest()->get();

    return view('pages.press_single', compact('view_titles', 'view_pressreleases'));
});

Route::get('/view_singleschool/{slug}', function ($slug) {
    $view_pressreleases = Schoolnew::where('slug', $slug)->first();
    $view_titles = Schoolnew::where('slug', $slug)->latest()->get();

    return view('pages.view_singleschool', compact('view_titles', 'view_pressreleases'));
});


Route::get('/about', function () {

    $member_teams = Team::orderby('created_at', 'ASC')->get();

    return view('pages.about', compact('member_teams'));
});

Route::post('/yourresultfinale', [ResultController::class, 'yourresultfinale'])->name('yourresultfinale');
Route::post('/checkyourresults', [ResultController::class, 'checkyourresults'])->name('checkyourresults');
Route::get('/checkresults', [ResultController::class, 'checkresults'])->name('checkresults');
Route::post('/createcontact', [ContactController::class, 'createcontact'])->name('createcontact');
Route::post('/createvisit', [VisitController::class, 'createvisit'])->name('createvisit');




Route::get('/team', function () {
    $member_teams = Team::orderby('created_at', 'ASC')->get();
    return view('pages.team', compact('member_teams'));
});

Route::get('/checkresults/{slug}', function ($slug) {
    $getyours = User::where('slug', $slug)->first();
    $getyours = Result::where('slug', $slug)->get();

    $addacademics = Academicsession::latest()->get();
    return view('pages.checkresults', compact('getyours', 'addacademics'));
});


// Route::get('//{ref_no1}', function ($ref_no1) {
//     $getyours = User::find($ref_no1);
//     $getyours = Term::where('ref_no1', $ref_no1)->get();
//     $getclasses = Classname::where('ref_no1', $ref_no1)->get();
//     $getalms = Alm::where('ref_no1', $ref_no1)->get();
//     $addacademics = Academicsession::latest()->get();
//     $dsplay_sections = Section::latest()->get();
    
//     return view('pages.registerteachers', compact('dsplay_sections', 'getalms', 'getclasses', 'getyours', 'addacademics'));
// });

Route::get('registerteachers/{ref_no1}', [UserController::class, 'registerteachers'])->name('registerteachers');

Route::post('createteacher', [TeacherController::class, 'createteacher'])->name('createteacher');
Route::get('/add2ndimage13/{ref_no}', [SchoolnewsController::class, 'add2ndimage13'])->name('add2ndimage13');
Route::get('/add3images23/{ref_no}', [SchoolnewsController::class, 'add3images23'])->name('add3images23');
Route::put('/update2ndeschools1/{ref_no}', [SchoolnewsController::class, 'update2ndeschools1'])->name('update2ndeschools1');
Route::put('/update2ndeschools2rd/{ref_no}', [SchoolnewsController::class, 'update2ndeschools2rd'])->name('update2ndeschools2rd');
Route::put('/update2ndeschools3rd1/{ref_no}', [SchoolnewsController::class, 'update2ndeschools3rd1'])->name('update2ndeschools3rd1');
Route::get('/add3images24/{ref_no}', [SchoolnewsController::class, 'add3images24'])->name('add3images24');
Route::get('/add4images25/{ref_no}', [SchoolnewsController::class, 'add4images25'])->name('add4images25');
Route::put('/update2ndeschools5the/{ref_no}', [SchoolnewsController::class, 'update2ndeschools5the'])->name('update2ndeschools5the');
Route::get('/viewschoolsingle/{slug}', [UserController::class, 'viewschoolsingle'])->name('viewschoolsingle');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::get('/search1', [SchoolnewsController::class, 'search1'])->name('search1');
Route::get('/add1stimage/{ref_no}', [EventController::class, 'add1stimage'])->name('add1stimage');
Route::put('/updateaddevent1mag/{ref_no}', [EventController::class, 'updateaddevent1mag'])->name('updateaddevent1mag');
Route::get('/add2imagesw/{ref_no}', [EventController::class, 'add2imagesw'])->name('add2imagesw');
Route::put('/updateaddevent1mag454/{ref_no}', [EventController::class, 'updateaddevent1mag454'])->name('updateaddevent1mag454');
Route::get('/add3imagesw12/{ref_no}', [EventController::class, 'add3imagesw12'])->name('add3imagesw12');
Route::put('/updateaddevent51magjk/{ref_no}', [EventController::class, 'updateaddevent51magjk'])->name('updateaddevent51magjk');
Route::get('/add2images4543/{ref_no}', [EventController::class, 'add2images4543'])->name('add2images4543');
Route::get('/add2images4543tr/{ref_no}', [EventController::class, 'add2images4543tr'])->name('add2images4543tr');
Route::put('/updateaddeventjfhf/{ref_no}', [EventController::class, 'updateaddeventjfhf'])->name('updateaddeventjfhf');
Route::put('/updateaddeventsrew/{ref_no}', [EventController::class, 'updateaddeventsrew'])->name('updateaddeventsrew');




Route::get('/youresult', function () {
    $getyour_results = Result::all();
    return view('pages.youresult', compact('getyour_results'));
});



Route::get('/services2', function () {
    return view('pages.services2');
});

Route::get('/primaryschools', function () {
    $press_release = User::where('status', 'admitted')->where('schooltype', 'Primary')
    ->latest()->get();
    return view('pages.primaryschools', compact('press_release'));
});

Route::get('/secondaryschools', function () {
    $press_release = User::where('status', 'admitted')->where('schooltype', 'Secondary')
    ->latest()->get();
    return view('pages.secondaryschools', compact('press_release'));
});


Route::get('/careers', function () {
    return view('pages.careers');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/scholarship', function () {
    return view('pages.scholarship');
});



Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware(['guest:admin'])->group(function() {

        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::view('/register','dashboard.admin.register')->name('register');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/check', [AdminController::class, 'check'])->name('check');

    });
    
    Route::middleware(['auth:admin'])->group(function() {
        
        
        Route::get('viewschoolpins/{user_id}', [ResultController::class, 'viewschoolpins'])->name('viewschoolpins');
        Route::post('searchpins', [ResultController::class, 'searchpins'])->name('searchpins');
        Route::post('searchpinsforclass', [ResultController::class, 'searchpinsforclass'])->name('searchpinsforclass');
        Route::get('viewpins', [ResultController::class, 'viewpins'])->name('viewpins');
        Route::get('lecturersprint/{ref_no}', [TeacherController::class, 'lecturersprint'])->name('lecturersprint');
        Route::get('adminprogress', [StudentController::class, 'adminprogress'])->name('adminprogress');
        Route::get('viewsuspended', [UserController::class, 'viewsuspended'])->name('viewsuspended');
        Route::get('visitedelete/{id}', [VisitController::class, 'visitedelete'])->name('visitedelete');
        Route::get('viewvisit', [VisitController::class, 'viewvisit'])->name('viewvisit');
        Route::get('addparent', [UserController::class, 'addparent'])->name('addparent');
        Route::get('viewcontact', [ContactController::class, 'viewcontact'])->name('viewcontact');
        Route::get('bookingdelete/{id}', [BookingController::class, 'bookingdelete'])->name('bookingdelete');
        Route::get('viewbookings', [BookingController::class, 'viewbookings'])->name('viewbookings');
        Route::put('changgeteacherclass/{id}', [UserController::class, 'changgeteacherclass'])->name('changgeteacherclass');
        Route::get('changeclasses/{ref_no}', [UserController::class, 'changeclasses'])->name('changeclasses');
        Route::get('queriedteachersreply', [QueryController::class, 'queriedteachersreply'])->name('queriedteachersreply');
        Route::get('academedelete/{id}', [AcademicsessionController::class, 'academedelete'])->name('academedelete');
        Route::put('updatesession/{id}', [AcademicsessionController::class, 'updatesession'])->name('updatesession');
        Route::get('academedit/{id}', [AcademicsessionController::class, 'academedit'])->name('academedit');
        Route::get('viewsession', [AcademicsessionController::class, 'viewsession'])->name('viewsession');
        Route::post('createsession', [AcademicsessionController::class, 'createsession'])->name('createsession');
        Route::get('addsession', [AcademicsessionController::class, 'addsession'])->name('addsession');
        Route::get('studentsubjects/{ref_no}', [UserController::class, 'studentsubjects'])->name('studentsubjects');
        Route::get('abujateachers', [UserController::class, 'abujateachers'])->name('abujateachers');
        Route::get('uyoteachers', [UserController::class, 'uyoteachers'])->name('uyoteachers');
        Route::get('viewteachersubjects/{user_id}', [TeacherassignController::class, 'viewteachersubjects'])->name('viewteachersubjects');
        Route::get('teachertosubjects', [TeacherassignController::class, 'teachertosubjects'])->name('teachertosubjects');
        Route::post('assignsubjectstoteacher/{id}', [TeacherassignController::class, 'assignsubjectstoteacher'])->name('assignsubjectstoteacher');
        Route::get('assignsubject/{id}', [SubjectController::class, 'assignsubject'])->name('assignsubject');
        Route::get('deletesubject/{id}', [SubjectController::class, 'deletesubject'])->name('deletesubject');
        Route::put('updatesubject/{id}', [SubjectController::class, 'updatesubject'])->name('updatesubject');
        Route::get('editsubject/{id}', [SubjectController::class, 'editsubject'])->name('editsubject');
        Route::get('viewteacherquery/{id}', [QueryController::class, 'viewteacherquery'])->name('viewteacherquery');
        Route::get('printquery/{id}', [QueryController::class, 'printquery'])->name('printquery');
        Route::put('addquerytoteacher/{ref_no}', [QueryController::class, 'addquerytoteacher'])->name('addquerytoteacher');
        Route::get('allteachers', [TeacherController::class, 'allteachers'])->name('allteachers');
        Route::get('queriedteachers', [QueryController::class, 'queriedteachers'])->name('queriedteachers');
        Route::get('sackedteachers', [TeacherController::class, 'sackedteachers'])->name('sackedteachers');
        Route::get('suspendedteachers', [TeacherController::class, 'suspendedteachers'])->name('suspendedteachers');
        Route::get('nurserysubjects', [SubjectController::class, 'nurserysubjects'])->name('nurserysubjects');
        Route::get('approveteachers', [TeacherController::class, 'approveteachers'])->name('approveteachers');
        Route::get('teachersprint', [TeacherController::class, 'teachersprint'])->name('teachersprint');
        Route::get('teacherquery/{ref_no}', [UserController::class, 'teacherquery'])->name('teacherquery');
        Route::get('teachersacked/{ref_no}', [TeacherController::class, 'teachersacked'])->name('teachersacked');
        Route::get('teachersuspend/{ref_no}', [TeacherController::class, 'teachersuspend'])->name('teachersuspend');
        Route::get('teacherapprove/{ref_no}', [TeacherController::class, 'teacherapprove'])->name('teacherapprove');
        Route::put('teacherupdated/{ref_no}', [TeacherController::class, 'teacherupdated'])->name('teacherupdated');
        Route::get('editteacher/{ref_no}', [TeacherController::class, 'editteacher'])->name('editteacher');
        Route::get('viewsingleteacher/{ref_no}', [TeacherController::class, 'viewsingleteacher'])->name('viewsingleteacher');
        Route::get('viewteachers', [TeacherController::class, 'viewteachers'])->name('viewteachers');
        Route::put('assignteachertoclass/{ref_no}', [UserController::class, 'assignteachertoclass'])->name('assignteachertoclass');
        Route::get('/assignedteacher/{centername}', [UserController::class, 'assignedteacher'])->name('assignedteacher');
        Route::post('printclasses', [UserController::class, 'printclasses'])->name('printclasses');
        Route::get('viewsubject', [SubjectController::class, 'viewsubject'])->name('viewsubject');
        Route::post('createsubject', [SubjectController::class, 'createsubject'])->name('createsubject');
        Route::get('addsubject', [SubjectController::class, 'addsubject'])->name('addsubject');
        Route::get('/classrooms/{name}', [ClassnameController::class, 'classrooms'])->name('classrooms');
        Route::get('/classesdelete/{id}', [ClassnameController::class, 'classesdelete'])->name('classesdelete');
        Route::put('/updateclass/{id}', [ClassnameController::class, 'updateclass'])->name('updateclass');
        Route::get('/editclasses/{id}', [ClassnameController::class, 'editclasses'])->name('editclasses');
        Route::post('/createclasses', [ClassnameController::class, 'createclasses'])->name('createclasses');
        Route::get('/viewclassestables', [ClassnameController::class, 'viewclassestables'])->name('viewclassestables');
        Route::get('/addclass', [ClassnameController::class, 'addclass'])->name('addclass');
        Route::get('/viewschoolstudent/{schoolname}', [TeacherController::class, 'viewschoolstudent'])->name('viewschoolstudent');
        Route::post('/searchclass', [StudentController::class, 'searchclass'])->name('searchclass');
        Route::get('/primaryteachers', [TeacherController::class, 'primaryteachers'])->name('primaryteachers');
        Route::get('/secondaryteachers', [TeacherController::class, 'secondaryteachers'])->name('secondaryteachers');
        Route::get('/schoolstudents/{user_id}', [StudentController::class, 'schoolstudents'])->name('schoolstudents');
        Route::get('/schoolstudent/{user_id}', [UserController::class, 'schoolstudent'])->name('schoolstudent');
        Route::get('/viewresultbyadmins', [ResultController::class, 'viewresultbyadmins'])->name('viewresultbyadmins');
        Route::post('/searchresults', [ResultController::class, 'searchresults'])->name('searchresults');
        Route::post('/searchresultsforclasses', [ResultController::class, 'searchresultsforclasses'])->name('searchresultsforclasses');
        Route::get('/viewapproveresultsbyad', [ResultController::class, 'viewapproveresultsbyad'])->name('viewapproveresultsbyad');
        Route::get('/approveresults/{id}', [ResultController::class, 'approveresults'])->name('approveresults');
        Route::get('/viewallresults', [ResultController::class, 'viewallresults'])->name('viewallresults');
        Route::get('/viewpsycomotor', [DomainController::class, 'viewpsycomotor'])->name('viewpsycomotor');
        Route::get('/schoolspsyco/{id}', [DomainController::class, 'schoolspsyco'])->name('schoolspsyco');
        Route::post('/searchstudentresults', [ResultController::class, 'searchstudentresults'])->name('searchstudentresults');
        
        Route::get('/studycenter1', [StudycenterController::class, 'studycenter1'])->name('studycenter1');
        Route::post('/createstudycenter', [StudycenterController::class, 'createstudycenter'])->name('createstudycenter');
        Route::get('/studycentertables', [StudycenterController::class, 'studycentertables'])->name('studycentertables');
        Route::get('/studycentapproved/{id}', [StudycenterController::class, 'studycentapproved'])->name('studycentapproved');
        Route::get('/studycentsuspend/{id}', [StudycenterController::class, 'studycentsuspend'])->name('studycentsuspend');
        Route::get('/studycentdelete/{id}', [StudycenterController::class, 'studycentdelete'])->name('studycentdelete');
        Route::post('/createam', [TeamController::class, 'createam'])->name('createam');
        Route::get('/addteam', [TeamController::class, 'addteam'])->name('addteam');
        Route::get('/viewteam', [TeamController::class, 'viewteam'])->name('viewteam');
        Route::get('/viewsingteam/{ref_no}', [TeamController::class, 'viewsingteam'])->name('viewsingteam');
        Route::get('/editteam/{id}', [TeamController::class, 'editteam'])->name('editteam');
        Route::put('/updateteam/{id}', [TeamController::class, 'updateteam'])->name('updateteam');
        Route::get('/teamsuspend/{ref_no}', [TeamController::class, 'teamsuspend'])->name('teamsuspend');
        Route::get('/teamapproved/{ref_no}', [TeamController::class, 'teamapproved'])->name('teamapproved');
        Route::get('/teamsacked/{ref_no}', [TeamController::class, 'teamsacked'])->name('teamsacked');
        Route::get('/staffdelete/{ref_no}', [TeamController::class, 'staffdelete'])->name('staffdelete');
        Route::get('/viewsinglesubjectschool/{user_id}', [SubjectController::class, 'viewsinglesubjectschool'])->name('viewsinglesubjectschool');
        
        Route::put('/createrol/{id}', [UserController::class, 'createrol'])->name('createrol');
        Route::get('/addrole/{id}', [UserController::class, 'addrole'])->name('addrole');
        Route::get('/viewroles', [UserController::class, 'viewroles'])->name('viewroles');
        Route::get('/addevent', [EventController::class, 'addevent'])->name('addevent');
        Route::get('/createteevent', [EventController::class, 'createteevent'])->name('createteevent');
        Route::get('/viewevents', [EventController::class, 'viewevents'])->name('viewevents');
        Route::get('/eventview/{ref_no}', [EventController::class, 'eventview'])->name('eventview');
        Route::get('/eventedit/{ref_no}', [EventController::class, 'eventedit'])->name('eventedit');
        Route::put('/updateevent/{ref_no}', [EventController::class, 'updateevent'])->name('updateevent');
        Route::get('/eventeapproved/{ref_no}', [EventController::class, 'eventeapproved'])->name('eventeapproved');
        Route::get('/eventesuspend/{ref_no}', [EventController::class, 'eventesuspend'])->name('eventesuspend');
        Route::get('/eventedelete/{ref_no}', [EventController::class, 'eventedelete'])->name('eventedelete');
        Route::get('/eventedelete/{ref_no}', [EventController::class, 'eventedelete'])->name('eventedelete');
        Route::get('/addblog', [BlogController::class, 'addblog'])->name('addblog');
        Route::get('/viewblog', [BlogController::class, 'viewblog'])->name('viewblog');
        Route::post('/createblog', [BlogController::class, 'createblog'])->name('createblog');
        Route::get('/blogview/{ref_no}', [BlogController::class, 'blogview'])->name('blogview');
        Route::get('/blogedit/{ref_no}', [BlogController::class, 'blogedit'])->name('blogedit');
        Route::put('/updateblog/{ref_no}', [BlogController::class, 'updateblog'])->name('updateblog');
        Route::get('/blogeapproved/{ref_no}', [BlogController::class, 'blogeapproved'])->name('blogeapproved');
        Route::get('/blogesuspend/{ref_no}', [BlogController::class, 'blogesuspend'])->name('blogesuspend');
        Route::get('/blogedelete/{ref_no}', [BlogController::class, 'blogedelete'])->name('blogedelete');
        Route::get('/addgallery', [GalleryController::class, 'addgallery'])->name('addgallery');
        Route::post('/createtgallery', [GalleryController::class, 'createtgallery'])->name('createtgallery');
        Route::get('/viewgallery', [GalleryController::class, 'viewgallery'])->name('viewgallery');
        Route::get('/galleryedit/{id}', [GalleryController::class, 'galleryedit'])->name('galleryedit');
        Route::put('/updategallery/{id}', [GalleryController::class, 'updategallery'])->name('updategallery');
        Route::get('/gallerydelete/{id}', [GalleryController::class, 'gallerydelete'])->name('gallerydelete');
        
        Route::get('/addfacility', [FacilityController::class, 'addfacility'])->name('addfacility');
        Route::post('/createfacility', [FacilityController::class, 'createfacility'])->name('createfacility');
        Route::get('/viewfacility', [FacilityController::class, 'viewfacility'])->name('viewfacility');
        Route::get('/facilityedit/{id}', [FacilityController::class, 'facilityedit'])->name('facilityedit');
        Route::put('/updatefacility/{id}', [FacilityController::class, 'updatefacility'])->name('updatefacility');
        Route::get('/facilitydelete/{id}', [FacilityController::class, 'facilitydelete'])->name('facilitydelete');
        Route::get('/schoolpdf/{ref_no1}', [UserController::class, 'schoolpdf'])->name('schoolpdf');
        Route::get('/rejectschool/{ref_no1}', [UserController::class, 'rejectschool'])->name('rejectschool');
        Route::get('/suspendschool/{ref_no1}', [UserController::class, 'suspendschool'])->name('suspendschool');
        Route::get('/schoolsaddmit/{ref_no1}', [UserController::class, 'schoolsaddmit'])->name('schoolsaddmit');
        Route::get('/viewschapproved', [UserController::class, 'viewschapproved'])->name('viewschapproved');
        Route::get('/viewschrejected', [UserController::class, 'viewschrejected'])->name('viewschrejected');
        
        
        Route::get('/viewmainslider', [MainsliderController::class, 'viewmainslider'])->name('viewmainslider');
        Route::get('/addmainslider', [MainsliderController::class, 'addmainslider'])->name('addmainslider');
        Route::post('/createteslider', [MainsliderController::class, 'createteslider'])->name('createteslider');
        Route::get('/slideredit/{id}', [MainsliderController::class, 'slideredit'])->name('slideredit');
        Route::put('/updateslider/{id}', [MainsliderController::class, 'updateslider'])->name('updateslider');
        Route::get('/slideredelete/{id}', [MainsliderController::class, 'slideredelete'])->name('slideredelete');
        
        Route::get('/viewschreview', [UserController::class, 'viewschreview'])->name('viewschreview');
        Route::get('/viewstudent/{ref_no}', [StudentController::class, 'viewstudent'])->name('viewstudent');
        Route::get('/editstudent/{ref_no}', [StudentController::class, 'editstudent'])->name('editstudent');
        Route::put('/updateadmission/{ref_no}', [UserController::class, 'updateadmission'])->name('updateadmission');
        Route::get('/rejectstudent/{ref_no}', [StudentController::class, 'rejectstudent'])->name('rejectstudent');
        Route::get('/viewschool/{ref_no}', [UserController::class, 'viewschool'])->name('viewschool');
        
        Route::get('rejectedstudent', [UserController::class, 'rejectedstudent'])->name('rejectedstudent');
        Route::get('studentsapprove/{ref_no}', [UserController::class, 'studentsapprove'])->name('studentsapprove');
        Route::get('suspendstudent/{ref_no}', [StudentController::class, 'suspendstudent'])->name('suspendstudent');
        Route::get('suspendstudents', [StudentController::class, 'suspendstudents'])->name('suspendstudents');
        Route::get('studentsaddmit/{ref_no}', [StudentController::class, 'studentsaddmit'])->name('studentsaddmit');
        Route::get('admittedstudents', [StudentController::class, 'admittedstudents'])->name('admittedstudents');
        Route::get('allstudents', [StudentController::class, 'allstudents'])->name('allstudents');
        Route::get('deletestudent/{ref_no}', [StudentController::class, 'deletestudent'])->name('deletestudent');
        Route::get('/addregno/{id}', [StudentController::class, 'addregno'])->name('addregno');
        Route::put('/addingregno/{id}', [StudentController::class, 'addingregno'])->name('addingregno');
        Route::get('/studentpdf/{ref_no}', [StudentController::class, 'studentpdf'])->name('studentpdf');
        Route::get('/medicalspdf/{ref_no}', [StudentController::class, 'medicalspdf'])->name('medicalspdf');
        Route::get('/allstudentpdf', [StudentController::class, 'allstudentpdf'])->name('allstudentpdf');
        Route::get('/allcrechepdf', [StudentController::class, 'allcrechepdf'])->name('allcrechepdf');
        Route::get('/allnurserypdf', [StudentController::class, 'allnurserypdf'])->name('allnurserypdf');
        Route::get('/allprimarypdf', [StudentController::class, 'allprimarypdf'])->name('allprimarypdf');
        Route::get('/allhighschpdf', [StudentController::class, 'allhighschpdf'])->name('allhighschpdf');
        Route::get('/viewalluyo', [StudentController::class, 'viewalluyo'])->name('viewalluyo');
        Route::get('/alluyocrechepdf', [StudentController::class, 'alluyocrechepdf'])->name('alluyocrechepdf');
        Route::get('/alluyopreperatorypdf', [StudentController::class, 'alluyopreperatorypdf'])->name('alluyopreperatorypdf');
        Route::get('/allpreschoolpdf', [StudentController::class, 'allpreschoolpdf'])->name('allpreschoolpdf');
        Route::get('/alluyonurserypdf', [StudentController::class, 'alluyonurserypdf'])->name('alluyonurserypdf');
        Route::get('/alluyoprimarypdf', [StudentController::class, 'alluyoprimarypdf'])->name('alluyoprimarypdf');
        Route::get('/alluyohighschpdf', [StudentController::class, 'alluyohighschpdf'])->name('alluyohighschpdf');
        Route::get('/alluyocentpdf', [StudentController::class, 'alluyocentpdf'])->name('alluyocentpdf');
        Route::get('/viewpreparatory', [StudentController::class, 'viewpreparatory'])->name('viewpreparatory');
        Route::get('/viewpreschool', [StudentController::class, 'viewpreschool'])->name('viewpreschool');
        Route::get('/viewnursery', [StudentController::class, 'viewnursery'])->name('viewnursery');
        Route::get('/viewprimary', [StudentController::class, 'viewprimary'])->name('viewprimary');
        Route::get('/viewhighschool', [StudentController::class, 'viewhighschool'])->name('viewhighschool');
        Route::get('/viewallabuja', [StudentController::class, 'viewallabuja'])->name('viewallabuja');
        Route::get('/allabujacrechepdf', [StudentController::class, 'allabujacrechepdf'])->name('allabujacrechepdf');
        Route::get('/allabujapdf', [StudentController::class, 'allabujapdf'])->name('allabujapdf');
        Route::get('/allabujapreperatorypdf', [StudentController::class, 'allabujapreperatorypdf'])->name('allabujapreperatorypdf');
        Route::get('/allabujapreschoolpdf', [StudentController::class, 'allabujapreschoolpdf'])->name('allabujapreschoolpdf');
        Route::get('/allabujanurserypdf', [StudentController::class, 'allabujanurserypdf'])->name('allabujanurserypdf');
        Route::get('/allabujaprimarypdf', [StudentController::class, 'allabujaprimarypdf'])->name('allabujaprimarypdf');
        Route::get('/allabujahighschpdf', [StudentController::class, 'allabujahighschpdf'])->name('allabujahighschpdf');
        Route::get('/viewabujapreparatory', [StudentController::class, 'viewabujapreparatory'])->name('viewabujapreparatory');
        Route::get('/abujapreschool', [StudentController::class, 'abujapreschool'])->name('abujapreschool');
        Route::get('/viewabujanursery', [StudentController::class, 'viewabujanursery'])->name('viewabujanursery');
        Route::get('/viewabujaprimary', [StudentController::class, 'viewabujaprimary'])->name('viewabujaprimary');
        Route::get('/viewabjhighschool', [StudentController::class, 'viewabjhighschool'])->name('viewabjhighschool');
        Route::post('/createparent', [StudentParentController::class, 'createparent'])->name('createparent');
        Route::get('/viewparents', [StudentParentController::class, 'viewparents'])->name('viewparents');
        Route::get('/viewparent/{ref_no}', [StudentParentController::class, 'viewparent'])->name('viewparent');
        Route::get('/editparent/{ref_no}', [StudentParentController::class, 'editparent'])->name('editparent');
        Route::put('/updateparent/{ref_no}', [StudentParentController::class, 'updateparent'])->name('updateparent');
        Route::get('/addchild/{id}', [StudentParentController::class, 'addchild'])->name('addchild');
        Route::post('/add_childto_parents', [UserController::class, 'add_childto_parents'])->name('add_childto_parents');
        Route::get('/parentochild/{id}', [StudentParentController::class, 'parentochild'])->name('parentochild');
        Route::get('/pad', [StudentParentController::class, 'pad'])->name('pad');
        Route::get('/viewresults', [ResultController::class, 'viewresults'])->name('viewresults');
        Route::get('/viewresult/{id}', [ResultController::class, 'viewresult'])->name('viewresult');
        Route::get('/subdelte/{id}', [SubjectController::class, 'subdelte'])->name('subdelte');
        Route::get('/viewclasses', [ClassnameController::class, 'viewclasses'])->name('viewclasses');
        Route::get('/viewsingleclassschool/{user_id}', [ClassnameController::class, 'viewsingleclassschool'])->name('viewsingleclassschool');
        Route::get('/addnotification', [NotificationController::class, 'addnotification'])->name('addnotification');
        Route::post('/createnotification', [NotificationController::class, 'createnotification'])->name('createnotification');
        Route::get('/viewnotification', [NotificationController::class, 'viewnotification'])->name('viewnotification');
        Route::get('/editnotification/{id}', [NotificationController::class, 'editnotification'])->name('editnotification');
        Route::put('/updatenotification/{id}', [NotificationController::class, 'updatenotification'])->name('updatenotification');
        Route::get('/deletenoti/{id}', [NotificationController::class, 'deletenoti'])->name('deletenoti');
        Route::get('/teacherpsycomotor', [TeacherdomainController::class, 'teacherpsycomotor'])->name('teacherpsycomotor');
        
        
        
        
         
        Route::get('/testimonyedelete/{id}', [TestimonyController::class, 'testimonyedelete'])->name('testimonyedelete');
        Route::get('/testimonyesuspend/{id}', [TestimonyController::class, 'testimonyesuspend'])->name('testimonyesuspend');
        Route::get('/testimonyeapproved/{id}', [TestimonyController::class, 'testimonyeapproved'])->name('testimonyeapproved');
        Route::put('/updatetestimony/{id}', [TestimonyController::class, 'updatetestimony'])->name('updatetestimony');
        Route::get('/testimonyedit/{id}', [TestimonyController::class, 'testimonyedit'])->name('testimonyedit');
        Route::get('/testimonyview/{id}', [TestimonyController::class, 'testimonyview'])->name('testimonyview');
        Route::get('/addtestimony', [TestimonyController::class, 'addtestimony'])->name('addtestimony');
        Route::get('/allsubjects', [SubjectController::class, 'allsubjects'])->name('allsubjects');
        Route::get('/setsubjectquestions', [SubjectController::class, 'setsubjectquestions'])->name('setsubjectquestions');
        Route::get('/addquestions/{id}', [SubjectController::class, 'addquestions'])->name('addquestions');
        Route::post('/addquestions', [QuestionController::class, 'addquestions'])->name('addquestions');
        Route::post('/addbyadminquestion', [QuestionController::class, 'addbyadminquestion'])->name('addbyadminquestion');
        Route::get('/questionbyadmin', [QuestionController::class, 'questionbyadmin'])->name('questionbyadmin');
        Route::get('/viewsinglequestionz/{id}', [QuestionController::class, 'viewsinglequestionz'])->name('viewsinglequestionz');
        Route::get('/editquestionzadmin/{id}', [QuestionController::class, 'editquestionzadmin'])->name('editquestionzadmin');
        Route::get('/questionzapprove/{id}', [QuestionController::class, 'questionzapprove'])->name('questionzapprove');
        Route::get('/questionzsunapprove/{id}', [QuestionController::class, 'questionzsunapprove'])->name('questionzsunapprove');
        Route::put('/updateadminquestion/{id}', [QuestionController::class, 'updateadminquestion'])->name('updateadminquestion');
        Route::get('/uyoquestions', [QuestionController::class, 'uyoquestions'])->name('uyoquestions');
        Route::get('/abujaquestions', [QuestionController::class, 'abujaquestions'])->name('abujaquestions');
        Route::get('/teachersquestion/{user_id}', [QuestionController::class, 'teachersquestion'])->name('teachersquestion');
        
        
        Route::get('/addnidnetcoursesl1stsem', [RegistercourseController::class, 'addnidnetcoursesl1stsem'])->name('addnidnetcoursesl1stsem');
        Route::get('/viewnetworkcourses', [RegistercourseController::class, 'viewnetworkcourses'])->name('viewnetworkcourses');
        Route::get('/print1stinglepaymentspdf/{id}', [StudentController::class, 'print1stinglepaymentspdf'])->name('print1stinglepaymentspdf');
        Route::get('/viewallpaymentfirst', [StudentController::class, 'viewallpaymentfirst'])->name('viewallpaymentfirst');
        Route::get('/print1stinglepaymentspdfgf', [StudentController::class, 'print1stinglepaymentspdfgf'])->name('print1stinglepaymentspdfgf');

        Route::post('/createtestimony', [TestimonyController::class, 'createtestimony'])->name('createtestimony');
        Route::get('/addtestimony', [TestimonyController::class, 'addtestimony'])->name('addtestimony');
        Route::get('/viewtestimony', [TestimonyController::class, 'viewtestimony'])->name('viewtestimony');
        Route::get('/testimonyview/{id}', [TestimonyController::class, 'testimonyview'])->name('testimonyview');
        Route::get('/testimonyedit/{id}', [TestimonyController::class, 'testimonyedit'])->name('testimonyedit');
        Route::put('/updatetestimony/{id}', [TestimonyController::class, 'updatetestimony'])->name('updatetestimony');
        Route::get('/testimonyeapproved/{id}', [TestimonyController::class, 'testimonyeapproved'])->name('testimonyeapproved');
        Route::get('/testimonyesuspend/{id}', [TestimonyController::class, 'testimonyesuspend'])->name('testimonyesuspend');
        Route::get('/testimonyedelete/{id}', [TestimonyController::class, 'testimonyedelete'])->name('testimonyedelete');
        Route::get('/addevent', [EventController::class, 'addevent'])->name('addevent');
        Route::post('/createteevent', [EventController::class, 'createteevent'])->name('createteevent');
        Route::get('/viewevents', [EventController::class, 'viewevents'])->name('viewevents');
        Route::get('/eventeapproved/{slug}', [EventController::class, 'eventeapproved'])->name('eventeapproved');
        Route::get('/eventesuspend/{slug}', [EventController::class, 'eventesuspend'])->name('eventesuspend');
        
        Route::view('/home','dashboard.admin.home')->name('home');
        
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::get('viewsfees/{ref_no}', [StudentController::class, 'viewsfees'])->name('viewsfees');

        Route::get('/studentit/{ref_no}', [StudentController::class, 'studentit'])->name('studentit');
        Route::get('/viewstudents/{surname}', [StudentController::class, 'viewstudents'])->name('viewstudents');
        

        Route::get('approvedstudents', [StudentController::class, 'approvedstudents'])->name('approvedstudents');

        Route::get('/contactdelete/{id}', [ContactController::class, 'contactdelete'])->name('contactdelete');

        Route::get('/legalcontact', [VisitController::class, 'legalcontact'])->name('legalcontact');
       
        Route::put('/settingsupdate/{id}', [AdminController::class, 'settingsupdate'])->name('settingsupdate');
        
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout'); 
        
       
    });
});


Route::put('/update3rddeadverts1/{ref_no}', [BlogController::class, 'update3rddeadverts1'])->name('update3rddeadverts1');
Route::get('/add3images1/{ref_no}', [BlogController::class, 'add3images1'])->name('add3images1');
Route::put('/update2ndeadverts1/{ref_no}', [BlogController::class, 'update2ndeadverts1'])->name('update2ndeadverts1');
Route::get('/add2ndimage1/{ref_no}', [BlogController::class, 'add2ndimage1'])->name('add2ndimage1');
Route::get('/add3images/{ref_no}', [BlogController::class, 'add3images'])->name('add3images');
Route::get('/add4images/{ref_no}', [BlogController::class, 'add4images'])->name('add4images');
Route::get('/add2ndimage/{ref_no}', [BlogController::class, 'add2ndimage'])->name('add2ndimage');

Route::put('/update4rddeadverts/{ref_no}', [BlogController::class, 'update4rddeadverts'])->name('update4rddeadverts');
Route::put('/update2ndeadverts/{ref_no}', [BlogController::class, 'update2ndeadverts'])->name('update2ndeadverts');
Route::put('/update3rddeadverts/{ref_no}', [BlogController::class, 'update3rddeadverts'])->name('update3rddeadverts');

Route::prefix('web')->name('web.')->group(function() {

    Route::middleware(['guest:web'])->group(function() {
        
        Route::post('/checkfirst', [UserController::class, 'checkfirst'])->name('checkfirst');
    });
    
    Route::middleware(['auth:web'])->group(function() {

        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::post('/createschoolnews', [SchoolnewsController::class, 'createschoolnews'])->name('createschoolnews');
        
        Route::get('/approvedresultsc/{id}', [ResultController::class, 'approvedresultsc'])->name('approvedresultsc');
        Route::get('/addpsychomotors', [DomainController::class, 'addpsychomotors'])->name('addpsychomotors');
        Route::post('/createsdomains', [DomainController::class, 'createsdomains'])->name('createsdomains');
        Route::get('/viewallpschomotors', [DomainController::class, 'viewallpschomotors'])->name('viewallpschomotors');
        Route::get('/editpsycomotor/{id}', [DomainController::class, 'editpsycomotor'])->name('editpsycomotor');
        Route::put('/updatedomains/{id}', [DomainController::class, 'updatedomains'])->name('updatedomains');
        Route::get('/deletepsycomotor/{ref_no}', [DomainController::class, 'deletepsycomotor'])->name('deletepsycomotor');
        
        Route::get('/viewyourteachers/{section}', [SectionController::class, 'viewyourteachers'])->name('viewyourteachers');
        Route::get('/edittteachersc/{ref_no}', [TeacherController::class, 'edittteachersc'])->name('edittteachersc');
        Route::get('/approveteacherbysc/{ref_no}', [TeacherController::class, 'approveteacherbysc'])->name('approveteacherbysc');
        Route::put('/updatesteacher/{ref_no}', [TeacherController::class, 'updatesteacher'])->name('updatesteacher');
        Route::get('/viewtteachersc/{ref_no}', [TeacherController::class, 'viewtteachersc'])->name('viewtteachersc');
        Route::get('/suspendteacherbysc/{ref_no}', [TeacherController::class, 'suspendteacherbysc'])->name('suspendteacherbysc');
        Route::get('/deleteteachersc/{ref_no}', [TeacherController::class, 'deleteteachersc'])->name('deleteteachersc');
        // Route::get('/yourclassbyteacher', [TeacherController::class, 'yourclassbyteacher'])->name('yourclassbyteacher');
        Route::get('assignedsubjects/{id}', [SubjectController::class, 'assignedsubjects'])->name('assignedsubjects');
        Route::post('assignsubjectstoteacherbysc', [TeacherassignController::class, 'assignsubjectstoteacherbysc'])->name('assignsubjectstoteacherbysc');
        
        Route::get('/viewsection/{section}', [SectionController::class, 'viewsection'])->name('viewsection');
        Route::get('/deletesection/{ref_no}', [SectionController::class, 'deletesection'])->name('deletesection');
        Route::put('/updatesection/{ref_no}', [SectionController::class, 'updatesection'])->name('updatesection');
        Route::get('/editsection/{ref_no}', [SectionController::class, 'editsection'])->name('editsection');
        Route::get('/viewallsection', [SectionController::class, 'viewallsection'])->name('viewallsection');
        Route::post('/createsection', [SectionController::class, 'createsection'])->name('createsection');
        Route::get('/addsection', [SectionController::class, 'addsection'])->name('addsection');
        Route::get('/mysubjectsguestion', [TeacherassignController::class, 'mysubjectsguestion'])->name('mysubjectsguestion');
        
        Route::get('/editquestion/{id}', [QuestionController::class, 'editquestion'])->name('editquestion');
        Route::get('/addterm', [TermController::class, 'addterm'])->name('addterm');
        Route::post('/createterm', [TermController::class, 'createterm'])->name('createterm');
        
        Route::get('/viewyourstudentsprimary/{section}', [SectionController::class, 'viewyourstudentsprimary'])->name('viewyourstudentsprimary');
        Route::put('/updatealms/{id}', [AlmController::class, 'updatealms'])->name('updatealms');
        Route::get('/editalms/{id}', [AlmController::class, 'editalms'])->name('editalms');
        Route::get('/viewallalms', [AlmController::class, 'viewallalms'])->name('viewallalms');
        Route::post('/createstudent', [StudentController::class, 'createstudent'])->name('createstudent');
        Route::post('/createalms', [AlmController::class, 'createalms'])->name('createalms');
        Route::get('/addalms', [AlmController::class, 'addalms'])->name('addalms');

        
        Route::get('/rejectadvert/{slug1}', [SchoolnewsController::class, 'rejectadvert'])->name('rejectadvert');
        Route::get('/suspendadvert/{slug1}', [SchoolnewsController::class, 'suspendadvert'])->name('suspendadvert');
        Route::get('/approveadvert/{slug1}', [SchoolnewsController::class, 'approveadvert'])->name('approveadvert');
        Route::put('/updateeadverts/{ref_no}', [SchoolnewsController::class, 'updateeadverts'])->name('updateeadverts');
        Route::get('/editadvert/{ref_no}', [SchoolnewsController::class, 'editadvert'])->name('editadvert');
        Route::get('/viewadverts/{slug}', [SchoolnewsController::class, 'viewadverts'])->name('viewadverts');
        Route::get('/viewyouradverts', [SchoolnewsController::class, 'viewyouradverts'])->name('viewyouradverts');
        Route::post('/createadverts', [BlogController::class, 'createadverts'])->name('createadverts');
        Route::get('/addaverts', [SchoolnewsController::class, 'addaverts'])->name('addaverts');
        Route::get('/viewclassesbysc/{classname}', [ClassnameController::class, 'viewclassesbysc'])->name('viewclassesbysc');
        Route::get('/viewterm/{term}', [TermController::class, 'viewterm'])->name('viewterm');
        Route::get('/viewalms/{alms}', [AlmController::class, 'viewalms'])->name('viewalms');
        Route::get('/firstermresults/{term}', [TermController::class, 'firstermresults'])->name('firstermresults');
        Route::get('/deletestudentsc/{ref_no}', [StudentController::class, 'deletestudentsc'])->name('deletestudentsc');
        Route::post('/reachresultbysc', [ResultController::class, 'reachresultbysc'])->name('reachresultbysc');
        Route::post('/reachresultbystudentsc', [ResultController::class, 'reachresultbystudentsc'])->name('reachresultbystudentsc');
        
        Route::get('/allresults', [ResultController::class, 'allresults'])->name('allresults');
        Route::get('/viewyourstudentsecondary', [StudentController::class, 'viewyourstudentsecondary'])->name('viewyourstudentsecondary');
        Route::put('/updatescstudent/{ref_no1}', [StudentController::class, 'updatescstudent'])->name('updatescstudent');
        Route::get('/deletesubjectsc/{id}', [SubjectController::class, 'deletesubjectsc'])->name('deletesubjectsc');
        Route::put('/updatesubjectsc/{id}', [SubjectController::class, 'updatesubjectsc'])->name('updatesubjectsc');
        Route::get('/editsubjectsc/{id}', [SubjectController::class, 'editsubjectsc'])->name('editsubjectsc');
        Route::get('/viewallsubjects', [SubjectController::class, 'viewallsubjects'])->name('viewallsubjects');
        Route::get('/viewallsubjects', [SubjectController::class, 'viewallsubjects'])->name('viewallsubjects');
        Route::post('/createsubjectsc', [SubjectController::class, 'createsubjectsc'])->name('createsubjectsc');
        Route::get('/addsubjectsc', [SubjectController::class, 'addsubjectsc'])->name('addsubjectsc');
        Route::get('/editstudentsc/{ref_no1}', [StudentController::class, 'editstudentsc'])->name('editstudentsc');
        Route::get('/addstudent', [StudentController::class, 'addstudent'])->name('addstudent');
        Route::put('/updatecclassessc/{ref_no}', [ClassnameController::class, 'updatecclassessc'])->name('updatecclassessc');
        Route::get('/editclas1/{ref_no}', [ClassnameController::class, 'editclas1'])->name('editclas1');
        Route::get('/viewallclasses', [ClassnameController::class, 'viewallclasses'])->name('viewallclasses');
        Route::get('/deleteterm/{connect}', [TermController::class, 'deleteterm'])->name('deleteterm');
        Route::put('/updateclassessc/{id}', [TermController::class, 'updateclassessc'])->name('updateclassessc');
        Route::get('/editterm/{id}', [TermController::class, 'editterm'])->name('editterm');
        Route::get('/viewallterm', [TermController::class, 'viewallterm'])->name('viewallterm');
        Route::post('/createclassessc', [ClassnameController::class, 'createclassessc'])->name('createclassessc');
        Route::get('/addclassessc', [ClassnameController::class, 'addclassessc'])->name('addclassessc');
        Route::get('/mysquestions', [QuestionController::class, 'mysquestions'])->name('mysquestions');
        Route::post('/createquestion', [QuestionController::class, 'createquestion'])->name('createquestion');
        Route::get('/setquestion/{id}', [QuestionController::class, 'setquestion'])->name('setquestion');
        Route::get('/viewquestion/{id}', [QuestionController::class, 'viewquestion'])->name('viewquestion');
        Route::get('/viewquestion/{id}', [QuestionController::class, 'viewquestion'])->name('viewquestion');
        Route::get('/printresult/{id}', [ResultController::class, 'printresult'])->name('printresult');
        Route::get('/mysubjects', [TeacherassignController::class, 'mysubjects'])->name('mysubjects');
        Route::post('/yourresult', [ResultController::class, 'yourresult'])->name('yourresult');
        Route::get('/checkresult', [ResultController::class, 'checkresult'])->name('checkresult');
        Route::get('/checkresultterminal', [ResultController::class, 'checkresultterminal'])->name('checkresultterminal');
        Route::get('/teacherviewresults3rd/{id}', [ResultController::class, 'teacherviewresults3rd'])->name('teacherviewresults3rd');
        Route::get('/premiumtermresults', [ResultController::class, 'premiumtermresults'])->name('premiumtermresults');
        Route::get('/teacherviewresults2nd/{id}', [ResultController::class, 'teacherviewresults2nd'])->name('teacherviewresults2nd');
        Route::get('/pensulatermresults', [ResultController::class, 'pensulatermresults'])->name('pensulatermresults');
        Route::get('/addpsychomotor/{user_id}', [ResultController::class, 'addpsychomotor'])->name('addpsychomotor');
        Route::put('/createpsychomotoro/{id}', [ResultController::class, 'createpsychomotoro'])->name('createpsychomotoro');
        Route::post('/createresults', [ResultController::class, 'createresults'])->name('createresults');
        Route::put('/assignstudentclass/{ref_no}', [UserController::class, 'assignstudentclass'])->name('assignstudentclass');
        Route::get('addresults/{id}', [StudentController::class, 'addresults'])->name('addresults');
        Route::get('payment', [SchoolfeeController::class, 'payment'])->name('payment');
        Route::get('myteachers', [TeacherController::class, 'myteachers'])->name('myteachers');
        
        // Route::get('/generate-report', 'ReportController@generateReport');
        Route::post('generatePDF', [ResultController::class, 'generatePDF'])->name('generatePDF');
        //Route::get('generatePdf', [ResultController::class, 'generatePdf'])->name('generatePdf');
        //Route::get('generatePdf', [ResultController::class, 'generatePdf'])->name('generatePdf');
        Route::get('/promotions', [UserController::class, 'promotions'])->name('promotions');
        Route::get('/nurseryschoolheads', [UserController::class, 'nurseryschoolheads'])->name('nurseryschoolheads');
        
        Route::get('/crecheheads', [UserController::class, 'crecheheads'])->name('crecheheads');
        Route::get('/preschoolheads', [UserController::class, 'preschoolheads'])->name('preschoolheads');
        Route::get('/primaryheads', [UserController::class, 'primaryheads'])->name('primaryheads');
        Route::get('/highschools', [UserController::class, 'highschools'])->name('highschools');
        Route::get('/createsection', [UserController::class, 'createsection'])->name('createsection');
        Route::get('/preschoolsection', [UserController::class, 'preschoolsection'])->name('preschoolsection');
        Route::get('/primarysection', [UserController::class, 'primarysection'])->name('primarysection');
        Route::get('/nurserysection', [UserController::class, 'nurserysection'])->name('nurserysection');
        Route::get('/highschoolsection', [UserController::class, 'highschoolsection'])->name('highschoolsection');
        
        Route::get('/classes/{classname}', [ClassnameController::class, 'classes'])->name('classes');
        Route::get('/queryrepliedview', [QueryController::class, 'queryrepliedview'])->name('queryrepliedview');
        Route::get('/printquery1/{id}', [QueryController::class, 'printquery1'])->name('printquery1');
        Route::put('/replyquery/{id}', [QueryController::class, 'replyquery'])->name('replyquery');
        Route::get('/viewqueryreply/{id}', [QueryController::class, 'viewqueryreply'])->name('viewqueryreply');
        Route::get('/viewquery/{id}', [QueryController::class, 'viewquery'])->name('viewquery');
        Route::get('/checkyourquery', [QueryController::class, 'checkyourquery'])->name('checkyourquery');
        Route::get('/teacherviewresults/{student_id}', [ResultController::class, 'teacherviewresults'])->name('teacherviewresults');
        Route::get('/pioneertermresults', [ResultController::class, 'pioneertermresults'])->name('pioneertermresults');
        Route::get('/premiumterm', [UserController::class, 'premiumterm'])->name('premiumterm');
        Route::get('/pioneerterm', [UserController::class, 'pioneerterm'])->name('pioneerterm');
        Route::get('/penultimateterm', [UserController::class, 'penultimateterm'])->name('penultimateterm');
        Route::get('/profile/{ref_no}', [UserController::class, 'profile'])->name('profile');
        Route::get('/admisionletter', [UserController::class, 'admisionletter'])->name('classesdelete');
        Route::get('assignedstudent/{ref_no}', [UserController::class, 'assignedstudent'])->name('assignedstudent');
        
        Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 
        
       
    });
});




Route::prefix('teacher')->name('teacher.')->group(function() {
    Route::middleware(['guest:teacher'])->group(function() {
        Route::view('/login', 'dashboard.teacher.login')->name('login');
        Route::view('/register','dashboard.teacher.register')->name('register');
        //Route::post('/createteacher', [TeacherController::class, 'createteacher'])->name('createteacher');
        Route::post('/teachercheck', [TeacherController::class, 'teachercheck'])->name('teachercheck');

    });
    
    Route::middleware(['auth:teacher'])->group(function() {
        Route::view('/home','dashboard.teacher.home')->name('home');
        Route::get('/home', [TeacherController::class, 'home'])->name('home');

        
        Route::get('/tecacherviewresultbysubapproved', [ResultController::class, 'tecacherviewresultbysubapproved'])->name('tecacherviewresultbysubapproved');
        Route::get('/addpsychomotorteacher1/{teacher_id}', [ResultController::class, 'addpsychomotorteacher1'])->name('addpsychomotorteacher1');
        Route::post('/createdomain', [TeacherdomainController::class, 'createdomain'])->name('createdomain');
        Route::get('/tecacherdomainadd/{ref_no1}', [TeacherController::class, 'tecacherdomainadd'])->name('tecacherdomainadd');
        Route::get('/addpayment', [PaymentController::class, 'addpayment'])->name('addpayment');
        Route::get('/addfeedingpayment', [PaymentController::class, 'addfeedingpayment'])->name('addfeedingpayment');
        Route::post('/createfeeding', [PaymentController::class, 'createfeeding'])->name('createfeeding');
        Route::get('/viewfeedinfees', [PaymentController::class, 'viewfeedinfees'])->name('viewfeedinfees');
        Route::get('/addbuspayment', [PaymentController::class, 'addbuspayment'])->name('addbuspayment');
        Route::get('/viewbusfees', [PaymentController::class, 'viewbusfees'])->name('viewbusfees');
        Route::get('/addpartypayment', [PaymentController::class, 'addpartypayment'])->name('addpartypayment');
        Route::get('/viewpartypayment', [PaymentController::class, 'viewpartypayment'])->name('viewpartypayment');
        Route::get('/viewallpayment', [TransactionController::class, 'viewallpayment'])->name('viewallpayment');
        Route::get('/viewsinglepayment/{ref_no}', [TransactionController::class, 'viewsinglepayment'])->name('viewsinglepayment');
        Route::get('/printsinglepaymentspdfs/{ref_no}', [TransactionController::class, 'printsinglepaymentspdfs'])->name('printsinglepaymentspdfs');
        Route::get('/classpayments/{classname}', [ClassnameController::class, 'classpayments'])->name('classpayments');
        Route::get('/yourclassbyteacher/{classname}', [TeacherController::class, 'yourclassbyteacher'])->name('yourclassbyteacher');
        Route::get('/addresultsbyteacher/{ref_no}', [StudentController::class, 'addresultsbyteacher'])->name('addresultsbyteacher');
        Route::get('/myteachersubjects', [TeacherassignController::class, 'myteachersubjects'])->name('myteachersubjects');
        Route::post('/createresultsbyteacter', [ResultController::class, 'createresultsbyteacter'])->name('createresultsbyteacter');
        Route::post('/createpsychomotorobyteacher', [StudentdomainController::class, 'createpsychomotorobyteacher'])->name('createpsychomotorobyteacher');
        Route::get('/teacherviewdomaiin', [TeacherdomainController::class, 'teacherviewdomaiin'])->name('teacherviewdomaiin');
        
        
        Route::post('/createpartypayments', [PaymentController::class, 'createpartypayments'])->name('createpartypayments');
        Route::post('/createbuspayments', [PaymentController::class, 'createbuspayments'])->name('createbuspayments');
        Route::post('/createpayments', [PaymentController::class, 'createpayments'])->name('createpayments');
        Route::get('/viewfees', [PaymentController::class, 'viewfees'])->name('viewfees');
        Route::get('/viewfee/{id}', [PaymentController::class, 'viewfee'])->name('viewfee');
        Route::get('/editfee/{id}', [PaymentController::class, 'editfee'])->name('editfee');
        Route::put('/updatepayments/{id}', [PaymentController::class, 'updatepayments'])->name('updatepayments');
        Route::get('/approvedfee/{id}', [PaymentController::class, 'approvedfee'])->name('approvedfee');
        Route::get('/printfee/{id}', [PaymentController::class, 'printfee'])->name('printfee');
        Route::get('/printfeeall', [PaymentController::class, 'printfeeall'])->name('printfeeall');
        Route::get('/deletefee/{id}', [PaymentController::class, 'deletefee'])->name('deletefee');
        Route::get('/profile1/{ref_no}', [TeacherController::class, 'profile1'])->name('profile1');
        Route::get('/tecacherviewresultbysub', [ResultController::class, 'tecacherviewresultbysub'])->name('tecacherviewresultbysub');
        Route::get('/addpsychomotorteacher/{id}', [ResultController::class, 'addpsychomotorteacher'])->name('addpsychomotorteacher');
        

        Route::get('/logout', [TeacherController::class, 'logout'])->name('logout'); 
       
    });
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');



//Route::post('/checkfirst', [UserController::class, 'checkfirst'])->name('checkfirst');

Route::get('/registerteacher', [UserController::class, 'registerteacher'])->name('registerteacher');

Route::post('/createschool', [UserController::class, 'createschool'])->name('createschool');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
