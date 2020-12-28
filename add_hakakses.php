<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$id = $_POST['id'];
		$ket = $_POST['ket'];
		$menudatadasar = $_POST['menudatadasar'];
		$menupreferensi = $_POST['menupreferensi'];
		$menusppd = $_POST['menusppd'];
		$editable = $_POST['editable'];
		$sql = "INSERT INTO hakakses (id, ket, menudatadasar,menupreferensi, menusppd, editable) VALUES ('$id', '$ket', '$menudatadasar','$menupreferensi', '$menusppd', '$editable')";

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

	header('location: hakakses.php');
?>