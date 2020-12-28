
            <div class="modal-body">
	            <div class="container-fluid">
	            <a href='#addjalandinas' onclick="setidsppd(<?= $_POST['idsppd'] ?>)" class='btn btn-info btn-sm' data-toggle='modal' data-dismiss="modal"><span class='fa fa-plus'></span> Tambah Dasar Dinas</a>	<br><br>
	            	<table id="myTable" class="table table-bordered table-striped mt-2">
						<thead>
							<th>Keterangan</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
								include_once('connection.php');
								$sql = "SELECT * FROM sppddasar Where idsppd = ".$_POST['idsppd'];

								//use for MySQLi-OOP
								$query = $conn->query($sql);
								
								while($rows = $query->fetch_assoc()){
									echo 
									"<tr>
										
										<td>".$rows['ket']."</td>
										<td>
											<a href='/delete_jalan_dinas.php/".$rows['id']."' class='btn btn-danger btn-sm' onclick='return confirm('Are you sure you want to delete this item?');'><span class='glyphicon glyphicon-trash'></span> Delete</a>
										</td> 
									</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
            