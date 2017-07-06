<?php  

include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/header.php');  
include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/db-config.php');  ?>

<?php
if(isset($_POST['idd']))
{		
    $id=$_POST['idd'];
    	
	extract($crud->getIdConsulta($id));	
	
		if (is_user_logged_in()){
			$cu = wp_get_current_user(); 
			$especialidad = $crud->getEspecialidad($cu->user_login);
			$medico = $crud->getEspecialidad($cu->user_login);
			
		}else{
			?>
			<div class="alert alert-info">
				<strong>No se pudo obtener la Especialidad...</strong>	
			</div>	
  <?php } ?>

	
	
		<div class="alert alert-info">
			<strong><?php echo "Paciente: " . strtoupper($nombre . ' ' . $apellido) ;?></strong>	
		</div>	
	<?php
}?>


<?php
if(isset($_POST['submit']))
{

	$datos = [
		"id" => $_POST['id'],
		"especialidad" => $_POST['especialidad'],
		"fecha" => $_POST['fecha'],
		"motivo_consulta" => $_POST['motivo_consulta'],
		"enfermedad_actual" => $_POST['enfermedad_actual'],
		"examen_fisico" => $_POST['examen_fisico'],
		"diagnostico" => $_POST['diagnostico'],
		"tratamiento" => $_POST['tratamiento'],
	];

	if (is_user_logged_in()){
		$cu = wp_get_current_user(); 
		$usuario = strtoupper($cu->user_login);
	}
	
	require_once (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/db-config.php');
    
    if($crud->createConsulta($datos,$usuario)){
	//		}

	
		$msg='
		
		<div class="container">
			<div class="alert alert-info">
				<strong>Se creó la Consulta Correctamente!.</strong>
				<a rel="' . $datos[id] . '"  class="waves-effect blue lighten-2 btn"><i class="material-icons left">reply</i> Volver</a>
			</div>
		</div>';
		
		
    }else{
		
		$msg='<div class="container">
			<div class="alert alert-danger">
				<strong>Ha ocurrido un problema!!</strong>
			</div>
			
			
		</div>';

		
    }
}
else
{
    
}

		
	if(isset($msg))
	{
		echo    $msg;
	}else{   
        




		echo '<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">'; ?>

		<script type="text/javascript">
			history.forward();
		</script>
		<button class="btn waves-effect waves-blue"><?php wp_loginout("./historiaclinica/"); ?></button>
		<div class="clearfix"></div></br>


					<div class="row">
						<form method="post" class="col s12">
													  
							 <div class="row">
								<div class="input-field col s12">
								  <input id="id" type="text" hidden class="validate" name="id" value="<?php echo $id; ?>" required>
								</div>
							</div>
							 <div class="row">
								<div class="input-field col s12">
									<input id="especialidad" readonly type="text" class="validate" name="especialidad" value="<?php echo $medico['especialidad']; ?>" required>
									<label for="especialidad">Especialidad</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="fecha" type="date" class="validate" name="fecha" value="<?php echo $fecha; ?>" required>
									<label for="fecha">____________________Fecha</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									 <textarea  name="motivo_consulta" class="materialize-textarea" ><?php echo $motivo_consulta; ?></textarea>
									<label for="motivo_consulta">Motivo de Consulta</label>
								</div>			
							 
							
							<div class="row">
								<div class="input-field col s12">
									<textarea  name="enfermedad_actual" class="materialize-textarea" ><?php echo $enfermedad_actual; ?></textarea>
									<label for="enfermedad_actual">Enfermedad Actual</label>
								</div>			
							</div>
								
							<div class="row">
								<div class="input-field col s12">
									<textarea  name="examen_fisico" class="materialize-textarea" ><?php echo $examen_fisico; ?></textarea>
									<label for="examen_fisico">Examen Físico</label>
								</div>			
							</div>							
							
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="diagnostico" class="materialize-textarea" ><?php echo $diagnostico; ?></textarea>
								  <label for="diagnostico">Diagnóstico</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="tratamiento" class="materialize-textarea" ><?php echo $tratamiento; ?></textarea> 
								  <label for="tratamiento">Tratamiento</label>
								</div>
							</div>							

						<button type="submit" name="submit" class="waves-effect blue lighten-2 btn"><i class="material-icons left">done</i>Guardar</button>
						<!--<a href="historiaclinica" class="waves-effect blue lighten-2 btn"><i class="material-icons left">cloud</i>Volver</a>-->
						<button type="button" name="cancelar" id="cancelar" class="waves-effect blue lighten-2 btn" ><i class="material-icons left">clear</i>Cancelar</button>						
						</form>
				</div>


    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/jquery.min.js">'?> </script>
    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/materialize.min.js">'?> 
	</script>
	<?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/edit.js">'; ?>
		</script>

	<?php } ?>	

<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		
