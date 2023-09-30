@include('dashboard.header')
  @include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                    <span class="badge bg-primary float-right">{{ $querys }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-envelope"></i> Query Replied
                    <span class="badge bg-info float-right">{{ $countqueryreply }}</span>

                    
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                  </a>
                </li>
                <li class="nav-item">
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
            <div class="card-header">
              <h3 class="card-title">Labels</h3>

              <div class="card-tools">
                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button> --}}
              </div>
            </div>
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
              <h3 class="card-title">Read your Query</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              {{-- <div class="form-group">
                <input class="form-control" placeholder="To:">
              </div> --}}

              <form action="{{ url('web/replyquery/'.$reply_singlequeries->id) }}" method="post">
                @csrf
                @method('PUT')
                @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                <div class="form-group">
                  {{-- <input class="form-control" name="user_id" value="{{ $reply_singlequeries->id }}" placeholder="Subject:"> --}}
                  <input class="form-control" name="querytitle" value="{{ $reply_singlequeries->querytitle }}" placeholder="Subject:">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="messages" class="form-control" style="height: 300px">
                     
                     
                      
                    </textarea>
                </div>

                <div class="card-footer">
                  <div class="float-right">
                    {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                  </div>
                  {{-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> --}}
                </div>
              </form>
              
              {{-- <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fas fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="float-right">
                {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
                {{-- <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button> --}}
              </div>
              {{-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> --}}
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
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
