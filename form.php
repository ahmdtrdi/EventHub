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

// Initialize variables to hold form data
$nama_lengkap = $email = $nomor_hp = $umur = $jenis_kelamin = $alamat = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $nomor_hp = mysqli_real_escape_string($conn, $_POST['nomor_hp']);
  $umur = mysqli_real_escape_string($conn, $_POST['umur']);
  $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);


  $insert_sql = "INSERT INTO registrasi (nama_lengkap, nomor_hp, umur, jenis_kelamin, alamat) 
                 VALUES ('$nama_lengkap','$nomor_hp', '$umur', '$jenis_kelamin', '$alamat')";

  if (mysqli_query($conn, $insert_sql)) {
    header("Location: berhasil.html");
    exit();
  } else {
    echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="./styles/form.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Sans:wght@400;700&display=swap" />
</head>

<body>
  <div class="formulir-pendaftaran">
    <div class="formulir-pendaftaran-inner">
      <div class="frame-parent">
        <div class="left-parent">
          <a href="acara2.html">
            <img class="left-icon" loading="lazy" alt="" src="./Image/back.png" />
          </a>

          <div class="formulir-pendaftaran-wrapper">
            <h1 class="formulir-pendaftaran1">FORMULIR PENDAFTARAN</h1>
          </div>
        </div>
        <div class="isi-data-diri-anda-pada-formul-wrapper">
          <p class="isi-data-diri">
            Isi data diri anda pada formulir pendaftaran dibawah ini
          </p>
        </div>
      </div>
    </div>
    <main class="rectangle-parent">
      <div class="frame-child"></div>
      <h1 class="konser-blackpink">Konser Blackpink</h1>
      <div class="frame-wrapper">
        <div class="frame-group">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="frame-container">
              <div class="frame-container">
                <div class="nama-lengkap-parent">
                  <b class="nama-lengkap">Nama Lengkap</b>
                  <input class="frame-item" name="nama_lengkap" placeholder="nama lengkap" type="text"
                    value="<?php echo $nama_lengkap; ?>" />
                </div>
                <div class="alamat-email-parent">
                  <b class="alamat-email">Alamat Email</b>
                  <input class="frame-inner" name="email" placeholder="email@gmail.com" type="text" />
                </div>
                <div class="nomor-hp-parent">
                  <b class="nomor-hp">Nomor HP</b>
                  <input class="frame-input" name="nomor_hp" placeholder="nomor telepon" type="text" />
                </div>
                <div class="umur-parent">
                  <b class="umur">Umur</b>
                  <input class="frame-child1" name="umur" placeholder="umur" type="text" />
                </div>
                <div class="frame-div">
                  <div class="jenis-kelamin-wrapper">
                    <b class="jenis-kelamin">Jenis Kelamin</b>
                  </div>
                  <input class="frame-child2" name="jenis_kelamin" placeholder="jenis kelamin" type="text" />
                </div>
                <div class="frame-parent1">
                  <div class="alamat-wrapper">
                    <b class="alamat">Alamat</b>
                  </div>
                  <input class="frame-child3" name="alamat" placeholder="alamat anda" type="text" />
                </div>
              </div>
              <div class="frame-wrapper1">
                <button class="vector-parent" onclick="redirectToSuccess()">
                  <img class="rectangle-icon" loading="lazy" alt="" src="./Image/button.png" />
                  <div class="daftar">Daftar</div>
                </button>
                <script>
                  function redirectToSuccess() {
                    window.location.href = 'berhasil.html';
                  }
                </script>
              </div>
            </div>
          </form>
        </div>
    </main>
  </div>
</body>

</html>