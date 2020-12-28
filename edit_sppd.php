<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$opd = $_POST['opd'];
		$orang = $_POST['orang'];
		$tgl_berangkat = $_POST['tgl_berangkat'];
		$tgl_pulang = $_POST['tgl_pulang'];
		$transpot = $_POST['transpot'];
		$kotaberangkat = $_POST['kotaberangkat'];
		$kotatujuan = $_POST['kotatujuan'];
		$alamatlengkap = $_POST['alamatlengkap'];
		$maksudtujuan = $_POST['maksudtujuan'];
		// $id = $_POST['id'];
		// $tanggaldikeluarkan = $_POST['tanggaldikeluarkan'];
		// $tempattujuan = $_POST['tempattujuan'];
		// $nama = $_POST['nama'];
		// $maksudtujuan = $_POST['maksudtujuan'];
		// $status = $_POST['status'];
		$sql = "UPDATE sppd SET opd = '$opd', orang = '$orang', tgl_berangkat = '$tgl_berangkat',tgl_pulang = '$tgl_pulang', transpot = '$transpot',kotaberangkat = '$kotaberangkat',alamatlengkap = '$alamatlengkap', maksudtujuan = '$maksudtujuan' WHERE nomor = '$nomor'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: sppd.php');

?>