<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logout Confirmation</title>
  <style>
    /* Styles for the modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 40%;
      text-align: center;
    }

    .close {
      float: right;
      cursor: pointer;
    }

    /* Additional styling for buttons */
    button {
      padding: 10px 20px;
      margin: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <button id="logoutBtn">Logout</button>

  <div id="logoutModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Log Out?</h2>
      <p>Are you sure you want to log out?</p>
      <button id="confirmBtn">Confirm</button>
      <button id="cancelBtn">Cancel</button>
    </div>
  </div>

  <script>
    document.getElementById('logoutBtn').addEventListener('click', function() {
      document.getElementById('logoutModal').style.display = 'block';
    });

    document.querySelector('.close').addEventListener('click', function() {
      document.getElementById('logoutModal').style.display = 'none';
    });

    document.getElementById('cancelBtn').addEventListener('click', function() {
      document.getElementById('logoutModal').style.display = 'none';
    });

    document.getElementById('confirmBtn').addEventListener('click', function() {
      // Redirect to logout PHP script or perform logout actions here
      // For example, redirecting to a PHP logout script
      window.location.href = 'logout.php';
    });
  </script>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform logout actions here, for example:
    // Destroy session, clear cookies, etc.
    // Redirect to login page after logout
    header('Location: login.php');
    exit();
  }
  ?>
</body>
</html>
