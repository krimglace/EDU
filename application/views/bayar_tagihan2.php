<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<?php foreach($detail_user as $du) : ?>
			<div class="alert alert-success">
				<i class="fas fa-cart-plus mr-1"></i>
					Form Bayar Tagihan Kedua | <?= $du->user_id ?>
			</div>
			<form method="post" action="<?= base_url('pembayaran/tambah_angsuran2_aksi') ?>">
				<div class="form-group">
					<label>User ID</label>
					<input type="text" name="user_id" value="<?= $du->user_id ?>" readonly class="form-control">
				</div>
				<?php
					foreach($detail_tagihan as $dt) :
					$bayaranTagihan = $dt->total_biaya - ($dt->potongan+$dt->dp+$dt->angsuran_1);	
				?>
				<div class="form-group">
					<label>Sisa Tagihan</label>
					<input type="text" name="sisa_tagihan" value="Rp <?= $bayaranTagihan ?>" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label>Bayar Tagihan</label>
					<input type="number" name="angsuran_2" class="form-control">
					<?php echo form_error('angsuran_2','<div class="text-danger small ml-3">','</div>') ?>
				</div>
				<?php endforeach ?>
				<button type="submit" class="btn btn-primary">Bayar</button>
			</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>