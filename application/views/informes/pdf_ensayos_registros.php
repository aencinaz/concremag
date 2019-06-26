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
