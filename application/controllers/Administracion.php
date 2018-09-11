<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Administracion extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$data['selected']="as";
		$data['link_selected']="";
		$this->load->view('header',$data);
		$this->load->view('administracion\links');
		$this->load->view('main');
		$this->load->view('footer');
	}
	
}