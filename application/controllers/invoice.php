<?php

	class Invoice extends CI_Controller{
		public function index()
		{
			$data['tagihan'] = $this->tagihan_model->tampil_data('tb_tagihan')->result();
			$data['tagihan'] = $this->user_model->tampil_data('tb_user')->result();

			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('invoice',$data);
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
					redirect('invoice');
				}
				$this->db->select('*');
				$this->db->from('tb_user as u');
				$this->db->where('u.user_id',$user_id);
				$this->db->join('tb_tagihan as t','u.user_id = t.user_id');

				$sql = $this->db->get()->result();	

				foreach($sql as $ut) {

					if($ut->angsuran_1 == ''){ $ut->angsuran_1 = 0; }
					else { $ut->angsuran_1 = $ut->angsuran_1; }

					if($ut->angsuran_2 == ''){ $ut->angsuran_2 = 0; }
					else { $ut->angsuran_2 = $ut->angsuran_2; }

					if($ut->angsuran_3 == ''){ $ut->angsuran_3 = 0; }
					else { $ut->angsuran_3 = $ut->angsuran_3; }
					$price = $ut->total_biaya - $ut->potongan;

					$arp = $ut->dp + $ut->angsuran_1 + $ut->angsuran_2 + $ut->angsuran_3;
					$aro = $price - $arp;
					
					if($aro > 0){ $status = "BELUM LUNAS"; }
					else { $status = "LUNAS"; }

					$data = array(
						'user'		=> $ut->user_id,
						'price'		=> $price,
						'arp'		=> $arp,
						'aro'		=> $aro,
						'status'	=> $status
					);

				}
				$this->load->view('administrator_templates/header');
				$this->load->view('administrator_templates/sidebar');
				$this->load->view('cek_invoice',$data);
				$this->load->view('administrator_templates/footer');
			}
		}
		public function _rulesCekUser()
		{
			$this->form_validation->set_rules('user_id','User ID','required');
		}
	}

?>