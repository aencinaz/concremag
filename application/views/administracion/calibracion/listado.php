 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Calibración     <a href="<?php echo base_url(); ?>calibracion\nuevo\<?php echo $id; ?>" class="btn btn-primary" type="button">Nuevo</a> </h1>       
          <p>Listado de Calibracion de Prensa</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Prensa</a></li>
          <li class="breadcrumb-item"><a href="#">Calibracion</a></li>
        </ul>
      </div>
        <!-- Buttons-->
            <?php if($mensaje!= FALSE){ ?>
                <div class="row">
                <div class="col-md-12">
                  <div class="bs-component">
                    <div class="alert alert-dismissible alert-<?php echo $mensaje['class']; ?>">
                      <button class="close" type="button" data-dismiss="alert">×</button><strong><?php echo $mensaje['strong']; ?>!</strong> <?php echo $mensaje['mensaje']; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>   
            <div class="row">
              <div class="col-md-12">
                <div class="tile">

          
         <table id="example" class="table table-sm table-striped">
        	  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Fecha</th>
			      <th scope="col">Descripción</th>
            <th scope="col">Editar</th>
			      <th scope="col">Eliminar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i=1; foreach ($calibraciones as $calibracion_item): ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $calibracion_item['cal_fecha']; ?></td>
			      <td><?php echo $calibracion_item['cal_descripcion']; ?></td>
            <td><a href="<?php echo base_url().'calibracion/editar/'.$calibracion_item['cal_id']; ?>">Editar</a></td>
			      <td><a id="confirmar"  onclick="return confirmar()" href="<?php echo base_url().'prensa/eliminar/'.$calibracion_item['cal_id']; ?>">Eliminar</a></td>
			     </tr>
			    <?php $i++; endforeach; ?>
			  </tbody>
			</table>
          </div>
        </div>
      </div>
    </main>

