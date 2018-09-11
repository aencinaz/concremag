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
			$this->db->from('plantas');
			$this->db->order_by("nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('plantas', array('id_planta' => $id));
		return $query->row_array();
	}
	public function set_planta()
	{
		$data = array('nombre' => $this->input->post('nombre'),
			);
		return $this->db->insert('plantas', $data);
	}	
	public function edit_planta($id)
	{
		$data = array('nombre' => $this->input->post('nombre'),
			);
			$this->db->where('id_planta', $id);
		return $this->db->update('plantas', $data);
	}


	public function del_planta($id)
	{
		$this->db->where('id_planta', $id);
		return $this->db->delete('plantas');
	}
}

