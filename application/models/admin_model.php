<?php

	class Admin_model extends CI_Model{

		public $table = 'tb_admin';
		public $id = 'id_admin';
		public $order = 'DESC';
		public function tampil_data($table)
		{
			return $this->db->get($table);
		}
		public function insert_data($data,$table)
		{
			$this->db->insert($table,$data);
		}

		public function hapus_data($where,$table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}

	}

?>