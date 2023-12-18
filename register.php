<?php
session_start();

require_once './include/connect/dbcon.php';
require_once 'otp.php';


//condition if transfer data from html  to variable
if (isset($_POST['register'])) {
    $firstname = htmlspecialchars(trim($_POST['regfirstname'] ?? ''));
    $middlename = htmlspecialchars(trim($_POST['regmiddlename'] ?? ''));
    $lastname = htmlspecialchars(trim($_POST['reglastname'] ?? ''));
    $email = htmlspecialchars(trim($_POST['regemail'] ?? ''));

    // Check if email already exists
    $checkQuery = "SELECT email FROM `user` WHERE `email` = ?";
    $checkResult = $pdoConnect->prepare($checkQuery);
    $checkResult->execute([$email]);
    $existingUser = $checkResult->fetch(PDO::FETCH_ASSOC);
    
    if ($existingUser) {
        echo "<label>Email has been taken.</label>";
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
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PRJ</title>
    <link rel="stylesheet" type="text/css" href="./include/style/style.css">

</head>
<body>
    
  <!-- Navigation bar -->
  <div class="navbar">
        <a href="index.php">Sample Website</a>
       
        <!-- You can add more links here -->
    </div>


    <div class="container">
        <h3>User Registration</h3>
        <form method="POST" onsubmit="showLoading()">
            First Name: <input type="text" name="regfirstname" required> <br />
            Middle Name: <input type="text" name="regmiddlename" required> <br />
            Last Name: <input type="text" name="reglastname" required> <br />
            Email: <input type="email" name="regemail" required> <br />
            <!-- Password: <input type="password" name="regpassword" required> <br /> -->
            <input type="submit" name="register" value="Register">
        </form>
        <div>
            <log_in>Already have an account? <a href="index.php">Log in here</a>.</log_in>
        </div>
    </div>

