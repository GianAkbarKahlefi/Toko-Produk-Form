<?php
header('Content-Type: application/json');
include "konek.php";

// Mengambil ID produk dari permintaan POST
$id = (int) $_POST['id'];

// Menyiapkan query untuk menghapus data dari tabel produk
$stmt = $db->prepare("DELETE FROM produk WHERE id = ?");
$result = $stmt->execute([$id]);

// Mengembalikan hasil dalam format JSON
echo json_encode([
    'id' => $id,
    'success' => $result
]);
?>
