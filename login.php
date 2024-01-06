<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
     body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(to right, #2C3E50, #3498DB);
    }

    #loginForm {
      max-width: 400px;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      animation: fadeInUp 1s ease-in-out;
    }

    #loginForm h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #34495e;
    }

    #loginForm button {
      background-color: #3498db;
      border: none;
      animation: pulse 2s infinite;
    }

    /* Customize the success and error toasts */
    .toast-success {
      background-color: #2ecc71;
    }

    .toast-error {
      background-color: #e74c3c;
    }

    .toast-body {
      color: #fff;
    }

    /* Additional Styling for Fun */
    .form-control {
      border-radius: 20px;
    }

    .btn-primary {
      border-radius: 20px;
    }

    /* Keyframe Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
      100% {
        transform: scale(1);
      }
    }
    </style>

</head>

<body>


<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-4">
      <form id="loginForm" action="chkloginhash.php" method="post">
        <h2>Login</h2>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="m_username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="m_password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
    </div>
  </div>
</div>


 <!-- Custom JavaScript -->
<script>


  function showNotification(message, toastClass) {
    var toast = new bootstrap.Toast(document.getElementById('notificationToast'));
    var toastBody = document.getElementById('notificationToastBody');
    toastBody.innerHTML = message;
    toastBody.className = 'toast-body ' + toastClass;
    toast.show();
  }

  function hashPassword(password) {
    // In a real-world scenario, use a stronger hashing algorithm like bcrypt
    // This is a simple example using MD5 (not recommended for production)
    return md5(password);
  }

  // MD5 hashing function (for demonstration purposes only)
  function md5(str) {
    var hash = CryptoJS.MD5(str);
    return hash.toString(CryptoJS.enc.Hex);
  }
</script>

<!-- CryptoJS library for MD5 hashing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>

<!-- Toasts for Success and Error Messages -->
<div class="position-fixed bottom-0 end-0 p-3">
  <div id="notificationToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Notification</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div id="notificationToastBody" class="toast-body">
      <!-- Toast Body Content -->
    </div>
  </div>
</div>

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
</body>


</html>