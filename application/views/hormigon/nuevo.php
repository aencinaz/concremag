<?php echo form_open(base_url()."muestra/nuevo/hormigon") ?> 
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Muestras de Hormigón</h1>       
          <p>Datos de la Muestra</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Muestras de Hormigón</a></li>
          <li class="breadcrumb-item"><a href="#">Nuevo</a></li>
        </ul>
      </div>
        <!-- Buttons-->
             
            <div class="row">
              <div class="col-md-12">
                <div class="tile">

          
     
<div class="card">
  <div class="card-header">
    Datos de la Muestra
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">



     <div class="row">
    <div class="col-sm">

     <div class="form-group row">
          <label for="example-url-input" class="col-sm-2  col-form-label-sm col-form-label-sm-sm">Cliente</label>
          <div class="col-sm-10">
           <select name="cli_id" id="primary" class="form-control" >
              <option value=""></option>
                <?php foreach ($clientes as $cliente_item): ?>
              <option value="<?php echo $cliente_item['cli_id']; ?>" <?php echo set_select('cli_id',$cliente_item['cli_id']); ?> ><?php echo $cliente_item['cli_nombre']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
     </div>

     </div>
    <div class="col-sm">
      <div class="form-group row">
          <label for="example-url-input" class="col-sm-2 col-form-label-sm col-form-label-sm-sm">Obra</label>
          <div class="col-sm-10">
           <select name="obr_id" id="secondary" class="form-control" >
            </select>
          </div>
        </div>
     </div>
 </div>
 
  <div class="row">
    <div class="col-sm-4">
          <div class="form-group row">
              <label for="smFormGroupInput" class="col-sm">Muestra N°</label>
              <div class="col-sm">
                <input name ="num_muestra" autocomplete="off" value="<?php echo set_value('num_muestra'); ?>" type="text" class="form-control">
              </div>
            </div>
        <div class="form-group row">
          <label for="smFormGroupInput" class="col-sm">Guia de Despacho</label>
          <div class="col-sm">
            <input name="guia" autocomplete="off" value="<?php echo set_value('guia'); ?>" class="form-control" type="text"  >
          </div>
        </div>
        <div class="form-group row">
           <label for="smFormGroupInput" class="col-sm">Fecha de Muestreo</label>
          <div class="col-sm">
            <input name="fecha_muestreo" autocomplete="off" value="<?php echo set_value('fecha_muestreo'); ?>" class="form-control" type="date" >
          </div>
        </div>
        <div class="form-group row">
           <label for="smFormGroupInput" class="col-sm">Fecha de Ingreso</label>
          <div class="col-sm">
            <input name="fecha_ingreso_lab" autocomplete="off" value="<?php echo set_value('fecha_ingreso_lab'); ?>" class="form-control" type="date"  >
          </div>
        </div>


        <div class="form-group row">
          <label for="example-email-input" class="col-sm">Asentamiento Cono</label>
          <div class="col-sm">
            <input name="asentamiento" autocomplete="off" value="<?php echo set_value('asentamiento'); ?>" class="form-control" type="text" >
          </div>
        </div>

  

        <div class="form-group row">
          <label for="example-time-input" class="col-sm">Hora salida Panta</label>
          <div class="col-sm">
            <input name="h_planta" autocomplete="off" value="<?php echo set_value('h_planta'); ?>" class="form-control" type="time">
          </div>
        </div>


        <div class="form-group row">
          <label for="example-time-input" class="col-sm">Hora LLegada Obra</label>
          <div class="col-sm">
            <input name="h_obra" autocomplete="off" value="<?php echo set_value('h_obra'); ?>" class="form-control" type="time" >
          </div>
        </div>

      </div>
 <div class="col-sm-4">

        <div class="form-group row">
          <label for="example-time-input" class="col-sm">Hora Inicio Descarga</label>
          <div class="col-sm">
            <input name="h_descarga" autocomplete="off" value="<?php echo set_value('h_descarga'); ?>" class="form-control" type="time"  >
          </div>
        </div>

  

        <div class="form-group row">
          <label for="example-time-input" class="col-sm">Hora Muestreo</label>
          <div class="col-sm">
            <input name="h_muestreo" autocomplete="off" value="<?php echo set_value('h_muestreo'); ?>"  class="form-control" type="time" >
          </div>
        </div>


        <div class="form-group row">
          <label for="example-url-input" class="col-sm">Aditivos</label>
          <div class="col-sm">
           <select name="adi_id" class="form-control" >
                    <?php foreach ($aditivos as $aditivos_item): ?>
                          <option value=""></option>
                  <option value="<?php echo $aditivos_item['adi_id']; ?>"><?php echo $aditivos_item['adi_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
        </div>
    
            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Hormigón Grado</label>
              <div class="col-sm">
               <select name="hor_id" class="form-control" >
                    <?php foreach ($hormigones as $hormigon_item): ?>
                  <option value=""></option>
                  <option value="<?php echo $hormigon_item['hor_id']; ?>"><?php echo $hormigon_item['hor_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Compactación</label>
              <div class="col-sm">
                <select name="compactacion" class="form-control">
                       <option value=""></option>
             
                  <option value="Mecánica" <?php echo set_select('compactacion','Mecánica'); ?>  >Mecánica</option>
                  <option value="Manual" <?php echo set_select('compactacion','Manual'); ?>  >Manual</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Tipo de Camión</label>
              <div class="col-sm">
                 <select name="cam_id" class="form-control" >
                    <?php foreach ($camiones as $camion_item): ?>
                           <option value=""></option>
                  <option value="<?php echo $camion_item['cam_id']; ?>" <?php echo set_select('cam_id',$camion_item['cam_id']); ?>  ><?php echo $camion_item['cam_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Panta</label>
              <div class="col-sm">
                <select name="pla_id" class="form-control" >
                    <?php foreach ($plantas as $planta_item): ?>
                           <option value=""></option>
                  <option value="<?php echo $planta_item['pla_id']; ?>" <?php echo set_select('pla_id',$planta_item['pla_id']); ?>  ><?php echo $planta_item['pla_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Cemento</label>
              <div class="col-sm">
                 <select name="cem_id" class="form-control" >
                    <?php foreach ($cementos as $cemento_item): ?>
                           <option value=""></option>

                  <option value="<?php echo $cemento_item['cem_id']; ?>" <?php echo set_select('cem_id',$cemento_item['cem_id']); ?>  ><?php echo $cemento_item['cem_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            </div>
  <div class="col-sm-4">
  

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Camión N°</label>
              <div class="col-sm">
                <input name="num_camion" autocomplete="off" value="<?php echo set_value('num_camion'); ?>" class="form-control" type="text" >
              </div>
            </div>



            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Cantidad M3</label>
              <div class="col-sm">
                <input name="cntm3" autocomplete="off" value="<?php echo set_value('cntm3'); ?>" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Aire</label>
              <div class="col-sm">
                <input name="aire" autocomplete="off" value="<?php echo set_value('aire'); ?>" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">T° Ambiente</label>
              <div class="col-sm">
                <input name="t_ambiente" autocomplete="off" value="<?php echo set_value('t_ambiente'); ?>" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">T° Hormigón</label>
              <div class="col-sm">
                <input name="t_hormigon" autocomplete="off" value="<?php echo set_value('t_hormigon'); ?>" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Elemento Hormigonado</label>
              <div class="col-sm">
                <input name="elemen_hormi" autocomplete="off" value="<?php echo set_value('elemen_hormi'); ?>" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Ubicación</label>
              <div class="col-sm">
                <input name="ubicacion" autocomplete="off" value="<?php echo set_value('ubicacion'); ?>" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm">Observaciones</label>
              <div class="col-sm">
                <input name="observaciones" autocomplete="off" value="<?php echo set_value('observaciones'); ?>" class="form-control" type="text">
              </div>
            </div>
    </div>
  </div>
</div>
<?php echo validation_errors(); ?>
</li>
    <li class="list-group-item">
     <table id="tabla" class="table table-sm table-striped">
                   <thead>
                    <tr>
                      <th scope="col">Ensayo</th>
                      <th scope="col">Edad</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>

                             <select name="ensayo[]" class="custom-select">
                                <option value="1">Cilindro Compresión</option>
                                <option value="2">Cilindro Hendimiento</option>
                                <option value="3">Cubo Compresión</option>
                                <option value="4">Prisma Flexotracción</option>
                              </select>
                       </td>
                      <td><input  autocomplete="off" name="edad[]"      type="number" type="text" class="form-control "></td>
                      <td><input  autocomplete="off" name="cantidad[]"  type="number" type="text" class="form-control "></td>
                      <td><a  class="btn btn-primary" href="#" role="button" id="carga" >+</a ></td>
                     </tr>
                  </tbody>
                
      </table>

</li>
    <li class="list-group-item"><button type="submit" class="btn btn-primary btn-lg btn-block">Agregar Muestra</button>  </li>
  </ul>
</div>

    
          </div>
        </div>
      </div>
    </main>

 <?php echo form_close(); ?>



