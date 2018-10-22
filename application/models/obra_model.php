<?php
class obra_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_obra($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('obras');
			$this->db->join('clientes', 'clientes.cli_id = obras.cli_id');
			$this->db->order_by("obr_nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('obras', array('obr_id' => $id));
		return $query->row_array();
	}
	public function set_obra()
	{
		$data = array('obr_nombre' => $this->input->post('obr_nombre'),
				'obr_ubicacion' => $this->input->post('obr_ubicacion'),
				'cli_id' => $this->input->post('cli_id')	
			);
		return $this->db->insert('obras', $data);
	}	
	public function edit_obra($id)
	{
		$data = array('obr_nombre' => $this->input->post('obr_nombre'),
				'obr_ubicacion' => $this->input->post('obr_ubicacion')		
			);
			$this->db->where('obr_id', $id);
		return $this->db->update('obras', $data);
	}


	public function del_obra($id)
	{
		$this->db->where('obr_id', $id);
		return $this->db->delete('obras');
	}
}

