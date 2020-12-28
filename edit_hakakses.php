<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$ket = $_POST['ket'];
		$menudatadasar = $_POST['menudatadasar'];
		$menupreferensi = $_POST['menupreferensi'];
		$menusppd = $_POST['menusppd'];
		$editable = $_POST['editable'];
		$sql = "UPDATE hakakses SET id = '$id', ket = '$ket', menupreferensi = '$menupreferensi',menupreferensi = '$menupreferensi',menusppd = '$menusppd', editable = '$editable' WHERE id = '$id'";

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

	header('location: hakakses.php');

?>