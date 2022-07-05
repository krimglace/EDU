<?php 

	class Dashboard extends CI_Controller{

		public function index()
		{	
			$data['cabang'] = $this->dashboard_model->tampil_data('tb_cabang')->result();
			$this->load->view('administrator_templates/header');
			$this->load->view('administrator_templates/sidebar');
			$this->load->view('dashboard',$data);
			$this->load->view('administrator_templates/footer');
		}
	}

?>