<?php

include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/db-config.php'); 
include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/header.php'); ?>
		


		<script type="text/javascript">
			history.forward();
		</script>
		<button type="button" class="btn btn-success btn-ml" data-toggle="tooltip" title="Login" data-placement="top">
			<?php wp_loginout("./historiaclinica/"); ?>
		</button>
		
		<?php
		$cu = wp_get_current_user();
		if (is_user_logged_in() && ($cu->has_cap( 'administrator' ) || $cu->has_cap( 'medico' ))){	
		

			if(isset($_POST['idd']))
			{	
				$id=$_POST['idd'];
				extract($crud->getIdConsulta($id));	
				echo '<script languaje="JavaScript">
				  var varjs="'.$id.'";
					</script>';
				
				?>	
				
				<div class="alert alert-info">
					<strong><?php echo "Paciente: " . strtoupper($nombre . ' ' . $apellido) ;?></strong>
					<a class="btn btn-primary btn-ml" href="historiaclinica">
						<span class="glyphicon glyphicon-backward" aria-hidden="true"> Historia Clinica</span>
					</a>
				</div>
				
				<?php
			}?>

		<table id="example" class="mdl-data-table mdl-data-table-select-rows" cellspacing="0"  >
			
	

			<thead>
			<tr>
				<th>Nro</th>
				<th>Especialidad</th>
				<th>Fecha</th>
				<th>Motivo</th>
				<th style="text-align:center;width:100px;"><button type="button" data-func="dt-add" class="btn btn-success btn-xs dt-add" data-toggle="tooltip" title="Agregar" data-placement="top">
					<span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span>
				</button>

			</tr>
			</thead>
			<tfoot>
			<tr>
				<th>Nro</th>
				<th>Especialidad</th>
				<th>Fecha</th>
				<th>Motivo</th>
				<th style="text-align:center;width:100px;"><button type="button" data-func="dt-add" class="btn btn-success btn-xs dt-add" data-toggle="tooltip" title="Agregar" data-placement="top"> 
					<span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span>
				</button>
			</tr>
			</tfoot>                
	 
			 <?php
			 //$query="select id, dni, nombre, apellido, direccion, ciudad from ". $crud->getBaseDatos();
			 $query="select nro_consulta, especialidad, fecha, motivo_consulta, usuario from ". $crud->getBaseConsultas() . 
				" where id=" .$id ;
			// if($_GET["q"]!="")
			//  	query .= " where apellido like '%$_GET[q]%' or nombre like '%$_GET[q]%' ";
			// $record_per_page=5;
			// $query2=$crud->paging($query,$record_per_page);
			 ?>  <tbody class="table table-striped table-hover table-mc-light-blue">  
			 <?php $crud->dataviewconsultaspaciente($query); ?>
			  </tbody> 
        </table>


		<!-- Modal 
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Row information</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>-->
		


		<?php }else{?>
			
			<div class="alert alert-info">
				<strong>Debe estar identificado para visitar esta página.</strong>
			</div>
		<?php } ?>






		
			
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.material.min.js"></script>
	<?php echo '<script src="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/consultaspaciente.js">'; ?> </script>


  <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>-->
						
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<!--<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>-->
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	

  <!-- Compiled and minified JavaScript -->
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    -->   
