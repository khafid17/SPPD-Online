<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST)){
		
		$idsppd = $_POST['idsppd'];
		$pejabat = $_POST['pejabat'];
		$tanggaldikeluarkan = $_POST['tgldikeluarkan'];
		$dikeluarkandi = $_POST['dikeluarkandi'];

		
		
		$sql = "UPDATE sppd SET pejabat='$pejabat', tanggaldikeluarkan='$tanggaldikeluarkan',dikeluarkandi='$dikeluarkandi',status=TRUE WHERE nomor=$idsppd";
		
		// kalo type data varchar pake petik, kalo int engga
		// kita cek dulu querynya bener ngaa

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Konfirmasi sukses!';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: sppd.php');
?>