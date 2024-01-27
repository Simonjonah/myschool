@include('dashboard.header')
@include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subjects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Domains</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a href="#" class="dropdown-item">Another action</a>
                  <a href="#" class="dropdown-item">Something else here</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                {{-- <p class="text-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p> --}}

                <div class="table-responsive">
                  {{-- <p class="lead">Behaviour</p> --}}
    
                  <form action="{{ url('web/createpsychomotoro') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- @method('PUT') --}}
                    <table class="table table-bordered">
                      <tr>
                        {{-- <td><input type="text" name="" value="{{ $add_psychomotor->images }}" id=""></td> --}}
                        <th style="width:50%">COGNITIVE DOMAIN:</th>
                        <th style="width:50%">A</th>
                        <th style="width:50%">B</th>
                        <th style="width:50%">C</th>
                        <th style="width:50%">D</th>
                      <th style="width:50%">E</th>

                      </tr>


                      @foreach ($view_domains as $view_domain)
                        {{-- @if ($view_domain->psycomoto == 'Cognitive Domain') --}}
                        <tr>
                          <th>{{ $view_domain->cogname }}</th>
                          <input type="text" name="cogname[]" value="{{ $view_domain->cogname }}" id="">
                          <input type="text" name="psycomoto[]" value="{{ $view_domain->psycomoto }}" id="">
                         
                          <td><select name="punt1[]" class="" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt2[]" class="" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt3[]" class="" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt4[]" class="" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          <td><select name="punt5[]" class="" id="">
                            <option value="">No</option>  
                            <option value="Yes">Yes</option>  
                          </select></td>
                          {{-- <td><input type="checkbox" name="punt1[]" value="Yes" id=""></td>
                          <td><input type="checkbox" name="punt2[]" value="Yes" id=""></td>
                          <td><input type="checkbox" name="punt3[]" value="Yes" id=""></td>
                          <td><input type="checkbox" name="punt4[]" value="Yes" id=""></td>
                          <td><input type="checkbox" name="punt5[]" value="Yes" id=""></td> --}}
                          
                          <input type="hidden" name="teacher_id[]" value="{{ $add_psychomotor->teacher_id }}">
                          <input type="hidden" name="student_id[]" value="{{ $add_psychomotor->student_id }}">
                          <input type="hidden" name="ref_no1[]" value="{{ $view_domain->ref_no1 }}" id="">
                          <input type="hidden" name="term[]" value="{{ $add_psychomotor->term }}" id="">
                          
                          
                        </tr>
                        {{-- @else
                          
                        @endif --}}
                      
                      @endforeach
                    
                    </table>
                      <div class="form-group">
                          <textarea class="form-control" name="teacher_comment[]" id="" cols="20" rows="5" placeholder="Teacher's Comment"></textarea>
                      </div>
                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <p class="text-center">
                  <strong>Goal Completion</strong>
                </p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">PSYCHOMOTOR DOMAIN:</th>
                      <th style="width:50%">A</th>
                      <th style="width:50%">B</th>
                      <th style="width:50%">C</th>
                      <th style="width:50%">D</th>
                      <th style="width:50%">E</th>
                    </tr>

                    @foreach ($view_pscos as $view_psco)
                    {{-- @if ($view_psco->psycomoto == 'Psychomotor Domain') --}}
                    <tr>
                      <th>{{ $view_psco->cogname }}</th>
                      
                      <input type="text" name="cogname[]" value="{{ $view_psco->cogname }}" id="">
                      <input type="text" name="psycomoto[]" value="{{ $view_domain->psycomoto }}" id="">
                      <td><select name="punt1[]" class="" id="">
                        <option value="">No</option>  
                        <option value="Yes">Yes</option>  
                      </select></td>
                      <td><select name="punt2[]" class="" id="">
                        <option value="">No</option>  
                        <option value="Yes">Yes</option>  
                      </select></td>
                      <td><select name="punt3[]" class="" id="">
                        <option value="">No</option>  
                        <option value="Yes">Yes</option>  
                      </select></td>
                      <td><select name="punt4[]" class="" id="">
                        <option value="">No</option>  
                        <option value="Yes">Yes</option>  
                      </select></td>
                      <td><select name="punt5[]" class="" id="">
                        <option value="">No</option>  
                        <option value="Yes">Yes</option>  
                      </select></td>
                      {{-- <td><input type="checkbox" value="Yes" name="punt1[]" id=""></td>
                      <td><input type="checkbox" value="Yes" name="punt2[]" id=""></td>
                      <td><input type="checkbox" value="Yes" name="punt3[]" id=""></td>
                      <td><input type="checkbox" value="Yes" name="punt4[]" id=""></td>
                      <td><input type="checkbox" name="punt5[]" value="Yes" id=""></td> --}}

                      <input type="hidden" name="teacher_id[]" value="{{ $add_psychomotor->teacher_id }}">
                      <input type="hidden" name="student_id[]" value="{{ $add_psychomotor->student_id }}">
                      <input type="hidden" name="ref_no1[]" value="{{ $view_psco->ref_no1 }}" id="">
                      <input type="hidden" name="term[]" value="{{ $add_psychomotor->term }}" id="">
                      

                     
                    </tr> 
                    {{-- @else
                      
                    @endif --}}
                   
                    @endforeach

                  </table>
    
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th style="width:50%" colspan="5" style="text-align: center">GRADING AND KEY</th>
                    
                  </tr>
                  <tr>
                    <th>0</th>
                    <td>-</td>
                    <td>39</td>
                    <td>F</td>
                    <td>FAIL</td>
                  </tr>
                  <tr>
                    <th>40</th>
                    <td>-</td>
                    <td>49</td>
                    <td>E</td>
                    <td>FAIR</td>
                  </tr>
  
                  <tr>
                    <th>50</th>
                    <td>-</td>
                    <td>59</td>
                    <td>D</td>
                    <td>PASS</td>
                  </tr>
                  <tr>
                    <th>60</th>
                    <td>-</td>
                    <td>69</td>
                    <td>C</td>
                    <td>GOOD</td>
                  </tr>
  
                  <tr>
                    <th>70</th>
                    <td>-</td>
                    <td>79</td>
                    <td>B</td>
                    <td>VERY GOOD</td>
                  </tr>
                  <tr>
                    <th>80</th>
                    <td>-</td>
                    <td>100</td>
                    <td>A</td>
                    <td>EXCELLENCE</td>
                  </tr>
                  
                </table>
              </div>
              <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                 
              </button>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
















    

  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.footer')