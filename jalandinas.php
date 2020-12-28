<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST)){
		
		$idsppd = $_POST['idsppd'];
		$ket = $_POST['ket'];
	
		
		$sql = "INSERT INTO sppddasar (idsppd, ket) VALUES (".$idsppd.", '".$ket."')";
		// kalo type data varchar pake petik, kalo int engga
		// kita cek dulu querynya bener ngaa

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

	header('location: sppd.php');
?>