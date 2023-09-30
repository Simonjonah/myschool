@include('dashboard.guardian.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.guardian.sidebar')

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
            {{-- @foreach ($view_classess as $view_classes) --}}
            <ol class="breadcrumb float-sm-right">
              Class
              
               
                  {{-- <a href="{{ url('web/classes/'.$view_classes->classname) }}">{{ $view_classes->classname }}</a> --}}
               
           
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li> --}}
            </ol>
            {{-- @endforeach --}}
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
                <h3 class="card-title" style="color: red">Your Wards</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>MiddleName</th>
                      <th>Lastname</th>
                      <th>Classes</th>
                      <th>Term</th>
                      <th>Images</th>
                      
                      <th>Pay Feeding Fees</th>
  
                      
  
                      <th>Date</th>
  
                    </tr>
                  </thead>
                  <tbody>
                  {{-- @if (Auth::guard('web')->user()->section = 'Pre-School') --}}
                    @foreach ($bus_payments as $bus_payment)
                    {{-- @if ($bus_payment->centername == Auth::guard('web')->user()->centername && $bus_payment->status == null) --}}
                      <tr>
                        <td>{{ $bus_payment->fname }}</td>
                        <td>{{ $bus_payment->middlename }}</td>
                        <td>{{ $bus_payment->surname }}</td>
                        <td>{{ $bus_payment->classname }}</td>
                        <td>{{ $bus_payment->term }}</td>
                       
  
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$bus_payment->images")}}" alt=""></td>
                       
                      

                        <td><a href="{{ url('guardian/payfeeding/'.$bus_payment->classname) }}"
                          class='btn btn-info'>Pay Feeding Fees
                          <i class="far fa-eye"></i>
                      </a></td>
                 
                    <td>{{ $bus_payment->created_at->format('D d, M Y, H:i')}}</td>
  
                      </tr>
                 
                    
                  @endforeach
                        {{-- @else
                        
                      @endif
                 --}}
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>MiddleName</th>
                        <th>Lastname</th>
                        <th>Classes</th>
                        <th>Term</th>
                        <th>Images</th>
                        
    
                        <th>Pay Feeding Fees</th>
    
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
    <strong>Copyright &copy; 2023 <a href="https://goldendayschools.com">Goldendayschools.com</a>.</strong> All rights
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
