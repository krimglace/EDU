<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-plus mr-1"></i>
				Form Tambah User
			</div>
		</div>
		<form method="post" action="<?= base_url('user/tambah_user_aksi') ?>" class="mr-3 ml-3">
			<div class="form-group">
				<label>User Id</label>
				<input type="text" name="user_id" value="A<?= sprintf("%03s", $user_id) ?>" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama User</label>
				<input type="text" name="nama_user" class="form-control">
				<?php echo form_error('nama_user','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<div class="form-group">
				<label>Nama Cabang</label>
				<select name="nama_cabang" class="form-control">
					<?php foreach($cabang as $cbg) : ?>
					<option value="<?= $cbg->nama_cabang ?>"><?= $cbg->nama_cabang ?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label>Total Biaya</label><br>
				<input type="number" name="total_biaya" class="form-control">
				<?php echo form_error('total_biaya','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<div class="form-group">
				<label>Potongan</label>
				<input type="number" name="potongan" class="form-control">
				<?php echo form_error('potongan','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<div class="form-group">
				<label>DP</label>
				<input type="number" name="dp" class="form-control">
				<?php echo form_error('dp','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<button type="submit" class="btn btn-primary mt-2">Simpan</button>
		</form>
	</div>
</div>