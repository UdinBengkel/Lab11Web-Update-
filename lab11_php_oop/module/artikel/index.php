<?php
$db = new Database();
$query = $db->query("SELECT * FROM artikel");
?>

<h3>Data Artikel</h3>

<?php if (isset($_SESSION['user'])) : ?>
    <p>
        Login sebagai <b><?= $_SESSION['user']['nama']; ?></b> |
        <a href="/lab11_php_oop/user/profile">Profil</a> |
        <a href="/lab11_php_oop/logout">Logout</a>
    </p>
<?php endif; ?>


<a href="/lab11_php_oop/artikel/tambah">Tambah Artikel</a>
<table border="1" width="100%" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = $query->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['isi'] ?></td>
            <td>
                <a href="/lab11_php_oop/artikel/ubah?id=<?= $row['id']; ?>">Ubah</a> |
                <a href="/lab11_php_oop/artikel/hapus?id=<?= $row['id']; ?>"
                    onclick="return confirm('Yakin mau hapus artikel ini?')">
                    Hapus
                </a>
            </td>
        </tr>
    <?php } ?>
</table>
