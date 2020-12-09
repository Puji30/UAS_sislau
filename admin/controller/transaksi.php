<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'add':
        $customer = "select * from customer";
        $customer = $conn->query($customer);
        $paket = "select * from paket";
        $paket = $conn->query($paket);
        $content = "views/transaksi/tambah.php";
        include_once 'views/template.php';
        break;
    case 'save':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['nama'])) {
                $err['nama'] = "Nama Wajib Diisi";
            }
            if (empty($_POST['paket'])) {
                $err['paket'] = "Paket Wajib diisi";
            }
            $date = date('Y-m-d H:i:s');
            if (!isset($err)) {
                $sql = "INSERT INTO transaksi (Nama_Cus, Nama_Paket,Tgl_Trans) 
            VALUES ('$_POST[nama]', '$_POST[paket]','$date')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['ket'] = '1';
                    header('Location:' . $con->site_url() . 'admin/index.php?mod=transaksi');
                } else {
                    $_SESSION['ket'] = '2';
                    header('Location:' . $con->site_url() . 'admin/index.php?mod=transaksi');
                }
            }
        } else {
            $err['msg'] = "tidak diijinkan";
        }
        break;
    case 'edit':
        $transaksi = "select * from transaksi where Id_Trans='$_GET[id]'";
        $transaksi = $conn->query($transaksi);
        $transaksi = $transaksi->fetch_assoc();
        $customer = "select * from customer";
        $customer = $conn->query($customer);
        $paket = "select * from paket";
        $paket = $conn->query($paket);
        $content = "views/transaksi/ubah.php";
        include_once 'views/template.php';
        break;
    case 'proses_ubah':

        $target_foto = $destination_path . 'media/' . $new_Foto;
        $in_nama = $_POST['nama'];
        $in_paket = $_POST['paket'];
        $date = date('Y-m-d H:i:s');
        $in_sql =
            "UPDATE transaksi SET  Nama_Cus ='$in_nama', Nama_Paket= '$in_paket', Tgl_Trans ='$date' WHERE Id_Trans='$_POST[id]'";
        if ($conn->query($in_sql) === true) {
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php?mod=transaksi');
        } else {
            $_SESSION['ket'] = '2';
            header('Location:' . $con->site_url() . 'admin/index.php?mod=transaksi');
        }
        break;
    case 'ajax':
        $sql_where = "SELECT * FROM transaksi WHERE Nama_Cus LIKE '%$_GET[cari]%' OR Nama_Paket LIKE '%$_GET[cari]%'";
        $transaksi = $conn->query($sql_where);
        include_once "views/transaksi/table.php";
        break;
    case 'delete';
        $transaksi = "DELETE FROM transaksi WHERE Id_Trans='$_GET[id]'";
        $transaksi = $conn->query($transaksi);
        $_SESSION['ket'] = '1';
        header('Location:' . $con->site_url() . 'admin/index.php?mod=transaksi');

    default:
        $sql = "select * from transaksi";
        $transaksi = $conn->query($sql);
        $conn->close();
        $content = "views/transaksi/tampil.php";
        include_once 'views/template.php';
}