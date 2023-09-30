
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
    <a href="/"><b>Teacher </b>Registration</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">

      
      <form action="{{ url('createteacher') }}" method="post" enctype="multipart/form-data">
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
    <label for="">First Name</label>
        <div class="input-group mb-3">
          <input type="hidden" name="address" value="{{ $getyours->address }}" name="" id="">
          <input type="hidden" name="motor" value="{{ $getyours->motor }}" name="" id="">
          <input type="hidden" name="schoolname" value="{{ $getyours->schoolname }}" name="" id="">
          <input type="hidden" name="ref_no1" value="{{ $getyours->ref_no1 }}" name="" id="">
          <input type="hidden" name="logo" value="{{ $getyours->logo }}" name="" id="">
          <input type="hidden" name="user_id" value="{{ $getyours->id }}" name="" id="">

          <input type="hidden" name="motor" value="{{ $getyours->motor }}" name="" id="">

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


        <label for="">First Name</label>
        <div class="input-group mb-3">
          <input name="surname" type="text" class="form-control" @error('surname') is-invalid @enderror"
          value="{{ old('surname') }}" placeholder="First Name">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('surname')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        
        <label for="">Email</label>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" @error('email') is-invalid @enderror"
          value="{{ old('email') }}" placeholder="Email">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="">Phone</label>
        <div class="input-group mb-3">
          <input name="phone" type="number" class="form-control" @error('phone') is-invalid @enderror"
          value="{{ old('phone') }}" placeholder="Phone">
           
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        @error('phone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      

        <label for="">Academic Session</label>

        <div class="input-group mb-3">
          <select name="academic_session" class="form-control">
            @foreach ($addacademics as $addacademic)
            <option value="{{ $addacademic->academic_session }}">{{ $addacademic->academic_session }}</option>
            @endforeach
          </select>
        </div>
        @error('academic_session')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <label for="">Classname</label>
        <div class="input-group mb-3">
            <select name="classname" class="form-control" id="">
                @foreach ($getclasses as $getclasse)
                    <option value="{{ $getclasse->classname }}">{{ $getclasse->classname }}</option>
                @endforeach
                
            </select>
            
          </div>
          @error('classname')
          <span class="text-danger">{{ $message }}</span>
          @enderror

          <label for="">Select Section</label>
        <div class="input-group mb-3">
          <select name="section" id="" class="form-control">
            @foreach ($dsplay_sections as $dsplay_section)
              <option value="{{ $dsplay_section->section }}">{{ $dsplay_section->section }}</option>
            @endforeach
            
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('section')
        <span class="text-danger">{{ $message }}</span>
        @enderror


        <label for="">Term</label>
          <div class="input-group mb-3">
            <select name="term" class="form-control" id="">
                @foreach ($getyoursterms as $getyoursterm)
                    <option value="{{ $getyoursterm->term }}">{{ $getyoursterm->term }}</option>
                @endforeach
                
            </select>
            
          </div>
          @error('term')
          <span class="text-danger">{{ $message }}</span>
          @enderror

          <label for="">Class Alms(Optional)</label>
          <div class="input-group mb-3">
            <select name="alms" class="form-control" id="">
                @foreach ($getalms as $getalm)
                    <option value=""></option>
                    <option value="{{ $getalm->alms }}">{{ $getalm->alms }}</option>
                @endforeach
                
            </select>
            
          </div>
          @error('alms')
          <span class="text-danger">{{ $message }}</span>
          @enderror

          <label for="">Password</label>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" @error('password') is-invalid @enderror"
            value="{{ old('password') }}" placeholder="password">
             
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          @error('password')
          <span class="text-danger">{{ $message }}</span>
          @enderror
       
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      {{-- <a href="login" class="text-center">I already have a membership</a> --}}
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
