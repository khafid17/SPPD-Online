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
			<form method="POST" action="add_opd.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Urut:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Urut" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Root:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Root" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Urusan:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Urusan" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Bidang:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Bidang" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Unit:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Unit" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Kode Sub:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Kd_Sub" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Nama Unit:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Nm_Unit" required>
					</div>
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