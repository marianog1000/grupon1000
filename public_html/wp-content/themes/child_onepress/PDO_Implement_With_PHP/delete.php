<?php
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/header.php');
include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/include/db-config.php');
?>


<div class="container">
	<?php
	if(isset($_POST['btn-del']))
	{
		$id=$_GET['id'];
		$crud->delete($id);
		//header("location:borrarhistoriaclinica?deleted");
		
		?>
		
			<div class="alert alert-success">
				<strong>Correcto!</strong>El Registro fue Eliminado.
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



<!--<div class="container">
<?php
//if(isset($_GET['deleted']))
//{
?>
    <div class="alert alert-success">
        <strong>Correcto!</strong>El Registro fue Eliminado.
    </div>

<?php
//} else {
?>
 <div class="alert alert-danger">
        <strong>Seguro!</strong>Desea Eliminar el Registro!!
    </div>
    
    
 <?php
//}
?>
</div>
-->



<div class="container" style="overflow-x:scroll;">
   <?php
//   if(isset($_GET['id']))
	   if(!isset($_POST['btn-del']))
   {
   ?>
    <table class="table table-bordered">
        <tr>
            <th>Legajo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ciudad</th>
        </tr>
        <?php
            $stmt=$db->prepare("select legajo,nombre,apellido,ciudad from ".$crud->getBaseDatos()." where id=:id");    
            $stmt->execute(array(":id"=>$_GET['id']));
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
        
        ?>
        <tr>
            <td><?php echo $row['legajo']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['ciudad']; ?></td>
        </tr>
        
        
        
        <?php 
            }?>
    </table>    
       
   <?php
   
   }
   ?>
 </div>     

<div class="container">
    <p>
        <?phpif(!isset($_POST['btn-del'])){?>
			<form method="post">
				<button class="btn  btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i>&nbsp; Si</button>
				<a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i>&nbsp; No</a>
				
			</form>
        
        <?php
        }else {
        ?>
        
         <a href="historiaclinica" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i>&nbsp; Volver al Índice</a>
        <?php 
        }?>
    </p> 
    
</div>

        


