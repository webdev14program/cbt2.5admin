<div class="alert alert-success" role="alert">
    <h4 class="text-center font-weight-bold">Jurusan</h4>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <!-- <a class="btn btn-success btn-sm" href="<?= base_url() ?>Dashboard/tambah_jurusan"><i class="fas fa-plus-square"></i> Tambah Jurusan</a> -->
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-square"></i> Tambah Jurusan
                </button>
            </div>
        </div>
    </div> 
</div>
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
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">ID Jurusan</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">Kode Jurusan</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">Jurusan</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($jurusan as $row) {
                                ?>
                                    <td class="text-centers">
                                        <h6><?php echo $no++; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase text-center"><?php echo $row['id']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase text-center"><?php echo $row['kode']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase"><?php echo $row['jurusan']; ?></h6>
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
                <h5 class="modal-title" id="exampleModalLabel">Upload Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form action="<?= base_url() ?>Dashboard/upload_jurusan" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="excel" class="form-control-file" name="file" required accept=".xlsx">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" value="upload" class="btn btn-primary">Upload</button>
                    </div>
                </form> -->

                <?= form_open_multipart('Dashboard/upload_jurusan'); ?>
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