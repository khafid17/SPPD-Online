<?php
	include_once('connection.php');
	$id = $_POST['opd'];
	// $id = 15;
	$sql = "SELECT nama FROM bufferpns WHERE kodetrans = ".$id;

	//use for MySQLi-OOP
	$query = $conn->query($sql);
	$data = [];
	while($row = $query->fetch_assoc()){
		$data[] = $row['nama'];
	}
	echo json_encode($data);
?>