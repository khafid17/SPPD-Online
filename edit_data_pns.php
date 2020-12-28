<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$nip = $_POST['nip'];
		$pangkat = $_POST['pangkat'];
		$instansi = $_POST['instansi'];
		$status = $_POST['status'];
		$sql = "UPDATE bufferpns SET id = '$id', nama = '$nama', nip = '$nip',pangkat = '$pangkat',instansi = '$instansi', status = '$status' WHERE id = '$id'";

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

	header('location: data_pns.php');

?>