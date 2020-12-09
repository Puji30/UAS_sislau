<h4>Ubah Data Customer</h4>
<hr>
<form action="index.php?mod=customer&page=proses_ubah" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Foto KTP</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nomor KTP</label>
            <input type="text" name="no_ktp" value="<?= $customer['No_KTP'] ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label for="">Nama Customer</label>
            <input type="text" name="nama" value="<?= $customer['Nama_Cus'] ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" class="form-control" required
                rows="10"><?= $customer['Alamat'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Nomor Telepon</label>
            <input type="number" min="0" value="<?= $customer['No_Telp'] ?>" name="no_telp" class="form-control"
                required>
        </div>
        <input type="hidden" name="id" value="<?= $customer['Id_Cus'] ?>">
        <input type="hidden" name="file_old" value="<?= $customer['Foto_KTP'] ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>

    </div>
</form>