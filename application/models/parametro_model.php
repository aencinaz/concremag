<?php
class Parametro_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_parametros()
	{
			$this->db->select('*');
			$this->db->from('parametros');
			$query = $this->db->get();
			return $query->row_array();

	}

	public function update_formulario_ensaye()
	{
		$data = array('par_formulario_ensaye_cabecera' => $this->input->post('par_formulario_ensaye_cabecera'));
		return $this->db->update('parametros', $data);
	}	
	public function update_resistencia()
	{
		$data = array(
			'par_resistencia_pie_a_nombre' => $this->input->post('par_resistencia_pie_a_nombre'),
			'par_resistencia_pie_a_cargo' => $this->input->post('par_resistencia_pie_a_cargo'),
			'par_resistencia_pie_b_nombre' => $this->input->post('par_resistencia_pie_b_nombre'),
			'par_resistencia_pie_b_cargo' => $this->input->post('par_resistencia_pie_b_cargo')
			);
		return $this->db->update('parametros', $data);
	}	
	public function update_ensayo()
	{
		$data = array(
			'par_ensayo_equipo_des_1' => $this->input->post('par_ensayo_equipo_des_1'),
			'par_ensayo_equipo_des_2' => $this->input->post('par_ensayo_equipo_des_2'),
			'par_ensayo_equipo_codigo_1' => $this->input->post('par_ensayo_equipo_codigo_1'),
			'par_ensayo_equipo_codigo_2' => $this->input->post('par_ensayo_equipo_codigo_2'),
			'par_ensayo_equipo_certificado_1' => $this->input->post('par_ensayo_equipo_certificado_1'),
			'par_ensayo_equipo_certificado_2' => $this->input->post('par_ensayo_equipo_certificado_2'),
			'par_ensayo_equipo_calibracion_1' => $this->input->post('par_ensayo_equipo_calibracion_1'),
			'par_ensayo_equipo_calibracion_2' => $this->input->post('par_ensayo_equipo_calibracion_2'),
			'par_ensayo_equipo_emitido_1' => $this->input->post('par_ensayo_equipo_emitido_1'),
			'par_ensayo_equipo_emitido_2' => $this->input->post('par_ensayo_equipo_emitido_2'),
			'par_ensayo_norma_1' => $this->input->post('par_ensayo_norma_1'),
			'par_ensayo_norma_2' => $this->input->post('par_ensayo_norma_2'),
			'par_ensayo_norma_3' => $this->input->post('par_ensayo_norma_3'),
			'par_ensayo_firma_nombre_1' => $this->input->post('par_ensayo_firma_nombre_1'),
			'par_ensayo_firma_cargo_1' => $this->input->post('par_ensayo_firma_cargo_1'),
			'par_ensayo_firma_nombre_2' => $this->input->post('par_ensayo_firma_nombre_2'),
			'par_ensayo_firma_cargo_2' => $this->input->post('par_ensayo_firma_cargo_2'),
			'par_ensayo_pie_1' => $this->input->post('par_ensayo_pie_1'),
			'par_ensayo_pie_2' => $this->input->post('par_ensayo_pie_2'),
			'par_ensayo_correlativo' => $this->input->post('par_ensayo_correlativo')
			);
		return $this->db->update('parametros', $data);
	}	
	
}