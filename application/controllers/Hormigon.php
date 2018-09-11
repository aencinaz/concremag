<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hormigon extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		
		$data['selected']="Administración";
		$data['link_selected']="";
		$this->load->view('header',$data);
		$data['selected']="Hormigones";
		$this->load->view('main',$data);
		$this->load->view('essential_js');
		
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
		$this->load->model('hormigon_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['hormigon']=$this->hormigon_model->get_hormigon();	
  		
		$this->load->view('header',$data);
		$this->load->view('administracion\hormigon\listado',$data);
		$this->load->view('essential_js');
		
		$this->load->view('footer');
	}
	public function nuevo()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('hormigon_model');

		$data['selected']="Administración";
		$data['link_selected']="Nuevo";

		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('administracion\hormigon\nuevo',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			if($this->hormigon_model->set_hormigon())
			 	redirect(base_url().'/hormigon/listar/success', 'location');	
			else
			 	redirect(base_url().'/hormigon/listar/error', 'location');
			 
		}
	}

	public function editar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('hormigon_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;


		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['hormigon']=$this->hormigon_model->get_hormigon($id);	
			$this->load->view('header',$data);
			$this->load->view('administracion\hormigon\editar',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{

		if($this->hormigon_model->edit_hormigon($id))
			 	redirect(base_url().'/hormigon/listar/success', 'location');	
			else
			 	redirect(base_url().'/hormigon/listar/error', 'location');

	
		}
	}
	public function eliminar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('hormigon_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;


		if($this->hormigon_model->del_hormigon($id))
			 	redirect(base_url().'/hormigon/listar/success', 'location');	
			else
			 	redirect(base_url().'/hormigon/listar/error', 'location');


	}
}