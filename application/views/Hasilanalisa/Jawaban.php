<section>
    <div class="container p-5">
        <div class="row">
            <h2>List Jawaban Analisa Percobaan <?= $percobaan['nama_percobaan'] ?></h2>
            <div class="col-12 mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jawaban as $jawaban) : ?>
                            <tr>
                                <td><?= $jawaban['nama_jawaban'] ?></td>
                                <td><?= $jawaban['jawaban'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>