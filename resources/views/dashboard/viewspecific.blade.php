@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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
            <h3 class="card-title">My Assigned Subject</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Subject</th>
                <th>Topic</th>
                <th>Youtube</th>
                {{-- <th>Messages</th> --}}
                <th>Status</th>
                <th>View</th>
                <th>Edit</th>

                <th>Date</th>
              </tr>
              </thead>
              <tbody>

                @foreach ($view_specifics as $view_specific)
   
                  <tr>
                    <td>{{ $view_specific->subject }}</td>
                    <td>{{ $view_specific->topic }}</td>
                    <td><a href="{{ $view_specific->youtube }}">Youtube</a></td>
                    {{-- <td>{{ $view_specific->messages }}</td> --}}
                    <td>@if ($view_specific->status == null)
                        <span class="badge badge-secondary">In Review</span>
                        @elseif ($view_specific->status == 'reject')
                        <span class="badge badge-danger">Reject</span>
                        @elseif ($view_specific->status == 'suspend')
                        <span class="badge badge-warning">Suspended</span>
                        @elseif ($view_specific->status == 'approve')
                        <span class="badge badge-success">Employed</span>

                        @endif</td>
                        <td><a href="{{ url('web/viewsingleactivies/'.$view_specific->slug) }}"
                            class='btn btn-default'>
                             <i class="far fa-eye"></i>
                      
                 
                        <td><a href="{{ url('web/editactivies/'.$view_specific->slug) }}"
                                class='btn btn-info'>
                                 <i class="far fa-edit"></i>
                          
                     
                   
                
                 <td>{{ $view_specific->created_at->format('D d, M Y, H:i')}}</td>

                  </tr>
                 
                @endforeach
             
             
               
              </tbody>
              <tfoot>
                <tr>
                    <th>Subject</th>
                    <th>Topic</th>
                    <th>Youtube</th>
                    {{-- <th>Messages</th> --}}
                    <th>Status</th>
                    <th>View</th>
                    <th>Edit</th>
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
  
  
    
    
 </div>

 <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

 <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
 <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
 
 <script src="{{ asset('assets/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
 
 <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
 {{-- @include('dashboard.admin.header') --}}
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
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- @include('dashboard.footer') --}}