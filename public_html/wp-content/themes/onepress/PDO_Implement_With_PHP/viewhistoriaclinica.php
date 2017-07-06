<?php
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/header.php');
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/db-config.php');
?>


<div class="container" >
		<script type="text/javascript">
			history.forward();
		</script>		
		<button class="btn waves-effect waves-blue"><?php wp_loginout("./historiaclinica/"); ?></button>		
		     <div class="clearfix"></div></br>
   
   <?php
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
													  
							 <div class="row">
								<div class="input-field col s12">
								  <input id="icon_prefix" type="text" readonly class="validate" name="nombre" value="<?php echo $nombre; ?>" required>
								  <label for="icon_prefix">Nombre</label>
								</div>
							</div>
							 <div class="row">
								<div class="input-field col s12">
									<input id="icon_prefix" type="text"  readonly class="validate" name="apellido" value="<?php echo $apellido; ?>" required>
									<label for="icon_prefix">Apellido</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="icon_prefix" type="text"  readonly class="validate" name="dni" value="<?php echo $dni; ?>" required>
									<label for="icon_prefix">DNI</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="icon_prefix" type="text" readonly class="validate" name="telefono" value="<?php echo $telefono; ?>">
									<label for="icon_prefix">Teléfono</label>
								</div>			
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="icon_prefix" type="date" readonly class="validate" name="fecha" value="<?php echo $fecha; ?>">
									<label for="icon_prefix">_______________Fecha</label>
								</div>			
							</div>
								
							<div class="row">
								<div class="input-field col s12">
								  <input id="icon_prefix" type="text" readonly class="validate" name="direccion" value="<?php echo $direccion; ?>">
								  <label for="icon_prefix">Domicilio Actual</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									<input id="icon_prefix" type="text" readonly class="validate" name="ciudad" value="<?php echo $ciudad; ?>">
									<label for="icon_prefix">Ciudad</label>
								</div>			
							</div>							
							
							<div class="row">
								<div class="input-field col s6">
								  <input id="icon_prefix" type="date"  readonly class="validate" name="fecha_nac" value="<?php echo $fecha_nac; ?>">
								  <label for="icon_prefix">_______________Fecha de Nacimiento</label>
								</div>
								<div class="input-field col s6">
									<input id="icon_prefix" type="text"  readonly class="validate" name="edad" value="<?php echo $edad; ?>">
									<label for="icon_prefix">Edad</label>
								</div>	
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <input id="icon_prefix" type="text" readonly class="validate" name="lugar_nac" value="<?php echo $lugar_nac; ?>">
								  <label for="icon_prefix">Lugar de Nacimiento</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s12">
								  <input id="icon_prefix" type="text" readonly class="validate" name="estado_civil" value="<?php echo $estado_civil; ?>">
								  <label for="icon_prefix">Estado Civil</label>
								</div>
							</div>						
							<div class="row">
								<div class="input-field col s12">
									<input id="icon_prefix" type="text" readonly class="validate" name="ocupacion" value="<?php echo $ocupacion; ?>">
									<label for="icon_prefix">Ocupación</label>
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s12">
									<input id="icon_prefix" type="text" readonly name="grupo_sanguineo" class="validate" value="<?php echo $grupo_sanguineo; ?>">
									<label for="icon_prefix">Grupo Sanguíneo</label>
								</div>
							</div>
							
							
							<div class="row">
								<div class="input-field col s12">
								  <input id="icon_prefix" name="escolaridad" readonly type="text" class="validate" value="<?php echo $escolaridad; ?>">
								  <label for="icon_prefix">Escolaridad</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <input id="icon_prefix" name="email" readonly type="text" class="validate" value="<?php echo $email; ?>">
								  <label for="icon_prefix">E-mail</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="ant_personales" readonly class="materialize-textarea" required=""><?php echo $ant_personales; ?></textarea>
								  <label for="icon_prefix">Antecedentes Personales</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="ant_familiares" readonly class="materialize-textarea" required=""><?php echo $ant_familiares; ?></textarea>
								  <label for="icon_prefix">Antecedentes Familiares</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								  <textarea  name="alergias" readonly class="materialize-textarea" required=""><?php echo $alergias; ?></textarea>
								  <label for="icon_prefix">Alergias</label>
								</div>
							</div>
							
							

						<!--<button type="submit" name="submit" class="waves-effect blue lighten-2 btn"><i class="material-icons left">cloud</i>Borrar</button>-->
						<a href="historiaclinica" class="waves-effect blue lighten-2 btn"><i class="material-icons left">reply</i>Volver</a>

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


