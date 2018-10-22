  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Editar Aditivo</h1>
          <p>Datos del Aditivo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url()."aditivo/listar"; ?>">Aditivo</a></li>
          <li class="breadcrumb-item">Editar</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">

          <?php echo form_open(base_url()."aditivo/editar/".$id) ?>

           
     			<div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" autocomplete="off" name="adi_nombre" type="text" value="<?php echo $aditivo['adi_nombre']?>" placeholder="Ingrese Nombre">
                  <div class="form-control-feedback"> <?php echo form_error('adi_nombre'); ?> </div>
                 
                </div>


                 <div class="form-group">
                  <label class="control-label">Descripción</label>
                  <input class="form-control" autocomplete="off" name="adi_descripcion" type="text" value="<?php echo $aditivo['adi_descripcion']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('adi_descripcion'); ?> </div>
                 
                </div>
  

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."aditivo/listar";?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </main> 



