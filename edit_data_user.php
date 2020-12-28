<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		// $password = $_POST['password'];
		// $permit = $_POST['permit'];
		$hakakses = $_POST['hakakses'];
		// $idtrans = $_POST['idtrans'];
		$status = $_POST['status'];
		$sql = "UPDATE user SET nama = '$nama', username = '$username', hakakses = '$hakakses', status = '$status' WHERE nama = '$nama'";

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

	header('location: data_user.php');

?>