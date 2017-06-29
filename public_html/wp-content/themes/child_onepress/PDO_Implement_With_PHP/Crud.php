<?php



class Crud {

    private $db;
	CONST BASEDATOS =  "grn_historia_clinica";	

    public function __construct($db) {
        $this->db = $db;
    }
	
	public function getBaseDatos()
	{
		return SELF::BASEDATOS;		
	}

    public function create($legajo, $nombre, $apellido, $direccion,$ciudad,$telefono,$email,$fecha,$ant_personales,$ant_familiares,$diagnostico, $tratamiento) {
        try {            
            $stmt = $this->db->prepare("insert into " 
			. SELF::BASEDATOS ."(legajo,nombre,apellido,direccion,ciudad,telefono,email,fecha,ant_personales,ant_familiares,diagnostico,tratamiento) 
			values(:legajo,:nombre,:apellido,:direccion,:ciudad,:telefono,:email,:fecha,:ant_personales,:ant_familiares,:diagnostico,:tratamiento)");
            $stmt->bindparam(":legajo", $legajo);
			$stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":apellido", $apellido);
            $stmt->bindparam(":direccion", $direccion);
			$stmt->bindparam(":ciudad", $ciudad);
			$stmt->bindparam(":telefono", $telefono);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":fecha", $fecha);
			$stmt->bindparam(":ant_personales", $ant_personales);
			$stmt->bindparam(":ant_familiares", $ant_familiares);
			$stmt->bindparam(":diagnostico", $diagnostico);
			$stmt->bindparam(":tratamiento", $tratamiento);
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function delete($id) {
        $stmt = $this->db->prepare("Delete from " . SELF::BASEDATOS ." where id=:id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return true;
    }

    public function getID($id) {
        $stmt = $this->db->prepare("select * from ".SELF::BASEDATOS." where id=:id");
        $stmt->execute(array(":id" => $id));
        $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editrow;
    }

    public function update($id, $legajo,$nombre,$apellido,$direccion,$ciudad,$telefono,$email,$fecha,$ant_personales,$ant_familiares,$diagnostico,$tratamiento) {

        try {

            $stmt = $this->db->prepare("update ".SELF::BASEDATOS." set legajo=:legajo,nombre=:nombre,apellido=:apellido,direccion=:direccion,ciudad=:ciudad,telefono=:telefono,email=:email,fecha=:fecha,ant_personales=:ant_personales,ant_familiares=:ant_familiares,diagnostico=:diagnostico,tratamiento=:tratamiento where id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":legajo", $legajo);
            $stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":apellido", $apellido);
            $stmt->bindparam(":direccion", $direccion);
			$stmt->bindparam(":ciudad", $ciudad);
			$stmt->bindparam(":telefono", $telefono);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":fecha", $fecha);
			$stmt->bindparam(":ant_personales", $ant_personales);
			$stmt->bindparam(":ant_familiares", $ant_familiares);
			$stmt->bindparam(":diagnostico", $diagnostico);
			$stmt->bindparam(":tratamiento", $tratamiento);
            $stmt->execute();
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
                if (isset($row['legajo'])) {
                    print($row['legajo']);
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
					<td align="center"><a  href="modificarhistoriaclinica?id=<?php echo $row['id']; ?>"  data-toggle="tooltip" data-placement="top" title="Modificar" ><i class="glyphicon glyphicon-edit"></a></td>
                    <td align="center"><a href="borrarhistoriaclinica?id=<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                    <td align="center"><a href="visualhistoriaclinica?id=<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" title="Visualizar"><i class="glyphicon glyphicon-eye-open"></i></a></td>
                </tr>         

                <?php
            }
        } else {
            ?>
            <tr>
                <td  colspan="6">No hay registros...</td>
            </tr>
            <?php
        }
		
		?>
		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
		<?php
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

}
?>
