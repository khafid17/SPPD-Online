<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];;
		$pejabat = $_POST['pejabat'];
		$nama = $_POST['nama'];
		$pangkat = $_POST['pangkat'];
		$nip = $_POST['nip'];
		$aktif = $_POST['aktif'];
		$sql = "UPDATE pejabat SET id = '$id', pejabat = '$pejabat', nama = '$nama',pangkat = '$pangkat',nip = '$nip', aktif = '$aktif' WHERE id = '$id'";

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

	header('location: pejabat.php');

?>