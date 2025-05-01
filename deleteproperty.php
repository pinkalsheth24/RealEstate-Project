<?php
include("config.php");

// Sanitize input
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pid = intval($_GET['id']);

    // Check if property exists
    $check = mysqli_query($con, "SELECT * FROM property WHERE pid = $pid");
    if (mysqli_num_rows($check) > 0) {
        
        // Delete property
        $sql = "DELETE FROM property WHERE pid = $pid";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $msg = "<p class='alert alert-success'>Property Deleted Successfully.</p>";
        } else {
            $msg = "<p class='alert alert-danger'>Error deleting property: " . mysqli_error($con) . "</p>";
        }

    } else {
        $msg = "<p class='alert alert-warning'>No such property exists.</p>";
    }

} else {
    $msg = "<p class='alert alert-danger'>Invalid Property ID.</p>";
}

// Redirect back to yourproperty.php
header("Location: yourproperty.php?msg=" . urlencode($msg));
mysqli_close($con);
?>
