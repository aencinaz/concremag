<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Muestra
{
    // Declaración de una propiedad
    public $mue_n_muestra=0;
	private $ensayos=array();

    // Declaración de un método
    public function setEnsayo($ensayo) {
        array_push($this->ensayos, $ensayo);
    }

	public function getEnsayoPrisma() {
		$result= array();
        foreach ($this->ensayos as $key ) {
        	if($key['ens_tipo_probeta']=='Prisma')
        	 array_push($result, $key);
        }
        return $result;
    }
    public function getEnsayoCilindro() {
		$result= array();
        foreach ($this->ensayos as $key ) {
        	if($key['ens_tipo_probeta']=='Cilindro')
        	 array_push($result, $key);
        }
        return $result;
    }
}

class Informes extends CI_Controller {

	public function resistencias()
	{


	    $this->load->helper('url');
		$data['selected']="Muestras";
		$data['link_selected']="Listado";
		
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
	
		$this->load->model('cliente_model');
		$this->load->model('planta_model');

	
		$data['plantas']=$this->planta_model->get_planta();		
		$data['clientes']=$this->cliente_model->get_cliente();	
		
		$this->form_validation->set_rules('obr_id', 'Obra', 'required');	
		$this->form_validation->set_rules('pla_id', 'Planta', 'required');	

		if ($this->form_validation->run() == FALSE)
		{
						$this->load->view('header',$data);
						$this->load->view('informes\resistencias');
						$this->load->view('essential_js');
						$this->load->view('informes\specific_js');
						$this->load->view('footer');
	   	}
	   	else
	   	{




// inform ------------------------------------------------------------- 


$html = '
<style type="text/css">
<!--
.Estilo14 {font-size: 12px}
.Estilo15 {font-size: 18px}
.Estilo17 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo18 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; }
-->
</style>

<page backtop="10mm" backbottom="10mm" backleft="20mm">
';

$pie ='<page_footer>
		<table class="page_footer">
			<tr>
				<td style="width: 33%; text-align: left;">
				</td>
				<td style="width: 34%; text-align: center">
					Pagina [[page_cu]]/[[page_nb]]
				</td>
				<td style="width: 33%; text-align: right">
				</td>
			</tr>
		</table>
  </page_footer>';
  
$encabesado= '<tr>
    <th height="20" width="48"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Muestra</span></th>
    <th width="243"  bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Cliente</span></th>
    <th width="200"  bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Obra</span></th>
    <th width="72"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Planta</span></th>
    <th width="90"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Hormig&oacute;nGrado </span></th>
    <th width="58"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Fecha de Muestreo </span></th>
    <th width="63"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Fecha de Ensayo </span></th>
    <th width="30"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Edad (d&iacute;as) </span></th>
	<th width="140"  bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Ensayo Resistencia </span></th>
	<th width="44"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Densidad </span></th>
    <th width="50"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Resistencia (kg/cm2) </span></th>
    <th width="50"   bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Resistencia (Mpa)</span></th>
    <th width="126"  bgcolor="#FFFF55"  style="text-align: center" scope="col"><span class="Estilo17">Observaciones</span></th>
  </tr>';
 
$html .= '

<table width="1277">
  <tr><td width="178">
<br>
<img src="img/concremag.jpg" alt="Logo" width="170" />
<br/>
  </td><td width="927" style="text-align: center"><img src="img/logo certificacion.jpg" width="67" height="85" /></td><td width="156"><img src="img/vilicic.jpg" width="124" height="30" /></td>
</tr></table>
<table width="1278"><tr><td width="1200" style="text-align: center"><h1 class="Estilo15">INFORME DE RESISTENCIAS <? print $Mes; ?>

</h1>
</td>
</tr></table>
<table width="1274"  border="2" cellpadding="0" cellspacing="2" bordercolor="#FFFFFF">';


$html .= $encabesado;  


	$html .= '
    <tr>
    <th  height="20" width="48" colspan=13   style="text-align: center" scope="col">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</th>
    
	  </tr>
	';
	
	$html .= '<tr >';
	$html .= '<td height="20" width="48"  style="text-align: center" ><span class="Estilo18"></span></td>';
	$html .= '<td width="243" style="text-align: center" ><span class="Estilo18"></span></td>';
	$html .= '<td width="200" style="text-align: center" ><span class="Estilo18"></span></td>';
	$html .= '<td width="72"  style="text-align: center" ><span class="Estilo18"></span></td>';
	$html .= '<td width="90"  style="text-align: center" ><span class="Estilo18"></span></td>';
	$html .= '<td width="58" style="text-align: center" ><span class="Estilo18" ></span></td>';
    $html .= '<td width="63" style="text-align: center"><span class="Estilo18"></span></td>';
	$html .= '<td width="30" style="text-align: center"><span class="Estilo18"></span></td>';
	$html .= '<td width="140" style="text-align: center"><span class="Estilo18"></span></td>';
	$html .= '<td width="44" style="text-align: center"><span class="Estilo18"></span></td>';
	$html .= '<td width="50" style="text-align: center"><span class="Estilo18"></span></td>';
	$html .= '<td width="50" style="text-align: center"><span class="Estilo18"></span></td>';
	$html .= '<td width="126" style="text-align: center"><span class="Estilo18"></span></td></tr>';	    
	$html .= '
</table>
<page_footer>

<table width="126%" border="0" cellpadding="0" cellspacing="0">
<tr><td width="124">.</td>
<td width="378" style="text-align: center">_____________________________________</td>
<td width="124"></td>
<td width="491" style="text-align: center">____________________________________</td>
</tr><tr><td width="124">.</td>
<td width="378" style="text-align: center">Recibido Conforme JOS&Eacute; OYARZUN ZU&Ntilde;IGA</td>
<td width="124"></td>
<td width="491" style="text-align: center">RA&Uacute;L MANSILLA SANTANA</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td style="text-align: center">ADMINISTRADOR PLANTA DE HORMIGON</td>
  <td></td>
  <td style="text-align: center">LABORATORIO AUTOCONTROL CONCREMAG</td>
  <td width="151"></td>
</tr>
</table>
	<table class="page_footer">
			<tr>
				<td style="width: 33%; text-align: left;">
				</td>
				<td style="width: 34%; text-align: center">
					Pagina [[page_cu]]/[[page_nb]]
				</td>
				<td style="width: 33%; text-align: right">
				</td>
			</tr>
		</table>';


// fin de informe
		echo $html;

	   	}
	   }


public function ensayos()
	{


$this->load->helper('url');
		$data['selected']="Muestras";
		$data['link_selected']="Listado";

		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');		
		$this->form_validation->set_rules('obr_id', 'Obra', 'required');	
		$this->form_validation->set_rules('fecha_hasta', 'Fecha', 'required');	

		if ($this->form_validation->run() == FALSE)
		{	

			$this->load->model('cliente_model');
			$this->load->model('planta_model');
			$data['plantas']=$this->planta_model->get_planta();		
			$data['clientes']=$this->cliente_model->get_cliente();	
			$this->load->view('header',$data);
			$this->load->view('informes\ensayos');
			$this->load->view('essential_js');
			$this->load->view('informes\specific_js');
			$this->load->view('footer');
	   	}
	   	else
	   	{


$this->load->model('cliente_model');
$this->load->model('obra_model');
$this->load->model('ensayo_model');
$cliente=$this->cliente_model->get_cliente($this->input->post('cli_id'));
$obra=$this->obra_model->get_obra($this->input->post('obr_id'))	;
$ensayos=$this->ensayo_model->get_informe_ensayo($this->input->post('obr_id'))	;



/// informe ---------------------------------------------------------
	$this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Concremag');
        $pdf->SetTitle('Informe Ensayo');
        $pdf->SetSubject('Informe Ensayo');
        $pdf->setFontSubsetting(true);
    	$pdf->SetFont('Helvetica', '', 10, '', true);

 		$pdf->setFooterData(array(0,64,0), array(0,64,128));
 		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		$pdf->setPrintHeader(false);
		//$pdf->setPrintFooter(false);


$html = '<html><head>
	</head><body>
	<table  border="0">
		<tr>
			<td width="40%" height="47"><br /></td>
			<td width="40%" style="text-align: center"></td>
			<td width="20%" ><p><img src="'.base_url().'assets/img/logo.png" alt="Logo" width="106" height="36" /></p></td>
		</tr>
	</table>

	<table  border="0"><tr><td>
		<p style="text-align: center"><h1>INFORME ENSAYO RESISTENCIA</h1></p>
	</td></tr>
	</table>

<br><br>
<div border="1">
	<table cellspacing="4" >

		<tr>
			<td colspan="3" bgcolor="#FFCC33" style="text-align: center" >IDENTIFICACI&Oacute;N DEL CLIENTE</td>
		</tr>

		<tr >
			<td width="20%"  >Cliente</td>
			<td width="1%" >:</td>
			<td width="79%" >'.$cliente["cli_nombre"].'</td>
		</tr>
		<tr >
			<td>Direcci&oacute;n</td>
			<td>:</td>
			<td>'.$cliente["cli_direccion"].'</td>
		</tr>
		<tr >
			<td>Obra</td>
			<td>:</td>
			<td>'.$obra["obr_nombre"].'</td>
		</tr>
		<tr >
			<td>Direcci&oacute;n Obra </td>
			<td>:</td>
			<td>'.$obra["obr_ubicacion"].'</td>
		</tr>
	</table>
</div>
	<br>
	<div border="1">
	<table  cellspacing="4" >
		<tr bgcolor="#FFCC66">
			<td colspan="3" bgcolor="#FFCC33" style="text-align: center" >IDENTIFICACI&Oacute;N DEL INFORME </td>
		</tr>
		<tr>
			<td width="20%">Registro Interno</td>
			<td width="1%">:</td>
			<td width="79%"></td>
			</tr>
			<tr>
				<td>Fecha de Emisi&oacute;n</td>
				<td>:</td>
				<td>'.date('d-m-Y').'</td>
			</tr>
		</table>
		</div>

		<br>
			<div border="1">
	<table  cellspacing="4" >
			<tr bgcolor="#FFCC66">
				<td colspan="3" bgcolor="#FFCC33" style="text-align: center">IDENTIFICACI&Oacute;N DE LOS ENSAYOS</td>
			</tr>
			<tr>
				<td width="20%"><span class="Estilo4">N&deg; de Muestras </span></td>
				<td width="1%">:</td>
				<td width="79%" class="Estilo4">
			</td>
		</tr>
		<tr>
			<td>Lugar de Ensayo</td>
			<td>:</td>
			<td>Laboratorio de Autocontrol (Cantera R&iacute;o Seco)</td>
		</tr>
		<tr>
			<td>Periodo de Muestreo</td>
			<td>:</td>
			<td></td>
			</tr>
<tr>
	<td>Procedimiento</td>
	<td>:</td>
	<td>CV_L_MH_01</td>
</tr>
<tr>
	<td>Tipo de Ensayo</td>
	<td>:</td>
	<td></td>
</tr>
</table> </div>

<br><br>
	<div border="1">
	<table  cellspacing="4" >
	<tr bgcolor="#FFCC66">
		<td colspan="5" bgcolor="#FFCC33" style="text-align: center">DETALLE DE EQUIPOS UTILIZADOS </td>
	</tr>
	<tr>
		<td width="20%">Descripci&oacute;n</td>
		<td width="20%">Codigo</td>
		<td width="20%">Certificado de Calibraci&oacute;n </td>
		<td width="20%">Proxima Calibraci&oacute;n </td>
		<td width="20%">Emitido</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table></div>

<br>
<table border="0" bordercolor="#000000">
<tr>
	<td>Referencia:<br><br>Las muestras ensayadas en el presente informe, se encuentran establecidas por las Normas:<br><br>
	 </td>
</tr>
</table>

<br><br><br>


	_______________________________________________________________________________________<br>
	<table>
		<tr>
			<td width="33%" class="Estilo4" style="width: 33%; text-align: left;">Laboratorio de Autocontrol<br></td>
				<td width="49%" class="Estilo4" style="width: 34%; text-align: center"></td>
				<td width="5%" class="Estilo4" style="width: 33%; text-align: right"></td>
				</tr>
	</table>


';

$pdf->AddPage();
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
     
$html = '

			<table  border="0">
		<tr>
			<td width="40%" height="47"><br /></td>
			<td width="40%" style="text-align: center"></td>
			<td width="20%" ><p><img src="'.base_url().'assets/img/logo.png" alt="Logo" width="106" height="36" /></p></td>
		</tr>
	</table>


			<table>
				<tr>
					<td>
				<p style="text-align: center"> <h2>RESULTADO DE LOS ENSAYOS</h2> </p>
			</td>
		</tr>
		</table>



			<table border="0" cellpadding="1">
				<tr bgcolor="#FFCC33">
					<th width="8%" style="text-align: center" > Muestra</th>
					<th width="12%" style="text-align: center" > Hormig&oacute;nGrado</th>
					<th width="10%" style="text-align: center" > Fecha de Muestreo </th>
					<th width="5%" style="text-align: center" > Edad (d&iacute;as)</th>
					<th width="15%" style="text-align: center" > Ensayo Resistencia</th>
					<th width="10%" style="text-align: center" > Densidad </th>
					<th width="10%" style="text-align: center" > Resistencia (kg/cm2) </th>
					<th width="10%" style="text-align: center" > Resistencia (Mpa)</th>
					<th width="20%" style="text-align: center" > Ubicaci&oacute;n</th>
				</tr>

				';
				$mue_id=0;
  foreach ($ensayos as $fila) 
        {
        	if($mue_id!=$fila['mue_id'])
        		{
        			if($mue_id!=0)
        			{
        				$html .= '<tr><td colspan="9">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td></tr>';
        			}

        			$rowspan=$this->count_array_valor($ensayos,$fila['mue_n_muestra']);
		    		$html .= "<tr>";
		            $html .= '<td rowspan="'.$rowspan.'" style="text-align: center" >'.$fila['mue_n_muestra']."</td>";
		          	$html .= '<td style="text-align: center"  rowspan="'.$rowspan.'"></td>';
		      		$html .= '<td style="text-align: center"  rowspan="'.$rowspan.'">'.date("d-m-Y",strtotime($fila['mue_fecha_muestreo']))."</td>";
      				$html .= '<td style="text-align: center" >'.$fila['ens_edad']."</td>";
            		$html .= '<td style="text-align: center" >'.$fila['ens_tipo_probeta']." " .$fila['ens_ensaye']."</td>";
            		$html .= '<td style="text-align: center" >'.$fila['ens_densidad']."</td>";
            		$html .= '<td style="text-align: center" >'.$fila['ens_resistencia_cilindrica_kgc2']."</td>";
            		$html .= '<td style="text-align: center" >'.$fila['ens_resistencia_mpa']."</td>";
            		$html .= '<td style="text-align: center"  rowspan="'.$rowspan.'">'.$fila['mue_ubicacion']."</td>";
            		$html .= "</tr>";
            		$mue_id=$fila['mue_id'];
        		}
        		else
        		{
        			$html .= "<tr>";
		       		$html .= '<td style="text-align: center" >'.$fila['ens_edad']."</td>";
            		$html .= '<td style="text-align: center" >'.$fila['ens_tipo_probeta']." " .$fila['ens_ensaye']."</td>";
            		$html .= '<td style="text-align: center" >'.$fila['ens_densidad']."</td>";
            		$html .= '<td style="text-align: center" >'.$fila['ens_resistencia_cilindrica_kgc2']."</td>";
            		$html .= '<td style="text-align: center" >'.$fila['ens_resistencia_mpa']."</td>";
            		$html .= "</tr>";
            		$mue_id=$fila['mue_id'];
        		}
		}
	$html .=			'
				</table>
		
	
<br><br><br>
<table>
<tr>
	<td colspan="5"> Referencia:<br><br>

		Los resultados de los ensayos del presente informe, se encuentran establecidos por las siguientes normas:<br><br>


	</td></tr>
</table>

		_______________________________________________________________________________________<br>
	<table>
		<tr>
			<td width="33%" class="Estilo4" style="width: 33%; text-align: left;">Laboratorio de Autocontrol<br></td>
				<td width="49%" class="Estilo4" style="width: 34%; text-align: center"></td>
				<td width="5%" class="Estilo4" style="width: 33%; text-align: right"></td>
				</tr>
	</table>

	</body></html>
		';



	   	$pdf->SetFont('Helvetica', '', 8, '', true);

		$pdf->AddPage();
 		$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("Informe Ensayo.pdf");
        $pdf->Output($nombre_archivo, 'I');

// fin de informe ----------------------------------------------------


	   	}


	}



	public function evaluaciones()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('url_helper');
		$data['selected']="Informes";
		$data['link_selected']="";
		
		$this->load->model('cliente_model');
		$data['clientes']=$this->cliente_model->get_cliente();	

		$this->load->model('planta_model');
		$data['plantas']=$this->planta_model->get_planta();	

		$this->form_validation->set_rules('cli_id', 'Cliente', 'required');
		
					
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('informes\evaluacion');
			$this->load->view('essential_js');
			$this->load->view('hormigon\specific_js');
			$this->load->view('footer');
		}
		else{
						$this->load->model('informe_model');
						$data['ensayos']=$this->informe_model->get_ensayos($this->input->post('obr_id'),$this->input->post('pla_id'));
						//captura listado general de ensayos y se crean los objetos para ser almacenados en array de objetos
						foreach ($data['ensayos'] as $key) {
							if(!isset($muestras[$key['mue_n_muestra']]))	{		
								$muestra = new Muestra();
								$muestra->mue_n_muestra=$key['mue_n_muestra'];
								$muestras[$key['mue_n_muestra']]=$muestra;
							}
						}
						//se cargan los diferentes ensayos de las muestras en cada objeto
						foreach ($muestras as $key ) {
							$mue_n_muestra=$key->mue_n_muestra;
							foreach ($data['ensayos'] as $ensayos) {
								if($ensayos['mue_n_muestra']==$mue_n_muestra){
									$key->setEnsayo($ensayos);
								}
							}
						}


						

					 // inicializamos la librería
					        $this->load->library('PHPExcel.php');
					        $file = './evaluacion.xlsx';                             
					        $this->phpexcel = PHPExcel_IOFactory::load($file);
					        // configuramos las propiedades del documento
					        $this->phpexcel->getProperties()->setCreator("CONCREMAG")
					                                     ->setLastModifiedBy("CONCREMAG")
					                                     ->setTitle("CONCREMAG")
					                                     ->setSubject("")
					                                     ->setDescription("")
					                                     ->setKeywords("")
					                                     ->setCategory("");         
					        // agregamos información a las celdas
					        $this->phpexcel->setActiveSheetIndex(0)
					            ->setCellValue('D7','OBRA');

					            $i=14;
					            foreach ($muestras as $key) {

					         $this->phpexcel->setActiveSheetIndex(0)->setCellValue('C'.$i,$key->mue_n_muestra);

	$cilindros=$key->getEnsayoCilindro();
	$prismas=$key->getEnsayoPrisma();

  $this->phpexcel->setActiveSheetIndex(0)->setCellValue('j'.$i,$cilindros[0]['ens_resistencia_mpa']);
  $this->phpexcel->setActiveSheetIndex(0)->setCellValue('k'.$i,$cilindros[1]['ens_resistencia_mpa']);
  $this->phpexcel->setActiveSheetIndex(0)->setCellValue('l'.$i,$cilindros[2]['ens_resistencia_mpa']);
  $this->phpexcel->setActiveSheetIndex(0)->setCellValue('n'.$i,$prismas[0]['ens_resistencia_mpa']);
  $this->phpexcel->setActiveSheetIndex(0)->setCellValue('o'.$i,$prismas[1]['ens_resistencia_mpa']);
  $this->phpexcel->setActiveSheetIndex(0)->setCellValue('p'.$i,$prismas[2]['ens_resistencia_mpa']);
 
							//echo count($key->getEnsayoCilindro())."<br>";
							# code...
									$i++;
								}
					
			
			  		        // Renombramos la hoja de trabajo
			    		    //    $this->phpexcel->getActiveSheet()->setTitle('CONCREMAG');         
					        // configuramos el documento para que la hoja
					        // de trabajo número 0 sera la primera en mostrarse
					        // al abrir el documento
					        $this->phpexcel->setActiveSheetIndex(0);

					         // redireccionamos la salida al navegador del cliente (Excel2007)
					        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					        header('Content-Disposition: attachment;filename="socios.xlsx"');
					        header('Cache-Control: max-age=0');         
					        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
					        $objWriter->save('php://output');


		}
		

	}


	public function count_array_valor($variable,$string)
	{	
		$i=0;
			foreach ($variable as $key ) {
				if ($key['mue_n_muestra']==$string) {
					$i++;
				}
			}
			return $i;

	}

}