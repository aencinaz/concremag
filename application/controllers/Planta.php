<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Planta extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		
		$data['selected']="Administración";
		$data['link_selected']="";
		$this->load->view('header',$data);
		$data['selected']="Plantas";
		$this->load->view('main',$data);
		$this->load->view('footer');
	}

	public function listar($mensaje = FALSE)
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
		$this->load->model('planta_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['planta']=$this->planta_model->get_planta();	
  		
		$this->load->view('header',$data);
		$this->load->view('administracion\planta\listado',$data);
		$this->load->view('footer');
	}
	public function nuevo()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('planta_model');

		$data['selected']="Administración";
		$data['link_selected']="Nuevo";

		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('administracion\planta\nuevo',$data);
			$this->load->view('footer');
		}
		else
		{
				if($this->planta_model->set_planta())
			 	redirect(base_url().'/planta/listar/success', 'location');	
		else
			 	redirect(base_url().'/planta/listar/error', 'location');

		}
	}

	public function editar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('planta_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;


		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['planta']=$this->planta_model->get_planta($id);	
			$this->load->view('header',$data);
			$this->load->view('administracion\planta\editar',$data);
			$this->load->view('footer');
		}
		else
		{

			if($this->planta_model->edit_planta($id))
			 	redirect(base_url().'/planta/listar/success', 'location');	
		else
			 	redirect(base_url().'/planta/listar/error', 'location');
	
		}
	}
	public function eliminar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('planta_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;

		if($this->planta_model->del_planta($id))
			 	redirect(base_url().'/planta/listar/success', 'location');	
		else
			 	redirect(base_url().'/planta/listar/error', 'location');
		

	}
}