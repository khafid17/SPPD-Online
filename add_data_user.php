<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$permit = $_POST['permit'];
		$hakakses = $_POST['hakakses'];
		$idtrans = $_POST['idtrans'];
		$status = $_POST['status'];
		$sql = "INSERT INTO user (nama, username, password , permit ,hakakses, idtrans ,status) VALUES ('$nama','$username','$password ','$permit ','$hakakses', '$idtrans ','$status')";
	

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

	header('location: data_user.php');
?>