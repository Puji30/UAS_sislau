<?php
include_once '../config/config.php';
$con = new Config();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Laundry - Administrator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="container ">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Sistem Informasi Data Laundry</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../admin/controller/logout.php"><span class="glyphicon glyphicon-log-in"></span>
                                Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="content container">
        <div class="kotak">
            <?php if (isset($_SESSION['ket']) && $_SESSION['ket'] == '1') { ?>
            <div class="alert alert-success" role="alert">
                Data Terpengaruh
            </div>
            <?php unset($_SESSION['ket']); ?>
            <?php } ?>
            <?php if (isset($_SESSION['ket']) && $_SESSION['ket'] == '2') { ?>
            <div class="alert alert-danger" role="alert">
                Data Tidak Terpengaruh
            </div>
            <?php unset($_SESSION['ket']); ?>
            <?php } ?>
        </div>
        <ul class="list-group col-md-3 col-xs-2">
            <li class="list-group-item "><a href="http://localhost/sislau/admin/index.php?mod=produk"> <i
                        class="fa fa-address-card "></i> <span class="hidden-xs">Data Paket</span></a></li>
            <li class="list-group-item "><a href="http://localhost/sislau/admin/index.php?mod=customer"> <i
                        class="fa fa-address-card "></i> <span class="hidden-xs">Data Customer</span></a></li>
            <li class="list-group-item "><a href="http://localhost/sislau/admin/index.php?mod=transaksi"> <i
                        class="fa fa-address-card "></i> <span class="hidden-xs">Data Transaksi</span></a></li>
        </ul>

        <div class="col-md-9 col-xs-10 ">


            <?php include_once $content; ?>
        </div>

    </div>


    <div id="myModal " class="modal fade " role="dialog ">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button " class="close " data-dismiss="modal ">&times;</button>
                    <h4 class="modal-title ">Berhasil</h4>
                </div>
                <div class="modal-body ">
                    <p></p>
                </div>
                <div class="modal-footer ">
                    <button type="button " class="btn btn-default " data-dismiss="modal ">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script src="<?= $con->site_url() ?>media/main.js"></script>
</body>

</html>