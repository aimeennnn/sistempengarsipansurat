<?php
include '../db/database.php';
include '../includes/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: /views/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $sender_id = $_SESSION['user_id'];

    $sql = "INSERT INTO letters (title, content, date, type, sender_id) VALUES ('$title', '$content', '$date', '$type', '$sender_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Surat berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<h2>Tambah Surat</h2>
<form action="add_letter.php" method="post">
    <label for="title">Judul:</label>
    <input type="text" id="title" name="title" required><br>
    <label for="content">Isi Surat:</label>
    <textarea id="content" name="content" required></textarea><br>
    <label for="date">Tanggal:</label>
    <input type="date" id="date" name="date" required><br>
    <label for="type">Jenis:</label>
    <select id="type" name="type" required>
        <option value="masuk">Masuk</option>
        <option value="keluar">Keluar</option>
        <option value="disposisi">Disposisi</option>
    </select><br>
    <input type="submit" value="Tambah Surat">
</form>

<?php include '../includes/footer.php'; ?>
