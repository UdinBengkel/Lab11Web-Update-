<?php
$db = new Database();
$form = new Form("/lab11_php_oop/artikel/tambah", "Simpan Data");

if ($_POST) {
    $data = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];

    $save = $db->insert("artikel", $data);

    if ($save) {
        // Redirect kembali ke daftar artikel
        header("Location: /lab11_php_oop/artikel/index");
        exit;
    } else {
        echo "<p style='color:red'>Gagal menyimpan data</p>";
    }
}

echo "<h3>Tambah Artikel</h3>";

$form->addField("judul", "Judul Artikel");
$form->addField("isi", "Isi Artikel", "textarea");

$form->displayForm();
?>
