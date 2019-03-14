<?php echo form_open(base_url()."informes/evaluaciones") ?> 
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Evaluación Estadistica</h1>       
          <p>Datos de la Evaluación</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Evaluación Estadistica</a></li>
        </ul>
      </div>
        <!-- Buttons-->
             
            <div class="row">
              <div class="col-md-12">
                <div class="tile">

          
     
<div class="card">
  <div class="card-header">
    Datos de la Evaluación
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
     <div class="row">
    <div class="col-sm">
     <div class="form-group row">
          <label for="example-url-input" class="col-sm  col-form-label-sm">Cliente</label>
          <div class="col-sm">
           <select name="cli_id" id="primary" class="form-control form-control-sm" >
              <option value=""></option>
                <?php foreach ($clientes as $cliente_item): ?>
              <option value="<?php echo $cliente_item['cli_id']; ?>" <?php echo set_select('cli_id',$cliente_item['cli_id']); ?> ><?php echo $cliente_item['cli_nombre']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>           
     </div> 
     <div class="form-control-feedback"> <?php echo form_error('cli_id'); ?> </div>
     </div>

    <div class="col-sm">
      <div class="form-group row">
          <label for="example-url-input" class="col-sm col-form-label-sm">Obra</label>
          <div class="col-sm">
           <select name="obr_id" id="secondary" class="form-control form-control-sm" >
            </select>
          </div>
        </div>
     </div>

 <div class="col-sm">
  <div class="form-group row">
          <label for="example-url-input" class="col-sm col-form-label-sm">Planta</label>
          <div class="col-sm">
           <select name="pla_id" id="primary" class="form-control form-control-sm" >
              <option value=""></option>
                <?php foreach ($plantas as $plantas_item): ?>
              <option value="<?php echo $plantas_item['pla_id']; ?>" <?php echo set_select('pla_id',$plantas_item['pla_id']); ?> ><?php echo $plantas_item['pla_nombre']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
     </div>

 </div>
 
 
<?php echo validation_errors(); ?>
</li>
    
    <li class="list-group-item"><button type="submit" class="btn btn-primary btn-lg btn-block">Ver Evaluación</button>  </li>
  </ul>
</div>
          </div>
        </div>
      </div>
    </main>

 <?php echo form_close(); ?>



