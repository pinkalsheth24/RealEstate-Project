<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail'])) {
	header("location:login.php");
}								
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!-- CSS Links -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!-- Title -->
<title>Real Estate PHP</title>
</head>
<body>

<div id="page-wrapper">
    <div class="row"> 
        <!-- Header start -->
        <?php include("include/header.php");?>
        <!-- Header end -->

        <!-- Submit Property -->
        <div class="full-row bg-gray">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
                        <?php 
                            if(isset($_GET['msg']))	
                                echo $_GET['msg'];	
                        ?>
                    </div>
                </div>

                <table class="items-list col-lg-12 table-hover table-bordered text-center" style="border-collapse:inherit;">
                    <thead>
                        <tr class="bg-dark">
                            <th class="text-white font-weight-bolder">Properties</th>
                            <th class="text-white font-weight-bolder">BHK</th>
                            <th class="text-white font-weight-bolder">Type</th>
                            <th class="text-white font-weight-bolder">Added Date</th>
                            <th class="text-white font-weight-bolder">Update</th>
                            <th class="text-white font-weight-bolder">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $uid = $_SESSION['uid'];
                        $query = mysqli_query($con, "SELECT * FROM `property` WHERE uid='$uid'");
                        while($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td style="min-width: 250px;">
                                <img src="admin/property/<?php echo $row['groundmapimage'];?>" alt="pimage" width="100" height="70">
                                <div class="property-info d-table text-left pl-2">
                                    <h6 class="text-secondary text-capitalize mb-1">
                                        <a href="propertydetail.php?pid=<?php echo $row['title'];?>"><?php echo $row['title'];?></a>
                                    </h6>
                                    <span><?php echo $row['location']; ?><br><?php echo $row['city']; ?>, <?php echo $row['state']; ?></span>
                                    <div class="price mt-2">
                                        <span class="text-success font-weight-bold">Rs. <?php echo $row['price']; ?></span>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['4']; ?></td>
                            <td class="text-capitalize">For <?php echo $row['5']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><a class="btn btn-info btn-sm" href="updateyourproperty.php?id=<?php echo $row['pid']; ?>">Update</a></td>
                            
<td>
  <a class="btn btn-danger btn-sm" 
     href="deleteproperty.php?id=<?php echo $row['pid']; ?>" 
     onclick="return confirm('Are you sure you want to delete this property?');">
     Delete
  </a>
</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>            
            </div>
        </div>
        <!-- Submit Property -->

    </div>
</div>

<!-- Footer start -->
<?php include("include/footer.php");?>
<!-- Footer end -->

</body>
</html>
