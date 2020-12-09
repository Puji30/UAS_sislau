<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'add':
        $customer = "select * from customer";
        $customer = $conn->query($customer);
        $sql = "select * from customer";
        $customer = $conn->query($sql);
        $content = "views/customer/tambah.php";
        include_once 'views/template.php';
        break;
    case 'save':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_FILES['foto']['error'] == 0) {
                $eks_foto_boleh = array('png', 'jpg');
                $nama_foto = $_FILES['foto']['name'];
                $foto = explode('.', $nama_foto);
                $eksfoto = strtolower(end($foto));
                $ukuranfoto = $_FILES['foto']['size'];
                if (in_array($eksfoto, $eks_foto_boleh) === true) {
                    $tmpfoto = $_FILES['foto']['tmp_name'];
                    $new_Foto = uniqid() . "_" . $_POST['nama'];
                    $new_Foto .= '.';
                    $new_Foto .= $eksfoto;
                    // $destination_path = getcwd() . DIRECTORY_SEPARATOR;
                    $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/sislau/';
                    // Target
                    $target_foto = $destination_path . 'assets/upload' . $new_Foto;
                    if (empty($_POST['no_ktp'])) {
                        $err['no_ktp'] = "Nomor KTP Wajib Diisi";
                    }
                    if (empty($_POST['nama'])) {
                        $err['nama'] = "Nama Wajib diisi";
                    }
                    if (empty($_POST['alamat'])) {
                        $err['alamat'] = "Alamat Wajib Diisi";
                    }
                    if (empty($_POST['no_telp'])) {
                        $err['no_telp'] = "Nomor Telepon Wajib diisi";
                    }
                    if (!isset($err)) {
                        $sql = "INSERT INTO customer (Foto_KTP, No_KTP,Nama_Cus, Alamat, No_Telp) 
            VALUES ('$new_Foto','$_POST[no_ktp]', '$_POST[nama]', '$_POST[alamat]', '$_POST[no_telp]')";
                        if ($conn->query($sql) === TRUE) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
                        }
                    }
                }
            }
        } else {
            $err['msg'] = "tidak diijinkan";
        }
        break;
    case 'edit':
        $customer = "select * from customer where Id_Cus='$_GET[id]'";
        $customer = $conn->query($customer);
        $customer = $customer->fetch_assoc();
        $content = "views/customer/ubah.php";
        include_once 'views/template.php';
        break;
    case 'proses_ubah':
        $user_cari = "SELECT * FROM customer WHERE Id_Cus='$_POST[id]'";
        $user_cari = $conn->query($user_cari)->fetch_assoc();
        if ($_POST['no_ktp'] == $user_cari['No_KTP'] && $_POST['nama'] == $user_cari['Nama_Cus'] && $_POST['alamat'] == $user_cari['Alamat'] && $_POST['no_telp'] == $user_cari['No_Telp']  && $_FILES['foto']['error'] != 0) {
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
        } else {
            if ($_FILES['foto']['error'] == 0) {
                if (unlink($_SERVER['DOCUMENT_ROOT'] . "/sislau/assets/upload" . $_POST['file_old'])) {
                    $eks_foto_boleh = array('png', 'jpg');
                    $nama_foto = $_FILES['foto']['name'];
                    $foto = explode('.', $nama_foto);
                    $eksfoto = strtolower(end($foto));
                    $ukuranfoto = $_FILES['foto']['size'];
                    $tmpfoto = $_FILES['foto']['tmp_name'];
                    if (in_array($eksfoto, $eks_foto_boleh) === true) {
                        //  Generate Nama Gambar Baru
                        $new_Foto = uniqid() . "_" . $_POST['nama'];
                        $new_Foto .= '.';
                        $new_Foto .= $eksfoto;
                        $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/sislau/';
                        // Target
                        $target_foto = $destination_path . 'assets/upload' . $new_Foto;
                        $in_nama = $_POST['nama'];
                        $in_no_ktp = $_POST['no_ktp'];
                        $in_alamat = $_POST['alamat'];
                        $in_no_telp = $_POST['no_telp'];
                        $in_sql =
                            "UPDATE customer SET Foto_KTP ='$new_Foto', Nama_Cus ='$in_nama',No_KTP= '$in_no_ktp',Alamat ='$in_alamat',No_Telp= '$in_no_telp' WHERE Id_Cus='$_POST[id]'";
                        if ($conn->query($in_sql) === true) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
                        }
                    }
                }
            } else {
                $in_nama = $_POST['nama'];
                $in_no_ktp = $_POST['no_ktp'];
                $in_alamat = $_POST['alamat'];
                $in_no_telp = $_POST['no_telp'];
                $in_sql =
                    "UPDATE customer SET Nama_Cus ='$in_nama',No_KTP= '$in_no_ktp',Alamat ='$in_alamat',No_Telp= '$in_no_telp' WHERE Id_Cus='$_POST[id]'";
                if ($conn->query($in_sql) === true) {
                    $_SESSION['ket'] = '1';
                    header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
                } else {
                    $_SESSION['ket'] = '2';
                    header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
                }
            }
        }
        break;
    case 'delete';
        $sql_where = "SELECT * FROM customer WHERE Id_Cus='$_GET[id]'";
        $user_cari = $conn->query($sql_where)->fetch_array();
        if (unlink($_SERVER['DOCUMENT_ROOT'] . "/sislau/assets/upload" . $user_cari['Foto_KTP'])) {
            $customer = "DELETE FROM customer WHERE Id_Cus='$_GET[id]'";
            $customer = $conn->query($customer);
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
        } else {
            $_SESSION['ket'] = '2';
            header('Location:' . $con->site_url() . 'admin/index.php?mod=customer');
        }
    default:
        $sql = "select*from customer";
        $customer = $conn->query($sql);
        $conn->close();
        $content = "views/customer/tampil.php";
        include_once 'views/template.php';
}