<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header" style="padding-top: 10px; padding-left: 12px;">
						<h3 class="box-title">Managemen User</h3>
					</div>
					<?php 
					if (!empty($this->session->flashdata('message'))) {
						$pesan = $this->session->flashdata('message');
						echo $pesan;
					}
					?>
					<div class="box-body">
						<button class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbspAdd Admin</button>
						<br>
						<div class="table-responsive" style="border:unset;">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Lengkap</th>
										<th>Username</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($admin as $key) {?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $key->full_name ?></td>
											<td><?php echo $key->username ?></td>
											<?php if($this->session->userdata('id') == '1'){ ?>
												<?php if($key->idmin == '1'){?>
													<td><button class="btn btn-danger" disabled><i class="fa fa-ban"></i></button></td>
												<?php }else{ ?>
													<?php if($this->session->userdata('id')== '1'){ ?>
														<td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteData<?php echo $key->idmin ?>"><i class="fa fa-trash-o"></i></button></td></td>
														<div class="modal fade" id="deleteData<?php echo $key->idmin; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<form action="<?php echo base_url('Admin/hapus_admin/'.$key->idmin) ?>" method="POST">
																		<div class="modal-body">
																			<input type="hidden" name="idhapus" value="<?php echo $key->idmin; ?>" readonly>
																			<label style="font-family: Popins; font-size: 12pt; font-weight: lighter;">Are you sure you want to delete this admin?</label>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
																			<button type="submit" class="btn btn-success">Delete</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													<?php }else{ ?>
														<td></td>
													<?php } ?>
												<?php } ?>
											<?php }else{ ?>
												<td>No action</td>
											<?php } ?>
										</tr>
										<?php $no++; } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- modal -->
	<div class="modal fade" id="tambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" style="font-family: popins">Tambah Admin</h4>
					</div>
					<form action="<?php echo base_url('Admin/tambah_admin') ?>" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<label style="font-family: popins">Full Name</label>
								<input type="text" name="fullname" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label style="font-family: popins">Username</label>
								<input type="text" name="username" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label style="font-family: popins">Password</label>
								<input type="password" name="password" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label style="font-family: popins">Konfirmasi</label>
								<input type="password" name="konfirmasi" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
