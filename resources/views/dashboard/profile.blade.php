@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>@if (Auth::guard('web')->user()->status == null)
              Please {{ Auth::guard('web')->user()->surname }}, {{ Auth::guard('web')->user()->fname }} your admission is under review we will get bact to you shortly!
            @elseif (Auth::guard('web')->user()->status == 'reject')
              <small class="btn btn-danger">Dear {{ Auth::guard('web')->user()->fname }} You have been rejected in the myschoolafrica School you can do well to contact us through info@myschoolafrica.com</small>
              @elseif (Auth::guard('web')->user()->status == 'suspend')
              <small class="btn btn-warning" style="color: #000">Dear {{ Auth::guard('web')->user()->surname }}, {{ Auth::guard('web')->user()->fname }} {{ Auth::guard('web')->user()->middlename }} You have been suspended in the myschoolafrica School you can do well to contact us through info@myschoolafricaschools.com.ng</small>
              @elseif (Auth::guard('web')->user()->status == 'admitted')
              <p>Congrate!</p>
            <h1 class="m-0 text-dark"><a href="{{ url('/registerteachers/'.Auth::guard('web')->user()->ref_no1) }}" target="_blank">{{ url('/registerteachers/'.Auth::user()->slug) }}</a></h1>
              
              @else
                
              
             
            @endif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="width: 100%; height: 200px;" class="profile-user-img img-fluid"
                       src="{{ asset('/public/../'.Auth::guard('web')->user()->logo)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ Auth::guard('web')->user()->surname }} {{ Auth::guard('web')->user()->fname }}  {{ Auth::guard('web')->user()->middlename }}</h3>

                <p class="text-muted text-center"> {{ Auth::guard('web')->user()->email }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Class</b> <a class="float-right">{{ Auth::guard('web')->user()->classname  }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Section</b> <a class="float-right">{{ Auth::guard('web')->user()->section  }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>ID. Number</b> <a class="float-right">{{ Auth::guard('web')->user()->ref_no1  }}</a>
                  </li>
                </ul>
                  @if (Auth::guard('web')->user()->status == null)
                    <a href="#" class="btn btn-primary btn-block"><b>Admission pending</b></a>
                    
                  @elseif (Auth::guard('web')->user()->status == 'admitted')
                  <a href="#" class="btn btn-success btn-block"><b>Admitted</b></a>
                    @elseif (Auth::guard('web')->user()->status == 'suspend')
                    <a href="#" class="btn btn-warning btn-block"><b>Suspended</b></a>

                    @elseif (Auth::guard('web')->user()->status == 'admitted')
                    <a href="#" class="btn btn-danger btn-block"><b>Reject</b></a>
                    @else
                    
                  @endif
                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
             
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Contact Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Bio Data</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          {{ Auth::guard('web')->user()->created_at->format('D d, M Y, H:i')}}
                        </span>
                        
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ Auth::guard('web')->user()->created_at->diffForHumans() }}</span>

                          <h3 class="timeline-header"><a href="#">Email</a> {{ Auth::guard('web')->user()->email }}</h3>

                          <div class="timeline-body">
                          {{-- <h3 class="timeline-header"><a href="#">Contact Address</a> {{ Auth::guard('web')->user()->permanentaddress }}</h3> --}}

                            {{ Auth::guard('web')->user()->fatheraddress }}
                          </div>
                          
                        </div>

                         <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ Auth::guard('web')->user()->created_at->diffForHumans() }}</span>

                          <h3 class="timeline-header border-0"><a href="#">{{ Auth::guard('web')->user()->phone }}</a> {{ Auth::guard('web')->user()->phone }}
                          </h3>
                        
                          <h3 class="timeline-header"><a href="#">Permanent Address</a> {{ Auth::guard('web')->user()->address }}</h3>
                          
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ Auth::guard('web')->user()->created_at->diffForHumans()}}</span>

                         
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                      
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          {{ Auth::guard('web')->user()->created_at->toFormattedDateString() }}
                        </span>
                      </div>


                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                      @csrf
                      
                      @method('PUT')

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> First Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ Auth::guard('web')->user()->fname }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Middle Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ Auth::guard('web')->user()->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> SurName</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ Auth::guard('web')->user()->surname }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{ Auth::guard('web')->user()->email }}" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" value="{{ Auth::guard('web')->user()->fatheraddress }}" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{ Auth::guard('web')->user()->fatheraddress }}" name="address" id="inputName2" placeholder="Address">
                        </div>
                      </div>
                      <img class="image rounded-circle" src="{{ asset('/public/../'.Auth::guard('web')->user()->logo)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">

                      <div class="form-group row">
                        <label for="inputName2" value="{{ Auth::guard('web')->user()->logo }}" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="profileimage" id="inputName2" placeholder="profileimage">
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="number" name="phone" value="{{ Auth::guard('web')->user()->phone }}" class="form-control" id="inputSkills" placeholder="Phone">
                        </div>
                      </div>
                     
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 </div>
    @include('dashboard.footer')