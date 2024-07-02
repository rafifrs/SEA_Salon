<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil data dari formulir
$name = $_POST['name'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$datetime = $_POST['datetime'];

// Koneksi ke database
$db = new mysqli('localhost', 'root', '', 'test');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Persiapkan dan bind
$stmt = $db->prepare("INSERT INTO reservation (name, phone, service, datetime) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phone, $service, $datetime);

// Eksekusi pernyataan
if ($stmt->execute()) {
    echo "Reservation successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$db->close();
?>
