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
	if(isset($_POST['borrarhc']))
	{
		$id=$_POST['id'];
		if ($crud->delete($id)){
		//header("location:borrarhistoriaclinica?deleted");
		
		$time = strtotime($fecha);
		$fecha = date('Y-m-d',$time);

		$time = strtotime($fecha_nac);
		$fecha_nac = date('Y-m-d',$time);
		
		?>
		
			<div class="alert alert-success">
				<strong>Correcto!</strong>El Registro fue Eliminado. <a href='historiaclinica' class="waves-effect blue lighten-2 btn"><i class="material-icons left">reply</i>Volver</a>
			</div>
		<?php
		}else{
			?>
			<div class="alert alert-success">
				<strong>No se pudo eliminar la Historia Clinica </strong><a href='historiaclinica' class="waves-effect blue lighten-2 btn"><i class="material-icons left">reply</i>Volver</a>
			</div>
			
			
			<?php	
		}
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
	
	if(isset($_POST['idd'])){
		$id=$_POST['idd'];		
	    extract($crud->getID($id));
		$time = strtotime($fecha);
		$fecha = date('Y-m-d',$time);

		$time = strtotime($fecha_nac);
		$fecha_nac = date('Y-m-d',$time);
		
		$edad = $crud->calcula_edad($fecha_nac);
   
		echo '<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">'; ?>


					<div class="row">
						<form method="post" class="col s12">
						
						  <input id="id" type="text" hidden class="validate" name="id" value="<?php echo $id; ?>" required>
													  
													  
							 <div class="row">
								<div class="input-field col s12">
								  <input id="nombre" type="text" readonly class="validate" name="nombre" value="<?php echo $nombre; ?>" required>
								  <label for="nombre">Nombre</label>
								</div>
							</div>
							 <div class="row">
								<div class="input-field col s12">
									<input id="apellido" type="text"  readonly class="validate" name="apellido" value="<?php echo $apellido; ?>" required>
									<label for="apellido">Apellido</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="dni" type="text"  readonly class="validate" name="dni" value="<?php echo $dni; ?>" required>
									<label for="dni">DNI</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="telefono" type="text" readonly class="validate" name="telefono" value="<?php echo $telefono; ?>">
									<label for="telefono">Teléfono</label>
								</div>			
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="fecha" type="date" readonly class="validate" name="fecha" value="<?php echo $fecha; ?>">
									<label for="fecha">_______________Fecha</label>
								</div>			
							</div>
								
							<div class="row">
								<div class="input-field col s12">
								  <input id="direccion" type="text" readonly class="validate" name="direccion" value="<?php echo $direccion; ?>">
								  <label for="direccion">Domicilio Actual</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input id="ciudad" type="text" readonly class="validate" name="ciudad" value="<?php echo $ciudad; ?>">
									<label for="ciudad">Ciudad</label>
								</div>			
							</div>							
							
							<div class="row">
								<div class="input-field col s6">
								  <input id="fecha_nac" type="date"  readonly class="validate" name="fecha_nac" value="<?php echo $fecha_nac; ?>">
								  <label for="fecha_nac">________________Fecha de Nacimiento</label>
								</div>
								<div class="input-field col s6">
									<input id="edad" type="text"  readonly class="validate" name="edad" value="<?php echo $edad; ?>">
									<label for="edad">Edad</label>
								</div>	
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <input id="lugar_nac" type="text" readonly class="validate" name="lugar_nac" value="<?php echo $lugar_nac; ?>">
								  <label for="lugar_nac">Lugar de Nacimiento</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s12">
								  <input id="estado_civil" type="text" readonly class="validate" name="estado_civil" value="<?php echo $estado_civil; ?>">
								  <label for="estado_civil">Estado Civil</label>
								</div>
							</div>						
							<div class="row">
								<div class="input-field col s12">
									<input id="ocupacion" type="text" readonly class="validate" name="ocupacion" value="<?php echo $ocupacion; ?>">
									<label for="ocupacion">Ocupación</label>
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s12">
									<input id="grupo_sanguineo" type="text" readonly name="grupo_sanguineo" class="validate" value="<?php echo $grupo_sanguineo; ?>">
									<label for="grupo_sanguineo">Grupo Sanguíneo</label>
								</div>
							</div>
							
							
							<div class="row">
								<div class="input-field col s12">
								  <input id="escolaridad" name="escolaridad" readonly type="text" class="validate" value="<?php echo $escolaridad; ?>">
								  <label for="escolaridad">Escolaridad</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <input id="email" name="email" readonly type="text" class="validate" value="<?php echo $email; ?>">
								  <label for="email">E-mail</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea id="ant_personales" name="ant_personales" readonly class="materialize-textarea" required=""><?php echo $ant_personales; ?></textarea>
								  <label for="ant_personales">Antecedentes Personales</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="ant_familiares" readonly class="materialize-textarea" required=""><?php echo $ant_familiares; ?></textarea>
								  <label for="ant_familiares">Antecedentes Familiares</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea id="alergias" name="alergias" readonly class="materialize-textarea" required=""><?php echo $alergias; ?></textarea>
								  <label for="alergias">Alergias</label>
								</div>
							</div>
							
						<button data-target="modal1" class="waves-effect blue lighten-2 btn modal-trigger"><i class="material-icons left">delete</i>Borrar</button>							

						<!--<button type="submit" name="submit" class="waves-effect blue lighten-2 btn"><i class="material-icons left">delete</i>Borrar</button>-->
						<a href="historiaclinica" class="waves-effect blue lighten-2 btn"><i class="material-icons left">clear</i>Cancelar</a>

						</form>
				</div>
				
	<!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="max-height:40%;">
    <div class="modal-content">
      <h4>Eliminar Consulta</h4>
      <p>Confirma la eliminación de la Consulta??</p>
    </div>
    <div class="modal-footer">
	<button type="button" name="eliminarhc" id="eliminarhc" class="modal-action modal-close waves-effect btn-flat">Si</button>
	<button type="button" name="no" id="no" class="modal-action modal-close waves-effect btn-flat">No</button>

	</div>
  </div>  
  
  			
				

	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
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


