<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

//// code insert
//// add code
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	// $floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	// $asize=$_POST['asize'];
	$loc=$_POST['loc'];
    	$pincode=$_POST['pincode'];
	$state=$_POST['state'];
	// $status=$_POST['status'];
	$uid=$_SESSION['uid'];
	// $feature=$_POST['feature'];
	
	// $totalfloor=$_POST['totalfl'];

	// $isFeatured=$_POST['isFeatured'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1,"admin/property/$aimage1");
	move_uploaded_file($temp_name2,"admin/property/$aimage2");
	move_uploaded_file($temp_name3,"admin/property/$aimage3");
	move_uploaded_file($temp_name4,"admin/property/$aimage4");
	
	move_uploaded_file($temp_name5,"admin/property/$fimage");
	move_uploaded_file($temp_name6,"admin/property/$fimage1");
	move_uploaded_file($temp_name7,"admin/property/$fimage2");
	
	$sql="insert into property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,price,location,pincode,city,state,pimage,pimage1,pimage2,pimage3,pimage4,uid,mapimage,topmapimage,groundmapimage)
	values('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$price',
	'$loc','$pincode','$city','$state','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$fimage','$fimage1','$fimage2')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
}				
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
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
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Add Property</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								<div class="description">
									<h5 class="text-secondary">Property Details</h5><hr>
									 <?php echo $error; ?>  
									<?php echo $msg; ?>
									
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="Enter Title">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
													</div>
												</div>
												
											</div>

                                           <!-- <-- property types -->  
											<div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Property Type</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" required name="ptype">
                                                        <option value="">Select Type</option>
                                                        <!-- <option value="apartment">Apartment</option> -->
                                                        <option value="flat">Flat</option>
                                                        <option value="house">House</option>
                                                        <option value="villa">Villa</option>
                                                        <!-- <option value="office">Office</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- selling type -->
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Selling Type</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" required name="stype">
                                                        <option value="">Select Status</option>
                                                        <option value="rent">Rent</option>
                                                        <option value="sale">Sale</option>
                                                    </select>
                                                    </div>
                                                    </div>
                                                    <!-- summary -->
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">BHK</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" required name="bhk"  id="bhk" onchange="autoFillFields()">
                                                        <option value="">Select BHK</option>
                                                        <option value="1 BHK">1 BHK</option>
                                                        <option value="2 BHK">2 BHK</option>
                                                        <option value="3 BHK">3 BHK</option>
                                                        <option value="4 BHK">4 BHK</option>
                                                        <option value="5 BHK">5 BHK</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Bedroom</label>
                                                        <div class="col-lg-9">
                                                        <input type="number" class="form-control" id="bed" name="bed" required readonly>
                                                        </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Hall</label>
                                                <div class="col-lg-9">
                                                <input type="number" class="form-control" id="hall" name="hall" required readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Kitchen</label>
                                                <div class="col-lg-9">
                                                <input type="number" class="form-control" id="kitc" name="kitc" required readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Bathroom</label>
                                                <div class="col-lg-9">
                                                <input type="number" class="form-control" id="bath" name="bath" required onblur="validateBathroom()">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Balcony</label>
                                                <div class="col-lg-9">
                                                <input type="number" class="form-control" id="balc" name="balc" required onblur="validateBalcony()">
                                                </div>
                                            </div>
                                        </div>
                                         <!-- price & location -->
										</div>
										<h5 class="text-secondary">Price & Location</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													
												</div>  
                                                <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Price</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">₹</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="price" required placeholder="Enter Price" onkeyup="formatPrice(this)">
                                                </div>
                                            </div>
                                        </div>    
                                        
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="Enter City">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required placeholder="Enter State">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
												
													<div class="col-lg-9">
														
													</div>
												</div>
												<div class="form-group row">
													<!-- <label class="col-lg-3 col-form-label">Area Size</label> -->
													<div class="col-lg-9">
														<!-- <input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)"> -->
													</div>
												</div>
                                                                                <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Address</label>
                                                            <div class="col-lg-9">
                                                                <textarea class="form-control" name="loc" required rows="3" placeholder="Enter Address"></textarea>
                                                            </div>
                                         </div>
                                            <div class="form-group row">
											<label class="col-lg-3 col-form-label">pincode</label>
											<div class="col-lg-9">
                                            <input type="text" class="form-control" name="pincode" id="pincode" require placeholder="Enter pincode" onblur="validatePincode()">
                                            <small id="pincodeError" class="text-danger"></small>				
                                                                    
                                                </div>
												</div>	
											</div>
										</div>
                                        
										<div class="form-group row">
											
											</div>
										</div>
												
										<h5 class="text-secondary">Images</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bedroom Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hall Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<!-- <label class="col-lg-3 col-form-label">Status</label> -->
													<div class="col-lg-9">
														
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Whole House Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">other Image </label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">other Image </label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">other Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">other Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>
											</div>
										</div>
                                <script>
                                    function autoFillFields() {
                                        const bhk = document.getElementById("bhk").value;
                                        const bedroom = document.getElementById("bed");
                                        const hall = document.getElementById("hall");
                                        const kitchen = document.getElementById("kitc");
                                        const balc = document.getElementById("balc");
                                        const bath = document.getElementById("bath");

                                        let maxBalcony = 0;
                                        let maxBathroom = 0;

                                        switch (bhk) {
                                            case "1 BHK":
                                                bedroom.value = 1; hall.value = 1; kitchen.value = 1;
                                                maxBalcony = 2; maxBathroom = 2;
                                                break;
                                            case "2 BHK":
                                                bedroom.value = 2; hall.value = 1; kitchen.value = 1;
                                                maxBalcony = 3; maxBathroom = 3;
                                                break;
                                            case "3 BHK":
                                                bedroom.value = 3; hall.value = 1; kitchen.value = 1;
                                                maxBalcony = 4; maxBathroom = 4;
                                                break;
                                            case "4 BHK":
                                                bedroom.value = 4; hall.value = 1; kitchen.value = 1;
                                                maxBalcony = 5; maxBathroom = 5;
                                                break;
                                            case "5 BHK":
                                                bedroom.value = 5; hall.value = 1; kitchen.value = 1;
                                                maxBalcony = 6; maxBathroom = 6;
                                                break;
                                            default:
                                                bedroom.value = ""; hall.value = ""; kitchen.value = "";
                                                maxBalcony = 0; maxBathroom = 0;
                                        }

                                        // Set placeholders and reset values if out of range
                                        balc.placeholder = `Enter 0 to ${maxBalcony}`;
                                        bath.placeholder = `Enter 1 to ${maxBathroom}`;
                                        if (balc.value > maxBalcony) balc.value = "";
                                        if (bath.value > maxBathroom) bath.value = "";
                                    }

                                    function validateBalcony() {
                                        const balcInput = document.getElementById("balc");
                                        const bhk = document.getElementById("bhk").value;
                                        let maxBalcony = 0;

                                        switch (bhk) {
                                            case "1 BHK": maxBalcony = 2; break;
                                            case "2 BHK": maxBalcony = 3; break;
                                            case "3 BHK": maxBalcony = 4; break;
                                            case "4 BHK": maxBalcony = 5; break;
                                            case "5 BHK": maxBalcony = 6; break;
                                        }

                                        const value = parseInt(balcInput.value);
                                        if (value < 0 || value > maxBalcony) {
                                            alert(`Balcony should be between 0 and ${maxBalcony} for ${bhk}`);
                                            balcInput.value = "";
                                        }
                                    }

                                    function validateBathroom() {
                                        const bathInput = document.getElementById("bath");
                                        const bhk = document.getElementById("bhk").value;
                                        let maxBathroom = 0;

                                        switch (bhk) {
                                            case "1 BHK": maxBathroom = 2; break;
                                            case "2 BHK": maxBathroom = 3; break;
                                            case "3 BHK": maxBathroom = 3; break;
                                            case "4 BHK": maxBathroom = 4; break;
                                            case "5 BHK": maxBathroom = 5; break;
                                        }

                                        const value = parseInt(bathInput.value);
                                        if (value < 1 || value > maxBathroom) {
                                            alert(`Bathroom should be between 1 and ${maxBathroom} for ${bhk}`);
                                            bathInput.value = "";
                                        }
                                    }
                                </script>

                            <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $bhk = $_POST['bhk'];
                                        $bath = $_POST['bath'];
                                        $balc = $_POST['balc'];

                                        $maxBalcony = ($bhk == "1 BHK") ? 2 : (($bhk == "2 BHK") ? 3 : (($bhk == "3 BHK") ? 4 : (($bhk == "4 BHK") ? 5 : 6)));
                                        $maxBathroom = ($bhk == "1 BHK") ? 2 : (($bhk == "2 BHK") ? 3 : (($bhk == "3 BHK") ? 3 : (($bhk == "4 BHK") ? 4 : 5)));

                                        if ($bath < 1 || $bath > $maxBathroom) echo "<script>alert('Invalid Bathroom count!');</script>";
                                        if ($balc < 0 || $balc > $maxBalcony) echo "<script>alert('Invalid Balcony count!');</script>";
                                    }
                                    ?>

                                                                                    
                                                                <script>
                                                                    function formatPrice(input) {
                                                                        let value = input.value.replace(/,/g, ''); // Remove existing commas
                                                                        if (!isNaN(value) && value !== "") {
                                                                            let formattedValue = new Intl.NumberFormat('en-IN').format(value);
                                                                            input.value = formattedValue;
                                                                        }
                                                                    }
                                                                </script>

                                                                
                                                            
                                                            <?php
                                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                                if (isset($_POST['price'])) {
                                                                    // Remove commas for processing
                                                                    $price = str_replace(',', '', $_POST['price']);

                                                                    // Validate numeric input
                                                                    if (!is_numeric($price) || $price < 0) {
                                                                        echo "<p class='mt-3 text-danger'>Invalid price. Please enter a valid number.</p>";
                                                                    } else {
                                                                        // Format price properly
                                                                        $formattedPrice = number_format($price, 0, '', ',');
                                                                        echo "<p class='mt-3 text-success'>Price entered: ₹$formattedPrice</p>";
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                                    <script>
                                                                    function validatePincode() {
                                                                        let pincode = document.getElementById("pincode").value;
                                                                        let errorMessage = document.getElementById("pincodeError");

                                                                        if (!/^\d{6}$/.test(pincode)) {
                                                                            errorMessage.innerText = "Pincode must be exactly 6 digits.";
                                                                        } else {
                                                                            errorMessage.innerText = "";  // Clear the error message
                                                                        }
                                                                    }
                                                                        </script>
                                                                    
                                                                    
                                                                        <input type="submit" value="Add Property" class="btn btn-info"name="add" style="margin-left:200px;">
                                                                    
								</div>
								</form>
                    </div>            
            </div>
        </div>
	<!--	Submit property   --> 
    </div>
</div>

        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->

</body>
</html>
