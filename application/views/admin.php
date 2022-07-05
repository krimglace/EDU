<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-user mr-1"></i>
				Form Admin
			</div>
			<?= $this->session->flashdata('pesan') ?>
			<?= anchor('admin/tambah_admin',' <button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Admin</button>')?>
		</div>
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>NO</th>
				<th>NAMA LENGKAP</th>
				<th>USERNAME</th>
				<th>LEVEL</th>
				<th>AKSI</th>
			</tr>	
			<?php
				$no=1;
				foreach( $admin as $adm ) :
			?>	
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $adm->nama_admin ?></td>
				<td><?= $adm->username_admin ?></td>
				<td><?= $adm->level ?></td>
                <td width="20px"><?= anchor('admin/delete/'.$adm->id_admin,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
			<?php endforeach;?>	
		</table>
	</div>
</div>