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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get logged in user's email
$email = $_SESSION['email'];

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome <?php echo htmlspecialchars($email); ?></h1>
        </header>
        <h2>Registered Users</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td><a href='update.php?id=" . $row['id'] . "'>Update</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No users found</td></tr>";
            }
            ?>
        </table>
    <div class="logout-container">
    <a href="logout.php" class="logout-link">Logout</a>
    </div>
       
</body>
</html>

<?php
$conn->close();
?>
