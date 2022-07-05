<?php

	class User_model extends CI_Model{

		public function tampil_data($table)
		{
			return $this->db->get($table);
		}
		public function cekIdUser()
		{
			$query = $this->db->query('SELECT MAX(user_id) as iduser from tb_user');
			$hasil = $query->row();
			return $hasil->iduser;
		}
		public function insert_data()
		{
			$this->user_id		= $_POST['user_id'];
			$this->nama_user	= $_POST['nama_user'];
			$this->nama_cabang	= $_POST['nama_cabang'];
			$this->db->insert('tb_user', $this);

		}
		public function delete_data($id)
		{
			$query = $this->db->query('DELETE FROM tb_user WHERE user_id = "'.$id.'"');
			return $query;
		}

	}


?>