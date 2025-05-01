<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

// Fetch all contact requests
$con = mysqli_connect("localhost", "root", "", "realestatephp");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    $sql = "SELECT * FROM contact_requests ORDER BY request_date DESC";
    $result = mysqli_query($con, $sql);
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
        body {
            background-color: #f2f4f7;
        }

        .requests-section {
            margin: 40px auto;
            max-width: 1100px;
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        h2 {
            font-weight: 600;
            margin-bottom: 25px;
            color: #343a40;
        }

        .table th {
            background-color:rgb(73, 190, 100);
            color: white;
        }

        .table td {
            vertical-align: middle;
        }

        .table th.action-column,
        .table td.action-column {
            width: 120px;
            text-align: center;
        }

        .btn-light-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 5px 10px;
            font-size: 0.85rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-light-danger:hover {
            background-color: #f1b0b7;
            color: #fff;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Header Include -->
    <?php include("include/header.php"); ?>

    <div class="container requests-section">
        <h2 class="text-center">User Contact Requests</h2>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
            <div class="alert alert-success text-center">Request deleted successfully.</div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Request Date</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['request_date']) . "</td>";
                            echo "<td class='action-column'>
                                <a href='delete_request.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this request?');\">
                                    <button class='btn btn-light-danger'>Delete</button>
                                </a>
                              </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No contact requests found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer Include -->
    <?php include("include/footer.php"); ?>

</body>

</html>
