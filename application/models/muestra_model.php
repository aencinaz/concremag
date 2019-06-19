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

			$pla_id=$this->input->post('pla_id');
			$adi_id=$this->input->post('adi_id');
			$cam_id=$this->input->post('cam_id');
			$hor_id=$this->input->post('hor_id');
			$cem_id=$this->input->post('cem_id');

			if($pla_id=='')
				$pla_id = null;
            if($adi_id=='')
				$adi_id = null;
			if($cam_id =='')
				$cam_id = null;
			if($hor_id=='')
				$hor_id = null;
			if($cem_id=='')
				$cem_id = null;


		$data = array(
				'mue_elemento' => $mue_elemento,
				'obr_id' => $this->input->post('obr_id'),
				'mue_ubicacion' => $this->input->post('ubicacion'),
				'mue_n_muestra' => $this->input->post('num_muestra'),
				'mue_fecha_muestreo' => $this->input->post('fecha_muestreo'),
				'mue_fecha_ingreso_lab' => $this->input->post('fecha_ingreso_lab'),	
				'mue_elemento_hormigonado' => $this->input->post('elemen_hormi'),
				'mue_guia' => $this->input->post('guia'),
				'mue_hora_planta' => $this->input->post('h_planta'),
				'mue_temperatura_ambiente' => $this->input->post('t_ambiente'),
				'mue_numero_camion' => $this->input->post('num_camion'),
				'mue_hora_obra' => $this->input->post('h_obra'),
				'pla_id' => $pla_id,
				'mue_cntm3' => $this->input->post('cntm3'),
				'mue_hora_descarga' => $this->input->post('h_descarga'),
				'mue_temperatura_hormigon' => $this->input->post('t_hormigon'),
				'mue_aire' => $this->input->post('aire'),
				'mue_hora_muestreo' => $this->input->post('h_muestreo'),
				'mue_asentamiento_cono' => $this->input->post('asentamiento'),
				'mue_compactacion' => $this->input->post('compactacion'),
				'cam_id' => $cam_id,
				'hor_id' => $hor_id,
				'mue_observaciones' => $this->input->post('observaciones'),
			
				'adi_id' => $adi_id,
				'cem_id' => $cem_id
			);
		
		return $this->db->insert('MUESTRAS', $data);
	}	
	public function edit_muestra($id)
	{

			$pla_id=$this->input->post('pla_id');
			$adi_id=$this->input->post('adi_id');
			$cam_id=$this->input->post('cam_id');
			$hor_id=$this->input->post('hor_id');
			$cem_id=$this->input->post('cem_id');

			if($pla_id=='')
				$pla_id = null;
            if($adi_id=='')
				$adi_id = null;
			if($cam_id =='')
				$cam_id = null;
			if($hor_id=='')
				$hor_id = null;
			if($cem_id=='')
				$cem_id = null;

			$data = array(
				'mue_ubicacion' => $this->input->post('mue_ubicacion'),
				'mue_n_muestra' => $this->input->post('mue_n_muestra'),
				'mue_fecha_ingreso_lab' => $this->input->post('mue_fecha_ingreso_lab'),	
				'mue_elemento_hormigonado' => $this->input->post('mue_elemento_hormigonado'),
				'mue_guia' => $this->input->post('mue_guia'),
				'mue_hora_planta' => $this->input->post('mue_hora_planta'),
				'mue_temperatura_ambiente' => $this->input->post('mue_temperatura_ambiente'),
				'mue_numero_camion' => $this->input->post('mue_numero_camion'),
				'mue_hora_obra' => $this->input->post('mue_hora_obra'),
				'mue_cntm3' => $this->input->post('mue_cntm3'),
				'mue_hora_descarga' => $this->input->post('mue_hora_descarga'),
				'mue_temperatura_hormigon' => $this->input->post('mue_temperatura_hormigon'),
				'mue_aire' => $this->input->post('mue_aire'),
				'mue_hora_muestreo' => $this->input->post('mue_hora_muestreo'),
				'mue_asentamiento_cono' => $this->input->post('mue_asentamiento_cono'),
				'mue_compactacion' => $this->input->post('mue_compactacion'),
				'cam_id' => $cam_id,
				'hor_id' => $hor_id,
				'mue_observaciones' => $this->input->post('mue_observaciones'),
				'adi_id' => $adi_id,
				'pla_id' => $pla_id,
				'cem_id' => $cem_id
			);
			
			$this->db->where('mue_id', $id);
		return $this->db->update('muestras', $data);
	}


	public function del_muestra($id)
	{
		$this->db->where('mue_id', $id);
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

