<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

if (!isset($_SESSION['uemail'])) {
    header("location:login.php");
    exit();
}

$msg = "";
$pid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;

// On form submit
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $ptype = $_POST['ptype'];
    $bhk = $_POST['bhk'];
    $bed = $_POST['bed'];
    $balc = $_POST['balc'];
    $hall = $_POST['hall'];
    $stype = $_POST['stype'];
    $bath = $_POST['bath'];
    $kitc = $_POST['kitc'];
    $price = $_POST['price'];
    $city = $_POST['city'];
    $loc = $_POST['loc'];
    $state = $_POST['state'];
    $uid = $_SESSION['uid'];
    $pincode = $_SESSION['pincode'];

    // Handle Images
    $uploadPath = "admin/property/";
    function uploadImg($name, $tmpName) {
        global $uploadPath;
        if (!empty($name)) {
            move_uploaded_file($tmpName, $uploadPath . $name);
            return $name;
        }
        return "";
    }

    $aimage = uploadImg($_FILES['aimage']['name'], $_FILES['aimage']['tmp_name']);
    $aimage1 = uploadImg($_FILES['aimage1']['name'], $_FILES['aimage1']['tmp_name']);
    $aimage2 = uploadImg($_FILES['aimage2']['name'], $_FILES['aimage2']['tmp_name']);
    $aimage3 = uploadImg($_FILES['aimage3']['name'], $_FILES['aimage3']['tmp_name']);
    $aimage4 = uploadImg($_FILES['aimage4']['name'], $_FILES['aimage4']['tmp_name']);
    $fimage = uploadImg($_FILES['fimage']['name'], $_FILES['fimage']['tmp_name']);
    $fimage1 = uploadImg($_FILES['fimage1']['name'], $_FILES['fimage1']['tmp_name']);
    $fimage2 = uploadImg($_FILES['fimage2']['name'], $_FILES['fimage2']['tmp_name']);

    // SQL Update Query
    $sql = "UPDATE property SET 
        title='$title',
        pcontent='$content',
        type='$ptype',
        bhk='$bhk',
        stype='$stype',
        bedroom='$bed',
        bathroom='$bath',
        balcony='$balc',
        kitchen='$kitc',
        hall='$hall',
        price='$price',
        location='$loc',
        city='$city',
        state='$state',
        pimage='$aimage',
        pimage1='$aimage1',
        pimage2='$aimage2',
        pimage3='$aimage3',
        pimage4='$aimage4',
        uid='$uid',
        mapimage='$fimage',
        topmapimage='$fimage1',
        groundmapimage='$fimage2',
        pincode='$pincode'
        WHERE pid=$pid";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $msg = "<p class='alert alert-success'>Property Updated Successfully!</p>";
    } else {
        $msg = "<p class='alert alert-danger'>Failed to Update Property!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Property | Real Estate PHP</title>
    <?php include("include/header.php");?>
    </style>
    <head>

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
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

<title>Real Estate PHP</title>
</head>
</head>
<body>

<!-- Header Section (Updated) -->
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Real Estate</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="properties.php">Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container mt-5">
    <div class="form-section">
        <h2 class="form-title">Update Property</h2>
        <?php if (!empty($msg)) echo $msg; ?>

        <?php
        $query = mysqli_query($con, "SELECT * FROM property WHERE pid = '$pid'");
        if ($row = mysqli_fetch_array($query)) {
        ?>
        <form method="post" enctype="multipart/form-data">
            <!-- Title & Content -->
            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required value="<?= $row['title'] ?>">
            </div>
            <div class="mb-3">
                <label>Content</label>
                <textarea class="form-control" name="content" rows="4" required><?= $row['pcontent'] ?></textarea>
            </div>

            <!-- Property Details -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Property Type</label>
                    <select class="form-control" name="ptype" required>
                        <option <?= $row['type'] == 'flat' ? 'selected' : '' ?>>flat</option>
                        <option <?= $row['type'] == 'house' ? 'selected' : '' ?>>house</option>
                        <option <?= $row['type'] == 'villa' ? 'selected' : '' ?>>villa</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>BHK</label>
                    <select class="form-control" name="bhk" required>
                        <?php
                        $bhkOptions = ["1 BHK", "2 BHK", "3 BHK", "4 BHK", "5 BHK"];
                        foreach ($bhkOptions as $opt) {
                            echo "<option " . ($row['bhk'] == $opt ? 'selected' : '') . ">$opt</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Selling Type</label>
                    <select class="form-control" name="stype" required>
                        <option <?= $row['stype'] == 'sale' ? 'selected' : '' ?>>sale</option>
                        <option <?= $row['stype'] == 'rent' ? 'selected' : '' ?>>rent</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="<?= $row['price'] ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Bedroom</label>
                    <input type="text" class="form-control" name="bed" value="<?= $row['bedroom'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Bathroom</label>
                    <input type="text" class="form-control" name="bath" value="<?= $row['bathroom'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Balcony</label>
                    <input type="text" class="form-control" name="balc" value="<?= $row['balcony'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Kitchen</label>
                    <input type="text" class="form-control" name="kitc" value="<?= $row['kitchen'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Hall</label>
                    <input type="text" class="form-control" name="hall" value="<?= $row['hall'] ?>">
                </div>
            </div>

            <!-- Location -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="<?= $row['city'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>State</label>
                    <input type="text" class="form-control" name="state" value="<?= $row['state'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Location</label>
                    <input type="text" class="form-control" name="loc" value="<?= $row['location'] ?>">
                </div>
            </div>

            <!-- Image Uploads -->
            <h5 class="mt-4">Images</h5>
            <div class="row">
                <div class="col-md-3"><input type="file" name="aimage" class="form-control"></div>
                <div class="col-md-3"><input type="file" name="aimage1" class="form-control"></div>
                <div class="col-md-3"><input type="file" name="aimage2" class="form-control"></div>
                <div class="col-md-3"><input type="file" name="aimage3" class="form-control"></div>
                <div class="col-md-3"><input type="file" name="aimage4" class="form-control"></div>
            </div>
            <h5 class="mt-3">Map Images</h5>
            <div class="row">
                <div class="col-md-4"><input type="file" name="fimage" class="form-control"></div>
                <div class="col-md-4"><input type="file" name="fimage1" class="form-control"></div>
                <div class="col-md-4"><input type="file" name="fimage2" class="form-control"></div>
            </div>

            <button type="submit" name="add" class="btn btn-primary mt-4">Update Property</button>
            <br>
            <br>
        </form>
        <?php } ?>
    </div>
</div>

<?php include("include/footer.php"); ?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
