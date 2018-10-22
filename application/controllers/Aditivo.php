<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Aditivo extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		
		$data['selected']="Administración";
		$data['link_selected']="";
		$this->load->view('header',$data);
		$this->load->view('administracion\aditivo\links',$data);
		$data['selected']="aditivos";
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
		$this->load->model('aditivo_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['aditivos']=$this->aditivo_model->get_aditivo();	

		$this->load->view('header',$data);
		$this->load->view('administracion\aditivo\listado',$data);
		$this->load->view('essential_js');
		$this->load->view('footer');

	}
	public function nuevo()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('aditivo_model');

		$data['selected']="Administración";
		$data['link_selected']="Nuevo";

		$this->form_validation->set_rules('adi_nombre', 'Nombre', 'required|is_unique[aditivos.adi_nombre]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('administracion\aditivo\nuevo',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			if($this->aditivo_model->set_aditivo())
			 	redirect(base_url().'/aditivo/listar/success', 'location');	
		else
			 	redirect(base_url().'/aditivo/listar/error', 'location');
			 
		}
	}

	public function editar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('aditivo_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;


		$this->form_validation->set_rules('adi_nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['aditivo']=$this->aditivo_model->get_aditivo($id);	
			$this->load->view('header',$data);
			$this->load->view('administracion\aditivo\editar',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			
			if($this->aditivo_model->edit_aditivo($id))
			 	redirect(base_url().'/aditivo/listar/success', 'location');	
		else
			 	redirect(base_url().'/aditivo/listar/error', 'location');
		}
	}
	public function eliminar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('aditivo_model');
		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;
		
		if($this->aditivo_model->del_aditivo($id))
			 	redirect(base_url().'/aditivo/listar/success', 'location');	
		else
			 	redirect(base_url().'/aditivo/listar/error', 'location');
	}
}