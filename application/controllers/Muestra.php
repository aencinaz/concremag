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
		if($data['muestra']['mue_elemento']=='hormigon')
			$this->load->view('hormigon\ficha',$data);
		else
			$this->load->view('prefabricado\ficha',$data);	
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
		$this->load->model('prensa_model');

		$data['selected']="Muestras";
		$data['link_selected']="Listado";
		$data['prensas']=$this->prensa_model->get_prensa();		
		$data['ensayo']=$this->ensayo_model->get_ensayo($id);	
		$data['muestra']=$this->muestra_model->get_muestra($data['ensayo']['mue_id']);	
		
		$this->form_validation->set_rules('ens_fecha_ensaye', 'ens_fecha_ensaye', 'required');	

		if ($this->form_validation->run() == FALSE)
		{

						$this->load->view('header',$data);
						$muestra=$data['muestra']['mue_elemento'];
						switch ( $data['ensayo']['ens_tipo_probeta']) {
							case 'Cilindro':
								if($data['ensayo']['ens_ensaye']=='Compresión')
										$this->load->view($muestra.'\ensayo\cilindro_compresion',$data);
								else
										$this->load->view($muestra.'\ensayo\cilindro_hendimiento',$data);
								break;
							case 'Cubo':
										$this->load->view($muestra.'\ensayo\cubo_compresion',$data);		
								break;
							case 'Prisma':
								$this->load->view($muestra.'\ensayo\prisma_flexotraccion',$data);
							break;
						}
						$this->load->view('essential_js');
						$this->load->view($muestra.'\ensayo\specific_js');
						$this->load->view('footer');
		}
		else
		{
				if($this->ensayo_model->edit_ensayo($id))
			 	redirect(base_url()."muestra/ficha/".$data['ensayo']['mue_id']."/ensayo/success", 'location');	
		else
			 	redirect(base_url()."muestra/ficha/".$data['ensayo']['mue_id']."/ensayo/error", 'location');
		}


	}





	public function editar($id)
	{
		
		$this->load->helper('url');
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
		$this->load->model('camion_model');
		$this->load->model('aditivo_model');

		$data['clientes']=$this->cliente_model->get_cliente();	
		$data['hormigones']=$this->hormigon_model->get_hormigon();	
		$data['plantas']=$this->planta_model->get_planta();	
		$data['cementos']=$this->cemento_model->get_cemento();	
		$data['camiones']=$this->camion_model->get_camion();	
		$data['aditivos']=$this->aditivo_model->get_aditivo();	
			
		$data['selected']="Muestras";
		$data['link_selected']="Nuevo";

		$this->form_validation->set_rules('num_muestra', 'Numero de Muestra', 'required|is_unique[muestras.mue_n_muestra]');
		$this->form_validation->set_rules('fecha_muestreo', 'fecha de Muestra', 'required');
		$this->form_validation->set_rules('obr_id', 'Obra', 'required');
		$this->form_validation->set_rules('cli_id', 'Cliente', 'required');
		$this->form_validation->set_rules('edad[]', 'Ensayo', 'required');
		$this->form_validation->set_rules('cantidad[]', 'Ensayo', 'required');
		
					
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
			$row[] = '<a onclick="return confirmar()" href="'. base_url()."muestra/eliminar/".$hormigon->mue_id.'">Eliminar</a>';
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
		$this->load->helper('url');
		$this->load->model('ensayo_model');
		$data['ensayos']=$this->ensayo_model->get_ensayo_muestra($id);	
		
		foreach ($data['ensayos'] as $ensayo ) {
				
				switch ( $ensayo['ens_tipo_probeta']) {
							case 'Cilindro':
								if($ensayo['ens_ensaye']=='Compresión')
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

		
$this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Concremag');
        $pdf->SetTitle('registro de ensaye');
        $pdf->SetSubject('registro de ensaye');
        $pdf->setFontSubsetting(true);
    	$pdf->SetFont('Helvetica', '', 8, '', true);
 	

 	// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


	
 	
		$html="";

if(isset($cilindro_compresion))
		{
				$pdf->AddPage();
				$html = $this->tabla($cilindro_compresion,'cilindro');
				  $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
		
		}
if(isset($cilindro_hendimiento))
	    {
	    		$pdf->AddPage();
	    		$html = $this->tabla($cilindro_hendimiento,'hendimiento');
	    		  $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
		   
	    }
if(isset($cubo_compresion))
		{
				$pdf->AddPage();
				$html = $this->tabla($cubo_compresion,'cubo');
				  $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
		   
	    }
if(isset($prisma_flexotraccion))
		{	
			$pdf->AddPage();
		    $html = $this->tabla($prisma_flexotraccion,'flexo');
		      $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
		}


// Imprimimos el texto con writeHTMLCell()
    
      
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("registro de ensaye.pdf");
        $pdf->Output($nombre_archivo, 'I');
		
	}





public function tabla($ensayo,$E)
{

$html="";
$j=count($ensayo)/6; //cantidad de hojas

$x=0;
$i=count($ensayo);
if($i>0)
{

			while($j>0 )
			{

				for ($i; $i <(6*ceil($j)) ; $i++) { 
					if(!isset($ensayo[$x+$i]['edad']))
					{
					    $ensayo[$x+$i]['mue_id']="";
						$ensayo[$x+$i]['ens_tipo_probeta']="";
						$ensayo[$x+$i]['ens_ensaye']="";
						$ensayo[$x+$i]['ens_fecha_ensaye']="";
						$ensayo[$x+$i]['ens_edad']="";
					}
				}
			
					$html .= '
							
					
							  <table  width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
								  <td><img src="'.base_url().'assets/img/vilicic.png" width="115" height="27" /></td>
									<td >&nbsp;</td>
									<td >
											<table border="1" cellspacing="0" cellpadding="0">
													 <tr>
														   <th scope="col"><span class="Estilo34">L-CV-FREH-01 Versión: 04</span></th>
													 </tr>
											</table>
									 </td>
								</tr>
							  </table>
							
							  <table  width="100%" border="0" cellpadding="2" cellspacing="0"  bordercolor="#000000">
									  <tr><td style="text-align:center">REGISTRO DE ENSAYE PARA MUESTRAS DE HORMIG&Oacute;N </td></tr>
									  <tr><td style="text-align:center">INFORMACI&Oacute;N GENERAL</td></tr>
							  </table>


							  <table width="100%" border="1" cellpadding="2" cellspacing="0"  bordercolor="#000000">
									  <tr><td>Obra : </td></tr>
							  </table>
<br><br>
							   <table width="100%" border="1" cellpadding="2" cellspacing="0">
									<tr>
									<td  colspan="7" style="text-align: center">IDENTIFICACI&Oacute;N DE LA MUESTRA </td>
								  </tr>

								   <tr>
									<td border="1" width="22%" height="16"><span >Muestra N&deg; </span></td>
									<td border="1" width="13%" style="text-align: center" >' . $ensayo[$x+0]['mue_id'].'</td>
									<td border="1" width="13%" style="text-align: center" >' . $ensayo[$x+1]['mue_id'] .'</td>
									<td border="1" width="13%" style="text-align: center" >' . $ensayo[$x+2]['mue_id'] .'</td>
									<td border="1" width="13%" style="text-align: center" >' . $ensayo[$x+3]['mue_id'] .'</td>
									<td border="1" width="13%" style="text-align: center" >' . $ensayo[$x+4]['mue_id'] .'</td>
									<td border="1" width="13%" style="text-align: center" >' . $ensayo[$x+5]['mue_id'] .'</td>
								  </tr>

								   <tr bordercolor="#00000">
									<td border="1" height="16"><span >Fecha de Confecci&oacute;n </span></td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+0]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+1]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+2]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+3]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+4]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+5]['ens_edad'] .'</td>
								  </tr>
								  <tr >
									<td border="1" height="16"><span >Tipo de Probeta </span></td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+0]['ens_tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+1]['ens_tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+2]['ens_tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+3]['ens_tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+4]['ens_tipo_probeta'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+5]['ens_tipo_probeta'] .'</td>
								  </tr>
								  <tr bordercolor="#000000">
									<td border="1" height="16"><span >Ensaye</span></td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+0]['ens_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+1]['ens_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+2]['ens_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+3]['ens_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+4]['ens_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+5]['ens_ensaye'] .'</td>
								  </tr>
								  <tr >
									<td border="1" height="16" >Fecha de ensaye </td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+0]['ens_fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+1]['ens_fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+2]['ens_fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+3]['ens_fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+4]['ens_fecha_ensaye'] .'</td>
									<td border="1" style="text-align: center" >'.  $ensayo[$x+5]['ens_fecha_ensaye'] .'</td>
								  </tr>
								  <tr >
									<td border="1" height="16"><span >Edad (días) </span></td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+0]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+1]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+2]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+3]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+4]['ens_edad'] .'</td>
									<td border="1" style="text-align: center" >' . $ensayo[$x+5]['ens_edad'] .'</td>
								  </tr>
							  </table> 

								';
								  
								  
	if($E=="cubo"){
		$html .= '<br><br>
		                			<table width="100%" border="1" cellpadding="3" cellspacing="0">
									<tr>
									<td colspan="7" style="text-align: center">DATOS DE ENSAYO </td>
									

								  </tr>
								  <tr >
									<td width="22%" border="1" height="25"><span >Procedimiento de Curado</span></td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18"><span >Altura (h1) (mm) </span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Altura (h2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Altura Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Ancho (b1) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Ancho (b2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Ancho Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Secci&oacute;n (mm2) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Volumen (cm3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Masa (g) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 </table>
								  ';
								  
								  
	}
	
	
	if($E=="flexo"){
		$html .= '<br><br>
		                			<table width="100%" border="1" cellpadding="3" cellspacing="0">
									<tr><td colspan="7" style="text-align: center">DATOS DE ENSAYO </td></tr>
								  <tr >
									<td width="22%" border="1" height="20"><span >Procedimiento de Curado</span></td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20"><span >Altura (h1) (mm) </span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Altura (h2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Altura Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Ancho (b1) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Ancho (b2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Ancho Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 
								  <tr >
									<td border="1" height="20" >Largo Probeta </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								   <tr >
									<td border="1" height="20" >Luz de Ensayo (mm)</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Secci&oacute;n (mm2)  </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Volumen (cm3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Masa (g) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  
								  </table>
								  ';
								  
								  
	}
	
	
	if($E=="hendimiento"){
		$html .= '<br><br>
		                			<table width="100%" border="1" cellpadding="3" cellspacing="0">
									<tr>
									<td colspan="7" style="text-align: center">DATOS DE ENSAYO </td>
									

								  </tr>
								  <tr >
									<td width="22%" border="1" height="25"><span >Procedimiento de Curado</span></td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20"><span >Altura (h1) (mm) </span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Altura (h2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Altura Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 
								  <tr >
									<td border="1" height="20" >Diametro (d1) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Diametro (d2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Diametro (d3) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" ><strong>Diametro Promedio (cm) </strong></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 
							
								  <tr >
									<td border="1" height="20" >Secci&oacute;n (mm2)  </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Volumen (cm3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Masa (g) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  </table>
								  ';
								  
								  
	}
	
	

	
	if($E=="cilindro"){


		                $html .= ' <br><br>
		                			<table width="100%" border="1" cellpadding="3" cellspacing="0">
									<tr>
									<td colspan="7" style="text-align: center">DATOS DE ENSAYO </td>
								  </tr>
								  <tr >
									<td width="22%" border="1" height="25"><span >Procedimiento de Curado</span></td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18"><span >Altura (h1) (mm) </span></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Altura (h2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Altura Promedio (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								
								  <tr >
									<td border="1" height="18" >Diametro (d1) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Diametro (d2) (mm) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								
								  <tr >
									<td border="1" height="18" ><strong>Diametro Promedio (cm) </strong></td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  
								  <tr >
									<td border="1" height="18" >Seccion (mm2)  </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>

								  <tr >
									<td border="1" height="18" >Volumen (cm3) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="18" >Masa (g) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  </table>
								  ';
								  
								  
	}
	
	if($E=="cilindro"){
	
	$html .= '<br><br><table width="100%"  border="1" cellpadding="3" cellspacing="0">
									<tr>
									<td colspan="7"   style="text-align: center">RESULTADO DE ENSAYO </td>
								  </tr>
								
								  <tr >
									<td width="22%" border="1" height="20" >Densidad (kg/m3) </td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
								  </tr>
								 <tr >
									<td border="1" height="20" >Carga M&aacute;xima (Kn) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 <tr >
									<td border="1" height="20" >Carga Corregida (Kn) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  	 <tr >
									<td border="1" height="20" >Carga M&aacute;xima(N) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 

								  <tr >
									<td border="1" height="20" >Resistencia Cilindrica (kg/cm2) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Resistencia Cilindrica (MPa) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Resistencia Cubica (kg/cm2) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Resistencia Cubica (MPa)</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>


<tr >
									<td border="1" height="25" >Defectos Externos</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>

<tr >
									<td border="1" height="25" >Obs. Despues Rotura</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>


							
								</table>
								
<br><br>OBSERVACIONES:<br><br><br><br>
<br><br><br><br>
								<table border="0" >
								<tr><td style="text-align: center" width="300">___________________________</td><td style="text-align: center" width="300">________________________</td></tr>
								<tr><td style="text-align: center" >Laboratorista Responsable Ensayo</td><td style="text-align: center">Jefe Laboratorio Obra</td></tr>
								</table>
																 ';
							
								$j=$j-1;
								$x=6;
						}
						else
						{


	$html .= '<br><br><table width="100%"  border="1" cellpadding="3" cellspacing="0">
	          <tr>
									<td colspan="7"   style="text-align: center">RESULTADO DE ENSAYO </td>
								  </tr>
								  <tr >
									<td width="22%" border="1" height="20" >Densidad (kg/m3) </td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
									<td width="13%" border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Carga M&aacute;xima (kN) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 <tr >
									<td border="1" height="20" >Carga Corregida (kN) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Carga M&aacute;xima (N) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								 								 

								  <tr >
									<td border="1" height="20" >Resistencia Cilindrica (kg/cm2) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  <tr >
									<td border="1" height="20" >Resistencia (MPa) </td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>


<tr >
									<td border="1" height="25" >Defectos Externos</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>

<tr >
									<td border="1" height="25" >Obs. Despues Rotura</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
									<td border="1">&nbsp;</td>
								  </tr>
								  
								</table>

								<br>OBSERVACIONES:<br><br><br><br>
							<table border="0" >
								<tr><td style="text-align: center" width="300">___________________________</td><td style="text-align: center" width="300">________________________</td></tr>
								<tr><td style="text-align: center" >Laboratorista Responsable Ensayo</td>
								<td style="text-align: center">Jefe Laboratorio Obra</td></tr>
								</table>
									              

							';
							
								$j=$j-1;
								$x=6;

						}
					}
			}
			return $html;
}  

}