<?php



class Crud {

    private $db;
	CONST BASEDATOS =  "grn_historia_clinica";
	CONST BASECONSULTAS =  "grn_consultas";
	CONST BASEESPECIALIDAD =  "grn_hc_especialidades";	
	CONST BASE_HIST_HC =  "grn_historico_hist_clinica";
	CONST BASE_HIST_CONSULTAS =  "grn_historico_consultas";	

    public function __construct($db) {
        $this->db = $db;
    }
	
	public function getBaseDatos()
	{
		return SELF::BASEDATOS;		
	}
	
	public function getBaseConsultas()
	{
		return SELF::BASECONSULTAS;
	}
	
	public function getEspecialidad($usuario)
	{
		try {
			
			$stmt = $this->db->prepare("select especialidad from ".SELF::BASEESPECIALIDAD." where usuario=:usuario");
			$stmt->execute(array(":usuario" => $usuario));
			$editrow = $stmt->fetch(PDO::FETCH_ASSOC);
			return $editrow;
		} catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
	}
	

    public function create($usuario,$datos) {
        try {
            $stmt = $this->db->prepare("insert into " 
			. SELF::BASEDATOS ."(dni,nombre,apellido,telefono,fecha,direccion,ciudad,fecha_nac,lugar_nac,estado_civil,
			ocupacion,grupo_sanguineo,escolaridad,email,ant_personales,ant_familiares,alergias,usuario) 
			values(:dni,:nombre,:apellido,:telefono,:fecha,:direccion,:ciudad,:fecha_nac,:lugar_nac,:estado_civil,
			:ocupacion,:grupo_sanguineo,:escolaridad,:email,:ant_personales,:ant_familiares,:alergias,:usuario)");
			
			$stmt->execute(array(

				':dni'       => $datos[dni],
				':nombre'    => $datos[nombre],
				':apellido'  => $datos[apellido],
				':telefono'  => $datos[telefono],
				':fecha'     => $datos[fecha],
				':direccion' => $datos[direccion],
				':ciudad'	 => $datos[ciudad],
				':fecha_nac' => $datos[fecha_nac],
				':lugar_nac' => $datos[lugar_nac],
				':estado_civil' => $datos[estado_civil],
				':ocupacion' => $datos[ocupacion],
				':grupo_sanguineo' => $datos[grupo_sanguineo],
				':escolaridad' => $datos[escolaridad],
				':email' => $datos[email],
				':ant_personales' => $datos[ant_personales],
				':ant_familiares' => $datos[ant_familiares], 
				':alergias' => $datos[alergias],
				':usuario'       => $usuario
			));
			
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function delete($id) {
		
		try{
			$stmt = $this->db->prepare("Delete from " . SELF::BASEDATOS ." where id=:id");
			$stmt->bindparam(":id", $id);
			$stmt->execute();
			
			
			if (is_user_logged_in()){
				$cu = wp_get_current_user(); 
				$usuario = strtoupper($cu->user_login);
			}
			
			
			$query = "insert into " . SELF::BASE_HIST_HC ." (fecha_accion, accion, usuario_new, id_hc_ant) 
			values(localtime(), 'DELETE', :usuario, :id)";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(":usuario", $usuario);
			$stmt->bindparam(":id", $id);
			$stmt->execute();

			
			return true;
		} catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
	
    public function deleteconsulta($id,$nro_consulta) {
        
		try{
		
			$stmt = $this->db->prepare("Delete from " . SELF::BASECONSULTAS ." where id=:id and nro_consulta=:nro_consulta");
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":nro_consulta", $nro_consulta);
			$stmt->execute();
			
			
			
			if (is_user_logged_in()){
				$cu = wp_get_current_user(); 
				$usuario = strtoupper($cu->user_login);
			}


			$query = "insert into " . SELF::BASE_HIST_CONSULTAS ." (fecha_accion, accion, usuario_new, nro_consulta_ant, id_con_ant  ) 
			values(localtime(), 'DELETE', :usuario, :nro_consulta, :id)";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(":usuario", $usuario);
			$stmt->bindparam(":nro_consulta", $nro_consulta);
			$stmt->bindparam(":id", $id);
			$stmt->execute();

		} catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
		
        return true;
    }
	

    public function getID($id) {
        $stmt = $this->db->prepare("select * from ".SELF::BASEDATOS." where id=:id");
        $stmt->execute(array(":id" => $id));
        $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editrow;
    }
	public function getIdConsulta($id) {
        $stmt = $this->db->prepare("select nombre, apellido from ".SELF::BASEDATOS." where id=:id");
        $stmt->execute(array(":id" => $id));
        $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editrow;
    }
	
	
	public function getIdConsultaPaciente($id, $nro_consulta){
		
		$stmt = $this->db->prepare("select nombre, apellido, con.* from ".SELF::BASEDATOS." hc, ".SELF::BASECONSULTAS." con where con.id=:id and con.nro_consulta = :nro_consulta and con.id=hc.id");
        $stmt->execute(array(":id" => $id, ":nro_consulta" => $nro_consulta));
        $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editrow;

	}
	
    public function update($datos){
	
	
        try {

            $stmt = $this->db->prepare("update ".SELF::BASEDATOS." set 		
			dni= :dni,
			nombre = :nombre,
			apellido = :apellido,
			telefono =:telefono,
			fecha =:fecha,
			direccion =:direccion,
			ciudad	=:ciudad,
			fecha_nac =:fecha_nac,
			lugar_nac =:lugar_nac,
			estado_civil =:estado_civil,
			ocupacion =:ocupacion,
			grupo_sanguineo =:grupo_sanguineo,
			escolaridad =:escolaridad,
			email =:email,
			ant_personales =:ant_personales,
			ant_familiares =:ant_familiares,
			alergias= :alergias	
			where id= :id");
			
			$stmt->execute(array(
				':id'        => $datos[id],
				':dni'       => $datos[dni],
				':nombre'    => $datos[nombre],
				':apellido'  => $datos[apellido],
				':telefono'  => $datos[telefono],
				':fecha'     => $datos[fecha],
				':direccion' => $datos[direccion],
				':ciudad'	 => $datos[ciudad],
				':fecha_nac' => $datos[fecha_nac],
				':lugar_nac' => $datos[lugar_nac],
				':estado_civil' => $datos[estado_civil],
				':ocupacion' => $datos[ocupacion],
				':grupo_sanguineo' => $datos[grupo_sanguineo],
				':escolaridad' => $datos[escolaridad],
				':email' => $datos[email],
				':ant_personales' => $datos[ant_personales],
				':ant_familiares' => $datos[ant_familiares], 
				':alergias' => $datos[alergias]
				
			));
			
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

	
	public function updateconsulta($id, $nro_consulta,$especialidad,$fecha,$motivo_consulta,$enfermedad_actual,$examen_fisico,$diagnostico,$tratamiento,$usuario){
        try {

            $stmt = $this->db->prepare("update ".SELF::BASECONSULTAS." set 		
			especialidad = :especialidad,
			fecha = :fecha,
			motivo_consulta= :motivo_consulta,
			enfermedad_actual= :enfermedad_actual,
			examen_fisico= :examen_fisico,
			diagnostico= :diagnostico,
			tratamiento = :tratamiento,
			usuario = :usuario
			where id= :id and nro_consulta= :nro_consulta");
			
			$stmt->execute(array(
				':especialidad'  => $especialidad,
				':fecha'       => $fecha,
				':motivo_consulta'    => $motivo_consulta,
				':enfermedad_actual'  => $enfermedad_actual,
				':examen_fisico'  => $examen_fisico,
				':diagnostico'     => $diagnostico,
				':tratamiento' => $tratamiento,
				':usuario' => $usuario,
				':id'	 => $id,
				':nro_consulta' => $nro_consulta
				
			));
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

	
	
    public function dataview($query) {

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php
                if (isset($row['id'])) {
                    print($row['id']);
                }
                ?></td>
				
				<td><?php
                if (isset($row['dni'])) {
                    print($row['dni']);
                }
                ?></td>				
				
                <td><?php
                if (isset($row['nombre'])) {
                    print($row['nombre']);
                }
                ?></td>    
                
				<td><?php
                if (isset($row['apellido'])) {
                    print($row['apellido']);
                }
                ?></td>  
                
				<td><?php
                if (isset($row['direccion'])) {
                    print($row['direccion']);
                }
                ?></td> 
				
				
                <td><?php
                if (isset($row['ciudad'])) {
                    print($row['ciudad']);
                }
                ?></td>
				
				<td style="display:flex;">		
					<button type="button" class="btn btn-primary btn-xs dt-consultas" data-toggle="tooltip" data-placement="top" title="Consultas" style="margin-right:7px;">
						<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-warning btn-xs dt-edit" data-toggle="tooltip" data-placement="top" title="Modificar" style="margin-right:7px;">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-success btn-xs dt-view" data-toggle="tooltip" data-placement="top" title="Visualizar" style="margin-right:7px;">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
					</button> 
					<button type="button" class="btn btn-danger btn-xs dt-delete" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button> 

				</td>
                </tr>         

                <?php
            }
        } else {
            ?>
            <!--<tr>
                <td>No hay registros...</td>
            </tr>-->
            <?php
        }
		
		?>
<!--		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>-->
		<?php
    }
	
	
	public function createConsulta($datos,$usuario) {
	
	
        try {            
            $stmt = $this->db->prepare("insert into " 	. SELF::BASECONSULTAS ."(id,especialidad,fecha,motivo_consulta,enfermedad_actual,examen_fisico,diagnostico,tratamiento,usuario) 		values(:id,:especialidad,:fecha,:motivo_consulta,:enfermedad_actual,:examen_fisico,:diagnostico,:tratamiento,
			:usuario)");
			
			$stmt->execute(array(
				':id'       => $datos[id],
				':especialidad'    => $datos[especialidad] ,
				':fecha'  => $datos[fecha],
				':motivo_consulta'  => $datos[motivo_consulta],
				':enfermedad_actual'     => $datos[enfermedad_actual],
				':examen_fisico' => $datos[examen_fisico],
				':diagnostico'	 => $datos[diagnostico],
				':tratamiento' => $datos[tratamiento],
				':usuario' => $usuario
				
			));
			
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
	
	
   public function dataviewconsultas($query) {

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php
                if (isset($row['nombre'])) {
                    print($row['nombre']);
                }
                ?></td>                    
				<td><?php
                if (isset($row['apellido'])) {
                    print($row['apellido']);
                }
                ?></td>                    
				<td><?php
                if (isset($row['nro_consulta'])) {
                    print($row['nro_consulta']);
                }
                ?></td>
				
				<td><?php
                if (isset($row['especialidad'])) {
                    print($row['especialidad']);
                }
                ?></td>				
				
                <td><?php
                if (isset($row['fecha'])) {
                    print($row['fecha']);
                }
                ?></td>    
                
				<td><?php
                if (isset($row['motivo'])) {
                    print($row['motivo']);
                }
                ?></td>  
                
				<td style="display:flex;">
					<button type="button" class="btn btn-primary btn-xs dt-edit" data-toggle="tooltip" data-placement="top" title="Modificar" style="margin-right:16px;">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-success btn-xs dt-view" data-toggle="tooltip" data-placement="top" title="Visualizar" style="margin-right:7px;">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
					</button> 
					<button type="button" class="btn btn-danger btn-xs dt-delete" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>
				</td>
				
				</tr>         

                <?php
            }
        } else {
            ?>
            <!--<tr>
                <td>No hay registros...</td>
            </tr>-->
            <?php
        }
		
		?>
<!--		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>-->
		<?php
    }	

	public function dataviewconsultaspaciente($query) {

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
				<td><?php
                if (isset($row['nro_consulta'])) {
                    print($row['nro_consulta']);
                }
                ?></td>
				
				<td><?php
                if (isset($row['especialidad'])) {
                    print($row['especialidad']);
                }
                ?></td>				
				
                <td><?php
                if (isset($row['fecha'])) {
					$date = new DateTime($row['fecha']);
					//echo $date->format('Y-m-d H:i:s');
					print $date->format('d-m-y');
                    //print($row['fecha']->format('dd-mm-yyyy'));
                }
                ?></td>    
                
				<td><?php
                if (isset($row['motivo_consulta'])) {
                    print($row['motivo_consulta']);
                }
                ?></td>  
				
				
				
			<?php 
				$cu = wp_get_current_user();
				if (strtoupper($row['usuario'])== strtoupper($cu->user_login)){
					?>

					<td style="display:flex;">
						<button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:7px;" data-toggle="tooltip" title="Modificar" data-placement="top">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-success btn-xs dt-view" style="margin-right:7px;" data-toggle="tooltip" title="Visualizar" data-placement="top">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
						</button> 					
						<button type="button" class="btn btn-danger btn-xs dt-delete" data-toggle="tooltip" title="Eliminar" data-placement="top">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button>
					</td>
					<?php
				}else{
					?>

					<td style="display:flex;">
						<button type="button" disabled class="btn btn-primary btn-xs dt-edit" style="margin-right:7px;" data-toggle="tooltip" title="Modificar" data-placement="top">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-success btn-xs dt-view" style="margin-right:7px;" data-toggle="tooltip" title="Visualizar" data-placement="top">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
						</button> 					
						<button type="button" disabled class="btn btn-danger btn-xs dt-delete" data-toggle="tooltip" title="Eliminar" data-placement="top">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button>						
					</td>
					<?php
				}
				?>
				
				
                <!--
				<td style="display:flex;">
					<button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:7px;" data-toggle="tooltip" title="Modificar" data-placement="top">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-success btn-xs dt-view" style="margin-right:7px;" data-toggle="tooltip" title="Visualizar" data-placement="top">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
					</button> 					
					<button type="button" class="btn btn-danger btn-xs dt-delete" data-toggle="tooltip" title="Eliminar" data-placement="top">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>
					
					
				</td>-->
				
				</tr>         

                <?php
            }
        } else {
            ?>
           <!-- <tr>
                <td  colspan="5">No hay registros...</td>
            </tr>-->
            <?php
        }
		
    }	

	
	
    public function paging($query, $record_per_page) {
        $starting_position = 0;
        if(isset($_GET['page_no']))
        {
            $starting_position=($_GET['page_no']-1)*$record_per_page;
        }
        $query2 = $query . " limit $starting_position,$record_per_page";
        return $query2;
    }

    public function pagelink($query, $record_per_page) {
        //$self = $_SERVER['PHP_SELF'];
		$self = "historiaclinica";
            
        $stmt=$this->db->prepare($query);
        $stmt->execute();
        
        $total_no_of_records=$stmt->rowCount();
       
        if($total_no_of_records > 0)
        {
        ?>
            <ul class="pagination1">
             <?php
              
             $total_no_pages=ceil($total_no_of_records/$record_per_page);
             $current_page=1;
             if(isset($_GET["page_no"]))
             {
				$current_page=$_GET["page_no"];
             }
             if($current_page!=1)
             {
                 $previous=$current_page-1;
                echo "<li><a href='".$self."?page_no=1'>Primera</a></li>";
                echo "<li><a href='".$self."?page_no=".$previous."'>Anterior</a></li>";
             }
            
             for($i=1;$i<=$total_no_pages;$i++)
             {
                 if($i==$current_page)
                 {
                     echo "<li><a href='".$self."?page_no=".$i."' style='color:white;background-color:#31b0d5;'>".$i."</a></li>";
                 }
                 else
                 {
                     echo "<li><a href='".$self."?page_no=".$i."''>".$i."</a></li>";
                 }
                 
                 
             }
             
              if($current_page!= $total_no_pages)
             {
                 $next=$current_page+1;
               	echo "<li><a href='".$self."?page_no=".$next."'>Siguiente</a></li>";
                echo "<li><a href='".$self."?page_no=".$total_no_pages."'>Ultima</a></li>";
             }
             
             ?>

            </ul>
            
         <?php   
        }
    }
	
	
	public	function calcula_edad($fecha1){
		$fecha = time() - strtotime($fecha1);
		$edad = floor((($fecha / 3600) / 24) / 360);
		return $edad;
	}
	
	public function getUsuarioHc($id){
		echo "id".$id;
		
		$cu = wp_get_current_user();
		
		try{
			$stmt = $this->db->prepare("select usuario from ".SELF::BASEDATOS." where id=:id");
			$stmt->execute(array(":id" => $id));
			$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $usuario;
			
			/*if (strtoupper($usuario)== strtoupper($cu->id)){
				echo "true";
				return true;
			}else{ 
				echo "false";
				return false;
			}*/
		
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
		
	}
	
	

}
?>
