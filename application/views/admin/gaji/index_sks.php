<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header" style="padding-top: 10px; padding-left: 12px;">
						<h3 class="box-title">Managemen Harga SKS</h3>
					</div>
					<?php 
					if (!empty($this->session->userdata('message'))) {
						$pesan = $this->session->userdata('message');
						echo $pesan;
					}
					?>
					<div class="box-body">
						<div class="table-responsive" style="border:unset;">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Status</th>
										<th>Harga</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($sks as $key) {?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $key->status ?></td>
											<td>Rp. <?php echo number_format($key->honor); ?></td>
											<td><button class="btn btn-primary" data-toggle="modal" data-target="#editData<?php echo $key->id_honor ?>"><i class="fa fa-edit"></i></button>
											</td>
											<!-- modal edit -->
											<div class="modal fade" id="editData<?php echo $key->id_honor; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title" style="font-family: popins">Edit SKS</h4>
														</div>
														<form action="<?php echo base_url('Admin/edit_sks/' . $key->id_honor) ?>" method="POST">
															<div class="modal-body">
																<input type="hidden" name="id_honor" value="<?php echo $key->id_honor; ?>" readonly>
																<div class="form-group">
																	<label style="font-family: popins">Status</label>
																	<select name="status" class="form-control" disabled="">
																		<option value="<?php echo $key->id_status ?>"><?php echo $key->status ?></option>
																	</select>
																</div>
																<div class="form-group">
																	<label style="font-family: popins">Harga</label>
																	<input type="text" name="harga" class="form-control" autocomplete="off" value="<?php echo $key->honor; ?>" onkeypress="input_number(event)">
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-success">Save Changes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
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
