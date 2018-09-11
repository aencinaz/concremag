    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"> Información</i> </h1>
          <p>Sistema de Gestión de Cuotas Sociales</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Muro</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Socios</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Pendiente</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Deudas</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Pagos</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartPagos"></canvas>
            </div>
          </div>
        </div>
   
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Deudas</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDeudas"></canvas>
            </div>
          </div>
        </div>
        
      </div>


    </main>