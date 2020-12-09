<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'add':
        $paket = "select * from paket";
        $paket = $conn->query($paket);
        $sql = "select * from paket";
        $paket = $conn->query($sql);
        $content = "views/paket/tambah.php";
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
                    $new_Foto = uniqid() . "_" . $_POST['jenis'];
                    $new_Foto .= '.';
                    $new_Foto .= $eksfoto;
                    // $destination_path = getcwd() . DIRECTORY_SEPARATOR;
                    $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/sislau/';
                    // Target
                    $target_foto = $destination_path . 'assets/upload' . $new_Foto;
                    if (empty($_POST['jenis'])) {
                        $err['jenis'] = "Jenis Wajib Diisi";
                    }
                    if (empty($_POST['harga'])) {
                        $err['harga'] = "Harga Wajib diisi";
                    }
                    if (!isset($err)) {
                        $sql = "INSERT INTO paket (foto_paket, Jenis, Harga) 
            VALUES ('$new_Foto','$_POST[jenis]', '$_POST[harga]')";
                        if ($conn->query($sql) === TRUE) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location:' . $con->site_url() . 'admin/index.php');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location:' . $con->site_url() . 'admin/index.php');
                        }
                    }
                }
            }
        } else {
            $err['msg'] = "tidak diijinkan";
        }
        break;
    case 'edit':
        $paket = "select * from paket where id_paket='$_GET[id]'";
        $paket = $conn->query($paket);
        $paket = $paket->fetch_assoc();
        $content = "views/paket/ubah.php";
        include_once 'views/template.php';
        break;
    case 'proses_ubah':
        $user_cari = "SELECT * FROM paket WHERE id_paket='$_POST[id]'";
        $user_cari = $conn->query($user_cari)->fetch_assoc();
        if ($_POST['jenis'] == $user_cari['Jenis'] && $_POST['harga'] == $user_cari['Harga']  && $_FILES['foto']['error'] != 0) {
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php');
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
                        $new_Foto = uniqid() . "_" . $_POST['jenis'];
                        $new_Foto .= '.';
                        $new_Foto .= $eksfoto;
                        $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/sislau/';
                        // Target
                        $target_foto = $destination_path . 'assets/upload' . $new_Foto;
                        $in_jenis = $_POST['jenis'];
                        $in_harga = $_POST['harga'];
                        $in_sql =
                            "UPDATE paket SET foto_paket ='$new_Foto', Jenis ='$in_jenis',Harga= '$in_harga' WHERE id_paket='$_POST[id]'";
                        if ($conn->query($in_sql) === true) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location:' . $con->site_url() . 'admin/index.php');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location:' . $con->site_url() . 'admin/index.php');
                        }
                    }
                }
            } else {
                $in_jenis = $_POST['jenis'];
                $in_harga = $_POST['harga'];
                $in_sql =
                    "UPDATE paket SET Jenis ='$in_jenis',Harga= '$in_harga' WHERE id_paket='$_POST[id]'";
                if ($conn->query($in_sql) === true) {
                    $_SESSION['ket'] = '1';
                    header('Location:' . $con->site_url() . 'admin/index.php');
                } else {
                    $_SESSION['ket'] = '2';
                    header('Location:' . $con->site_url() . 'admin/index.php');
                }
            }
        }
        break;
    case 'delete';
        $sql_where = "SELECT * FROM paket WHERE id_paket='$_GET[id]'";
        $user_cari = $conn->query($sql_where)->fetch_array();
        if (unlink($_SERVER['DOCUMENT_ROOT'] . "/sislau/assets/upload" . $user_cari['foto_paket'])) {
            $paket = "DELETE FROM paket WHERE id_paket='$_GET[id]'";
            $paket = $conn->query($paket);
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php');
        } else {
            $_SESSION['ket'] = '2';
            header('Location:' . $con->site_url() . 'admin/index.php');
        }
    default:
        $sql = "select*from paket";
        $paket = $conn->query($sql);
        $conn->close();
        $content = "views/paket/tampil.php";
        include_once 'views/template.php';
}