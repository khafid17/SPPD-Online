<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$id = $_POST['id'];
		$kodetrans = $_POST['kodetrans'];
		$nama = $_POST['nama'];
		$nip = $_POST['nip'];
		$pangkat = $_POST['pangkat'];
		$instansi = $_POST['instansi'];
		$status = $_POST['status'];
		$sql = "INSERT INTO bufferpns (id, kodetrans, nama, nip,pangkat, instansi, status) VALUES ('$id','$kodetrans' ,'$nama', '$nip','$pangkat', '$instansi', '$status')";

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

	header('location: data_pns.php');
?>