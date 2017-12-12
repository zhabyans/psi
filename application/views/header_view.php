<?php if(isset($_SESSION['user'])==0){
	$this->session->set_flashdata("pesan", " <p style='color: #f44336;'><i class='fa fa-warning'></i>&nbspAnda harus login</p>");
	redirect('login');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Daftar Retur</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url()?>/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url()?>/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url()?>/assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url()?>/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">

    <div class="sidebar" data-color="blue" data-image="<?php echo base_url()?>assets/img/sidebar-5.jpg">

 


    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Outlet Polije
                </a>
            </div>

            <ul class="nav">
                <li <?php if($_GET['aksi']=='Beranda') {?> class="active" <?php }?>>
                    <a href="<?php echo base_url()?>/index.php/home">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li <?php if($_GET['aksi']=='Data Barang') {?> class="active" <?php }?>>
                    <a href="<?php echo base_url()?>/index.php/home/data_barang">
                        <i class="pe-7s-gift"></i>
                        <p>Data Barang</p>
                    </a>
                </li>
                <li <?php if($_GET['aksi']=='Data Penjualan') {?> class="active" <?php }?>>
                    <a href="<?php echo base_url()?>/index.php/home/data_penjualan">
                        <i class="pe-7s-cash"></i>
                        <p>Data Penjualan</p>
                    </a>
                </li>
                <li <?php if($_GET['aksi']=='Laporan Penjualan') {?> class="active" <?php }?>>
                    <a href="<?php echo base_url()?>/index.php/home/laporan">
                        <i class="pe-7s-note2"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>
                <li <?php if($_GET['aksi']=='Daftar Retur') {?> class="active" <?php }?>>
                    <a href="<?php echo base_url()?>/index.php/home/daftar_retur">
                        <i class="pe-7s-repeat"></i>
                        <p>Daftar Retur</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo $_GET['aksi']?></a>
                </div>
                <div class="collapse navbar-collapse">
                
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url() ?>/index.php/login/logout">
                                <p>Log out <i class="pe-7s-power"></i></p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
