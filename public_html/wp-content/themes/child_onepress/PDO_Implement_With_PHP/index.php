<?php
//PDO-OOP-PHP-CRUD-with-Bootstrap 2016 (CRUD Operation) | Part-14
//Playlist Name  : PDO-OOP-PHP-CRUD-with-Bootstrap 2016

//require_once ('C:/xampp/htdocs/pruebas/wp-content/themes/twentysixteen/PDO_Implement_With_PHP/include/db-config.php');
include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/db-config.php'); 
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>My First Web Project</title>
     
		<style>
			.input-group .input-group-addon{
				border:0;
				padding: 6px 15px 0;
				background: transparent;				
			}
			
			.col-lg-2, .col-lg-6{
				margin: 10px 1px;
				
			}
		
			.pagination1 {
				display: inline-block;
				padding-left: 0;
				margin: 20px 0;
				border-radius: 4px;

			}
			#myTable{
				
				border-collapse:collapse;
				table-layout: initial;
				/*overflow:scroll;*/
				border-spacing: 0;
				border-collapse: collapse;
				display:inline-table;
				
			}		

			.pagination1>li{
				display: inline;
			}
			
			caption, th, td {
				font-weight: normal;
				text-align: center;
			}
			.pagination1>li:last-child>a, .pagination1>li:last-child>span {
				border-top-right-radius: 4px;
				border-bottom-right-radius: 4px;
			}
			
			.pagination1>li>a, .pagination1>li>span {
				position: relative;
				float: left;
				padding: 6px 12px;
				margin-left: -1px;
				line-height: 1.42857143;
				color: #337ab7;
				text-decoration: none;
				background-color: #fff;
				border: 1px solid #ddd;
			}
			
			@media (min-width: 1200px)
			.container1 {
				width: 1000px;	
				overflow:scroll;
				position:absolute;
				
			}
			


		</style>


    </head>
    <body>
	
        <?php 
		
		include (get_stylesheet_directory() . '/PDO_Implement_With_PHP/include/header.php'); ?>
        <div class="container1">
			<form class="form-horizontal" role="form">

				<div class="form group">
					<div class="col-lg-2">
						<a href="nuevahistoriaclinica" class="btn btn-info btn-block"><i class="glyphicon glyphicon-plus"></i>&nbsp; Agregar</a>
					</div>
					<div class="col-lg-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-search"></i></span>
						  <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="buscar por nombre o apellido">
						</div>
					</div>
					<div class="col-lg-2">
						<button class="btn btn-success btn-block">&nbsp; Buscar</button>
					</div>
				</div>
			</div>
        </div>

        <div class="clearfix"></div></br>

        <div class="container1">
            <table id="myTable" class="table table-bordered table-responsive">
              
                    <tr>
                        <th style="text-align: center;">Legajo</th>
                        <th  style="text-align: center;">Nombre</th>
                        <th  style="text-align: center;">Apellido</th>
						<th  style="text-align: center;">Direccion</th>
                        <th  style="text-align: center;">Ciudad</th>
                        <th  style="text-align: center;" colspan="3">Acción</th>
                    </tr>
              
             
                 <?php
                 $query="select id, legajo, nombre, apellido, direccion, ciudad from ". $crud->getBaseDatos();
				 if($_GET["q"]!="")
					$query .= " where apellido like '%$_GET[q]%' or nombre like '%$_GET[q]%' ";
                 $record_per_page=5;
                 $query2=$crud->paging($query,$record_per_page);
                 $crud->dataview($query2);
                 ?>

                    <tr>
                        <td colspan="7" align="center">
                            <div class="pagination-wrap">
                                <?php   $crud->pagelink($query, $record_per_page);    ?>                                
                            </div>
                        </td>
                        
                    </tr>


            </table>

        </div>    


    </body>
  
</html>
