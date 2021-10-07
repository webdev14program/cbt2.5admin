<div class="alert alert-success" role="alert">
    <h4 class="text-center font-weight-bold">Mata Pelajaran</h4>
</div>



<div class="row mt-2">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID Ujian</th>
                                <th>Jenis Ujian</th>
                                <th>Mapel Ujian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($mapel as $row) {
                                ?>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $row['id_mapel'] ?></td>
                                    <td class="text-center text-uppercase font-weight-bold">UAS Ganjil 2021/2022</td>
                                    <td class="font-weight-bold "><?= $row['nama_mapel'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>