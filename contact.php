<?php 
include("config.php");
$error = "";
$msg = "";
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {
        $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $msg = "<p class='alert alert-success'>Message Send Successfully</p>";
        } else {
            $error = "<p class='alert alert-warning'>Message Not Send Successfully</p>";
        }
    } else {
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

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

    <title>Real Estate PHP</title>
    <style>
        body {
            margin: 0; 
            padding: 0; 
        }
        .full-row {
            margin-top: 0; 
        }
    </style>
</head>
<body>
<div id="page-wrapper">
    <div class="row"> 
        <?php include("include/header.php");?>
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 bg-secondary">
                        <div class="contact-info">
                            <h3 class="mb-4 mt-4 text-white">Contacts</h3>
                            <ul>
                                <li class="d-flex mb-4"> 
                                    <i class="bi bi-geo-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Address</h5>
                                        <span class="text-white">Shastri Nagar near by BOB,Awaja Road</span> <br>
                                        <span class="text-white">Vadodara</span>
                                    </div>
                                </li>
                                <li class="d-flex mb-4"> 
                                    <i class="bi bi-telephone text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Call Us</h5>
                                        <span class="d-table text-white">9313625782</span>
                                        <span class="text-white">9979334499</span>
                                    </div>
                                </li>
                                <li class="d-flex mb-4"> 
                                    <i class="bi bi-envelope text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Email Address</h5>
                                        <span class="d-table text-white">@realeest001.com</span>
                                        <span class="text-white">@easted024.com</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-md-12 col-lg-7">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
                                    <?php echo $msg; ?><?php echo $error; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="w-100" action="#" method="post">
                                        <div class="row">
                                            <div class="row mb-4">
                                                <div class="form-group col-lg-6">
                                                    <input type="text" name="name" class="form-control" placeholder="Your Name*">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" name="email" class="form-control" placeholder="Email Address*">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" name="phone" class="form-control" placeholder="Phone" maxlength="10">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" value="send message" name="send" class="btn btn-success">Send Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
