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
        <?php if($mensaje!= FALSE){ ?>
                <div class="row">
                <div class="col-md-12">
                  <div class="bs-component">
                    <div class="alert alert-dismissible alert-<?php echo $mensaje['class']; ?>">
                      <button class="close" type="button" data-dismiss="alert">×</button><strong><?php echo $mensaje['strong']; ?>!</strong> <?php echo $mensaje['mensaje']; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>   
              
            <div class="row">


              <div class="col-md-12">


                <div class="tile">

          
         
  <div class="container-fluid">

     <div class="row">

                                           <div class="form-group col">
                                                    <label for="smFormGroupInput" class="row-sm">Cliente</label>
                                                    <div class="row-sm">
                                                      <input name ="num_muestra" autocomplete="off" value="<?php echo $muestra['cli_nombre']; ?>" type="text" class="form-control">
                                                    </div>
                                          </div>

                                          
                                          <div class="form-group col">
                                                    <label for="smFormGroupInput" class="row-sm">Obra</label>
                                                    <div class="row-sm">
                                                      <input name ="num_muestra" autocomplete="off" value="<?php echo $muestra['obr_nombre']; ?>" type="text" class="form-control">
                                                    </div>
                                          </div>

                                          <div class="form-group col">
                                                    <label for="smFormGroupInput" class="row-sm">Muestra N°</label>
                                                    <div class="row-sm">
                                                      <input name ="num_muestra" autocomplete="off" value="<?php echo $muestra['mue_n_muestra']; ?>" type="text" class="form-control">
                                                    </div>
                                                </div>

                                          <div class="form-group col">
                                                 <label for="smFormGroupInput" class="row-sm">Fecha de Muestreo</label>
                                                <div class="row-sm">
                                                  <input name="fecha_muestreo" autocomplete="off" value="<?php echo $muestra['mue_fecha_muestreo']; ?>" class="form-control" type="date" >
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
            <?php echo form_open(base_url()."muestra/editar/".$muestra['mue_id']) ?> 


                                                 
                                        <div class="row">
                                          <div class="col-sm-4">
                                                <div class="form-group row">
                                                    <label for="smFormGroupInput" class="col-sm-6 col-form-label">Muestra N°</label>
                                                    <div class="col-sm-6">
                                                      <input name ="mue_n_muestra" autocomplete="off" value="<?php echo $muestra['mue_n_muestra']; ?>" type="text" class="form-control">
                                                    </div>
                                                  </div>
                                              <div class="form-group row">
                                                <label for="smFormGroupInput" class="col-sm-6 col-form-label">Guia de Despacho</label>
                                                <div class="col-sm-6">
                                                  <input name="mue_guia" autocomplete="off" value="<?php echo $muestra['mue_guia']; ?>" class="form-control" type="text"  >
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                 <label for="smFormGroupInput" class="col-sm-6 col-form-label">Fecha de Muestreo</label>
                                                <div class="col-sm-6">
                                                  <input name="mue_fecha_muestreo" autocomplete="off" value="<?php echo $muestra['mue_fecha_muestreo']; ?>" class="form-control" type="date" >
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                 <label for="smFormGroupInput" class="col-sm-6 col-form-label">Fecha de Ingreso</label>
                                                <div class="col-sm-6">
                                                  <input name="mue_fecha_ingreso_lab" autocomplete="off" value="<?php echo $muestra['mue_fecha_ingreso_lab']; ?>" class="form-control" type="date"  >
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-email-input" class="col-sm-6 col-form-label">Asentamiento Cono</label>
                                                <div class="col-sm-6">
                                                  <input name="mue_asentamiento_cono" autocomplete="off" value="<?php echo $muestra['mue_asentamiento_cono']; ?>" class="form-control" type="text" >
                                                </div>
                                              </div>

                                        

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Hora salida Panta</label>
                                                <div class="col-sm-6">
                                                  <input name="mue_hora_planta" autocomplete="off" value="<?php echo $muestra['mue_hora_planta']; ?>" class="form-control" type="time">
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Hora LLegada Obra</label>
                                                <div class="col-sm-6">
                                                  <input name="mue_hora_obra" autocomplete="off" value="<?php echo $muestra['mue_hora_obra']; ?>" class="form-control" type="time" >
                                                </div>
                                              </div>

                                            </div>
                                       <div class="col-sm-4">

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Hora Inicio Descarga</label>
                                                <div class="col-sm-6">
                                                  <input name="mue_hora_descarga" autocomplete="off" value="<?php echo $muestra['mue_hora_descarga']; ?>" class="form-control" type="time"  >
                                                </div>
                                              </div>

                                        

                                              <div class="form-group row">
                                                <label for="example-time-input" class="col-sm-6 col-form-label">Hora Muestreo</label>
                                                <div class="col-sm-6">
                                                  <input name="mue_hora_muestreo" autocomplete="off" value="<?php echo $muestra['mue_hora_muestreo']; ?>"  class="form-control" type="time" >
                                                </div>
                                              </div>


        <div class="form-group row">
          <label class="col-sm-6 col-form-label">Aditivos</label>
          <div class="col-sm">
           <select name="adi_id" class="form-control" >
                         <option value=""></option>
                         <?php foreach ($aditivos as $aditivos_item): ?>
          
                  <option <?php if($aditivos_item['adi_id']==$muestra['adi_id']) echo " selected " ?> value="<?php echo $aditivos_item['adi_id']; ?>"><?php echo $aditivos_item['adi_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
        </div>
                                          
                                    <div class="form-group row">
              <label for="example-url-input" class="col-sm">Hormigón Grado</label>
              <div class="col-sm">
               <select name="hor_id" class="form-control" >
                      <option value=""></option> <?php foreach ($hormigones as $hormigon_item): ?>
               
                  <option <?php if($hormigon_item['hor_id']==$muestra['hor_id']) echo " selected " ?> value="<?php echo $hormigon_item['hor_id']; ?>"><?php echo $hormigon_item['hor_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Compactación</label>
              <div class="col-sm">
                <select name="mue_compactacion" class="form-control">
                       <option value=""></option>
                  <option <?php if("Mecánica"==$muestra['mue_compactacion']) echo " selected " ?> value="Mecánica"  >Mecánica</option>
                  <option <?php if("Manual"==$muestra['mue_compactacion']) echo " selected " ?> value="Manual" >Manual</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Tipo de Camión</label>
              <div class="col-sm">
                 <select name="cam_id" class="form-control" >
                <option value=""></option><?php foreach ($camiones as $camion_item): ?>        
                  <option <?php if($camion_item['cam_id']==$muestra['cam_id']) echo " selected " ?> value="<?php echo $camion_item['cam_id']; ?>"><?php echo $camion_item['cam_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Panta</label>
              <div class="col-sm">
                <select name="pla_id" class="form-control" >
                     <option value=""></option> <?php foreach ($plantas as $planta_item): ?>
                         
                  <option <?php if($planta_item['pla_id']==$muestra['pla_id']) echo " selected " ?> value="<?php echo $planta_item['pla_id']; ?>"><?php echo $planta_item['pla_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Cemento</label>
              <div class="col-sm">
                 <select name="cem_id" class="form-control" >
                        <option value=""></option> <?php foreach ($cementos as $cemento_item): ?>
                      

                  <option <?php if($cemento_item['cem_id']==$muestra['cem_id']) echo " selected " ?> value="<?php echo $cemento_item['cem_id']; ?>"><?php echo $cemento_item['cem_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>



                                                  </div>
                                        <div class="col-sm-4">
                                        

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label">Camión N°</label>
                                                    <div class="col-sm-6">
                                                      <input name="mue_numero_camion" autocomplete="off" value="<?php echo $muestra['mue_numero_camion']; ?>" class="form-control" type="text" >
                                                    </div>
                                                  </div>



                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label">Cantidad M3</label>
                                                    <div class="col-sm-6">
                                                      <input name="mue_cntm3" autocomplete="off" value="<?php echo $muestra['mue_cntm3']; ?>" class="form-control" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label">Aire</label>
                                                    <div class="col-sm-6">
                                                      <input name="mue_aire" autocomplete="off" value="<?php echo $muestra['mue_aire']; ?>" class="form-control" type="number"  >
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label">T° Ambiente</label>
                                                    <div class="col-sm-6">
                                                      <input name="mue_temperatura_ambiente" autocomplete="off" value="<?php echo $muestra['mue_temperatura_ambiente']; ?>" class="form-control" type="number"  step=any>
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label">T° Hormigón</label>
                                                    <div class="col-sm-6">
                                                      <input name="mue_temperatura_hormigon" autocomplete="off" value="<?php echo $muestra['mue_temperatura_hormigon']; ?>" class="form-control" type="number"  step=any>
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label">Elemento Hormigonado</label>
                                                    <div class="col-sm-6">
                                                      <input name="mue_elemento_hormigonado" autocomplete="off" value="<?php echo $muestra['mue_elemento_hormigonado']; ?>" class="form-control" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label">Ubicación</label>
                                                    <div class="col-sm-6">
                                                      <input name="mue_ubicacion" autocomplete="off" value="<?php echo $muestra['mue_ubicacion']; ?>" class="form-control" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-6 col-form-label">Observaciones</label>
                                                    <div class="col-sm-6">
                                                      <input name="mue_observaciones" autocomplete="off" value="<?php echo $muestra['mue_observaciones']; ?>" class="form-control" type="text">
                                                    </div>
                                                  </div>
                                          </div>
                                        </div>


                                          <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                   <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar Cambios</button>  
                    <a class="btn btn-primary" href="<?php echo base_url().'muestra/formulario/'.$muestra['mue_id']; ?>" target="_blank"><i class="fa fa-print"></i> Formulario de Ensaye</a>
                </div>
              </div>
            

 <?php echo form_close(); ?>
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
                      <th scope="col"></th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($ensayos as $ensayo_item): ?>
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                   
                      <td><?php echo date("d-m-Y",strtotime($ensayo_item['ens_fecha_ensaye'])); ?></td>
                      <td><?php echo $ensayo_item['ens_edad']; ?></td>
                      <td><?php echo $ensayo_item['ens_tipo_probeta']; ?></td>
                      <td><?php echo $ensayo_item['ens_ensaye']; ?></td>
                      <td><?php echo $ensayo_item['ens_densidad']; ?></td>
                      <td><?php echo $ensayo_item['ens_resistencia_cubica']; ?></td>
                      <td><?php echo $ensayo_item['ens_resistencia_mpa']; ?></td>
                      <td><a href="<?php echo base_url().'muestra/ensayo/'.$ensayo_item['ens_id']; ?>">Ensayo</a></td>
                      <td><a onclick="return confirmar()" href="<?php echo base_url().'muestra/ensayo_eliminar/'.$ensayo_item['ens_id']."/".$ensayo_item['mue_id']; ?>">Eliminar</a></td>
                     </tr>
                    <?php $i++; endforeach; ?>
                  </tbody>
                
                </table>

                  <div class="col-12 text-right">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
   Agregar Muestra
  </button>

                   
                </div>

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




  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
        <?php echo form_open(base_url()."muestra/ensayo_nuevo/".$muestra['mue_id']) ?> 

      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ensayo de Hormigón</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
          <table id="tabla"  class="table table-sm table-striped">
                   <thead>
                    <tr>
                      <th scope="col" >Ensayo</th>
                      <th scope="col" width="30%" >Edad</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>

                             <select name="ensayo" class="custom-select">
                                <option value="1">Cilindro Compresión</option>
                                <option value="2">Cilindro Hendimiento</option>
                                <option value="3">Cubo Compresión</option>
                                <option value="4">Prisma Flexotracción</option>
                              </select>
                       </td>
                      <td><input  autocomplete="off" name="edad"      type="number" type="text" class="form-control "></td>
                     </tr>
                  </tbody>
                
      </table>
      <input type="hidden" name="fecha_muestreo" value="<?php echo $muestra['mue_fecha_muestreo'];?>">

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
             <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>  
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
       <?php echo form_close(); ?>
    </div>
  </div>
  



