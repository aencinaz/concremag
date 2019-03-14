<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Muestra
{
    // Declaración de una propiedad
    public $mue_n_muestra=0;
	private $ensayos=array();

    // Declaración de un método
    public function setEnsayo($ensayo) {
        array_push($ensayos, $ensayo);
    }
	

}

class Informes extends CI_Controller {
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
			
$a = new Muestra();
echo $a->mue_n_muestra;


			
						exit();

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
}