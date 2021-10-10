<div class="alert alert-success" role="alert">
    <h4 class="text-center font-weight-bold text-uppercase">bank soal</h4>
</div>

<div class="row mt-2">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-uppercase">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">ID bank soal</th>
                                <th scope="col">kelas</th>
                                <th scope="col">nama mapel</th>
                                <th scope="col">status</th>
                                <th scope="col">upload soal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($bankSoal as $row) {
                                ?>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-center"><?= $row['id_bank_soal'] ?></td>
                                    <td class="text-center"><?= $row['kelas'] ?></td>
                                    <td><?= $row['nama_mapel'] ?></td>
                                    <td class="text-center font-weight-bold text-white text-uppercase badge badge-info"><?= $row['status'] ?></td>
                                    <td><a class="btn btn-success btn-sm text-uppercase" href="#">upload</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>