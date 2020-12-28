
            <div class="modal-body">
	            <div class="container-fluid">
	            <a href='#addpersonil' onclick="setidsppd(<?= $_POST['id'] ?>)" class='btn btn-info btn-sm' data-toggle='modal' data-dismiss="modal"><span class='fa fa-plus'></span> Tambah Personil</a>	<br><br>
	            	<table id="myTable" class="table table-bordered table-striped mt-2">
						<thead>
							<th>Nomor</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Pangkat</th>
							<th>Jabatan</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
								include_once('connection.php');
								$sql = "SELECT * FROM sppdpengikut Where idsppd = ".$_POST['id'];

								//use for MySQLi-OOP
								$query = $conn->query($sql);
								$no =1;
								while($rows = $query->fetch_assoc()){
									echo 
									"<tr>
										<td>".$no++."</td>
										<td>".$rows['nama']."</td>
										<td>".$rows['nip']."</td>
										<td>".$rows['pangkat']."</td>
										<td>".$rows['jabatan']."</td>
										<td>
											<a href='/delete_personil.php/".$rows['id']."' class='btn btn-danger btn-sm' onclick='return confirm('Are you sure you want to delete this item?');'><span class='glyphicon glyphicon-trash'></span> Delete</a>
										</td> 
									</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
            