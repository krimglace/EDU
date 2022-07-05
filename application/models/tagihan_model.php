<?php

	class Tagihan_model extends CI_Model{

		public function insert_data()
		{
			$total_biaya = $this->input->post('total_biaya');
			$user_id = $this->input->post('user_id');
			$potongan = $this->input->post('potongan');
			$dp = $this->input->post('dp');
			
			$data = array(
				'total_biaya'	=> $total_biaya,
				'user_id'	=> $user_id,
				'potongan'	=> $potongan,
				'dp'	=> $dp
			);
			$this->db->insert('tb_tagihan',$data);
		}
		public function tampil_data($table){
			$query = "SELECT * FROM ".$table;
			$result = $this->db->query($query);
			return $result;
		}
		public function tampil_data_semua($table)
		{
			$query = "SELECT * FROM ".$table;
			$result = $this->db->query($query);
			return $result;
		}
		public function tampil_data_diatas50($table)
		{
			$query = "SELECT * FROM ".$table." WHERE (dp+angsuran_1+angsuran_2+angsuran_3) > (1/2)*(total_biaya-potongan)";
			$result = $this->db->query($query);
			return $result;
		}
		public function tampil_data_dibawah50($table)
		{
			$query = "SELECT * FROM ".$table." WHERE (dp+angsuran_1+angsuran_2+angsuran_3) < (1/2)*(total_biaya-potongan)";
			$result = $this->db->query($query);
			return $result;
		}
		public function tampil_data_lunas($table)
		{
			$query = "SELECT * FROM ".$table." WHERE (dp+angsuran_1+angsuran_2+angsuran_3) = (total_biaya-potongan)";
			$result = $this->db->query($query);
			return $result;
		}
		public $table = 'tb_user';
		public $id = 'user_id';

		public function get_by_id($id)
		{	
			$this->db->where($this->id,$id);
			return $this->db->get($this->table)->row();
		}
		public function ambil_id_user($id)
		{
			$hasil = $this->db->where('user_id', $id)->get('tb_user');
			if($hasil->num_rows() > 0){
				return $hasil->result();
			} else {
				return false;
			}
		}
		public function ambil_data_tagihan($id)
		{
			$hasil = $this->db->where('user_id', $id)->get('tb_tagihan');
			if($hasil->num_rows() > 0){
				return $hasil->result();
			} else {
				return false;
			}
		}
		public function update_data($where,$data,$table)
		{
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}

?>