<?php
class muestra_model extends CI_Model {

	var $table = 'muestras';
	var $column_order = array(null, 'fecha_muestreo','num_muestra','nombre_obra','nombre_cliente'); //set column field database for datatable orderable
	var $column_search = array('num_muestra','fecha_muestreo','obras.nombre','clientes.nombre'); //set column field database for datatable searchable 
	var $order = array('fecha_muestreo' => 'desc'); // default order 


	public function __construct()
	{
		$this->load->database();
	}
	public function get_muestra($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('muestras.*,obras.nombre as nombre_obra,clientes.nombre as nombre_cliente');
			$this->db->from('muestras');
			$this->db->join('obras', 'obras.id_obra = muestras.id_obra');
			$this->db->join('clientes', 'clientes.id_cliente = obras.id_cliente');
			$this->db->order_by("fecha_muestreo", "desc"); 
			$query = $this->db->get();
			return $query->result_array();
		}

			$this->db->select('muestras.*,obras.nombre as nombre_obra,clientes.nombre as nombre_cliente');
			$this->db->from('muestras');
			$this->db->join('obras', 'obras.id_obra = muestras.id_obra');
			$this->db->join('clientes', 'clientes.id_cliente = obras.id_cliente');
			$this->db->where('id_muestra='.$id);
			$this->db->order_by("fecha_muestreo", "desc"); 
			$query = $this->db->get();
			return $query->row_array();
	}
	public function set_muestra()
	{

		$data = array('id_muestra' => $this->input->post('id_muestra'),
				'id_cliente' => $this->input->post('id_cliente'),
				'id_obra' => $this->input->post('id_obra'),
				'ubicacion' => $this->input->post('ubicacion'),
				'num_muestra' => $this->input->post('num_muestra'),
				'fecha_muestreo' => $this->input->post('fecha_muestreo'),	
				'elemen_hormi' => $this->input->post('elemen_hormi'),
				'guia' => $this->input->post('guia'),
				'h_planta' => $this->input->post('h_planta'),
				't_ambiente' => $this->input->post('t_ambiente'),
				'num_camion' => $this->input->post('num_camion'),
				'h_obra' => $this->input->post('h_obra'),
				'id_planta' => $this->input->post('id_planta'),
				'cntm3' => $this->input->post('cntm3'),
				'h_descarga' => $this->input->post('h_descarga'),
				't_hormigon' => $this->input->post('t_hormigon'),
				'aire' => $this->input->post('aire'),
				'h_muestreo' => $this->input->post('h_muestreo'),
				'asentamiento' => $this->input->post('asentamiento'),
				'aditivos' => $this->input->post('aditivos'),
				'compactacion' => $this->input->post('compactacion'),
				'camion' => $this->input->post('camion'),
				'hormigon_grado' => $this->input->post('hormigon_grado'),
				'fecha_ingreso_lab' => $this->input->post('fecha_ingreso_lab'),
				'observaciones' => $this->input->post('observaciones'),
				'id_cemento' => $this->input->post('id_cemento')
			);
		return $this->db->insert('muestras', $data);
	}	
	public function edit_muestra($id)
	{
		$data = array('id_muestra' => $this->input->post('id_muestra'),
				'id_cliente' => $this->input->post('id_cliente'),
				'id_obra' => $this->input->post('id_obra'),
				'ubicacion' => $this->input->post('ubicacion'),
				'num_muestra' => $this->input->post('num_muestra'),
				'fecha_muestreo' => $this->input->post('fecha_muestreo'),	
				'elemen_hormi' => $this->input->post('elemen_hormi'),
				'guia' => $this->input->post('guia'),
				'h_planta' => $this->input->post('h_planta'),
				't_ambiente' => $this->input->post('t_ambiente'),
				'num_camion' => $this->input->post('num_camion'),
				'h_obra' => $this->input->post('h_obra'),
				'planta_num' => $this->input->post('planta_num'),
				'cntm3' => $this->input->post('cntm3'),
				'h_descarga' => $this->input->post('h_descarga'),
				't_hormigon' => $this->input->post('t_hormigon'),
				'aire' => $this->input->post('aire'),
				'h_muestreo' => $this->input->post('h_muestreo'),
				'asentamiento' => $this->input->post('asentamiento'),
				'aditivos' => $this->input->post('aditivos'),
				'compactacion' => $this->input->post('compactacion'),
				'camion' => $this->input->post('camion'),
				'fec_ingreo' => $this->input->post('fec_ingreo'),
				'login' => $this->input->post('login'),
				'hormigon_grado' => $this->input->post('hormigon_grado'),
				'fecha_ingreso_lab' => $this->input->post('fecha_ingreso_lab'),
				'observaciones' => $this->input->post('observaciones'),
				'id_cemento' => $this->input->post('id_cemento')
			);
			$this->db->where('id_muestra', $id);
		return $this->db->update('muestras', $data);
	}


	public function del_muestra($id)
	{
		$this->db->where('id_muestra', $id);
		return $this->db->delete('muestras');
	}




private function _get_datatables_query()
	{
		$this->db->select('muestras.*,obras.nombre as nombre_obra,clientes.nombre as nombre_cliente');
		$this->db->from('muestras');
		$this->db->join('obras', 'obras.id_obra = muestras.id_obra');
		$this->db->join('clientes', 'clientes.id_cliente = obras.id_cliente');
		
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

