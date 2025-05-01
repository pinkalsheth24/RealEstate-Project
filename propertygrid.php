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
        <?php include("include/header.php");?>
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name text-white text-uppercase mt-1 mb-0"><b>Filter Property</b></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <!-- Property Listing Section -->
                    <div class="col-lg-8">
                        <div class="row">
                            <?php 
                            if(isset($_REQUEST['filter'])) {
                                $type=$_REQUEST['type'];
                                $stype=$_REQUEST['stype'];
                                $city=$_REQUEST['city'];
                                $sql="SELECT property.*, user.uname FROM `property`, `user` WHERE property.uid=user.uid AND type='{$type}' AND stype='{$stype}' AND city='{$city}'";
                                $result=mysqli_query($con, $sql);
                                if(mysqli_num_rows($result) > 0) {
                                    while($row=mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-6">
                                <div class="featured-thumb hover-zoomer mb-4">
                                    <div class="overlay-black overflow-hidden position-relative"> 
                                        <img src="admin/property/<?php echo $row['pimage'];?>" alt="pimage">
                                        <div class="price text-primary">
                                            <b>Rs. <?php echo $row['price']; ?></b>
                                            <span class="text-white">(<?php echo $row['stype']; ?>)</span>
                                        </div>
                                    </div>
                                    <div class="featured-thumb-data shadow-one p-3">
                                        <h5 class="text-secondary mb-2">
                                            <a href="propertydetail.php?pid=<?php echo $row['pid']; ?>">
                                                <?php echo $row['title']; ?>
                                            </a>
                                        </h5>
                                        <span class="location">
                                            <i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['location']; ?>,
                                            <?php echo $row['city']; ?>, <?php echo $row['state']; ?>, <?php echo $row['pincode']; ?>
                                        </span>
                                        <div class="bg-gray p-3 mt-3">
                                            <ul class="list-unstyled mb-0">
                                                <li><b>BHK:</b> <?php echo $row['bhk']; ?></li>
                                                <li><b>Bedroom:</b> <?php echo $row['bedroom']; ?></li>
                                                <li><b>Hall:</b> <?php echo $row['hall']; ?></li>
                                                <li><b>Kitchen:</b> <?php echo $row['kitchen']; ?></li>
                                            </ul>
                                        </div>
                                        <div class="p-3 d-flex justify-content-between align-items-center">
                                            <span>
                                                <i class="fas fa-user text-success mr-1"></i> By: <?php echo $row['uname']; ?>
                                            </span>
                                            <a href="propertydetail.php?pid=<?php echo $row['pid']; ?>" class="btn btn-outline-success btn-sm">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  } } else {
                                echo "<h1 class='mb-5'><center>No Property Available</center></h1>";
                            } }
                            ?>
                        </div>
                    </div>
                    
                    <!-- Sidebar Section (Instalment Calculator) -->
                    <div class="col-lg-4">
                        <div class="sidebar-widget">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Instalment Calculator</h4>
                            <form class="d-inline-block w-100" action="calc.php" method="post">
                                <label class="sr-only">Property Amount</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" name="amount" placeholder="Property Price">
                                </div>
                                <label class="sr-only">Month</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="month" placeholder="Duration Year">
                                </div>
                                <label class="sr-only">Interest Rate</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                    <input type="text" class="form-control" name="interest" placeholder="Interest Rate">
                                </div>
                                <button type="submit" name="calc" class="btn btn-danger mt-4">Calculate Instalment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                    
    </div>
    <?php include("include/footer.php");?>
</div>
</body>
</html>
