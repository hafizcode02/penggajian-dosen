<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/bower_components/select2/dist/css/select2.min.css">
	<?php $this->load->view('bagian/css') ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<?php $this->load->view('bagian/headside'); ?>
	<?php $this->load->view('admin/penggajian/pgaji_tambah'); ?>
	<?php $this->load->view('bagian/js.php'); ?>
</body>

</html>
