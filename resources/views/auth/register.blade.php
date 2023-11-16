
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Registration </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>School's</b>Register</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register</p>

      
      <form action="{{ route('createschool') }}" method="post" enctype="multipart/form-data">
          @csrf

    @if (Session::get('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    @endif

    @if (Session::get('fail'))
    <div class="alert alert-danger">
      {{ Session::get('fail') }}
    </div>
  @endif
        <div class="input-group mb-3">
          <input name="fname" type="text" class="form-control" @error('fname') is-invalid @enderror"
          value="{{ old('fname') }}" placeholder="First Name">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
         
        </div>

        @error('fname')
        <span class="text-danger">{{ $message }}</span>
        @enderror

      


        <div class="input-group mb-3">
          <input name="surname" type="text" class="form-control" @error('surname') is-invalid @enderror"
          value="{{ old('surname') }}" placeholder="SurName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('surname')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="input-group mb-3">
            <input name="schoolname" type="text" class="form-control" @error('schoolname') is-invalid @enderror"
            value="{{ old('schoolname') }}" placeholder="School name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('schoolname')
          <span class="text-danger">{{ $message }}</span>
          @enderror

        <div class="input-group mb-3">
            <select name="plans" class="form-control" id="">
                <option value="6 Months">6 Months</option>
                <option value="1 Year">1 Year</option>
            </select>
            
          </div>
          @error('plans')
          <span class="text-danger">{{ $message }}</span>
          @enderror

          <div class="input-group mb-3">
            <select name="schooltype" class="form-control" id="">
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
            </select>
            
          </div>
          @error('schooltype')
          <span class="text-danger">{{ $message }}</span>
          @enderror

        <label for="">Phone</label>
        <div class="input-group mb-3">
          <input type="text" name="phone" class="form-control" placeholder="Phone">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        @error('phone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
       
        <label for="">Address</label>
        <div class="input-group mb-3">
          <input type="text" name="address" class="form-control" placeholder="Address">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="">Mottor</label>
        <div class="input-group mb-3">
          <input required type="text" name="motor" class="form-control" placeholder="Mottor">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        @error('motor')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control"  @error('email') is-invalid @enderror"
          value="{{ old('email') }}" placeholder="email">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror

          <div class="input-group mb-3">
            <label for="">Logo</label>
            <input required name="logo" type="file"  required class="form-control" @error('logo') is-invalid @enderror"
            value="{{ old('logo') }}" placeholder="logo">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('logo')
          <span class="text-danger">{{ $message }}</span>
          @enderror
    
        <div class="input-group mb-3">
          <input type="text" name="password" class="form-control"  @error('password') is-invalid @enderror"
          value="{{ old('password') }}" placeholder="password">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror 
       
       
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="{{ url('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
