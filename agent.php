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
        body {
            font-family: 'Muli', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .full-row {
            padding: 40px 20px;
        }

        .agent-box {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .agent-box:hover {
            transform: translateY(-10px);
        }

        .agent-box img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .agent-box .agent-info {
            padding: 15px;
            text-align: center;
        }

        .agent-box h5 {
            margin: 0;
            font-size: 1.2rem;
            color: #333;
        }

        .agent-box span {
            font-size: 0.9rem;
            color: #777;
        }
    </style>

    <title>Real Estate PHP</title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!-- Header start -->
            <?php include("include/header.php"); ?>
        </div>

        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center mb-5">Our Agents</h2>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM user WHERE utype='agent'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="agent-box">
                                <img src="admin/user/<?php echo $row['uimage']; ?>" alt="Agent Image">
                                <div class="agent-info">
                                    <h5><a href="#"><?php echo $row['uname']; ?></a></h5>
                                    <span>Real Estate - Agent</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Footer start -->
        <?php include("include/footer.php"); ?>
    </div>
</body>

</html>
