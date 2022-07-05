<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-plus mr-1"></i>
				Form Tambah Admin
			</div>
		</div>
		<form method="post" action="<?= base_url('admin/tambah_admin_aksi') ?>" class="mr-3 ml-3">
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" name="nama_admin" class="form-control">
				<?php echo form_error('nama_admin','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username_admin" class="form-control">
				<?php echo form_error('username_admin','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password_admin" class="form-control">
				<?php echo form_error('password_admin','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<div class="form-group">
				<label>Level</label>
				<select class="form-control" name="level">
					<option value="siswa">Siswa</option>
					<option value="guru">Guru</option>
					<option value="administrator">Administrator</option>
				</select>
				<?php echo form_error('level','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<button type="submit" class="btn btn-primary mt-2">Simpan</button>
		</form>
	</div>
</div>