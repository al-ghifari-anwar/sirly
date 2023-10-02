<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" width="100" class="d-inline-block align-text-top">
                </a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Percobaan
                        </a>
                        <?php foreach ($judul as $judul) : ?>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('judul/') . $judul['id_judul'] ?>"><?= $judul['nama_judul'] ?></a></li>
                            </ul>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>