<?php 
include("config.php");
$error = "";
$msg = "";

if(isset($_REQUEST['reg'])) {
    $name = trim($_REQUEST['name']);
    $email = trim($_REQUEST['email']);
    $phone = trim($_REQUEST['phone']);
    $pass = trim($_REQUEST['pass']);
    $utype = trim($_REQUEST['utype']);

    $uimage = $_FILES['uimage']['name'];
    $temp_name1 = $_FILES['uimage']['tmp_name'];
    $pass = sha1($pass); // Encrypt password

    $query = "SELECT * FROM user WHERE uemail = '$email'";
    $res = mysqli_query($con, $query);
    $num = mysqli_num_rows($res);

    if ($num == 1) {
        $error = "<p class='alert alert-warning'>Email ID already exists</p>";
    } else {
        if (!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage)) {
            $target_dir = "admin/user/";
            $target_file = $target_dir . basename($uimage);
            
            if (move_uploaded_file($temp_name1, $target_file)) {
                $sql = "INSERT INTO user (uname, uemail, uphone, upass, utype, uimage) VALUES ('$name', '$email', '$phone', '$pass', '$utype', '$uimage')";
                $result = mysqli_query($con, $sql);
                
                if ($result) {
                    header("Location: login.php"); // Redirect to login page
                    exit;
                } else {
                    $error = "<p class='alert alert-warning'>Registration failed</p>";
                }
            } else {
                $error = "<p class='alert alert-warning'>Image upload failed</p>";
            }
        } else {
            $error = "<p class='alert alert-warning'>Please fill in all fields</p>";
        }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
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
</head>
<body>
    <div id="page-wrapper">
        <div class="row"> 
            <?php include("include/header.php"); ?>

            <div class="page-wrappers login-body full-row bg-gray">
                <div class="login-wrapper">
                    <div class="container">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <h1>Register</h1>
                                    <p class="account-subtitle">Access to our dashboard</p>
                                    <?php echo $error; ?><?php echo $msg; ?>
                                
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email*" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Your Phone*" maxlength="10" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control" placeholder="Your Password*" required>
                                        </div>

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="utype" value="user" checked>User
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="utype" value="agent">Agent
                                            </label>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-form-label"><b>User Image</b></label>
                                            <input class="form-control" name="uimage" type="file" required>
                                        </div>
                                        
                                        <button class="btn btn-success" name="reg" value="Register" type="submit">Register</button>
                                    </form>
                                    
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    
                                    <div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

    <?php include("include/footer.php"); ?>

</body>
</html>
