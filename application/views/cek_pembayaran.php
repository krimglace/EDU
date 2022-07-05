<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-cart-plus mr-1"></i>
					Form Cek Pembayaran <?= $user ?>
			</div>
			<center class="mb-4">
				<legend><strong>CEK PEMBAYARAN</strong></legend>
				<table class="table table-hover table-bordered table-striped">
					<tr>
						<td width="200px"><strong>User ID</strong></td>
						<td width="300px"><?= $user ?></td>
						<td rowspan="4"></td>
					</tr>
					<tr>
						<td><strong>Nama Cabang</strong></td>
						<td><?= $nama_cabang ?></td>
					</tr>
					<tr>
						<td><strong>Total Biaya Awal</strong></td>	
						<td>Rp <?= $total_biaya ?></td>
					</tr>
					<tr>
						<td><strong>Potongan</strong></td>	
						<td>Rp <?= $potongan ?></td>
					</tr>
					<tr>
						<td><strong>DP</strong></td>	
						<td>Rp <?= $dp ?></td>
						<td class="text-center"><strong>KETERANGAN</strong></td>
					</tr>
					<?php 
					if($bayaranAwal == 0){
						echo'
							<tr>
								<td><strong>Sisa Tagihan</strong></td>
								<td>Rp '.$sisaTagihanAkhir.'</td>
								<td class="text-center"><strong>Anda Tidak Memiliki Data Tagihan</strong></td>
							</tr>
						';
					} else{
						if($angsuran_1 == ''){
							echo '
							<tr>
								<td><strong>Data Angsuran 1</strong></td>
								<td><strong>Angsuran Belum Dibayar</strong></td>
								<td class="text-center">'.anchor('pembayaran/bayar_angsuran1/'.$user,' <button class="btn btn-sm btn-primary"><i class="fas fa-plus fa-sm"></i> Bayar Angsuran</button>').'</td>
							</tr>
							<tr>
								<td><strong>Sisa Tagihan</strong></td>
								<td>Rp '.$bayaranAwal.'</td>
							</tr>
							';
						} else{
							if($angsuran_1 == $bayaranAwal){
								echo '
								<tr>
									<td><strong>Data Angsuran 1</strong></td>
									<td>Rp '.$angsuran_1.'</td>
									<td class="text-center"><strong>Angsuran Pertama Sudah Dibayar</strong></td>
								</tr>
								<tr>
									<td><strong>Sisa Tagihan</strong></td>
									<td>Rp '.$sisaTagihan1.'</td>
									<td class="text-center"><strong>Anda Tidak Memiliki Tagihan</strong></td>
								</tr>
								';
							}elseif($angsuran_2 == ''){
								echo '
								<tr>
									<td><strong>Data Angsuran 1</strong></td>
									<td>Rp '.$angsuran_1.'</td>
									<td class="text-center"><strong>Angsuran Pertama Sudah Dibayar</strong></td>
								</tr>
								<tr>
									<td><strong>Data Angsuran 2</strong></td>
									<td><strong>Angsuran Belum Dibayar</strong></td>
									<td class="text-center">'.anchor('pembayaran/bayar_angsuran2/'.$user,' <button class="btn btn-sm btn-primary"><i class="fas fa-plus fa-sm"></i> Bayar Angsuran</button>').'</td>
								</tr>
								<tr>
									<td><strong>Sisa Tagihan</strong></td>
									<td>Rp '.$sisaTagihan1.'</td>
								</tr>
								';
							} else {
								if($angsuran_2 == $sisaTagihan1){
									echo '
									<tr>
										<td><strong>Data Angsuran 1</strong></td>
										<td>Rp '.$angsuran_1.'</td>
										<td class="text-center"><strong>Angsuran Pertama Sudah Dibayar</strong></td>
									</tr>
									<tr>
										<td><strong>Data Angsuran 2</strong></td>
										<td>Rp '.$angsuran_2.'</td>
										<td class="text-center"><strong>Angsuran Kedua Sudah Dibayar</strong></td>
									</tr>
									<tr>
										<td><strong>Sisa Tagihan</strong></td>
										<td>Rp '.$sisaTagihan2.'</td>
										<td class="text-center"><strong>Anda Tidak Memiliki Tagihan</strong></td>
									</tr>
									';
								} else{
									if($angsuran_3 == $sisaTagihan2){
										echo '
										<tr>
											<td><strong>Data Angsuran 1</strong></td>
											<td>Rp '.$angsuran_1.'</td>
											<td class="text-center"><strong>Angsuran Pertama Sudah Dibayar</strong></td>
										</tr>
										<tr>
											<td><strong>Data Angsuran 2</strong></td>
											<td>Rp '.$angsuran_2.'</td>
											<td class="text-center"><strong>Angsuran Kedua Sudah Dibayar</strong></td>
										</tr>
										<tr>
											<td><strong>Data Angsuran 3</strong></td>
											<td>Rp '.$angsuran_3.'</td>
											<td class="text-center"><strong>Angsuran Ketiga Sudah Dibayar</strong></td>
										</tr>
										<tr>
											<td><strong>Sisa Tagihan</strong></td>
											<td>Rp '.$sisaTagihanAkhir.'</td>
											<td class="text-center"><strong>Anda Tidak Memiliki Tagihan</strong></td>
										</tr>
										';
									} else{
										echo '
										<tr>
											<td><strong>Data Angsuran 1</strong></td>
											<td>Rp '.$angsuran_1.'</td>
											<td class="text-center"><strong>Angsuran Pertama Sudah Dibayar</strong></td>
										</tr>
										<tr>
											<td><strong>Data Angsuran 2</strong></td>
											<td>Rp '.$angsuran_2.'</td>
											<td class="text-center"><strong>Angsuran Kedua Sudah Dibayar</strong></td>
										</tr>
										<tr>
											<td><strong>Sisa Tagihan</strong></td>
											<td>Rp '.$sisaTagihanAkhir.'</td>
											<td class="text-center">'.anchor('pembayaran/bayar_angsuran3/'.$user,' <button class="btn btn-sm btn-primary"><i class="fas fa-plus fa-sm"></i> Bayar Sisa Angsuran</button>').'</td>
										</tr>
										';
									}
								}
							}
						}
					}
					?>
				</table>
			</center>
		</div>
	</div>
</div>