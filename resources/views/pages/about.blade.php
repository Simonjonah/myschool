@include('layouts.header')
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('images/background/bri2.jpg') }})">
    	<div class="auto-container">
			<div class="content">
				<h1>About <span>Us</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ url('home') }}">Home</a></li>
					<li>Pages</li>
					<li>About Us</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
<!-- Team Section Two -->
	<section class="team-section-two" >
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title-three centered">
				<div class="title">ABOUT MYSCHOOL.AFRICA</div>
				<div class="text">MySCHooL.Africa is a philosophy that is conceptualised by Socialite Entrepreneurs to Advertise Schools across the globe through innovative digital platform thereby, helping them to improve in the market share.</div>
			</div>

		</div>
	</section>
	<!-- End Team Section Two -->
	<!-- Services Section Three-->
	<section class="services-section-three">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Services Block -->
				<div class="services-block-three style-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-bar-chart"></span>
						</div>
						<h6><a href="#">Our Mission Statement</a></h6>
						<div class="text">To be the best leading community of leaders where everyone is committed and responsible for the development of the child academically, socially and morally while preparing them towards becoming dynamic future leaders.</div>
					</div>
				</div>

				<!-- Services Block -->
				<div class="services-block-three style-two col-lg-4 col-md-12 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="600ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-student"></span>
						</div>
						<h6><a href="#">Our Objectives</a></h6>
						<div class="text">The argument in favor of using filler text goes some labore et dolore magna aliqua consectetur.</div>
					</div>
				</div>

				<!-- Services Block -->
				<div class="services-block-three style-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-creativity"></span>
							<!-- <span class="icon flaticon-board"></span> -->
						</div>
						<h6><a href="#">Our Vission</a></h6>
						<div class="text">To produce very responsible, inquisitive, professional and socially aware children with super brains who would possess strong competence essential for academic success, professionalism and leadership in the leading creative world.</div>
					</div>
				</div>

				

			</div>
		</div>
	</section>

	<section class="team-section-two" >
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title-three centered">
				<div class="title">Our Team</div>
				<h2>We have an  <br> experience team Members</h2>
			</div>

			<div class="row clearfix">

<!--Team Block-->
@foreach ($member_teams as $member_team )
@if ($member_team->status == 'approved')
<div class="team-block-two col-lg-4 col-md-6 col-sm-12">
	<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
		<div class="image">
			<a href="team"><img style="height: 300px; width: 100%;" src="{{ URL::asset("/public/../$member_team->images")}}" alt="" title=""></a>
			<ul class="social-box">
				<li><a href="{{ $member_team->facebook }}" class="fa fa-facebook"></a></li>
				<li><a href="{{ $member_team->twitter }}" class="fa fa-twitter"></a></li>
				<li><a href="{{ $member_team->email }}" class="fa fa-whatsapp"></a></li>
				<li><a href="{{ $member_team->likedin }}" class="fa fa-linkedin"></a></li>
			</ul>
		</div>
		<div class="lower-content">
			<h5><a href="team">{{ $member_team->lname }}, {{ $member_team->fname }}</a></h5>
			<div class="designation">{{ $member_team->designation }}</div>
		</div>
	</div>
</div>
@else
	
@endif
	
@endforeach 
			</div>
			<div class="text-center">
				<a href="team" class="theme-btn btn-style-fourteen">View All Teams</a>
			</div>
		</div>
	</section>
	<!-- End Team Section Two -->
<!-- Video Section -->
	<section class="video-section" style="background-image:url(images/logo.jpg); margin-top: 40px;">
		<div class="auto-container">
			<img src="">
			<div class="title">Video</div>
			<h2>See how we work with <br>experience and   <span>creativity</span></h2>
			<a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button" aria-hidden="true"></i><span class="ripple"></span></a>
		</div>
	</section>
	<!-- End Video Section -->

	<!-- Services Section Nine -->
	<section class="services-section-nine">
		<div class="auto-container">
			
			<!-- Sec Title Two -->
			<div class="sec-title-two centered">
				<div class="title">Services</div>
				
			</div>
			
			<div class="clearfix">
				
				<!-- Services Block Twelve -->
				<div class="services-block-twelve col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img style="width: 100%; height: 300px;" src="images/background/bsch2.jpg" alt=""/>
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<h4>E-learning</h4>
										<div class="text">Bringing quality and innovative learning to your door step through blended approaches.</div>
										<div class="arrow-box fa fa-angle-right"></div>
									</div>
								</div>
							</div>
							<!-- Overlay Box Two -->
							<div class="overlay-box-two">
								<div class="overlay-inner-two">
									<div class="large-icon flaticon-statistics"></div>
									<div class="content-two">
										<div class="icon-box">
											<span class="icon flaticon-statistics"></span>
										</div>
										<h4><a href="#">E-learning</a></h4>

										<h4><a href="#" class='btn btn-sucess'>View</a></h4>
									</div>
										
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<!-- Services Block Twelve -->
				<div class="services-block-twelve col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img style="width: 100%; height: 300px;" src="images/resource/my6.jpg" alt=""/>
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<h4>Career Counselling</h4>
										<div class="text"> Gain professional advice through our experts on career and others life endeavours.</div>
										<div class="arrow-box fa fa-angle-right"></div>
									</div>
								</div>
							</div>
							<!-- Overlay Box Two -->
							<div class="overlay-box-two">
								<div class="overlay-inner-two">
									<div class="large-icon flaticon-graph"></div>
									<div class="content-two">
										<div class="icon-box">
											<span class="icon flaticon-graph"></span>
										</div>
										<h4><a href="careers" class='btn btn-sucess'>Career Counselling</a></h4>
										<h4><a href="careers" class='btn btn-sucess'>View</a></h4>
										
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<!-- Services Block Twelve -->
				<div class="services-block-twelve col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img style="width: 100%; height: 300px;" src="images/background/juv5.jpg" alt=""/>
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<h4>Contact Teacher's Services</h4>
										<div class="text">Needed the best hands to guide your wards through challenging subjects with effective results.</div>
										<div class="arrow-box fa fa-angle-right"></div>
									</div>
								</div>
							</div>
							<!-- Overlay Box Two -->
							<div class="overlay-box-two">
								<div class="overlay-inner-two">
									<div class="large-icon flaticon-money-bag"></div>
									<div class="content-two">
										<div class="icon-box">
											<span class="icon flaticon-money-bag"></span>
										</div>
										<h4><a href="view_teachers" class='btn btn-sucess'>Contact Teacher's Service</a></h4>
										<h4><a href="view_teachers" class='btn btn-sucess'>View</a></h4>
										
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<!-- Services Block Twelve -->
				<div class="services-block-twelve col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img style="width: 100%; height: 300px;" src="images/background/juv8.jpg" alt=""/>
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<h4>Advertise Schools</h4>
										<div class="text">This platform 'ADVERTISE SCHOOLS' through quality digital marketing strategies and exposes their activities and programmes to their clientele across communities.</div>
										<div class="arrow-box fa fa-angle-right"></div>
									</div>
								</div>
							</div>
							<!-- Overlay Box Two -->
							<div class="overlay-box-two">
								<div class="overlay-inner-two">
									<div class="large-icon flaticon-exam"></div>
									<div class="content-two">
										<div class="icon-box">
											<span class="icon flaticon-exam"></span>
										</div>
										<h4><a href="schoolregistration" class='btn btn-sucess'>Advertise Schools</a></h4>
										<h4><a href="schoolregistration" class='btn btn-sucess'>View</a></h4>
										
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>


	<!-- About Section Four -->
	

	<!--Main Footer-->
@include('layouts.footer');