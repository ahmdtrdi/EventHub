<?php
include 'config.php';
session_start();

if (isset($_SESSION['email']) && !isset($_SESSION['just_registered'])) {
  if ($_SESSION['role'] == 'admin') {
    header("Location: homepageadmin.php"); // Redirect to admin dashboard
  } else {
    header("Location: homepageuser.html"); // Redirect to user dashboard
  }
  exit();
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
  $cpassword = hash('sha256', $_POST['cpassword']); // Hash the input confirm password using SHA-256

  if ($password == $cpassword) {
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO user (email, password, role)
                    VALUES ('$email', '$password', 'user')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $_SESSION['email'] = $email; // Store email in session
        $_SESSION['role'] = 'user'; // Store role in session
        $_SESSION['just_registered'] = true; // Store just_registered in session
        header("Location: signup2.php"); // Redirect to signup2.php
        exit();
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./styles/signup1.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Sans:wght@400;700&display=swap" />
</head>

<body>
  <div class="sign-up1">
    <img class="gambar-1-icon" alt="" src="./Image/Login.jpg" />
    <a href="landingpage.html">
      <img class="left-icon" loading="lazy" alt="" src="./Image/back.png" />
    </a>
    <div class="sign-up-content-wrapper">
      <div class="sign-up-content">
        <div class="event-hub">
          <b class="eventhub">EVENTHUB</b>
        </div>
        <div class="sign-up-form">
          <div class="description">
            <div class="ingin-bergabung-parent">
              <h2 class="ingin-bergabung">Ingin bergabung?</h2>
              <div class="bergabunglah-dengan-kami">
                Bergabunglah dengan kami dengan membuat akun
              </div>
            </div>
          </div>

          <form action="signup1.php" method="post">
            <div class="email-field">
              <div class="rectangle-parent">
                <div class="frame-child"></div>
                <input class="alamat-email" placeholder="Alamat Email" type="text" name="email" />
              </div>
            </div>
            <div class="password-field">
              <div class="rectangle-group">
                <div class="frame-item"></div>
                <input class="kata-sandi" placeholder="Kata Sandi" type="password" id="password" name="password" />
                <div class="password-icon">
                  <img class="eyelashes-2d-icon" alt="" src="./Image/Eyelashes 2D.png"
                    onclick="togglePasswordVisibility('password', 'eyelashes-2d-icon')" />
                </div>
              </div>
            </div>
            <div class="confirm-password-field">
              <div class="rectangle-container">
                <div class="frame-inner"></div>
                <input class="konfirmasi-kata-sandi" placeholder="Konfirmasi Kata Sandi" type="password"
                  id="confirm-password" name="cpassword" />
                <img class="eyelashes-2d-icon1" alt="" src="./Image/Eyelashes 2D.png"
                  onclick="togglePasswordVisibility('confirm-password', 'eyelashes-2d-icon1')" />
              </div>
            </div>

            <div class="create-account-button">
              <button type="submit" name="submit" class="group-div">Buat Akun</button>
              <!-- <div class="group-div">
                <div class="rectangle-div"></div>
                <button type="submit" name="submit" class="buat-akun">Buat Akun</button>
              </div> -->
            </div>
          </form>

          <div class="divider">
            <div class="divider-inner">
              <div class="line-div"></div>
            </div>
            <div class="alternative-login">
              <a href="signin.php" class="atau-daftar-dengan">Sudah mempunyai akun? Masuk</a>
            </div>
            <div class="divider-child">
              <div class="frame-child1"></div>
            </div>
          </div>

          <!-- <div class="divider-parent">
            <div class="divider">
              <div class="divider-inner">
                <div class="line-div"></div>
              </div>
              <div class="alternative-login">
                <div class="atau-daftar-dengan">Atau daftar dengan</div>
              </div>
              <div class="divider-child">
                <div class="frame-child1"></div>
              </div>
            </div>
            <div class="social-login">
              <div class="social-login-buttons">
                <img class="social-login-buttons-child" loading="lazy" alt="" src="./Image/google sign up button.png" />
                <img class="social-login-buttons-item" loading="lazy" alt="" src="./Image/Vector.png" />
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </div>
  </div>

  <script>
    function togglePasswordVisibility(inputId, iconClass) {
      var passwordInput = document.getElementById(inputId);
      var isVisible = passwordInput.type === "text";
      passwordInput.type = isVisible ? "password" : "text";
    }
  </script>
</body>

</html>