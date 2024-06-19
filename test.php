<?php
include 'config.php';

$sql = "SELECT event_id, nama_acara, lokasi_acara, waktu, keterangan, deskripsi FROM event";
$result = mysqli_query($conn, $sql);

$events = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <!-- No CSS included as per your request -->
</head>

<body>
    <table>
        <?php foreach ($events as $index => $event): ?>
            <tr>
                <td><?php echo $index + 1; ?>.</td>
                <td><?php echo htmlspecialchars($event['nama_acara']); ?></td>
                <td><?php echo htmlspecialchars($event['lokasi_acara']); ?></td>
                <td><?php echo htmlspecialchars($event['waktu']); ?></td>
                <td><?php echo htmlspecialchars($event['keterangan']); ?></td>
                <td><?php echo htmlspecialchars($event['deskripsi']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>