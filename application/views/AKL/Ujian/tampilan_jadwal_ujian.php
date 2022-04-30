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

                 <a class="btn btn-danger btn-sm text-uppercase" href="<?= base_url() ?>Dashboard/hapus_all_jadwal_ujian"><i class="fas fa-trash-alt"></i> Hapus Semua Jadwal Ujian</a>

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
                 <form>
                     <div class="form-group">
                         <label>Bank Soal</label>
                         <select class="form-control" name="guru">
                             <oPtion class="bg-info text-white" disabled>Bank Soal</oPtion>
                             <?php foreach ($bank_soal as $row) { ?>
                                 <option value="<?= $row['id_bank_soal']; ?>"><?= $row['id_bank_soal']; ?> | <?= $row['nama_guru']; ?> | <?= $row['nama_mapel']; ?> </option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Kelas</label>
                         <select class="form-control" name="kelas">
                             <oPtion class="bg-info text-white" disabled>Kelas</oPtion>
                             <?php foreach ($kelas as $row) { ?>
                                 <option value="<?= $row['id']; ?>"><?= $row['id']; ?> | <?= $row['jurusan']; ?> | <?= $row['kelas']; ?> </option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="row">
                         <div class="col-md">
                             <div class="form-group">
                                 <label>Tanggal Akhir</label>
                                 <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                             </div>
                         </div>
                         <div class="col-md">
                             <div class="form-group">
                                 <label>Tanggal Expired</label>
                                 <input type="date" class="form-control" id="exampleInputPassword1">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col">
                             <div class="form-group">
                                 <label>Waktu Mulai</label>
                                 <input type="time" class="form-control" id="exampleInputPassword1">
                             </div>
                         </div>
                         <div class="col">
                             <div class="form-group">
                                 <label>Waktu Selesai</label>
                                 <input type="time" class="form-control" id="exampleInputPassword1">
                             </div>
                         </div>
                         <div class="col">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Durasi Ujian</label>
                                 <input type="number" class="form-control" id="exampleInputPassword1">
                             </div>
                         </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </form>
             </div>
         </div>
     </div>
 </div>