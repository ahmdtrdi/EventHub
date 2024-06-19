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

// Handle form submission to update profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Fetch new profile data from the form
  $new_nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
  $new_alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $new_tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
  $new_jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
  $user_id = $user['user_id']; // Fetch user_id from session or hidden input field in form

  // Update the user's profile data in the database
  $update_sql = "UPDATE user SET 
                 nama_lengkap='$new_nama_lengkap', 
                 alamat='$new_alamat', 
                 tanggal_lahir='$new_tanggal_lahir', 
                 jenis_kelamin='$new_jenis_kelamin' 
                 WHERE user_id=$user_id";

  if (mysqli_query($conn, $update_sql)) {
    // Update successful
    $success_message = "Profile updated successfully.";
    // Optionally, fetch updated user data to display
    $sql = "SELECT * FROM user WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
    }
  } else {
    echo "Error updating profile: " . mysqli_error($conn);
  }
}



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./styles/profile2.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" />
</head>
<div class="profil-pengguna2">
  <a href="profile.php">
    <img class="left-icon" loading="lazy" alt="Back" src="./Image/back.png" />
  </a>
  <section class="profil-pengguna2-inner">
    <nav class="frame-parent">
      <section class="frame-wrapper">
        <div class="ellipse-parent">
          <img class="frame-child" loading="lazy" alt="" src="./Image/user.png" />
          <!-- <img class="unsplash-icon" alt="" src="./Image/CAM.png" /> -->
        </div>
      </section>
      <section class="frame-group">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="nama-parent">
            <b class="nama">Nama</b>
            <input class="frame-item" name="nama_lengkap" value="<?php echo $user['nama_lengkap']; ?>" type="text" />
          </div>
          <div class="email-parent">
            <b class="email">Email</b>
            <div class="rectangle-parent">
              <div class="frame-inner"></div>
              <input class="delonjutangmailcom" name="email" value="<?php echo $user['email']; ?>" type="text" />
            </div>
          </div>
          <div class="alamat-parent">
            <b class="alamat">Alamat</b>
            <div class="rectangle-group">
              <div class="rectangle-div"></div>
              <input class="jl-podigon-no" name="alamat" value="<?php echo $user['alamat']; ?>" type="text" />
            </div>
          </div>
          <div class="tanggal-lahir-parent">
            <b class="tanggal-lahir">Tanggal Lahir</b>
            <div class="rectangle-container">
              <div class="frame-child1"></div>
              <input class="juli-1997" name="tanggal_lahir" value="<?php echo $user['tanggal_lahir']; ?>" type="text" />
            </div>
          </div>
          <div class="frame-container">
            <div class="nomor-telepon-wrapper">
              <b class="nomor-telepon">Jenis Kelamin</b>
            </div>
            <div class="frame-div">
              <div class="frame-child2"></div>
              <input class="input" name="jenis_kelamin" value="<?php echo $user['jenis_kelamin']; ?>" type="text" />
            </div>
          </div>
          <div class="profil-pengguna2-child">
            <button class="frame-button" onclick="showPopup()" type="submit">
              <div class="frame-child3"></div>
              <b class="simpan">Simpan</b>
            </button>
          </div>
        </form>
      </section>
      </div>
    </nav>
  </section>
  </div>

  <!-- Popup -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <span class="close" onclick="hidePopup()">&times;</span>
      <p>Perubahan telah disimpan</p>
    </div>
  </div>

  <script>
    function showPopup() {
      document.getElementById('popup').style.display = 'block';
    }

    function hidePopup() {
      document.getElementById('popup').style.display = 'none';
    }

    // // Hide popup after 3 seconds
    // function autoHidePopup() {
    //   setTimeout(hidePopup, 5000);
    // }

    // // Modify showPopup to include auto hide
    // function showPopup() {
    //   document.getElementById('popup').style.display = 'block';
    //   autoHidePopup();
    // }
  </script>
  </body>

</html>