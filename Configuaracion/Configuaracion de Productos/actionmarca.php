<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["grabarmarca"]))
  { 

          $statement = $connect->query("SELECT (max(idmarca)+1)idmarca from marca");
           $idmarca = $statement->fetchColumn(); 
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO marca
        (idmarca,nombre)
        VALUES (:idmarca,:txtnombremarca)
    ");
                
    $statement->execute(
      array(
           ':idmarca'               =>  $idmarca,
          ':txtnombremarca'               =>  trim($_POST["txtnombremarca"]),
         
         
      )
    );


   
      header("location:VistaMarca.php?marca=$idmarca");
}
 
   if(isset($_POST["updatemarca"]))
  {

      
      $idmarca = $_POST["idmarca"];
    
      $statement = $connect->prepare("   
  UPDATE marca 
        SET nombre = :txtnombre
      
       
        WHERE idmarca = :idmarca
      ");
      
      $statement->execute(
        array(
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
          
         
        
         
          ':idmarca'               =>  $idmarca
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaMarca.php?marca=$idmarca");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $idmarca = $_POST["idmarca"];
    
      $statement = $connect->prepare("   
  delete from marca  WHERE idmarca = :idmarca
      ");
      
      $statement->execute(
        array(
         
          ':idmarca'               =>  $idmarca
        )
      );
      
      
     
    header("location:VistaMarca.php?marca=$idmarca ");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("select * from marca
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
     <td><a href="VistaMarca.php?marca='.$row["idmarca"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["idmarca"].'</td>
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
 