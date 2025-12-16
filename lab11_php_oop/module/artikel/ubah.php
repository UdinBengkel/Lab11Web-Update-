<?php
$db = new Database();

$id = $_GET['id'];
$data = $db->get("artikel", "id=$id");

// Jika data tidak ditemukan
if (!$data) {
    echo "<p style='color:red'>Data tidak ditemukan.</p>";
    exit;
}

// Ketika form disubmit
if ($_POST) {
    $update = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];

    $ok = $db->update("artikel", $update, "id=$id");

    if ($ok) {
        header("Location: /lab11_php_oop/artikel/index");
        exit;
    } else {
        echo "<p style='color:red'>Gagal mengupdate data!</p>";
    }
}

?>

<h3>Ubah Artikel</h3>

<form action="/lab11_php_oop/artikel/ubah?id=<?= $id ?>" method="POST">
    <table>
        <tr>
            <td>Judul</td>
            <td><input type="text" name="judul" value="<?= $data['judul'] ?>" required></td>
        </tr>

        <tr>
            <td>Isi</td>
            <td>
                <textarea name="isi" cols="30" rows="5" required><?= $data['isi'] ?></textarea>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">Update</button>
            </td>
        </tr>
    </table>
</form>
