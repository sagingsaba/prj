<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  
  <div class="container">
    <h3>Forgot Password</h3>
    <form id="emailForm" method="POST" onsubmit="submitForm(event)">
        <label for="email">Enter Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Submit" id="submitButton" name="reset">
        <span id="timer" style="display: none;"></span>
    </form>
    <p id="statusMessage"></p>
  </div>

  <script>
    function submitForm(event) {
      event.preventDefault();
      var email = document.getElementById("email").value;

      var submitButton = document.getElementById("submitButton");
      var timer = document.getElementById("timer");
      var statusMessage = document.getElementById("statusMessage");

      submitButton.disabled = true; // Disable the submit button
      submitButton.style.display = 'none';
      timer.style.display = 'inline';

      var timeLeft = 2;
      var countdown = setInterval(function() {
        timer.textContent = "OTP expires in " + timeLeft + " seconds";
        timeLeft--;

        if (timeLeft < 0) {
          clearInterval(countdown);
          submitButton.disabled = false; // Enable the submit button
          submitButton.style.display = 'inline';
          statusMessage.textContent = 'OTP has expired';
          statusMessage.style.display = 'block';
          timer.style.display = 'none';
        }
      }, 1000); // Update every second
    }
  </script>
</body>
</html>
