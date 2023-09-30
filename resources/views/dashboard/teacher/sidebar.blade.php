<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('teacher/home') }}" class="brand-link">
      <img src="{{ asset('/public/../'.Auth::guard('teacher')->user()->logo)}}" alt="teacherLTE Logo" class="brand-image "
           style="opacity: .8"><br>
      <span class="brand-text font-weight-light">{{ Auth::guard('teacher')->user()->schoolname }}</span>
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/public/../'.Auth::guard('teacher')->user()->logo)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('teacher/profile1/'.Auth::guard('teacher')->user()->ref_no) }}" class="d-block">{{ Auth::guard('teacher')->user()->fname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if (Auth::guard('teacher')->user()->status == 'approved')
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
                <a href="{{ url('teacher/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('/teacher/profile1/'.Auth::guard('teacher')->user()->ref_no) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                 Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Your Class {{ Auth::guard('teacher')->user()->classname }}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('teacher/yourclassbyteacher/'.Auth::guard('teacher')->user()->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Children</p>
                </a>
              </li>

              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                View Your Results 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('teacher/tecacherviewresultbysub') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Results</p>
                </a>
              </li>
             
            </ul>
          </li>          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Domains 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('teacher/tecacherdomainadd/'.Auth::guard('teacher')->user()->ref_no1) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Domain</p>
                </a>
              </li>
             
            </ul>
          </li>          


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                My Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('teacher/myteachersubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Subjects</p>
                </a>
              </li>
            
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Class Activities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('teacher/viewclassactivitypare') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Activities</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('teacher/viewclassactivityparespecial') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Special Activity</p>
                </a>
              </li>
            
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Check Result
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              
              <li class="nav-item">
                <a href="{{ url('teacher/checkresult') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Results</p>
                </a>
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
                <a href="{{ route('teacher.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      @elseif (Auth::guard('teacher')->user()->status == 'reject')
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
                <a href="{{ route('teacher.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
        {{-- <h1>Dear {{ Auth::guard('teacher')->user()->fname }}, You have been rejected</h1> --}}
      @elseif (Auth::guard('teacher')->user()->status == 'suspend')
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
                <a href="{{ route('teacher.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      {{-- <h1>Dear {{ Auth::guard('teacher')->user()->fname }}, You have been suspended</h1> --}} 
     @else
     
      <h1>no</h1>
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>
