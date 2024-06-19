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

$nama_acara = $lokasi_acara = $waktu = $keterangan = $deskripsi = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_acara = mysqli_real_escape_string($conn, $_POST['nama_acara']);
  $lokasi_acara = mysqli_real_escape_string($conn, $_POST['lokasi_acara']);
  $waktu = mysqli_real_escape_string($conn, $_POST['waktu']);
  $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
  $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

  $insert_sql = "INSERT INTO event (nama_acara, lokasi_acara, waktu, keterangan, deskripsi) 
                 VALUES ('$nama_acara', '$lokasi_acara', '$waktu', '$keterangan', '$deskripsi')";

  if (mysqli_query($conn, $insert_sql)) {
    echo "<script>alert('Event added successfully!'); window.location.href='mendatangadmin.html';</script>";
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

  <link rel="stylesheet" href="./styles/tambahadmin.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Sans:wght@400;500;700&display=swap" />
</head>

<body>
  <div class="tambah-acara">
    <div class="left-parent">
      <button onclick="location.href='mendatangadmin.html'" style="border: none; background: none; padding: 0;">
        <img class="left-icon" alt="Navigate" src="./Image/back.png" />
      </button>
      <div class="tambahkan-acara-wrapper">
        <h1 class="tambahkan-acara">TAMBAHKAN ACARA</h1>
      </div>
    </div>
    <main class="event-form-wrapper-wrapper">
      <section class="event-form-wrapper">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="rectangle-parent">
          <div class="frame-child"></div>
          <div class="event-form-title">
            <h3 class="formulir-pembuatan-acara">FORMULIR PEMBUATAN ACARA</h3>
          </div>
          <div class="event-input-fields">
            <h2 class="nama-acara">Nama Acara</h2>
            <input class="event-input-fields-child" name="nama_acara" placeholder="Masukkan nama acara yang akan datang" type="text" />

            <h2 class="lokasi-acara">Lokasi Acara</h2>
            <input class="event-input-fields-item" name="lokasi_acara" placeholder="Masukkan lokasi acara yang akan datang" type="text" />

            <h2 class="waktu-acara">Waktu Acara</h2>
            <input class="event-input-fields-inner" name="waktu" placeholder="Masukkan waktu acara yang akan datang" type="text" />

            <h2 class="keterangan-acara">Keterangan Acara</h2>
            <input class="frame-input" name="keterangan" placeholder="Masukkan keterangan tambahan untuk acara yang akan datang"
              type="text" />

            <h2 class="deskripsi-acara">Deskripsi Acara</h2>
            <input class="event-input-fields-child1" name="deskripsi" placeholder="Masukkan deskripsi tentang acara yang akan datang"
              type="text" />
          </div>
        </div>
        <div class="registration-form-buttons-wrapper">
          <div class="registration-form-buttons">
            <div class="add-registration-form-button">
              <h1 class="tambahkan-formulir-pendaftaran">
                TAMBAHKAN FORMULIR PENDAFTARAN
              </h1>
            </div>
            <div class="reorder-registration-form-butt">
              <div class="reorder-registration-form-butt-child"></div>
              <div class="atur-ulang-formulir-pendaftara-wrapper">
                <h1 class="atur-ulang-formulir">
                  Atur Ulang Formulir Pendaftaran
                </h1>
              </div>
              <div class="registration-form-table">
                <div class="table-header">
                  <div class="table-header-row">
                    <div class="horizontal-separator"></div>
                    <div class="table-header-content">
                      <div class="table-header-cells">
                        <div class="table-header-cell">
                          <div class="vertical-separator"></div>
                          <div class="question-header">
                            <div class="question-header-content">
                              <b class="no">No</b>
                              <div class="daftar-pertanyaan-wrapper">
                                <b class="daftar-pertanyaan">Daftar Pertanyaan</b>
                              </div>
                              <div class="table-content-separator"></div>
                            </div>
                          </div>
                        </div>
                        <div class="registration-form-fields">
                          <div class="field-row">
                            <div class="field-content">
                              <div class="field-separator"></div>
                              <div class="full-name-field">
                                <div class="full-name-input">
                                  <div class="full-name-placeholder">1.</div>
                                  <div class="nama-lengkap">Nama Lengkap</div>
                                </div>
                              </div>
                            </div>
                            <div class="field-separator1"></div>
                          </div>
                          <div class="email-field">
                            <div class="email-input">
                              <div class="email-placeholder">
                                <div class="email-placeholder1">2.</div>
                                <div class="alamat-email">Alamat Email</div>
                              </div>
                            </div>
                            <div class="field-separator2"></div>
                          </div>
                          <div class="phone-number-field">
                            <div class="phone-number-input">
                              <div class="phone-number-placeholder">3.</div>
                              <div class="nomor-hp">Nomor HP</div>
                            </div>
                          </div>
                        </div>
                        <div class="additional-fields">
                          <div class="age-field">
                            <div class="age-input">
                              <div class="age-separator"></div>
                              <div class="age-input-wrapper">
                                <div class="age-placeholder">
                                  <div class="age-placeholder1">4.</div>
                                  <div class="umur">Umur</div>
                                </div>
                              </div>
                            </div>
                            <div class="age-field-separator"></div>
                          </div>
                          <div class="gender-and-address">
                            <div class="gender-and-address-input">
                              <div class="gender-and-address-placeholder">
                                <div class="placeholder">5.</div>
                                <div class="jenis-kelamin">Jenis Kelamin</div>
                              </div>
                            </div>
                            <div class="gender-and-address-separator"></div>
                          </div>
                          <div class="gender-and-address1">
                            <div class="gender-and-address-inner">
                              <div class="parent">
                                <div class="div">6.</div>
                                <div class="alamat">Alamat</div>
                              </div>
                            </div>
                            <div class="gender-and-address-child"></div>
                          </div>
                        </div>
                      </div>
                      <h2 class="tambah-pertanyaan">Tambah Pertanyaan</h2>
                    </div>
                  </div>
                  <div class="event-description">
                    <div class="event-description-child"></div>
                    <input class="masukkan-deskripsi-tentang"
                      placeholder="Masukkan deskripsi tentang acara yang akan datang" type="text" />

                    <div class="event-description-inner">
                      <button class="button-image">
                        <img class="frame-item" loading="lazy" alt="Enter" src="./Image/enter.png" />
                      </button>
                    </div>
                  </div>
                </div>
                <div class="registration-form-table-child"></div>
              </div>
            </div>
            <div class="add-event-button-wrapper">
              <button class="rectangle-group">
                <div class="frame-inner"></div>
                <h2 class="tambah">Tambah</h2>
              </button>
            </div>
            <div class="app-title">
              <b class="eventhub">EVENTHUB</b>
            </div>
          </div>
        </div>
        </form>
      </section>
    </main>
  </div>
</body>

</html>