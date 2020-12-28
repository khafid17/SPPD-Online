<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$Kd_Urut = $_POST['Kd_Urut'];
		$Kd_Root = $_POST['Kd_Root'];
		$Kd_Urusan = $_POST['Kd_Urusan'];
		$Kd_Bidang = $_POST['Kd_Bidang'];
		$Kd_Unit = $_POST['Kd_Unit'];
		$Kd_Sub = $_POST['Kd_Sub'];
		$Nm_Unit = $_POST['Nm_Unit'];
		$sql = "UPDATE transopd SET Kd_Urut = '$Kd_Urut', Kd_Root = '$Kd_Root', Kd_Urusan = '$Kd_Urusan',Kd_Bidang = '$Kd_Bidang',Kd_Unit = '$Kd_Unit', Kd_Sub = '$Kd_Sub', Nm_Unit = '$Nm_Unit' WHERE Kd_Urut = '$Kd_Urut'";

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

	header('location: opd.php');

?>