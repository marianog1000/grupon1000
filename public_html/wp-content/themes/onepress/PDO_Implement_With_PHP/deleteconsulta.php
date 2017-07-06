<?php
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/header.php');
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/db-config.php');
?>

<div class="container">

		<script type="text/javascript">
			history.forward();
		</script>
		<button class="btn waves-effect waves-blue"><?php wp_loginout("./historiaclinica/"); ?></button>
		<div class="clearfix"></div></br>



	<?php
	if(isset($_POST['borrar']))
	{
		
		$id=$_POST['id'];
		$nro_consulta =$_POST['nro_consulta'];
		
		if ($crud->deleteconsulta($id,$nro_consulta))
		{
		//header("location:borrarhistoriaclinica?deleted");

			$msg='<div class="alert alert-success">
					<strong>Correcto!</strong>El Registro fue Eliminado.
					<a rel="' . $id . '"  class="waves-effect blue lighten-2 btn"><i class="material-icons left">reply</i> Volver</a>
				</div>';
		}else{
			$msg="<div class='alert alert-danger'>
                <strong>Error!</strong>No se pudo Borrar la Consulta.
                </div>";
		}
	
	}else{
		?>
		<!--	<div class="alert alert-danger">
				<strong>Seguro!</strong>Desea Eliminar el Registro!!
			</div>	-->
		<?php
	}
	?>
</div>


<div class="container" >
   <?php
//   if(isset($_GET['id']))
	
	if(isset($_POST['idd']) && isset($_POST['nro_consulta'])){
		$id=$_POST['idd'];
		$nro_consulta=$_POST['nro_consulta'];
	    extract($crud->getIdConsultaPaciente($id,$nro_consulta));
		
		$time = strtotime($fecha);
		$fecha = date('Y-m-d',$time);

		?>
		
		
		<div class="alert alert-info">
			<strong><?php echo "Paciente: " . strtoupper($nombre . ' ' . $apellido) ;?></strong>	
		</div>
		
		<?php
		
		
	}
	
	

	if(isset($msg))
	{
		echo    $msg;
	}else{   
	
		echo '<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">'; ?>

			<div class="row">
				<form method="post" class="col s12">
											  
					<input id="id" type="text" hidden class="validate" name="id" value="<?php echo $id; ?>" required>
					<input id="nro_consulta" type="text" hidden class="validate" name="nro_consulta" value="<?php echo $nro_consulta; ?>" required>
					
					
					 <div class="row">
						<div class="input-field col s12">
							<input id="especialidad" type="text" readonly class="validate" name="especialidad" value="<?php echo $especialidad; ?>" required>
							<label for="especialidad">Especialidad</label>
						</div>
					</div>
					<div class="row">
						
						<div class="input-field col s12">
							<input id="fecha" type="date" readonly class="validate" name="fecha" value="<?php echo $fecha; ?>" required>
							<label for="fecha">___________________Fecha</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							 <textarea  name="motivo_consulta" readonly class="materialize-textarea" required=""><?php echo $motivo_consulta; ?></textarea>
							<label for="motivo_consulta">Motivo de Consulta</label>
						</div>			
					 
					
					<div class="row">
						<div class="input-field col s12">
							<textarea  name="enfermedad_actual" readonly class="materialize-textarea" required=""><?php echo $enfermedad_actual; ?></textarea>
							<label for="enfermedad_actual">Enfermedad Actual</label>
						</div>			
					</div>
						
					<div class="row">
						<div class="input-field col s12">
							<textarea  name="examen_fisico" readonly class="materialize-textarea" required=""><?php echo $examen_fisico; ?></textarea>
							<label for="examen_fisico">Examen Físico</label>
						</div>			
					</div>							
					
					<div class="row">
						<div class="input-field col s12">
						  <textarea  name="diagnostico" readonly class="materialize-textarea" required=""><?php echo $diagnostico; ?></textarea>
						  <label for="diagnostico">Diagnóstico</label>
						</div>
					</div>	
					<div class="row">
						<div class="input-field col s12">
						  <textarea  name="tratamiento" readonly class="materialize-textarea" required=""><?php echo $tratamiento; ?></textarea> 
						  <label for="tratamiento">Tratamiento</label>
						</div>
					</div>	

					
					<button data-target="modal1" class="waves-effect blue lighten-2 btn modal-trigger"><i class="material-icons left">delete</i>Borrar</button>
					<button type="button" name="cancelar" id="cancelar" class="waves-effect blue lighten-2 btn" ><i class="material-icons left">clear</i>Cancelar</button>

					
						</form>
				</div>

<!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="max-height:40%;">
    <div class="modal-content">
      <h4>Eliminar Consulta</h4>
      <p>Confirma la eliminación de la Consulta??</p>
    </div>
    <div class="modal-footer">
	<button type="button" name="eliminar" id="eliminar" class="modal-action modal-close waves-effect btn-flat">Si</button>
	<button type="button" name="no" id="no" class="modal-action modal-close waves-effect btn-flat">No</button>

	</div>
  </div>  
  
  
  
  
  
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/edit.js">'; ?>
		</script>
	
      
 </div>     

	<?php } ?>
