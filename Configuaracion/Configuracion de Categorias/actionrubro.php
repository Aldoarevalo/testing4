<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["grabarrubro"]))
  { 

          $statement = $connect->query("SELECT (max(codigorubro)+1)codigorubro from rubros");
           $codigorubro = $statement->fetchColumn(); 
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO rubros
        (codigorubro,nombre)
        VALUES (:codigorubro,:txtnombre)
    ");
                
    $statement->execute(
      array(
           ':codigorubro'               =>  $codigorubro,
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
         
         
      )
    );


   
      header("location:VistaRubro.php?rubro=$codigorubro");
}
 
   if(isset($_POST["updaterubro"]))
  {

      
      $codigorubro = $_POST["codigorubro"];
    
      $statement = $connect->prepare("   
  UPDATE rubros 
        SET nombre = :txtnombre 
      
       
        WHERE codigorubro = :codigorubro
      ");
      
      $statement->execute(
        array(
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
          
         
        
         
          ':codigorubro'               =>  $codigorubro
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaRubro.php?rubro=$codigorubro");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $codigorubro = $_POST["codigorubro"];
    
      $statement = $connect->prepare("   
  delete from rubros  WHERE codigorubro = :codigorubro
      ");
      
      $statement->execute(
        array(
         
          ':codigorubro'               =>  $codigorubro
        )
      );
      
      
     
            
    header("location:VistaRubro.php?rubro=$codigorubro ");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("select * from rubros
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
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaRubro.php?rubro='.$row["codigorubro"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["codigorubro"].'</td>
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
 