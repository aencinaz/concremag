<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Muestra extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$data['selected']="Hormigón";
		$data['link_selected']="";

		$this->load->view('header',$data);
		$this->load->view('hormigon\links');
		$this->load->view('main');
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
		$this->load->model('muestra_model');
		
		$data['selected']="Muestras";
		$data['link_selected']="Listado";
		$data['muestras']=$this->muestra_model->get_muestra();	
		$this->load->view('header',$data);
		$this->load->view('hormigon\lista');
		$this->load->view('essential_js');
		$this->load->view('specific_datatables_js');
		$this->load->view('footer');
	}


	public function ficha($id,$muestra)
	{

		$this->load->helper('url');
		$this->load->model('muestra_model');
		$this->load->model('ensayo_model');
		
		
		$data['selected']="Muestras";
		$data['link_selected']="Listado";
		$data['muestra']=$this->muestra_model->get_muestra($id);	
		$data['ensayos']=$this->ensayo_model->get_ensayo_muestra($id);	
		$data['pestana']=$muestra;
		$this->load->view('header',$data);
		$this->load->view('hormigon\ficha',$data);
		$this->load->view('essential_js');
		$this->load->view('footer');
	}




	public function ensayo($id)
	{

		$this->load->helper('url');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
	
		$this->load->model('ensayo_model');
		$this->load->model('muestra_model');

		$data['selected']="Muestras";
		$data['link_selected']="Listado";
		$data['ensayo']=$this->ensayo_model->get_ensayo($id);	
		$data['muestra']=$this->muestra_model->get_muestra($data['ensayo']['mue_id']);	
		
		$this->form_validation->set_rules('ens_resistencia_mpa', 'resistencia_mpa', 'required');	

		if ($this->form_validation->run() == FALSE)
		{

						$this->load->view('header',$data);
						switch ( $data['ensayo']['ens_tipo_probeta']) {
							case 'Cilindro':
								if($data['ensayo']['ensaye']=='Compresión')
										$this->load->view('hormigon\ensayo\cilindro_compresion',$data);
								else
										$this->load->view('hormigon\ensayo\cilindro_hendimiento',$data);
								break;
							case 'Cubo':
										$this->load->view('hormigon\ensayo\cubo_compresion',$data);		
								break;
							case 'Prisma':
								$this->load->view('hormigon\ensayo\prisma_flexotraccion',$data);
							break;
						}
						$this->load->view('essential_js');
						$this->load->view('footer');
		}
		else
		{
				if($this->ensayo_model->edit_ensayo($id))
			 	redirect(base_url()."muestrahormigon/ficha/".$data['ensayo']['mue_id']."/ensayo/success", 'location');	
		else
			 	redirect(base_url()."muestrahormigon/ficha/".$data['ensayo']['mue_id']."/ensayo/error", 'location');
		}


	}





	public function editar($id)
	{
		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');

		$this->load->model('muestra_model');
		$data['id']=$id;
		$data['selected']="Muestras";
		$data['link_selected']="Listado";
		$data['muestra']=$this->muestra_model->get_muestra($id);	
		$this->load->view('header',$data);
		$this->load->view('hormigon\editar',$data);
		$this->load->view('essential_js');
		$this->load->view('footer');
	}



	public function nuevo($elemento)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->helper('date');
		
		$this->load->model('muestra_model');
		$this->load->model('cliente_model');
		$this->load->model('hormigon_model');
		$this->load->model('planta_model');
		$this->load->model('cemento_model');
		$this->load->model('ensayo_model');

		$data['clientes']=$this->cliente_model->get_cliente();	
		$data['hormigones']=$this->hormigon_model->get_hormigon();	
		$data['plantas']=$this->planta_model->get_planta();	
		$data['cementos']=$this->cemento_model->get_cemento();	
		
		$data['selected']="Muestras";
		$data['link_selected']="Nuevo";

		$this->form_validation->set_rules('num_muestra', 'Numero de Muestra', 'required');
		$this->form_validation->set_rules('fecha_muestreo', 'fecha de Muestra', 'required');
		$this->form_validation->set_rules('obr_id', 'Obra', 'required');
		$this->form_validation->set_rules('cli_id', 'Cliente', 'required');
		
					
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			if($elemento==='hormigon')
				$this->load->view('hormigon\nuevo',$data);
			else
				$this->load->view('prefabricado\nuevo',$data);
			$this->load->view('essential_js');
			$this->load->view('hormigon\specific_js');
			$this->load->view('footer');
		}
		else
		{
			

			if($this->muestra_model->set_muestra($elemento))
			{
			$id_muestra=$this->db->insert_id();
			$fecha_muestra		= $this->input->post('fecha_muestreo');
			
			for ($i=0; $i < count($this->input->post('edad')) ; $i++) { 
				$ensayo 			= $this->input->post('ensayo');
				$cantidad 			= $this->input->post('cantidad');
				$edad 				= $this->input->post('edad');
				$fecha_ensaye = new DateTime($fecha_muestra);
				$fecha_ensaye->add(new DateInterval('P'.$edad[$i].'D'));
				$tipo_probeta="";
				$ensaye="";
			
				switch ($ensayo[$i]) {
					case 1:
						$tipo_probeta="Cilindro";
						$ensaye="Compresión";
						break;
					case 2:
						$tipo_probeta="Cilindro";
						$ensaye="Hendimiento";
						break;
					case 3:
						$tipo_probeta="Cubo";
						$ensaye="Compresión";
						break;
					case 4:
						$tipo_probeta="Prisma";
						$ensaye="Flexotracción";
						break;
				}

				for ($j=0; $j < $cantidad[$i] ; $j++) { 
					$this->ensayo_model->set_ensayo($id_muestra,$tipo_probeta,$ensaye,$fecha_ensaye->format('Y-m-d'),$edad[$i]);
				}

				
			}
			 	redirect(base_url().'muestra/listar/success', 'location');	

			}
			else
			 	redirect(base_url().'muestra/listar/error', 'location');
		}
	}


	public function ajax_list()
	{
		$this->load->model('muestra_model','hormigon');
		$this->load->helper('url');
		
		$list = $this->hormigon->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $hormigon) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = date("d-m-Y",strtotime($hormigon->mue_fecha_muestreo)) ;
			$row[] = $hormigon->mue_n_muestra;
			$row[] = $hormigon->mue_elemento;
			$row[] = $hormigon->cli_nombre;
			$row[] = $hormigon->obr_nombre;
			$row[] = '<a href="'. base_url()."muestra/ficha/".$hormigon->mue_id.'/muestra">Ficha</a>';
			$row[] = '<a href="'. base_url()."muestra/editar/".$hormigon->mue_id.'">editar</a>';
			$row[] = '<a onclick="return confirmar()" href="'. base_url()."muestrahormigon/eliminar/".$hormigon->mue_id.'">Eliminar</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->hormigon->count_all(),
						"recordsFiltered" => $this->hormigon->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function eliminar($id)
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->model('muestra_model');

		$data['selected']="Administración";
		$data['link_selected']="Listado";
		$data['id']=$id;

		if($this->muestra_model->del_muestra($id))
			 	redirect(base_url().'/muestra/listar/success', 'location');	
		else
			 	redirect(base_url().'/muestra/listar/error', 'location');

	}

	public function formulario($id)
	{
		$this->load->model('ensayo_model');
		$data['ensayos']=$this->ensayo_model->get_ensayo_muestra($id);	
		

		foreach ($data['ensayos'] as $ensayo ) {
				
				switch ( $ensayo['tipo_probeta']) {
							case 'Cilindro':
								if($ensayo['ensaye']=='Compresión')
									$cilindro_compresion[] = $ensayo;
								else
									$cilindro_hendimiento[]= $ensayo;
								break;
							case 'Cubo':
										$cubo_compresion[]= $ensayo;
								break;
							case 'Prisma':
								$prisma_flexotraccion[]= $ensayo;
							break;
						}
		}

		$this->tabla($cilindro_compresion,'cilindro');
		$this->tabla($cilindro_hendimiento,'hendimiento');
		$this->tabla($cubo_compresion,'cubo');
		$this->tabla($prisma_flexotraccion,'flexo');
		
		
	}





public function tabla($ensayo,$E)
{
$j=count($ensayo)/6;
$x=0;
$i=count($ensayo);
if($i>0)
{
			while($j>0 )
			{
						
				for ($i=0; $i <6 ; $i++) { 
					if(!isset($ensayo[$x+$i]['edad']))
					{
					    $ensayo[$x+$i]['id_muestra']="";
						$ensayo[$x+$i]['tipo_probeta']="";
						$ensayo[$x+$i]['ensaye']="";
						$ensayo[$x+$i]['fecha_ensaye']="";
						$ensayo[$x+$i]['edad']="";
					}
				}
							print '
							
							 
							  <page>
							<style type="text/css" >
					<!--
					.Estilo4 {
						font-family: Arial, Helvetica, sans-serif;
						font-size: 10px;
					}
					.Estilo20 {
						font-family: Arial, Helvetica, sans-serif;
						font-size: 14px;
						font-weight: bold;
					}
					.Estilo21 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
					.Estilo34 {font-size: 12px}
					.Estilo36 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: 00000; }
					.Estilo37 {color: 00000}
					.Estilo38 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: 00000; font-weight: bold; }
					-->
					</style>
					
							  <table>
								<tr>
								  <td width="135"  height="76"><img src="img/vilicic.jpg" width="115" height="27" /></td>
									<td  width="310">&nbsp;</td>
									<td  width="204">
											<table width="210" border="1" cellspacing="0" cellpadding="0">
													 <tr>
														  <th scope="col"><span class="Estilo34">';
														
														  print '</span></th>
														   <th scope="col"><span class="Estilo34"></span></th>
													 </tr>
											</table>
									 </td>
								</tr>
							  </table>
							
							  <table border="1" cellpadding="0" cellspacing="0"  bordercolor="#000000">
									  <tr bordercolor="#ffffff"  class="Estilo21">
										  <TD></TD>
										  <td colspan="3">REGISTRO DE ENSAYE PARA MUESTRAS DE HORMIG&Oacute;N </td>
									   </tr>
									   <TR bordercolor="#ffffff"  class="Estilo21">
											<TD></TD>
											<TD >INFORMACI&Oacute;N GENERAL </TD>
										</TR>
										<tr bordercolor="#ffffff">
										  <td  width="196" height="39" class="Estilo4">Obra</td>
										  <td  width="415">: '.'obra'.'</td>
										</tr>
							  </table>
							  
								<br>
								<table width="591" cellpadding="0" cellspacing="0"  bordercolor="#000000" >
								  <tr>
									<td colspan="8"  class="Estilo21" style="text-align: center">IDENTIFICACI&Oacute;N DE LA MUESTRA </td>
								  </tr>
								  <tr bordercolor="#00000">
									<td border="1" width="151" height="16"><span class="Estilo36">Muestra N&deg; </span></td>
									<td border="1" width="70" style="text-align: center" class="Estilo38">' . $ensayo[$x+0]['id_muestra'].'</td>
									<td border="1" width="70" style="text-align: center" class="Estilo38">' . $ensayo[$x+1]['id_muestra'] .'</td>
									<td border="1" width="70" style="text-align: center" class="Estilo38">' . $ensayo[$x+2]['id_muestra'] .'</td>
									<td border="1" width="70" style="text-align: center" class="Estilo38">' . $ensayo[$x+3]['id_muestra'] .'</td>
									<td border="1" width="70" style="text-align: center" class="Estilo38">' . $ensayo[$x+4]['id_muestra'] .'</td>
									<td border="1" width="70" style="text-align: center" class="Estilo38">' . $ensayo[$x+5]['id_muestra'] .'</td>
								  </tr>
								  <tr bordercolor="#00000">
									<td border="1" height="16"><span class="Estilo36">Fecha de Confecci&oacute;n </span></td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+0]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+1]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+2]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+3]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+4]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+5]['edad'] .'</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="16"><span class="Estilo36">Tipo de Probeta </span></td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+0]['tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+1]['tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+2]['tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+3]['tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+4]['tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+5]['tipo_probeta'] .'</td>
								  </tr>
								  <tr bordercolor="#000000">
									<td border="1" height="16"><span class="Estilo36">Ensaye</span></td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+0]['ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+1]['ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+2]['ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+3]['ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+4]['ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+5]['ensaye'] .'</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="16" class="Estilo36">Fecha de ensaye </td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+0]['fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+1]['fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+2]['fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+3]['fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+4]['fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">'.  $ensayo[$x+5]['fecha_ensaye'] .'</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="16"><span class="Estilo36">Edad (días) </span></td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+0]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+1]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+2]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+3]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+4]['edad'] .'</td>
									<td border="1" style="text-align: center" class="Estilo36">' . $ensayo[$x+5]['edad'] .'</td>
								  </tr>
								  <tr bordercolor="#FFFFFFF">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td width="2">&nbsp;</td>
								  </tr>
								  <tr>
									<td colspan="8"  class="Estilo21" style="text-align: center">DATOS DE ENSAYO</td>
								  </tr>';
								  
								  
	if($E=="cubo"){
		print '
								  <tr bordercolor="#0000000">
									<td border="1" height="25"><span class="Estilo36">Procedimiento de Curado</span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18"><span class="Estilo36">Altura (h1) (mm) </span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Altura (h2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo38">Altura Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Ancho (b1) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Ancho (b2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo38">Ancho Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Secci&oacute;n (mm2) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Volumen (cm3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Masa (g) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								   <tr bordercolor="#FFFFFFF">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td width="2">&nbsp;</td>
								  </tr>
								  ';
								  
								  
	}
	
	
	if($E=="flexo"){
		print '
								  <tr bordercolor="#0000000">
									<td border="1" height="20"><span class="Estilo36">Procedimiento de Curado</span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20"><span class="Estilo36">Altura (h1) (mm) </span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Altura (h2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo38">Altura Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Ancho (b1) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Ancho (b2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo38">Ancho Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Largo Probeta </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								   <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Luz de Ensayo (mm)</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Secci&oacute;n (mm2)  </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Volumen (cm3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Masa (g) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								   <tr bordercolor="#FFFFFFF">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td width="2">&nbsp;</td>
								  </tr>
								  ';
								  
								  
	}
	
	
	if($E=="hendimiento"){
		print '
								  <tr bordercolor="#0000000">
									<td border="1" height="25"><span class="Estilo36">Procedimiento de Curado</span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20"><span class="Estilo36">Altura (h1) (mm) </span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Altura (h2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo38">Altura Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Diametro (d1) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Diametro (d2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Diametro (d3) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36"><strong>Diametro Promedio (cm) </strong></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 
							
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Secci&oacute;n (mm2)  </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Volumen (cm3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Masa (g) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								   <tr bordercolor="#FFFFFFF">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td width="2">&nbsp;</td>
								  </tr>
								  ';
								  
								  
	}
	
	

	
	if($E=="cilindro"){
		print '
								  <tr bordercolor="#0000000">
									<td border="1" height="25"><span class="Estilo36">Procedimiento de Curado</span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18"><span class="Estilo36">Altura (h1) (mm) </span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Altura (h2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo38">Altura Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Diametro (d1) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Diametro (d2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36"><strong>Diametro Promedio (cm) </strong></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height=18" class="Estilo36">Secci&oacute;n (mm2)  </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Volumen (cm3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="18" class="Estilo36">Masa (g) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								   <tr bordercolor="#FFFFFFF">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td width="2">&nbsp;</td>
								  </tr>
								  ';
								  
								  
	}
	
	if($E=="cilindro"){
	
	print '<tr>
									<td colspan="8"  class="Estilo21" style="text-align: center">RESULTADO DE ENSAYO </td>
								  </tr>
								
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Densidad (kg/m3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Carga M&aacute;xima (Kn) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Carga Corregida (Kn) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  	 <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Carga M&aacute;xima(N) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 

								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Resistencia Cilindrica (kg/cm2) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Resistencia Cilindrica (MPa) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36"><p></p></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Resistencia Cubica (MPa)</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>


<tr bordercolor="#0000000">
									<td border="1" height="25" class="Estilo36">Defectos Externos</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>

<tr bordercolor="#0000000">
									<td border="1" height="25" class="Estilo36">Obs. Despues Rotura</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>


								  <tr><td class="Estilo38">OBSERVACIONES:</td></tr>
								</table>
								
<br><br><br><br><br>
								<table border="0" >
								<tr><td style="text-align: center" width="300">___________________________</td><td style="text-align: center" width="300">________________________</td></tr>
								<tr><td style="text-align: center" >Laboratorista Responsable Ensayo</td><td style="text-align: center">Jefe Laboratorio Obra</td></tr>
								</table>
																</page> ';
							
								$j=$j-1;
								$x=6;
						}
						else
						{


	print '<tr>
									<td colspan="8"  class="Estilo21" style="text-align: center">RESULTADO DE ENSAYO </td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Densidad (kg/m3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Carga M&aacute;xima (kN) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Carga Corregida (kN) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Carga M&aacute;xima (N) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 								 

								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36"><p></p></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr bordercolor="#0000000">
									<td border="1" height="20" class="Estilo36">Resistencia (MPa) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>


<tr bordercolor="#0000000">
									<td border="1" height="25" class="Estilo36">Defectos Externos</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>

<tr bordercolor="#0000000">
									<td border="1" height="25" class="Estilo36">Obs. Despues Rotura</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr><td class="Estilo38">OBSERVACIONES:</td></tr>
								</table>
								<br><br><br><br><br>
							<table border="0" >
								<tr><td style="text-align: center" width="300">___________________________</td><td style="text-align: center" width="300">________________________</td></tr>
								<tr><td style="text-align: center" >Laboratorista Responsable Ensayo</td>
								<td style="text-align: center">Jefe Laboratorio Obra</td></tr>
								</table>
									              

								</page> ';
							
								$j=$j-1;
								$x=6;

						}
					}
			}
}  

}