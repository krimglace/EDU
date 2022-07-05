<?php

	class Tagihan extends CI_Controller{

		public function index(){
			$data['tagihan'] = $this->tagihan_model->tampil_data_semua('tb_tagihan')->result();
			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('tagihan',$data);
			$this->load->view('administrator_templates/footer');

		}
		public function tampil_semua(){
			$tagihan =  $this->tagihan_model->tampil_data_semua('tb_tagihan')->result();
				$no=1;
				foreach( $tagihan as $tgh ) :
				$price = $tgh->total_biaya - $tgh->potongan;
				if($tgh->angsuran_1 == ''){
					$tgh->angsuran_1 = 0;
					$tgh->angsuran_2 = 0;
					$tgh->angsuran_3 = 0;
				} else {
					$tgh->angsuran_1 = $tgh->angsuran_1;	
					if($tgh->angsuran_2 == ''){
						$tgh->angsuran_2 = 0;
						$tgh->angsuran_3 = 0;
					} else {
						$tgh->angsuran_2 = $tgh->angsuran_2;
						if($tgh->angsuran_3 == ''){
							$tgh->angsuran_3 = 0;
						} else {
							$tgh->angsuran_3 = $tgh->angsuran_3;
						}
					}
				}

				$arp = $tgh->dp + $tgh->angsuran_1 + $tgh->angsuran_2 + $tgh->angsuran_3;
				$aro = $price - $arp;
				if($aro > 0){
					$status = "BELUM LUNAS";
				} else {
					$status = "LUNAS";
				}

				$persentase = round($arp/$price * 100, 2);
			?>	
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $tgh->user_id ?></td>
				<td>Rp <?= $price ?></td>
				<td>Rp <?= $arp ?></td>
				<td>Rp <?= $aro ?></td>
				<td><?= $status ?></td>
				<td><?= $persentase ?>%</td>
			</tr>
			<?php endforeach;?>
			<?php
		}
		public function tampil_dibawah50(){
			$tagihan =  $this->tagihan_model->tampil_data_dibawah50('tb_tagihan')->result();
				$no=1;
				foreach( $tagihan as $tgh ) :
				$price = $tgh->total_biaya - $tgh->potongan;
				if($tgh->angsuran_1 == ''){
					$tgh->angsuran_1 = 0;
					$tgh->angsuran_2 = 0;
					$tgh->angsuran_3 = 0;
				} else {
					$tgh->angsuran_1 = $tgh->angsuran_1;	
					if($tgh->angsuran_2 == ''){
						$tgh->angsuran_2 = 0;
						$tgh->angsuran_3 = 0;
					} else {
						$tgh->angsuran_2 = $tgh->angsuran_2;
						if($tgh->angsuran_3 == ''){
							$tgh->angsuran_3 = 0;
						} else {
							$tgh->angsuran_3 = $tgh->angsuran_3;
						}
					}
				}

				$arp = $tgh->dp + $tgh->angsuran_1 + $tgh->angsuran_2 + $tgh->angsuran_3;
				$aro = $price - $arp;
				if($aro > 0){
					$status = "BELUM LUNAS";
				} else {
					$status = "LUNAS";
				}

				$persentase = round($arp/$price * 100, 2);
			?>	
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $tgh->user_id ?></td>
				<td>Rp <?= $price ?></td>
				<td>Rp <?= $arp ?></td>
				<td>Rp <?= $aro ?></td>
				<td><?= $status ?></td>
				<td><?= $persentase ?>%</td>
			</tr>
			<?php endforeach;?>
			<?php
		}
		public function tampil_diatas50(){
			$tagihan =  $this->tagihan_model->tampil_data_diatas50('tb_tagihan')->result();
				$no=1;
				foreach( $tagihan as $tgh ) :
				$price = $tgh->total_biaya - $tgh->potongan;
				if($tgh->angsuran_1 == ''){
					$tgh->angsuran_1 = 0;
					$tgh->angsuran_2 = 0;
					$tgh->angsuran_3 = 0;
				} else {
					$tgh->angsuran_1 = $tgh->angsuran_1;	
					if($tgh->angsuran_2 == ''){
						$tgh->angsuran_2 = 0;
						$tgh->angsuran_3 = 0;
					} else {
						$tgh->angsuran_2 = $tgh->angsuran_2;
						if($tgh->angsuran_3 == ''){
							$tgh->angsuran_3 = 0;
						} else {
							$tgh->angsuran_3 = $tgh->angsuran_3;
						}
					}
				}

				$arp = $tgh->dp + $tgh->angsuran_1 + $tgh->angsuran_2 + $tgh->angsuran_3;
				$aro = $price - $arp;
				if($aro > 0){
					$status = "BELUM LUNAS";
				} else {
					$status = "LUNAS";
				}

				$persentase = round($arp/$price * 100, 2);
			?>	
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $tgh->user_id ?></td>
				<td>Rp <?= $price ?></td>
				<td>Rp <?= $arp ?></td>
				<td>Rp <?= $aro ?></td>
				<td><?= $status ?></td>
				<td><?= $persentase ?>%</td>
			</tr>
			<?php endforeach;?>
			<?php
		}
		public function tampil_lunas(){
			$tagihan =  $this->tagihan_model->tampil_data_lunas('tb_tagihan')->result();
				$no=1;
				foreach( $tagihan as $tgh ) :
				$price = $tgh->total_biaya - $tgh->potongan;
				if($tgh->angsuran_1 == ''){
					$tgh->angsuran_1 = 0;
					$tgh->angsuran_2 = 0;
					$tgh->angsuran_3 = 0;
				} else {
					$tgh->angsuran_1 = $tgh->angsuran_1;	
					if($tgh->angsuran_2 == ''){
						$tgh->angsuran_2 = 0;
						$tgh->angsuran_3 = 0;
					} else {
						$tgh->angsuran_2 = $tgh->angsuran_2;
						if($tgh->angsuran_3 == ''){
							$tgh->angsuran_3 = 0;
						} else {
							$tgh->angsuran_3 = $tgh->angsuran_3;
						}
					}
				}

				$arp = $tgh->dp + $tgh->angsuran_1 + $tgh->angsuran_2 + $tgh->angsuran_3;
				$aro = $price - $arp;
				if($aro > 0){
					$status = "BELUM LUNAS";
				} else {
					$status = "LUNAS";
				}

				$persentase = round($arp/$price * 100, 2);
			?>	
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $tgh->user_id ?></td>
				<td>Rp <?= $price ?></td>
				<td>Rp <?= $arp ?></td>
				<td>Rp <?= $aro ?></td>
				<td><?= $status ?></td>
				<td><?= $persentase ?>%</td>
			</tr>
			<?php endforeach;?>
			<?php
		}
	}

?>