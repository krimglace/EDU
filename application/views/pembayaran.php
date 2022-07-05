<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-cart-plus mr-1"></i>
				Form Pembayaran
			</div>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<form method="post" action="<?= base_url('pembayaran/cek_user') ?>">
	    	<div class="form-group">
	    		<label>Silahkan Cek ID User</label>
	    		<input type="text" name="user_id" placeholder="Masukkan ID User" class="form-control">
	    		<?= form_error('user_id','<div class="text-danger small ml-2">','</div>') ?>
	    	</div>
	    	<button type="submit" class="btn btn-primary">Cek</button>
	    </form>
	</div>
</div>