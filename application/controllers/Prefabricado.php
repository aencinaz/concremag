<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prefabricado extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$data['selected']="Prefabricados";
		$this->load->view('header',$data);
		$this->load->view('prefabricado\links');
		$this->load->view('main');
		$this->load->view('footer');
	}
	public function lista()
	{
		$this->load->helper('url');
		$data['selected']="Prefabricados";
		$this->load->view('header',$data);
		$this->load->view('prefabricado\links');
		$this->load->view('prefabricado\lista');
		$this->load->view('footer');
	}
}