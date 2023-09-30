@include('dashboard.header')
  @include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <!-- Main content -->
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ url('web/checkyourquery') }}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="{{ url('web/checkyourquery') }}" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right">{{ $countquery }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('web/queryrepliedview') }}" class="nav-link">
                    <i class="far fa-envelope"></i> Query Replied
                    
                    <span class="badge bg-info float-right">{{ $countqueryreply }}</span>

                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                  </a>
                </li> --}}
                {{-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-filter"></i> Junk
                    <span class="badge bg-warning float-right">65</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                  </a>
                </li> --}}
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">Labels</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div> --}}
            <!-- /.card-header -->
            {{-- <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                </li>
              </ul>
            </div> --}}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Read Mail</h3>

            <div class="card-tools">
              <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
              <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-read-info">
              <h5>{{ $view_singlequeries->querytitle }}</h5>
              <h6>From: Goldern Day Schools
                <span class="mailbox-read-time float-right">{{ $view_singlequeries->created_at->format('D d, M Y, H:i') }}</span></h6>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
             
              <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                <i class="fas fa-print"></i></button>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
              <p>{{ $view_singlequeries->user['fname'] }} {{ $view_singlequeries->user['surname'] }}</p>

              <p>{!! $view_singlequeries->messages !!}</p>

              
            </div>
            <!-- /.mailbox-read-message -->
          </div>
          <!-- /.card-body -->
          
          <!-- /.card-footer -->
          <div class="card-footer">
            <div class="float-right">
            
              <a href="{{ url('web/viewqueryreply/'.$view_singlequeries->id) }}" class="btn btn-default"><i class="fas fa-reply"></i> Reply</a>
            </div>
            {{-- <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button> --}}
            <a href="{{ url('web/printquery1/'.$view_singlequeries->id) }}" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
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




<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('assets/assets/dist/js/demo.js') }}"></script>

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

<script>
    $(function () {
      //Add text editor
      $('#compose-textarea').summernote()
    })
  </script>
</body>
</html>
