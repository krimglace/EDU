<?php

	class Statistik_cabang_model extends CI_Model{

		public function tampil_data_cabang()
		{
			$this->db->select('*');
			$this->db->from('tb_cabang');
			$query = $this->db->get();
			return $query;
		}
		public function export($table){
			$sql = "SELECT * FROM ".$table;
			$result = $this->db->query($sql);
			return $result;
		}
		public function tampil_data_user()
		{
			$this->db->select('*');
			$this->db->from('tb_user');
			$this->db->join('tb_cabang','tb_user.nama_cabang = tb_cabang.nama_cabang');
			$this->db->join('tb_tagihan','tb_user.user_id = tb_tagihan.user_id');
			$query = $this->db->get();
			return $query;
		}
		public function total_sum()
		{
			$sql = "SELECT SUM(total_biaya) AS total FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'";
			$result = $this->db->query($sql);
			return $result->row()->total;
		}

	}


?>