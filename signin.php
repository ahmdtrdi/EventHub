<?php
include 'config.php';
session_start();
 
if (isset($_SESSION['email'])) {
    header("Location: berhasil_login.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
 
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        header("Location: berhasil_login.php");
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./styles/signin.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Sans:wght@400;700&display=swap" />
</head>
<body>
  <div class="sign-in">
    <img class="gambar-1-icon" alt="" src="./Image/Login.jpg" />
    <a href="landingpage.html">
      <img class="left-icon" loading="lazy" alt="" src="./Image/back.png" />
    </a>
    <div class="sign-in-inner">
      <div class="frame-parent">
        <div class="eventhub-wrapper">
          <b class="eventhub">EVENTHUB</b>
        </div>
        <div class="frame-group">
          <div class="frame-wrapper">
            <div class="selamat-datang-kembali-parent">
              <h2 class="selamat-datang-kembali">Selamat datang kembali!</h2>
              <div class="masuk-untuk-melanjutkan">
                Masuk untuk melanjutkan
              </div>
            </div>
          </div>
          <div class="frame-container">
            <form class="group-form" action="homepageuser.html" method="GET">
              <div class="frame-div">
                <div class="rectangle-parent">
                  <div class="frame-child"></div>
                  <input class="alamat-email" placeholder="Alamat Email" type="text" size="30" />
                </div>
              </div>
              <div class="eyelashes-2d-parent">
                <img
                  class="eyelashes-2d-icon"
                  loading="lazy"
                  alt=""
                  src="./Image/Eyelashes 2D.png"
                  onclick="togglePasswordVisibility()"
                />
                <div class="rectangle-group">
                  <div class="frame-item"></div>
                  <input class="kata-sandi" placeholder="Kata Sandi" type="password" size="30" id="password" />
                </div>
              </div>
              <div class="frame-wrapper1">
                <a href="homepageuser.html" class="rectangle-container">
                  <div class="frame-inner"></div>
                  <span class="buat-akun">Masuk</span>
                </a>
              </div>
            </form>
          </div>

          <div class="frame-parent1">
            <div class="line-wrapper">
              <div class="line-div"></div>
            </div>
            <div class="atau-masuk-dengan-wrapper">
              <a href="signup1.php" class="atau-masuk-dengan">Belum mempunyai akun? Daftar</a>
            </div>
            <div class="line-container">
              <div class="frame-child1"></div>
            </div>
          </div>

          <!-- <div class="frame-parent1">
            <div class="line-wrapper">
              <div class="line-div"></div>
            </div>
            <div class="atau-masuk-dengan-wrapper">
              <div class="atau-masuk-dengan">Atau masuk dengan</div>
            </div>
            <div class="line-container">
              <div class="frame-child1"></div>
            </div>
          </div>

          <div class="frame-wrapper2">
            <div class="frame-parent2">
              <img
                class="group-icon"
                loading="lazy"
                alt=""
                src="./Image/google sign up button.png"
              />
              <img
                class="frame-child2"
                loading="lazy"
                alt=""
                src="./Image/Vector.png"
              />
            </div>
          </div> -->

        </div>
      </div>
    </div>
  </div>

  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById('password');
      var passwordIcon = document.querySelector('.eyelashes-2d-icon');
      var isVisible = passwordInput.type === 'text';
      passwordInput.type = isVisible ? 'password' : 'text';
      passwordIcon.src = isVisible ? './Image/Eyelashes 2D.png' : './Image/Eyelashes 2D open.png';
    }
  </script>
</body>
</html>
