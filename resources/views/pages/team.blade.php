
@include('layouts.header')
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('images/background/bri2.jpg') }})">
    	<div class="auto-container">
			<div class="content">
				<h1>Team <span>Member</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="{{ url('home') }}">Home</a></li>
					<li>Pages</li>
					<li>Team</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->

	<!-- Team Page Section -->
	<section class="team-page-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">About us</div>
					<h2>Our Best  <br>team with <span>experience</span></h2>
			</div>

			<div class="row clearfix">

				<!--Team Block-->
                    {{-- @foreach ($team_members as $team_member) --}}
					{{-- @if ($team_member->status == 'approved') --}}
					<div class="team-block-two style-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="image">
								<a href="#"><img style="width: 100%; height: 300px;" src="" alt="" title=""></a>
								<ul class="social-box">
									<li><a href="face" class="fa fa-facebook"></a></li>
									<li><a href="" class="fa fa-twitter"></a></li>
									<li><a href="#" class="fa fa-linkedin"></a></li>
									<li><a href="" class="fa fa-google-plus"></a></li>
								</ul>
							</div>
							<div class="lower-content">
								<h5><a href="#">Udo simon</a></h5>
								<div class="designation">develop</div>
							</div>
						</div>
					</div>
	
					{{-- @else
						
					@endif

				@endforeach --}}
			</div>
		</div>
	</section>
	<!-- End Team Page Section -->

@include('layouts.footer')

