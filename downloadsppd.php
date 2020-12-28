<?php
// Require composer autoload
require_once('path/vendor/autoload.php');
// use \Mpdf\Output\Destination;
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

	$nomor = $_GET['nomor'];
	include_once('connection.php');
	$sql = "SELECT sppd.nama as nmsppd, pejabat.nama as nmpejabat, sppd.nip as sppdnip, pejabat.nip as pejabatnip, sppddasar.ket as dasar, angkutan.ket as kendaraan, sppd.pangkat as sppdpangkat, pejabat.pangkat as pangkatpejabat, sppd.*, pejabat.*, angkutan.*, transopd.*  FROM sppd join transopd on sppd.instansianggaran = transopd.Kd_Urut join angkutan on angkutan.id = sppd.angkutan join pejabat on sppd.pejabat = pejabat.id join sppddasar on sppddasar.idsppd = sppd.nomor WHERE nomor = $nomor";

	$sqlpengikut = "SELECT * FROM sppdpengikut WHERE idsppd = $nomor";

	//use for MySQLi-OOP
	$query = $conn->query($sql);
	$pengikut = $conn->query($sqlpengikut);

	while($row = $query->fetch_assoc()){
		while($rowpengikut = $pengikut->fetch_assoc()){

		$startTimeStamp = strtotime($row["tanggalberangkat"]);
		$endTimeStamp = strtotime($row["tanggalpulang"]);

		$timeDiff = abs($endTimeStamp - $startTimeStamp);

		$numberDays = $timeDiff/86400;  // 86400 seconds in one day

		// and you might want to convert to integer
		$numberDays = intval($numberDays)+1;

	// echo "<pre>";
	// print_r ($row);
	// echo "</pre>";
	// }
	// exit();
		$html = '<!DOCTYPE html>
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
	<img src="images/kop1.jpg" style="width: 100%">
	<div style="margin-right: 150px">
		<table align="right">
			<tr>
				<td>Lembar <br> Kode <br> Nomor</td>
				<td>: <br> : <br> : <br></td>
				<td></td>
			</tr>
		</table>
	</div>
	<div style="text-align: center;"><h5 ><b>SURAT PERINTAH PERJALANAN DINAS</b></h5></div align="center">
	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<td width="4%" align="center">1.</td>
			<td width="41%">Pejabat berwenang yang memberi perintah</td>
			<td width="55%" colspan="2">'.$row["pejabat"].' </td>
		</tr>
		<tr>
			<td width="4%" align="center">2.</td>
			<td width="41%">Nama/NIP Pegawai yang diperintahkan</td>
			<td width="55%" colspan="2">'.$row["nmsppd"].'<br>'.$row["sppdnip"].'</td>
		</tr>
		<tr>
			<td width="4%" align="center">3.</td>
			<td width="41%">a. Pangkat dan Golongan ruang gaji <br> b. Jabatan/instansi <br> c. Tingkat Biaya Perjalanan Dinas</td>
			<td width="55%" colspan="2">a. '.$row["pangkat"].'<br>b. '.$row["jabatan"].'<br>c. </td>
		</tr>
		<tr>
			<td width="4%" align="center">4.</td>
			<td width="41%">Maksud Perjalanan Dinas</td>
			<td width="55%" colspan="2">'.$row["maksudtujuan"].'</td>
		</tr>
		<tr>
			<td width="4%" align="center">5.</td>
			<td width="41%">Alat angkutan yang dipergunakan</td>
			<td width="55%" colspan="2">'.$row["kendaraan"].'</td>
		</tr>
		<tr>
			<td width="4%" align="center">6.</td>
			<td width="41%">a. Tempat Berangkat <br> b. Tempat tujuan</td>
			<td width="55%" colspan="2">a. '.$row["tempatberangkat"].' <br>b. '.$row["tempattujuan"].'</td>
		</tr>
		<tr>
			<td width="4%" align="center">7.</td>
			<td width="41%">a. Lamanya Perjalanan Dinas <br> b. Tanggal berangkat <br> c. Tanggal harus kembali / tiba di tempat baru *)</td>
			<td width="55%" colspan="2">a. '.$numberDays.' <br>b. '.$row["tanggalberangkat"].' <br>c. '.$row["tanggalpulang"].'</td>
		</tr>
		<tr>
			<td width="4%" align="center">8.</td>
			<td width="41%">Pengikut : Nama dan NIP</td>
			<td width="22%" align="center">Gol. Ruang</td>
			<td width="22%" align="center">Tanda Tangan</td>
		</tr>
		<tr>
			<td width="4%" align="center"></td>
			<td width="41%">
				1. '.$rowpengikut["nama"].' <br>&ensp;&nbsp; NIP.  '.$rowpengikut['nip'].'
			</td>
			<td width="22%"></td>
			<td width="22%"></td>
		</tr>
		<tr>
			<td width="4%" align="center">9.</td>
			<td width="41%">Pembebanan Anggaran <br> a. Instansi <br> b. Mata Anggaran</td>
			<td width="55%" colspan="2"><br>a. '.$row['Nm_Unit'].' <br>b. </td>
		</tr>
		<tr>
			<td width="4%" align="center">10.</td>
			<td width="41%">Keterangan lain-lain</td>
			<td width="55%" colspan="2"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td width="7%"></td>
			<td width="73%"><i>*) Coret yang tidak perlu</i></td>
			<td>Dikeluarkan</td>
			<td>:</td>
			<td>'.$row["dikeluarkandi"].'</td>
		</tr>
		<tr>
			<td width="7%"></td>
			<td width="73%"></td>
			<td>Tanggal </td>
			<td>:</td>
			<td>'.$row["tanggaldikeluarkan"].'</td>
		</tr>
	</table><br>
	<table>
		<tr>
			<td width="60%" align="center"><b>Pelaksana SPPD</b> <br><br><br><br><br></td>
			<td align="center"><b>Kepala Dinas <br>Komunikasi Dan Informatika <br> Kabupaten Demak</b> <br><br><br><br><br></td>
		</tr>
		<tr>
			<td width="60%" align="center"><b><u>'.$row["nmsppd"].'</u></b></td>
			<td align="center"><b><u>'.$row["nmpejabat"].'</u></b></td>
		</tr>
		<tr>
			<td width="60%" align="center">'.$row["sppdpangkat"].'</td>
			<td align="center">'.$row["pangkatpejabat"].'</td>
		</tr>
		<tr>
			<td width="60%" align="center">NIP. '.$row["sppdnip"].'</td>
			<td align="center">NIP. '.$row["pejabatnip"].'</td>
		</tr>
	</table>

</body>
</html>';
}
}


// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();