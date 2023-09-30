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
                <h3 class="card-title" style="color: red">Query Tables</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Lastname</th>
                    <th>Middlename</th>
                    <th>First Name</th>
                    <th>Images</th>

                    <th>Phone</th>
                    <th>Centername</th>
                    <th>Classname</th>
                    <th>Section</th>
                    <th>Entry Level</th>

                    <th>Email</th>

                   
                    {{-- <th>Status</th> --}}
                    <th>View</th>
                   
                    <th>Print</th>
                    <th>Delete</th>
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
                    @foreach ($queried_replied as $queried_replie)
                      {{-- @if ($queried_replie->user['status'] === 'teacher') --}}
                      <tr>
                        <td>{{ $queried_replie->user['surname'] }}</td>
                        <td>{{ $queried_replie->user['middlename'] }}</td>
                        <td>{{ $queried_replie->user['fname'] }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$queried_replie->images")}}" alt=""></td>
                        <td>{{ $queried_replie->user['phone'] }}</td>
                        <td>{{ $queried_replie->user['centername'] }}</td>
                        <td>{{ $queried_replie->user['classname'] }}</td>
                        <td>{{ $queried_replie->user['section'] }}</td>
                        <td>{{ $queried_replie->user['entrylevel'] }}</td>
                        <td>{{ $queried_replie->user['email'] }}</td>

                       
                        {{-- <td>@if ($queried_replie->user['role'] === 'teacher')
                          <span class="badge badge-secondary">In Progress</span>
                          @elseif ($queried_replie->user['role'] === 'sacked')
                          <span class="badge badge-danger">Sacked</span>
                          @elseif ($queried_replie->user['role'] === 'suspend')
                          <span class="badge badge-warning">Suspended</span>
                            @else
                            <span class="badge badge-success">Employed</span>
                          @endif</td> --}}

                     
                       
                     
                      <th><a href="{{ url('admin/viewteacherquery/'.$queried_replie->id) }}" class="btn btn-default"><i class="fas fa-eye"></i></a></th>
                      <th><a href="{{ url('admin/printquery/'.$queried_replie->id) }}" class="btn btn-success"><i class="fas fa-print"></i></a></th>
                       <td><a href="{{ url('admin/teacherdelete/'.$queried_replie->id) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                        
                     <td>{{ $queried_replie->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Lastname</th>
                      <th>Middlename</th>
                      <th>First Name</th>
                      <th>Images</th>
  
                      <th>Phone</th>
                      <th>Centername</th>
                      <th>Classname</th>
                      <th>Section</th>
                      <th>Entry Level</th>
  
                      <th>Email</th>
  
                     
                      {{-- <th>Status</th> --}}
                      <th>View</th>
                     
                      <th>Print</th>
                      <th>Delete</th>
                      <th>Date</th>
                    </tr>
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
    <strong>Copyright &copy; 2023 <a href="httpS://golderndayschools.com">Golderndays</a>.</strong> All rights
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
