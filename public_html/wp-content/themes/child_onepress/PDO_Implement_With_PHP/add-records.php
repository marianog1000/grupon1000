<?php  

//require_once ('C:/xampp/htdocs/pruebas/wp-content/themes/twentysixteen/PDO_Implement_With_PHP/include/header.php');  
include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/header.php');  ?>

<?php
if(isset($_POST['submit']))
{
   
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

	require_once (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/db-config.php');
    
    if($crud->create($legajo,$nombre,$apellido,$direccion,$ciudad,$telefono,$email,$fecha,$ant_personales,$ant_familiares,$diagnostico,$tratamiento)){
        //header("location: ". get_template_directory_uri(). "/PDO_Implement_With_PHP/add-records.php?insert");
		//header("location:crud");
		
		
		//if(isset($_GET['insert']))
		//{
			?>
			<div class="container">
				<div class="alert alert-info">
					<strong>Se creó la Historia Clinica Correctamente!.</strong>
                    <a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Volver al índice</a>
				</div>
			
			
			</div>

		<?php
		//}
		
    }
    else
    {
         //header("location:nuevahistoriaclinica?fail");
		 
		 
		//if(isset($_GET['fail']))
		//{
			?>
		<div class="container">
			<div class="alert alert-danger">
				<strong>Ha ocurrido un problema!!</strong>
			</div>
			
			
		</div>

		<?php
		//}
		
    }
    
    
}
else
{
    
}
?>





<html>
    <head>
        <meta charset="UTF-8">
        <title>My First Web Project</title>
        <link href="<?php  get_stylesheet_directory().'/PDO_Implement_With_PHP/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css">
		
		<style>
		.entry-content{
			margin:0;
			
		}
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
<!--		style="color:blue;background-color:rgba(85, 175, 202, 0.23);border-radius:9px;box-shadow: 0px 3px 5px #444;"-->
	
        <div class="container hc" >
            <br/>
			<form method="post">
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="nombre" placeholder="Nombre" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" placeholder="apellido" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="direccion">Dirección</label>
					<input type="text" name="direccion" placeholder="Direccion" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="legajo">Legajo</label>
					<input type="text" name="legajo" placeholder="Legajo" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="text" name="telefono" placeholder="Teléfono" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" name="email" placeholder="E-mail" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="fecha">Fecha</label>
					<input type="date" name="fecha" placeholder="Fecha" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="fecha">Antecedentes Personales</label>
					<textarea name="ant_personales" placeholder="Antecedentes Personales" class="form-control" required="" ></textarea>
				</div>
				<div class="form-group">
					<label for="fecha">Antecedentes Familiares</label>
					<textarea name="ant_familiares" placeholder="Antecedentes Familiares" class="form-control" required="" ></textarea>
				</div>
				<div class="form-group">
					<label for="fecha">Diagnóstico</label>
					<textarea name="diagnostico" placeholder="Diagnóstico" class="form-control" required="" ></textarea>
				</div>
				<div class="form-group">
					<label for="fecha">Tratamiento</label>
                    <textarea name="tratamiento" placeholder="Tratamiento" class="form-control" required="" ></textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Guardar</button>
                    <a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Volver al índice</a>
				</div>
               
                
            </form>       
            
            
        </div>    
        
    </body>

</html>    



