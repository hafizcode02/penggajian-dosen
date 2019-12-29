<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Laporan Cetak</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<style type="text/css">
		@media print {
			@page {
				margin: 0;
			}

			body {
				margin: 1.6cm;
			}
		}

		@media print {
			.hide-from-printer {
				display: none;
			}
		}

		body {
			max-height: 100%;
			max-width: 100%;
		}
	</style>
</head>

<body>
	<center>
		<table>
			<tr>
				<td>
					<img src="<?php echo base_url(); ?>template/stb.png" width="85px;" height="85px;" alt="ini icon" style="margin-right: 6px;">
				</td>
				<td>
					<center>
						<h2 style="text-align: center; margin: unset;">STIBA INVADA</h2>
						<h5 style="margin: unset;">Jl. Brigjend Dharsono No.20 Kertawinangun, Kedawung, Cirebon, Jawa Barat 45153</h5>
						<h5 style="margin: unset;">Telp : 08112433883 || Email : stibainvada.cirebon@gmail.com</h5>
					</center>
				</td>
			</tr>
		</table>
		<h4></h4>
	</center>
	<?php
	foreach ($pecah as $key) {
		?>
		<table class="table">
			<tr>
				<td width="10%">NIDN</td>
				<td>:</td>
				<td><?php echo $key->nidn ?></td>
				<td width="10%">Alamat</td>
				<td>:</td>
				<td><?php echo $key->alamat ?></td>
				<td width="10%">Tanggal</td>
				<td>:</td>
				<td><?php echo tgl_indonesia($key->tgl_penggajian) ?></td>
			</tr>
			<tr>
				<td width="10%">Nama</td>
				<td>:</td>
				<td><?php echo $key->nama ?></td>
				<td width="10%">Status</td>
				<td>:</td>
				<td><?php echo $key->status ?></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NO</th>
					<th>KETERANGAN</th>
					<th>JUMLAH</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>1</th>
					<td>Gaji Pokok</td>
					<td>Rp. <?php echo number_format($key->gapok) ?></td>
				</tr>
				<tr>
					<th>2</th>
					<td>Tunjangan Kesehatan</td>
					<td>Rp. <?php echo number_format($key->kesehatan) ?></td>
				</tr>
				<tr>
					<th>3</th>
					<td>Tunjangan Transportasi</td>
					<td>Rp. <?php echo number_format($key->transport) ?></td>
				</tr>
				<tr>
					<th>4</th>
					<td>Uang Makan</td>
					<td>Rp. <?php echo number_format($key->makan) ?></td>
				</tr>
				<tr>
					<th>5</th>
					<td>Gaji Mengajar</td>
					<td>Rp. <?php echo number_format($key->gaji_sks) ?></td>
				</tr>
				<tr>
					<th>6</th>
					<td>Uang Sertifikasi</td>
					<td>Rp. <?php echo number_format($key->sertifikasi) ?></td>
				</tr>
				<tr>
					<th colspan="2">TOTAL DITERIMA</th>
					<th>
						<?php
						$a = array($key->gapok, $key->kesehatan, $key->transport, $key->makan, $key->gaji_sks, $key->sertifikasi);
						$b = array_sum($a);
						?>
						Rp. <?php echo number_format($b); ?>
					</th>
				</tr>
			</tbody>
		</table>
		<p style="text-align: left">
			<?php $gsks = $key->honor; ?>
			* Gaji per SKS = Rp. <?php echo number_format($gsks); ?>
		</p>
		<p style="text-align: right;">
			Penerima,
			<br><br><br><br>

			<b><?php echo $key->nama ?></b>
		</p>
	<?php } ?>
</body>

</html>
