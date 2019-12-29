<div class="content-wrapper">
	<section class="content">
		<div class="box box-default" style="margin-bottom: 5px;">
			<div class="box-header with-border">
				<h3 class="box-title">Hitung Penggajian</h3>
			</div>
			<form action="<?php echo base_url('aksi-hitung') ?>" method="POST">
				<div class="box-body" style="padding-top:24px;">
					<div class="row">
						<div class="col-md-6">
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama Dosen</label>
									<select class="form-control select3" style="width: 100%;" autocomplete="off" name="dosen" required>
										<option value="">-Pilih-</option>
										<?php foreach ($dosen as $key) { ?>
											<option value="<?php echo $key->nidn ?>"><?php echo $key->nama ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Tanggal Penggajian</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" name="tanggal" class="form-control pull-right" id="datepicker" value="<?php echo date("m/d/Y"); ?>" required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Absen Hadir</label>
									<input type="text" name="absenhadir" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Jumlah SKS per Hadir</label>
									<input type="text" name="skshadir" class="form-control" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h5 class="box-title r-b">MENUNGGU PENGGAJIAN</h5>
							<iframe frameborder="0" src="<?php echo base_url(); ?>Admin/cekorang" scrolling="auto" width="100%" height="300"></iframe>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-success" type="submit">Submit</button>
					&nbsp;
					<button class="btn btn-warning" type="reset" onclick="pindah('data-penggajian')">Cancel</button>
				</div>
			</form>
		</div>
	</section>
</div>
