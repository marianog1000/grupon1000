<?php
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/header.php');
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/db-config.php');
?>


<div class="container">
	<?php
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$nro_consulta =$_POST['nro_consulta'];
		
		$crud->deleteconsulta($id,$nro_consulta);
		//header("location:borrarhistoriaclinica?deleted");
		$time = strtotime($fecha);
		$fecha = date('Y-m-d',$time);
	
		
		?>
		
			<div class="alert alert-success">
				<strong>Correcto!</strong>El Registro fue Eliminado. <a href='historiaclinica' class='btn btn-success'>Volver</a>
			</div>
						
		
		
		<?php
	}else{
		?>
			<div class="alert alert-danger">
				<strong>Seguro!</strong>Desea Eliminar el Registro!!
			</div>	
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
   
		echo '<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">'; ?>
		
			<div class="alert alert-info">
				<strong><?php echo "Paciente: " . strtoupper($nombre . ' ' . $apellido) ;?></strong>	
			</div>

					<div class="row">
						<form method="post" class="col s12">
													  
							<input id="id" type="text" hidden class="validate" name="id" value="<?php echo $id; ?>" required>
							<input id="nro_consulta" type="text" hidden class="validate" name="nro_consulta" value="<?php echo $nro_consulta; ?>" required>
							
							
							<label for="especialidad">Especialidad</label>
							<input id="especialidad" type="text" readonly class="validate" name="especialidad" value="<?php echo $especialidad; ?>" required>

							<label for="fecha">_______________Fecha</label>
							<input id="fecha" type="date" readonly class="validate" name="fecha" value="<?php echo $fecha; ?>" required>

							<label for="motivo_consulta">Motivo de Consulta</label>
							<textarea  name="motivo_consulta" readonly class="materialize-textarea" required=""><?php echo $motivo_consulta; ?></textarea>
							 
							<label for="enfermedad_actual">Enfermedad Actual</label>							
							<textarea  name="enfermedad_actual" readonly class="materialize-textarea" required=""><?php echo $enfermedad_actual; ?></textarea>

							<label for="examen_fisico">Examen Físico</label>								
							<textarea  name="examen_fisico" readonly class="materialize-textarea" required=""><?php echo $examen_fisico; ?></textarea>

							<label for="diagnostico">Diagnóstico</label>
							<textarea  name="diagnostico" readonly class="materialize-textarea" required=""><?php echo $diagnostico; ?></textarea>

							<label for="tratamiento">Tratamiento</label>
							<textarea  name="tratamiento" readonly class="materialize-textarea" required=""><?php echo $tratamiento; ?></textarea> 

						<button type="submit" name="submit" class="waves-effect blue lighten-2 btn"><i class="material-icons left">cloud</i>Borrar</button>
						<!--<a href="historiaclinica" class="waves-effect blue lighten-2 btn"><i class="material-icons left">cloud</i>Volver</a>-->
						<button type="button" name="cancelar" id="cancelar" class="waves-effect blue lighten-2 btn" ><i class="material-icons left">cloud</i>Cancelar</button>
						

				<!--<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Guardar</button>
                    <a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Volver al índice</a>
				</div>
-->

						
						</form>
				</div>


    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/jquery.min.js">'?> </script>
    <?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/materialize/js/materialize.min.js">'?> 
	</script>
	<?php echo '<script type="text/javascript" src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/edit.js">'; ?>
		</script>

       
   <?php
   
   }
   ?>
 </div>     
<!---
<div class="container">
    <p>
        <?php //if(!isset($_POST['btn-del'])){ ?>
			<form method="post">
				<button class="btn  btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i>&nbsp; Si</button>
				<a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i>&nbsp; No</a>
				
			</form>
        
        <?php 
        //}else{
        ?>
        
         <a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i>&nbsp; Volver al Índice</a>
        <?php 
        //}?>
    </p> 
    
</div>

     -->   


