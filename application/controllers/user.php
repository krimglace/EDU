<?php

	class User extends CI_Controller{

		public function index()
		{
			$data['user'] = $this->user_model->tampil_data('tb_user')->result();
			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('user',$data);
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_user()
		{	
			$cabang = $this->cabang_model->tampil_data('tb_cabang')->result();
			$dariDB = $this->user_model->cekIdUser();
			$nourut = substr($dariDB,1, 3);
			$kodeBarangSekarang = $nourut + 1;
			$data = array('user_id' => $kodeBarangSekarang, 'cabang' => $cabang);

			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('user_form',$data);
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_user_aksi()
		{
			$this->_rules();
			if($this->form_validation->run() == FALSE){
				$this->tambah_user();
			}else{
				$this->user_model->insert_data();
				$this->tagihan_model->insert_data();

				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data User Berhasil Di Tambahkan ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
				redirect('user');
			}
		}
		public function delete($id)
		{
			$where = array('user_id' => $id);
			$data['detail_user'] = $this->user_model->delete_data($id);
			
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data User Berhasil Dihapus ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
				redirect('user');
			
		}
		public function _rules()
		{
			$this->form_validation->set_rules('nama_user','Nama User','required',['required'=> 'Nama User Wajib Diisi!']);
			$this->form_validation->set_rules('total_biaya','Total Biaya','required',['required'=> 'Total Biaya Wajib Diisi!']);
			$this->form_validation->set_rules('potongan','Potongan','required',['required'=> 'Potongan Wajib Diisi!']);
			$this->form_validation->set_rules('dp','DP','required',['required'=> 'DP Wajib Diisi!']);

		}
	}

?>