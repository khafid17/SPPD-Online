<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add_sppd.php">
				<div class="form-group">
				  <label for="opd">OPD</label>
				  <select class="form-control" id="opd" onchange='pilihOrang()' name="opd">
				    <option value="">-Select OPD-</option>
				    <?php
							include_once('connection.php');
							$sql = "SELECT * FROM transopd";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo '<option value="'.$row['Kd_Urut'].'">'.$row['Nm_Unit'].'</option>';
							} ?>
				  </select>
				</div>
				<div class="form-group">
				  <label for="orang">Pilih orang</label>
				  <select class="form-control" id="orang" name="orang">
				    <option id="oporang" value="">-Select orang-</option>
				   
				  </select>
				</div>
				<div class="form-group">
						<label class="control-label modal-label">Tanggal Berangkat:</label>
					
						<input type="date" class="form-control" name="tgl_berangkat" required>
					
				</div>
				<div class=" form-group">
					
						<label class="control-label modal-label">Tanggal Pulang:</label>
					
						<input type="date" class="form-control" name="tgl_pulang" required>
					
				</div>
				<div class="form-group">
				  <label>Alat Transportasi</label>
				  <select class="form-control" name="transpot">
				    <option value="">-Pilih Transportasi-</option>
				    <?php
							include_once('connection.php');
							$sql = "SELECT * FROM angkutan";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo '<option value="'.$row['id'].'">'.$row['ket'].'</option>';
							} ?>
				  </select>
				</div>
				<div class=" form-group">
						<label class="control-label modal-label">Kota Berangkat</label>
						<input type="text" class="form-control" name="kotaberangkat" required>
			
				</div>
				<div class=" form-group">
						<label class="control-label modal-label">Kota Tujuan</label>
						<input type="text" class="form-control" name="kotatujuan" required>
				</div>
				<div class=" form-group">
						<label class="control-label modal-label">Alamat Lengkap Tempat Tujuan</label>
						<input type="text" class="form-control" name="alamatlengkap" required>
				</div>

				<div class=" form-group">
						<label class="control-label modal-label">Maksud Tujuan</label>
						<textarea class="form-control" name="maksudtujuan" required></textarea>
				</div>				
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>
<!-- auto fill form -->
<script type="text/javascript">
	function pilihOrang() {
		var select = document.getElementById("orang");
		var length = select.options.length;
		for (i = length-1; i >= 0; i--) {
		  select.options[i] = null;
		}

		var opd = $( "#opd option:selected" ).val();
		console.log(opd);
		$.ajax({
			type: "POST",
			url: 'pilih_orang.php',
			data: {
				opd: opd
			},
			dataType: 'json'
		}).done(function (response) {
			if (response.length > 0) {
				for (var i = response.length - 1; i >= 0; i--) {
					$("#orang").append("<option value='>-Pilih orang-</option>");
					$("#orang").append("<option value='"+response[i]+"'>"+response[i]+"</option>");
				}
			}else{
				$("#orang").append("<option value='>-Pilih orang-</option>");
			}
			
		});
	}
</script>