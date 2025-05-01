<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
if (!isset($_SESSION['uemail'])) {
    header("location:login.php");
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Real Estate PHP</title>
    <style>
        .profile-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .profile-card img {
            width: 100%;
            height: auto;
        }

        .profile-card .card-body {
            padding: 2rem;
        }

        .profile-card .user-info {
            text-align: center;
        }

        .profile-card .user-info img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .profile-card .user-info .font-18 {
            font-size: 1.125rem;
        }

        .profile-card .user-info .font-18 div {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!-- Header start -->
            <?php include("include/header.php"); ?>
            <!-- Header end -->

            <!-- Profile Section -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-secondary double-down-line text-center">Profile</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="card profile-card mt-4">
                                <div class="card-body">
                                    <?php
                                    $uid = $_SESSION['uid'];
                                    $query = mysqli_query($con, "SELECT * FROM `user` WHERE uid='$uid'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="user-info">
                                            <img src="admin/user/<?php echo $row['6']; ?>" alt="userimage">
                                            <div class="font-18">
                                                <div class="text-capitalize"><b>Name:</b> <?php echo $row['1']; ?></div>
                                                <div><b>Email:</b> <?php echo $row['2']; ?></div>
                                                <div><b>Contact:</b> <?php echo $row['3']; ?></div>
                                                <div class="text-capitalize"><b>Role:</b> <?php echo $row['5']; ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="text-center mt-4">
                                        <a href="update_profile.php" class="btn btn-primary">Update Profile</a>
                                    </div>
                                </div>
                            </div>
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
