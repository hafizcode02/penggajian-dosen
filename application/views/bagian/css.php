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
<link rel="stylesheet" href="<?php echo base_url(); ?>template/dist/css/custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/morris.js/morris.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/loader.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/animate.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>template/logo.png">
<script type="text/javascript">
	function pindah(url) {
		window.location = url;
	}
</script>
<style>
	@font-face{
		font-family: 'Popins';
		src : url('template/fonts/Poppins-regular.ttf') format('truetype');
	}
</style>