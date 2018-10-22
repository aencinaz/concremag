<?php
class aditivo_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_aditivo($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('aditivos');
			$this->db->order_by("adi_nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('aditivos', array('adi_id' => $id));
		return $query->row_array();
	}
	public function set_aditivo()
	{
		$data = array('adi_nombre' => $this->input->post('adi_nombre'),
				'adi_descripcion' => $this->input->post('adi_descripcion')	
			);
		return $this->db->insert('aditivos', $data);
	}	
	public function edit_aditivo($id)
	{
		$data = array('adi_nombre' => $this->input->post('adi_nombre'),
				'adi_descripcion' => $this->input->post('adi_descripcion')		
			);
			$this->db->where('adi_id', $id);
		return $this->db->update('aditivos', $data);
	}
	public function del_aditivo($id)
	{
		$this->db->where('adi_id', $id);
		return $this->db->delete('aditivos');
	}
}