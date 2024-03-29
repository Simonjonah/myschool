
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MyschoolAfrica Schools</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          {{-- <img style="width: 100px; height: 100px;" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt=""> <br> --}}
          {{-- <small class="float-right">{{ $print_students->created_at->format('D d, M Y, H:i')}}</small> --}}
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
       
        <address>
          <strong>MySchool Africa</strong><br>
          30 Ewet Housing, Uyo <br>
          Akwa Ibom State, Nigeria
          
          <br>
          {{-- San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com --}}
        </address>
      </div>
     
      <div class="col-sm-4 invoice-col">
        {{-- <img style="width: 70%; height: 200px;" src="{{ URL::asset("/public/../$print_students->images")}}" alt=""> --}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
       
        <div class="col-12 table-responsive">
            {{-- <h3 style="text-align: center">All Creche Pupils</h3> --}}
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>Surname</th>
              <th>First Name</th>
              <th>Middlename</th>
              <th>Class</th>
              {{-- <th>Gender</th> --}}
              {{-- <th>Center Name</th> --}}
              <th>Section</th>
              <th>ID No</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($print_teachers as $print_teacher)
            @if ($print_teacher->status = 'teacher' OR $print_teacher->status = 'approved' OR $print_teacher->status = 'suspend' OR $print_teacher->status = 'sacked' OR $print_teacher->status = 'queried')
            <tr>
                <td>{{ $print_teacher->surname }}</td>
                <td>{{ $print_teacher->fname }}</td>
                <td>{{ $print_teacher->schoolname }}</td>
                <td>{{ $print_teacher->classname }}</td>
                {{-- <td>{{ $print_teacher->gender }}</td> --}}
                {{-- <td>{{ $print_teacher->centername }}</td> --}}
                <td>{{ $print_teacher->section }}</td>
                <td>{{ $print_teacher->ref_no1 }}</td>
                <td>{{ $print_teacher->created_at->format('D d, M Y, H:i')}}</td>
              </tr>

              @else
                        
              @endif
            @endforeach
            
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
