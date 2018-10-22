<?php
class Cliente_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_cliente($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('clientes');
			$this->db->order_by("cli_nombre", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('clientes', array('cli_id' => $id));
		return $query->row_array();
	}

	public function get_obras($id)
	{
		$query = $this->db->get_where('obras', array('cli_id' => $id));
		return $query->result_array();
	}

	public function set_cliente()
	{
		$data = array('cli_nombre' => $this->input->post('cli_nombre'),
				'cli_rut' => $this->input->post('cli_rut'),
				'cli_telefono' => $this->input->post('cli_telefono'),
				'cli_direccion' => $this->input->post('cli_direccion')
			);
		return $this->db->insert('clientes', $data);
	}	
	public function edit_cliente($id)
	{
		$data = array('cli_nombre' => $this->input->post('cli_nombre'),
				'cli_rut' => $this->input->post('cli_rut'),
				'cli_telefono' => $this->input->post('cli_telefono'),
				'cli_direccion' => $this->input->post('cli_direccion')
				);
			$this->db->where('cli_id', $id);
		return $this->db->update('clientes', $data);
	}
	public function del_cliente($id)
	{
		$this->db->where('cli_id', $id);
		return $this->db->delete('clientes');
	}
     
}

