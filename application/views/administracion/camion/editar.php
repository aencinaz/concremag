  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Editar Camión</h1>
          <p>Datos del Camión</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url()."camion/listar"; ?>">Camión</a></li>
          <li class="breadcrumb-item">Editar</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">

          <?php echo form_open(base_url()."camion/editar/".$id) ?>

           
     			<div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" autocomplete="off" name="cam_nombre" type="text" value="<?php echo $camion['cam_nombre']?>" placeholder="Ingrese Nombre">
                  <div class="form-control-feedback"> <?php echo form_error('cam_nombre'); ?> </div>
                 
                </div>


                 <div class="form-group">
                  <label class="control-label">Descripción</label>
                  <input class="form-control" autocomplete="off" name="cam_descripcion" type="text" value="<?php echo $camion['cam_descripcion']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('cam_descripcion'); ?> </div>
                 
                </div>
  

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."camion/listar";?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </main> 



