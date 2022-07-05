<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-file mr-1"></i>
					Form Cek Invoice | <?= $user ?>
			</div>
			<?= anchor('Export/Invoice/'.$user,' <button class="btn btn-sm btn-warning mb-3"><i class="fas fa-download fa-sm"></i> Export to PDF</button>')?>
		</div>
		<div class="main-content">
			<table class="table table-bordered table-striped">
				<tr>
					<th colspan="5"><br></th>
				</tr>
				<tr class="text-center">
					<th colspan="5"><img src="<?= base_url('assets/mystyle/img/LogoEdulab.png') ?>" width="150"></th>
				</tr>
				<tr>
					<td colspan="2"><strong>Tanggal</strong></td>
					<td colspan="3">&nbsp; <input type="" name="" value="<?= date('l, d / M / Y') ?>" readonly class="bg-dark"></td>
				</tr>
				<tr>
					<td colspan="2"><strong>User ID</strong></td>
					<td colspan="3">&nbsp; <input type="" name="" value="<?= $user ?>" readonly class="bg-dark"></td>
				</tr>
				<tr>
					<td colspan="5"><br></td>
				</tr>
				<tr class="text-center">
					<th colspan="5" class="bg-warning">Nota Invoice</th>
				</tr>
				<tr class="text-center">
					<th width="50px">NO</th>
					<th>PRICE</th>
					<th>ARP</th>
					<th>ARO</th>
					<th>STATUS</th>
				</tr>
				<?php $no=1; ?>
				<tr class="text-center">
					<td><?= $no++ ?></td>
					<td>Rp <?= $price ?></td>
					<td>Rp <?= $arp ?></td>
					<td>Rp <?= $aro ?></td>
					<td><strong> <?= $status ?> </strong></td>
				</tr>
					<tr>
					<td colspan="5"><br></td>
				</tr>
				<tr>
					<th colspan="4"></th>
					<th colspan="1" class="text-center">Bandung, <?= date('d / M / Y') ?></th>
				</tr>
				<tr>
					<td colspan="5"><br></td>
				</tr>
				<tr>
					<th colspan="4"></th>
					<th colspan="1" class="text-center">Edulab</th>
				</tr>
				<tr>
					<td colspan="5"><br></td>
				</tr>
			</table>
		</div>
	</div>
</div>