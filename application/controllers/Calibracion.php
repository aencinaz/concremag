<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calibracion extends CI_Controller {
	

	public function listar($id,$mensaje = FALSE)
	{
			if($mensaje == "error")
			$mensaje = array('mensaje' =>  'No se pudo completar la operación.',
							 'class' =>  	'danger',
				             'strong' =>  	'Error!'
			 );

		if($mensaje == "success")
			$mensaje = array('mensaje' =>  'Registros Actualizados.',
							 'class' => 	'success',
				             'strong' =>  	'Aceptado!'
			 );



		$data['mensaje']=$mensaje;

		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('calibracion_model');

		$data['selected']="Administración";
		$data['id']=$id;
		$data['link_selected']="Listado";
		$data['calibraciones']=$this->calibracion_model->get_calibraciones($id);	

		$this->load->view('header',$data);
		$this->load->view('administracion\calibracion\listado',$data);
		$this->load->view('essential_js');
		$this->load->view('footer');

	}
	public function nuevo($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('calibracion_model');

		$data['selected']="Administración";
		$data['link_selected']="Nuevo";

		$data['id']=$id;

		$this->form_validation->set_rules('cal_fecha', 'Fecha', 'required');
		$this->form_validation->set_rules('cal_descripcion', 'Descripcion', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('administracion\calibracion\nuevo',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			if($this->calibracion_model->set_calibracion($id))
			 	redirect(base_url().'/calibracion/listar/'.$id.'/success', 'location');	
		else
			 	redirect(base_url().'/calibracion/listar/'.$id.'/error', 'location');
			 
		}
	}

	public function editar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('calibracion_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;

		$data['calibracion']=$this->calibracion_model->get_calibracion($id);

		$this->form_validation->set_rules('cal_descripcion', 'Descripcion', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->load->view('header',$data);
			$this->load->view('administracion\calibracion\editar',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			
			if($this->calibracion_model->edit_calibracion($id))
			 	redirect(base_url().'calibracion/listar/'.$data['calibracion']['pre_id'].'/success', 'location');	
		else
			 	redirect(base_url().'calibracion/listar/'.$data['calibracion']['pre_id'].'/error', 'location');
		}
	}
	public function eliminar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('calibracion_model');
		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;
		
		if($this->calibracion_model->del_calibracion($id))
			 	redirect(base_url().'/calibracion/listar/success', 'location');	
		else
			 	redirect(base_url().'/calibracion/listar/error', 'location');
	}




public function listar_json($id)
	{
	
	$this->load->model('calibracion_model');
		$calibracion=$this->calibracion_model->get_calibraciones($id);	
		$data = array();
		foreach ($calibracion as $item) {	
			$row = array();	
			$row[] = $item['cal_id'];
			$row[] = $item['cal_descripcion'];
			$data[] =$row;
		}
		//output to json format
		echo json_encode($data);
	}
}