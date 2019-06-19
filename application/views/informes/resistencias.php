
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Informe de Resistencias</h1>       
          <p>Datos del Informe</p>
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

          
       <?php echo form_open(base_url()."informes/resistencias/" ) ?> 

<div class="card">
  <div class="card-header">
    Datos de la Muestra
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">



     <div class="form-group row">
          <label for="example-url-input" class="col-sm-2">Cliente</label>
          <div class="col-sm-6">
           <select name="cli_id" id="primary" class="form-control" >
              <option value=""></option>
                <?php foreach ($clientes as $cliente_item): ?>
              <option value="<?php echo $cliente_item['cli_id']; ?>" <?php echo set_select('cli_id',$cliente_item['cli_id']); ?> ><?php echo $cliente_item['cli_nombre']; ?></option>
              <?php endforeach; ?>
            </select>
             <div class="form-control-feedback"> <?php echo form_error('cli_id'); ?> </div>
          </div>
           
                
     </div>

    
      <div class="form-group row">
          <label for="example-url-input" class="col-sm-2 ">Obra</label>
          <div class="col-sm-6">
           <select name="obr_id" id="secondary" class="form-control" >
            </select>
          </div>
            <div class="form-control-feedback"> <?php echo form_error('obr_id'); ?> </div>
                
        </div>

             <div class="form-group row">
              <label for="example-url-input" class="col-sm-2">Panta</label>
              <div class="col-sm-6">
                <select name="pla_id" class="form-control" >
                     <option value=""></option> <?php foreach ($plantas as $planta_item): ?>
                         
                  <option value="<?php echo $planta_item['pla_id']; ?>"><?php echo $planta_item['pla_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
                <div class="form-control-feedback"> <?php echo form_error('pla_id'); ?> </div>
                
            </div>
 <div class="col-8 text-right">
                   <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Informe</button>  
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


