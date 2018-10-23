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
           <select name="cli_id" id="primary" class="form-control form-control-sm" >
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
           <select name="obr_id" id="secondary" class="form-control form-control-sm" >
            </select>
          </div>
        </div>
     </div>
 </div>
 
  <div class="row">
    <div class="col-sm-4">
          <div class="form-group row">
              <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Muestra N°</label>
              <div class="col-sm-6">
                <input name ="num_muestra" autocomplete="off" value="<?php echo set_value('num_muestra'); ?>" type="text" class="form-control form-control-sm form-control form-control-sm-sm">
              </div>
            </div>
        <div class="form-group row">
          <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Guia de Despacho</label>
          <div class="col-sm-6">
            <input name="guia" autocomplete="off" value="<?php echo set_value('guia'); ?>" class="form-control form-control-sm form-control form-control-sm-sm" type="text"  >
          </div>
        </div>
        <div class="form-group row">
           <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Fecha de Muestreo</label>
          <div class="col-sm-6">
            <input name="fecha_muestreo" autocomplete="off" value="<?php echo set_value('fecha_muestreo'); ?>" class="form-control form-control-sm" type="date" >
          </div>
        </div>
        <div class="form-group row">
           <label for="smFormGroupInput" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Fecha de Ingreso</label>
          <div class="col-sm-6">
            <input name="fecha_ingreso_lab" autocomplete="off" value="<?php echo set_value('fecha_ingreso_lab'); ?>" class="form-control form-control-sm" type="date"  >
          </div>
        </div>


        <div class="form-group row">
          <label for="example-email-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Asentamiento Cono</label>
          <div class="col-sm-6">
            <input name="asentamiento" autocomplete="off" value="<?php echo set_value('asentamiento'); ?>" class="form-control form-control-sm" type="text" >
          </div>
        </div>

  

        <div class="form-group row">
          <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hora salida Panta</label>
          <div class="col-sm-6">
            <input name="h_planta" autocomplete="off" value="<?php echo set_value('h_planta'); ?>" class="form-control form-control-sm" type="time">
          </div>
        </div>


        <div class="form-group row">
          <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hora LLegada Obra</label>
          <div class="col-sm-6">
            <input name="h_obra" autocomplete="off" value="<?php echo set_value('h_obra'); ?>" class="form-control form-control-sm" type="time" >
          </div>
        </div>

      </div>
 <div class="col-sm-4">

        <div class="form-group row">
          <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hora Inicio Descarga</label>
          <div class="col-sm-6">
            <input name="h_descarga" autocomplete="off" value="<?php echo set_value('h_descarga'); ?>" class="form-control form-control-sm" type="time"  >
          </div>
        </div>

  

        <div class="form-group row">
          <label for="example-time-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hora Muestreo</label>
          <div class="col-sm-6">
            <input name="h_muestreo" autocomplete="off" value="<?php echo set_value('h_muestreo'); ?>"  class="form-control form-control-sm" type="time" >
          </div>
        </div>


        <div class="form-group row">
          <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Aditivos</label>
          <div class="col-sm-6">
           <select name="hormigon_grado" class="form-control form-control-sm" >
                    <?php foreach ($aditivos as $aditivos_item): ?>
                  <option value="<?php echo $aditivos_item['adi_id']; ?>"><?php echo $aditivos_item['adi_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
        </div>
    
            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Hormigón Grado</label>
              <div class="col-sm-6">
               <select name="hormigon_grado" class="form-control form-control-sm" >
                    <?php foreach ($hormigones as $hormigon_item): ?>
                  <option value=""></option>
                  <option value="<?php echo $hormigon_item['hor_id']; ?>"><?php echo $hormigon_item['hor_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Compactación</label>
              <div class="col-sm-6">
                <select name="compactacion" class="form-control form-control-sm">
                       <option value=""></option>
             
                  <option value="1" <?php echo set_select('compactacion',1); ?>  >Mecánica</option>
                  <option value="2" <?php echo set_select('compactacion',2); ?>  >Manual</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Tipo de Camión</label>
              <div class="col-sm-6">
                 <select name="camion" class="form-control form-control-sm" >
                       <option value=""></option>
             
                  <option value="1" <?php echo set_select('camion',1); ?>  >Betonero</option>
                  <option value="2" <?php echo set_select('camion',2); ?>  >Mixer</option>
                  <option value="3" <?php echo set_select('camion',3); ?>  >Tolva</option>
                  <option value="4" <?php echo set_select('camion',4); ?>  >Otros</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Panta</label>
              <div class="col-sm-6">
                <select name="pla_id" class="form-control form-control-sm" >
                    <?php foreach ($plantas as $planta_item): ?>
                           <option value=""></option>
                  <option value="<?php echo $planta_item['pla_id']; ?>" <?php echo set_select('pla_id',$planta_item['pla_id']); ?>  ><?php echo $planta_item['pla_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Cemento</label>
              <div class="col-sm-6">
                 <select name="cem_id" class="form-control form-control-sm" >
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
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Camión N°</label>
              <div class="col-sm-6">
                <input name="num_camion" autocomplete="off" value="<?php echo set_value('num_camion'); ?>" class="form-control form-control-sm" type="text" >
              </div>
            </div>



            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Cantidad M3</label>
              <div class="col-sm-6">
                <input name="cntm3" autocomplete="off" value="<?php echo set_value('cntm3'); ?>" class="form-control form-control-sm" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Aire</label>
              <div class="col-sm-6">
                <input name="aire" autocomplete="off" value="<?php echo set_value('aire'); ?>" class="form-control form-control-sm" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">T° Ambiente</label>
              <div class="col-sm-6">
                <input name="t_ambiente" autocomplete="off" value="<?php echo set_value('t_ambiente'); ?>" class="form-control form-control-sm" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">T° Hormigón</label>
              <div class="col-sm-6">
                <input name="t_hormigon" autocomplete="off" value="<?php echo set_value('t_hormigon'); ?>" class="form-control form-control-sm" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Elemento Hormigonado</label>
              <div class="col-sm-6">
                <input name="elemen_hormi" autocomplete="off" value="<?php echo set_value('elemen_hormi'); ?>" class="form-control form-control-sm" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Ubicación</label>
              <div class="col-sm-6">
                <input name="ubicacion" autocomplete="off" value="<?php echo set_value('ubicacion'); ?>" class="form-control form-control-sm" type="text">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-url-input" class="col-sm-6 col-form-label-sm col-form-label-sm-sm">Observaciones</label>
              <div class="col-sm-6">
                <input name="observaciones" autocomplete="off" value="<?php echo set_value('observaciones'); ?>" class="form-control form-control-sm" type="text">
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
                                <option selected>Seleccione...</option>
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



