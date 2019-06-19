
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Informe Ensayo Resistencia</h1>       
          <p>Datos del informe</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Informe</a></li>
          <li class="breadcrumb-item"><a href="#">Ensayos</a></li>
        </ul>
      </div>
        <!-- Buttons-->
             
            <div class="row">
              <div class="col-md-6">
                <div class="tile">
  
          
       <?php $attributes = array('target' => '_blank'); echo form_open(base_url()."informes/ensayos/", $attributes) ?> 

<div class="card">
  <div class="card-header">
    Parametros del Informe
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">



     <div class="form-group row">
          <label for="example-url-input" class="col-sm-2">Cliente</label>
          <div class="col-sm-10">
           <select name="cli_id" id="primary" class="form-control" >
              <option value=""></option>
                <?php foreach ($clientes as $cliente_item): ?>
              <option  <?php echo  set_select('cli_id', $cliente_item['cli_id']); ?> value="<?php echo $cliente_item['cli_id']; ?>"><?php echo $cliente_item['cli_nombre']; ?></option>
              <?php endforeach; ?>
            </select>
             <div class="form-control-feedback"> <?php echo form_error('cli_id'); ?> </div>
          </div>     
     </div>

    
      <div class="form-group row">
          <label for="example-url-input" class="col-sm-2 ">Obra</label>
          <div class="col-sm-10">
           <select name="obr_id" id="secondary" class="form-control" >
            </select>
              <div class="form-control-feedback"> <?php echo form_error('obr_id'); ?> </div>
          </div>
          
        </div>


<div class="form-group row">
  <label for="example-date-input" class="col-2 col-form-label">Fecha Desde</label>
  <div class="col-10">
    <input class="form-control" type="date" value="" id="example-date-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-date-input" class="col-2 col-form-label">Fecha Hasta</label>
  <div class="col-10">
    <input name="fecha_hasta" class="form-control" type="date">
     <div class="form-control-feedback"> <?php echo form_error('fecha_hasta'); ?> </div>
  </div>
    
</div>


    <div class="form-group row">
      <label class="col-sm-2"></label>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Guardar informe
          </label>
        </div>
      </div>
    </div>


        <div class="form-group row">
      <label class="col-sm-2"></label>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" checked="true"> Informar como Cilindro 
          </label>
        </div>
      </div>
    </div>


        <div class="form-group row">
      <label class="col-sm-2"></label>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Adjuntar Firma Derecha
          </label>
        </div>
      </div>
    </div>



        <div class="form-group row">
      <label class="col-sm-2"></label>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Adjuntar Firma Izquierda
          </label>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Observación</label>
      <div class="col-sm-10">
        <input type="text" class="form-control">
      </div>
    </div>


           
                   <button type="submit" class="btn btn-primary"  ><i class="fa fa-save"></i> Informe</button>  
                </div>
 </div>
 <?php echo form_close(); ?>
</div>

</li>
</ul>

</div>
</div>
</div>
</div>


