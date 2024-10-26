<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!--Css Link-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Real Estate PHP</title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row"> 
            <!-- Header start -->
            <?php include("include/header.php"); ?>
            <!-- Header end -->
            
            <!-- Banner Start -->
            <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('images/banner/rshmpg.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 class="mb-4"><span class="text-success">Let us</span><br>Guide you Home</h1>
                                <form method="post" action="propertygrid.php">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="type">
                                                    <option value="">Select Type</option>
                                                    <option value="apartment">Apartment</option>
                                                    <option value="flat">Flat</option>
                                                    <option value="building">Building</option>
                                                    <option value="house">House</option>
                                                
                                                 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="stype">
                                                    <option value="">Select Status</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="city" placeholder="Enter City" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" name="filter" class="btn btn-success w-100">Search Property</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="full-row bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">What We Do</h2>
                        </div>
                    </div>
                    <div class="text-box-one">
                        <div class="row justify-content-center"> <!-- Centered columns -->
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s"> 
                                    <i class="flaticon-rent text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Selling Service</a></h5>
                                    <p>Sell your property quickly and efficiently with our expert real estate services, ensuring you get the best price and comprehensive support from start to finish.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s"> 
                                    <i class="flaticon-for-rent text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Rental Service</a></h5>
                                    <p>Find the perfect rental or tenant with our tailored rental services, offering a wide selection of properties and reliable matching for landlords and tenants alike.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s"> 
                                    <i class="flaticon-list text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Property Listing</a></h5>
                                    <p>Explore our diverse property listings, from residential to commercial spaces, and discover your next dream home or investment opportunity with ease.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <!--	Recent Properties  -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-secondary double-down-line text-center mb-4">Recent Property</h2>
                    </div>
                 
                    <div class="col-md-12">
                        <div class="tab-content mt-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                <div class="row">
								
									<?php $query = mysqli_query($con, "SELECT property.*, user.uname, user.utype, user.uimage FROM `property`, `user` WHERE property.uid = user.uid ORDER BY property.pid DESC LIMIT 9");

										while($row=mysqli_fetch_array($query))
										{
									?>
								
                                    <div class="col-md-6 col-lg-4">
                                        <div class="featured-thumb hover-zoomer mb-4">
                                            <div class="overlay-black overflow-hidden position-relative"> 
                                                <img src="admin/property/<?php echo $row['pimage'];?>" alt="pimage">
                                         

                                          
                                                <div class="sale bg-success text-white text-capitalize">For <?php echo $row['type'];?></div>
                                                <div class="price text-primary"><b>Rs.<?php echo $row['price'];?> </b><span class="text-white"><?php echo $row['stype'];?></span></div>
                                            </div>
                                            <div class="featured-thumb-data shadow-one">
                                                <div class="p-3">
                                                    <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['pid'];?>"><?php echo $row['title'];?></a></h5>
                                                    <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['location'];?></span> </div>
                                                <div class="bg-gray quantity px-4 pt-4">
                                                    <ul>
                                                        <li><span><?php echo $row['state'];?></span> State</li>
                                                        <li><span><?php echo $row['bedroom'];?></span> Beds</li>
                                                        <li><span><?php echo $row['bathroom'];?></span> Baths</li>
                                                        <li><span><?php echo $row['kitchen'];?></span> Kitchen</li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="p-4 d-inline-block w-100">
                                                    <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : <?php echo $row['uname'];?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
									<?php } ?>

                                </div>
                            </div>
                            

</body>

</html>
