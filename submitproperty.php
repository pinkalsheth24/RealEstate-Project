<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

if (!isset($_SESSION['uemail'])) {
    header("location:login.php");
}

$error = "";
$msg = "";

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $ptype = $_POST['ptype'];
    $bhk = $_POST['bhk'];
    $bed = $_POST['bed'];
    $stype = $_POST['stype'];
    $bath = $_POST['bath'];
    $kitc = $_POST['kitc'];
    
    $price = $_POST['price'];
    $city = $_POST['city'];
    $loc = $_POST['loc'];
    $state = $_POST['state']; // Capture state input
    $status = $_POST['status']; // Capture status input
    $uid = $_SESSION['uid'];
    $totalfloor = $_POST['totalfl'];

    // Handle image uploads
    $aimage = $_FILES['aimage']['name'];
    $aimage1 = $_FILES['aimage1']['name'];
    $aimage2 = $_FILES['aimage2']['name'];
    $aimage3 = $_FILES['aimage3']['name'];
    $aimage4 = $_FILES['aimage4']['name'];

    $temp_name = $_FILES['aimage']['tmp_name'];
    $temp_name1 = $_FILES['aimage1']['tmp_name'];
    $temp_name2 = $_FILES['aimage2']['tmp_name'];
    $temp_name3 = $_FILES['aimage3']['tmp_name'];
    $temp_name4 = $_FILES['aimage4']['tmp_name'];

    // Move uploaded files to the appropriate folder
    move_uploaded_file($temp_name, "admin/property/$aimage");
    move_uploaded_file($temp_name1, "admin/property/$aimage1");
    move_uploaded_file($temp_name2, "admin/property/$aimage2");
    move_uploaded_file($temp_name3, "admin/property/$aimage3");
    move_uploaded_file($temp_name4, "admin/property/$aimage4");

    // Insert property data into the database
    $sql = "INSERT INTO property 
            (title, pcontent, type, bhk, stype, bedroom, bathroom, kitchen, price, location, city, state, pimage, pimage1, pimage2, pimage3, pimage4, uid, status, totalfloor)
            VALUES 
            ('$title', '$content', '$ptype', '$bhk', '$stype', '$bed', '$bath', '$kitc', '$price', '$loc', '$city', '$state', '$aimage', '$aimage1', '$aimage2', '$aimage3', '$aimage4', '$uid', '$status', '$totalfloor')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $msg = "<p class='alert alert-success'>Property Inserted Successfully</p>";
    } else {
        $error = "<p class='alert alert-warning'>Property Not Inserted. Some Error Occurred.</p>";
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
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Submit Property</title>
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="page-wrapper">
    <div class="row">
        <!-- Header start -->
        <?php include("include/header.php"); ?>
        <!-- Submit property -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center">Submit Property</h2>
                    </div>
                </div>
                <div class="row p-5 bg-white">
                    <form method="post" enctype="multipart/form-data">
                        <div class="description">
                            <h5 class="text-secondary">Basic Information</h5><hr>
                            <?php echo $error; ?>
                            <?php echo $msg; ?>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="title" required placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Content</label>
                                        <div class="col-lg-9">
                                            <textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Property Type</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" required name="ptype">
                                                <option value="">Select Type</option>
                                                <option value="apartment">Apartment</option>
                                                <option value="flat">Flat</option>
                                                <option value="building">Building</option>
                                                <option value="house">House</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Selling Type</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" required name="stype">
                                                <option value="">Select Status</option>
                                                <option value="rent">Rent</option>
                                                <option value="sale">Sale</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Bathroom</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom (1-10)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row mb-3">
                                        <label class="col-lg-3 col-form-label">BHK</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" required name="bhk">
                                                <option value="">Select BHK</option>
                                                <option value="1 BHK">1 BHK</option>
                                                <option value="2 BHK">2 BHK</option>
                                                <option value="3 BHK">3 BHK</option>
                                                <option value="4 BHK">4 BHK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Bedroom</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom (1-10)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kitchen</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (1-5)">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-secondary">Price & Location</h5><hr>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Total Floor</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="totalfl" required placeholder="Total Floors">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Price</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="price" required placeholder="Enter Price">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">City</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="city" required placeholder="Enter City">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Location</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="loc" required placeholder="Enter Location">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">State</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="state" required placeholder="Enter State">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Status Field -->
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Property Status</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="status">
                                        <option value="">Select Status</option>
                                        <option value="available">Available</option>
                                        <option value="not available">Not Available</option>
                                    
                                    </select>
                                </div>
                            </div>

                            <h5 class="text-secondary">Images Upload</h5><hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Upload Main Image</label>
                                        <div class="col-lg-9">
                                            <input type="file" class="form-control" name="aimage" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Upload Image 1</label>
                                        <div class="col-lg-9">
                                            <input type="file" class="form-control" name="aimage1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Upload Image 2</label>
                                        <div class="col-lg-9">
                                            <input type="file" class="form-control" name="aimage2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Upload Image 3</label>
                                        <div class="col-lg-9">
                                            <input type="file" class="form-control" name="aimage3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Upload Image 4</label>
                                        <div class="col-lg-9">
                                            <input type="file" class="form-control" name="aimage4">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-9 offset-lg-2">
                                    <input type="submit" name="add" class="btn btn-primary" value="Add Property">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
