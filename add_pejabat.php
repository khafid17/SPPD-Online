<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$id = $_POST['id'];;
		$pejabat = $_POST['pejabat'];
		$nama = $_POST['nama'];
		$pangkat = $_POST['pangkat'];
		$nip = $_POST['nip'];
		$aktif = $_POST['aktif'];
		$sql = "INSERT INTO pejabat (id, pejabat, nama,nip, pangkat, aktif) VALUES ('$id','$pejabat','$nama', '$nip', '$pangkat','$aktif')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
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

	header('location: pejabat.php');
?>