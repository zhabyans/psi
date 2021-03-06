<?php if(isset($_SESSION['user'])==0){
	$this->session->set_flashdata("pesan", " <i class='fa fa-warning'></i>&nbspAnda harus login");
	redirect('login');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php echo $_GET['aksi']?></title>

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
    <link href="<?php echo base_url()?>/assets/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url()?>/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<style>
	table{
		border:1;
		border-collapse:collapse
	}
	#panel{padding-top:0px;padding-bottom:0px}
	#text{font-size:13px;color:#807d7d}
</style>
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
                <a href="#" class="simple-text">
                    DOT Malang
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


        