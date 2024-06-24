<?php
include 'db/database.php';
include 'includes/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: /views/login.php");
    exit;
}

echo "<h2>Daftar Surat</h2>";

echo "<table>";
echo "<tr><th>ID</th><th>Judul</th><th>Tanggal</th><th>Jenis</th><th>Status</th><th>Aksi</th></tr>";

$sql = "SELECT * FROM letters";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td><a href='/views/update_status.php?id=" . $row["id"] . "'>Ubah Status</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada surat</td></tr>";
}
echo "</table>";

include 'includes/footer.php';
