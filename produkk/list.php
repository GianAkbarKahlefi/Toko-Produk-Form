<?php
header('Content-Type: application/json');
include "konek.php";

// Menyiapkan query untuk mengambil data dari tabel produk
$stmt = $db->prepare("SELECT id, product_name, category, price FROM produk");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mengembalikan data dalam format JSON
echo json_encode($result);
?>
