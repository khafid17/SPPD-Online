<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST)){
		$opd = $_POST['opd'];
		$orang = $_POST['orang'];
		$tgl_berangkat = $_POST['tgl_berangkat'];
		$tgl_pulang = $_POST['tgl_pulang'];
		$transpot = $_POST['transpot'];
		$kotaberangkat = $_POST['kotaberangkat'];
		$kotatujuan = $_POST['kotatujuan'];
		$alamatlengkap = $_POST['alamatlengkap'];
		$maksudtujuan = $_POST['maksudtujuan'];
		$sql = "INSERT INTO sppd (instansianggaran, nama, tanggalberangkat,tanggalpulang,angkutan,tempatberangkat,tempattujuan, alamattujuan, maksudtujuan) VALUES (".$opd.",'".$orang."', '".$tgl_berangkat."','".$tgl_pulang."',".$transpot.",'".$kotaberangkat."','".$kotatujuan."','".$alamatlengkap."','".$maksudtujuan."')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'SPpd added successfully';
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