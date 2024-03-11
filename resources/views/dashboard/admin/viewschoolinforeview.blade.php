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
                    <th>Schoolname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Address</th>
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

                    @foreach ($school_inforeviews as $school_inforeview)
                      <tr>
                        <td><a href="#">{{ $school_inforeview->schoolname }}</a></td>
                        <td>{{ $school_inforeview->phone }}</td>

                        <td>{{ $school_inforeview->email }}</td>
                        <td>{{ $school_inforeview->title }}</td>
                        <td>{{ $school_inforeview->address }}</td>
                        
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$school_inforeview->logo")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewschoolinfo/'.$school_inforeview->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td><a href="{{ url('admin/editschoolinfo/'.$school_inforeview->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>

                       <td><a href="{{ url('admin/schoolapproveinfo/'.$school_inforeview->ref_no) }}"
                        class='btn btn-info'>
                        Approved
                     </a></td>
                     <td><a href="{{ url('admin/schoolrejectinfo/'.$school_inforeview->ref_no) }}"
                        class='btn btn-danger'>
                        Reject                         
                     </a></td>

                     <td><a href="{{ url('admin/schoolsuspendinfo/'.$school_inforeview->ref_no) }}"
                        class='btn btn-warning'>
                        Suspend                         
                     </a></td>

                     <td><a href="{{ url('admin/schooldeleteinfo/'.$school_inforeview->ref_no) }}"
                        class='btn btn-danger'>
                        <i class="far fa-trash-alt"></i>
                       
                     </a></td>
                   
                       
                        
                     <td>{{ $school_inforeview->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
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
    <strong>Copyright &copy; 2023 <a href="https://schoolsupdate.ng">schoolsupdate</a>.</strong> All rights
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
