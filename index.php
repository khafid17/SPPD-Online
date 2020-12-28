
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SPPD Online</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
	                    
	<div class="kotak_login">
	<div class="col s12">
    <div class="card-content">
	<h1 class="halaman">SPPD ONLINE</h1>
		
		<img class= "gambar"src='./assets/img/demak.png' width='70' height='80' />;
		<h3 class="nama">Dinas Komunikasi dan Informatika Kabupaten Demak</h3>
		<form action="cek_login.php" method="post">
			<label class='id'>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
			<label class='id'>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
			<input type="submit" class="tombol_login" value="LOGIN">
			<br/>
			<br/>
		</form>
		<style>
		.gambar{margin-left:auto;margin-right:auto;display:block }
		.halaman{font-family: caurier}
		.nama{text-align: center; font-family: times;}
		.id{text-align: center; font-family: time new roman; }
		.background:{ url(./assets/img/background.jpg) !important;}
		</style>
	</div>
</body>
</html>
