@include('dashboard.teacher.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.teacher.sidebar')

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
            {{-- @foreach ($view_classess as $view_classes)
            <ol class="breadcrumb float-sm-right">
              Class
              
               
                  <a href="{{ url('teacher/classes/'.$view_classes->classname) }}">{{ $view_classes->classname }}</a>
         
            </ol>
            @endforeach --}}
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
                <h3 class="card-title" style="color: red">Your {{ Auth::guard('teacher')->user()->section }} </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Classes</th>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Moddlename</th>
                      <th>Term</th>
                      <th>Section</th>

                      <th>Images</th>
                      <th>Add Results</th>
                      <th>Status</th>
  
                      <th>Admit No</th>
                      
                      <th>Date</th>
  
                    </tr>
                  </thead>
                  <tbody>
                  {{-- @if ($view_yourstudent->schoolname = Auth::guard('teacher')->user()->schoolname && $view_yourtudents->term = Auth::guard('teacher')->user()->term) --}}
                    @foreach ($view_yourstudents as $view_yourstudent)
                    @if ($view_yourstudent->schoolname == Auth::guard('teacher')->user()->schoolname && $view_yourstudent->term == Auth::guard('teacher')->user()->term  && $view_yourstudent->ref_no1 == Auth::guard('teacher')->user()->ref_no1)
                      <tr>
                        <td>{{ $view_yourstudent->classname }}</td>
                        <td>{{ $view_yourstudent->surname }}</td>

                        <td>{{ $view_yourstudent->fname }}</td>
                        <td>{{ $view_yourstudent->middlename }}</td>
                        <td>{{ $view_yourstudent->term }}</td>
                        <td>{{ $view_yourstudent->section }}
                            <small style="color: red">{{ $view_yourstudent->classname }}</small>
                        </td>
  
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_yourstudent->images")}}" alt=""></td>
                        <td><a href="{{ url('teacher/addresultsbyteacher/'.$view_yourstudent->ref_no) }}"
                            class='btn btn-default'>Add Results
                            <i class="far fa-eye"></i>
                        </a></td>
                        <td>@if ($view_yourstudent->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                        @elseif($view_yourstudent->status == 'suspend')
                        <span class="badge badge-warning"> Suspended</span>
                        @elseif($view_yourstudent->status == 'reject')
                        <span class="badge badge-danger"> Rejected</span>
                        @elseif($view_yourstudent->status == 'approved')
                        <span class="badge badge-info"> Approved</span>
                        @elseif($view_yourstudent->status == 'admitted')
                        
                        <span class="badge badge-success">Admitted</span>
                        @endif</td>
                        
                     
  
                      <td>{{ $view_yourstudent->regnumber }}</td>
                       
                    <td>{{ $view_yourstudent->created_at->format('D d, M Y, H:i')}}</td>
  
                      </tr>
                      @else
                        
                      @endif  
                    
                  @endforeach
                        {{-- @else
                        
                      @endif --}}
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Classes</th>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Moddlename</th>
                      <th>Term</th>
                      <th>Section</th>

                      <th>Images</th>
                      <th>Add Results</th>
                      <th>Status</th>
  
                      <th>Admit No</th>
                      
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
    <strong>Copyright &copy; 2023 <a href="https://myschoolafrica.com">myschoolafrica.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="{{  asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{  asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{  asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{  asset('assets/dist/js/adminlte.min.js?v=3.2.0')}}"></script>

<script src="{{  asset('assets/dist/js/demo.js')}}"></script>

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
