<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<style type="text/css">
body{
	background-color: #FAFAFA;
}
.message {
    position: absolute;
    top: 25%;
    width: 100%;
    background-color: #610B0B;
    color: white;
}
</style>
</head>
<body>
	
		<div class="jumbotron jumbotron-fluid message">
			<div class="container">
			<div class="row ">
			</div>
			<div class="row align-items-center">
				<div class="col-md">
				</div>	
				<div class="col-md">
					logo
				</div>	
				<div class="col-xs">
					<?php echo form_open(base_url()."login") ?>	
					
				
  					<div class="form-group">
						<label>Usuario</label>
						<input type="text"  autocomplete="off" class="form-control" name="login">
						<?php echo form_error('login'); ?>
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input type="text"  autocomplete="off" class="form-control" name="password">
						<?php echo form_error('password'); ?>
					</div>
					<div class="form-group">
					<input type="submit" class="btn btn-primary btn-lg"  value="Ingresar">
					 <?php echo form_close(); ?>
					 	<?php echo $mensaje; ?>
			</div>
		 	</div>
		 	<div class="row">
			</div>
			</div>
		</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>