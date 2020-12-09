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
                  <a href="index.php?mod=transaksi&page=edit&id=<?= $row['Id_Trans'] ?>"><i class="fa fa-pencil"></i>
                  </a>
                  <a href="index.php?mod=transaksi&page=delete&id=<?= $row['Id_Trans'] ?>"><i class="fa fa-trash"></i>
                  </a>
              </td>
          </tr>
          <?php $no++;
                }
            } ?>
      </tbody>
  </table>