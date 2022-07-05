<?php

	class Cabang_model extends CI_Model{

		public $table = 'tb_cabang';
		public $id = 'id_cabang';
		public $order = 'DESC';
		public function tampil_data($table)
		{
			return $this->db->get($table);
		}
		public function insert_data($data,$table)
		{
			$this->db->insert($table,$data);
		}

	}

?>