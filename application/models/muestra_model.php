<?php
class muestra_model extends CI_Model {

	var $table = 'MUESTRAS';
	var $column_order = array(null, 'mue_fecha_muestreo','mue_n_muestra','mue_elemento','obr_nombre','cli_nombre'); //set column field database for datatable orderable
	var $column_search = array('mue_n_muestra','mue_fecha_muestreo','obr_nombre','cli_nombre','mue_elemento'); //set column field database for datatable searchable 
	var $order = array('mue_fecha_muestreo' => 'desc'); // default order 


	public function __construct()
	{
		$this->load->database();
	}
	public function get_muestra($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('MUESTRAS');
			$this->db->join('obras', 'obras.obr_id = MUESTRAS.obr_id');
			$this->db->join('clientes', 'clientes.cli_id = obras.cli_id');
			$this->db->order_by("mue_fecha_muestreo", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
		}

			$this->db->select('*');
			$this->db->from('MUESTRAS');
			$this->db->join('obras', 'obras.obr_id = MUESTRAS.obr_id');
			$this->db->join('clientes', 'clientes.cli_id = obras.cli_id');
			$this->db->join('aditivos', 'aditivos.adi_id = muestras.adi_id','left');
			$this->db->join('hormigones', 'hormigones.hor_id = muestras.hor_id','left');
			$this->db->join('camiones', 'camiones.cam_id = muestras.cam_id','left');
			$this->db->join('cementos', 'cementos.cem_id = muestras.cem_id','left');
			$this->db->join('plantas', 'plantas.pla_id = muestras.pla_id','left');
			
			$this->db->where('mue_id='.$id);
			$this->db->order_by("mue_fecha_muestreo", "desc"); 
			$query = $this->db->get();
			return $query->row_array();
	}
	public function set_muestra($mue_elemento)
	{

		$data = array('mue_id' => $this->input->post('mue_id'),
				'mue_elemento' => $mue_elemento,
				'obr_id' => $this->input->post('obr_id'),
				'mue_ubicacion' => $this->input->post('ubicacion'),
				'mue_n_muestra' => $this->input->post('num_muestra'),
				'mue_fecha_muestreo' => $this->input->post('mue_fecha_muestreo'),
				'mue_fecha_ingreso_lab' => $this->input->post('fecha_ingreso_lab'),	
				'mue_elemento_hormigonado' => $this->input->post('elemen_hormi'),
				'mue_guia' => $this->input->post('guia'),
				'mue_hora_planta' => $this->input->post('h_planta'),
				'mue_temperatura_ambiente' => $this->input->post('t_ambiente'),
				'mue_numero_camion' => $this->input->post('num_camion'),
				'mue_hora_obra' => $this->input->post('h_obra'),
				'pla_id' => $this->input->post('pla_id'),
				'mue_cntm3' => $this->input->post('cntm3'),
				'mue_hora_descarga' => $this->input->post('h_descarga'),
				'mue_temperatura_hormigon' => $this->input->post('t_hormigon'),
				'mue_aire' => $this->input->post('aire'),
				'mue_hora_muestreo' => $this->input->post('h_muestreo'),
				'mue_asentamiento_cono' => $this->input->post('asentamiento'),
				'adi_id' => $this->input->post('adi_id'),
				'mue_compactacion' => $this->input->post('compactacion'),
				'cam_id' => $this->input->post('camion'),
				'hor_id' => $this->input->post('hor_id'),
				'mue_observaciones' => $this->input->post('observaciones'),
				'cem_id' => $this->input->post('id_cemento')
			);
		return $this->db->insert('MUESTRAS', $data);
	}	
	public function edit_muestra($id)
	{
		$data = array('mue_id' => $this->input->post('mue_id'),
				'obr_id' => $this->input->post('obr_id'),
				'mue_ubicacion' => $this->input->post('ubicacion'),
				'mue_num_muestra' => $this->input->post('num_muestra'),
				'mue_fecha_muestreo' => $this->input->post('fecha_muestreo'),	
				'mue_elemen_hormi' => $this->input->post('elemen_hormi'),
				'mue_guia' => $this->input->post('guia'),
				'mue_h_planta' => $this->input->post('h_planta'),
				'mue_t_ambiente' => $this->input->post('t_ambiente'),
				'mue_num_camion' => $this->input->post('num_camion'),
				'mue_h_obra' => $this->input->post('h_obra'),
				'mue_planta_num' => $this->input->post('planta_num'),
				'mue_cntm3' => $this->input->post('cntm3'),
				'mue_h_descarga' => $this->input->post('h_descarga'),
				'mue_t_hormigon' => $this->input->post('t_hormigon'),
				'mue_aire' => $this->input->post('aire'),
				'mue_h_muestreo' => $this->input->post('h_muestreo'),
				'mue_asentamiento' => $this->input->post('asentamiento'),
				'mue_aditivos' => $this->input->post('aditivos'),
				'mue_compactacion' => $this->input->post('compactacion'),
				'mue_camion' => $this->input->post('camion'),
				'mue_fec_ingreo' => $this->input->post('fec_ingreo'),
				'mue_login' => $this->input->post('login'),
				'mue_hormigon_grado' => $this->input->post('hormigon_grado'),
				'mue_fecha_ingreso_lab' => $this->input->post('fecha_ingreso_lab'),
				'mue_observaciones' => $this->input->post('observaciones'),
				'cem_id' => $this->input->post('cem_id')
			);
			$this->db->where('mue_id', $id);
		return $this->db->update('MUESTRAS', $data);
	}


	public function del_muestra($id)
	{
		$this->db->where('id_muestra', $id);
		return $this->db->delete('MUESTRAS');
	}




private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from('muestras');
		$this->db->join('obras', 'obras.obr_id = muestras.obr_id');
		$this->db->join('clientes', 'clientes.cli_id = obras.cli_id');
		
		//$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	

}

