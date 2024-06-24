<?php
include '../db/database.php';
include '../includes/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: /views/login.php");
    exit;
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];

    $sql = "UPDATE letters SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Status surat berhasil diperbarui";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<h2>Ubah Status Surat</h2>
<form action="update_status.php?id=<?php echo $id; ?>" method="post">
    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="belum diterima">Belum Diterima</option>
        <option value="diterima">Diterima</option>
    </select><br>
    <input type="submit" value="Ubah Status">
</form>

<?php include '../includes/footer.php'; ?>
