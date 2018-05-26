<?php

class Supplier_model extends CI_Model {

    public function list($limit, $start, $search)
    {
				// $this->db->limit($limit, $start);
			$this->db->select('*');

			if($search!='null')
			{ $this->db->like('nama_PT',$search); }

      $query = $this->db->get('supplier', $limit, $start);
    	return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function getTotal($search)
    {
			$this->db->select('*');

			if($search!='null')
			{ $this->db->like('nama_PT',$search); }
			
			return $this->db->count_all_results('supplier');
    }

    public function insert($data = [])
	{
	  $result = $this->db->insert('supplier', $data);
	  return $result;
	}

	public function show($kode){
		$this->db->where('kode',$kode);
		$query=$this->db->get('supplier');
		return $query->row();
	}

	  public function update($kode, $data = [])
	  {
	    $updt=array('nama'=>$data['nama']);
	    $this->db->where('kode',$kode);
	    $this->db->update('supplier',$updt);
	  }


	public function delete($kode)
  	{
  		$this->db->where('kode',$kode);
  		$this->db->delete('supplier');
  	}

}
