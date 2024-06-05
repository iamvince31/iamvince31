<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: signin.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "MarkVincent31";
$dbname = "reg_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No user found";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET email='$email', password='$password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="header">
                <p>Update User</p>
            </div>
            <form method="post">
                <div class="input-box">
                    <label for="text">Email</label>
                    <input type="text" class="input-field" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" class="input-field" id="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" required>
                    <i class="bx bx-lock"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="input-submit" value="Update">
                </div>
                <div class="bottom">
                    <span><a href="home.php">Cancel</a></span>
                </div>
            </form>
        </div>
        <div class="wrapper"></div>
    </div>
</body>
</html>
