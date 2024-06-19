<?php
session_start();

include 'config.php';

if (!isset($_SESSION['email'])) {
  header('Location: signin.php');
  exit();
}

$sql = "SELECT event_id, nama_acara, lokasi_acara, waktu, keterangan, deskripsi FROM event";
$result = mysqli_query($conn, $sql);

$events = [];
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $events[] = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./styles/homepageadmin.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" />
  <title>Admin Dashboard - EventHub</title>
</head>

<body>
  <div class="homepage-admin">
    <b class="eventhub">EVENTHUB</b>
    <section class="frame-parent">
      <div class="gambar-1-wrapper">
        <div class="gambar-1"></div>
      </div>

      <div class="event-list-decoration">
        <table class="event-table">
          <thead>
            <tr>
              <th class="no">No</th>
              <th class="acara">Acara</th>
              <th class="jumlah-pendaftar">Jumlah Pendaftar</th>
              <th class="status-acara">Status Acara</th>
              <th class="tanggal-acara">Tanggal Acara</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($events as $index => $event): ?>
              <tr>
                <td class="event-details">1.</td>
                <td class="konser-blackpink">Konser Blackpink</td>
                <td class="orang">5 Orang</td>
                <td class="aktif">Aktif</td>
                <td class="juni-2024">17 Juni 2024</td>
              </tr>
              <tr>
                <td class="event-details1">2.</td>
                <td class="acara-mahasiswa">Acara Mahasiswa</td>
                <td class="orang1">6 Orang</td>
                <td class="aktif1">Aktif</td>
                <td class="juni-20241">18 Juni 2024</td>
              </tr>
              <tr>
                <td class="event-details2">3.</td>
                <td class="konser-coldplay">Konser Coldplay</td>
                <td class="orang2">7 Orang</td>
                <td class="aktif2">Aktif</td>
                <td class="juni-20242">19 Juni 2024</td>
              </tr>
              <tr>
                <td class="event-details3">4.</td>
                <td class="expo-university">EXPO University</td>
                <td class="orang3">8 Orang</td>
                <td class="aktif3">Aktif</td>
                <td class="juni-20243">20 Juni 2024</td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <button class="rectangle-parent" onclick="location.href='mendatangadmin.html'">
          <div class="frame-child"></div>
          <div class="atur-acara">Atur Acara</div>
        </button>
      </div>

      <!-- <div class="event-list-decoration"></div>
      <b class="no">No</b>
      <b class="acara">Acara</b>
      <b class="jumlah-pendaftar">Jumlah Pendaftar</b>
      <b class="status-acara">Status Acara</b>
      <b class="tanggal-acara">Tanggal Acara</b>

      <table class="event-table">
        <tr>
          <td class="event-details">1.</td>
          <td class="konser-blackpink">Konser Blackpink</td>
          <td class="orang">5 Orang</td>
          <td class="aktif">Aktif</td>
          <td class="juni-2024">17 Juni 2024</td>
        </tr>
        <tr>
          <td class="event-details1">2.</td>
          <td class="acara-mahasiswa">Acara Mahasiswa</td>
          <td class="orang1">6 Orang</td>
          <td class="aktif1">Aktif</td>
          <td class="juni-20241">18 Juni 2024</td>
        </tr>
        <tr>
          <td class="event-details2">3.</td>
          <td class="konser-coldplay">Konser Coldplay</td>
          <td class="orang2">7 Orang</td>
          <td class="aktif2">Aktif</td>
          <td class="juni-20242">19 Juni 2024</td>
        </tr>
        <tr>
          <td class="event-details3">4.</td>
          <td class="expo-university">EXPO University</td>
          <td class="orang3">8 Orang</td>
          <td class="aktif3">Aktif</td>
          <td class="juni-20243">20 Juni 2024</td>
        </tr>
      </table> -->

      <div class="acara-mendatang-parent">
        <h2 class="acara-mendatang">Acara Mendatang</h2>
        <h2 class="atur-dan-tambah">Atur dan tambah semua acara yang akan datang!</h2>
      </div>
      <!-- <button class="rectangle-parent" onclick="location.href='mendatangadmin.html'">
        <div class="frame-child"></div>
        <div class="atur-acara">Atur Acara</div>
      </button> -->
      <h3 class="tabel-statistik-acara">TABEL STATISTIK ACARA</h3>
    </section>
    <section class="judul-parent">
      <div class="judul">
        <h1 class="dashboard-admin-eventhub">DASHBOARD ADMIN EVENTHUB</h1>
        <h2 class="pantau-dan-kelola">Pantau dan Kelola Semua Acara dengan Mudah</h2>
      </div>
      <div class="header">
        <button class="eventhub1">EVENTHUB</button>
        <a href="profile.php">
          <button class="profil">PROFIL</button>
        </a>
        <button class="beranda">BERANDA</button>
      </div>
      <img class="frame-item" alt="Image 2" src="./Image/2.png" />
      <img class="frame-inner" loading="lazy" alt="Image 3" src="./Image/3.png" />
      <img class="rectangle-icon" alt="Image 1" src="./Image/1.png" />
      <div class="header-decoration"></div>
      <b class="eventhub2">EventHub</b>
    </section>
  </div>
</body>

</html>