<?php require_once 'common/header.php'; ?>
	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/juv3.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1>The News <span> paper </span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">News</a></li>
					<li>Services</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->

	<!-- Services Section Ten -->
	<section class="services-section-ten style-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Services</div>
				<h2>The proper way of <br> Diseminating schools<span> information is guaranteed </span></h2>
			</div>
			<div class="row clearfix">
				<?php if (count($newspaper_release) > 0): ?>
				<?php foreach ($newspaper_release as $newspaper_releases): $date = date('d-m-Y');?>
				<!-- Services Block Fourteen -->
				<div class="services-block-fourteen style-two col-lg-4 col-md-6 col-sm-12">
					<img src="<?php echo HOME. $newspaper_releases['images']; ?>" alt=""></a></h2></span>
					<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
						</div>
						<h6><a href="#">Download <?php echo $newspaper_releases['vol']; ?></a></h6>
					</div>
				</div>

				<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- End Services Section Ten -->

	<!--Main Footer-->
<?php require_once 'common/footer.php'; ?>
