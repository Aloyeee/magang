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
        if($row["sender"] =="Admin"){
            echo "<div link rel='stylesheet' href='CSS/style.css' class='chatl'>"."<strong>" . $row["sender"] . "</strong> "."<br>" .$row["message"] . "<br>"."</div>"."<br>";
        }else{
           echo "<div link rel='stylesheet' href='CSS/style.css' class='chatr'>"."<strong>" . $row["sender"] . "</strong> "."<br>" .$row["message"] . "<br>"."</div>"."<br>";
        }
    }
} else {
    echo "Belum ada pesan";
}

$conn->close();
?>
