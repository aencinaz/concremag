  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Editar prensa</h1>
          <p>Datos del prensa</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url()."prensa/listar"; ?>">prensa</a></li>
          <li class="breadcrumb-item">Editar</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">

          <?php echo form_open(base_url()."prensa/editar/".$id) ?>

           
     			<div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" autocomplete="off" name="pre_nombre" type="text" value="<?php echo $prensa['pre_nombre']?>" placeholder="Ingrese Nombre">
                  <div class="form-control-feedback"> <?php echo form_error('pre_nombre'); ?> </div>
                 
                </div>


                 <div class="form-group">
                  <label class="control-label">Fecha</label>
                  <input class="form-control" autocomplete="off" name="pre_fecha" type="text" value="<?php echo $prensa['pre_fecha']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('pre_fecha'); ?> </div>
                 
                </div>
  

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."prensa/listar";?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </main> 


