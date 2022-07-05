<?php

	class Login_model extends CI_Model{

		public function cek_login($username, $password){
			$this->db->where("username_admin", $username);
			$this->db->where("password_admin", $password);
			return $this->db->get('tb_admin');
		}

		public function getLoginData($user, $pass)
		{
			$u = $user;
			$p = MD5($pass);

			$query_cekLogin = $this->db->get_where('tb_admin', array('username_admin' => $u, 'password_admin' => $p));

			if (count($query_cekLogin->result()) > 0){
				foreach ($query_cekLogin->result() as $qck){
					foreach ($query_cekLogin->result() as $ck){
						$sess_data ['logged_in'] = TRUE;
						$sess_data ['username_admin']  = $ck->username;
						$sess_data ['password_admin']  = $ck->password;
						$sess_data ['level']  = $ck->level;
						$this->session->set_userdata($sess_data);
					}
					redirect('dashboard');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username dan Password Salah ! 
							</div>');
				redirect('login');
			}
		}

	}

?>