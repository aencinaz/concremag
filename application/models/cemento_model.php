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
			$this->db->order_by("nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('cementos', array('id_cemento' => $id));
		return $query->row_array();
	}
	public function set_cemento()
	{
		$data = array('nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion')	
			);
		return $this->db->insert('cementos', $data);
	}	
	public function edit_cemento($id)
	{
		$data = array('nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion')		
			);
			$this->db->where('id_cemento', $id);
		return $this->db->update('cementos', $data);
	}


	public function del_cemento($id)
	{
		$this->db->where('id_cemento', $id);
		return $this->db->delete('cementos');
	}
}

