<div class="alert alert-success" role="alert">
    <h4 class="text-center font-weight-bold text-uppercase">bank soal</h4>
</div>

<button type="button" class="btn btn-primary text-uppercase font-weight-bold" data-toggle="modal" data-target="#exampleModal">
    tambah bank soal
</button>
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
                                    <td class="text-center font-weight-bold text-uppercase"><?= $row['status'] ?></td>
                                    <td>
                                        <h5 class="text-center">
                                            <a class="btn btn-success btn-sm  text-uppercase" href="#"><i class="fas fa-upload"></i> upload</a>
                                        </h5>
                                    </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase text-white font-weight-bold" id="exampleModalLabel">tambah bank soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Jenis Ujian</label>
                        <select class="form-control">
                            <OPtion class="bg-info text-white" disabled>PILIH JENIS UJIAN</OPtion>
                            <option>UJIAN TENGAH SEMESTER</option>
                            <option>UJIAN AKHIR SEMESTER</option>
                            <option>UJIAN KENAIKAN KELAS</option>
                            <option>ULANGAN HARIAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>MAPEL</label>
                        <select class="form-control">
                            <OPtion class="bg-info text-white" disabled>PILIH MAPEL</OPtion>
                            <?php foreach ($mapel as $row) { ?>
                                <option value="<?= $row['id_mapel']; ?>"><?= $row['id_mapel']; ?> | <?= $row['nama_mapel']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KELAS</label>
                        <select class="form-control">
                            <OPtion class="bg-info text-white" disabled>PILIH KELAS</OPtion>
                            <?php foreach ($kelas as $row) { ?>
                                <option value="<?= $row['id_kelas']; ?>"><?= $row['id_kelas']; ?> | <?= $row['kelas']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>