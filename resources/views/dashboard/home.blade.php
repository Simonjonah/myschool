@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark"><a href="{{ url('/checkresults/'.Auth::user()->slug) }}" target="_blank">{{ url('/checkresults/'.Auth::user()->slug) }}</a></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            
              <li class="breadcrumb-item active">Dashboard </li>
            {{-- <li class="breadcrumb-item active">ffff </li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   @if (Auth::guard('web')->user()->status == null)
     <h3>In Review</h3>
   @elseif (Auth::guard('web')->user()->status == 'suspend')
    <h1>{{ Auth::guard('web')->user()->fname }}, You have been suspended</h1>
    @elseif (Auth::guard('web')->user()->status == 'reject')
    <h1>{{ Auth::guard('web')->user()->fname }}, You have been rejected</h1>
   
   
      </div><!-- /.container-fluid -->
    </section>

{{-- @elseif (Auth::guard('web')->user()->role == 'teacher' AND Auth::guard('web')->user()->status == 'approved') --}}
@elseif (Auth::guard('web')->user()->status == 'admitted')    
<section class="content">
  

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $countyourresults }}</h3>

            <p>Result By Me</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('web/pioneertermresults') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $countmysubjects }}<sup style="font-size: 20px"></sup></h3>

            <p>My Subjects</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('web/mysubjects') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>54</h3>

            <p>Your Query</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          {{-- <a href="{{ url('web/checkyourquery') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>56</h3>

            <p>Replied Query</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          {{-- <a href="{{ route('web.queryrepliedview') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>4</h3>

            <p>Class Activity</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>

          </div>
          {{-- <a href="{{ route('web.viewclassactivities') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->

    </div>
    <!-- /.row -->
    <!-- Main row -->
   <!-- TABLE: LATEST ORDERS -->
   <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Your info</h3>

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
            <th> ID</th>
            <th>Surname</th>
            <th>Firstname</th>
            <th>Phone</th>
            <th>Plans</th>
            <th>Status</th>
          </tr>
          
          </thead>
          <tbody>
          <tr>
            <td><a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no1)  }}">{{ Auth::guard('web')->user()->ref_no1  }}</a></td>
            <td>{{ Auth::guard('web')->user()->surname  }}</td>
            <td>{{ Auth::guard('web')->user()->fname  }}</td>
            <td>{{ Auth::guard('web')->user()->phone  }}</td>
            <td>{{ Auth::guard('web')->user()->plans  }}</td>
           <td> @if (Auth::guard('web')->user()->status = null)
            <span class="badge badge-info">Admission in progress</span>
            @elseif (Auth::guard('web')->user()->status = 'admitted')
            <span class="badge badge-success">Approved</span>
            @elseif (Auth::guard('web')->user()->status = 'reject')
            <span class="badge badge-danger">Rejected</span>
            @elseif (Auth::guard('web')->user()->status = 'approved')
            <span class="badge badge-success">Approved</span>
            @elseif (Auth::guard('web')->user()->status = 'suspend')
            <span class="badge badge-warning">Suspended</span>
            @endif
           </td>
           
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no1)  }}" class="btn btn-sm btn-info float-left">View Profile</a>
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

@endif

    
    <!-- /.content -->
  </div>
  @include('dashboard.footer')