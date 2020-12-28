<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['Kd_Urut']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Member</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_opd.php">
				<input type="hidden" class="form-control" name="Kd_Urut" value="<?php echo $row['Kd_Urut']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Urut:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Urut" value="<?php echo $row['Kd_Urut']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Root:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Root" value="<?php echo $row['Kd_Root']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Urusan:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Urusan" value="<?php echo $row['Kd_Urusan']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Bidang:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Bidang" value="<?php echo $row['Kd_Bidang']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Unit:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Unit" value="<?php echo $row['Kd_Unit']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Sub:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Sub" value="<?php echo $row['Kd_Sub']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Nama Unit:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Nm_Unit" value="<?php echo $row['Nm_Unit']; ?>">
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
<div class="modal fade" id="delete_<?php echo $row['Kd_Urut']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['Nm_Unit']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_opd.php?id=<?php echo $row['Kd_Urut']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>