<?php
class informe_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_ensayos($obr_id,$pla_id)
	{
			$this->db->select('*');
			$this->db->from('ensayos');
			$this->db->join('calibraciones', 'calibraciones.cal_id = ensayos.cal_id', 'left');
			$this->db->join('muestras', 'muestras.mue_id = ensayos.mue_id');
			$this->db->where(array('obr_id' => $obr_id,'pla_id' => $pla_id,'ens_edad' => '90'));
			return $query->result_array();
	}
}