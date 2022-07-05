<?php

	class Cabang_belajar extends CI_Controller{

		public function index()
		{	
			$data['cabang'] = $this->cabang_model->tampil_data('tb_cabang')->result();
			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('cabang_belajar',$data);
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_cabang()
		{
			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('cabang_belajar_form');
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_cabang_aksi()
		{
			$this->_rules();
			if($this->form_validation->run() == FALSE){
				$this->tambah_cabang();
			} else {
				$nama_cabang		= $this->input->post('nama_cabang');
				$lokasi_cabang		= $this->input->post('lokasi_cabang');

				$data = array(
					'nama_cabang'	=> $nama_cabang,
					'lokasi_cabang'	=> $lokasi_cabang
				);
				$this->cabang_model->insert_data($data,'tb_cabang');

				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Cabang Berhasil Di Tambahkan ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
				redirect('cabang_belajar');
			}
		}

		public function _rules()
		{
			$this->form_validation->set_rules('nama_cabang','Nama Cabang','required',['required'=> 'Nama Cabang Wajib Diisi!']);
			$this->form_validation->set_rules('lokasi_cabang','Lokasi Cabang','required',['required'=> 'Lokasi Cabang Wajib Diisi!']);
		}
	}

?>