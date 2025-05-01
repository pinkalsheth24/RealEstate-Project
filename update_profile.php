<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

if (!isset($_SESSION['uemail'])) {
    header("location:login.php");
    exit();
}

$uid = $_SESSION['uid'];
$msg = '';
$error = '';

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    // Image Upload
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    if (!empty($image)) {
        $path = "admin/user/$image";
        move_uploaded_file($temp, $path);
        $update = mysqli_query($con, "UPDATE user SET uname='$name', uphone='$phone', uimage='$image' WHERE uid='$uid'");
    } else {
        $update = mysqli_query($con, "UPDATE user SET uname='$name', uphone='$phone' WHERE uid='$uid'");
    }

    if ($update) {
        $msg = "<p class='alert alert-success'>Profile Updated Successfully</p>";
    } else {
        $error = "<p class='alert alert-danger'>Something went wrong. Try again!</p>";
    }
}

// Fetch user data for form prefill
$query = mysqli_query($con, "SELECT * FROM user WHERE uid='$uid'");
$user = mysqli_fetch_assoc($query);
?>

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
</head>

<!DOCTYPE html>
<html lang="en">

<body>
<style>
    .form-container {
         max-width: 450px;  
        margin: 40px auto; /* Slightly reduced margin */
        padding: 20px; /* Reduced padding */
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 10px;
        background-color: #fff;
    }
    .form-container img.profile-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 20px;
        border: 3px solid #28a745;
    }
    .form-container .form-group input[type="text"],
    .form-container .form-group input[type="file"] {
        margin-bottom: 15px;
    }
    .form-container .btn-primary {
        background-color: #28a745;
        border: none;
    }
    .form-container .btn-secondary {
        background-color: #6c757d;
    }
</style>

</head>
<body>


<?php include("include/header.php"); ?>

<div class="container form-container">
    <h3 class="text-center mb-4">Update Profile</h3>
    <?= $msg ?>
    <?= $error ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="text-center">
            <img src="admin/user/<?= $user['uimage'] ?>" alt="Profile" class="profile-img">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="<?= $user['uname'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Contact</label>
            <input type="text" name="phone" value="<?= $user['uphone'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Change Profile Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" name="update" class="btn btn-primary btn-block">Update Profile</button>
        <a href="profile.php" class="btn btn-secondary btn-block">Back to Profile</a>
    </form>
</div>

<?php include("include/footer.php"); ?>

</body>
</html>
