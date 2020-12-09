<h4>Tambah Data Transaksi</h4>
<hr>
<form action="index.php?mod=transaksi&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama Customer</label>
            <select name="nama" id="nama" class="form-control" required>
                <option value="">Masukkan Nama Customer</option>
                <?php foreach ($customer as $data) { ?>
                <option value="<?= $data['Nama_Cus'] ?>"><?= $data['Nama_Cus'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Nama Paket</label>
            <select name="paket" id="paket" class="form-control" required>
                <option value="">Masukkan Nama Paket</option>
                <?php foreach ($paket as $data) { ?>
                <option value="<?= $data['Jenis'] ?>"><?= $data['Jenis'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>

    </div>
</form>