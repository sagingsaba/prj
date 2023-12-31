<?php
session_start();

require_once './include/connect/dbcon.php';
require_once 'otp.php';

$message = ''; // Initialize $message variable
$showPopup = false; // Initialize $showPopup variable

try {
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['reset'])) {
        if (empty($_POST["email"])) {
            $message = 'enter your email';
        } else {
            $email = $_POST['email'];
            $result = selectuser($pdoConnect, $email);
            $count = $result['count'];

            if ($count > 0) {
                $row = $result['row'];
                $fname = $row['firstname'];
                $id = $row['id'];
                forgotpass($email, $fname, $id);
                $showPopup = true; // Set the flag to display the success popup
            } else {
                $message = '<span style="color: red;">Invalid email, make sure you are already registered.</span>';

            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage(); // Assigning error message to $message variable
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

<div class="navbar">
    <a href="index.php">Sample Website</a>
</div>

<div class="loader" id="loader"></div>
    <div class="overlay" id="overlay"></div>


<div class="container">
    <h3>Forgot Password</h3>
    <form id="emailForm" method="POST" onsubmit="showLoader(); ">
        <label for="email">Enter Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Submit" id="submitButton" name="reset">
        <span id="timer" style="display: none;"></span>
    </form>
    <p id="statusMessage"><?php echo $message; ?></p> <!-- Displaying PHP error message -->
</div>

<div class="overlay" id="overlay">
    <div class="loader"></div>
</div>

<?php if ($showPopup) { ?>
    <div class="overlaypop" id="overlaypop"></div>
<div class="popup" id="popup">
    <img src="./include/img/404-tick.png">
    <h3>Success!</h3>
    <p>Please check your email. Thanks!</p>
    <button type="button" onclick="closePopup()">OK</button>
</div>

<?php } ?>
<script>

       // JavaScript to show/hide loader and overlay
       function showLoader() {
            document.getElementById('loader').style.display = 'flex';
            document.getElementById('overlay').style.display = 'block';
        }
    // Function to show/hide the overlay
    function toggleOverlay() {
        const overlay = document.getElementById("overlay");
        overlay.classList.toggle("show");
    }

    function openPopup() {
    document.getElementById("overlaypop").style.display = "block";
    document.getElementById("popup").classList.add("open-popup");
}

function closePopup() {
    document.getElementById("overlaypop").style.display = "none";
    document.getElementById("popup").classList.remove("open-popup");
}


    // Add an event listener to the form submission
    const form = document.getElementById("emailForm");
    form.addEventListener("submit", function (event) {
        toggleOverlay(); // Show the overlay when the form is submitted
        document.getElementById("overlay").classList.add("show");
    });

    // Call openPopup function if PHP condition is met
    <?php if ($showPopup) { ?>
    openPopup();
    <?php } ?>


// timer function bat di lumilitaw?

// function submitForm(event) {
//       event.preventDefault();
//       var email = document.getElementById("email").value;

//       var submitButton = document.getElementById("submitButton");
//       var timer = document.getElementById("timer");
//       var statusMessage = document.getElementById("statusMessage");

//       submitButton.disabled = true; // Disable the submit button
//       submitButton.style.display = 'none';
//       timer.style.display = 'inline';

//       var timeLeft = 30;
//       var countdown = setInterval(function() {
//         timer.textContent = "OTP expires in " + timeLeft + " seconds";
//         timeLeft--;

//         if (timeLeft < 0) {
//           clearInterval(countdown);
//           submitButton.disabled = false; // Enable the submit button
//           submitButton.style.display = 'inline';
//           statusMessage.textContent = 'OTP has expired';
//           statusMessage.style.display = 'block';
//           timer.style.display = 'none';
//         }
//       }, 1000); // Update every second
//     }
  </script>
</body>
</html>
