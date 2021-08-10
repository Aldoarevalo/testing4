<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crearcentroproduccion"]))
  { 

          $statement = $connect->query("SELECT (max(idCentroDeProduccion)+1)idCentroDeProduccion from centrodeproduccion");
            $idCentroDeProduccion  = $statement->fetchColumn(); 
          
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO centrodeproduccion
        (idCentroDeProduccion,centrodeproduccion)
        VALUES (:idCentroDeProduccion,:txtNombrecentrop)
    ");
                
    $statement->execute(
      array(
           ':idCentroDeProduccion'               =>  $idCentroDeProduccion ,
          ':txtNombrecentrop'               =>  trim($_POST["txtNombrecentrop"]),
         
         
         
      )
    );

	?>
		
	
<?php
			
header("location:VistaCentroProduccion.php?centroproduccion=$idCentroDeProduccion ");
}
 
   if(isset($_POST["updatec"]))
  {

      
      $idCentroDeProduccion  = $_POST["idCentroDeProduccion"];
    
      $statement = $connect->prepare("   
  UPDATE centrodeproduccion 
        SET centrodeproduccion  = :txtnombre
        WHERE idCentroDeProduccion = :idCentroDeProduccion
      ");
      
      $statement->execute(
        array(
             ':idCentroDeProduccion'               =>  $idCentroDeProduccion,
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
          
         
        
         
         
        )
      );
      
      
//      $result = $statement->fetchAll();
            
 header("location:VistaCentroProduccion.php?centroproduccion=$idCentroDeProduccion ");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $idCentroDeProduccion = $_POST["idCentroDeProduccion"];
    
      $statement = $connect->prepare("   
  delete from centrodeproduccion  WHERE idCentroDeProduccion = :idCentroDeProduccion
      ");
      
      $statement->execute(
        array(
         
          ':idCentroDeProduccion'               =>  $idCentroDeProduccion
        )
      );
      
      
   
            
    header("location:VistaCentroProduccion.php?centroproduccion=$idCentroDeProduccion ");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * from centrodeproduccion

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
                       
                        
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaCentroProduccion.php?centroproduccion='.$row["idCentroDeProduccion"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["idCentroDeProduccion"].'</td> 
    <td>'.$row["centrodeproduccion"].'</td> 
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
 