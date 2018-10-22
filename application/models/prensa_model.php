<?php
class prensa_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_prensa($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('prensas');
			$this->db->order_by("pre_nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('prensas', array('pre_id' => $id));
		return $query->row_array();
	}
	public function set_prensa()
	{
		$data = array('pre_nombre' => $this->input->post('pre_nombre'),
				'pre_fecha' => $this->input->post('pre_fecha')	
			);
		return $this->db->insert('prensas', $data);
	}	
	public function edit_prensa($id)
	{
		$data = array('pre_nombre' => $this->input->post('pre_nombre'),
				'pre_fecha' => $this->input->post('pre_fecha')		
			);
			$this->db->where('pre_id', $id);
		return $this->db->update('prensas', $data);
	}
	public function del_prensa($id)
	{
		$this->db->where('pre_id', $id);
		return $this->db->delete('prensas');
	}
}