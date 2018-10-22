<?php
class Camion_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_camion($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('camiones');
			$this->db->order_by("cam_nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('camiones', array('cam_id' => $id));
		return $query->row_array();
	}
	public function set_camion()
	{
		$data = array('cam_nombre' => $this->input->post('cam_nombre'),
				'cam_descripcion' => $this->input->post('cam_descripcion')	
			);
		return $this->db->insert('camiones', $data);
	}	
	public function edit_camion($id)
	{
		$data = array('cam_nombre' => $this->input->post('cam_nombre'),
				'cam_descripcion' => $this->input->post('cam_descripcion')		
			);
			$this->db->where('cam_id', $id);
		return $this->db->update('camiones', $data);
	}
	public function del_camion($id)
	{
		$this->db->where('cam_id', $id);
		return $this->db->delete('camiones');
	}
}