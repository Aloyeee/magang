<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'dispendukcapil');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil pesan dari database
$sql = "SELECT * FROM chat_messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<strong>" . $row["sender"] . "</strong> "."<br>" .$row["message"] . "<br>";
    }
} else {
    echo "Belum ada pesan";
}

$conn->close();
?>
