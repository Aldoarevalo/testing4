<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["grabarsubrubro"]))
  { 

          $statement = $connect->query("SELECT (max(codigosubrubro)+1)codigosubrubro from subrubros");
            $codigosubrubro = $statement->fetchColumn(); 
          
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO subrubros
        (codigosubrubro,subrubro,codigorubro)
        VALUES (:codigosubrubro,:txtnombre,:comborubros)
    ");
                
    $statement->execute(
      array(
           ':codigosubrubro'               =>  $codigosubrubro,
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
           ':comborubros'               =>  trim($_POST["comborubros"]),
         
         
      )
    );

	?>
		
	
<?php
			
header("location:VistaSubRubro.php?subrubro=$codigosubrubro");
}
 
   if(isset($_POST["updatesubrubro"]))
  {

      
      $codigosubrubro = $_POST["codigosubrubro"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE subrubros 
        SET subrubro = :txtnombre,
          codigorubro = :codigorubro
       
        WHERE codigosubrubro = :codigosubrubro
      ");
      
      $statement->execute(
        array(
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
           ':codigorubro'               =>  trim($_POST["combosubrubros"]),
         
        
         
          ':codigosubrubro'               =>  $codigosubrubro
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaSubRubro.php?subrubro=$codigosubrubro");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $codigosubrubro = $_POST["codigosubrubro"];
    
      $statement = $connect->prepare("   
  delete from subrubros  WHERE codigosubrubro = :codigosubrubro
      ");
      
      $statement->execute(
        array(
         
          ':codigosubrubro'               =>  $codigosubrubro
        )
      );
      
      
    
            
    header("location:VistaSubRubro.php?subrubro=$codigosubrubro ");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT sr.codigosubrubro,sr.subrubro,r.nombre FROM subrubros sr,rubros r
      WHERE sr.codigorubro=r.codigorubro
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>Codigo</td>
     <td>Nombre</td>
     <td>Rubro</td>
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaSubRubro.php?subrubro='.$row["codigosubrubro"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["codigosubrubro"].'</td>
     <td> '.$row["subrubro"].' </td>
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
 