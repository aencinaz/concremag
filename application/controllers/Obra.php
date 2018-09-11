<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Obra extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		
		$data['selected']="Administración";
		$data['link_selected']="";
		$this->load->view('header',$data);
		$data['selected']="Obras";
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
		$this->load->model('obra_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['obra']=$this->obra_model->get_obra();	
  		
		$this->load->view('header',$data);
		$this->load->view('administracion\obra\listado',$data);
		$this->load->view('essential_js');
		
		$this->load->view('footer');
	}


	public function nuevo()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('obra_model');

		$this->load->model('cliente_model');
		$data['clientes']=$this->cliente_model->get_cliente();	
		$data['selected']="Administración";
		$data['link_selected']="Nuevo";

		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('administracion\obra\nuevo',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{

			if($this->obra_model->set_obra())
			 	redirect(base_url().'/obra/listar/success', 'location');	
		else
			 	redirect(base_url().'/obra/listar/error', 'location');

		}
	}

	public function editar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('obra_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;


		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['obra']=$this->obra_model->get_obra($id);	
			$this->load->view('header',$data);
			$this->load->view('administracion\obra\editar',$data);
			$this->load->view('essential_js');
		
			$this->load->view('footer');
		}
		else
		{

			if($this->obra_model->edit_obra($id))
			 	redirect(base_url().'/obra/listar/success', 'location');	
		else
			 	redirect(base_url().'/obra/listar/error', 'location');


	
		}
	}
	public function eliminar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('obra_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;

			if($this->obra_model->del_obra($id))
			 	redirect(base_url().'/obra/listar/success', 'location');	
		else
			 	redirect(base_url().'/obra/listar/error', 'location');


		
	}
}