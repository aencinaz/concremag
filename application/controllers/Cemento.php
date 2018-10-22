<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cemento extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		
		$data['selected']="Administración";
		$data['link_selected']="";
		$this->load->view('header',$data);
		$this->load->view('administracion\cemento\links',$data);
		$data['selected']="Cementos";
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
		$this->load->model('cemento_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['cementos']=$this->cemento_model->get_cemento();	

		$this->load->view('header',$data);
		$this->load->view('administracion\cemento\listado',$data);
		$this->load->view('essential_js');
		$this->load->view('footer');

	}
	public function nuevo()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('cemento_model');

		$data['selected']="Administración";
		$data['link_selected']="Nuevo";

		$this->form_validation->set_rules('cem_nombre', 'Nombre', 'required|is_unique[cementos.cem_nombre]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('administracion\cemento\nuevo',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			if($this->cemento_model->set_cemento())
			 	redirect(base_url().'/cemento/listar/success', 'location');	
		else
			 	redirect(base_url().'/cemento/listar/error', 'location');
			 
		}
	}

	public function editar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('cemento_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;


		$this->form_validation->set_rules('cem_nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['cemento']=$this->cemento_model->get_cemento($id);	
			$this->load->view('header',$data);
			$this->load->view('administracion\cemento\editar',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			
			if($this->cemento_model->edit_cemento($id))
			 	redirect(base_url().'/cemento/listar/success', 'location');	
		else
			 	redirect(base_url().'/cemento/listar/error', 'location');
		}
	}
	public function eliminar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('cemento_model');
		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;
		
		if($this->cemento_model->del_cemento($id))
			 	redirect(base_url().'/cemento/listar/success', 'location');	
		else
			 	redirect(base_url().'/cemento/listar/error', 'location');
	}
}