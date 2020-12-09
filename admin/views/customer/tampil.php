<div class="row">
    <div class="pull-left">
        <h4>Daftar Customer</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=customer&page=add">
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
                <th>Foto KTP</th>
                <th>Nomor KTP</th>
                <th>Nama Customer</th>
                <th>Alamat Customer</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($customer != NULL) {
                $no = 1;
                foreach ($customer as $row) { ?>
            <tr>
                <td><?= $no; ?></td>
                <td><img src="<?= $con->site_url() ?>assets/upload/<?= $row['Foto_KTP'] ?>" width="75px"
                        alt="Gagal Memuat">
                </td>
                <td><?= $row['No_KTP']; ?></td>
                <td><?= $row['Nama_Cus']; ?></td>
                <td><?= $row['Alamat']; ?></td>
                <td><?= $row['No_Telp'] ?></td>
                <td>
                    <a href="index.php?mod=customer&page=edit&id=<?= $row['Id_Cus'] ?>"><i class="fa fa-pencil"></i>
                    </a>
                    <a href="index.php?mod=customer&page=delete&id=<?= $row['Id_Cus'] ?>"><i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php $no++;
                }
            } ?>
        </tbody>
    </table>
</div>