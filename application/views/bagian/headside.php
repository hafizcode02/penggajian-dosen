 <div id="loading"></div>
 <div id="page">
 	<div class="wrapper">
 		<header class="main-header">
 			<a href="<?php echo base_url('admin-dashboard') ?>" class="logo">
 				<span class="logo-mini"><b>A</b>PG</span>
 				<span class="logo-lg"><b>Admin</b>PGAJI</span>
 			</a>
 			<nav class="navbar navbar-static-top">
 				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="text-decoration: none;">
 					<span class="sr-only"></span>
 				</a>

 				<div class="navbar-custom-menu">
 					<ul class="nav navbar-nav">
 						<li class="dropdown user user-menu">
 							<a href="template/#" class="dropdown-toggle" data-toggle="dropdown">
 								<img src="<?php echo base_url(); ?>template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
 								<span class="hidden-xs" style="font-weight: bolder;"><?php echo $this->session->userdata['nama']; ?></span>
 							</a>
 							<ul class="dropdown-menu animated fadeIn faster">
 								<li class="user-header">
 									<img src="<?php echo base_url(); ?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
 									<p>
 										<?php echo $this->session->userdata['nama']; ?>
 										<br>
 										<?php if ($this->session->userdata('status') != 'haslogin') { ?>
 											Dosen
 										<?php } else { ?>
 											Admin
 										<?php } ?>
 									</p>
 								</li>
 								<li class="user-footer">
 									<div class="pull-left">
 										<button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-info<?php echo $this->session->userdata('id'); ?>">
 											Informasi Akun
 										</button>
 									</div>
 									<div class="pull-right">
 										<a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
 									</div>
 								</li>
 							</ul>
 						</li>
 					</ul>
 				</div>
 			</nav>
 		</header>
 		<aside class="main-sidebar">
 			<section class="sidebar">
 				<div class="user-panel">
 					<div class="pull-left image">
 						<img src="<?php echo base_url(); ?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
 					</div>
 					<div class="pull-left info">
 						<p><?php echo $this->session->userdata['nama']; ?></p>
 						<a href="template/#"><i class="fa fa-circle text-success"></i> Online</a>
 					</div>
 				</div>
 				<form action="#" method="get" class="sidebar-form">
 					<div class="input-group">
 						<input type="text" name="q" class="form-control" placeholder="Search...">
 						<span class="input-group-btn">
 							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
 							</button>
 						</span>
 					</div>
 				</form>
 				<ul class="sidebar-menu">
 					<li class="header">MAIN NAVIGATION</li>
 					<li class="treeview">
 						<a href="<?php echo base_url('admin-dashboard') ?>">
 							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
 						</a>
 					</li>
 					<li class="treeview">
 						<a href="<?php echo base_url('data-dosen') ?>" style="text-decoration: none;">
 							<i class="fa fa-users"></i> <span>Data Dosen</span>
 						</a>
 					</li>
 					<li class="treeview">
 						<a href="<?php echo base_url('data-gaji') ?>" style="text-decoration: none;">
 							<i class="fa fa-database"></i> <span>Data Gaji</span>
 						</a>
 					</li>
 					<li class="treeview">
 						<a href="<?php echo base_url('sks-kelola') ?>" style="text-decoration: none;">
 							<i class="fa fa-database"></i> <span>Honor sks</span>
 						</a>
 					</li>
 					<li class="treeview">
 						<a href="<?php echo base_url('data-penggajian'); ?>" style="text-decoration: none;">
 							<i class="fa fa-calculator"></i> <span>Penggajian</span>
 						</a>
 					</li>
 					<li class="treeview">
 						<a href="<?php echo base_url('admin-kelola') ?>" style="text-decoration: none;">
 							<i class="fa fa-user"></i> <span>Kelola Admin</span>
 						</a>
 					</li>
 					<li class="treeview">
 						<a href="<?php echo base_url('page-cetak') ?>" style="text-decoration: none;">
 							<i class="fa fa-book"></i> <span>Cetak</span>
 						</a>
 					</li>
 				</section>
 			</aside>
 			<!-- modal change info -->
 			<div class="modal fade" id="modal-delete<?php echo $this->session->userdata('id'); ?>">
 				<div class="modal-dialog">
 					<div class="modal-content">
 						<div class="modal-header">
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 								<span aria-hidden="true">&times;</span></button>
 								<h4 class="modal-title">Change User Data</h4>
 							</div>
 							<form action="<?php echo base_url('Admin/change_password') ?>" method="POST">
 								<div class="modal-body">
 									<div class="form-group">
 										<label>Nama Lengkap</label>
 										<input type="text" name="fullname" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>">
 										<label>Username</label>
 										<input type="text" name="username" class="form-control" value="<?php echo $this->session->userdata('username'); ?>">
 										<label>Masukan Password Lama :</label>
 										<input type="password" name="pwl" class="form-control">
 										<label>Masukan Password Baru</label>
 										<input type="password" name="pwb" class="form-control">
 										<label>Konfirmasi Password</label>
 										<input type="password" name="pwk" class="form-control">
 									</div>
 								</div>
 								<div class="modal-footer">
 									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
 									<button type="submit" class="btn btn-primary">Save changes</button>
 								</div>
 							</form>
 						</div>
 						<!-- /.modal-content -->
 					</div>
 					<!-- /.modal-dialog -->
 				</div>
 				<!-- /.modal -->
 				<!-- modal view userinfo -->
 				<div class="modal fade" id="modal-info<?php echo $this->session->userdata('id'); ?>">
 					<div class="modal-dialog">
 						<div class="modal-content">
 							<div class="modal-header">
 								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 									<span aria-hidden="true">&times;</span></button>
 									<h4 class="modal-title">Informasi Akun</h4>
 								</div>
 								<div class="modal-body">
 									<h5>Informasi Akun Anda :</h5>
 									<div class="form-group">
 										<table border="0">
 											<tr>
 												<td>Nama Lengkap</td>
 												<td>&nbsp;:&nbsp;</td>
 												<td><?php echo $this->session->userdata('nama'); ?></td>
 											</tr>
 											<tr>
 												<td>Username</td>
 												<td>&nbsp;:&nbsp;</td>
 												<td><?php echo $this->session->userdata('username'); ?></td>
 											</tr>
 										</table>
 									</div>
 								</div>
 								<div class="modal-footer">
 									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
 									<button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#modal-delete<?php echo $this->session->userdata('id'); ?>">
 										<i class="fa fa-edit"></i>&nbsp;Ubah Data
 									</button>
 								</div>
 							</div>
 							<!-- /.modal-content -->
 						</div>
 						<!-- /.modal-dialog -->
 					</div>
 					<!-- /.modal -->
