<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Top navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <?php
                // check session admin
                if (isset($_SESSION['admin']) AND $_SESSION['admin'] == true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= $base_url ?>admin/dashboard.php">Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= $base_url ?>admin/product/list.php">Produk</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= $base_url ?>">Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= $base_url ?>admin/login.php">Login Admin</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>