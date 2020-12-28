<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['nomor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Member</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_sppd.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">OPD:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="opd" value="<?php echo $row['opd']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Orang:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="orang" value="<?php echo $row['orang']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Tanggal Berangkat:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tgl_berangkat" value="<?php echo $row['tgl_berangkat']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Tanggal Pulang:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tgl_pulang" value="<?php echo $row['tgl_pulang']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kota Berangkat:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kotaberangkat" value="<?php echo $row['kotaberangkat']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kota Tujuan:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kotatujuan" value="<?php echo $row['kotatujuan']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Alamat Lengkap:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="alamatlengkap" value="<?php echo $row['alamatlengkap']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Maksut Tujuan:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="maksudtujuan" value="<?php echo $row['maksudtujuan']; ?>">
					</div>
				</div>

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['nomor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['nama'].' '.$row['maksudtujuan']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_sppd.php?id=<?php echo $row['nomor']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
