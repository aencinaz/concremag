
<html><head>
	</head><body>
	<table  border="0">
		<tr>
			<td width="40%" height="47"><br /></td>
			<td width="40%" style="text-align: center"></td>
			<td width="20%" ><p><img src="<?php echo base_url() ;?>assets/img/logo.png" alt="Logo" width="106" height="36" /></p></td>
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
			<td width="20%" >Cliente</td>
			<td width="1%" >:</td>
			<td width="79%" ><?php echo $cliente["cli_nombre"]; ?> </td>
		</tr>
		<tr >
			<td>Direcci&oacute;n</td>
			<td>:</td>
			<td><?php echo $cliente["cli_direccion"]; ?></td>
		</tr>
		<tr >
			<td>Obra</td>
			<td>:</td>
			<td><?php echo $obra["obr_nombre"]; ?></td>
		</tr>
		<tr >
			<td>Direcci&oacute;n Obra </td>
			<td>:</td>
			<td><?php echo $obra["obr_ubicacion"]; ?></td>
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
				<td><?php echo date('d-m-Y'); ?></td>
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
				<?php 
				foreach ($numeros_de_muestras as $key) {
					echo $key." / "; 
				}
			 ?>
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
			<td><?php echo $fecha_min_de_muestras ." / " . $fecha_max_de_muestras; ?></td>
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
		<td style="text-align: center" width="15%">Descripci&oacute;n</td>
		<td style="text-align: center" width="20%">Codigo</td>
		<td style="text-align: center" width="25%">Certificado de Calibraci&oacute;n </td>
		<td style="text-align: center" width="20%">Proxima Calibraci&oacute;n </td>
		<td style="text-align: center" width="20%">Emitido</td>
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
</body>
</html>