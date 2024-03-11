            <?php
              use Illuminate\Support\Facades\Auth;

              use App\Models\Term;
              use App\Models\Classname;
              use App\Models\Alm;
              use App\Models\Section;

              $view_terms = Term::orderBy('created_at', 'ASC')->get();

              $view_classes = Classname::orderBy('created_at', 'ASC')->get();

              $view_classsectionds = Classname::where('section', 'Secondary')->orderBy('created_at', 'ASC')->get();

              $view_alms = Alm::where('user_id', auth::guard('web')->id()
              )->orderBy('created_at', 'ASC')->get();

              $view_sections = Section::where('user_id', auth::guard('web')->id()
              )->orderBy('created_at', 'ASC')->get();

          ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('web/home') }}" class="brand-link">
      <img src="{{ asset('/public/../'.Auth::guard('web')->user()->logo)}}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8"><br>
      <span class="brand-text font-weight-light">{{ Auth::guard('web')->user()->schoolname }}</span>
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no11) }}" class="d-block">{{ Auth::guard('web')->user()->fname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if (Auth::guard('web')->user()->status == null)
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no1) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      @elseif (Auth::guard('web')->user()->status == 'reject')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
        {{-- <h1>Dear {{ Auth::guard('web')->user()->fname }}, You have been rejected</h1> --}}
      @elseif (Auth::guard('web')->user()->status == 'suspend')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      {{-- <h1>Dear {{ Auth::guard('web')->user()->fname }}, You have been suspended</h1> --}} 
     
     
   

      @elseif (Auth::guard('web')->user()->status == 'admitted')
     
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
           
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Schools
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/web/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no1) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Terms
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/web/addterm') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Term</p>
                </a>
              </li>
              <li class="nav-item">
                @foreach ($view_terms as $view_term)
                <a href="{{ url('/web/viewterm/'.$view_term->term) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_term->term }}</p>
                </a>
                @endforeach
              </li>
              <li class="nav-item">
                <a href="{{ url('/web/viewallterm/') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              

            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Sections
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/web/addsection') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sections</p>
                </a>
              </li>
              <li class="nav-item">
                @foreach ($view_sections as $view_section)
                <a href="{{ url('/web/viewsection/'.$view_section->section) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_section->section }}</p>
                </a>
                @endforeach
              </li>
              <li class="nav-item">
                <a href="{{ url('/web/viewallsection/') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Section</p>
                </a>
              </li>
              

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Subjects
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/web/addsubjectsc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subjects</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ url('/web/viewallsubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subjects</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/web/subjectsassgned') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Subjects</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('/web/viewallsubjectsteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Subjects</p>
                </a>
              </li>
              

            </ul>
          </li>


         
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Classes
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">46</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/web/addclassessc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Classes</p>
                </a>
              </li>

              
              @foreach ($view_classes as $view_classe)
                <li class="nav-item">
                  <a href="{{ url('/web/viewclassesbysc/'.$view_classe->classname) }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $view_classe->classname }}</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('/web/viewallclasses/') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/web/addsignature') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Signature</p>
                  </a>
                </li>
                
              @endforeach
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Alms 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/web/addalms') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Alms</p>
                </a>
              </li>
              <li class="nav-item">
                @foreach ($view_alms as $view_alm)
                <a href="{{ url('/web/viewalms/'.$view_alm->alms) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_alm->alms }}</p>
                </a>
                @endforeach
              </li>
              <li class="nav-item">
                <a href="{{ url('/web/viewallalms/') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              

            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Results Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                @foreach ($view_classes as $view_classe)
                <a href="{{ url('/web/firstermresults/'.$view_classe->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_classe->classname }} Unapproved Results</p>
                </a>
                @endforeach
              </li>

              {{-- <li class="nav-item">
              
                <a href="{{ url('/web/allresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Results</p>
                </a>
                
              </li> --}}

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Approved Results
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
    
                  <li class="nav-item">
                    @foreach ($view_classes as $view_classe)
                    <a href="{{ url('/web/firstermresultsapproved/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }} Approved Results</p>
                    </a>
                    @endforeach
                  </li>
    
                  <li class="nav-item">
                  
                    <a href="{{ url('/web/allresults') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Results</p>
                    </a>
                    
                  </li>
                  
                </ul>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Psychomotors 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/web/addpsychomotors') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Psycohomotors</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ url('/web/viewallpschomotors/') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Psychomotors</p>
                </a>
              </li>
              

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                School Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/addaverts') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Info</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/viewyouradverts') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Your Info</p>
                </a>
              </li>
              
            </ul>
          </li>


            
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Pupils/Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/addstudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Your Students</p>
                </a>
              </li>
              
              <li class="nav-item">
                @foreach ($view_classes as $view_classe)
                <a href="{{ url('/web/viewyourstudentsprimary/'.$view_classe->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_classe->classname }}</p>
                </a>
                @endforeach

                
              </li>

              <li class="nav-item">
                <a href="{{ url('web/viewyourstudentsecondary') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View All Students</p>
                </a>
              </li>
              
            </ul>
          </li>



                    
          

          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Add Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/addeventsc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Events</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/viewyourevents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Your Events</p>
                </a>
              </li>
              
            

            </ul>
          </li>
 --}}

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Teachers Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @foreach ($view_sections as $view_section)
                <a href="{{ url('/web/viewyourteachers/'.$view_section->section) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_section->section }}</p>
                </a>
                @endforeach
              </li>

              <li class="nav-item">
                <a href="{{ url('/web/viewallsubjectsteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Subjects</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/web/myteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Teachers</p>
                </a>
              </li>

              
            

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Notification
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('web/mynotification') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>My Notification</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('web/viewallnotifications') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Notifications</p>
                  </a>
                </li>
              </li>
                

            </ul>
          </li>

          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav> 
      @else

      <h1>no</h1>
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>
