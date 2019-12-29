<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Dashboard
			<small>Admin Panel</small>
		</h1>
	</section>
	<?php 
	if (!empty($this->session->flashdata('message'))) {
		$pesan = $this->session->flashdata('message');
		echo $pesan;
	}
	?>
	<?php 
	if (!empty($this->session->flashdata('warning'))) {
		$pesan1 = $this->session->flashdata('warning');
		echo $pesan1;
	}
	?>
	<section class="content">
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo $dosen; ?></h3>
						<p>Data Dosen</p>
					</div>
					<div class="icon">
						<i class="fa fa-users" style="font-size: 0.72em;"></i>
					</div>
					<a href="<?php echo base_url('data-dosen') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo $gaji; ?></h3>
						<p>Data Gaji</p>
					</div>
					<div class="icon">
						<i class="fa fa-database" style="font-size: 0.72em;"></i>
					</div>
					<a href="<?php echo base_url('data-gaji') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo $penggajian; ?></h3>
						<p>Penggajian</p>
					</div>
					<div class="icon">
						<i class="fa fa-calculator" style="font-size:0.72em;"></i>
					</div>
					<a href="<?php echo base_url('data-penggajian'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?php echo $penggajian; ?></h3>
						<p>Cetak Data</p>
					</div>
					<div class="icon">
						<i class="fa fa-book" style="font-size: 0.72em;"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

		</div>
	</section>
</div>
