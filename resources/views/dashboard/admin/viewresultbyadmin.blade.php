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
                <h3 class="card-title">Your Students Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Admission No</th>
                    <th>Psycomotor</th>
                    {{-- <th>Ref. No</th> --}}
                    <th>CA 1</th>
                    <th>CA 2</th>
                    <th>CA 3</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>View Single</th>

                    <th>View</th>
                    <th>Approved</th>
                    <th>Edit</th>

              
                    {{-- <th>Date</th> --}}
                  </tr>
                  </thead>
                  <tbody>

                    @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                  
                    @php
                        
                      //  $total_score = 0;
                    @endphp
                    @foreach ($view_results as $view_result)
                        @if ($view_result->status == null)
                            
                    {{-- @if ($view_result->status = null) --}}
                    @php
                    // $total_score +=$view_result->test_1 + $view_result->test_2 + $view_result->test_3 + $view_result->exams;
                     
                 @endphp
                 <tr>
                   <td>{{ $view_result->user['surname'] }}</td>
                   <td>{{ $view_result->user['fname'] }}</td>
                   <td>{{ $view_result->user['middlename'] }}</td>
                   <td>{{ $view_result->user['regnumber'] }}</td>
                   <td><a href="{{ url('admin/addpsychomotorad/'.$view_result->id) }}"
                     class='btn btn-default'>
                     Add Psycomotor
                      <i class="far fa-eye"></i>

                  

                 {{-- <td>{{ $view_result->user['ref_no'] }}</td> --}}
                 <td>{{ $view_result->test_1 }}</td>
                 <td>{{ $view_result->test_2 }}</td>
                 <td>{{ $view_result->test_3 }}</td>
                 <td>{{ $view_result->exams }}</td>
                 <td>{{ $view_result->test_1 + $view_result->test_2 + $view_result->test_3 + $view_result->exams }}</td>
                 <td>@if ($view_result->test_1 + $view_result->test_2 + $view_result->test_3 + $view_result->exams > 79)
                   <p>A</p>
                  
                   @elseif ($view_result->test_1 + $view_result->test_2 + $view_result->test_3 + $view_result->exams > 69)
                   <p>B</p>
                   @elseif ($view_result->test_1 + $view_result->test_2 + $view_result->test_3 + $view_result->exams > 59)
                   <p>C</p>
                   @elseif ($view_result->test_1 + $view_result->test_2 + $view_result->test_3 + $view_result->exams > 49)
                   <p>D</p>
                   @elseif ($view_result->test_1 + $view_result->test_2 + $view_result->test_3 + $view_result->exams > 40)
                   <p>E</p>
                   @elseif ($view_result->test_1 + $view_result->test_2 + $view_result->test_3 + $view_result->exams > 39)
                   <p>F</p>
                   @else
                   <p>F</p>
                 @endif</td>

                
                    
                 <td>@if ($view_result->status == null)
                    <span class="badge badge-secondary"> In progress</span>
                   @elseif($view_result->status == 'suspend')
                   <span class="badge badge-warning"> Suspended</span>
                   @elseif($view_result->status == 'sacked')
                   <span class="badge badge-danger"> Sacked</span>
                   @else
                   <span class="badge badge-success">Approved</span>
                   @endif</td>

                   <td><a href="{{ url('admin/viewresult/'.$view_result->id)}}"
                    class='btn btn-default'>
                     View Single
                 </a></td>


                    <td><a href="{{ url('admin/viewresults/'.$view_result->user_id)}}"
                     class='btn btn-default'>
                      View All Sujects
                  </a></td>

                 
                  
             
                  <td><a href="{{ url('admin/approveresults/'.$view_result->id)}}"
                    class='btn btn-warning'>
                    Approved
                 </a></td>



                 <td><a href="{{ url('admin/editviewresultsad/'.$view_result->id)}}"
                    class='btn btn-primary'>
                     <i class="far fa-edit"></i>
                 </a></td>
                 </tr>
               



                        @else
                            
                        @endif
                    @endforeach
            
                    
                     
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Admission No</th>
                        <th>Psycomotor</th>
                        {{-- <th>Ref. No</th> --}}
                        <th>CA 1</th>
                        <th>CA 2</th>
                        <th>CA 3</th>
                        <th>Exams</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>View Single</th>
                        <th>View</th>
                        <th>Approved</th>
                        <th>Edit</th>
    
                  
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
    <strong>Copyright &copy; 2023 <a href="https://goldendestinyacademyschools.com">Goldendestinyschools</a>.</strong> All rights
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
