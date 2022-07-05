<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-user mr-1"></i>
				Form User
			</div>
			<?= $this->session->flashdata('pesan') ?>
			<?= anchor('user/tambah_user',' <button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah User</button>')?>
		</div>
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>NO</th>
				<th>USER ID</th>
				<th>NAMA USER</th>
				<th>CABANG</th>
				<th>AKSI</th>
			</tr>
			<?php $no = 1; foreach ($user as $us) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $us->user_id ?></td>
				<td><?= $us->nama_user ?></td>
				<td><?= $us->nama_cabang ?></td>
                <td width="20px"><?= anchor('user/delete/'.$us->user_id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>