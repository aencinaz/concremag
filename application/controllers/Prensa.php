<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prensa extends CI_Controller {
	

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
		$this->load->model('prensa_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['prensas']=$this->prensa_model->get_prensa();	

		$this->load->view('header',$data);
		$this->load->view('administracion\prensa\listado',$data);
		$this->load->view('essential_js');
		$this->load->view('footer');

	}
	public function nuevo()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('prensa_model');

		$data['selected']="Administración";
		$data['link_selected']="Nuevo";

		$this->form_validation->set_rules('pre_nombre', 'Nombre', 'required|is_unique[prensas.pre_nombre]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('administracion\prensa\nuevo',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			if($this->prensa_model->set_prensa())
			 	redirect(base_url().'/prensa/listar/success', 'location');	
		else
			 	redirect(base_url().'/prensa/listar/error', 'location');
			 
		}
	}

	public function editar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('prensa_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;


		$this->form_validation->set_rules('pre_nombre', 'Nombre', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['prensa']=$this->prensa_model->get_prensa($id);	
			$this->load->view('header',$data);
			$this->load->view('administracion\prensa\editar',$data);
			$this->load->view('essential_js');
			$this->load->view('footer');
		}
		else
		{
			
			if($this->prensa_model->edit_prensa($id))
			 	redirect(base_url().'/prensa/listar/success', 'location');	
		else
			 	redirect(base_url().'/prensa/listar/error', 'location');
		}
	}
	public function eliminar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('prensa_model');
		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;
		
		if($this->prensa_model->del_prensa($id))
			 	redirect(base_url().'/prensa/listar/success', 'location');	
		else
			 	redirect(base_url().'/prensa/listar/error', 'location');
	}
}