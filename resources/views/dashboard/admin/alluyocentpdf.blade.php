
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Brixtonn Schools</title>
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
          <img style="width: 300px; height: 50px;" src="{{ asset('images/sch14.jpg') }}" alt=""> <br>
          {{-- <small class="float-right">{{ $print_students->created_at->format('D d, M Y, H:i')}}</small> --}}
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
       
        <address>
          <strong>BRIXTONN SCHOOLS</strong><br>
          @if ( Auth::guard('admin')->user()->centername = 'Uyo')
          30 Ewet Housing, Uyo <br>
          Akwa Ibom State, Nigeria
          @else
          30 Asokoro, Abuja <br>
          Nigeria 
          @endif
          <br>
         
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
            <h3 style="text-align: center">List of High School Students in Uyo Center</h3>
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>Surname</th>
              <th>First Name</th>
              <th>Middlename</th>
              <th>Class</th>
              <th>Gender</th>
              <th>Center Name</th>
              <th>Section</th>
              <th>Form No</th>
              <th>Reg No</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($printall_uyocenters as $printall_uyocenter)
            <tr>
                <td>{{ $printall_uyocenter->surname }}</td>
                <td>{{ $printall_uyocenter->fname }}</td>
                <td>{{ $printall_uyocenter->middlename }}</td>
                <td>{{ $printall_uyocenter->classname }}</td>
                <td>{{ $printall_uyocenter->gender }}</td>
                <td>{{ $printall_uyocenter->centername }}</td>
                <td>{{ $printall_uyocenter->section }}</td>
                <td>{{ $printall_uyocenter->ref_no }}</td>
                <td>{{ $printall_uyocenter->regnumber }}</td>
                <td>{{ $printall_uyocenter->created_at->format('D d, M Y, H:i')}}</td>
              </tr>
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
