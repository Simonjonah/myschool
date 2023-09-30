@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users Profile</li>
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
                       src="{{ asset('/public/../'.Auth::guard('teacher')->user()->images)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ Auth::guard('teacher')->user()->fathername }}</h3>

                <p class="text-muted text-center"> {{ Auth::guard('teacher')->user()->email }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Class</b> <a class="float-right">{{ Auth::guard('teacher')->user()->classname  }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Number of Results</b> <a class="float-right">{{ $countresults }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tra. ID</b> <a class="float-right">{{ Auth::guard('teacher')->user()->ref_no  }}</a>
                  </li>
                </ul>
                 
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
                          {{ Auth::guard('teacher')->user()->created_at->format('D d, M Y, H:i')}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ Auth::guard('teacher')->user()->created_at->diffForHumans() }}</span>

                          <h3 class="timeline-header"><a href="#">Email</a> {{ Auth::guard('teacher')->user()->email }}</h3>

                          <div class="timeline-body">
                          {{-- <h3 class="timeline-header"><a href="#">Contact Address</a> {{ Auth::guard('teacher')->user()->permanentaddress }}</h3> --}}

                            {{ Auth::guard('teacher')->user()->term }}
                          </div>
                          
                        </div>

                         <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ Auth::guard('teacher')->user()->created_at->diffForHumans() }}</span>

                          <h3 class="timeline-header border-0"><a href="#">{{ Auth::guard('teacher')->user()->phone }}</a> {{ Auth::guard('teacher')->user()->phone }}
                          </h3>
                        
                          <h3 class="timeline-header"><a href="#">Section</a> {{ Auth::guard('teacher')->user()->section }}</h3>
                          
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{ Auth::guard('teacher')->user()->created_at->diffForHumans()}}</span>

                         
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
                          {{ Auth::guard('teacher')->user()->created_at->toFormattedDateString() }}
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
                        <label for="inputName" class="col-sm-2 col-form-label"> Father Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ Auth::guard('teacher')->user()->fathername }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Mother Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="lastname" value="{{ Auth::guard('teacher')->user()->mothername }}" class="form-control" id="inputName" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> father Occupation</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" value="{{ Auth::guard('teacher')->user()->fatheroccupation }}" class="form-control" id="inputName" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{ Auth::guard('teacher')->user()->email }}" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" value="{{ Auth::guard('teacher')->user()->motheroccupation }}" class="col-sm-2 col-form-label">Mother Occupation</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{ Auth::guard('teacher')->user()->motheroccupation }}" name="address" id="inputName2" placeholder="Address">
                        </div>
                      </div>
                      <img class="image rounded-circle" src="{{ asset('/public/../'.Auth::guard('teacher')->user()->images)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">

                      <div class="form-group row">
                        <label for="inputName2" value="{{ Auth::guard('teacher')->user()->images }}" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="profileimage" id="inputName2" placeholder="profileimage">
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="number" name="phone" value="{{ Auth::guard('teacher')->user()->phone }}" class="form-control" id="inputSkills" placeholder="Phone">
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