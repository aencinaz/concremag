 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Hormigon     <a href="<?php echo base_url();?>hormigon\nuevo" class="btn btn-primary" type="button">Nuevo</a> </h1>       
          <p>Listado de Hormigones</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Hormigon</a></li>
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
			  
			      <th scope="col"></th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i=1; foreach ($hormigon as $hormigon_item): ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $hormigon_item['nombre']; ?></td>
			      <td><?php echo $hormigon_item['descripcion']; ?></td>
			      <td><a href="<?php echo base_url().'hormigon/editar/'.$hormigon_item['id_hormigon']; ?>">Editar</a></td>
			      <td><a id="confirmar"  onclick="return confirmar()" href="<?php echo base_url().'hormigon/eliminar/'.$hormigon_item['id_hormigon']; ?>">Eliminar</a></td>
			     </tr>
			    <?php $i++; endforeach; ?>
			  </tbody>
			</table>


    
          </div>
        </div>
      </div>
    </main>

