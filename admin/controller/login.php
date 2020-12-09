<?php
if(isset($_POST['email'])){
    //action
    $conn=$con->koneksi();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM data_login where email ='$email' and password ='$password'";
    $user = $conn->query($sql);
    if ($user->num_rows > 0) {
        $sess = $user->fetch_array();
        $_SESSION['login']['id_email'] = $sess['Email'];
        $_SESSION['login']['id'] = $sess['id'];
        header('Location: http://localhost/sislau/admin/index.php?mod=customer');
    }else{
        $msg = "Email dan Password tidak ditemukan";
        include_once 'views/v_login.php';
    }
}else{
    include_once 'views/v_login.php';
}