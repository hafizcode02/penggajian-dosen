<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header" style="padding-top: 10px; padding-left: 12px;">
						<h3 class="box-title">Managemen Data Dosen</h3>
					</div>
					<?php
					if (!empty($this->session->flashdata('message'))) {
						$pesan = $this->session->flashdata('message');
						echo $pesan;
					}
					?>
					<div class="box-body">
						<button class="btn btn-primary" style="margin-bottom: 10px" onclick="pindah('tambah-dosen')"><i class="fa fa-plus"></i>&nbspAdd Data</button>
						<br>
						<div class="table-responsive" style="border:unset;">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>NIDN / NIK</th>
										<th>Nama</th>
										<th>JK</th>
										<th>Agama</th>
										<th>Keterangan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($dosen as $key) { ?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $key->nidn ?></td>
											<td><?php echo $key->nama ?></td>
											<td><?php echo $key->jenis_kelamin ?></td>
											<td><?php echo $key->agama ?></td>
											<td><?php echo $key->status ?></td>
											<td><button class="btn btn-primary" onclick="pindah('Admin/edit_dosen/<?php echo $key->nidn ?>')"><i class="fa fa-edit"></i></button>
												<button class="btn btn-danger" data-toggle="modal" data-target="#deleteData<?php echo $key->nidn ?>"><i class="fa fa-trash-o"></i></button></td>
												<!-- tombol delete -->
												<div class="modal fade" id="deleteData<?php echo $key->nidn; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>


															<form action="<?php echo base_url('Admin/delete_dosen/' . $key->nidn) ?>" method="POST">
																<div class="modal-body">
																	<input type="hidden" name="idhapus" value="<?php echo $key->nidn; ?>" readonly>
																	<label style="font-family: Popins; font-size: 12pt; font-weight: lighter;">Are you sure you want to delete this data?</label>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-success">Delete</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</tr>
											<?php $no++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
