<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de nuevos Usuarios - El Molino</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<br/>
			<h3 align="center">Registro de usuarios Radio Taxis El Molino</h3>
		<br/>
		<div class="panel panel-default">
			<div class="panel-heading">Ingrese los datos del nuevo usuario</div>
			<div class="panel-body">
				<?php
					if($this->session->flashdata('message')){
						echo '<div class="alert alert-success">'.$this->session->flashdata("message").'</div>';
					}
				?>
				<form method="post" action="<?php echo base_url(); ?>index.php/registro/validacion">
					<div class="form-group">
						<label for="Apellido Paterno">Apellido Paterno</label>
						<input type="text" id="ap_pat" name="ap_pat" class="form-control" value="">
						<label for="Apellido Materno">Apellido Materno</label>
						<input type="text" id="ap_mat" name="ap_mat" class="form-control" value="">
						<label for="Nombres">Nombres</label>
						<input type="text" id="nombres" name="nombres" class="form-control" value="">
						<label for="Direccion">Dirección</label>
						<input type="text" id="dir" name="dir" class="form-control" value="">
						<label for="fono">Teléfono</label>
						<input type="text" id="fono" name="fono" class="form-control" value="">
						<label for="Rut">Rut</label>
						<input type="text" id="rut" name="rut" class="form-control" value="<?php echo set_value('rut'); ?>">
						<span class="text-danger"><?php echo form_error('rut'); ?></span>
						<label for="correo">Correo electrónico</label>
						<input type="text" id="correo" name="correo" class="form-control" value="<?php echo set_value('correo'); ?>">
						<span class="text-danger"><?php echo form_error('correo'); ?></span>
						<label for="Password">Password</label>
						<input type="password" id="pass" name="pass" class="form-control" value="<?php echo set_value('pass'); ?>">
						<span class="text-danger"><?php echo form_error('pass'); ?></span>
					</div>
					<div class="form-group">
						<input type="submit" name="enviar" id="enviar" class="btn btn-info" value="Insertar nuevo usuarioen la base de datos" />
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>