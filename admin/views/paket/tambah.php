<h4>Tambah Data Paket</h4>
<hr>
<form action="index.php?mod=paket&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Foto Paket</label>
            <input type="file" name="foto" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Jenis</label>
            <input type="text" name="jenis" required class="form-control">
        </div>

        <div class="form-group">
            <label for="">Harga Per Kilogram</label>
            <input type="number" min="1000" name="harga" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>

    </div>
</form>