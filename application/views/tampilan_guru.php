<div class="alert alert-success" role="alert">
    <h4 class="text-center font-weight-bold">Guru</h4>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <!-- <a class="btn btn-success btn-sm" href="<?= base_url() ?>Dashboard/tambah_jurusan"><i class="fas fa-plus-square"></i> Tambah Jurusan</a> -->
                <button type="button" class="btn btn-success btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-square"></i> Upload Guru
                </button>
                <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_all_guru"><i class="fas fa-trash"></i> Hapus Guru</a>
            </div>
        </div>
    </div>
</div>
<?= $this->session->flashdata('pesan') ?>

<div class="row mt-3">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">#</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">ID GURU</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">NAMA GURU</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">JENIS GURU</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($guru as $row) {
                                ?>
                                    <td class="text-centers">
                                        <h6><?php echo $no++; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase text-center"><?php echo $row['id_guru']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase text-center"><?php echo $row['nama_guru']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase text-center"><?php echo $row['jenis_guru']; ?></h6>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Upload Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('Dashboard/upload_guru'); ?>
                <div class="form-group">
                    <input type="file" name="excel" class="form-control-file" name="file" required accept=".xlsx">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" value="upload" class="btn btn-primary">Upload</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>