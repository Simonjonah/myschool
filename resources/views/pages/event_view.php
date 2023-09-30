<?php require_once 'common/header.php'; ?>	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME; ?>images/background/bri2.jpg)">
    	<div class="auto-container">
			<div class="content">
				<h1><?php echo $event_singles['schoolname']; ?></span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
					<li><?php echo $event_singles['address']; ?></li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="blog-single">
						<div class="inner-box">
							<div class="image">
								<img src="<?php echo HOME.$event_singles['images']; $date = new DateTime('19:24:15 06/13/2013'); ?>" alt="" />
							</div>
							<div class="lower-content">
								<ul class="post-meta">
									<li><span class="fa fa-calendar"></span><?php echo $date->format('h:i:s a m/d/y'); ?></li>
									
								</ul>
								<h4><?php echo $event_singles['schoolname']; ?></h4>
								<div class="text">
									<p><?php echo $event_singles['message']; ?></p>
								</div>
							</div>
						</div>

					</div>
				</div>
				
				<!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar default-sidebar">
						
						<!-- Search -->
                        <div class="sidebar-widget search-box">
                        	<form method="post" action="">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Enter Your Keyword..." >
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>
					
						<!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <div class="sidebar-title-two">
                                <h4>Categories</h4>
                            </div>
                            <ul class="blog-cat-two">
                                <li><a href="<?php echo HOME; ?>blog">Topic: <?php echo $event_singles['schoolname'];  $date = date('d-m-Y'); ?> <span><?php echo $date; ?></span></a></li>
                                <li><a href="<?php echo HOME; ?>blog">School Address: <?php echo $event_singles['address']; ?></a></li>
                                <li><a href="<?php echo HOME; ?>blog">School Name: <?php echo $event_singles['schoolname']; ?></a></li>
                                
                            </ul>
                        </div>
						
						
						
						
						<!--Gallery Widget-->
                        <div class="sidebar-widget instagram-widget">
                            <div class="sidebar-title-two">
                                <h4>Gallery</h4>
                            </div>
							<div class="images-outer clearfix">
                                <!--Image Box-->
                                <figure class="image-box"><a href="<?php echo HOME.$event_singles['images']; ?>" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus-symbol"></span></a>
                                <img src="<?php echo HOME.$event_singles['images']; ?>" alt=""></figure>
                                
                            </div>
						</div>
						
						
						
						<!-- Banner Widget-->
                        <div class="sidebar-widget banner-widget">
							<div class="widget-content" style="background-image:url(<?php echo HOME; ?>images/resource/bri2.jpg)">
								<div class="logo">
									<img src="images/icons/widget-logo.png" alt="" />
								</div>
								<div class="title" style="color: #FF0000;">Subscribe for our news Letter</div>
								<h2 style="color: #FF0000;">JUVENILE NEWS</h2>
								<a href="<?php echo HOME; ?>nurseryform" class="theme-btn btn-style-seventen">Subscribe now <span class="icon flaticon-link"></span></a>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<!--End Sidebar Page Container-->

	<!--Main Footer-->
<?php require_once 'common/footer.php'; ?>