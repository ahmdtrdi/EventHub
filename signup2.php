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
  $fullname = $_POST['fullname'];
  $birthdate = $_POST['birthdate'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];

  $sql = "UPDATE user SET nama_lengkap='$fullname', tanggal_lahir='$birthdate', jenis_kelamin='$gender', alamat='$address' WHERE email='{$_SESSION['email']}'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<script>alert('Informasi berhasil diperbarui!')</script>";
    unset($_SESSION['just_registered']); // Unset the just_registered session variable after successful update
    header("Location: homepageuser.html"); // Redirect to user homepage
    exit();
  } else {
    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./styles/signup2.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Sans:wght@400;700&display=swap" />
</head>

<body>
  <div class="sign-up2">
    <img class="gambar-1-icon" alt="" src="./Image/Login.jpg" />
    <a href="landingpage.html">
      <img class="left-icon" loading="lazy" alt="" src="./Image/back.png" />
    </a>
    <div class="sign-up2-inner">
      <div class="frame-parent">
        <div class="eventhub-wrapper">
          <b class="eventhub">EVENTHUB</b>
        </div>
        <div class="berikan-kami-beberapa-informas-parent">
          <h2 class="berikan-kami-beberapa">
            Berikan kami beberapa informasi tentang Anda
          </h2>
          <div class="frame-wrapper">
            <form action="signup2.php" method="post">
              <div class="frame-group">
                <div class="frame-container">
                  <div class="frame-div">
                    <div class="frame-wrapper1">
                      <div class="rectangle-parent">
                        <div class="frame-child"></div>
                        <input class="nama-lengkap" placeholder="Nama Lengkap" type="text" name="fullname" />
                      </div>
                    </div>
                    <div class="rectangle-group">
                      <div class="frame-item"></div>
                      <input class="tanggal-lahir" placeholder="Tanggal lahir" type="text" name="birthdate" />
                    </div>
                    <div class="rectangle-container">
                      <div class="frame-inner"></div>
                      <input class="jenis-kelamin" placeholder="Jenis Kelamin" type="text" name="gender" />
                    </div>
                    <div class="rectangle-group">
                      <div class="frame-item"></div>
                      <input class="alamat-tempat-tinggal" placeholder="Alamat Tempat Tinggal" type="text"
                        name="address" />
                    </div>
                  </div>
                </div>
                <div class="rectangle-parent1">
                  <button type="submit" name="submit" class="rectangle-parent1">Kirim</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>