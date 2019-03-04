<?php if(isset($_SESSION['user'])!=0){
	$this->session->set_flashdata("pesan", " <i class='fa fa-warning'></i>&nbspAnda harus login");
	redirect('home');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.jpg">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Login Outlet</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url()?>/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url()?>/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head>
<body>
<br>
<br>
<br>
<br>
<center>
<div class="col-md-4">
</div>
<div class="col-md-4">
	<div class="card card-user">
		
		<div class="content">
		<br>
		<?php //echo "<br>".$this->session->flashdata("pesan");?>
		<form action="<?php echo base_url() ?>/index.php/login/pro_login" method="post">
				<div class="form-group">
					<label>Masukkan Username</label>
					<input type="text" class="form-control" placeholder="Username" name="user" required autofocus>
				</div>
				<div class="form-group">
					<label>Masukkan Password</label>
					<input type="password" class="form-control"  placeholder="Password" name="pass" required>
				</div>
				<button type="submit" class="btn btn-info btn-fill">Masuk</button>
		</form>
		</div>
		<hr>
		<div class="text-center">
			<br>

<!--   Core JS Files   -->
    <script src="<?php echo base_url()?>/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>/assets/js/bootstrap.min.js" type="text/javascript"></script>


    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url()?>/assets/js/bootstrap-notify.js"></script>


    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url()?>/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url()?>/assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

		<?php if($this->session->flashdata("pesan")==true){?>
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "<?php echo $this->session->flashdata("pesan")?>"

            },{
                type: 'danger',
                timer: 4000
            });
		<?php }?>
    	});
	</script>

</html>
