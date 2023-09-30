<?php require_once 'common/header.php'; ?>	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo HOME.$press_single_release['images']; ?>)">
    	<div class="auto-container">
			<div class="content">
				<h1>Print Admission</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?php echo HOME; ?>home">Home</a></li>
				
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
			<?php if ($advertcontact_schools != false): ?>
              <?php 
                $id = $advertcontact_school['id']; 
               	$images = $advertcontact_school['images']; 
                $date = date('d-m-Y');  ?>
						
			<section class="contact-page-section">
				<div class="auto-container">
					<div class="inner-container">
						<h2 style="text-align: center;"><?php echo $advertcontact_school['nameofschool']; ?><?php echo $advertcontact_school['country'];  ?> </h2>

						<h5 style="text-align: center;"> <?php echo $advertcontact_school['schooladdress']; $logo = $advertcontact_school['logo']; ?> </h5>

						<?php echo "<td><img style='width: 100px; height: 100px; margin-bottom: 10px;' src='".$logo."' alt='images'></td>";  ?><br>
						<?php echo "<td><img style='width: 100px; height: 100px; margin-bottom: 10px;' src='".$images."' alt='images'></td>";  ?><br>
						<div class="row clearfix">
							
							<!-- Info Column -->
							<div class="info-column col-lg-6 col-md-12 col-sm-12">
								<div class="contactform">
									<form method="post" action="" enctype="multipart/form-data">
									
										<div class="form-group">
											<h5>FIRSTNAME</h5>
											<input class="form-control" type="text" name="firstname" value="<?php echo $advertcontact_school['firstname']; ?>" placeholder="Firstname" required="">
										</div>
										
										<div class="form-group">
											<h5>OTHER NAMES</h5>
											<input class="form-control" type="text" name="othername" value="<?php echo $advertcontact_school['othername']; ?>" placeholder="Othernames" required="">
										</div>
											<h5>SELECT GENDER</h5>
										<div class="form-group">
											<select class="form-control" name="gender" required="">
												<option><?php echo $advertcontact_school['gender']; ?></option>
											
											</select>
										</div>
										<div class="form-group">
											<h5>STATE OF ORIGIN</h5>
											<input class="form-control" type="text" name="state" value="<?php echo $advertcontact_school['state']; ?>" placeholder="State of origin" required="">
										</div>
										<div class="form-group">
											<h5>LOCAL GOVERNMENT</h5>

											<input class="form-control" type="text" name="localgovt" value="<?php echo $advertcontact_school['localgovt']; ?>" placeholder="Local Government Origin" required="">
										</div>
										
										<div class="form-group">
											 
		                              	<h5>Nationality</h5>
		                              	<select class="form-control" id="country" name="country" required="">
		                                  <option><?php echo $advertcontact_school['country']; ?></option>
		                                 
		                              	</select>
										</div>
										<div class="form-group">
											<h5>RELIGION</h5>

											<input class="form-control" type="text" name="religion" value="<?php echo $advertcontact_school['religion']; ?>" placeholder="Religion" required="">
										</div>
										
											                                 
								</div>
							</div>
							
							<!-- Form Column -->
							<div class="form-column col-lg-6 col-md-12 col-sm-12">
								<div class="innercolumn">
									
										<div class="form-group">
											<h5>CLASS</h5>
											<input class="form-control" type="text" name="class" value="<?php echo $advertcontact_school['class']; ?>" placeholder="Class" required="">
										</div>
										<h5>PARENT/GUARDIAN NAME</h5>
										<div class="form-group">
											<input class="form-control" type="text" name="parentname" value="<?php echo $advertcontact_school['parentname']; ?>" placeholder="Parent/Guardian Name" required="">
										</div>
									<div class="form-group">
											<h5>CONTACT ADDRESS</h5>

										<input class="form-control" type="text" name="contactaddress" value="<?php echo $advertcontact_school['contactaddress']; ?>" placeholder="Contact address of Parent" required="">
									</div>

									<div class="form-group">
										<h5>EMAIL</h5>

										<input class="form-control" type="text" name="email" value="<?php echo $advertcontact_school['email']; $images = $advertcontact_school['images']; ?>" placeholder="Email">
									</div>
										
									<div class="form-group">
										<h4>UPLOAD PASSPORD</h4>
										 <?php echo "<td><img style='width: 100px; height: 100px; margin-bottom: 10px;' src='".$images."' alt='images'></td>";  ?><br>
									</div>

									
				                    <div class="form-group">
											<h5>PARENT PHONE NUMBER</h5>

				                        <input class="form-control" type="text" name="phone" value="<?php echo $advertcontact_school['phone']; ?>" placeholder="Phone Number" required="">
				                    </div>
				                    <div class="form-group">
											<h5>DATE OF BIRTH</h5>

											<input class="form-control" type="text" name="dateofbirth" value="<?php echo $advertcontact_school['dateofbirth']; ?>" placeholder="Date of birth" required="">
										</div>
										
				                    <div class="form-group">
				                    	<select  name="nameofschool" style="display: none;">
				                    		<option><?php echo $press_single_release['schoolname']; ?></option>
				                    	</select>
				                     
				                    </div>
				                    
									<div class="form-group">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>                                        
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>									<!-- End Team Page Section -->
	
	
							    



	<!--Main Footer-->
<?php require_once 'common/footer.php'; ?>