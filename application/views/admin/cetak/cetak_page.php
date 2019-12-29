<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header" style="padding-top: 10px; padding-left: 12px;">
						<h3 class="box-title">Managemen Cetak</h3>
					</div>
					<div class="box-body">
						<div class="col-md-5">
							<form action="<?php echo base_url('Admin/cetak_sgaji') ?>" method="POST">
								<h4 style="font-weight: bold">Cetak Semua Data Penggajian</h4>
								<!-- Date range -->
								<div class="form-group">
									<label style="font-weight: lighter">Pilih Tanggal :</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="reservation" name="reservation">
										<input type="hidden" name="startdate">
										<input type="hidden" name="enddate">
									</div>
									<!-- /.input group -->
								</div>
								<button class="btn btn-success" type="submit">Cetak</button>
								<!-- /.form group -->
							</form>
						</div>
						<!-- bates -->
					</div>
					<hr style="background-color: #bdbcbc;">
					<div class="box-body">
						<div class="col-md-5">
							<h4 style="font-weight: bold">Cetak Data Seluruh Dosen</h4>
							<br>
							<button class="btn btn-success" type="submit" onclick="pindah('<?php echo base_url('cetak-sdosen') ?>')" style="margin-bottom: 12px;">Cetak</button>
							<!-- /.form group -->
						</div>
						<!-- bates -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
