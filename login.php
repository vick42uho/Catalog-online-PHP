<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="./fontawesome/css/brands.css">
  <link rel="stylesheet" href="./fontawesome/css/solid.css">

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

   


.container {
    justify-content: center;
    align-items: center;
    overflow: hidden;
    position: relative;
}

svg {
    animation: moveLeftRight 30s linear infinite alternate;
    position: absolute;
}

@keyframes moveLeftRight {
    from {
        transform: translateX(-10%);
    }
    to {
        transform: translateX(225%);
    }
}

  </style>

</head>

<body>


  <div>
    <svg xmlns="http://www.w3.org/2000/svg" height="450" width="450" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
      <path fill="#0401ad" d="M388.3 104.1a4.7 4.7 0 0 0 -4.4-4c-2 0-37.2-.8-37.2-.8s-21.6-20.8-29.6-28.8V503.2L442.8 472S388.7 106.5 388.3 104.1zM288.7 70.5a116.7 116.7 0 0 0 -7.2-17.6C271 32.9 255.4 22 237 22a15 15 0 0 0 -4 .4c-.4-.8-1.2-1.2-1.6-2C223.4 11.6 213 7.6 200.6 8c-24 .8-48 18-67.3 48.8-13.6 21.6-24 48.8-26.8 70.1-27.6 8.4-46.8 14.4-47.2 14.8-14 4.4-14.4 4.8-16 18-1.2 10-38 291.8-38 291.8L307.9 504V65.7a41.7 41.7 0 0 0 -4.4 .4S297.9 67.7 288.7 70.5zM233.4 87.7c-16 4.8-33.6 10.4-50.8 15.6 4.8-18.8 14.4-37.6 25.6-50 4.4-4.4 10.4-9.6 17.2-12.8C232.2 54.9 233.8 74.5 233.4 87.7zM200.6 24.4A27.5 27.5 0 0 1 215 28c-6.4 3.2-12.8 8.4-18.8 14.4-15.2 16.4-26.8 42-31.6 66.5-14.4 4.4-28.8 8.8-42 12.8C131.3 83.3 163.8 25.2 200.6 24.4zM154.2 244.6c1.6 25.6 69.3 31.2 73.3 91.7 2.8 47.6-25.2 80.1-65.7 82.5-48.8 3.2-75.7-25.6-75.7-25.6l10.4-44s26.8 20.4 48.4 18.8c14-.8 19.2-12.4 18.8-20.4-2-33.6-57.2-31.6-60.8-86.9-3.2-46.4 27.2-93.3 94.5-97.7 26-1.6 39.2 4.8 39.2 4.8L221.4 225.4s-17.2-8-37.6-6.4C154.2 221 153.8 239.8 154.2 244.6zM249.4 82.9c0-12-1.6-29.2-7.2-43.6 18.4 3.6 27.2 24 31.2 36.4Q262.6 78.7 249.4 82.9z" />
    </svg>
  </div>





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

          <button type="submit" class="btn btn-primary btn-block">Login<i class="fa-brands fa-shopify"></i></button>
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

  <script src="./fontawesome/js/fontawesome.js"></script>
  <script src="./fontawesome/js/brands.js"></script>
  <script src="./fontawesome/js/solid.js"></script>

  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/bootstrap.bundle.js"></script>
</body>


</html>