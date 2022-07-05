<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-plus mr-1"></i>
				Form Tambah Cabang
			</div>
		</div>
		<form method="post" action="<?= base_url('cabang_belajar/tambah_cabang_aksi') ?>" class="mr-3 ml-3">
			<div class="form-group">
				<label>Nama Cabang</label>
				<input type="text" name="nama_cabang" class="form-control">
				<?php echo form_error('nama_cabang','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<div class="form-group">
				<label>Lokasi Cabang</label>
				<input type="text" name="lokasi_cabang" class="form-control">
				<?php echo form_error('lokasi_cabang','<div class="text-danger small ml-3">','</div>') ?>
			</div>
			<button type="submit" class="btn btn-primary mt-2">Simpan</button>
		</form>
	</div>
</div>