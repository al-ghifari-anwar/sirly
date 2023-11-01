<section>
    <div class="container p-5">
        <div class="row">
            <?php foreach ($percobaan as $percobaan) : ?>
                <div class="col-4 mx-auto">
                    <div class="card">
                        <img src="<?= base_url('assets/img/') . $percobaan['img_percobaan'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $percobaan['nama_percobaan'] ?></h5>
                            <a href="<?= base_url('jawaban-analisa/') . $percobaan['id_percobaan'] ?>" class="btn btn-primary">Masuk</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>