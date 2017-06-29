<?php
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/header.php');
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/db-config.php');
?>
<?php
if(isset($_POST['update']))
{
    
    $id=$_GET['id'];
    $legajo=$_POST['legajo'];
    $nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
    $direccion=$_POST['direccion'];
	$ciudad=$_POST['ciudad'];
	$telefono=$_POST['telefono'];
	$email=$_POST['email'];
	$fecha=$_POST['fecha'];
	$ant_personales=$_POST['ant_personales'];
	$ant_familiares=$_POST['ant_familiares'];
	$diagnostico=$_POST['diagnostico'];
    $tratamiento=$_POST['tratamiento'];
	

    
    if($crud->update($id,$legajo,$nombre,$apellido,$direccion,$ciudad,$telefono,$email,$fecha,$ant_personales,$ant_familiares,$diagnostico,$tratamiento))
    {
        $msg="<div class='alert alert-success'>
                La Historia Clinica se actualizó correctamente. <a href='historiaclinica' class='btn btn-success'>Volver</a>
                </div><br/>";
                  
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
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    extract($crud->getID($id));
}


?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Historia Clinica</title>
         
		<style>
		.container.hc{
			color:blue;
			background-color:rgba(85, 175, 202, 0.23);
			border-radius:9px;
			box-shadow: 0px 3px 5px #444;"
			

		}
		textarea, input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"]{
			background-color:white;
		}
		
		</style>

    </head>
    <body>
        <div class="clearfix"></div></br>
        
		<?php
            if(isset($msg))
            {
             echo    $msg;
            }   
            
        ?>
        
        <div class="container hc">
            
            
			<br/>
            <form method="post">
			
			
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required="required">
				</div>
				<div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" placeholder="Apellido" name="apellido" class="form-control" value="<?php echo $apellido; ?>" required="required">
				</div>
				<div class="form-group">
					<label for="direccion">Dirección</label>
				    <input type="text" placeholder="Dirección" name="direccion" class="form-control" value="<?php echo $direccion; ?>" required="required">
				</div>
				<div class="form-group">
					<label for="ciudad">Ciudad</label>
					<input type="text" placeholder="Ciudad" name="ciudad" class="form-control" value="<?php echo $ciudad; ?>" required="required">
				</div>
				<div class="form-group">
					<label for="legajo">Legajo</label>
					<input type="text" placeholder="Legajo" name="legajo" class="form-control" value="<?php echo $legajo; ?>" required="required">
				</div>
				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="text" placeholder="Telefono" name="telefono" class="form-control" value="<?php echo $telefono; ?>" required="">
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" placeholder="E-mail" name="email" class="form-control" value="<?php echo $email; ?>" required="">
				</div>
				<div class="form-group">
					<label for="fecha">Fecha</label>
					<input type="date"  name="fecha" class="form-control" value="<?php echo substr($fecha,0,10); ?>" required="">
				</div>
				<div class="form-group">
					<label for="fecha">Antecedentes Personales</label>
				    <textarea placeholder="Antecedentes Personales" name="ant_personales" class="form-control" required=""><?php echo $ant_personales; ?></textarea>
				</div>
				<div class="form-group">
					<label for="fecha">Antecedentes Familiares</label>
                    <textarea placeholder="Antecedentes Familiares" name="ant_familiares" class="form-control" required=""><?php echo $ant_familiares; ?></textarea>
				</div>
				<div class="form-group">
					<label for="fecha">Diagnóstico</label>
					<textarea placeholder="Diagnóstico" name="diagnostico" class="form-control" required=""><?php echo $diagnostico; ?></textarea>
				</div>
				<div class="form-group">
					<label for="fecha">Tratamiento</label>
					<textarea placeholder="Tratamiento" name="tratamiento" class="form-control" required=""><?php echo $tratamiento; ?></textarea>
				</div>
				<div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Actualizar</button>
                    <a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i>Cancelar</a>
				</div>
                
            </form>
            
            
        </div>
        
         <?php //include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/footer.php'); ?> 
        
        
    </body>

</html>    

