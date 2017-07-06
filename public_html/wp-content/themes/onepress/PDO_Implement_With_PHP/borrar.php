<?php

	
	
//	if(isset($_POST['id']) && isset($_POST['nro_consulta']))
	//{
		echo 'entra a borrar';
		
		
		$id=$_POST['id'];
		$nro_consulta =$_POST['nro_consulta'];
		
		if ($crud->deleteconsulta($id,$nro_consulta)){
			
			exit();
			
		}else{
			
			exit();
		}
			
		/*
	}else{
			echo 'no entra';
	}*/
?>