<?php  

include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/header.php');  
include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/db-config.php');  ?>

<?php
if(isset($_POST['idd']))
{		
    $id=$_POST['idd'];
    	
	extract($crud->getIdConsulta($id));	
	
	?>	
		<div class="alert alert-info">
			<strong><?php echo "Paciente: " . strtoupper($nombre . ' ' . $apellido) ;?></strong>	
		</div>	
	<?php
}?>





<?php
if(isset($_POST['submit']))
{
   
    $id=$_POST['id'];
    $especialidad=$_POST['especialidad'];
	$fecha=$_POST['fecha'];	
	$motivo_consulta=$_POST['motivo_consulta'];
	$enfermedad_actual=$_POST['enfermedad_actual'];
    $examen_fisico=$_POST['examen_fisico'];
	$diagnostico=$_POST['diagnostico'];
	$tratamiento=$_POST['tratamiento'];
	
	require_once (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/db-config.php');
    
    if($crud->createConsulta($id,$especialidad,$fecha,$motivo_consulta,$enfermedad_actual,$examen_fisico,$diagnostico,$tratamiento)){

		?>
		<div class="container">
			<div class="alert alert-info">
				<strong>Se creó la Consulta Correctamente!.</strong>
				<a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Volver al índice</a>
			</div>
		
		
		</div>

		<?php
    }else{
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
    
}

		echo '<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">'; ?>


					<div class="row">
						<form method="post" class="col s12">
													  
							 <div class="row">
								<div class="input-field col s12">
								  <input id="icon_prefix" type="text" hidden class="validate" name="id" value="<?php echo $id; ?>" required>
								</div>
							</div>
							 <div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
									<input id="icon_prefix" type="text" class="validate" name="especialidad" value="<?php echo $especialidad; ?>" required>
									<label for="icon_prefix">Especialidad</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
									<input id="icon_prefix" type="date" class="validate" name="fecha" value="<?php echo $fecha; ?>" required>
									<label for="icon_prefix">Fecha</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">location_on</i>
									 <textarea  name="motivo_consulta" class="materialize-textarea" required=""><?php echo $motivo_consulta; ?></textarea>
									<label for="icon_prefix">Motivo de Consulta</label>
								</div>			
							 
							
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">location_on</i>
									<textarea  name="enfermedad_actual" class="materialize-textarea" required=""><?php echo $enfermedad_actual; ?></textarea>
									<label for="icon_prefix">Enfermedad Actual</label>
								</div>			
							</div>
								
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">location_on</i>
									<textarea  name="examen_fisico" class="materialize-textarea" required=""><?php echo $examen_fisico; ?></textarea>
									<label for="icon_prefix">Examen Físico</label>
								</div>			
							</div>							
							
							<div class="row">
								<div class="input-field col s12">
								  <i class="material-icons prefix">account_circle</i>
								  <textarea  name="diagnostico" class="materialize-textarea" required=""><?php echo $diagnostico; ?></textarea>
								  <label for="icon_prefix">Diagnóstico</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s12">
								  <i class="material-icons prefix">supervisor_account</i>
								  <textarea  name="tratamiento" class="materialize-textarea" required=""><?php echo $tratamiento; ?></textarea> 
								  <label for="icon_prefix">Tratamiento</label>
								</div>
							</div>							

						<button type="submit" name="submit" class="waves-effect blue lighten-2 btn"><i class="material-icons left">cloud</i>Guardar</button>
						<a href="historiaclinica" class="waves-effect blue lighten-2 btn"><i class="material-icons left">cloud</i>Cancelar</a>
						
						</form>
				</div>


    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/jquery.min.js">'?> </script>
    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/materialize.min.js">'?> 
	</script>
	<?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/edit.js">'; ?>
		</script>



<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
