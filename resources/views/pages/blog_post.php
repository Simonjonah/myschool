<?php

require_once 'common/header.php'; ?>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="posts-tables">BRIXTONN Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->

    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

  <?php //display_status(); ?>

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo HOME; ?>contactbrixtton_tables">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>CONTACT NAMES</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo HOME; ?>brixttonservices_tables">
          <i class="fas fa-fw fa-table"></i>
          <span>SERVICES NAMES</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>NURSERY NAMES<i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="demo" class="collapse">
          <li>
            <a style="color: gray" href="<?php echo HOME; ?>nurseryname">NURSERY NAMES</a>
          </li>
        </ul>
    </li>

      <li class="nav-item">
        <a class="nav-link" href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> ADMININISTORS <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="demo" class="collapse">
          <li>
            <a style="color: gray" href="<?php echo HOME; ?>team/uploadloadteam">UPLOAD TEAM</a>
          </li>
          <li>
              <a style="color: gray" href="<?php echo HOME; ?>team_tables"> TEAM NAMES </a>
          </li>
          <li>
              <a style="color: gray" href="<?php echo HOME; ?>event/posts_event"> POST EVENT </a>
          </li>
          <li>
              <a style="color: gray" href="<?php echo HOME; ?>event_tables"> POST NAMES </a>
          </li>
        </ul>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo HOME; ?>resultmanagement_tables">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>CHECH RESULT</span></a>
    </li>

   
    </ul>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><h2>All PULPILS(S)</h2></li>
        </ol>

        <div class="card mb-3">
          <!-- <div class="card-header">
            <i class="fas fa-table"></i>
            All Posts</div> -->
          <div class="card-body">
           
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <h5 class="text-center">BRIXTTON SCHOOLS</h5>
                  <p class="text-center">Unit 13, F Line Ewet Housing, Uyo, Nigeria</p>

                </div>
              </div>
            </div>
          <section class="contact-page-section">
            <div class="auto-container">
              <div class="inner-container">
                <div class="row clearfix">

                  <!-- Info Column -->
                    <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                      <div class="contactform">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="form-group">
                            <input class="form-control" type="text" name="firstname" value="" placeholder="Firstname">
                          </div>

                            <div class="form-group">
                              <input class="form-control" type="text" name="othername" value="" placeholder="Othername">
                            </div>

                            <div class="form-group">
                              <input class="form-control" type="text" name="face" value="" placeholder="Facebook">
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="text" name="tweet" value="" placeholder="Tweeter">
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="text" name="email" value="" placeholder="Email">
                            </div>

                            <div class="form-group">
                              <input class="form-control" type="text" name="designation" value="" placeholder="Designation">
                            </div>

                            <div class="form-group">
                              <input type="file" name="fileToUpload">
                            </div>
                            <button type="submit" class="btn btn-success">Upload Team</button>
                        </div>
                      </div>

                            <!-- Form Column -->
                      <div class="info-column col-lg-6  col-md-6 col-md-12 col-sm-12">
                        <div class="innercolumn">
                          <div class="form-group">
                            


                          </div>

                        </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>


            <hr>
         
          </div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
 <?php

require_once 'common/footer.php';


 ?>
