<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crearum"]))
  { 

          $statement = $connect->query("SELECT (max(idunidaddemedida)+1)idunidaddemedida from unidaddemedida");
            $idunidaddemedida = $statement->fetchColumn(); 
          
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO unidaddemedida
        (idunidaddemedida,codigo,nombres,cantidad,umstandart)
        VALUES (:idunidaddemedida,:combonombre,:combonombre,:txtcant,:comboum)
    ");
                
    $statement->execute(
      array(
           ':idunidaddemedida'               =>  $idunidaddemedida,
         ':combonombre'               =>  trim($_POST["combonombre"]),
           ':combonombre'               =>  trim($_POST["combonombre"]),
         ':txtcant'               =>  trim($_POST["txtcant"]),
           ':comboum'               =>  trim($_POST["comboum"]),
         
      )
    );

	?>
		
	
<?php
			
header("location:VistaUnidadDeMedida.php?um=$idunidaddemedida");
}
 
   if(isset($_POST["editarum"]))
  {
  
      
      $idunidaddemedida = $_POST["idunidaddemedida"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE unidaddemedida
        SET codigo = :combonombre,
          nombres = :combonombre,
         cantidad =:txtcant,
         umstandart =:comboum
        WHERE idunidaddemedida = :idunidaddemedida
      ");
      
      $statement->execute(
        array(
          ':combonombre'               =>  trim($_POST["combonombre"]),
           ':combonombre'               =>  trim($_POST["combonombre"]),
         ':txtcant'               =>  trim($_POST["txtcant"]),
           ':comboum'               =>  trim($_POST["comboum"]),
        
         
          ':idunidaddemedida'               =>  $idunidaddemedida
        )
      );
      
      
     
            
    header("location:VistaUnidadDeMedida.php?um=$idunidaddemedida");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $idunidaddemedida = $_POST["idunidaddemedida"];
    
      $statement = $connect->prepare("   
  delete from unidaddemedida  WHERE idunidaddemedida = :idunidaddemedida
      ");
      
      $statement->execute(
        array(
         
          ':idunidaddemedida'               =>  $idunidaddemedida
        )
      );
      
      
     
            
    header("location:VistaUnidadDeMedida.php?um=$idunidaddemedida");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * from unidaddemedida
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
      <td>Id</td>
                       <td>Codigo</td>
                       <td>Nombres</td>
                       <td>cantidad</td>
                        <td>umstandart </td>
                     
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaUnidadDeMedida.php?um='.$row["idunidaddemedida"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["idunidaddemedida"].'</td> 
     <td>'.$row["codigo"].'</td>
     <td> '.$row["nombres"].' </td>
     <td> '.$row["cantidad"].' </td>    
     <td> '.$row["umstandart"].' </td>
  
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
 