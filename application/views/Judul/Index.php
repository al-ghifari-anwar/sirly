<section>
    <div class="container">
        <div class="row">
            <div class="col-12 p-5">
                <?php foreach ($percobaan as $percobaan) : ?>
                    <div class="col-4">
                        <div class="card">
                            <img src="<?= base_url('assets/img/') . $percobaan['img_percobaan'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $percobaan['nama_percobaan'] ?></h5>
                                <a href="<?= base_url('percobaan/') . $percobaan['id_percobaan'] ?>" class="btn btn-primary">Masuk</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>