<?php

class Produk_model extends CI_Model {

    public function list($limit, $start, $search)
    {
			// $this->db->limit($limit, $start);
			$this->db->select('*');

			if($search!='null')
			{
				$this->db->like('nama',$search);
				$this->db->or_like('harga',$search);
			}

			$query = $this->db->get('produk', $limit, $start);
			return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function getTotal($search)
    {
			$this->db->select('*');

			if($search!='null')
			{
				$this->db->like('nama',$search);
				$this->db->or_like('harga',$search);
			}

      return $this->db->count_all_results('produk');
    }

    public function insert($data = [])
		{
			$result = $this->db->insert('produk', $data);
			return $result;
		}

		public function show($id){
			$this->db->where('id',$id);
			$query=$this->db->get('produk');
			return $query->row();
		}

	  public function update($id, $data = [])
	  {
	    $updt=array('nama'=>$data['nama']);
	    $this->db->where('id',$id);
	    $this->db->update('produk',$updt);
	  }


		public function delete($id)
  	{
  		$this->db->where('id',$id);
  		$this->db->delete('produk');
  	}

}
