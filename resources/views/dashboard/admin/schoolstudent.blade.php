@include('dashboard.admin.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.admin.sidebar')

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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Lastname</th>
                    <th>First Name</th>

                    <th>School </th>
                    <th>Images</th>

                    <th>View Student</th>
                    {{-- <th>Centername</th> --}}
                    <th>Classname</th>
                    <th>Section</th>
                    <th>Term</th>

                    {{-- <th>Email</th> --}}

                   
                    <th>Status</th>
                    <th>Action</th>
                   
                  
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
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
                    @foreach ($schools_studentddss as $schools_studentdds)
                      {{-- @if ($schools_studentdds->status = 'teacher' OR $schools_studentdds->status = 'approved' OR $schools_studentdds->status = 'suspend' OR $schools_studentdds->status = 'sacked' OR $schools_studentdds->status = 'queried') --}}
                      <tr>
                        <td>{{ $schools_studentdds->surname }}</td>
                        <td>{{ $schools_studentdds->fname }}</td>
                        <td><a href="{{ url('admin/viewschoolstudent/'.$schools_studentdds->schoolname) }}">{{ $schools_studentdds->schoolname }}</a></td>

                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$schools_studentdds->images")}}" alt=""></td>
                        <td> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            View Students of this {{ $schools_studentdds->classname }} Class
                          </button></td>
                        {{-- <td>{{ $schools_studentdds->centername }}</td> --}}
                        <td>{{ $schools_studentdds->classname }}</td>
                        <td>{{ $schools_studentdds->section }}</td>
                        <td>{{ $schools_studentdds->term }}</td>
                        {{-- <td>{{ $schools_studentdds->email }}</td> --}}

                       
                       <td>@if ($schools_studentdds->role == 'teacher')
                        <span class="badge badge-secondary">In Progress</span>
                        @elseif ($schools_studentdds->role == 'sacked')
                        <span class="badge badge-danger">Sacked</span>
                        @elseif ($schools_studentdds->role == 'suspend')
                        <span class="badge badge-warning">Suspended</span>
                          @else
                          <span class="badge badge-success">Employed</span>
                        @endif</td>

                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                         
                          <li class="dropdown-item"><a href="{{ url('admin/editstudent/'.$schools_studentdds->ref_no1) }}">Edit</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/viewstudent/'.$schools_studentdds->ref_no1) }}">View</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/studentpdf/'.$schools_studentdds->ref_no1) }}">Print</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/teacherdelete/'.$schools_studentdds->ref_no1) }}">Delete</a></li>
                        </ul>
                      </div></td>
                       

                
                        
                     <td>{{ $schools_studentdds->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Lastname</th>
                        <th>First Name</th>
    
                        <th>School </th>
                        <th>Images</th>
    
                        <th>View Student</th>
                        <th>Classname</th>
                        <th>Section</th>
                        <th>Term</th>    
                       
                        <th>Status</th>
                        <th>Action</th>
                       
                      
                        <th>Date</th>
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
    <strong>Copyright &copy; 2023 <a href="httpS://myschool">myschool.africa</a>.</strong> All rights
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
          <h4 class="modal-title">View Students/Pupils</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <p>One fine body&hellip;</p> --}}
          <form action="{{ url('admin/searchclass') }}" method="post">
            @csrf
            <div class="form-group">
                <select name="classname" class="form-control" id="">
                    @foreach ($schools_studentddss as $schools_studentdds)
                        <option value="{{ $schools_studentdds->classname }}">{{ $schools_studentdds->classname }}</option>
                        
                    @endforeach
                </select>
            </div>

           <div class="form-group">
            <select name="schoolname" class="form-control" id="">
                @foreach ($schools_studentddss as $schools_studentdds)
                    <option value="{{ $schools_studentdds->schoolname }}">{{ $schools_studentdds->schoolname }}</option>
                    
                @endforeach
            </select>
           </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">View</button>
        </div>

    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->