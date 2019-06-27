<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"> Informe</i> </h1>
      <p>Prametros de informe</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Parametros de informes</a></li>
    </ul>
  </div>
   <?php echo form_open(base_url()."informes/set_formulario_ensaye") ?>  

  <div class="row mb-3">
    <div class="col-md-6">
      <div class="card text-center">
        <div class="card-header">
          Formulario de Ensaye
        </div>
        <div class="card-body">
          <label class="control-label">Cabecera</label>
          <input class="form-control" autocomplete="off" name="par_formulario_ensaye_cabecera" type="text" value="<?php echo $parametros['par_formulario_ensaye_cabecera']; ?>" >
          <div class="form-control-feedback"> <?php echo form_error('par_formulario_ensaye_cabecera'); ?> </div>
        </div>
        <div class="card-footer text-muted text-right">
          <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
        </div>
      </div>
    </div>

        <?php echo form_close(); ?>
  
    <div class="col-md-6">
      <?php echo form_open(base_url()."informes/set_resistencia") ?>  

      <div class="card text-center">
        <div class="card-header">
          Pies de firma Informe de Resistencia
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"><input class="form-control" autocomplete="off" name="par_resistencia_pie_a_nombre"  value="<?php echo $parametros['par_resistencia_pie_a_nombre']; ?>" type="text" ></div>
              <div class="form-group"><input class="form-control" autocomplete="off" name="par_resistencia_pie_a_cargo"  value="<?php echo $parametros['par_resistencia_pie_a_cargo']; ?>" type="text" ></div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><input class="form-control" autocomplete="off" name="par_resistencia_pie_b_nombre"  value="<?php echo $parametros['par_resistencia_pie_b_nombre']; ?>" type="text" ></div>
              <div class="form-group"><input class="form-control" autocomplete="off" name="par_resistencia_pie_b_cargo"  value="<?php echo $parametros['par_resistencia_pie_b_cargo']; ?>" type="text" ></div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted text-right">
          <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
    
  </div>
    
  

   <?php echo form_open(base_url()."informes/set_ensayo") ?>  

 

<div class="row mb-3">
  <div class="col">
    <div class="card text-center">
      <div class="card-header">
        Informe Ensayo de Resistencia
      </div>
      <div class="card-body">


        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-xs">
             <div class="card-body">
              <div class="form-group "> Detalle de Equipos</div>
            </div>
          </div>
          <div class="col-md">
            <div class="card-body">
             <div class="row">
              <div class="col-md">
                <div class="form-group">Descripción</div>
                <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_des_1" value="<?php echo $parametros['par_ensayo_equipo_des_1']; ?>" type="text" ></div>
                <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_des_2" value="<?php echo $parametros['par_ensayo_equipo_des_2']; ?>" type="text" ></div>
              </div>
              <div class="col-md">
               <div class="form-group">Codigo</div>
               <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_codigo_1" value="<?php echo $parametros['par_ensayo_equipo_codigo_1']; ?>" type="text" ></div>
               <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_codigo_2" value="<?php echo $parametros['par_ensayo_equipo_codigo_2']; ?>" type="text" ></div>
             </div>
             <div class="col-md">
               <div class="form-group">Certificado</div>
               <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_certificado_1" value="<?php echo $parametros['par_ensayo_equipo_certificado_1']; ?>" type="text" ></div>
               <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_certificado_2" value="<?php echo $parametros['par_ensayo_equipo_certificado_2']; ?>" type="text" ></div>
             </div>
             <div class="col-md">
               <div class="form-group">Calibración</div>
               <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_calibracion_1" value="<?php echo $parametros['par_ensayo_equipo_calibracion_1']; ?>" type="text" ></div>
               <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_calibracion_2" value="<?php echo $parametros['par_ensayo_equipo_calibracion_2']; ?>" type="text" ></div>
             </div>
             <div class="col-md">
               <div class="form-group">Emitido</div>
               <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_emitido_1" value="<?php echo $parametros['par_ensayo_equipo_emitido_1']; ?>" type="text" ></div>
               <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_equipo_emitido_2" value="<?php echo $parametros['par_ensayo_equipo_emitido_2']; ?>" type="text" ></div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 
    

   <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-xs">
       <div class="card-body">
        <div class="form-group "> 
          Norma
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card-body">
        <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_norma_1" value="<?php echo $parametros['par_ensayo_norma_1']; ?>" type="text" ></div>
        <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_norma_2" value="<?php echo $parametros['par_ensayo_norma_2']; ?>" type="text" ></div>
        <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_norma_3" value="<?php echo $parametros['par_ensayo_norma_3']; ?>" type="text" ></div>
      </div>
    </div>
  </div>
</div>



<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-xs">
     <div class="card-body">
      <div class="form-group ">Pie de</div>
    </div>
  </div>
  <div class="col-md">
    <div class="card-body">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_firma_nombre_1" value="<?php echo $parametros['par_ensayo_firma_nombre_1']; ?>"  par_ensayo_firma_nombre_1type="text" ></div>
          <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_firma_cargo_1" value="<?php echo $parametros['par_ensayo_firma_cargo_1']; ?>"  par_ensayo_firma_nombre_1type="text" ></div>
        </div>
        <div class="col-md-6">
          <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_firma_cargo_2" value="<?php echo $parametros['par_ensayo_firma_cargo_2']; ?>"  par_ensayo_firma_nombre_1type="text" ></div>
          <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_firma_cargo_2" value="<?php echo $parametros['par_ensayo_firma_cargo_2']; ?>"  par_ensayo_firma_nombre_1type="text" ></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="card mb-3">
<div class="row no-gutters">
  <div class="col-xs">
   <div class="card-body">
    <div class="form-group ">Pie de Página</div>
  </div>
</div>
<div class="col-md">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-3"><input class="form-control" autocomplete="off" name="par_ensayo_pie_1" value="<?php echo $parametros['par_ensayo_pie_1']; ?>" type="text" ></div>
      <div class="form-group col-md-3"><input class="form-control" autocomplete="off" name="par_ensayo_pie_2" value="<?php echo $parametros['par_ensayo_pie_2']; ?>" type="text" ></div>
    </div>

  </div>
</div>
</div>
</div>


<div class="card mb-3">
<div class="row no-gutters">
  <div class="col-xs">
   <div class="card-body">
    <div class="form-group "> Número Correlativo</div>
  </div>
</div>
<div class="col-xs">
  <div class="card-body">
   <div class="form-group"><input class="form-control" autocomplete="off" name="par_ensayo_correlativo" value="<?php echo $parametros['par_ensayo_correlativo']; ?>" type="number" ></div>
 </div>
</div>
</div>
</div>

</div>
<div class="card-footer text-muted text-right">
<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
</div>
</div>
</div>
</div>
    <?php echo form_close(); ?>
<div class="row mb-3">
<div class="col-md-6">
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo base_url();?>assets/firma/" alt="Cargar Imagen">
  <div class="card-body">
    <h5 class="card-title">Pie de Firma Izquierdo</h5>
    <a href="#" class="btn btn-primary">Seleccionar Imágen</a>
  </div>
</div>
</div>
<div class="col-md-6">

  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Cargar Imagen">
  <div class="card-body">
    <h5 class="card-title">Pie de Firma Derecho</h5>
    <a href="#" class="btn btn-primary">Seleccionar Imágen</a>
  </div>
</div>
</div>
</div>

</main>