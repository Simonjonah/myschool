@include('dashboard.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Students Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    @if (Session::get('success'))
                      <div class="alert alert-success">
                        {{ Session::get('success') }}
                      </div>
                    @endif

                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                      {{ Session::get('fail') }}
                    </div>
                  @endif
                  <tr>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Admission No</th>
                    <th>Status</th>
                    <th>Psycomotor</th>
                    <th>CA 1</th>
                    <th>CA 2</th>
                    <th>CA 3</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Approved</th>
                    <th>View</th>

                  </tr>
                  </thead>
                  <tbody>
                    @php
                        
                      //  $total_score = 0;
                    @endphp
                    @foreach ($view_resultalls as $view_resultall)
                      @php
                         // $total_score +=$view_resultall->test_1 + $view_resultall->test_2 + $view_resultall->test_3 + $view_resultall->exams;
                          
                      @endphp
                      <tr>
                        <td>{{ $view_resultall->surname }}</td>
                        <td>{{ $view_resultall->fname }} <br> <small> Teacher: <a href="{{ url('web/viewtteachersc/'.$view_resultall->teacher['ref_no']) }}">{{ $view_resultall->teacher['fname'] }} {{ $view_resultall->teacher['surname'] }} {{ $view_resultall->teacher['classname'] }} {{ $view_resultall->teacher['term'] }}</a> 
                          
                        </small></td>
                        <td>{{ $view_resultall->middlename }} <br> <small> Class: {{ $view_resultall->classname }}</small></td>
                        <td>{{ $view_resultall->regnumber }} <br>
                          
                          <small> Term: {{ $view_resultall->term }}</small>
                        
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Search For Student Result
                          </button>
                        </td>
                        <td> @if ( $view_resultall->status == null)
                          <span class="badge badge-warning">In review</span>
                          
                        @elseif ( $view_resultall->status == 'approved')
                        <span class="badge badge-success">Approved</span>
                          @elseif ( $view_resultall->status == 'suspend')
                          <a href="#" class="btn btn-warning btn-block"><b>Suspended</b></a>
      
                          @elseif ( $view_resultall->status == 'admitted')
                          <a href="#" class="btn btn-danger btn-block"><b>Reject</b></a>
                          @else
                          
                        @endif
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            Seach Results
                          </button>
                    </td>
                        <td><a href="{{ url('web/addpsychomotor/'.$view_resultall->id) }}"
                          class='btn btn-default'>
                          Add Psycomotor
                           <i class="far fa-eye"></i>

                       

                      {{-- <td>{{ $view_resultall->user['ref_no'] }}</td> --}}
                      <td>{{ $view_resultall->test_1 }}</td>
                      <td>{{ $view_resultall->test_2 }}</td>
                      <td>{{ $view_resultall->test_3 }}</td>
                      <td>{{ $view_resultall->exams }}</td>
                      <td>{{ $view_resultall->test_1 + $view_resultall->test_2 + $view_resultall->test_3 + $view_resultall->exams }}</td>
                      <td>@if ($view_resultall->test_1 + $view_resultall->test_2 + $view_resultall->test_3 + $view_resultall->exams > 79)
                       <p>A</p>
                        @elseif ($view_resultall->test_1 + $view_resultall->test_2 + $view_resultall->test_3 + $view_resultall->exams > 69)
                        <p>B</p>


                        @elseif ($view_resultall->test_1 + $view_resultall->test_2 + $view_resultall->test_3 + $view_resultall->exams > 59)
                        <p>C</p>

                        @elseif ($view_resultall->test_1 + $view_resultall->test_2 + $view_resultall->test_3 + $view_resultall->exams > 49)
                        <p>D</p>

                        @elseif ($view_resultall->test_1 + $view_resultall->test_2 + $view_resultall->test_3 + $view_resultall->exams > 40)
                        <p>E</p>

                        @elseif ($view_resultall->test_1 + $view_resultall->test_2 + $view_resultall->test_3 + $view_resultall->exams > 39)
                        <p>F</p>

                        @else
                        <p>F</p>
                      @endif</td>

                      {{-- <td></td> --}}
                         
                      
                      <td><a href="{{ url('web/approvedresultsc/'.$view_resultall->id)}}"
                        class='btn btn-info'>
                         Approved
                     </a></td>
                         <td><a href="{{ url('web/teacherviewresults/'.$view_resultall->student_id)}}"
                          class='btn btn-default'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       
                  

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Admission No</th>
                      <th>Status</th>
                      <th>Psycomotor</th>

                      {{-- <th>Ref. No</th> --}}
                      <th>CA 1</th>
                      <th>CA 2</th>
                      <th>CA 3</th>
                      <th>Exams</th>
                      <th>Total</th>
                      {{-- <th></th> --}}
                      <th>Grade</th>
                      <th>Approved</th>
                      <th>View</th>
                
                      {{-- <th>Date</th> --}}
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2023 <a href="https://myschoolafrica.com">Myschoolafrica.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="../../assets/plugins/jquery/jquery.min.js"></script>

<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/plugins/jszip/jszip.min.js"></script>
<script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../../assets/dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="../../assets/dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Search Results</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('web/reachresultbysc') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="classname" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->classname }}">{{ $view_resultall->classname }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="academic_session" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->academic_session }}">{{ $view_resultall->academic_session }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="term" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->term }}">{{ $view_resultall->term }}</option>
                    @endforeach

                </select>
            </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <div class="modal fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content bg-success">
        <div class="modal-header">
          <h4 class="modal-title">Search for Students</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('web/reachresultbystudentsc') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="regnumber" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->regnumber }}">{{ $view_resultall->regnumber }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
              <select name="classname" class="form-control" id="">
                  @foreach ($view_resultalls as $view_resultall)
                      <option value="{{ $view_resultall->classname }}">{{ $view_resultall->classname }}</option>
                  @endforeach

              </select>
          </div>

            <div class="form-group">
                <select name="academic_session" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->academic_session }}">{{ $view_resultall->academic_session }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select name="term" class="form-control" id="">
                    @foreach ($view_resultalls as $view_resultall)
                        <option value="{{ $view_resultall->term }}">{{ $view_resultall->term }}</option>
                    @endforeach

                </select>
            </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
        </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->