<?php
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/header.php');
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/db-config.php');
?>
<?php
if(isset($_POST['update']))
{    
	$id=$_POST['id'];
    $nro_consulta=$_POST['nro_consulta'];	
    $especialidad=$_POST['especialidad'];
	$fecha=$_POST['fecha'];	
	$motivo_consulta=$_POST['motivo_consulta'];
	$enfermedad_actual=$_POST['enfermedad_actual'];
    $examen_fisico=$_POST['examen_fisico'];
	$diagnostico=$_POST['diagnostico'];
	$tratamiento=$_POST['tratamiento'];
	if (is_user_logged_in()){
		$cu = wp_get_current_user(); 
		$usuario = strtoupper($cu->user_login);
	}


    if($crud->updateconsulta($id,$nro_consulta,$especialidad,$fecha,$motivo_consulta,$enfermedad_actual,$examen_fisico,$diagnostico,$tratamiento,$usuario))
    {
        $msg='<div class="alert alert-success">
                La Consulta se actualizó correctamente. 
				<a rel="' . $id . '"  class="waves-effect blue lighten-2 btn"><i class="material-icons left">reply</i> Volver al índice</a>
                </div><br/>';
    }
    else
    {
        $msg="<div class='alert alert-danger'>
                <strong>Error!</strong>No se pudo Actualizar la Historia Clinica.
                </div>";
    }
}
?>

<?php
if(isset($_POST['idd']) && isset($_POST['nro_consulta']))
{
    $id=$_POST['idd'];
	$nro_consulta=$_POST['nro_consulta'];
	
    extract($crud->getIdConsultaPaciente($id,$nro_consulta));
	$time = strtotime($fecha);
	$fecha = date('Y-m-d',$time);
	

}
?>

		<?php
		echo '<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">'; ?>

		<script type="text/javascript">
			history.forward();
		</script>
		<button class="btn waves-effect waves-blue"><?php wp_loginout("./historiaclinica/"); ?></button>
		<div class="clearfix"></div></br>

		
        <div class="clearfix"></div></br>
        
		<?php
            if(isset($msg))
            {
				echo    $msg;
            }else{   
        ?>

		<div class="alert alert-info">
			<strong><?php echo "Paciente: " . strtoupper($nombre . ' ' . $apellido) ;?></strong>	
		</div>
		
					<div class="row">
						<form method="post" class="col s12">
													  
							<input id="id" type="text" hidden class="validate" name="id" value="<?php echo $id; ?>" required>
							<input id="nro_consulta" type="text" hidden class="validate" name="nro_consulta" value="<?php echo $nro_consulta; ?>" required>
							
							
							 <div class="row">
								<div class="input-field col s12">
									<input id="especialidad" type="text" class="validate" name="especialidad" value="<?php echo $especialidad; ?>" required>
									<label for="especialidad">Especialidad</label>
								</div>
							</div>
							<div class="row">
								
								<div class="input-field col s12">
									<input id="fecha" type="date" class="validate" name="fecha" value="<?php echo $fecha; ?>" required>
									<label for="fecha">___________________Fecha</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									 <textarea  name="motivo_consulta" class="materialize-textarea" required=""><?php echo $motivo_consulta; ?></textarea>
									<label for="motivo_consulta">Motivo de Consulta</label>
								</div>			
							 
							
							<div class="row">
								<div class="input-field col s12">
									<textarea  name="enfermedad_actual" class="materialize-textarea" required=""><?php echo $enfermedad_actual; ?></textarea>
									<label for="enfermedad_actual">Enfermedad Actual</label>
								</div>			
							</div>
								
							<div class="row">
								<div class="input-field col s12">
									<textarea  name="examen_fisico" class="materialize-textarea" required=""><?php echo $examen_fisico; ?></textarea>
									<label for="examen_fisico">Examen Físico</label>
								</div>			
							</div>							
							
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="diagnostico" class="materialize-textarea" required=""><?php echo $diagnostico; ?></textarea>
								  <label for="diagnostico">Diagnóstico</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="tratamiento" class="materialize-textarea" required=""><?php echo $tratamiento; ?></textarea> 
								  <label for="tratamiento">Tratamiento</label>
								</div>
							</div>							

						<button type="submit" name="update" class="waves-effect blue lighten-2 btn"><i class="material-icons left">done</i>Actualizar</button>
						<!--<a href="historiaclinica"  class="waves-effect blue lighten-2 btn"><i class="material-icons left">cloud</i>Cancelar</a>-->
						<button type="button" name="cancelar" id="cancelar" class="waves-effect blue lighten-2 btn" ><i class="material-icons left">clear</i>Cancelar</button>
						
						</form>
				</div>

							  

   
    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/jquery.min.js">'?> </script>
    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/materialize.min.js">'?> 
	</script>
	<?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/edit.js">'; ?>
		</script>

			<?php } ?>