<h4>Ubah Data Paket</h4>
<hr>
<form action="index.php?mod=paket&page=proses_ubah" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Foto Paket</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Jenis</label>
            <input type="text" name="jenis" value="<?= $paket['Jenis'] ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label for="">Harga Per Kilogram</label>
            <input type="number" min="1000" value="<?= $paket['Harga'] ?>" name="harga" class="form-control" required>
        </div>
        <input type="hidden" name="id" value="<?= $paket['id_paket'] ?>">
        <input type="hidden" name="file_old" value="<?= $paket['foto_paket'] ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>

    </div>
</form>