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
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!--Css Link-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Enforce uniform image sizing for recent property images -->
    <style>
        .featured-thumb img {
            width: 100%;
            height: 220px; /* Adjust as needed */
            object-fit: cover; /* Ensures images fill the area without distortion */
        }

        /* Add a subtle overlay to the entire page */
        body {
            position: relative;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2); /* Adjust overlay color & opacity here */
            pointer-events: none; /* Allows clicks to pass through */
            z-index: -1;
        }
    </style>

    <!-- Chatbot Styles -->
    <style>
        #chat-container {
            width: 350px;
            max-height: 500px;
            border-radius: 10px;
            overflow-y: auto;
            padding: 15px;
            position: fixed;
            bottom: 80px;
            right: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none; /* Initially hidden */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        #chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        #chat-header h4 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        #chat-close {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #777;
        }

        #chat-log {
            flex-grow: 1;
            overflow-y: auto;
            max-height: 300px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        #user-input-container {
            display: flex;
            flex-direction: column; /* Stack input and buttons */
            gap: 10px;
        }

        #user-input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        #button-container {
            display: flex;
            justify-content: space-between;
        }

        #send-button, #clear-chat-button {
            flex: 1;
            padding: 10px;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        #send-button {
            background-color: #28a745;
            margin-right: 5px;
        }

        #clear-chat-button {
            background-color: #dc3545;
            margin-left: 5px;
        }

        #chat-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            z-index: 1001;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
    </style>

    <title>Real Estate PHP</title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!-- Header start -->
            <?php include("include/header.php"); ?>
            <!-- Header end -->
        </div>

        <!-- Banner Start -->
        <div class="overlay-black w-100 slider-banner1 position-relative"
             style="background-image: url('images/homepageimage.jpg');
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-12">
                        <div class="text-white">
                            <h1 class="mb-4">
                                <span class="text-success">Let us</span><br>Guide you Home
                            </h1>
                            <form method="post" action="propertygrid.php">
                                <div class="row">
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control" name="type">
                                                <option value="">Select Type</option>
                                                <option value="apartment">Apartment</option>
                                                <option value="flat">Flat</option>
                                                <option value="building">Building</option>
                                                <option value="house">House</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control" name="stype">
                                                <option value="">Select Status</option>
                                                <option value="rent">Rent</option>
                                                <option value="sale">Sale</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" placeholder="Enter City" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="form-group">
                                            <button type="submit" name="filter" class="btn btn-success w-100">
                                                Search Property
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.text-white -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.slider-banner1 -->

        <!-- What We Do Section -->
        <div class="full-row bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center mb-5">What We Do</h2>
                    </div>
                </div>
                <div class="text-box-one">
                    <div class="row justify-content-center"><!-- Centered columns -->
                        <div class="col-lg-3 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s">
                                <i class="flaticon-rent text-success flat-medium" aria-hidden="true"></i>
                                <h5 class="text-secondary hover-text-success py-3 m-0">
                                    <a href="#">Selling Service</a>
                                </h5>
                                <p>
                                    Sell your property quickly and efficiently with our expert real estate services,
                                    ensuring you get the best price and comprehensive support from start to finish.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s">
                                <i class="flaticon-for-rent text-success flat-medium" aria-hidden="true"></i>
                                <h5 class="text-secondary hover-text-success py-3 m-0">
                                    <a href="#">Rental Service</a>
                                </h5>
                                <p>
                                    Find the perfect rental or tenant with our tailored rental services, offering a wide
                                    selection of properties and reliable matching for landlords and tenants alike.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transition-3s">
                                <i class="flaticon-list text-success flat-medium" aria-hidden="true"></i>
                                <h5 class="text-secondary hover-text-success py-3 m-0">
                                    <a href="#">Property Listing</a>
                                </h5>
                                <p>
                                    Explore our diverse property listings, from residential to commercial spaces,
                                    and discover your next dream home or investment opportunity with ease.
                                </p>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.text-box-one -->
            </div><!-- /.container -->
        </div><!-- /.full-row bg-gray -->

        <!-- Recent Properties Section -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-secondary text-center mb-4">Recent Properties</h2>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $query = mysqli_query($con, "SELECT property.*, user.uname, user.utype, user.uimage
                                                 FROM property
                                                 INNER JOIN user ON property.uid = user.uid
                                                 ORDER BY property.pid DESC LIMIT 9");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-md-4">
                        <div class="featured-thumb hover-zoomer mb-4">
                            <div class="overlay-black overflow-hidden position-relative">
                                <img src="admin/property/<?php echo $row['pimage']; ?>" alt="Property Image">
                                <div class="sale bg-success text-white">
                                     <?php echo $row['type']; ?>
                                </div>
                                <div class="price text-primary">
                                    <b>Rs. <?php echo $row['price']; ?></b>
                                    <span class="text-white">(<?php echo $row['stype']; ?>)</span>
                                </div>
                            </div>
                            <div class="featured-thumb-data shadow-one p-3">
                                <h5 class="text-secondary mb-2">
                                    <a href="propertydetail.php?pid=<?php echo $row['pid']; ?>">
                                        <?php echo $row['title']; ?>
                                    </a>
                                </h5>
                                <span class="location">
                                    <i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['location']; ?>
                                </span>
                                <div class="bg-gray p-3 mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li><b>State:</b> <?php echo $row['state']; ?></li>
                                        <li><b>Beds:</b> <?php echo $row['bedroom']; ?></li>
                                        <li><b>Baths:</b> <?php echo $row['bathroom']; ?></li>
                                        <li><b>Kitchen:</b> <?php echo $row['kitchen']; ?></li>
                                    </ul>
                                </div>
                                <div class="p-3 d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fas fa-user text-success mr-1"></i>By: <?php echo $row['uname']; ?>
                                    </span>
                                    <a href="propertydetail.php?pid=<?php echo $row['pid']; ?>" class="btn btn-outline-success btn-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.full-row -->

        <!-- Footer -->
        <?php include("include/footer.php"); ?>
    </div><!-- /#page-wrapper -->

    <!-- Chatbot Toggle Button (Visible only if user is logged in and not an agent) -->
    <?php if (isset($_SESSION['uemail']) && $_SESSION['utype'] !== 'agent') { ?>
        <button id="chat-toggle" onclick="toggleChat()">Chat</button>
    <?php } ?>

    <!-- Chatbot Interface (Initially Hidden) -->
    <div id="chat-container" style="display: none;">
        <div id="chat-header">
            <h4>Chat with Us</h4>
            <button id="chat-close" onclick="toggleChat()">×</button>
        </div>
        <div id="chat-messages"></div>
        <div id="user-input-container">
            <input type="text" id="user-input" placeholder="Type your message...">
            <button id="send-button" onclick="sendMessage()">Send</button>
            <button id="clear-chat-button" onclick="clearChat()">Clear Chat</button>
        </div>
    </div>

    <script>
        function toggleChat() {
            const chatContainer = document.getElementById('chat-container');

            if (chatContainer.style.display === 'none' || chatContainer.style.display === '') {
                chatContainer.style.display = 'block'; // Show chatbot
            } else {
                chatContainer.style.display = 'none'; // Hide chatbot
            }
        }

        async function sendMessage() {
            const userInput = document.getElementById('user-input').value.trim();
            const chatMessages = document.getElementById('chat-messages');

            if (userInput === '') return; // Prevent empty messages

            // Display user message
            const userMessageElem = document.createElement('div');
            userMessageElem.classList.add('chat-message', 'user-message');
            userMessageElem.textContent = "You: " + userInput;
            chatMessages.appendChild(userMessageElem);

            // Send user message to the server
            const response = await fetch('chatbot.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'message=' + encodeURIComponent(userInput),
            });

            const data = await response.json();

            // Display bot response
            const botMessageElem = document.createElement('div');
            botMessageElem.classList.add('chat-message', 'bot-message');
            botMessageElem.textContent = "Bot: " + data.response;
            chatMessages.appendChild(botMessageElem);

            // Clear input field
            document.getElementById('user-input').value = '';

            // Scroll to the latest message
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function clearChat() {
            document.getElementById('chat-messages').innerHTML = ''; // Clear all messages
        }
    </script>
</body>
</html>
