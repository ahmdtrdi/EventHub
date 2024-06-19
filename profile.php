<?php
session_start();

include 'config.php';

if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM user WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
  }
}

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
  $_SESSION = array();

  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      '',
      time() - 42000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );
  }

  session_destroy();

  header("Location: signin.php");
  exit();
}


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="./styles/profile.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Sans:wght@400;700&display=swap" />
</head>

<body>
  <div class="profil-pengguna1">
    <header class="eventhub-parent">
      <a class="eventhub">EVENTHUB</a>
      <nav class="beranda-parent">
        <!-- <button class="beranda" onclick="window.location.href = 'homepageuser.html';">BERANDA</button> -->
        <form class="beranda" method="POST" action="redirectberanda.php">
          <input type="submit" name="beranda" value="BERANDA">
        </form>
        <button class="tentang" onclick="window.location.href = 'about.html';">TENTANG</button>
        <button class="acara" onclick="window.location.href = 'acara.html';">ACARA</button>
      </nav>
      <b class="profil">PROFIL</b>
    </header>
    <section class="frame-parent">
      <div class="frame-wrapper">
        <div class="frame-group">
          <div class="profile-picture-wrapper">
            <img class="profile-picture-icon" loading="lazy" alt="" src="./Image/user.png" />
          </div>
          <div class="frame-container">
            <div class="edit-profil-wrapper">
              <button class="edit-profil" onclick="window.location.href = 'profile2.php';">Edit Profil</button>
            </div>
            <h1 class="delon-jutan"><?php echo $user['nama_lengkap'] ?></h1>
          </div>
        </div>
      </div>
      <div class="frame-div">
        <div class="frame-wrapper1">
          <div class="jl-kembang-no20-parent">
            <h2 class="jl-kembang-no20"><?php echo $user['alamat'] ?></h2>
            <div class="juni-2005-parent">
              <div class="juni-2005"><?php echo $user['tanggal_lahir'] ?></div>
              <div class="address-month"><?php echo $user['jenis_kelamin'] ?></div>
            </div>
          </div>
        </div>
        <div class="delonjutangmailcom">
          <h2 class="delonjutangmailcom1"><?php echo $user['email'] ?></h2>
        </div>
      </div>
    </section>
    <div class="footer-wrapper">
      <a href="profile.php?logout=1"><b class="footer">LOGOUT</b></a>
    </div>
  </div>
</body>