<div class="alert alert-success" role="alert">
    <h4 class="text-center font-weight-bold text-uppercase">bank soal</h4>
</div>
<a class="btn btn-success btn-sm mt-2 mb-2 text-uppercase font-weight-bold text-white" href="<?= base_url() ?>Dashboard_otkp/bank_soal">kembali</a>
<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <table class="table border">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold text-uppercase">Nama Guru</td>
                            <td class="font-weight-bold text-uppercase"> : <?= $header['nama_guru'] ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">Nama Mapel</td>
                            <td class="font-weight-bold text-uppercase"> : <?= $header['nama_mapel'] ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">Jenis Ujian</td>
                            <td class="font-weight-bold text-uppercase"> : <?= $header['nama_ujian'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <?php
                            $no = 1;
                            foreach ($data_soal as $row) {
                            ?>
                                <td><?php echo $no++; ?></td>
                                <td class="">
                                    <?= $row['soal'] ?><br>
                                    A. <?= $row['pilA'] ?><br>
                                    B. <?= $row['pilB'] ?><br>
                                    C. <?= $row['pilC'] ?><br>
                                    D. <?= $row['pilD'] ?><br>
                                    E. <?= $row['pilE'] ?><br>
                                    Kunci Jawaban <?= $row['kunci'] ?><br>

                                </td>

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>