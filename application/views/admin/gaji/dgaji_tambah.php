<div class="content-wrapper">
	<section class="content">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Dosen</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<?php if($row != 2){ ?>
			<form action="<?php echo base_url('data-aksi') ?>" method="POST">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Status Dosen</label>
								<select name="id_status" class="form-control">
									<option value="">-Pilih-</option>
									<?php foreach($status as $key){ ?>
										<option value="<?php echo $key->id_status ?>"><?php echo $key->status ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Gaji Pokok</label>
								<input type="text" name="gapok" required="" autocomplete="off" class="form-control" onkeypress="input_number(event)">
							</div>
							<div class="form-group">
								<label>Tunjangan Kesehatan</label>
								<input type="text" name="kesehatan" required="" autocomplete="off" class="form-control" onkeypress="input_number(event)">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Uang Transportasi</label>
								<input type="text" name="transport" required="" autocomplete="off" class="form-control" onkeypress="input_number(event)">
							</div>
							<div class="form-group">
								<label>Uang Makan</label>
								<input type="text" required="" autocomplete="off" name="makan" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php echo validation_errors(); ?>
							<?php

							if (!empty($pesan)) {
								echo $pesan;
							}
							?>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-success" type="submit">Submit</button>
					&nbsp;
					<button class="btn btn-warning" type="reset" onclick="pindah('data-gaji')">Cancel</button>
				</div>
			</form>
		<?php }else{ ?>
			<div class="box-body">
				Maaf Anda Tidak Bisa Menambah Data Gaji Lagi
			</div>
		<?php } ?>
		</div>
	</section>
</div>
