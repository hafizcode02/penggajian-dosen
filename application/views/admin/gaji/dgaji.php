<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header" style="padding-top: 10px; padding-left: 12px;">
						<h3 class="box-title">Managemen Data Gaji</h3>
					</div>
					<?php 
					if (!empty($this->session->flashdata('message'))) {
						$pesan = $this->session->flashdata('message');
						echo $pesan;
					}
					?>
					<div class="box-body">
						<?php
						$hitung = $row;
						if ($row != 2) {
							?>
							<button class="btn btn-primary" style="margin-bottom: 10px" onclick="pindah('tambah-data')"><i class="fa fa-plus"></i>&nbspAdd Data</button>
						<?php } else { ?>
							<button class="btn btn-primary" style="margin-bottom: 10px" onclick="pindah('tambah-data')" disabled><i class="fa fa-plus"></i>&nbspAdd Data</button>
						<?php } ?>
						<br>
						<div class="table-responsive" style="border:unset;">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Pekerjaan</th>
										<th>Gaji Pokok</th>
										<th>Kesehatan</th>
										<th>Transport</th>
										<th>Uang Makan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($gaji as $key) { ?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $key->status ?></td>
											<td>Rp.<?php echo number_format($key->gapok); ?></td>
											<td>Rp.<?php echo number_format($key->kesehatan); ?></td>
											<td>Rp.<?php echo number_format($key->transport); ?></td>
											<td>Rp.<?php echo number_format($key->makan); ?></td>
											<td><button class="btn btn-primary" onclick="pindah('Admin/tampil_edit/<?php echo $key->id_gaji ?>')"><i class="fa fa-edit"></i></button>
												<button class="btn btn-danger" data-toggle="modal" data-target="#deleteData<?php echo $key->id_gaji ?>"><i class="fa fa-trash-o"></i></button></td>
												<!-- tombol delete -->
												<div class="modal fade" id="deleteData<?php echo $key->id_gaji; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="<?php echo base_url('Admin/hapus_aksi/' . $key->id_gaji) ?>" method="POST">
																<div class="modal-body">
																	<input type="hidden" name="idhapus" value="<?php echo $key->id_gaji; ?>" readonly>
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
