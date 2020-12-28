<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function hari($hari_input){
	$hari = $hari_input;
 
	switch($hari){
		case 'Sun':
			$hari_indo = "Minggu";
		break;
 
		case 'Mon':			
			$hari_indo = "Senin";
		break;
 
		case 'Tue':
			$hari_indo = "Selasa";
		break;
 
		case 'Wed':
			$hari_indo = "Rabu";
		break;
 
		case 'Thu':
			$hari_indo = "Kamis";
		break;
 
		case 'Fri':
			$hari_indo = "Jumat";
		break;
 
		case 'Sat':
			$hari_indo = "Sabtu";
		break;
		
		default:
			$hari_indo = "Tidak di ketahui";		
		break;
	}
 
	return $hari_indo;
 
}

$nomor = $_GET['nomor'];
// $nomor = 17;
	include_once('connection.php');
	$sql = "SELECT sppd.nama as nmsppd, sppd.jabatan as sppdjabatan, pejabat.nama as nmpejabat, sppd.nip as sppdnip, pejabat.nip as pejabatnip, sppddasar.ket as dasar, sppd.pangkat as sppdpangkat, pangkat.pangkat as tbpangkat, pejabat.pangkat as pangkatpejabat, sppd.*, pejabat.*, transopd.*  FROM sppd join transopd on sppd.instansianggaran = transopd.Kd_Urut join pejabat on sppd.pejabat = pejabat.id join sppddasar on sppddasar.idsppd = sppd.nomor join pangkat on sppd.jabatan = pangkat.golruang WHERE nomor = $nomor LIMIT 1"; 

	$sqlpengikut = "SELECT * FROM sppdpengikut WHERE idsppd = $nomor";
	//use for MySQLi-OOP
	$query = $conn->query($sql);
	$pengikut = $conn->query($sqlpengikut);

	while($row = $query->fetch_assoc()){
		
		$startTimeStamp = strtotime($row["tanggalberangkat"]);
		$endTimeStamp = strtotime($row["tanggalpulang"]);

		$timeDiff = abs($endTimeStamp - $startTimeStamp);

		$numberDays = $timeDiff/86400;  // 86400 seconds in one day		// and you might want to convert to integer
		$numberDays = intval($numberDays)+1;

	// echo "<pre>";
	// print_r ($row);
	// echo "</pre>";
	// }
	// exit(); ?>
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
	<img src="images/kop1.jpg" style="width: 100%">
	<div style="text-align: center;margin-top: 0px "><h5 ><b><u>SURAT TUGAS</u></b></h5><br><p>Nomor:&emsp;&emsp;/&emsp;&emsp;/</p></div align="center">
	<table>
		<tr>
			<td width="10%" >Dasar</td>
			<td width="5%">:</td>
			<td width="3%">1.</td>
			<td width="82%" colspan="3">Peraturan Daerah Kabupaten Demak Nomor 5 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kabupaten Demak </td>
		</tr>
		<tr><td colspan="6" align="center"><b>Menugaskan</b></td></tr>
		<tr>
			<td width="10%">Kepada</td>
			<td width="5%">:</td>
			<td width="3%">1.</td>
			<td width="8%">Nama</td>
			<td width="1%">:</td>
			<td width="74%"><?= $row['nmsppd'] ?></td>
		</tr>
		<tr>
			<td width="18%" colspan="3"></td>
			<td width="8%">Pangkat/Gol</td>
			<td width="1%">:</td>
			<td width="74%"><?= $row['sppdpangkat'] ?>(<?= $row['sppdjabatan'] ?>)</td>
		</tr>
		<tr>
			<td width="18%" colspan="3"></td>
			<td width="8%">NIP</td>
			<td width="1%">:</td>
			<td width="74%"><?= $row['sppdnip'] ?></td>
		</tr>
		<tr>
			<td width="18%" colspan="3"></td>
			<td width="8%">Jabatan</td>
			<td width="1%">:</td>
			<td width="74%"><?= $row['tbpangkat'] ?></td>
		</tr>
		<?php 
			$urut = 2;
			while($rowpengikut = $pengikut->fetch_assoc()){  ?>
		<tr>
			<td width="15%" colspan="2"></td>
			<td width="3%"><?= $urut ?>.</td>
			<td width="8%">Nama</td>
			<td width="1%">:</td>
			<td width="74%"><?= $rowpengikut['nama'] ?></td>
		</tr>
		<tr>
			<td width="18%" colspan="3"></td>
			<td width="8%">Pangkat/Gol</td>
			<td width="1%">:</td>
			<td width="74%"><?= $rowpengikut['pangkat'] ? $rowpengikut['pangkat'] : '-' ?></td>
		</tr>
		<tr>
			<td width="18%" colspan="3"></td>
			<td width="8%">NIP</td>
			<td width="1%">:</td>
			<td width="74%"><?= $rowpengikut['nip'] ?></td>
		</tr>
		<tr>
			<td width="18%" colspan="3"></td>
			<td width="8%">Jabatan</td>
			<td width="1%">:</td>
			<td width="74%"><?= $rowpengikut['jabatan'] ? $rowpengikut['jabatan'] : '-' ?></td>
		</tr>
			<?php $urut++; } ?>
		<tr>
			<td width="10%" align="center">Untuk</td>
			<td width="5%">:</td>
			<td width="85%" colspan="4"><?= $row['maksudtujuan'] ?> </td>
		</tr>
		<tr>
			<td width="18%" colspan="2"></td>
			<td width="8%" colspan="2">Hari</td>
			<td width="1%">:</td>
			<td width="74%"><?= hari(date('D', strtotime($row['tanggalberangkat']))); ?></td>
		</tr>
		<tr>
			<td width="18%" colspan="2"></td>
			<td width="8%" colspan="2">Tanggal</td>
			<td width="1%">:</td>
			<td width="74%"><?= tgl_indo($row['tanggalberangkat']); ?></td>
		</tr>
		<tr>
			<td width="18%" colspan="2"></td>
			<td width="8%" colspan="2">Tempat</td>
			<td width="1%">:</td>
			<td width="74%"><?= $row['tempattujuan'] ?></td>
		</tr>
	</table>
	<table align="right" style="margin-right: 130px">
		<tr>
			<td>Ditetapkan di Demak <br> Pada tanggal <?= tgl_indo($row['tanggaldikeluarkan']); ?> <br><br></td>
		</tr>
		<tr>
			<td align="center"><b>Kepala Dinas <br>Komunikasi Dan Informatika <br> Kabupaten Demak</b> <br><br><br><br><br></td>
		</tr>
		<tr>
			
			<td align="center"><b><u><?= $row["nmpejabat"] ?></u></b></td>
		</tr>
		<tr>
			
			<td align="center"><?= $row["pangkatpejabat"] ?></td>
		</tr>
		<tr>
			
			<td align="center">NIP. <?= $row["pejabatnip"] ?></td>
		</tr>
	</table>
</body>
</html>
<?php } ?>

