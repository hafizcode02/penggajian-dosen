<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Dashboard
			<small>Dosen</small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Cek Gaji</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<?php if (count($gatot) > 0) { ?>
						<?php foreach ($gatot as $key) {
							$a = $key->gaji_sks;
							$b = $key->gapok;
							$c = $key->kesehatan;
							$d = $key->transport;
							$e = $key->makan;
							$f = $key->sertifikasi;
							$ttl = $a + $b + $c + $d + $e + $f;
							?>
							Total Gaji Anda Bulan Ini adalah Rp. <?php echo number_format($ttl); ?>
							<hr class="hrc">
							<div class="ptext">
								<div class="ptext-size-font">
									Rincian Gaji
								</div>
								<hr class="hrc">
								<?php if($key->id_status == '1'){ ?>
									<table border="0" width="60%">
										<tr>
											<td>Gaji Pokok</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->gapok) ?></td>
										</tr>
										<tr>
											<td>Tunjangan Kesehatan</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->kesehatan) ?></td>
										</tr>
										<tr>
											<td>Tunjangan Transportasi</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->transport) ?></td>
										</tr>
										<tr>
											<td>Uang Makan</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->makan) ?></td>
										</tr>
										<tr>
											<td>Gaji Mengajar</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->gaji_sks) ?></td>
										</tr>
										<tr>
											<td>Uang Sertifikasi</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->sertifikasi) ?></td>
										</tr>
									</table>
								<?php }else if($key->id_status == '2'){ ?>
									<table border="0" width="60%">
										<tr>
											<td>Tunjangan Kesehatan</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->kesehatan) ?></td>
										</tr>
										<tr>
											<td>Tunjangan Transportasi</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->transport) ?></td>
										</tr>
										<tr>
											<td>Uang Makan</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->makan) ?></td>
										</tr>
										<tr>
											<td>Gaji Mengajar</td>
											<td> : </td>
											<td>Rp. <?php echo number_format($key->gaji_sks) ?></td>
										</tr>
									</table>

								<?php } ?>
							</div>
						<?php } ?>
					<?php } else { ?>
						Maaf Gaji Anda Belum Turun
					<?php } ?>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</section>
	</div>
