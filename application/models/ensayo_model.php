<?php
class ensayo_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_ensayo($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('ensayos');
			$this->db->order_by("fecha_ensaye", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('ensayos', array('id_ensayo' => $id));
		return $query->row_array();
	}


public function get_ensayo_muestra($id)
	{
		$this->db->select('*');
		$this->db->from('ensayos');
		
		$this->db->where('id_muestra',$id);
		$this->db->order_by("tipo_probeta", "asc"); 
		$this->db->order_by("ensaye", "asc"); 
		$this->db->order_by("fecha_ensaye", "asc"); 
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function set_ensayo($id_muestra,$tipo_probeta,$ensaye,$fecha_ensaye,$edad)
	{
		$data = array(	'id_muestra' => $id_muestra,
						'tipo_probeta' => $tipo_probeta,
						'ensaye' => $ensaye,
						'fecha_ensaye' => $fecha_ensaye,
						'edad' => $edad
						);	
			
		return $this->db->insert('ensayos', $data);
	}	

	public function edit_ensayo($id)
	{	
		$data = array(
				'altura_h1' => $this->input->post('altura_h1'),
				'altura_h2' => $this->input->post('altura_h2'),
				'ancho_a1' => $this->input->post('ancho_a1'),
				'ancho_a2' => $this->input->post('ancho_a2'),
				'ancho_b1' => $this->input->post('ancho_b1'),
				'ancho_b2' => $this->input->post('ancho_b2'),
				'diametro_d1' => $this->input->post('diametro_d1'),
				'diametro_d2' => $this->input->post('diametro_d2'),
				'largo_h1' => $this->input->post('largo_h1'),
				'largo_h2' => $this->input->post('largo_h2'),
				'largo_h3' => $this->input->post('largo_h3'),
				'largo_h4' => $this->input->post('largo_h4'),
				'aerea' => $this->input->post('aerea'),
				'volumen' => $this->input->post('volumen'),
				'masa' => $this->input->post('masa'),
				'densidad' => $this->input->post('densidad'),
				'carga_max' => $this->input->post('carga_max'),
				'resistencia_cubica' => $this->input->post('resistencia_cubica'),
				'resistencia_mpa' => $this->input->post('resistencia_mpa'),
				'observaciones' => $this->input->post('observaciones'),
				'masasss' => $this->input->post('masasss'),
				'masa_sumergida' => $this->input->post('masa_sumergida'),
				'ResistenciaCilindricaMPA' => $this->input->post('ResistenciaCilindricaMPA'),
				'ResistenciaCilindricaKGc2' => $this->input->post('ResistenciaCilindricaKGc2'),
				'carga_corregida' => $this->input->post('carga_corregida')
			);

			$this->db->where('id_ensayo', $id);
		return $this->db->update('ensayos', $data);
	}

}
