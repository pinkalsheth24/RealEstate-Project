<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");



if(isset($_REQUEST['calc']))
{
	$amount=$_REQUEST['amount'];
	$mon=$_REQUEST['month'];
	$int=$_REQUEST['interest'];
	
	$interest = $amount * $int/100;
	$pay = $amount + $interest;
	$month = $pay / $mon;

}	
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<body>



<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
     
		 
		<!--	Submit property   -->
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">EMI Calculator</h2>
                        </div>
					</div>
					<center>
					<table class="items-list col-lg-6 table-hover" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-secondary">
                                <th class="text-white font-weight-bolder">Term</th>
                                <th class="text-white font-weight-bolder">Amount</th>
                             </tr>
                        </thead>
                        <tbody>
						
						
                            <tr class="text-center font-18">
                                <td><b>Amount</b></td>
                                <td><b><?php echo 'Rs.'.$amount ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Duration</b></td>
                                <td><b><?php echo $mon.' Months' ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Interest Rate</b></td>
                                <td><b><?php echo $int.'%' ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Interest</b></td>
                                <td><b><?php echo 'Rs.'.$interest ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Amount</b></td>
                                <td><b><?php echo 'Rs.'.$pay ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Pay Per Month (EMI)</b></td>
                                <td><b><?php echo ''.$month ; ?></b></td>
                            </tr>
							
                        </tbody>
                    </table> 
					</center>
            </div>
        </div>
    </div>
</div>


</body>
</html>