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


<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<!-- jQuery and Bootstrap JavaScript files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<title>Real Estate PHP</title>
</head>

<body>



<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
    
        

		
        <div class="full-row">
            <div class="container">
                <div class="row">
				
					<?php
						$id=$_REQUEST['pid']; 
						$query=mysqli_query($con,"SELECT property.*, user.* FROM `property`,`user` WHERE property.uid=user.uid and pid='$id'");
						while($row=mysqli_fetch_array($query))
						{
					  ?>
				  
                  <div class="col-lg-8">

<div class="row">
    <div class="col-md-12">
        <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;"> 
            <!-- Slide 1-->
            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['pimage'];?>" class="ls-bg" alt="pimage" /> </div>
            
            <!-- Slide 2-->
            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['pimage1'];?>" class="ls-bg" alt="pimage" /> </div>
            
            <!-- Slide 3-->
            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['pimage2'];?>" class="ls-bg" alt="pimage" /> </div>
            
            <!-- Slide 4-->
            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['pimage3'];?>" class="ls-bg" alt="pimage" /> </div>
            
            <!-- Slide 5-->
            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['pimage4'];?>" class="ls-bg" alt="pimage" /> </div>
        </div>
    </div>
</div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="bg-success d-table px-3 py-2 rounded text-white text-capitalize"> <?php echo $row['5'];?></div>
                                <h5 class="mt-2 text-secondary text-capitalize"><?php echo $row['1'];?></h5>
                                <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i> &nbsp;<?php echo $row['location'];?>
                                          <i ></i> <?php echo $row['city']; ?>,
                                <i ></i> <?php echo $row['state']; ?>,
                                <i></i> <?php echo $row['pincode']; ?></span>
							</div>
                            <div class="col-md-6">
                                <div class="text-success text-left h5 my-2 text-md-right">Rs.<?php echo $row['price'];?></div>
                                <div class="text-left text-md-right">Price</div>
                            </div>
                        </div>
                        <div class="property-details">
                            <!-- <div class="bg-gray property-quantity px-4 pt-4 w-100">
                                <ul>
                                <li><b>BHK:</b> <?php echo $row['bhk']; ?></li><br>
                                        <li><b>Bedroom:</b> <?php echo $row['bedroom']; ?></li><br>
                                        <li><b>Hall:</b> <?php echo $row['hall']; ?></li><br>
                                        <li><b>Kitchen:</b> <?php echo $row['kitchen']; ?></li>
                                </ul>
                            </div> -->
                            <h4 class="text-secondary my-4">Description</h4>
                            <p><?php echo $row['2'];?></p>
                            
                            <h5 class="mt-5 mb-4 text-secondary">Property Summary</h5>
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td>BHK:</td>
                                            <td class="text-capitalize"><?php echo $row['bhk'];?></td>
                                            <td>BedRoom:</td>
                                            <td class="text-capitalize"><?php echo $row['bedroom'];?></td>
                                        </tr>
                                    
                                        <tr>
                                            <td>Hall:</td>
                                            <td class="text-capitalize"><?php echo $row['hall'];?></td>
                                            <td>Kitchen:</td>
                                            <td class="text-capitalize"><?php echo $row['kitchen'];?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
						
                            <h5 class="mt-5 mb-4 text-secondary">Property Images</h5>
<div class="accordion" id="accordionExample">
    <!-- Floor Plans -->
    <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Hall Image</button>
    <div id="collapseOne" class="collapse p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
        <img src="admin/property/<?php echo $row['18']; ?>" alt="Not Available" style="width:100%; max-width:300px; height:auto;">
    </div>
    
    <!-- Basement Floor -->
    <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Bedroom Image</button>
    <div id="collapseTwo" class="collapse p-4" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <img src="admin/property/<?php echo $row['19']; ?>" alt="Not Available" style="width:100%; max-width:300px; height:auto;">
    </div>
    
    <!-- Ground Floor -->
    <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Kitchen Image</button>
    <div id="collapseThree" class="collapse p-4" aria-labelledby="headingThree" data-parent="#accordionExample">
        <img src="admin/property/<?php echo $row['20']; ?>" alt="Not Available" style="width:100%; max-width:300px; height:auto;">
    </div>
</div>

<?php if ($_SESSION['utype'] != 'agent') { ?> 
                             <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Agent</h5>
                            <div class="agent-contact pt-60">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-3"> <img src="admin/user/<?php echo $row['uimage']; ?>" alt="" height="200" width="170"> </div>
                                    <div class="col-sm-8 col-lg-9">
                                        <div class="agent-data text-ordinary mt-sm-20">
                                            <h6 class="text-success text-capitalize"><?php echo $row['uname'];?></h6>
                                            <ul class="mb-3">
                                                <li><?php echo $row['uphone'];?></li>
                                                <li><?php echo $row['uemail'];?></li>
                            </ul> 
                            
 <!-- Updated "Contact Agent" Button -->
<!-- Contact Agent Button -->
<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#contactAgentModal">
    Contact Agent
</button>

<!-- Contact Agent Modal -->
<div class="modal fade" id="contactAgentModal" tabindex="-1" aria-labelledby="contactAgentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="contactAgentModalLabel">Contact Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="contactAgentForm" action="contact_agent.php" method="POST">
                
                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <!-- Phone Field -->
                    <div class="form-group">
                        <label for="phone">Phone <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <!-- Message Field -->
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3">I am interested in this property.</textarea>
                    </div>
                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="submitContactForm" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Request Sent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body text-center">
                <!-- Success Icon -->
                <div>
                    <img src="images/Right.jpg" alt="Checkmark">
                    <p>Your request has been successfully submitted.</p>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection variables
    $host = 'localhost';
    $dbname = 'realestatephp';
    $username = 'root'; // Replace with your database username
    $password = '';     // Replace with your database password

    try {
        // Connect to the database
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retrieve form data
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Prepare the SQL statement
        $sql = "INSERT INTO contact_requests (name, phone, email, message) VALUES (:name, :phone, :email, :message)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        // Execute the query
        $stmt->execute();

        // Display the confirmation modal after successful submission
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    $('#confirmationModal').modal('show');
                });
              </script>";

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
<?php } ?> 

                 </div>
                                    
                            </div>
                        </div>
                 
					
					<?php } ?>
                    
					
                    <div class="col-lg-4">
                    
                        <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Instalment Calculator</h4>
                        <form class="d-inline-block w-100" action="calc.php" method="post">
                            <label class="sr-only">Property Amount</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rs.</div>
                                </div>
                                <input type="text" class="form-control" name="amount" placeholder="Property Price">
                            </div>
                            <label class="sr-only">Month</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" name="month" placeholder="Duration Year">
                            </div>
                            <label class="sr-only">Interest Rate</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                </div>
                                <input type="text" class="form-control" name="interest" placeholder="Interest Rate">
                            </div>
                            <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4">Calclute Instalment</button>
                        </form>
                       

                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                            <ul class="property_list_widget">
							
								<?php 
							$query = mysqli_query($con, "SELECT * FROM `property` ORDER BY pid DESC LIMIT 7");

										while($row=mysqli_fetch_array($query))
										{
								?>
                                <li> <img src="admin/property/<?php echo $row['pimage'];?>" alt="pimage">
                                    <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['location'];?></span>
                                    
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
  
        
    </div>
</div>
 <!--	Footer   start-->
 <?php include("include/footer.php");?>
		<!--	Footer   start-->
<!-- Wrapper End --> 

<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script> 

</body>

</html>