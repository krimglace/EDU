<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-university mr-1"></i>
				Form Cabang Belajar
			</div>
			<?= $this->session->flashdata('pesan') ?>
			<?= anchor('cabang_belajar/tambah_cabang',' <button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Cabang</button>')?>
		</div>
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>NO</th>
				<th>NAMA CABANG</th>
				<th>LOKASI</th>
			</tr>	
			<?php
				$no=1;
				foreach( $cabang as $cbg ) :
			?>	
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $cbg->nama_cabang ?></td>
				<td><?= $cbg->lokasi_cabang ?></td>
			</tr>
			<?php endforeach;?>	
		</table>
	</div>
</div>