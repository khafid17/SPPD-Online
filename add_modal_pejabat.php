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
			<form method="POST" action="add_pejabat.php">
				<div class="form-group">
				  <label for="opd">OPD</label>
				  <select class="form-control" id="opd" onchange='pilihOpd()' name="opd">
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
				<div class="row form-group">
						<label class="control-label modal-label">Pejabat:</label>
						<input type="text" class="form-control" name="pejabat" required>
					</div>
				<div class="row form-group">
						<label class="control-label modal-label">Nama:</label>
						<input type="text" class="form-control" name="nama" required>
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
						<label class="control-label modal-label">Nip:</label>
						<input type="text" class="form-control" name="nip" required>
					</div>
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