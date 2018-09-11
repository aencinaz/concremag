 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Cemento     <a href="<?php echo base_url();?>cemento\nuevo" class="btn btn-primary" type="button">Nuevo</a> </h1>       
          <p>Listado de Cementos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Cemento</a></li>
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
			      <th scope="col">Descripción</th>
			      <th scope="col">Editar</th>
			      <th scope="col">Eliminar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i=1; foreach ($cementos as $cemento_item): ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $cemento_item['nombre']; ?></td>
			      <td><?php echo $cemento_item['descripcion']; ?></td>
			      <td><a href="<?php echo base_url().'cemento/editar/'.$cemento_item['id_cemento']; ?>">Editar</a></td>
			      <td><a id="confirmar"  onclick="return confirmar()" href="<?php echo base_url().'cemento/eliminar/'.$cemento_item['id_cemento']; ?>">Eliminar</a></td>
			     </tr>
			    <?php $i++; endforeach; ?>
			  </tbody>
			</table>


        
          </div>
        </div>
      </div>
    </main>

