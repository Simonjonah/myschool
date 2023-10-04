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
                    <th>School Name</th>
                    <th>Phone</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Ref NO</th>
                    <th>Plan</th>
                    <th>Logo</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Approved</th>
                    <th>Reject</th>
                    <th>Suspend</th>
                    <th>Delete</th>

                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($suspend_students as $suspend_student)
                      {{-- @if ($suspend_student->status == null) --}}
                      <tr>
                        <td>{{ $suspend_student->schoolname }}</td>
                        <td>{{ $suspend_student->phone }}</td>

                        <td>{{ $suspend_student->surname }}</td>
                        <td>{{ $suspend_student->fname }}</td>
                        <td>{{ $suspend_student->ref_no1 }}</td>
                        <td>{{ $suspend_student->plans }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$suspend_student->logo")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewschool/'.$suspend_student->ref_no1) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editschool/'.$suspend_student->ref_no1) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>

                       <td><a href="{{ url('admin/schoolapprove/'.$suspend_student->ref_no1) }}"
                        class='btn btn-info'>
                        Approved
                     </a></td>
                     <td><a href="{{ url('admin/schoolreject/'.$suspend_student->ref_no1) }}"
                        class='btn btn-danger'>
                        Reject                         
                     </a></td>

                     <td><a href="{{ url('admin/schoolsuspend/'.$suspend_student->ref_no1) }}"
                        class='btn btn-warning'>
                        Suspend                         
                     </a></td>

                     <td><a href="{{ url('admin/schooldelete/'.$suspend_student->ref_no1) }}"
                        class='btn btn-danger'>
                        <i class="far fa-trash-alt"></i>
                       
                     </a></td>
                   
                       
                        
                     <td>{{ $suspend_student->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>School Name</th>
                        <th>Phone</th>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Ref NO</th>
                        <th>Plan</th>
                        <th>Logo</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Approved</th>
                        <th>Reject</th>
                        <th>Suspend</th>
                        <th>Delete</th>
    
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
    <strong>Copyright &copy; 2023 <a href="https://myschoolafrica.com">Myschool.Africa</a>.</strong> All rights
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
