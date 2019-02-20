  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Editar Calibración</h1>
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

          <?php echo form_open(base_url()."calibracion/editar/".$id) ?>

           
     			<div class="form-group">
                  <label class="control-label">Descripción</label>
                  <input class="form-control" autocomplete="off" name="cal_descripcion" type="text" value="<?php echo $calibracion['cal_descripcion']?>" placeholder="Ingrese Nombre">
                  <div class="form-control-feedback"> <?php echo form_error('cal_descripcion'); ?> </div>
                 
                </div>


                 <div class="form-group">
                  <label class="control-label">Fecha</label>
                  <input class="form-control" autocomplete="off" name="cal_fecha" type="date" value="<?php echo $calibracion['cal_fecha']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('cal_fecha'); ?> </div>
                 
                </div>

                   <div class="form-group">
                  <label class="control-label">cal_a</label>
                  <input class="form-control" autocomplete="off" name="cal_a" type="number" value="<?php echo $calibracion['cal_a']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('cal_a'); ?> </div>
                 
                </div>

                  <div class="form-group">
                  <label class="control-label">cal_simbolo_1</label>
                  <input class="form-control" autocomplete="off" name="cal_simbolo_1" type="text" value="<?php echo $calibracion['cal_simbolo_1']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('cal_simbolo_1'); ?> </div>
                   </div>

                   <div class="form-group">
                  <label class="control-label">cal_b</label>
                  <input class="form-control" autocomplete="off" name="cal_b" type="number" value="<?php echo $calibracion['cal_b']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('cal_b'); ?> </div>
                 
                </div>

                 <div class="form-group">
                  <label class="control-label">cal_simbolo_2</label>
                  <input class="form-control" autocomplete="off" name="cal_simbolo_2" type="text" value="<?php echo $calibracion['cal_simbolo_2']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('cal_simbolo_2'); ?> </div> 
                </div>

                   <div class="form-group">
                  <label class="control-label">cal_c</label>
                  <input class="form-control" autocomplete="off" name="cal_c" type="number" value="<?php echo $calibracion['cal_c']?>" placeholder="Ingrese Descripción">
                  <div class="form-control-feedback"> <?php echo form_error('cal_c'); ?> </div>
                 
               
                </div>

                

  

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."calibracion/listar/".$calibracion['pre_id'];?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </main> 



