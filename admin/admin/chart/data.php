<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$db = "marketplace";

$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data produk dari tabel products
$sql = "SELECT product_title, product_price FROM products";
$result = $conn->query($sql);

// Array untuk menyimpan data produk
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[$row['product_title']] = $row['product_price'];
}

// Mengubah data produk ke format JSON
echo json_encode($products);

$conn->close();
?>
