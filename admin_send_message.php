<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'dispendukcapil');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari formulir
$sender = 'Admin'; // Nama sender diatur sebagai 'Admin'
$message = $_POST['message'];

// Masukkan pesan ke database
$sql = "INSERT INTO chat_messages (sender, message) VALUES ('$sender', '$message')";
if ($conn->query($sql) === TRUE) {
    echo "Pesan berhasil dikirim";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>