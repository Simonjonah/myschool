@include('dashboard.admin.header')
@include('dashboard.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <small class="float-right">{{ $view_studentsubject->created_at->format('D d, M Y, H:i')}}</small>
                    </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-lg-2 col-md-6 col-sm-4 invoice-col">
                    <img style="width: 80px; height: 80px;" src="{{ asset('images/sch14.png') }}" alt=""> <br>

                
                </div> 
                <!-- /.col -->
               <div class="col-lg-8 col-md-6 col-sm-4 invoice-col">
                 
                  <h1><strong>GOLDEN DESTINY ACADEMY</strong></h1>
                  
                  Golden Destiny Academy Road.
                  Off Senator Akon Eyakenyi Street,
                  Off General Edet Akpan Ave, 520101, Uyo
                </div>
                <!-- /.col -->
                <div class="col-lg-2 col-md-6 col-sm-4 invoice-col">
                    <img style="width: 100px; height: 100px;" src="{{ URL::asset("/public/../$view_studentsubject->images")}}" alt="">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                    <div class="col-12 table-responsive">
                      @if ($view_studentsubject->section === 'Primary')
                      <form action="{{ url('admin/createresultsad') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
      
                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                        @endif
      
                        <table class="table table-striped">
                            <thead>
                            <tr>
                              {{-- <th>S/N</th> --}}
                              <th>Subjects</th>
                              <th>Ca 1</th>
                              <th>Ca 2</th>
                              <th>Ca 3</th>
                              <th>Exams</th>
                              
                            </tr>
                            </thead>
                            <tbody>
      
                                @foreach ($view_teachersubjects as $view_teachersubject)
                                  @if ($view_teachersubject->section == 'Primary')
                                  <tr>
                                      <td><input type="text" value="{{ $view_teachersubject->subjectname }}" name="subjectname[]" id=""></td>
                                      <td><input type="number" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                      <td><input type="number" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                      <td><input type="number" class="form-control" name="test_3[]" placeholder="Test 3"></td>
                                      <td><input type="number" class="form-control" name="exams[]" placeholder="Exams"></td>
                                      <td><input type="hidden" name="teacher_id" value="{{ Auth::guard('admin')->user()->id }}" placeholder="Teacher ID"></td>
                                      <td><input type="hidden" name="user_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID"></td>
                                      <td><input type="hidden" name="term[]" value="{{ $view_studentsubject->term }}" placeholder="Term"></td>
                                      <td><input type="hidden" name="academic_session[]" value="{{ $view_studentsubject->academic_session }}" placeholder="academic_session"></td>
                                      <td><input type="hidden" name="regnumber[]" value="{{ $view_studentsubject->regnumber }}" placeholder="regnumber"></td>
                                      <td><input type="hidden" name="guardian_id[]" value="{{ $view_studentsubject->guardian_id }}" placeholder="Parent ID"></td>
                                    <td><input type="hidden" name="classname[]" value="{{ $view_studentsubject->classname }}" placeholder="Parent ID"></td>
                                      
                                        
                                    </tr>
                                  @else
                                  
                                          
                                  @endif
      
                                @endforeach
                            
      
                            </tbody>
                          </table>
                      
                        {{-- @else
                            
                      @endif --}}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                  Submit 
              </button>
                  
                  @else


                <form action="{{ url('admin/createresultsad') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif

                  <table class="table table-striped">
                      <thead>
                      <tr>
                        {{-- <th>S/N</th> --}}
                        <th>Subjects</th>
                        <th>Ca 1</th>
                        <th>Ca 2</th>
                        <th>Ca 3</th>
                        <th>Exams</th>
                        
                      </tr>
                      </thead>
                      <tbody>

                          @foreach ($view_teachersubjects as $view_teachersubject)
                            @if ($view_teachersubject->section == 'Secondary')
                            <tr>
                                <td><input type="text" value="{{ $view_teachersubject->subjectname }}" name="subjectname[]" id=""></td>
                                <td><input type="number" class="form-control" name="test_1[]" placeholder="Test 1"></td>
                                <td><input type="number" class="form-control" name="test_2[]" placeholder="Test 2"></td>
                                <td><input type="number" class="form-control" name="test_3[]" placeholder="Test 3"></td>
                                <td><input type="number" class="form-control" name="exams[]" placeholder="Exams"></td>
                                <td><input type="hidden" name="teacher_id[]" value="{{ Auth::guard('admin')->user()->id }}" placeholder="Teacher ID"></td>
                                <td><input type="hidden" name="user_id[]" value="{{ $view_studentsubject->id }}" placeholder="ID"></td>
                                <td><input type="hidden" name="term[]" value="{{ $view_studentsubject->term }}" placeholder="Term"></td>
                                <td><input type="hidden" name="academic_session[]" value="{{ $view_studentsubject->academic_session }}" placeholder="academic_session"></td>
                                <td><input type="hidden" name="regnumber[]" value="{{ $view_studentsubject->regnumber }}" placeholder="regnumber"></td>
                                <td><input type="hidden" name="guardian_id[]" value="{{ $view_studentsubject->guardian_id }}" placeholder="Parent ID"></td>
                                <td><input type="text" name="classname[]" value="{{ $view_studentsubject->classname }}" placeholder="Parent ID"></td>
                                   
                              </tr>
                            @else
                            
                                    
                            @endif

                          @endforeach
                      

                      </tbody>
                    </table>
                
                  {{-- @else
                      
                @endif --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                    Submit 
                  </button>
        <div class="row">
          
        
          @endif
              </div>
           

                </form>
                
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>





  
    </div>
    <!-- /.row -->





    

  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.admin.footer')