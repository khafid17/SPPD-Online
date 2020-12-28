<?php
	include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
</head>
<body>

	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	
	<div class="container">
    <div class="jumbotron mt-4 bg-gradient-info">
	<img class= "gambar"src='./assets/img/kominfo.png' width='100' height='100'  /> <br>
		<h3 class="display-4" >Selamat Datang di Aplikasi SPPD Online</h3> 
		<p class='halo'>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
		<h2 class="selamat">Dinas Komunukasi Dan Informatika Kabupaten Demak</h2>    
        <hr class="my-4">
		<p>Jl. Sultan Hadiwijaya No.4 Demak Kode Pos 59515 Telp.()291) 685790</p>
    </div>
	</div>
	<style>
	.selamat{
	font-family: time new roman;
	}
	.halo{
	font-family: Verdana;
	}
	</style>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>

</body>
</html>