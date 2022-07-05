<?php

	class Statistik_cabang extends CI_Controller{

		public function index()
		{	
			$cabang = $this->statistik_cabang_model->tampil_data_cabang()->result();
			$user = $this->statistik_cabang_model->tampil_data_user()->result();
			
			$data = array(
				'join_statistik'	=> $cabang,
				'join_statistik1'	=> $user
			);

			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('statistik_cabang',$data);
			$this->load->view('administrator_templates/footer');
		}

	}
	
?>