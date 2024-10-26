<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> Profile</title>
		

        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
	
    </head>
    <body>
	


		
			<!-- Header -->
            <?php include("header.php");?>
			<!-- /Header -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<?php
						
						$id=$_SESSION['auser'];
						$sql="select * from admin where auser='$id'";
						$result=mysqli_query($con,$sql);
						while($row=mysqli_fetch_array($result))
						{
						?>
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar.png">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-2 text-uppercase"><?php echo $row['1']; ?></h4>
										<h6 class="text-muted"><?php echo $row['2']; ?></h6>
										<div class="user-Location"><i class="fa fa-id-badge" aria-hidden="true"></i>
											<?php echo $row['4']; ?></div>
										<div class="about-text"></div>
									</div>

								</div>
							</div>
							
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-9">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-9"><?php echo $row['1']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-9"><?php echo $row['4']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-9"><a href="#"><?php echo $row['2']; ?></a></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-9"><?php echo $row['5']; ?></p>
													</div>
													
												</div>
											</div>
										</div>

										<div class="col-lg-3">
											
										

											
										</div>
									</div>
									<!-- /Personal Details -->

								</div>
							
								
							</div>
						</div>
					</div>
				<?php } ?>
				</div>			
			</div>
		
        <script src="assets/js/jquery-3.2.1.min.js"></script>
	
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		
     
		
	
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>