<?php
$Nama = $_POST['Nama'];
$Email = $_POST['Email'];
$Telepon = $_POST['Telepon'];
$Pesan = $_POST['Pesan'];

// Database Koneksi
$conn = new mysqli('localhost', 'root', 't00r', 'form');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    // Perbaikan pada query dan binding parameter
    $stmt = $conn->prepare("INSERT INTO komen (Nama, Email, Telepon, Pesan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $Nama, $Email, $Telepon, $Pesan);
    $stmt->execute();
    echo "CEK DATABASE NYA YOO---";
    $stmt->close();
    $conn->close(); // Perbaikan pada penamaan variabel
}
