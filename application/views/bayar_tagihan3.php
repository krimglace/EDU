<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<?php foreach($detail_user as $du) : ?>
			<div class="alert alert-success">
				<i class="fas fa-cart-plus mr-1"></i>
					Form Bayar Sisa Tagihan | <?= $du->user_id ?>
			</div>
			<?= $this->session->flashdata('pesan') ?>
			<form method="post" action="<?= base_url('pembayaran/tambah_angsuran3_aksi') ?>">
				<div class="form-group">
					<label>User ID</label>
					<input type="text" name="user_id" value="<?= $du->user_id ?>" readonly class="form-control">
				</div>
				<?php
					foreach($detail_tagihan as $dt) :
					$bayaranTagihan = $dt->total_biaya - ($dt->potongan+$dt->dp+$dt->angsuran_1+$dt->angsuran_2);	
				?>
				<div class="form-group">
					<input type="hidden" name="bayaran_tagihan" value="<?= $bayaranTagihan ?>" readonly class="form-control">
				</div>
				<div class="form-group">
					<label>Sisa Tagihan</label>
					<input type="text" name="sisa_tagihan" value="Rp <?= $bayaranTagihan ?>" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label>Bayar Tagihan</label>
					<input type="number" name="angsuran_3" class="form-control">
					<?php echo form_error('angsuran_3','<div class="text-danger small ml-3">','</div>') ?>
				</div>
				<?php endforeach ?>
				<button type="submit" class="btn btn-primary">Bayar</button>
			</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>