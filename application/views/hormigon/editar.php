   
   <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Muestra de Hormigón</h1>       
          <p>Ficha de Muestra</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Muestras de hormigón</a></li>
          <li class="breadcrumb-item"><a href="#">Ficha</a></li>
          
        </ul>
      </div>
        <!-- Buttons-->
            <div class="row">
              <div class="col-md-12">
                <div class="tile">

          
         
  <div class="container-fluid">
            
<?php echo form_open(base_url()."muestrahormigon/editar/".$id) ?> 
                                                  <div class="row">
                                          <div class="col-sm">

                                           <div class="form-group row">
                                                    <label for="smFormGroupInput" class="col-sm-2 col-form-label-sm col-form-label-sm-sm">Cliente</label>
                                                    <div class="col-sm-10">
                                                      <input readonly name ="num_muestra" autocomplete="off" value="<?php echo $muestra['cli_nombre']; ?>" type="text" class="form-control form-control-sm form-control form-control-sm-sm">
                                                    </div>
                                                  </div>

                                           </div>
                                          <div class="col-sm">
                                                  <div class="form-group row">
                                                    <label for="smFormGroupInput" class="col-sm-2 col-form-label-sm col-form-label-sm-sm">Obra</label>
                                                    <div class="col-sm-10">
                                                      <input readonly name ="num_muestra" autocomplete="off" value="<?php echo $muestra['obr_nombre']; ?>" type="text" class="form-control form-control-sm form-control form-control-sm-sm">
                                                    </div>
                                                  </div>
                                           </div>
                                       </div>
                                       
                                        <div class="row">
                                          <div class="col-sm-4">
                                                <div class="form-group row">
                                                    <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Muestra N°</label>
                                                    <div class="col-sm-6">
                                                      <input readonly name ="num_muestra" autocomplete="off" value="<?php echo $muestra['mue_n_muestra']; ?>" type="text" class="form-control form-control-sm form-control form-control-sm-sm">
                                                    </div>
                                                  </div>
                                              <div class="form-group row">
                                                <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Guia de Despacho</label>
                                                <div class="col-sm-6">
                                                  <input name="guia" autocomplete="off" value="<?php echo $muestra['mue_guia']; ?>" class="form-control form-control-sm form-control form-control-sm-sm" type="text"  >
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                 <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Fecha de Muestreo</label>
                                                <div class="col-sm-6">
                                                  <input readonly name="fecha_muestreo" autocomplete="off" value="<?php echo $muestra['mue_fecha_muestreo']; ?>" class="form-control form-control-sm" type="date" >
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                 <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Fecha de Ingreso</label>
                                                <div class="col-sm-6">
                                                  <input name="fecha_ingreso_lab" autocomplete="off" value="<?php echo $muestra['mue_fecha_ingreso_lab']; ?>" class="form-control form-control-sm" type="date"  >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Asentamiento Cono</label>
                                                <div class="col-sm-6">
                                                  <input name="asentamiento" autocomplete="off" value="<?php echo $muestra['mue_asentamiento_cono']; ?>" class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                        

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hora salida Panta</label>
                                                <div class="col-sm-6">
                                                  <input name="h_planta" autocomplete="off" value="<?php echo $muestra['mue_hora_planta']; ?>" class="form-control form-control-sm" type="time">
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hora LLegada Obra</label>
                                                <div class="col-sm-6">
                                                  <input name="h_obra" autocomplete="off" value="<?php echo $muestra['mue_hora_obra']; ?>" class="form-control form-control-sm" type="time" >
                                                </div>
                                              </div>

                                            </div>
                                       <div class="col-sm-4">

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hora Inicio Descarga</label>
                                                <div class="col-sm-6">
                                                  <input name="h_descarga" autocomplete="off" value="<?php echo $muestra['mue_hora_descarga']; ?>" class="form-control form-control-sm" type="time"  >
                                                </div>
                                              </div>

                                        

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hora Muestreo</label>
                                                <div class="col-sm-6">
                                                  <input name="h_muestreo" autocomplete="off" value="<?php echo $muestra['mue_hora_muestreo']; ?>"  class="form-control form-control-sm" type="time" >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Aditivos</label>
                                                <div class="col-sm-6">
                                                  <input name="aditivos" autocomplete="off" value="<?php echo $muestra['adi_nombre']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>
                                          
                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hormigón Grado</label>
                                                <div class="col-sm-6">
                                                  <input name="hormigon_grado" autocomplete="off" value="<?php echo $muestra['hor_nombre']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Compactación</label>
                                                <div class="col-sm-6">
                                                  <input name="compactacion" autocomplete="off" value="<?php echo $muestra['mue_compactacion']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Tipo de Camión</label>
                                                <div class="col-sm-6">
                                                  <input name="camion" autocomplete="off" value="<?php echo $muestra['cam_nombre']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Panta N°</label>
                                                <div class="col-sm-6">
                                                  <input name="id_planta" autocomplete="off" value="<?php echo $muestra['pla_id']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Cemento</label>
                                                <div class="col-sm-6">
                                                  <input name="id_cemento" autocomplete="off" value="<?php echo $muestra['cem_id']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>
                                                  </div>
                                        <div class="col-sm-4">
                                        

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Camión N°</label>
                                                    <div class="col-sm-6">
                                                      <input name="num_camion" autocomplete="off" value="<?php echo $muestra['mue_numero_camion']; ?>" class="form-control form-control-sm" type="text" >
                                                    </div>
                                                  </div>



                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Cantidad M3</label>
                                                    <div class="col-sm-6">
                                                      <input name="cntm3" autocomplete="off" value="<?php echo $muestra['mue_cntm3']; ?>" class="form-control form-control-sm" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Aire</label>
                                                    <div class="col-sm-6">
                                                      <input name="aire" autocomplete="off" value="<?php echo $muestra['mue_aire']; ?>" class="form-control form-control-sm" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">T° Ambiente</label>
                                                    <div class="col-sm-6">
                                                      <input name="t_ambiente" autocomplete="off" value="<?php echo $muestra['mue_temperatura_ambiente']; ?>" class="form-control form-control-sm" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">T° Hormigón</label>
                                                    <div class="col-sm-6">
                                                      <input name="t_hormigon" autocomplete="off" value="<?php echo $muestra['mue_temperatura_hormigon']; ?>" class="form-control form-control-sm" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Elemento Hormigonado</label>
                                                    <div class="col-sm-6">
                                                      <input name="elemen_hormi" autocomplete="off" value="<?php echo $muestra['mue_elemento_hormigonado']; ?>" class="form-control form-control-sm" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Ubicación</label>
                                                    <div class="col-sm-6">
                                                      <input name="ubicacion" autocomplete="off" value="<?php echo $muestra['mue_ubicacion']; ?>" class="form-control form-control-sm" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Observaciones</label>
                                                    <div class="col-sm-6">
                                                      <input name="observaciones" autocomplete="off" value="<?php echo $muestra['mue_observaciones']; ?>" class="form-control form-control-sm" type="text">
                                                    </div>
                                                  </div>
                                          
         </div>
      </div>
    </div>
  
      
  
 <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."muestra/listar";?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
    
          </div>
        </div>
      </div>
    </main>


