<a class="text-uppercase font-weight-bold btn btn-success" href="<?= base_url() ?>Dashboard/bank_soal">kembali</a>

<div class="row mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-uppercase font-wight-bold text-white bg-primary">
                <h5 class="text-center">upload soal</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>Dashboard/simpan_edit_bank_soal" method="POST">
                    <input type="text" class="form-control" value="<?= $mapel['id_bank_soal'] ?>" name="id_bank_soal" hidden>
                    <input type="text" class="form-control" value="<?= $mapel['id_mapel'] ?>" name="id_mapel" hidden>
                    <input type="text" class="form-control" value="<?= $mapel['id_kelas'] ?>" name="id_kelas" hidden>
                    <div class="form-group">
                        <label>Jenis Ujian</label>
                        <select class="form-control" name="ujian">
                            <OPtion class="bg-info text-white" disabled>PILIH JENIS UJIAN</OPtion>
                            <option>UJIAN TENGAH SEMESTER</option>
                            <option>UJIAN AKHIR SEMESTER</option>
                            <option>UJIAN KENAIKAN KELAS</option>
                            <option>ULANGAN HARIAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Mapel</label>
                        <input type="text" class="form-control" value="<?= $mapel['nama_mapel'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" value="<?= $mapel['kelas'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status">
                            <option class="bg-info text-white" disabled>PILIH STATUS</option>
                            <option>AKTIF</option>
                            <option>NON AKTIF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Soal</label>
                        <input type="file" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary text-uppercase">Ubah Bank Soal</button>
                </form>
            </div>
        </div>
    </div>
</div>