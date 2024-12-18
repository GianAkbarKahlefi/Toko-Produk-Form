<?php
header('Content-Type: application/json');
include "konek.php";

// Ambil data JSON dari permintaan POST
$data = json_decode(file_get_contents("php://input"), true);

// Debug: Log data yang diterima
file_put_contents('php://stderr', print_r($data, true));

// Validasi input JSON
if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON format']);
    exit;
}

// Ambil parameter dari data JSON
$id = $data['id'] ?? null;
$product_name = $data['product_name'] ?? null;
$category = $data['category'] ?? null;
$price = $data['price'] ?? null;


// Validasi data yang kosong
if (!$id || !$product_name || !$category || !$price) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

// Proses update produk
$stmt = $db->prepare("UPDATE produk SET product_name = ?, category = ?, price = ?, description = ? WHERE id = ?");
$result = $stmt->execute([$product_name, $category, $price, $description, $id]);

// Kirim respons JSON
echo json_encode(['success' => $result]);
?>
