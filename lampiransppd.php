
<?php
// Require composer autoload
// require_once('path/vendor/autoload.php');
// use \Mpdf\Output\Destination;
// Create an instance of the class:
// $mpdf = new \Mpdf\Mpdf();

	$nomor = $_GET['nomor'];
	include_once('connection.php');
	$sql = "SELECT sppd.nama as nmsppd, pejabat.nama as nmpejabat, sppd.nip as sppdnip, pejabat.nip as pejabatnip, sppd.pangkat as sppdpangkat, pejabat.pangkat as pangkatpejabat, sppd.*, pejabat.*, transopd.*  FROM sppd join transopd on sppd.instansianggaran = transopd.Kd_Urut join pejabat on sppd.pejabat = pejabat.id  WHERE nomor = $nomor";

	$sqlpengikut = "SELECT * FROM sppdpengikut WHERE idsppd = $nomor";

	//use for MySQLi-OOP
	$query = $conn->query($sql);
	$pengikut = $conn->query($sqlpengikut);

	while($row = $query->fetch_assoc()){ ?>
	<!-- // $html = ' -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		p{
			/*font-size: 60px*/
		}
	</style>
</head>
<body style="padding: 0px 20px 0px 20px">
		<table align="right" style="margin-right: 150px">
		</table>
	
	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<td width="48%"></td>
			<td width="52%">Berangkat : <?= $row['tempatberangkat'] ?> <br> Ke &emsp;&emsp;&emsp;: <?= $row['tempattujuan'] ?><br> Pada &emsp;&emsp;&nbsp;: <?= $row['tanggalberangkat'] ?> <br><br><br><br><center><div style="width: 100%"><span style="text-align: center;"><u><?= $row["nmsppd"] ?></u></b><br><?= $row["sppdpangkat"] ?> <br>NIP. <?= $row["sppdnip"] ?> </span></div></center></td>
		</tr>
		<tr>
			<td width="48%">II. Tiba di &nbsp;: <br> &emsp; Pada &ensp;&ensp;: <br><br><br><br><br></td>
			<td width="52%">Berangkat : <br> Ke &emsp;&emsp;&emsp;: <br> Pada &emsp;&emsp;&nbsp;: <br><br><br><br></td>
		</tr>
		<tr>
			<td width="48%">III. Tiba di &nbsp;: <br> &emsp;&nbsp; Pada &ensp;&ensp;: <br><br><br><br><br></td>
			<td width="52%">Berangkat : <br> Ke &emsp;&emsp;&emsp;: <br> Pada &emsp;&emsp;&nbsp;: <br><br><br><br></td>
		</tr>====
		<tr>
			<td width="48%">IV. Tiba di &nbsp;: <br> &emsp;&nbsp; Pada &ensp;&ensp;: <br><br><br><br><br></td>
			<td width="52%">Berangkat : <br> Ke &emsp;&emsp;&emsp;: <br> Pada &emsp;&emsp;&nbsp;: <br><br><br><br></td>
		</tr>
		<tr>
			<td width="48%"></td>
			<td width="52%">v. Telah Telah diperiksa dengan keterangan bahwa
			perjalanan atas perintahnya dan sematamata untuk kepentingan jabatan dalam
			waktu yang sesingkat-singkatnya <br> <center> <b>Kepala Dinas <br>Komunikasi Dan  Informatika <br> Kabupaten Demak <br><br><br><br><br><u>  <?= $row["nmpejabat"] ?> </u></b> <br> <?= $row["pangkatpejabat"] ?> <br> NIP. <?= $row["pejabatnip"] ?> </center>
			</td>
		</tr>
		<tr>
			<td colspan="2">VI. Catatan lain-lain <br></td>
		</tr>
	</table>
	<p>VII. PERHATIAN <br><span style="margin-left: 30px; text-align: justify;">Pejabat yang berwenang menerbitkan SPPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendaharawan bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila Negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.</span></p>
</body>
</html>
<?php } ?>

