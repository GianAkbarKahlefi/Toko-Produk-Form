<?php
header('Content-Type: application/json');
include "konek.php";

// Mengambil data dari permintaan POST
$product_name = $_POST['product_name'];
$category = $_POST['category'];
$price = $_POST['price'];


// Menyiapkan query untuk memasukkan data produk
$stmt = $db->prepare("INSERT INTO produk (product_name, category, price) VALUES (?, ?, ?)");
$result = $stmt->execute([$product_name, $category, $price]);

// Mengembalikan hasil dalam format JSON
echo json_encode([
    'success' => $result
]);
?>
