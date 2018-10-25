  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Nueva Calibración</h1>
          <p>Datos del Nueva calibración</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url()."prensa/listar"; ?>">Prensa</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url()."calibracion/listar/".$id; ?>">Calibraciones</a></li>
          <li class="breadcrumb-item">Nuevo</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">

           <?php echo form_open(base_url()."calibracion/nuevo/".$id) ?>	

           
     			<div class="form-group">
                  <label class="control-label">Descripcion</label>
                  <input class="form-control" autocomplete="off" name="cal_descripcion" type="text" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('cal_descripcion'); ?> </div>
                 
                </div>


                 <div class="form-group">
                  <label class="control-label">fecha</label>
                  <input class="form-control" autocomplete="off" name="cal_fecha" type="date" placeholder="Ingrese Fecha de Calibración">
                  <div class="form-control-feedback"> <?php echo form_error('cal_fecha'); ?> </div>
                 
                </div>
  

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."prensa/listar";?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </main> 




