   <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Muestras</h1>       
          <p>Listado de Muestras</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Actividades</a></li>
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

          
          
       <table id="dataTables" class="table table-sm table-striped">
        	  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Fecha Muestra</th>
			      <th scope="col">Número Muestra</th>
			       <th scope="col">Elemento</th>
             <th scope="col">Cliente</th>
			       <th scope="col">Obra</th>
			      <th scope="col">Ficha</th> 
			      <th scope="col">Editar</th>
			      <th scope="col">Eliminar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	
			  </tbody>
			
			</table>
  

    
          </div>
        </div>
      </div>
    </main>

