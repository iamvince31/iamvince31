<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="signin.css">
    <title>Sign In</title>
</head>
<body>  
    <div class="container">
       <div class="box">
        <div class="header">
            <p>Log In</p>
        </div>
        <form action="login.php" method="POST">
            <div class="input-box">
                <label for="text">Username</label>
                <input type="text" class="input-field" id="email" name="email" required>
            </div>
            <div class="input-box">
            <label for="password">Password</label>
                    <input type="password" class="input-field" id="password" name="password" required>
            </div>
            <div class="input-box">
                <input type="submit" class="input-submit" value="SIGN IN">
            </div>
        </form>
        <div class="bottom">
            <span><a href="index.php">Sign Up</a></span>
        </div>
       </div>
       <div class="wrapper"></div>
    </div>
</body>
</html>
