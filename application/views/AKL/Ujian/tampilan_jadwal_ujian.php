 <div class="alert alert-success" role="alert">
     <h4 class="text-center font-weight-bold">Jadwal Ujian</h4>
 </div>

 <div class="row">
     <div class="col-md">
         <div class="card">
             <div class="card-body">
                 <!-- <a class="btn btn-success btn-sm" href="<?= base_url() ?>Dashboard/tambah_jurusan"><i class="fas fa-plus-square"></i> Tambah Jurusan</a> -->
                 <button type="button" class="btn btn-success btn-sm text-uppercase" data-toggle="modal" data-target="#jadwalUjian">
                     <i class="fas fa-plus-square"></i> Tambah Jadwal Ujian
                 </button>


             </div>
         </div>
     </div>
 </div>

 <?= $this->session->flashdata('info') ?>

 <div class="row mb-2 mt-2">
     <div class="col-md">
         <div class="card">
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead class="text-uppercase">
                             <tr>
                                 <th>#</th>
                                 <th>nama guru</th>
                                 <th>nama mapel</th>
                                 <th>Kelas</th>
                                 <th>Tanggal Ujian</th>
                                 <th>Waktu Ujian</th>
                                 <th>durasi ujian</th>
                                 <th>aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <?php
                                    $no = 1;
                                    foreach ($jadwal_ujian as $row) {
                                    ?>
                                     <td><?php echo $no++; ?></td>
                                     <td><?= $row['nama_guru']; ?></td>
                                     <td><?= $row['nama_mapel']; ?></td>
                                     <td><?= $row['kelas']; ?></td>
                                     <td><?= $row['tanggal_ujian'] ?></td>
                                     <td><?= $row['waktu_mulai'] ?> - <?= $row['waktu_akir'] ?></td>
                                     <td><?= $row['durasi_ujian'] ?> Menit</td>
                                     <td>
                                         <h5 class="text-center">
                                             <a class="btn btn-success btn-sm  text-uppercase" href="<?= base_url() ?>Dashboard_akl/edit_jadwal_ujian/<?= $row['id_jadwal_ujian'] ?>"><i class="fas fa-edit"></i></i></a>
                                             <a class="btn btn-danger btn-sm  text-uppercase" href="<?= base_url() ?>Dashboard_akl/hapus_jadwal_ujian/<?= $row['id_jadwal_ujian'] ?>"><i class="fas fa-trash"></i></i></a>
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

 <div class="modal fade" id="jadwalUjian" tabindex="-1" aria-labelledby="tambahSiswa" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header bg-success text-white">
                 <h5 class="modal-title text-uppercase font-weight-bold" id="exampleModalLabel">Tambah Jadwal Ujian</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url() ?>Dashboard_akl/simpan_jadwal" method="POST">
                     <div class="form-group">
                         <label>Bank Soal</label>
                         <select class="form-control" name="id_bank_soal">
                             <oPtion class="bg-info text-white" disabled>Bank Soal</oPtion>
                             <?php foreach ($bank_soal as $row) { ?>
                                 <option value="<?= $row['id_bank_soal']; ?>"><?= $row['id_bank_soal']; ?> | <?= $row['nama_guru']; ?> | <?= $row['nama_mapel']; ?> </option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Kelas</label>
                         <select class="form-control" name="id_kelas">
                             <oPtion class="bg-info text-white" disabled>Kelas</oPtion>
                             <?php foreach ($kelas as $row) { ?>
                                 <option value="<?= $row['id_kelas']; ?>"><?= $row['id_kelas']; ?> | <?= $row['jurusan']; ?> | <?= $row['kelas']; ?> </option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="row">
                         <div class="col-md">
                             <div class="form-group">
                                 <label>Tanggal Awal</label>
                                 <input type="date" class="form-control" name="tgl_awal">
                             </div>
                         </div>
                         <div class="col-md">
                             <div class="form-group">
                                 <label>Tanggal Expired</label>
                                 <input type="date" class="form-control" name="tgl_akhir">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col">
                             <div class="form-group">
                                 <label>Waktu Mulai</label>
                                 <input type="time" class="form-control" name="waktu_mulai">
                             </div>
                         </div>
                         <div class="col">
                             <div class="form-group">
                                 <label>Waktu Selesai</label>
                                 <input type="time" class="form-control" name="waktu_akir">
                             </div>
                         </div>
                         <div class="col">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Durasi Ujian</label>
                                 <input type="number" class="form-control" name="durasi_ujian">
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>