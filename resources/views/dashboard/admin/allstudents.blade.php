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
                    <th>Surname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Actions</th>

                    <th>Reg No</th>
                    <th>Ref. No</th>
                    <th>Edit</th>
                    <th>Reject</th>
                    <th>Assigned </th>
                    <th>Suspend</th>
                    <th>Admit</th>
                    
                    {{-- <th>Send to IT</th> --}}
                    <th>Delete</th>
                    {{-- <th>I.T Status</th> --}}

                    <th>Date</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($all_students as $all_student)
       
                      <tr>
                        <td>{{ $all_student->surname }}</td>
                        <td>{{ $all_student->middlename }}</td>
                        <td>{{ $all_student->fname }}</td>
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$all_student->images")}}" alt=""></td>
                        <td><a href="{{ url('admin/viewstudents/'.$all_student->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                         </a></td>
                         <td>@if ($all_student->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                         @elseif($all_student->status == 'suspend')
                         <span class="badge badge-warning"> Suspended</span>
                         @elseif($all_student->status == 'reject')
                         <span class="badge badge-danger"> Rejected</span>
                         @elseif($all_student->status == 'approved')
                         <span class="badge badge-info"> Approved</span>
                         @elseif($all_student->status == 'admitted')
                         
                         <span class="badge badge-success">Admitted</span>
                         @endif</td>
                        
                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/allcrechepdf') }}">Print All Creche</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/allnurserypdf') }}">Print All Nursery</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/allprimarypdf') }}">Print All Primary</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/allhighschpdf') }}">Print All High School</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/alluyocentpdf') }}">Print All Uyo Center</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/allabujapdf') }}">Print All Abuja Center</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/allstudentpdf') }}">Print All Student</a></li>
                         
                        </ul>
                      </div></td>

                      <td>{{ $all_student->regnumber }}</td>
                      <td>{{ $all_student->ref_no }}</td>

                         <td><a href="{{ url('admin/editstudent/'.$all_student->ref_no) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>  
                       
                        
                       <th><a href="{{ url('admin/rejectstudent/'.$all_student->ref_no) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-user"></i>
                      </a></th>
                      <th><a href="{{ url('admin/assignedteacher/'.$all_student->centername) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a></th><th><a href="{{ url('admin/suspendstudent/'.$all_student->ref_no) }}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a></th>

                      <th> <a href="{{ url('admin/studentsaddmit/'.$all_student->ref_no) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> 
                      </a></th>
                      
                     
                      {{-- <th><a href="{{ url('admin/studentit/'.$all_student->ref_no) }}" class="btn btn-info"><i class="fas fa-user"></i> IT</a></th> --}}
                       <td><a href="{{ url('admin/deletestudent/'.$all_student->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     
                     <td>{{ $all_student->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Surname</th>
                      <th>Middlename</th>
                      <th>Lastname</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Status</th>
                      <th>Actions</th>
  
                      <th>Reg No</th>
                      <th>Ref. No</th>

                      <th>Edit</th>
                      <th>Reject</th>
                      <th>Assigned </th>
                      <th>Suspend</th>
                      <th>Admit</th>
                      
                      {{-- <th>Send to IT</th> --}}
                      <th>Delete</th>
                      {{-- <th>I.T Status</th> --}}
  
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
    <strong>Copyright &copy; 2023 <a href="https://brixtoonschool.com.ng">Brixtonn</a>.</strong> All rights
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
