@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Upload  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.createteevent') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Title</label>
                        <input type="text" class="form-control" @error('title')
                        @enderror value="{{ old('title') }}" name="title" placeholder="Title">
                      </div>
                    </div>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 

                    
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label> Email</label>
                          <input type="email" class="form-control" @error('email')
                          @enderror value="{{ old('email') }}" name="email" placeholder="email">
                        </div>
                      </div>
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror 


                    
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label> Phone</label>
                            <input type="text" class="form-control" @error('phone')
                            @enderror value="{{ old('phone') }}" name="phone" placeholder="Phone">
                          </div>
                        </div>
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror 

                        
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label> Address</label>
                              <input type="text" class="form-control" @error('address')
                              @enderror value="{{ old('address') }}" name="address" placeholder="address">
                            </div>
                          </div>
                          @error('address')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror 

                   
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label> facebook</label>
                              <input type="text" class="form-control" @error('facebook')
                              @enderror value="{{ old('facebook') }}" name="facebook" placeholder="facebook">
                            </div>
                          </div>
                          @error('facebook')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror 
                        
                          
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label> whatsapp</label>
                                <input type="text" class="form-control" @error('whatsapp')
                                @enderror value="{{ old('whatsapp') }}" name="whatsapp" placeholder="whatsapp">
                              </div>
                            </div>
                            @error('whatsapp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                          
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label> instagram</label>
                                <input type="text" class="form-control" @error('instagram')
                                @enderror value="{{ old('instagram') }}" name="instagram" placeholder="instagram">
                              </div>
                            </div>
                            @error('instagram')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
     
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label> twitter</label>
                                <input type="text" class="form-control" @error('twitter')
                                @enderror value="{{ old('twitter') }}" name="twitter" placeholder="twitter">
                              </div>
                            </div>
                            @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 

                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label> linkin</label>
                                  <input type="text" class="form-control" @error('linkin')
                                  @enderror value="{{ old('linkin') }}" name="linkin" placeholder="linkin">
                                </div>
                              </div>
                              @error('linkin')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror 
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Logo</label>
                        <input type="file" @error('logo')
                        @enderror value="{{ old('logo') }}" class="form-control" name="logo">
                      </div>
                  
                    </div>
                    @error('logo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                     
                    <div class="col-sm-6">
                       <textarea class="textarea" name="message" class="form-control" @error('message') is-invalid @enderror" placeholder="Place some text here"
                      value="{{ old('message') }}     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                     </div>
                      @error('message')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('dashboard.admin.footer')