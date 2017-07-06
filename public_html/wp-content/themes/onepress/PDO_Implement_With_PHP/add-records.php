<?php  

include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/header.php');  ?>

<?php
if(isset($_POST['submit']))
{
	
	$datos = [
		"dni" => $_POST['dni'],
		"nombre" => $_POST['nombre'],
		"apellido" => $_POST['apellido'],
		"telefono" => $_POST['telefono'],
		"fecha" => $_POST['fecha'],
		"direccion" => $_POST['direccion'],
		"ciudad" => $_POST['ciudad'],
		"fecha_nac" => $_POST['fecha_nac'],
		"lugar_nac" => $_POST['lugar_nac'],
		"estado_civil" => $_POST['estado_civil'],
		"ocupacion" => $_POST['ocupacion'],
		"grupo_sanguineo" => $_POST['grupo_sanguineo'],
		"escolaridad" => $_POST['escolaridad'],
		"email" => $_POST['email'],
		"ant_personales" => $_POST['ant_personales'],
		"ant_familiares" => $_POST['ant_familiares'],
		"alergias" => $_POST['alergias'],
	];
	
	
	if (is_user_logged_in()){
		$cu = wp_get_current_user(); 
		$usuario = strtoupper($cu->user_login);
	}
	
	require_once (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/db-config.php');
    
    if($crud->create($usuario,$datos)){
		?>
		<div class="container">
			<div class="alert alert-info">
				<strong>Se creó la Historia Clinica Correctamente!.</strong>
				<a href="../historiaclinica" class="waves-effect blue lighten-2 btn"><i class="material-icons left">reply</i> Volver</a>
			</div>
		
		
		</div>

		<?php
		
    }
    else
    {
         //header("location:nuevahistoriaclinica?fail");
		 
		 
		?>
		<div class="container">
			<div class="alert alert-danger">
				<strong>Ha ocurrido un problema!!</strong>
			</div>
		</div>
		<?php
    }
}
else
{
		echo '<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
		?>
	
		<script type="text/javascript">
			history.forward();
		</script>
		<button class="btn waves-effect waves-blue"><?php wp_loginout("./historiaclinica/"); ?></button>
		
					<div class="row">
						<form method="post" class="col s12">
													  
							 <div class="row">
								<div class="input-field col s12">
								  <input id="nombre" type="text" class="validate" name="nombre" value="<?php echo $nombre; ?>" required>
								  <label for="nombre">Nombre</label>
								</div>
							</div>
							 <div class="row">
								<div class="input-field col s12">
									<input id="apellido" type="text" class="validate" name="apellido" value="<?php echo $apellido; ?>" required>
									<label for="apellido">Apellido</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="dni" type="text" class="validate" name="dni" value="<?php echo $dni; ?>" required>
									<label for="dni">DNI</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="telefono" type="text" class="validate" name="telefono" value="<?php echo $telefono; ?>">
									<label for="telefono">Teléfono</label>
								</div>			
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="fecha" type="date" class="validate" name="fecha"  value="<?php echo $fecha; ?>">
									<label for="fecha">______________________Fecha</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s12">
								  <input id="domicilio" type="text" class="validate" name="direccion" value="<?php echo $direccion; ?>">
								  <label for="domicilio">Domicilio Actual</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input id="ciudad" type="text" class="validate" name="ciudad" value="<?php echo $ciudad; ?>">
									<label for="ciudad">Ciudad</label>
								</div>			
							</div>							
							
							<div class="row">
								<div class="input-field col s6">
								  <input id="fecha_nac" type="date" class="validate" name="fecha_nac" onblur="calcula_edad(this.value)" value="<?php echo $fecha_nac; ?>">
								  <label for="fecha_nac">________________________Fecha de Nacimiento</label>
								</div>
								<div class="input-field col s6">
									<input id="edad" type="text" class="validate" readonly name="edad" value="<?php echo $edad ?>">
									<label for="edad">Edad</label>
								</div>	
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <input id="lugar_nac" type="text" class="validate" name="lugar_nac" value="<?php echo $lugar_nac; ?>">
								  <label for="lugar_nac">Lugar de Nacimiento</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s12">
								  <input id="estado_civil" type="text" class="validate" name="estado_civil" value="<?php echo $estado_civil; ?>">
								  <label for="estado_civil">Estado Civil</label>
								</div>
							</div>						
							<div class="row">
								<div class="input-field col s12">
									<input id="ocupacion" type="text" class="validate" name="ocupacion" value="<?php echo $ocupacion; ?>">
									<label for="ocupacion">Ocupación</label>
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s12">
									<input id="grupo_sanguineo" type="text" name="grupo_sanguineo" class="validate" value="<?php echo $grupo_sanguineo; ?>">
									<label for="grupo_sanguineo">Grupo Sanguíneo</label>
								</div>
							</div>
							
							
							<div class="row">
								<div class="input-field col s12">
								  <input id="escolaridad" name="escolaridad" type="text" class="validate" value="<?php echo $escolaridad; ?>">
								  <label for="escolaridad">Escolaridad</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <input id="email" name="email" type="text" class="validate" value="<?php echo $email; ?>">
								  <label for="email">E-mail</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="ant_personales" class="materialize-textarea" required=""><?php echo $ant_personales; ?></textarea>
								  <label for="ant_personales">Antecedentes Personales</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="ant_familiares" class="materialize-textarea" required=""><?php echo $ant_familiares; ?></textarea>
								  <label for="ant_familiares">Antecedentes Familiares</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="alergias" class="materialize-textarea" required=""><?php echo $alergias; ?></textarea>
								  <label for="alergias">Alergias</label>
								</div>
							</div>
							
							

						<button type="submit" name="submit" class="waves-effect blue lighten-2 btn"><i class="material-icons left">done</i>Guardar</button>
						<a href="../historiaclinica" class="waves-effect blue lighten-2 btn"><i class="material-icons left">clear</i>Cancelar</a>

				<!--<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Guardar</button>
                    <a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Volver al índice</a>
				</div>
-->

						
						</form>
				</div>
  
<?php } ?>
 
 
    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/jquery.min.js"> </script>';
     echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/materialize.min.js"></script>';
	 echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/edit.js"> </script>';


 