<?php
require_once './include/connect/dbcon.php';
require_once 'otp.php';
session_start();


$tokenAndTime = $_SESSION['tok'];
$tokenAndTimeArray = explode('-', $tokenAndTime);
$time = $tokenAndTimeArray[1];
$token  = $tokenAndTimeArray[0];

$tokenurl = $_GET['token'];
$expiration = $time+3600;
// echo $tokenurl;
// echo $time." ".$expiration." ".$token." ".$tokenurl;

if ($tokenurl === $token && $time<$expiration) {
if (isset($_GET['id'])) {
$id = $_GET['id'];

}else{
header("location:index.php");
}
  if(isset($_POST['reset'])){
    
    if (empty($_POST["new-password"]) || empty($_POST["confirm-password"])) {
      
      echo "All fields are required";
    }else{

      
    $newpass = $_POST['new-password'];
    $confpass = $_POST['confirm-password']; 

      if($newpass == $confpass){
        echo $confpass;
        $hashedpass = password_hash($confpass, PASSWORD_DEFAULT);
      $sql = "UPDATE user SET password = ? WHERE id = ?";
      $pdoResult = $pdoConnect->prepare($sql);
      $pdoResult->execute([$hashedpass,$id]);

      echo"pass updated.";
      header("location:index.php");
      exit();
      
          }else {
            echo"password did not match.";
          }

      }
    }
  
}else{
  echo "Link expired";
  unset($_SESSION['tok']);
 
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <link rel="stylesheet" type="text/css" href="./include/style/style.css">
  <link rel="icon" type="image/png" href="./include/img/logo.png">
  <style>
    .error {
      color: red;
      font-size: 0.8em;
    }
  </style>
</head>
<body>
  <!-- Navigation bar -->
  <div class="navbar">
  <a href="index.php">Sample Website</a>
       
        <!-- You can add more links here -->
    </div>



    
    <div class="container">
<h3>Reset Password</h3>

<form  method="post" >
  <label for="new-password">New Password:</label><br>
  <input type="password" id="new-password" name="new-password" ><br>
  <!-- <span id="new-password-error" class="error"></span><br><br> -->
  
  <label for="confirm-password">Confirm Password:</label><br>
  <input type="password" id="confirm-password" name="confirm-password" ><br>
  <!-- <span id="confirm-password-error" class="error"></span><br><br> -->
  
  <br><input type="submit" value="Reset Password" name="reset">
</form>
    </div>



</body>
</html>
