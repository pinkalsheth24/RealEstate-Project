<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
?>

<?php
// Fetch properties if search query exists
$properties = [];
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $query = "SELECT * FROM properties WHERE title LIKE '%$search%' OR location LIKE '%$search%'";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $properties[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('images/banner/houseimm.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 class="mb-4"><span class="text-success">Find Your</span><br>Dream House for Sale</h1>
                                <form method="post" action="propertygrid.php" class="form-row">
                                    <!-- Location Input (Long Width) -->
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="location" placeholder="Address, State, city">
                                    </div>
                                    
                                    <!-- Sale/Rent Dropdown -->
                                    <div class="form-group col-md-2">
                                        <select class="form-control" name="sale_rent">
                                            <option value="">For Sale/Rent</option>
                                            <option value="sale">For Sale</option>
                                            <option value="rent">For Rent</option>
                                        </select>
                                    </div>

                                    <!-- Home Type Dropdown -->
                                    <div class="form-group col-md-2">
                                        <select class="form-control" name="home_type">
                                            <option value="">Home Type</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="flat">Flat</option>
                                            <option value="building">Building</option>
                                            <option value="house">House</option>
                                        </select>
                                    </div>

                                    <!-- Search Button -->
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->
        </div>
    </div>

                                      <!--	Recent Properties  -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-secondary double-down-line text-center mb-4">Available All Property</h2>
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
                            
</div>
</div>
</div>
</div>
</div>
</body>
</html>



    <!-- JavaScript Links -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap-slider.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
