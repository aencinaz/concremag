  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Nuevo Obra</h1>
          <p>Datos del Nuevo Obra</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url()."obra/listar"; ?>">Obra</a></li>
          <li class="breadcrumb-item">Nuevo</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">

    <?php echo form_open(base_url()."obra/nuevo") ?>	



           		<div class="form-group">
                  <label class="control-label">Cliente</label>
			<select name="cli_id" class="form-control" id="exampleFormControlSelect1">
    	 	<?php foreach ($clientes as $cliente_item): ?>
			<option value="<?php echo $cliente_item['cli_id']; ?>"><?php echo $cliente_item['cli_nombre']; ?></option>
			<?php endforeach; ?>
    		</select>
    		  <div class="form-control-feedback"> <?php echo form_error('cli_id'); ?> </div>
                </div>


     			<div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" autocomplete="off" name="obr_nombre" type="text">
                  <div class="form-control-feedback"> <?php echo form_error('obr_nombre'); ?> </div>
                </div>

              
                 <div class="form-group">
                  <label class="control-label">Ubicación</label>
                  <input class="form-control" autocomplete="off" name="obr_ubicacion" type="text" >
                  <div class="form-control-feedback"> <?php echo form_error('obr_ubicacion'); ?> </div>
                </div>
                 
  

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo base_url()."obra/listar";?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>

              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </main> 




