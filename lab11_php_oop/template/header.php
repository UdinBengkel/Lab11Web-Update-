<div class="collapse navbar-collapse">

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="../home/index">Home</a>
        </li>

        <?php if (isset($_SESSION['is_login'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="/lab11_php_oop/artikel/index">
                    Data Artikel
                </a>
            </li>

            <!-- 🔥 TAMBAH INI -->
            <li class="nav-item">
                <a class="nav-link" href="/lab11_php_oop/user/profile">
                    Profil
                </a>
            </li>
        <?php endif; ?>
    </ul>

    <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['is_login'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="../user/logout">
                    Logout (<?= $_SESSION['nama'] ?>)
                </a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="/lab11_php_oop/user/login">
                    Login
                </a>
            </li>
        <?php endif; ?>
    </ul>

</div>
