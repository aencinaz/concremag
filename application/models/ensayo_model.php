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
		$query = $this->db->get_where('ensayos', array('ens_id' => $id));
		return $query->row_array();
	}


public function get_ensayo_muestra($id)
	{
		$this->db->select('*');
		$this->db->from('ensayos');
		
		$this->db->where('mue_id',$id);
		$this->db->order_by("ens_tipo_probeta", "asc"); 
		$this->db->order_by("ens_ensaye", "asc"); 
		$this->db->order_by("ens_fecha_ensaye", "asc"); 
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function set_ensayo($mue_id,$tipo_probeta,$ensaye,$fecha_ensaye,$edad)
	{
		$data = array(	'mue_id' => $mue_id,
						'ens_tipo_probeta' => $tipo_probeta,
						'ens_ensaye' => $ensaye,
						'ens_fecha_ensaye' => $fecha_ensaye,
						'ens_edad' => $edad
						);	
			
		return $this->db->insert('ensayos', $data);
	}	

	public function edit_ensayo($id)
	{	
		$data = array(
				'ens_altura_h1' => $this->input->post('altura_h1'),
				'ens_altura_h2' => $this->input->post('altura_h2'),
				'ens_altura_h3' => $this->input->post('altura_h3'),
				'ens_altura_h4' => $this->input->post('altura_h4'),
				'ens_altura_h5' => $this->input->post('altura_h5'),
				'ens_ancho_a1' => $this->input->post('ancho_a1'),
				'ens_ancho_a2' => $this->input->post('ancho_a2'),
				'ens_ancho_b1' => $this->input->post('ancho_b1'),
				'ens_ancho_b2' => $this->input->post('ancho_b2'),
				'ens_diametro_d1' => $this->input->post('diametro_d1'),
				'ens_diametro_d2' => $this->input->post('diametro_d2'),
				'ens_largo_h1' => $this->input->post('largo_h1'),
				'ens_largo_h2' => $this->input->post('largo_h2'),
				'ens_largo_h3' => $this->input->post('largo_h3'),
				'ens_largo_h4' => $this->input->post('largo_h4'),
				'ens_aerea' => $this->input->post('aerea'),
				'ens_volumen' => $this->input->post('volumen'),
				'ens_masa' => $this->input->post('masa'),
				'ens_densidad' => $this->input->post('densidad'),
				'ens_carga_max' => $this->input->post('carga_max'),
				'ens_resistencia_cubica' => $this->input->post('resistencia_cubica'),
				'ens_resistencia_mpa' => $this->input->post('resistencia_mpa'),
				'ens_observaciones' => $this->input->post('observaciones'),
				'ens_masa_sss' => $this->input->post('masasss'),
				'ens_masa_sumergida' => $this->input->post('masa_sumergida'),
				'ens_resistencia_cilindrica_mpa' => $this->input->post('ResistenciaCilindricaMPA'),
				'ens_resistencia_cilindrica_kgc2' => $this->input->post('ResistenciaCilindricaKGc2'),
				'ens_carga_corregida' => $this->input->post('carga_corregida')
			);

			$this->db->where('ens_id', $id);
		return $this->db->update('ensayos', $data);
	}

}
