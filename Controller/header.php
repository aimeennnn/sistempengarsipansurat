<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>Arsip Surat</h1>
        <nav>
            <a href="/index.php">Home</a>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo '<a href="/views/add_letter.php">Tambah Surat</a>';
                echo '<a href="/logout.php">Logout (' . $_SESSION['username'] . ')</a>';
            } else {
                echo '<a href="/views/login.php">Login</a>';
                echo '<a href="/views/register.php">Register</a>';
            }
            ?>
        </nav>
    </header>
    <main>
