  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Nuevo Cliente</h1>
          <p>Datos del Nuevo Cliente</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url()."cliente/listar"; ?>">Clientes</a></li>
          <li class="breadcrumb-item">Nuevo</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">

           <?php echo form_open(base_url()."cliente/nuevo") ?>	

           
     			<div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" autocomplete="off" name="cli_nombre" type="text">
                  <div class="form-control-feedback"> <?php echo form_error('cli_nombre'); ?> </div>
                </div>

                 <div class="form-group">
                  <label class="control-label">RUT</label>
                  <input class="form-control" autocomplete="off" name="cli_rut" type="text" >
                  <div class="form-control-feedback"> <?php echo form_error('cli_rut'); ?> </div>
                </div>
                 <div class="form-group">
                  <label class="control-label">Teléfono</label>
                  <input class="form-control" autocomplete="off" name="cli_telefono" type="text" >
                  <div class="form-control-feedback"> <?php echo form_error('cli_telefono'); ?> </div>
                </div>
                 <div class="form-group">
                  <label class="control-label">Dirección</label>
                  <input class="form-control" autocomplete="off" name="cli_direccion" type="text" >
                  <div class="form-control-feedback"> <?php echo form_error('cli_direccion'); ?> </div>
                </div>
                 
  

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."cliente/listar";?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </main> 