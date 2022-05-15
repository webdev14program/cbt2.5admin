<div class="alert alert-success" role="alert">
    <h4 class="text-center font-weight-bold">Siswa</h4>
</div>

<div class="row mb-2 mt-2">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Username</th>
                                <th>Password</th>
                                <!-- <th>Status</th>
                                <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($siswa as $row) {
                                ?>
                                    <td><?php echo $no++; ?></td>
                                    <td><?= $row['nama_siswa']; ?></td>
                                    <td><?= $row['jurusan']; ?></td>
                                    <td><?= $row['kelas']; ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['password'] ?></td>
                                    <!-- <td><?= $row['status'] ?></td>
                                    <td>
                                        <h5 class="text-center">
                                            <a class="btn btn-danger btn-sm" href="">Blokir</a>
                                        </h5>
                                    </td> -->
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>