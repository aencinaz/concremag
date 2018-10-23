 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Muestra de Prefabricados</h1>       
          <p>Ficha de Muestra</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Muestras de Prefabricados</a></li>
          <li class="breadcrumb-item"><a href="#">Ficha</a></li>
          
        </ul>
      </div>
        <!-- Buttons-->
            <div class="row">


              <div class="col-md-12">


                <div class="tile">

          
         
  <div class="container-fluid">

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

                              

    <div class="card">


      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link <?php if($pestana==="muestra"){echo "active";}?>" id="muestra-tab" data-toggle="tab" href="#muestra" role="tab" aria-controls="muestra" aria-selected="true">Detalle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($pestana==="ensayo"){echo "active";}?>" id="ensayos-tab" data-toggle="tab" href="#ensayos" role="tab" aria-controls="ensayos" aria-selected="false">Ensayos</a>
          </li>
        </ul>
      </div>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade <?php if($pestana==="muestra"){echo "show active";}?>" id="muestra" role="tabpanel" aria-labelledby="muestra-tab">
          <div class="card-body">
            

                                                 
                                        <div class="row">
                                          <div class="col-sm-4">
                                                <div class="form-group row">
                                                    <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Muestra N°</label>
                                                    <div class="col-sm-6">
                                                      <input name ="num_muestra" autocomplete="off" value="<?php echo $muestra['mue_n_muestra']; ?>" type="text" class="form-control form-control-sm form-control form-control-sm-sm">
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
                                                  <input name="fecha_muestreo" autocomplete="off" value="<?php echo $muestra['mue_fecha_muestreo']; ?>" class="form-control form-control-sm" type="date" >
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                 <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Fecha de Ingreso</label>
                                                <div class="col-sm-6">
                                                  <input name="fecha_ingreso_lab" autocomplete="off" value="<?php echo $muestra['mue_fecha_ingreso']; ?>" class="form-control form-control-sm" type="date"  >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Asentamiento Cono</label>
                                                <div class="col-sm-6">
                                                  <input name="asentamiento" autocomplete="off" value="<?php echo $muestra['mue_asentamiento']; ?>" class="form-control form-control-sm" type="text" >
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
                                                  <input name="id_planta" autocomplete="off" value="<?php echo $muestra['pla_nombre']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>

                                       <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Cemento</label>
                                                <div class="col-sm-6">
                                                  <input name="id_cemento" autocomplete="off" value="<?php echo $muestra['cem_nombre']; ?>"  class="form-control form-control-sm" type="text" >
                                                </div>
                                              </div>
                                                  </div>
                                        <div class="col-sm-4">
                                        

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Camión N°</label>
                                                    <div class="col-sm-6">
                                                      <input name="num_camion" autocomplete="off" value="<?php echo $muestra['cam_numero_camion']; ?>" class="form-control form-control-sm" type="text" >
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


                                          <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <a class="btn btn-primary" href="<?php echo base_url().'Prefabricado/formulario/'.$muestra['mue_id']; ?>" target="_blank"><i class="fa fa-print"></i> Formulario de Ensaye</a>
                </div>
              </div>
            


          </div>
        </div>
          <div class="tab-pane fade <?php if($pestana==="ensayo"){echo "show active";}?>" id="ensayos" role="tabpanel" aria-labelledby="ensayos-tab">
            <div class="card-body">
                   <table  class="table table-sm table-striped">
                   <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Fecha Ensayo</th>
                  
                      <th scope="col">Edad</th>
                      <th scope="col">Probeta</th>
                      <th scope="col">Ensaye</th>
                      <th scope="col">Dendidad</th>
                      <th scope="col">Resistencia (Kg/cm2)</th>
                      <th scope="col">Resistencia (Mpa)</th>
                      <th scope="col"></th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($ensayos as $ensayo_item): ?>
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $ensayo_item['fecha_ensaye']; ?></td>
                      <td><?php echo $ensayo_item['edad']; ?></td>
                      <td><?php echo $ensayo_item['tipo_probeta']; ?></td>
                      <td><?php echo $ensayo_item['ensaye']; ?></td>
                      <td><?php echo $ensayo_item['densidad']; ?></td>
                      <td><?php echo $ensayo_item['resistencia_cubica']; ?></td>
                      <td><?php echo $ensayo_item['resistencia_mpa']; ?></td>
                      <td><a href="<?php echo base_url().'Prefabricado/ensayo/'.$ensayo_item['id_ensayo']; ?>">Editar</a></td>
                     </tr>
                    <?php $i++; endforeach; ?>
                  </tbody>
                
                </table>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      
  

    
          </div>
        </div>
      </div>
    </main>


