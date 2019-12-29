<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Log in</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="template/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="template/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="template/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="template/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="template/plugins/iCheck/square/blue.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
	<div class="login-box" style="color: white;">
		<div class="login-logo">
			<a href="#"><b>Admin</b>PGAJI</a>
		</div>

		<div class="login-box-body">
			<p class="login-box-msg">Sign in to manage salary</p>

			<form action="" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							<button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
						</div>
					</div>
				</div>
			</form>
			<div class="social-auth-links text-center">
				<?php
				echo validation_errors();
				?>
				<?php
				if (!empty($pesan)) {
					echo $pesan;
				}
				?>
			</div>
			<div class="social-auth-links text-center">
				<p>
					<hr>
				</p>
				<p>Copyright &copy; 2019 Hafiz Caniago</p>
			</div>

		</div>
	</div>

	<script src="template/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="template/plugins/iCheck/icheck.min.js"> </script>
	<script>
	</script>
</body>

</html>
