<div class="row">
    <div class="pull-left">
        <h4>Daftar Transaksi</h4>

    </div>
    <div class="pull-right">
        <a href="index.php?mod=transaksi&page=add">
            <button class="btn btn-primary">Tambah Data</button>
        </a>
    </div>
</div>

<div class="row">

    <form style="padding-top: 25px;">
        <input class="form-control" id="search_transaksi" type="text" placeholder="Cari Nama atau Paket" name="search">
    </form>
    <div id="result">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>Nama Customer</th>
                    <th>Nama Paket</th>
                    <th>Tanggal Transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($transaksi != NULL) {
                    $no = 1;
                    foreach ($transaksi as $row) { ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['Nama_Cus']; ?></td>
                    <td><?= $row['Nama_Paket'] ?></td>
                    <td><?= $row['Tgl_Trans'] ?></td>
                    <td>
                        <a href="index.php?mod=transaksi&page=edit&id=<?= $row['Id_Trans'] ?>"><i
                                class="fa fa-pencil"></i>
                        </a>
                        <a href="index.php?mod=transaksi&page=delete&id=<?= $row['Id_Trans'] ?>"><i
                                class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php $no++;
                    }
                } ?>
            </tbody>
        </table>
    </div>
</div>