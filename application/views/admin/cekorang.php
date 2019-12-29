<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		<?php
		if ($this->session->userdata('status') != 'haslogin') {
			echo "Dosen | Dashboard";
		} else {
			echo "AdminPGAJI | Dashboard";
		}
		?>
	</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/loader.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/animate.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>template/logo.png">
	<script type="text/javascript">
		function pindah(url) {
			window.location = url;
		}
	</script>
	<style>
		.kotak {
			width: 100%;
			height: 300px;
		}
		html {
			overflow-y: scroll;
			overflow-x: hidden;
		}
		::-webkit-scrollbar {
			width: 0px;
			background: transparent;
		}
	</style>
</head>

<body>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body" style="padding-top:unset;">
					<br>
					<div class="table-responsive" style="border:unset;">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Nidn</th>
									<th>Nama</th>
									<th>Pekerjaan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($sql as $key) { ?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $key->nidn ?></td>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->status ?></td>
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
	<script src="<?php echo base_url(); ?>template/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<script src="<?php echo base_url(); ?>template/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/raphael/raphael.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/morris.js/morris.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url(); ?>template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo base_url(); ?>template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>template/bower_components/fastclick/lib/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>template/dist/js/adminlte.min.js"></script>
	<script src="<?php echo base_url(); ?>template/dist/js/pages/dashboard.js"></script>
	<script src="<?php echo base_url(); ?>template/dist/js/demo.js"></script>
	<script>
		$(function() {
			$('#example2').DataTable({
				'responsive': true,
				'paging': false,
				'lengthChange': false,
				'ordering': true,
				'info': false,
				'autoWidth': false,
				'searching' : false,

			});
		});
	</script>
	<script type="text/javascript">
		function onReady(callback) {
			var intervalID = window.setInterval(checkReady, 400);

			function checkReady() {
				if (document.getElementsByTagName('body')[0] !== undefined) {
					window.clearInterval(intervalID);
					callback.call(this);
				}
			}
		}

		function show(id, value) {
			document.getElementById(id).style.display = value ? 'block' : 'none';
		}
		onReady(function() {
			show('page', true);
			show('loading', false);
		});
	</script>
	<script>
		function input_number(evt) {
			var ch = String.fromCharCode(evt.which);
			if (!/[0-9]/.test(ch)) {
				evt.preventDefault();
			}
		}
	</script>
	<script>
		function input_char(evt) {
			var ch = String.fromCharCode(evt.which);
			var filter = /[a-zA-Z_ ]/;
			if (!filter.test(ch)) {
				event.returnValue = false;
			}
		}
	</script>
</body>

</html>
