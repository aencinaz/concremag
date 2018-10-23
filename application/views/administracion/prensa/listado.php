 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Prensa     <a href="<?php echo base_url();?>prensa\nuevo" class="btn btn-primary" type="button">Nuevo</a> </h1>       
          <p>Listado de Prensas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">prensa</a></li>
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
			      <th scope="col">Nombre</th>
			      <th scope="col">Fecha</th>
			      <th scope="col">Calibraciones</th>
            <th scope="col">Editar</th>
			      <th scope="col">Eliminar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i=1; foreach ($prensas as $prensa_item): ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $prensa_item['pre_nombre']; ?></td>
			      <td><?php echo $prensa_item['pre_fecha']; ?></td>
			      <td><a href="<?php echo base_url().'prensa/calibraciones/'.$prensa_item['pre_id']; ?>">Calibraciones</a></td>
            <td><a href="<?php echo base_url().'prensa/editar/'.$prensa_item['pre_id']; ?>">Editar</a></td>
			      <td><a id="confirmar"  onclick="return confirmar()" href="<?php echo base_url().'prensa/eliminar/'.$prensa_item['pre_id']; ?>">Eliminar</a></td>
			     </tr>
			    <?php $i++; endforeach; ?>
			  </tbody>
			</table>


        
          </div>
        </div>
      </div>
    </main>

