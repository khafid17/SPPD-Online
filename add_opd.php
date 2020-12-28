<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$Kd_Urut = $_POST['Kd_Urut'];
		$Kd_Root = $_POST['Kd_Root'];
		$Kd_Urusan = $_POST['Kd_Urusan'];
		$Kd_Bidang = $_POST['Kd_Bidang'];
		$Kd_Unit = $_POST['Kd_Unit'];
		$Kd_Sub = $_POST['Kd_Sub'];
		$Nm_Unit = $_POST['Nm_Unit'];
		$sql = "INSERT INTO transopd (Kd_Urut, Kd_Root, Kd_Urusan,Kd_Bidang, Kd_Unit, Kd_Sub, Nm_Unit) VALUES ('$Kd_Urut','$Kd_Root', '$Kd_Urusan', '$Kd_Bidang','$Kd_Unit', '$Kd_Sub', '$Nm_Unit')";

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

	header('location: opd.php');
?>