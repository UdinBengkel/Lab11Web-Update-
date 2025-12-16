<?php
$db = new Database();

// proteksi halaman
if (!isset($_SESSION['is_login'])) {
    header("Location: /lab11_php_oop/user/login");
    exit;
}

$message = "";

// proses ubah password
if ($_POST) {
    $password_baru = $_POST['password'];

    // enkripsi password
    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

    // update password berdasarkan ID user login
    $update = $db->update(
        "users",
        ['password' => $password_hash],
        "id=" . $_SESSION['id']
    );

   if ($update) {
    session_destroy(); // logout paksa
    header("Location: /lab11_php_oop/user/login");
    exit;
    }
}
?>

<h3>Profil User</h3>

<table border="1" cellpadding="5">
    <tr>
        <td>Nama</td>
        <td><?= $_SESSION['nama']; ?></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><?= $_SESSION['username']; ?></td>
    </tr>
</table>

<br>

<h4>Ubah Password</h4>

<?= $message; ?>

<form method="post">
    <label>Password Baru</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Simpan</button>
</form>
