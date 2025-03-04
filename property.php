<?php
ini_set('session.cache_limiter', 'public');
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
    <meta name="description" content="Real Estate PHP">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
    
    <title>Real Estate PHP</title>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
        .property-image {
            width: 100%;
            height: 200px; /* Set a fixed height */
            object-fit: cover; /* Ensures images fill the box while maintaining aspect ratio */
            border-radius: 5px; /* Adds rounded corners */
        }
    </style>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!-- Header start -->
            <?php include("include/header.php"); ?>
            <!-- Header end -->
        </div>

        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <?php
                            $query = mysqli_query($con, "SELECT property.*, user.uname, user.utype, user.uimage
                                                         FROM property
                                                         INNER JOIN user ON property.uid = user.uid
                                                         ORDER BY property.pid DESC LIMIT 9");

                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="featured-thumb hover-zoomer">
                                        <div class="overlay-black overflow-hidden position-relative">
                                            <img class="property-image" src="admin/property/<?php echo $row['pimage']; ?>" alt="Property Image">
                                            <div class="sale bg-success text-white">
                                                <?php echo $row['type']; ?>
                                            </div>
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
                                                <i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['location']; ?>
                                            </span>
                                            <div class="bg-gray p-3 mt-3">
                                                <ul class="list-unstyled mb-0">
                                                    <li><b>State:</b> <?php echo $row['state']; ?></li>
                                                    <li><b>Beds:</b> <?php echo $row['bedroom']; ?></li>
                                                    <li><b>Baths:</b> <?php echo $row['bathroom']; ?></li>
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
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar-widget">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Installment Calculator</h4>
                            <form class="d-inline-block w-100" action="calc.php" method="post">
                                <label class="sr-only">Property Amount</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rs.</div>
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
                                        <div class="input-group-text">%</div>
                                    </div>
                                    <input type="text" class="form-control" name="interest" placeholder="Interest Rate">
                                </div>
                                <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4">Calculate Installment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer start -->
    <?php include("include/footer.php"); ?>
    <!-- Footer end -->
</body>

</html>
