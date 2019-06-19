
<?php 
/// informe ---------------------------------------------------------
	   					$this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Concremag');
        $pdf->SetTitle('Informe Ensayo');
        $pdf->SetSubject('Informe Ensayo');
        $pdf->setFontSubsetting(true);
    	$pdf->SetFont('Helvetica', '', 9, '', true);

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
			<td width="79%" ></td>
		</tr>
		<tr >
			<td>Direcci&oacute;n</td>
			<td>:</td>
			<td></td>
		</tr>
		<tr >
			<td>Obra</td>
			<td>:</td>
			<td></td>
		</tr>
		<tr >
			<td>Direcci&oacute;n Obra </td>
			<td>:</td>
			<td></td>
		</tr>
	</table>
</div>
	<br><br>
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
				<td></td>
			</tr>
		</table>
		</div>

		<br><br>
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

<br><br><br>
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



			<table border="0" >
				<tr bgcolor="#FFCC33">
					<th width="10%" style="text-align: center" > Muestra</th>
					<th width="10%" style="text-align: center" > Hormig&oacute;nGrado</th>
					<th width="10%" style="text-align: center" > Fecha de Muestreo </th>
					<th width="5%" style="text-align: center" > Edad (d&iacute;as)</th>
					<th width="15%" style="text-align: center" > Ensayo Resistencia</th>
					<th width="10%" style="text-align: center" > Densidad </th>
					<th width="10%" style="text-align: center" > Resistencia (kg/cm2) </th>
					<th width="10%" style="text-align: center" > Resistencia (Mpa)</th>
					<th width="20%" style="text-align: center" > Ubicaci&oacute;n</th>
				</tr>
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



	   	$pdf->SetFont('Helvetica', '', 7, '', true);

		$pdf->AddPage();
 		$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $nombre_archivo = utf8_decode("Informe Ensayo.pdf");
      

        $pdf->Output($nombre_archivo, 'I');

// fin de informe ----------------------------------------------------
