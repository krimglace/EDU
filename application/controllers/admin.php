<?php

	class Admin extends CI_Controller{

		public function index()
		{
			$data['admin'] = $this->admin_model->tampil_data('tb_admin')->result();
			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('admin',$data);
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_admin()
		{
			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('admin_form');
			$this->load->view('administrator_templates/footer');
		}
		public function tambah_admin_aksi()
		{
			$this->_rules();
			if($this->form_validation->run() == FALSE){
				$this->tambah_admin();
			}else{
				$nama_admin			= $this->input->post('nama_admin');
				$username_admin		= $this->input->post('username_admin');
				$password_admin		= md5($this->input->post('password_admin'));
				$level				= $this->input->post('level');

				$data = array(
					'nama_admin'		=> $nama_admin,
					'username_admin'	=> $username_admin,
					'password_admin'	=> $password_admin,
					'level'				=> $level
				);
				$this->admin_model->insert_data($data,'tb_admin');

				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Admin Berhasil Di Tambahkan ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
				redirect('admin');
			}
		}

		public function delete($id)
		{
			$where = array('id_admin' => $id);
			$this->admin_model->hapus_data($where,'tb_admin');
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Admin Berhasil Di Hapus ! 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
							</button>
							</div>');
			redirect('admin');
		}
		public function _rules()
		{
			$this->form_validation->set_rules('nama_admin','Nama Lengkap','required',['required'=> 'Nama Lengkap Wajib Diisi!']);
			$this->form_validation->set_rules('username_admin','Username','required',['required'=> 'Username Wajib Diisi!']);
			$this->form_validation->set_rules('password_admin','Password','required',['required'=> 'Password Wajib Diisi!']);
		}
	}

?>