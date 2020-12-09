<?php
include_once '../config/config.php';
$con = new Config();
if ($con->auth()) {
    //panggil fungsi
    switch (@$_GET['mod']){
        case 'customer':
            include_once 'controller/customer.php';
            break;
        case 'transaksi':
            include_once 'controller/transaksi.php';
            break;
        default:
            include_once 'controller/paket.php';
    }
}else{
    //panggil cont login
    var_dump($_SESSION);
    include_once 'controller/login.php';
}