<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize input
    $con = mysqli_connect("localhost", "root", "", "realestatephp");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM contact_requests WHERE id = $id";
    if (mysqli_query($con, $sql)) {
        // Redirect with success message
        header("Location: view_requests.php?msg=deleted");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
