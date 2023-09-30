@include('dashboard.teacher.header')

  @include('dashboard.teacher.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark" style="text-transform: capitalize">{{ Auth::guard('teacher')->user()->fathername }}  
             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (Auth::guard('teacher')->user()->status == 'approved')
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>34</h3>

                <p>Your Children</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>34</h3>

                {{-- <h3><sup style="font-size: 20px"></sup></h3> --}}

                <p>School  Fees</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('teacher/paymenthistory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>5e</h3>

                <p>Class Activities</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('teacher/viewclassactivitypare') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>34</h3>

                <p>Your Class Activity Replied</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              {{-- <a href="{{ route('teacher.viewclassactivityparespecial') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>5</h3>

                <p>Results</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>

              </div>
              {{-- <a href="{{ route('teacher.viewpersonnel') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->
        <!-- Main row -->
       <!-- TABLE: LATEST ORDERS -->
       <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">Student</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>Student ID</th>
                <th>Surname</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Admit Number</th>
                <th>Class</th>
                <th>Picture</th>
              </tr>
              
              </thead>
              <tbody>
                {{-- @foreach ($viewourstudents as $viewourstudent)
              <tr>
                
                <td><a href="{{ url('teacher/parentviewstudent/'.$viewourstudent->ref_no1)  }}">{{ Auth::guard('teacher')->user()->ref_no  }}</a></td>
                <td>{{ $viewourstudent->surname  }}</td>
                <td>{{ $viewourstudent->fname  }}</td>
                <td>{{ $viewourstudent->middlename  }}</td>
                <td>{{ $viewourstudent->ref_no  }}</td>
                <td>{{ $viewourstudent->classname  }}</td>
                <td><img style="width: 50px; height: 50px;" src="{{ URL::asset("/public/../$viewourstudent->images")}}" alt=""></td>
                
               </td>
              </tr>
                @endforeach --}}
                
             
             
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="{{ url('teacher/profile/'.Auth::guard('teacher')->user()->ref_no)  }}" class="btn btn-sm btn-info float-left">View Profile</a>
          {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->


      </div><!-- /.container-fluid -->
    </section>

    @else

    <h2>Welcome Wait for Approval Pls</h2>

    @endif
    
    <!-- /.content -->
  </div>
  @include('dashboard.teacher.footer')