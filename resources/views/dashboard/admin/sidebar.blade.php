<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.jpg') }}" alt="AdminLTE Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light"><br>SCHOOLSUPDATE.NG </span>
    </a>
    
      <?php
        use App\Models\Classname;
          $view_clesses = Classname::all();
      ?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/public/../'.Auth::guard('admin')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('admin/profile') }}" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                <a href="{{ url('admin/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/profile') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/addclass') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Class</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewclassestables') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Classes</p>
                  </a>
                </li>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Administrations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('admin/addblog') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Press Releasse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewblog') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Press Releasse</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.addtestimony') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Testimony</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewtestimony') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Testimony</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.addevent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewevents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Event</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.addteam') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewteam') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Team</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contact Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <li class="nav-item">
                  <a href="{{ url('admin/viewbookings') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Bookings</p>
                  </a>
                </li>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewcontact') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
            </li>
            </ul>
          </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Schools Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewschreview') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Schools in Review</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewschrejected') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Schools Rejected</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewsuspended') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Schools Suspended</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewschapproved') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Schools Approved</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> 



          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Assets
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/addgallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Gallery</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewgallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Galleries</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/addfacility') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Facility</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/viewfacility') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Facilities</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/addmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Main Slider</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/viewmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Main Slider</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> --}}

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                School Info section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewschoolinforeview') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Review Sch. info</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/approveschinfo') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Approved Sch info</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/rejectschinfo') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rejected sch Info</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/suspendschinfo') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Suspend sch Info</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewschoolnews') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View All</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/addmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Main Slider</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/viewmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Main Slider</p>
                  </a>
                </li>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pins Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewpins') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Pins</p>
                  </a>
                </li>


              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
             

              <li class="nav-item">
                <a href="{{ url('admin/adminprogress') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Pupils/Students</p>
                </a>
              </li>
              
              
             
{{--               
              <li class="nav-item">
                <a href="{{ url('admin/admittedstudents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Secondary Students</p>
                </a>
              </li> --}}
             
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Competitions
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
             

              <li class="nav-item">
                <a href="{{ url('admin/viewcompetitions') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Competitions</p>
                </a>
              </li>
              
              

             
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Classes Manage
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Classes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('admin/viewclasses') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Classes</p>
                    </a>
                  </li>
                  
                 
                </ul>
              </li>
            </ul>
             
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addsubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/nurserysubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Prim & Nursery Sub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewsubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Secondary School Sub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/teachertosubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher to Subject</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/allsubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subject</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Session
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addsession') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Session</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewsession') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Session</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Teachers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/approveteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approve Teachers </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/suspendedteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Suspended Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/sackedteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Sacked Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/allteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all Teachers </p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="{{ url('admin/primaryteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primary Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/secondaryteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Secondary Teachers </p>
                </a>
              </li>
              
            </ul>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Payments 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('admin/viewallpaymentsad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Payments</p>
                </a>
              </li>

             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Notification 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
             
                <a href="{{ url('admin/addnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add notification</p>
                </a>
              </li>
              


              <li class="nav-item">
                <a href="{{ url('admin/viewnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notification</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{ url('admin/viewcontact') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>


              
              <li class="nav-item">
                <a href="{{ url('admin/viewvisit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Visit</p>
                </a>
              </li>
            </ul>
          </li>
         
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Notification 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
             
                <a href="{{ url('admin/addnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add notification</p>
                </a>
              </li>
              


              <li class="nav-item">
                <a href="{{ url('admin/viewnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notification</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{ url('admin/viewcontact') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>


              
              <li class="nav-item">
                <a href="{{ url('admin/viewvisit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Visit</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Result Management 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
            
              
              <li class="nav-item">
             
                <a href="{{ url('admin/viewresultbyadmins') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Results</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewapproveresultsbyad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approved Results</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewallresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Results</p>
                </a>
              </li>
               
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Result 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              
              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/addresultsad/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
               
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Psycomotor Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <li class="nav-item">
                  <a href="{{ url('admin/viewpsycomotor') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Psycomotor</p>
                  </a>
                </li>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/teacherpsycomotor') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Psycomotor</p>
                </a>
              </li>
            </li>

             
            </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Roles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
                <li class="nav-item">
                  <a href="{{ url('admin/viewroles') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Role</p>
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
                <a href="{{ url('admin/logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
