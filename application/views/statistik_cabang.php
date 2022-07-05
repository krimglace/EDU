<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-question-circle"></i>
				Statistik Data Cabang
			</div>
			<?= $this->session->flashdata('pesan') ?>
			<?= anchor('Export/Statistik_Cabang',' <button class="btn btn-sm btn-warning mb-3"><i class="fas fa-download fa-sm"></i> Export to Excel</button>')?>
		</div>
		<table class="table table-bordered table-striped table-hover text-center">
			<tr class="bg-info">
				<th rowspan="2"><br>NO</th>
				<th rowspan="2" width="75px"><br>NAMA CABANG</th>
				<th rowspan="2" width="75px"><br>JUMLAH USER</th>
				<th rowspan="2" width="75px"><br>USER LUNAS</th>
				<th rowspan="2" width="150px"><br>USER BELUM LUNAS</th>
				<th rowspan="2"><br>PRICE TOTAL</th>
				<th rowspan="2"><br>ARP TOTAL</th>
				<th rowspan="2"><br>ARO TOTAL</th>
				<th colspan="3">PERSENTASE BAYAR USER</th>
			</tr>
			<tr class="bg-info">
				<th>> 50%</th>
				<th>= 50%</th>
				<th>< 50%</th>
			</tr>

			<?php

			$no = 1;
			foreach($join_statistik as $stat) :

			?>
			<tr>
				<td><?= $no++ ?></td>
				<?php
					if($stat->nama_cabang > 1){
						$stat->nama_cabang = 0;
					}
				?>
				<td><?= $stat->nama_cabang ?></td>
				<?php
					$this->db->like('nama_cabang', $stat->nama_cabang);
					$this->db->from('tb_user');
				?>
				<td><?= $this->db->count_all_results(); ?></td>
				<?php
					$query = $this->db->query("SELECT COUNT(tb_user.user_id) as status FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.total_biaya - (tb_tagihan.potongan+tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3) = 0) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

					$query1 = $this->db->query("SELECT COUNT(tb_user.user_id) as status FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.total_biaya - (tb_tagihan.potongan+tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3) != 0) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

					$sql = $this->db->query("SELECT SUM(tb_tagihan.total_biaya) AS total FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

					$sql1 = $this->db->query("SELECT SUM(tb_tagihan.potongan) AS potongan FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

					$sql2 = $this->db->query("SELECT SUM(tb_tagihan.dp) AS dp FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

					$sql3 = $this->db->query("SELECT SUM(tb_tagihan.angsuran_1) AS a1 FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

					$sql4 = $this->db->query("SELECT SUM(tb_tagihan.angsuran_2) AS a2 FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

					$sql5 = $this->db->query("SELECT SUM(tb_tagihan.angsuran_3) AS a3 FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

					$sql6 = $this->db->query("SELECT COUNT(tb_user.user_id) as tagihan FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3 < (tb_tagihan.total_biaya - tb_tagihan.potongan)/2) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

					$sql7 = $this->db->query("SELECT COUNT(tb_user.user_id) as tagihan FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3 = (tb_tagihan.total_biaya - tb_tagihan.potongan)/2) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

					$sql8 = $this->db->query("SELECT COUNT(tb_user.user_id) as tagihan FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3 > (tb_tagihan.total_biaya - tb_tagihan.potongan)/2) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

					$lunas = $query->row()->status;
					$belumlunas = $query1->row()->status;
					$biaya_awal = $sql->row()->total;
					$pot = $sql1->row()->potongan;
					$bayaran_awal = $sql2->row()->dp;
					$angsuran_1 = $sql3->row()->a1;
					$angsuran_2 = $sql4->row()->a2;
					$angsuran_3 = $sql5->row()->a3;
					$tagihanlebih = $sql6->row()->tagihan;
					$tagihansama = $sql7->row()->tagihan;
					$tagihankurang = $sql8->row()->tagihan;

					$price = $biaya_awal - $pot;
					$arp = $bayaran_awal + $angsuran_1 + $angsuran_2 + $angsuran_3;
					$aro = $price - $arp;
				?>
				<td><?= $lunas ?></td>
				<td><?= $belumlunas; ?></td>
				<td>Rp <?= $price ?></td>
				<td>Rp <?= $arp ?></td>
				<td>Rp <?= $aro ?></td>
				<td><?=  $tagihanlebih ?></td>
				<td><?=  $tagihansama ?></td>
				<td><?=  $tagihankurang ?></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>