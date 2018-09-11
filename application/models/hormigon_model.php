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
			$this->db->order_by("nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('hormigones', array('id_hormigon' => $id));
		return $query->row_array();
	}
	public function set_hormigon()
	{
		$data = array('nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion')	
			);
		return $this->db->insert('hormigones', $data);
	}	
	public function edit_hormigon($id)
	{
		$data = array('nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion')		
			);
			$this->db->where('id_hormigon', $id);
		return $this->db->update('hormigones', $data);
	}


	public function del_hormigon($id)
	{
		$this->db->where('id_hormigon', $id);
		return $this->db->delete('hormigones');
	}
}

