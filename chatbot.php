<?php
// Database credentials
$servername = "localhost";  // MySQL server (default: localhost)
$username   = "root";       // Default XAMPP username is "root"
$password   = "";           // Default XAMPP password is empty ("")
$dbname     = "realestatephp";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user message from POST request
$userMessage = $_POST['message'];

// Enhanced bot response logic
$botResponse = "I'm here to help!";

if (stripos($userMessage, 'types of properties') !== false) {
    $botResponse = "We offer a variety of properties including apartments, flats, houses, and commercial buildings. Are you looking for something specific?";
} elseif (stripos($userMessage, 'buy a house') !== false) {
    $botResponse = "To buy a house, you can browse our listings, filter by your preferences, and contact the listed agent for more details. Would you like to start searching now?";
} elseif (stripos($userMessage, 'rent a property in Mumbai') !== false) {
    $botResponse = "Yes, we have rental properties available in Mumbai. Would you like to see some options?";
} elseif (stripos($userMessage, 'average price for a 3-bedroom apartment') !== false) {
    $botResponse = "The average price for a 3-bedroom apartment varies by location. Could you specify the area you're interested in?";
} elseif (stripos($userMessage, 'properties with a swimming pool') !== false) {
    $botResponse = "Yes, we have properties with swimming pools. Let me show you some options that match this criteria.";
} elseif (stripos($userMessage, 'schedule a visit') !== false) {
    $botResponse = "You can schedule a visit by contacting the agent listed on the property page. Would you like assistance with this?";
} elseif (stripos($userMessage, 'documents to rent a property') !== false) {
    $botResponse = "Typically, you'll need identification documents, proof of income, and references. I can provide a detailed list if you'd like.";
} elseif (stripos($userMessage, 'properties available for sale in Delhi') !== false) {
    $botResponse = "Yes, we have several properties for sale in Delhi. Would you like to see some listings?";
} elseif (stripos($userMessage, 'property management') !== false) {
    $botResponse = "Yes, we offer property management services. Would you like more information about this?";
} elseif (stripos($userMessage, 'selling my property') !== false) {
    $botResponse = "To sell your property, you can list it on our platform by providing details and photos. Our agents will assist you throughout the process. Would you like to get started?";
}

// Insert the message and response into the database
$sql = "INSERT INTO chat_messages (user_message, bot_response) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $userMessage, $botResponse);
$stmt->execute();

// Return the bot response as JSON
echo json_encode(['response' => $botResponse]);

$stmt->close();
$conn->close();
?>


