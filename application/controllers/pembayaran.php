<?php

	class Pembayaran extends CI_Controller{

		public function index()
		{
			$data['tagihan'] = $this->tagihan_model->tampil_data('tb_tagihan')->result();
			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('pembayaran',$data);
			$this->load->view('administrator_templates/footer');
		}
		public function cek_user()
		{	
			$this->_rulesCekUser();
			if($this->form_validation->run() == FALSE){
				$this->index();
			} else {
				$user_id		= $this->input->post('user_id',TRUE);

				if($this->tagihan_model->get_by_id($user_id) == null){
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">User ID Tidak Ditemukan ! 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
							</button>
							</div>');
					redirect('pembayaran');
				}
				$this->db->select('*');
				$this->db->from('tb_user as u');
				$this->db->where('u.user_id',$user_id);
				$this->db->join('tb_tagihan as t','u.user_id = t.user_id');

				$sql = $this->db->get()->result();
				foreach($sql as $ut){
					if($ut->angsuran_1 == ''){ $ut->angsuran_1 = 0; }
					else { $ut->angsuran_1 = $ut->angsuran_1; }

					if($ut->angsuran_2 == ''){ $ut->angsuran_2 = 0; }
					else { $ut->angsuran_2 = $ut->angsuran_2; }

					if($ut->angsuran_3 == ''){ $ut->angsuran_3 = 0; }
					else { $ut->angsuran_3 = $ut->angsuran_3; }
						
					$bayaranAwal = $ut->total_biaya - ($ut->potongan+$ut->dp);
					$sisaTagihan1 = $bayaranAwal - $ut->angsuran_1;
					$sisaTagihan2 = $sisaTagihan1 - $ut->angsuran_2;
					$sisaTagihanAkhir = $sisaTagihan2 - $ut->angsuran_3;

					$data = array(
						'user'			=> $ut->user_id,
						'nama_cabang'	=> $ut->nama_cabang,
						'potongan'		=> $ut->potongan,
						'dp'			=> $ut->dp,	
						'angsuran_1'	=> $ut->angsuran_1,
						'angsuran_2'	=> $ut->angsuran_2,
						'angsuran_3'	=> $ut->angsuran_3,
						'total_biaya'	=> $ut->total_biaya,
						'bayaranAwal'	=> $bayaranAwal,
						'sisaTagihan1'	=> $sisaTagihan1,
						'sisaTagihan2'	=> $sisaTagihan2,
						'sisaTagihanAkhir'	=> $sisaTagihanAkhir
					);
				}
				$this->load->view('administrator_templates/header');
				$this->load->view('administrator_templates/sidebar');
				$this->load->view('cek_pembayaran',$data);
				$this->load->view('administrator_templates/footer');
			}
		}
		public function _rulesCekUser()
		{
			$this->form_validation->set_rules('user_id','User ID','required');
		}
		public function bayar_angsuran1($id)
		{	
			$where = array('user_id' => $id);
			$data['detail_user'] = $this->tagihan_model->ambil_id_user($id);
			$data['detail_tagihan'] = $this->tagihan_model->ambil_data_tagihan($id);

			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('bayar_tagihan1',$data);
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_angsuran1_aksi()
		{
			$user_id			= $this->input->post('user_id');
			$this->_rulesAng1();
			if($this->form_validation->run() == FALSE){
				$this->bayar_angsuran1($user_id);
			}else{
				$user_id			= $this->input->post('user_id');
				$angsuran_1 		= $this->input->post('angsuran_1');

				$data = array(
					'angsuran_1'	=> $angsuran_1
				);
				$where = array(
					'user_id'	=> $user_id
				);
				$this->tagihan_model->update_data($where,$data,'tb_tagihan');

				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Tagihan Berhasil Di Update ! 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
							</button>
							</div>');
				redirect('pembayaran');
			}
		}
		public function bayar_angsuran2($id)
		{	
			$where = array('user_id' => $id);
			$data['detail_user'] = $this->tagihan_model->ambil_id_user($id);
			$data['detail_tagihan'] = $this->tagihan_model->ambil_data_tagihan($id);

			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('bayar_tagihan2',$data);
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_angsuran2_aksi()
		{
			$user_id			= $this->input->post('user_id');
			$this->_rulesAng2();
			if($this->form_validation->run() == FALSE){
				$this->bayar_angsuran2($user_id);
			}else{
				$user_id			= $this->input->post('user_id');
				$angsuran_2 		= $this->input->post('angsuran_2');

				$data = array(
					'angsuran_2'	=> $angsuran_2
				);
				$where = array(
					'user_id'	=> $user_id
				);
				$this->tagihan_model->update_data($where,$data,'tb_tagihan');

				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Tagihan Berhasil Di Update ! 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
							</button>
							</div>');
				redirect('pembayaran');
			}
		}
		public function bayar_angsuran3($id)
		{	
			$where = array('user_id' => $id);
			$data['detail_user'] = $this->tagihan_model->ambil_id_user($id);
			$data['detail_tagihan'] = $this->tagihan_model->ambil_data_tagihan($id);

			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('bayar_tagihan3',$data);
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_angsuran3_aksi()
		{
			$user_id			= $this->input->post('user_id');
			$bayaran_tagihan 		= $this->input->post('bayaran_tagihan');
			$this->_rulesAng3();
			if($this->form_validation->run() == FALSE){
				$this->bayar_angsuran3($user_id);
			}else{
				$user_id			= $this->input->post('user_id');
				$angsuran_3 		= $this->input->post('angsuran_3');
				if($angsuran_3 != $bayaran_tagihan){
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Masukkan Jumlah Tagihan Yang Sesuai Dengan Sisa Tagihan
								<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
								<span aria-hidden="true">&times;</span>
								</button>
								</div>');
					$this->bayar_angsuran3($user_id);
				} elseif ($angsuran_3 == $bayaran_tagihan){
					$data = array(
						'angsuran_3'	=> $angsuran_3
					);
					$where = array(
						'user_id'	=> $user_id
					);
					$this->tagihan_model->update_data($where,$data,'tb_tagihan');

					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Tagihan Berhasil Di Update ! 
								<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
								<span aria-hidden="true">&times;</span>
								</button>
								</div>');
					redirect('pembayaran');
				}
			}
		}
		public function _rulesAng1()
		{
			$this->form_validation->set_rules('angsuran_1', 'Pembayaran Tagihan', 'required', [
				'required' => 'Pembayaran Tagihan wajib diisi!'
			]);
		}
		public function _rulesAng2()
		{
			$this->form_validation->set_rules('angsuran_2', 'Pembayaran Tagihan', 'required', [
				'required' => 'Pembayaran Tagihan wajib diisi!'
			]);
		}
		public function _rulesAng3()
		{
			$this->form_validation->set_rules('angsuran_3', 'Pembayaran Tagihan', 'required', [
				'required' => 'Pembayaran Tagihan wajib diisi!'
			]);
		}
	}

?>