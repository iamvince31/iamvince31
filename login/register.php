<?php
$servername = "localhost";
$username = "root";
$password = "MarkVincent31";
$dbname = "reg_db"; // Use the newly created database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $plain_password);

// Get form data
$email = $_POST['email'];
$plain_password = $_POST['password']; // Store the password as plaintext

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
