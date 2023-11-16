
<!DOCTYPE html>
<html>

<!-- Mirrored from themexriver.com/tfhtml/finano/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Jan 2019 02:00:56 GMT -->
<head>
<meta charset="utf-8">
<title>Schoolsupdate.ng - the best innovative school management system | Homepage</title>
<!-- Stylesheets -->
<link href="{{ asset('front/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{ asset('front/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('front/css/responsive.css')}}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header-->
    <header class="main-header header-style-five">
    	

		
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-box" style="margin-top: 20px">
                    	<div class="logo"><a href="{{ url('/') }}"><img style="width: 100px; height: 70px;" src="{{ asset('images/logo.jpg') }}" alt="" title=""></a></div>
                    </div>
                   	
                   	<div class="nav-outer clearfix">
                    
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li><a href="{{ url('/') }}">Home</a></li>
									<li><a href="{{ url('about') }}">About Us</a></li>
	
									<li class="dropdown"><a href="#">Schools Update</a>
										<ul>
											<li><a href="{{ url('primaryschools') }}">Primary Schools</a></li>
	
											<li><a href="{{ url('secondaryschools') }}">Secondary Schools</a>
										</ul>
									</li>
	
								
									<li><a href="{{ url('competitions') }}">Competitions</a></li>
								
								<li><a href="{{ url('contact') }}">Contact us</a></li>
								<li><a href="{{ url('checkresults') }}">Check Results</a></li>
								<li><a href="{{ url('register') }}">Register</a></li>
	
								</ul>
							</div>
							
						</nav>
						
						<!--Outer Box-->
						<div class="outer-box">
							
							<!--Search Box-->
							<div class="search-box-outer">
								<div class="dropdown">
									<button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
									<ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
										<li class="panel-outer">
											<div class="form-container">
												<form method="post" action="http://themexriver.com/tfhtml/finano/blog.html">
													<div class="form-group">
														<input type="search" name="field-name" value="" placeholder="Search Here" required>
														<button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
													</div>
												</form>
											</div>
										</li>
									</ul>
								</div>
							</div>
							
						</div>
						
					</div>
					
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
		<!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="{{ url('/') }}" class="img-responsive"><img style="width: 130px; height: 50px;" src="{{ asset('images/logo.jpg') }}" alt="" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
								<li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('about') }}">About Us</a></li>

                                <li class="dropdown"><a href="#">Schools Update</a>
                                    <ul>
                                        <li><a href="{{ url('primaryschools') }}">Primary Schools</a></li>

                                        <li><a href="{{ url('secondaryschools') }}">Secondary Schools</a>
                                    </ul>
                                </li>

                            
                                <li><a href="{{ url('competitions') }}">Competitions</a></li>
                            
                            <li><a href="{{ url('contact') }}">Contact us</a></li>
                            <li><a href="{{ url('checkresults') }}">Check Results</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>

								
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
		
    </header>