<?php
class calibracion_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_calibracion($id)
	{
		$query = $this->db->get_where('calibraciones', array('cal_id' => $id));
		return $query->row_array();
	}

		public function get_calibraciones($id)
	{
		
		$query = $this->db->get_where('calibraciones', array('pre_id' => $id));
		return $query->result_array();
	}

	public function set_calibracion($id_planta)
	{
		$data = array('cal_descripcion' => $this->input->post('cal_descripcion'),
				'cal_fecha' => $this->input->post('cal_fecha'),	
				'pre_id' => $id_planta	
			);
		return $this->db->insert('calibraciones', $data);
	}	
	public function edit_calibracion($id)
	{
		$data = array('pre_nombre' => $this->input->post('cal_descricion'),
				'pre_fecha' => $this->input->post('cal_fecha')		
			);
			$this->db->where('cal_id', $id);
		return $this->db->update('calibraciones', $data);
	}
	public function del_calibracion($id)
	{
		$this->db->where('cal_id', $id);
		return $this->db->delete('calibraciones');
	}
}