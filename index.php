<?php
session_start();

require_once './include/connect/dbcon.php';
require_once 'OTP.php';

function redirect($location) {
    header("Location: $location");
    exit;
}

function displayMessage($message) {
    echo '<label style="color: red;">' . $message . '</label>';
}

try {
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["login"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            $message = 'Please provide both your email and password for login.';
        } else {
            $pdoQuery = "SELECT * FROM user WHERE email = ?";
            $pdoResult = $pdoConnect->prepare($pdoQuery);
            $pdoResult->execute([$_POST["email"]]);

            $user = $pdoResult->fetch(PDO::FETCH_ASSOC);
            $count = $pdoResult->rowCount();
            
            

            if($count>0){
            if (password_verify($_POST["password"], $user["password"])) {
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["firstname"] = $user["firstname"];

                $loggedInUser = $_SESSION["email"];
                $pdoQuery = "INSERT INTO `audit_trail`(`action`, `user`) VALUES ('User logged in', :user)";
                $pdoStatement = $pdoConnect->prepare($pdoQuery);
                $pdoStatement->execute([":user" => $loggedInUser]);

                redirect("home.php");
            } else {
                $message = "The email or password provided is incorrect.";
            }
        }else {
            $message = "The entered email is not registered.";
        }

        }
    }
} catch (PDOException $error) {
    echo $error->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sample</title>
    <link rel="stylesheet" type="text/css" href="./include/style/style.css">
    <link rel="icon" type="image/png" href="./include/img/logo.png">

</head>

<body>

  <!-- Navigation bar -->
  <div class="navbar">
        <a href="index.php">Sample Website</a>
       
        <!-- You can add more links here -->
    </div>


    <div class="container">
   
        <h3>Login Sample</h3>
        <form method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password">
            <br>
            <input type="submit" name="login" value="Login" onclick="showLoading()">
            <br>
        </form>
        <a href="verify-fp.php">Forgot Password?</a>
        <br>
        <p class="sign_up">Don't have an account? <a href="register.php">Sign up here</a>.</p>
        <?php 
        if (isset($message)) {
            displayMessage($message);
        }
        ?>
    </div>

</body>
</html>
