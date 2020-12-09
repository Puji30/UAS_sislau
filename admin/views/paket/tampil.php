<div class="row">
    <div class="pull-left">
        <h4>Daftar Paket</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=paket&page=add">
            <button class="btn btn-primary">Tambah Data</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Foto Paket</th>
                <th>Jenis</th>
                <th>Harga Per Kilogram</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($paket != NULL) {
                $no = 1;
                foreach ($paket as $row) { ?>
            <tr>
                <td><?= $no; ?></td>
                <td><img src="<?= $con->site_url() ?>assets/upload/<?= $row['foto_paket'] ?>" width="75px"
                        alt="Gagal Memuat">
                </td>
                <td><?= $row['Jenis']; ?></td>
                <td>Rp.<?= $row['Harga'] ?></td>
                <td>
                    <a href="index.php?mod=paket&page=edit&id=<?= $row['id_paket'] ?>"><i class="fa fa-pencil"></i>
                    </a>
                    <a href="index.php?mod=paket&page=delete&id=<?= $row['id_paket'] ?>"><i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php $no++;
                }
            } ?>
        </tbody>
    </table>
</div>