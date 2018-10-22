<?php
class planta_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_planta($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('PLANTAS');
			$this->db->order_by("pla_nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('PLANTAS', array('pla_id' => $id));
		return $query->row_array();
	}
	public function set_planta()
	{
		$data = array('pla_nombre' => $this->input->post('pla_nombre'),
			);
		return $this->db->insert('PLANTAS', $data);
	}	
	public function edit_planta($id)
	{
		$data = array('pla_nombre' => $this->input->post('pla_nombre'),
			);
			$this->db->where('pla_id', $id);
		return $this->db->update('PLANTAS', $data);
	}


	public function del_planta($id)
	{
		$this->db->where('pla_id', $id);
		return $this->db->delete('PLANTAS');
	}
}

