<a class="text-uppercase font-weight-bold btn btn-success" href="<?= base_url() ?>Dashboard_akl/bank_soal">kembali</a>

<div class="row mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-uppercase font-wight-bold text-white bg-primary">
                <h5 class="text-center">upload soal</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>Dashboard_akl/simpan_edit_bank_soal" method="POST">
                    <input type="text" class="form-control" value="<?= $mapel['id_bank_soal'] ?>" name="id_bank_soal" hidden>
                    <input type="text" class="form-control" value="<?= $mapel['id_mapel'] ?>" name="id_mapel" hidden>
                    <input type="text" class="form-control" value="<?= $mapel['id_guru'] ?>" name="id_guru" hidden>
                    <div class="form-group">
                        <label>Jenis Ujian</label>
                        <input type="text" class="form-control" name="nama_ujian" value="<?= $mapel['nama_ujian'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Mapel</label>
                        <input type="text" class="form-control" value="<?= $mapel['nama_mapel'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text" class="form-control" value="<?= $mapel['nama_guru'] ?>" readonly>
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