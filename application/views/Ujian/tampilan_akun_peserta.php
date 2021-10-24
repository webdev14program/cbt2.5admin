 <div class="alert alert-success" role="alert">
     <h4 class="text-center font-weight-bold">Akun Peserta</h4>
 </div>

 <div class="row mb-2 mt-2">
     <div class="col-md">
         <div class="card">
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead class="text-center text-uppercase">
                             <tr>
                                 <th>#</th>
                                 <th>ID Kelas</th>
                                 <th>Nama Kelas</th>
                                 <th>Jurusan</th>
                                 <th>Jumlah Siswa</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody class="text-center">
                             <tr>
                                 <?php
                                    $no = 1;
                                    foreach ($akun_peserta as $row) {
                                    ?>
                                     <td><?php echo $no++; ?></td>
                                     <td><?= $row['id_kelas']; ?></td>
                                     <td><?= $row['nama_kelas']; ?></td>
                                     <td><?= $row['nama_jurusan']; ?></td>
                                     <td><?= $row['jumlah_siswa']; ?> Siswa</td>
                                     <td class="text-center text-weight font-weight-bold"><a class="btn btn-danger btn-sm" href="<?= base_url() ?>Dashboard/print_akun_peserta/<?= $row['id_kelas'] ?>"> <i class="fas fa-print"></i> PRINT</a></td>
                             </tr>
                         <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>