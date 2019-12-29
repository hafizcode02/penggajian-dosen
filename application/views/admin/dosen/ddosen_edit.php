 <div class="content-wrapper">
 	<section class="content">
 		<div class="box box-default">
 			<div class="box-header with-border">
 				<h3 class="box-title">Edit Dosen</h3>
 				<div class="box-tools pull-right">
 					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
 				</div>
 			</div>
 			<form action="<?php echo base_url('Admin/aksi_edit_dosen/'.$tampil['nidn']) ?>" method="POST">
 				<div class="box-body">
 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label>NIDN / NIK</label>
 								<input type="text" name="nidn" required="" autocomplete="off" class="form-control" placeholder="Masukan NIDN..." onkeypress="input_number(event)" value="<?php echo $tampil['nidn']; ?>" readonly>
 							</div>
 							<div class="form-group">
 								<label>Nama Dosen</label>
 								<input type="text" name="nama" required="" autocomplete="off" class="form-control" placeholder="Masukan Nama Dosen..." onkeypress="input_char(event)" value="<?php echo $tampil['nama']; ?>">
 							</div>
 							<div class="form-group">
 								<label>Jenis Kelamin</label>
 								<select class="form-control select2" style="width: 100%;" name="jk" required="" autocomplete="off">
 									<?php foreach($jk as $key){ ?>
 										<option value="<?php echo $key->id_jk ?>" <?php if($tampil['id_jk']==$key->id_jk){ echo "selected"; } ?>><?php echo $key->jenis_kelamin ?></option>
 									<?php } ?>
 								</select>
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label>Agama</label>
 								<select class="form-control select2" style="width:100%;" name="agama" required="" autocomplete="off">
 									<?php foreach($agama as $key){ ?>
 										<option value="<?php echo $key->id_agama ?>" <?php if($tampil['id_agama'] == $key->id_agama){ echo "selected"; } ?>><?php echo $key->agama ?></option>
 									<?php } ?>
 								</select>
 							</div>
 							<div class="form-group">
 								<label>Status</label>
 								<select name="id_gaji" class="form-control select2" style="width: 100%;" required="" autocomplete="off" id="status">
 									<?php foreach($gaji as $key){ ?>
 										<option value="<?php echo $key->id_gaji ?>" <?php if($tampil['id_gaji'] == $key->id_gaji){ echo "selected"; } ?>><?php echo $key->status ?></option>
 									<?php } ?>
 								</select>
 							</div>
 							<div class="form-group">
 								<label>Password</label>
 								<input type="password" name="password" class="form-control" placeholder="8 sampai 12 character">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label>Alamat</label>
 								<textarea class="form-control" required="" autocomplete="off" rows="4" placeholder="Alamat..." name="alamat"><?php echo $tampil['alamat']; ?></textarea>
 							</div>
 							<div class="form-group">
 								<label>Uang Sertifikasi</label>
 								<input type="text" name="uangsertifikasi" autocomplete="off" class="form-control" placeholder="Masukan Uang Sertifikasi" value="<?php echo $tampil['sertifikasi'] ?>" onkeypress="input_number(event)" id="sertifikasi">
 							</div>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-md-12">
 							<?php echo validation_errors(); ?>
 						</div>
 					</div>
 				</div>
 				<div class="box-footer">
 					<button class="btn btn-success" type="submit">Submit</button>
 					&nbsp;
 					<button class="btn btn-warning" onclick="pindah('<?php echo base_url('data-dosen') ?>')" type="button">Cancel</button>
 				</div>
 			</form>
 		</div>
 	</section>
 </div>
