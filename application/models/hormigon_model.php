<?php
class hormigon_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_hormigon($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('hormigones');
			$this->db->order_by("hor_nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('hormigones', array('hor_id' => $id));
		return $query->row_array();
	}
	public function set_hormigon()
	{
		$data = array('hor_nombre' => $this->input->post('hor_nombre'),
				'hor_descripcion' => $this->input->post('hor_descripcion')	
			);
		return $this->db->insert('hormigones', $data);
	}	
	public function edit_hormigon($id)
	{
		$data = array('hor_nombre' => $this->input->post('hor_nombre'),
				'hor_descripcion' => $this->input->post('hor_descripcion')		
			);
			$this->db->where('hor_id', $id);
		return $this->db->update('hormigones', $data);
	}
	public function del_hormigon($id)
	{
		$this->db->where('hor_id', $id);
		return $this->db->delete('hormigones');
	}
}

