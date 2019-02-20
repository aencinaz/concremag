  <script language="javascript" type="text/javascript">   
  function resistencia3(f) {   
d1 = document.form1.diametro_d1.value;
d2 = document.form1.diametro_d2.value;
carga = document.form1.carga_max.value;
masa = document.form1.masa.value;
alturah1 =document.form1.altura_h1.value;
alturah2 =document.form1.altura_h2.value;

      diametro=(parseFloat(d1) + parseFloat(d2))/2;
      altura=(parseFloat(alturah1) + parseFloat(alturah2))/2;
      aerea=((diametro/10)*(diametro/10)/4)*3.141516;
      volumen=(aerea*altura)/10;
      densidad=parseInt(masa)/parseInt(volumen);     
      ResistenciaCilindricaMPA=((((parseFloat(carga)*1000))/(aerea*100)));
      ResistenciaCilindricaKGc2=ResistenciaCilindricaMPA.toFixed(1)*10;

    
      if( ResistenciaCilindricaMPA.toFixed(1) >= 20 ) {
         
         ResistenciaCubicaMPA = ResistenciaCilindricaMPA + 5;
         
         }
         else{
                 ResistenciaCubicaMPA= ResistenciaCilindricaMPA * 1.25;
        }
        
        ResistenciaCubicaKGc2=ResistenciaCubicaMPA.toFixed(1)*10;

         document.form1.resistencia_cubica.value = parseInt(ResistenciaCubicaKGc2);//kgc2
         document.form1.resistencia_mpa.value = ResistenciaCubicaMPA.toFixed(1);
         document.form1.aerea.value = aerea.toFixed(2);
         document.form1.volumen.value = parseInt(volumen);
         document.form1.densidad.value = densidad.toFixed(3);

         document.form1.ResistenciaCilindricaMPA.value = ResistenciaCilindricaMPA.toFixed(1);
         document.form1.ResistenciaCilindricaKGc2.value = ResistenciaCilindricaKGc2.toFixed(0);      
   }

</script> 

 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Ensayo</h1>       
          <p>Ficha de Ensayo Cubo Compresión</p>
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
<?php echo form_open(base_url()."muestrahormigon/ensayo/".$ensayo['ens_id'],$attributes) ?> 
                                    

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
                                                 <label for="smFormGroupInput" class="row-sm">Fecha de Muestreo</label>
                                                <div class="row-sm">
                                                  <input name="fecha_muestreo" autocomplete="off" value="<?php echo $muestra['mue_fecha_muestreo']; ?>" class="form-control form-control-sm" type="date" >
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
                                                <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Altura(h1)(mm)</label>
                                                <div class="col-sm-6">
                                                  <input  onkeyup='resistencia3(this)' name="altura_h1" autocomplete="off" value="<?php echo $ensayo['ens_altura_h1']; ?>" class="form-control form-control-sm form-control form-control-sm-sm" type="text"  >
                                                </div>
                                              </div>
                                         
                                              <div class="form-group row">
                                                 <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Altura(h2)(mm)</label>
                                                <div class="col-sm-6">
                                                  <input  onkeyup='resistencia3(this)' name="altura_h2" autocomplete="off" value="<?php echo $ensayo['ens_altura_h2']; ?>" class="form-control form-control-sm" type="text"  >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Diametro(d1)(mm)</label>
                                                <div class="col-sm-6">
                                                  <input onkeyup='resistencia3(this)'  name="diametro_d1" autocomplete="off" value="<?php echo $ensayo['ens_diametro_d1']; ?>" class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                        

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Diametro(d2)(mm)</label>
                                                <div class="col-sm-6">
                                                  <input  onkeyup='resistencia3(this)' name="diametro_d2" autocomplete="off" value="<?php echo $ensayo['ens_diametro_d2']; ?>" class="form-control form-control-sm" type="text">
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Masa(g)</label>
                                                <div class="col-sm-6">
                                                  <input name="masa" autocomplete="off" value="<?php echo $ensayo['ens_masa']; ?>" class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Masa Sumergida(g)</label>
                                                <div class="col-sm-6">
                                                  <input name="masa_sumergida" autocomplete="off" value="<?php echo $ensayo['ens_masa_sumergida']; ?>" class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>



                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Masa SSS</label>
                                                <div class="col-sm-6">
                                                  <input name="masasss" autocomplete="off" value="<?php echo $ensayo['ens_masa_sss']; ?>" class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>



                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Carga Máxima(Kg)</label>
                                                <div class="col-sm-6">
                                                  <input name="carga_max" autocomplete="off" value="<?php echo $ensayo['ens_carga_max']; ?>" class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>


                                            </div>




                                       <div class="col-sm-6">

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Carga Máxima (Kn) corregida</label>
                                                <div class="col-sm-6">
                                                  <input name="carga_corregida" autocomplete="off" value="<?php echo $ensayo['ens_carga_corregida']; ?>" class="form-control form-control-sm" type="text"  >
                                                </div>
                                              </div>

                                        

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Volumen (cm3)</label>
                                                <div class="col-sm-6">
                                                  <input name="volumen" autocomplete="off" value="<?php echo $ensayo['ens_volumen']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Area (mm2)</label>
                                                <div class="col-sm-6">
                                                  <input name="aerea" autocomplete="off" value="<?php echo $ensayo['ens_area']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>
                                          
                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Densidad (kg/m3)</label>
                                                <div class="col-sm-6">
                                                  <input name="densidad" autocomplete="off" value="<?php echo $ensayo['ens_densidad']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Resistencia Cilindrica (kg/cm2)</label>
                                                <div class="col-sm-6">
                                                  <input name="ResistenciaCilindricaKGc2" autocomplete="off" value="<?php echo $ensayo['ens_resistencia_cilindrica_kgc2']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                            <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Resistencia Cilindrica (MPa)</label>
                                                <div class="col-sm-6">
                                                  <input name="ResistenciaCilindricaMPA" autocomplete="off" value="<?php echo $ensayo['ens_resistencia_cilindrica_mpa']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>
                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Resistencia Cubica (kg/cm2)</label>
                                                <div class="col-sm-6">
                                                  <input name="resistencia_cubica" autocomplete="off" value="<?php echo $ensayo['ens_resistencia_cubica']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Resistencia Cubica (Mpa)</label>
                                                <div class="col-sm-6">
                                                  <input name="resistencia_mpa" autocomplete="off" value="<?php echo $ensayo['ens_resistencia_mpa']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Observaciones</label>
                                                <div class="col-sm-6">
                                                  <input name="observaciones" autocomplete="off" value="<?php echo $ensayo['ens_observaciones']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>
                                          

                                          
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


