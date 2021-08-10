<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crearcentrocosto"]))
  { 

          $statement = $connect->query("SELECT (max(idCentroDeCosto)+1)idCentroDeCosto from centrodecostos");
            $idCentroDeCosto = $statement->fetchColumn(); 
          
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO centrodecostos
        (idCentroDeCosto,nombrecentro,IdSucursal)
        VALUES (:idCentroDeCosto,:txtNombrecentro,:combosucursal)
    ");
                
    $statement->execute(
      array(
           ':idCentroDeCosto'               =>  $idCentroDeCosto,
          ':txtNombrecentro'               =>  trim($_POST["txtNombrecentro"]),
           ':combosucursal'               =>  trim($_POST["combosucursal"]),
         
         
      )
    );

	?>
		
	
<?php
			
header("location:VistaCentroDeCosto.php?centrodecosto=$idCentroDeCosto");
}
 
   if(isset($_POST["updateccosto"]))
  {
 
      
      $idCentroDeCosto = $_POST["idCentroDeCosto"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE centrodecostos 
        SET nombrecentro = :txtnombrecentro,
          Idsucursal = :combosuc
       
        WHERE idCentroDeCosto = :idCentroDeCosto
      ");
      
      $statement->execute(
        array(
          ':txtnombrecentro'               =>  trim($_POST["txtnombrecentro"]),
           ':combosuc'               =>  trim($_POST["combosuc"]),
         
        
         
          ':idCentroDeCosto'               =>  $idCentroDeCosto
        )
      );
      
      
//      $result = $statement->fetchAll();
            
   header("location:VistaCentroDeCosto.php?centrodecosto=$idCentroDeCosto");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $idCentroDeCosto = $_POST["idCentroDeCosto"];
    
      $statement = $connect->prepare("   
  delete from centrodecostos  WHERE idCentroDeCosto = :idCentroDeCosto 
      ");
      
      $statement->execute(
        array(
         
          ':idCentroDeCosto'               =>  $idCentroDeCosto 
        )
      );
      
      
      
            
      header("location:VistaCentroDeCosto.php?centrodecosto=$idCentroDeCosto");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT c.IdCentroDeCosto,c.nombrecentro,s.nombre,u.usuario,c.fecharegistro,c.ultimamodificacion
 FROM centrodecostos c,usuario u,sucursal s WHERE c.Idsucursal=s.Idsucursal AND u.idusuario=c.idusuario
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
      <td>Id</td>
                       <td>Nombre</td>
                       <td>Sucursal</td>
                       <td>Usuario</td>
                        <td>Registro</td>
                       <td>Última Modificación</td>
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaCentroDeCosto.php?centrodecosto='.$row["IdCentroDeCosto"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["IdCentroDeCosto"].'</td> 
     <td>'.$row["nombrecentro"].'</td>
     <td> '.$row["nombre"].' </td>
     <td> '.$row["usuario"].' </td>    
     <td> '.$row["fecharegistro"].' </td>
     <td> '.$row["ultimamodificacion"].' </td>
    </tr>
    ';
   }
  }
  else
  {
   $output .= '
    <tr>
     <td align="center">Data not Found</td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }
 }

?>
 