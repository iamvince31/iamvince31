<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "MarkVincent31";
$dbname = "reg_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$plain_password = $_POST['password'];

// Check user credentials
$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $plain_password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['email'] = $email;
    header("Location: home.php");
} else {
    echo "Invalid email or password";
}

$stmt->close();
$conn->close();
?>
