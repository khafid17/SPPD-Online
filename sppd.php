<?php
	session_start();
	include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<style>
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}
	</style>
</head>
<body>
<div class="container" style="margin-left: -100px">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Insert New Record</a>
				<!-- <a href="print_pdf.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a> -->
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Nomor</th>
						<th>Tanggal Berangkat</th>
						<th>Tanggal Pulang</th>
						<th>OPD</th>
						<th>Personil</th>
						<th>Kota Berangkat</th>
						<th>Kota Tujuan</th>
						<th>Alamat Lengkap Tujuan</th>
						<th>Maksud Tujuan</th>
						<th>Dasar Perjalanan Dinas</th>
						<th>Konfirmasi</th>
						<!-- <th>Action</th> -->
					</thead>
					<tbody>
						<?php
							include_once('connection.php');
							$sql = "SELECT * FROM sppd join transopd on sppd.instansianggaran = transopd.Kd_Urut";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							$no =1;
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$no++."</td>
									<td>".$row['tanggalberangkat']."</td>
									<td>".$row['tanggalpulang']."</td>
									<td>".$row['Nm_Unit']."</td>
									<td><a href='#personil' onclick='modalpersonel(".$row['nomor'].")' class='btn btn-info btn-sm' data-toggle='modal'><span class='fa fa-eye'></span> Lihat</a></td>
									<td>".$row['tempatberangkat']."</td>
									<td>".$row['tempattujuan']."</td>
									<td>".$row['alamattujuan']."</td>
									<td>".$row['maksudtujuan']."</td>
									<td><a href='#jalandinas' onclick='modaldinas(".$row['nomor'].")' class='btn btn-info btn-sm' data-toggle='modal'><span class='fa fa-eye'></span> Tambah</a></td>
									<td>" ?>
										<?php if ($row['status']) { ?>
											<a href="downloadsppd.php?nomor=<?= $row['nomor'] ?>" class='btn btn-success btn-sm'><span class='fa fa-download'></span> Download SPPD</a> <hr> <a href="downloadlampiran.php?nomor=<?= $row['nomor'] ?>" class='btn btn-success btn-sm'><span class='fa fa-download'></span> Download Lampiran</a> <hr> <a href="downloadsurattugas.php?nomor=<?= $row['nomor'] ?>" class='btn btn-success btn-sm'><span class='fa fa-download'></span> Surat Tugas</a>
										<?php }else{ ?>
										<a href='#konfirmasi' onclick="setidsppd(<?= $row['nomor'] ?>)" class='btn btn-info btn-sm' data-toggle='modal'><span class='fa fa-eye'></span> Konfirmasi</a>
									<?php } 
									echo "</td>
					
									
								</tr>";
								include('edit_delete_modal_sppd.php');
							}
						
						?>
					</tbody>
				</table>			
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="personil" role="document" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Daftar Personil</h4></center>
            </div>

            <div id="personelmodal"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="jalandinas" role="document" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Tambah Dasar</h4></center>
            </div>

            <div id="dasarmodal"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="addpersonil" role="document" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Tambah Personil</h4></center>
            </div>

			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="addpersonil.php">
						<input type="hidden" name="idsppd" id="idsppd">
						<div class="row form-group">
							<label class="control-label modal-label">Nama</label>
							<input type="text" class="form-control" name="nama" required>
						</div>
						
						<div class="row form-group">
							<label class="control-label modal-label">Nip</label>
							<input type="text" class="form-control" name="nip" required>
						</div>
						<div class="row form-group">
							<label for="opd">Pangkat</label>
							<select class="form-control" id="pangkat" onchange='pilihPangkat()' name="pangkat">
								<option value="">-Pilih PANGKAT-</option>
								<?php
											include_once('connection.php');
											$sql = "SELECT * FROM pangkat";
											//use for MySQLi-OOP
											$query = $conn->query($sql);
											while($row = $query->fetch_assoc()){
												echo '<option value="'.$row['pangkat'].'">'.$row['pangkat'].'</option>';
								} ?>
							</select>
						</div>
						<div class="row form-group">
							<label class="control-label modal-label">Jabatan</label>
							<input type="text" class="form-control" name="jabatan" required>
						</div>
				</div>
			</div>

            <div class="modal-footer">
            	<input type="submit" value="Simpan" class="btn btn-primary">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addjalandinas" role="document" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Tambah Dasar Dinas</h4></center>
            </div>

			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="jalandinas.php">
						<input type="hidden" name="idsppd" id="idsppd2">
						<div class="row form-group">
							<label class="control-label modal-label">Keterangan</label>
							<input type="text" class="form-control" name="ket" required>
						</div>
						
				</div>
			</div>

            <div class="modal-footer">
            	<input type="submit" value="Simpan" class="btn btn-primary">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal konfirmas -->
<div class="modal fade" id="konfirmasi" role="document" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Konfirmasi SPPD</h4></center>
            </div>

			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="konfirmasi_sppd.php">
						<input type="hidden" name="idsppd" id="idsppd3">
						<div class="row form-group">
							<label for="opd">Pejabat</label>
							<select class="form-control" id="pejabat" name="pejabat">
								<option value="">-Pilih Pejabat-</option>
								<?php
											include_once('connection.php');
											$sql = "SELECT * FROM pejabat";
											//use for MySQLi-OOP
											$query = $conn->query($sql);
											while($row = $query->fetch_assoc()){
												echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
								} ?>
							</select>
						</div>
						<div class="row form-group">
							<label class="control-label modal-label">Tanggal Dikeluarkan</label>
							<input type="date" class="form-control" name="tgldikeluarkan" required>
						</div>
						
						<div class="row form-group">
							<label class="control-label modal-label">Dikeluarkan di</label>
							<input type="text" class="form-control" name="dikeluarkandi" required>
						</div>
				</div>
			</div>

            <div class="modal-footer">
            	<input type="submit" value="Simpan" class="btn btn-primary">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php 
include('add_modal_sppd.php');
?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
	$(document).ready(function(){
		//inialize datatable
	    $('#myTable').DataTable();

	    //hide alert
	    $(document).on('click', '.close', function(){
	    	$('.alert').hide();
	    })
	});

	function modalpersonel(id) {
		$('#personelmodal').hide();
		$.ajax({
			type: "POST",
			url: 'personil_modal_sppd.php',
			data: {
				id: id
			},
			dataType: 'html'
		}).done(function (response) {
			$('#personelmodal').show();
			$('#personelmodal').html(response);
		});
	}

	function modaldinas(id) {
		$('#dasarmodal').hide();
		$.ajax({
			type: "POST",
			url: 'modal_jalan_dinas.php',
			data: {
				idsppd: id
			},
			dataType: 'html'
		}).done(function (response) {
			$('#dasarmodal').show();
			$('#dasarmodal').html(response);
		});
	}

	function setidsppd(id) {
		document.getElementById("idsppd").value = id;
		document.getElementById("idsppd2").value = id;
		document.getElementById("idsppd3").value = id;
	}

</script>
</body>
</html>

