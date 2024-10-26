<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

///search code

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Real Estate PHP">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!-- Css Link -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- Custom CSS for property width -->
    <style>
        .custom-property-width {
            width: 50%; 
        }
    </style>

    <!-- Title -->
    <title>Real Estate PHP</title>
</head>
<body>

<div id="page-wrapper">
    <div class="row"> 
        <!-- Header start -->
        <?php include("include/header.php");?>
        <!-- Header end -->
        
        <!-- Banner -->
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Filter Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Filter Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
						
                            <?php 
							
                            if(isset($_REQUEST['filter']))
                            {
                                $type=$_REQUEST['type'];
                                $stype=$_REQUEST['stype'];
                                $city=$_REQUEST['city'];
								
                                // Fetch properties based on filters
                                $sql="SELECT property.*, user.uname FROM `property`, `user` WHERE property.uid=user.uid AND type='{$type}' AND stype='{$stype}' AND city='{$city}'";
                                
                                $result=mysqli_query($con, $sql);
							
                                if(mysqli_num_rows($result) > 0)
                                {
                                    if($result == true)
                                    {
                                        while($row=mysqli_fetch_array($result))
                                        {
                            ?>
                                       <div class="col-md-6 custom-property-width">
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
                            <?php 		
                                        } 
                                    }
                                }
                                else {
                                    echo "<h1 class='mb-5'><center>No Property Available</center></h1>";
                                }
                            }
                            ?>
                        </div>
                    </div>
					
                    <div class="col-lg-4">
                        <div class="sidebar-widget">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Instalment Calculator</h4>
                            <form class="d-inline-block w-100" action="calc.php" method="post">
                                <label class="sr-only">Property Amount</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" name="amount" placeholder="Property Price">
                                </div>
                                <label class="sr-only">Month</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="month" placeholder="Duration Year">
                                </div>
                                <label class="sr-only">Interest Rate</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</</div>
                                    </div>
                                    <input type="text" class="form-control" name="interest" placeholder="Interest Rate">
                                </div>
                                <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4">Calculate Instalment</button>
                            </form>
                        </div>
                        
            </div>
        </div>
    </div>
</div>

</body>
</html>
