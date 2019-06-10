  <script language="javascript" type="text/javascript">   

function resistencia3(f) {  

anchob1 = document.form1.ancho_b1.value;
anchob2 = document.form1.ancho_b2.value;
carga = document.form1.carga_max.value;
masa = document.form1.masa.value;
alturah1 =document.form1.altura_h1.value;
alturah2 =document.form1.altura_h2.value;
largo=document.form1.largo_h1.value;

a =parseFloat(document.form1.cal_a.value);
c =parseFloat(document.form1.cal_b.value);

simbolo1 =document.form1.cal_simbolo_1.value;
simbolo2 =document.form1.cal_simbolo_2.value;  


if(simbolo2=="+")
  {
    cargamaxcorregida=(a*carga)+c;
  }
  else
  {
    cargamaxcorregida=(a*carga)-c;
  }
  
  cargamaxcorregida=Math.round(cargamaxcorregida);
  document.form1.carga_corregida.value=cargamaxcorregida;
  carga=cargamaxcorregida;


      ancho=(parseFloat(anchob1) + parseFloat(anchob2))/2;
      
    //  document.form1.observaciones.value = largo;
      
      altura=(parseFloat(alturah1) + parseFloat(alturah2))/2;
      aerea=(ancho*(altura*altura));
      volumen=(ancho*altura*(parseFloat(largo)))/100;
      densidad=(parseInt(masa)/volumen)*1000;
      luz=altura.toFixed(0)*3;

      resistenciampa=((parseFloat(carga)*1000))*luz/aerea;
      Resistenciaflexo=resistenciampa.toFixed(1)*10;
      aerea=aerea/1000; 
      
        //document.form1.observaciones.value = ResistenciaCilindrica;
        document.form1.resistencia_cubica.value = Resistenciaflexo.toFixed(0);
         document.form1.resistencia_mpa.value = resistenciampa.toFixed(1);
         document.form1.aerea.value = aerea.toFixed(0);
         document.form1.volumen.value = volumen.toFixed(0);
         document.form1.densidad.value = densidad.toFixed(0);
         document.form1.ens_luz.value = luz;
         
      
   }
</script>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Ensayo Hormigón</h1>       
          <p>Ficha de Ensayo Prisma Flexotracción</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Muestras de hormigón</a></li>
          <li class="breadcrumb-item"><a href="#">Ficha</a></li>
          <li class="breadcrumb-item"><a href="#">Ensayo</a></li>
          
        </ul>
      </div>
        <!-- Buttons-->
            <div class="row">
              <div class="col-md-12">
                <div class="tile">

          
         
  <div class="container-fluid">

<?php $attributes = array('id' => 'form1','name' => 'form1'); ?>            
<?php echo form_open(base_url()."muestra/ensayo/".$ensayo['ens_id'],$attributes) ?> 
                                    

                                     <div class="row">

                                           <div class="form-group col">
                                                    <label for="smFormGroupInput" class="row-sm">Cliente</label>
                                                    <div class="row-sm">
                                                      <input name ="num_muestra" autocomplete="off" value="<?php echo $muestra['cli_nombre']; ?>" type="text" class="form-control form-control-sm">
                                                    </div>
                                          </div>

                                          
                                          <div class="form-group col">
                                                    <label for="smFormGroupInput" class="row-sm">Obra</label>
                                                    <div class="row-sm">
                                                      <input name ="num_muestra" autocomplete="off" value="<?php echo $muestra['obr_nombre']; ?>" type="text" class="form-control form-control-sm">
                                                    </div>
                                          </div>

                                          <div class="form-group col">
                                                    <label for="smFormGroupInput" class="row-sm">Muestra N°</label>
                                                    <div class="row-sm">
                                                      <input name ="num_muestra" autocomplete="off" value="<?php echo $muestra['mue_n_muestra']; ?>" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>

                                           <div class="form-group col">
                                                 <label for="smFormGroupInput" class="row-sm">Fecha de Ensayo</label>
                                                <div class="row-sm">
                                                  <input name="ens_fecha_ensaye" autocomplete="off" value="<?php echo $ensayo['ens_fecha_ensaye']; ?>" class="form-control " type="date" >
                                                </div>
                                          </div>
                                        </div>
                                      </div>
                                       </div>
                                         <div class="tile">
                                        <div class="container-fluid">

                                        <div class="row">
                                          <div class="col-sm-6">
                                         
                                              <div class="form-group row">
                                                <label for="smFormGroupInput" class="col-sm-6 col-form-label">Altura(h1)(mm)</label>
                                                <div class="col-sm-6">
                                                  <input  onkeyup='resistencia3(this)' name="altura_h1" autocomplete="off" value="<?php echo $ensayo['ens_altura_h1']; ?>" class="form-control" type="text"  >
                                                </div>
                                              </div>
                                         
                                              <div class="form-group row">
                                                 <label for="smFormGroupInput" class="col-sm-6 col-form-label">Altura(h2)(mm)</label>
                                                <div class="col-sm-6">
                                                  <input  onkeyup='resistencia3(this)' name="altura_h2" autocomplete="off" value="<?php echo $ensayo['ens_altura_h2']; ?>" class="form-control" type="text"  >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-6 col-form-label">Ancho (b1)(mm)</label>
                                                <div class="col-sm-6">
                                                  <input onkeyup='resistencia3(this)'  name="ancho_b1" autocomplete="off" value="<?php echo $ensayo['ens_ancho_b1']; ?>" class="form-control" type="text" >
                                                </div>
                                              </div>

                                        

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Ancho (b2)(mm)</label>
                                                <div class="col-sm-6">
                                                  <input  onkeyup='resistencia3(this)' name="ancho_b2" autocomplete="off" value="<?php echo $ensayo['ens_ancho_b2']; ?>" class="form-control" type="text">
                                                </div>
                                              </div>
                                            <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Largo Probeta(cm)</label>
                                                <div class="col-sm-6">
                                                  <input name="largo_h1" autocomplete="off" value="<?php echo $ensayo['ens_largo_h1']; ?>" class="form-control" type="text" >
                                                </div>
                                              </div>



                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Masa(g)</label>
                                                <div class="col-sm-6">
                                                  <input name="masa" autocomplete="off" value="<?php echo $ensayo['ens_masa']; ?>" class="form-control" type="text" >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Masa Sumergida(g)</label>
                                                <div class="col-sm-6">
                                                  <input name="masa_sumergida" autocomplete="off" value="<?php echo $ensayo['ens_masa_sumergida']; ?>" class="form-control" type="text" >
                                                </div>
                                              </div>



                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Masa SSS</label>
                                                <div class="col-sm-6">
                                                  <input name="masasss" autocomplete="off" value="<?php echo $ensayo['ens_masa_sss']; ?>" class="form-control" type="text" >
                                                </div>
                                              </div>

                                                 <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label">Luz</label>
                                                <div class="col-sm-6">
                                                  <input name="ens_luz" autocomplete="off" value="<?php echo $ensayo['ens_luz']; ?>"  class="form-control" type="text" >
                                                </div>
                                              </div>

                                           
                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Carga Máxima(Kg)</label>
                                                <div class="col-sm-6">
                                                  <input name="carga_max" autocomplete="off" value="<?php echo $ensayo['ens_carga_max']; ?>" class="form-control" type="text" >
                                                </div>
                                              </div>


                                            </div>




                                       <div class="col-sm-6">

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Carga Máxima (Kn) corregida</label>
                                                <div class="col-sm-6">
                                                  <input name="carga_corregida" autocomplete="off" value="<?php echo $ensayo['ens_carga_corregida']; ?>" class="form-control" type="text"  >
                                                </div>
                                              </div>

                                        

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Volumen (cm3)</label>
                                                <div class="col-sm-6">
                                                  <input name="volumen" autocomplete="off" value="<?php echo $ensayo['ens_volumen']; ?>"  class="form-control" type="text" >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label">Area (mm2)</label>
                                                <div class="col-sm-6">
                                                  <input name="aerea" autocomplete="off" value="<?php echo $ensayo['ens_area']; ?>"  class="form-control" type="text" >
                                                </div>
                                              </div>
                                          
                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label">Densidad (kg/m3)</label>
                                                <div class="col-sm-6">
                                                  <input name="densidad" autocomplete="off" value="<?php echo $ensayo['ens_densidad']; ?>"  class="form-control" type="text" >
                                                </div>
                                              </div>

                                      
                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label">Resistencia Flexotracción (kg/cm2)</label>
                                                <div class="col-sm-6">
                                                  <input name="resistencia_cubica" autocomplete="off" value="<?php echo $ensayo['ens_resistencia_cubica']; ?>"  class="form-control" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label">Resistencia Flexotracción (Mpa)</label>
                                                <div class="col-sm-6">
                                                  <input name="resistencia_mpa" autocomplete="off" value="<?php echo $ensayo['ens_resistencia_mpa']; ?>"  class="form-control" type="text" >
                                                </div>
                                              </div>



                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label">Observaciones</label>
                                                <div class="col-sm-6">
                                                  <input name="observaciones" autocomplete="off" value="<?php echo $ensayo['ens_observaciones']; ?>"  class="form-control" type="text" >
                                                </div>
                                              </div>


                                                 <div class="form-group row">
          <label for="example-url-input" class="col-sm-6 col-form-label">Prensa</label>
          <div class="col-sm-6">
             <select name="prensa"  id="primary" class="form-control" >
                  <?php foreach ($prensas as $item):
                  if($ensayo['pre_id']==$item['pre_id']){ 
                    echo "<option selected value=".$item['pre_id'].">".$item['pre_nombre']."</option>";
                   }
                  else{
                    echo "<option value=".$item['pre_id'].">".$item['pre_nombre']."</option>";
                   }
                   endforeach; ?>
                </select>
            </div>
        </div>

<div class="form-group row">
          <label for="example-url-input" class="col-sm-6 col-form-label">Calibración</label>
          <div class="col-sm-6">
           <select name="cal_id"  id="secondary" class="form-control" >
                </select>
            </div>
        </div>
                                          


                           <input name="cal_a"          type="hidden" id="cal_a" value="<?php echo $ensayo['cal_a']; ?>">
                           <input name="cal_simbolo_1"  type="hidden" id="cal_simbolo_1" value="<?php echo $ensayo['cal_simbolo_1']; ?>">
                           <input name="cal_simbolo_2"  type="hidden" id="cal_simbolo_2" value="<?php echo $ensayo['cal_simbolo_2']; ?>" >
                           <input name="cla_b"          type="hidden" id="cal_b" value="<?php echo $ensayo['cal_b']; ?>"  >
                           <input name="cal_id_h"         type="hidden" id="cal_id" value="<?php echo $ensayo['cal_id']; ?>"  >
        </div>
      </div>
    </div>
  
      
  
 <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."muestra/ficha/".$muestra['mue_id']."/ensayo" ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
    
          </div>
        </div>
      </div>
    </main>


