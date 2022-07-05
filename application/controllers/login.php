<?php

	class Login extends CI_Controller{

		public function index()
		{
			$this->load->view('index');
		}
		public function proses_login()
		{
			$this->form_validation->set_rules('username_admin','Username','required',[
				'required' => 'Username wajib diisi !'
			]);
			$this->form_validation->set_rules('password_admin','Password','required',[
				'required' => 'Password wajib di isi !'
			]);
			if ($this->form_validation->run() == FALSE ) {
				$this->load->view('index');
			}else{
				$username_admin = $this->input->post('username_admin');
				$password_admin = $this->input->post('password_admin');

				$user = $username_admin;
				$pass = md5($password_admin);

				$cek = $this->login_model->cek_login($user, $pass);

				if ($cek->num_rows() > 0){

					foreach ($cek->result() as $ck){
						$sess_data['username_email'] = $ck->username_admin;
						$sess_data['level'] = $ck->level;

						$this->session->set_userdata($sess_data);
					}
					if($sess_data['level'] == 'administrator'){
						redirect('dashboard');
					}else{
						$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Username dan Password Salah !
							</div>');
						redirect('login');
					}	
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Username dan Password Salah !
							</div>');
					redirect('login');
				}
			}
		}

		public function proses_logout(){
			$this->session->unset_userdata(array(
				'user_id'
			));
		}
		public function logout(){
			$this->proses_logout();
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show text-center" role="alert">Anda Telah Logout ! 
						</div><br>');
			redirect('login');
		}

	}

?>