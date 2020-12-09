<h4>Tambah Data Customer</h4>
<hr>
<form action="index.php?mod=customer&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Foto KTP</label>
            <input type="file" name="foto" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nomor KTP</label>
            <input type="text" name="no_ktp" required class="form-control">
        </div>

        <div class="form-group">
            <label for="">Nama Customer</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" class="form-control" required rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="">Nomor Telepon</label>
            <input type="number" min="0" name="no_telp" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>

    </div>
</form>