<?php
session_start();

require_once './include/connect/dbcon.php';
require_once 'otp.php';

function displayMessage($message) {
    echo '<div class="message">' . $message . '</div>';
}

if (isset($_POST['register'])) {
    $firstname = htmlspecialchars(trim($_POST['regfirstname'] ?? ''));
    $middlename = htmlspecialchars(trim($_POST['regmiddlename'] ?? ''));
    $lastname = htmlspecialchars(trim($_POST['reglastname'] ?? ''));
    $email = htmlspecialchars(trim($_POST['regemail'] ?? ''));
    
if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
     $checkQuery = "SELECT email FROM `user` WHERE `email` = ?";
    $checkResult = $pdoConnect->prepare($checkQuery);
    $checkResult->execute([$email]);
    $existingUser = $checkResult->fetch(PDO::FETCH_ASSOC);
    
    if ($existingUser) {
        $message = "Email has been taken.";
        // Display the message here
      
    } else {
        $_SESSION['registration_data'] = [
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'email' => $email
        ];

        sendMail($email, $firstname); // Function to send OTP to the provided email

        header("location:verify.php");
        exit();
    }
    
} else{
       $message = "You entered an invalid email. Please try again!";
}
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PRJ</title>
    <link rel="stylesheet" type="text/css" href="./include/style/style.css">
        <link rel="icon" type="image/png" href="./include/img/logo.png">
    <style>
        /* Loader styles */
        .loader {
            position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #333333;
    transition: opacity 0.75s, visibility 0.75s;
            display: none; /* Initially hidden */
        }

        /* Overlay styles */
        .overlay {
        position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.0);
            display: none;
            justify-content: center;
            align-items: center;
            
        }
    </style>
</head>
<body>
    
    <div class="loader" id="loader"></div>
    <div class="overlay" id="overlay"></div>

    <!-- Navigation bar -->
    <div class="navbar">
        <a href="index.php">Sample Website</a>
        <!-- You can add more links here -->
    </div>

    <div class="container">
        <h3>User Registration</h3>
        <form method="POST" onsubmit="showLoader()">
            First Name: <input type="text" name="regfirstname" required> <br />
            Middle Name: <input type="text" name="regmiddlename" required> <br />
            Last Name: <input type="text" name="reglastname" required> <br />
            Email: <input type="email" name="regemail" required> <br />
            <input type="submit" name="register" value="Register">
        </form>

        <div>
            <p>Already have an account? <a href="index.php">Log in here</a>.</p>
      
        </div>
        <?php 
        if (isset($message)) {
            echo '<p class="red-text">' . $message . '</p>';
        }
        ?>
    </div>
  

    <script>
        // JavaScript to show/hide loader and overlay
        function showLoader() {
            document.getElementById('loader').style.display = 'flex';
            document.getElementById('overlay').style.display = 'block';
        }
    </script>
</body>
</html>
