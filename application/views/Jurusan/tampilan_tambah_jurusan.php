<div class="alert alert-success" role="alert">
    <h4 class="text-center font-weight-bold">Jurusan</h4>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                TAMBAH JURUSAN
            </div>
            <div class="card-body">
                <?= form_open_multipart('Dashboard/upload_jurusan'); ?>
                <div class="form-group">
                    <input type="file" name="excel" class="form-control-file" name="file" required accept=".xlsx">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" value="upload" class="btn btn-primary">Upload</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>