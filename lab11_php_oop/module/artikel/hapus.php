<?php
$db = new Database();

if (!isset($_GET['id'])) {
    echo "<p style='color:red'>ID tidak ditemukan</p>";
    exit;
}

$id = $_GET['id'];

$delete = $db->delete("artikel", "id=$id");

if ($delete) {
    // Redirect kembali ke daftar artikel
    header("Location: /lab11_php_oop/artikel/index");
    exit;
} else {
    echo "<p style='color:red'>Gagal menghapus data</p>";
}
?>
