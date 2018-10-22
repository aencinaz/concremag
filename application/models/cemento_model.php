<?php
class cemento_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_cemento($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('cementos');
			$this->db->order_by("cem_nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('cementos', array('cem_id' => $id));
		return $query->row_array();
	}
	public function set_cemento()
	{
		$data = array('cem_nombre' => $this->input->post('cem_nombre'),
				'cem_descripcion' => $this->input->post('cem_descripcion')	
			);
		return $this->db->insert('cementos', $data);
	}	
	public function edit_cemento($id)
	{
		$data = array('cem_nombre' => $this->input->post('cem_nombre'),
				'cem_descripcion' => $this->input->post('cem_descripcion')		
			);
			$this->db->where('cem_id', $id);
		return $this->db->update('cementos', $data);
	}
	public function del_cemento($id)
	{
		$this->db->where('cem_id', $id);
		return $this->db->delete('cementos');
	}
}