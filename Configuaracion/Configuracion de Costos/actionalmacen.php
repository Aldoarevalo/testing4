<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crearalmacen"]))
  { 

          $statement = $connect->query("SELECT (max(codigoalmacen)+1)codigoalmacen from almacen");
            $codigoalmacen = $statement->fetchColumn(); 
          
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO almacen
        (codigoalmacen,almacen,Idsucursal)
        VALUES (:codigoalmacen,:txtNombrealmacen,:combosucursal)
    ");
                
    $statement->execute(
      array(
           ':codigoalmacen'               =>  $codigoalmacen,
          ':txtNombrealmacen'               =>  trim($_POST["txtNombrealmacen"]),
           ':combosucursal'               =>  trim($_POST["combosucursal"]),
         
         
      )
    );

	?>
		
	
<?php
			
header("location:VistaAlmalcen.php?almacen=$codigoalmacen");
}
 
   if(isset($_POST["updatealmacen"]))
  {
 
      
      $codigoalmacen = $_POST["codigoalmacen"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE almacen 
        SET almacen = :txtnombre,
        Idsucursal = :combosuc
         
       
        WHERE codigoalmacen = :codigoalmacen
      ");
      
      $statement->execute(
        array(
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
           ':combosuc'               =>  trim($_POST["combosuc"]),
         
        
         
          ':codigoalmacen'               =>  $codigoalmacen
        )
      );
      
      
//      $result = $statement->fetchAll();
            
 header("location:VistaAlmalcen.php?almacen=$codigoalmacen");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $codigoalmacen = $_POST["codigoalmacen"];
    
      $statement = $connect->prepare("   
  delete from almacen  WHERE codigoalmacen = :codigoalmacen
      ");
      
      $statement->execute(
        array(
         
          ':codigoalmacen'               =>  $codigoalmacen
        )
      );
      
      
     
            
                
 header("location:VistaAlmalcen.php?almacen=$codigoalmacen");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT a.codigoalmacen,a.almacen,s.nombre FROM almacen a,sucursal s
WHERE a.Idsucursal=s.Idsucursal
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>Codigo</td>
     <td>Almacen</td>
     <td>Sucursal</td>
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaAlmalcen.php?almacen='.$row["codigoalmacen"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["codigoalmacen"].'</td>
     <td> '.$row["almacen"].' </td>
     <td> '.$row["nombre"].' </td>    
     
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
 