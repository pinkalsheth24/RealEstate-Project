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
<meta name="description" content="Real Estate PHP">
<meta name="keywords" content="">
<meta name="author" content="Unicoder">
<link rel="shortcut icon" href="images/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<title>Real Estate PHP</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Establish MySQLi connection
    $con = mysqli_connect("localhost", "root", "", "realestatephp");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        // Prepare and execute the statement using MySQLi
        $stmt = $con->prepare("INSERT INTO contact_requests (name, phone, email, message) VALUES (?, ?, ?, ?)");
        
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssss", $name, $phone, $email, $message);

            // Execute the statement
            if ($stmt->execute()) {
                // Success response
                echo "<script>
                        alert('Your request has been successfully submitted.');
                        window.location.href = 'index.php'; 
                      </script>";
            } else {
                // Error response
                echo "<script>
                        alert('Failed to submit your request.');
                        window.history.back();
                      </script>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Failed to prepare statement";
        }
        
        // Close the connection
        mysqli_close($con);
    }
}
?>

</body>
</html>
