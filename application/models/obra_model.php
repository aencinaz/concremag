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
			$this->db->select('obras.*,clientes.nombre as nombre_cliente');
			$this->db->from('obras');
			$this->db->join('clientes', 'clientes.id_cliente = obras.id_cliente');
			$this->db->order_by("nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('obras', array('id_obra' => $id));
		return $query->row_array();
	}
	public function set_obra()
	{
		$data = array('nombre' => $this->input->post('nombre'),
				'ubicacion' => $this->input->post('ubicacion'),
				'id_cliente' => $this->input->post('id_cliente')	
			);
		return $this->db->insert('obras', $data);
	}	
	public function edit_obra($id)
	{
		$data = array('nombre' => $this->input->post('nombre'),
				'ubicacion' => $this->input->post('ubicacion')		
			);
			$this->db->where('id_obra', $id);
		return $this->db->update('obras', $data);
	}


	public function del_obra($id)
	{
		$this->db->where('id_obra', $id);
		return $this->db->delete('obras');
	}
}

