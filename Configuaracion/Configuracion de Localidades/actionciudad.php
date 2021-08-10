<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crearciudad"]))
  { 

          $statement = $connect->query("SELECT (max(codigociudad)+1)codigociudad from ciudad");
            $codigociudad = $statement->fetchColumn(); 
          
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO ciudad
        (codigociudad,descripcion,codigopais)
        VALUES (:codigociudad,:txtNombreciudad,:combopais)
    ");
                
    $statement->execute(
      array(
           ':codigociudad'               =>  $codigociudad,
          ':txtNombreciudad'               =>  trim($_POST["txtNombreciudad"]),
           ':combopais'               =>  trim($_POST["combopais"]),
         
         
      )
    );

	?>
		
	
<?php
			
header("location:VistaCiudad.php?ciudad=$codigociudad");
}
 
   if(isset($_POST["editarciudad"]))
  {
  
      
      $codigociudad = $_POST["codigociudad"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE ciudad 
        SET descripcion = :txtNombreciudad,
            codigopais =:combopais
         
       
        WHERE codigociudad = :codigociudad
      ");
      
      $statement->execute(
        array(
          ':txtNombreciudad'               =>  trim($_POST["txtNombreciudad"]),
           ':combopais'               =>  trim($_POST["combopais"]),
         
        
         
          ':codigociudad'               =>  $codigociudad
        )
      );
      
      
    
            
    header("location:VistaCiudad.php?ciudad=$codigociudad");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $codigociudad = $_POST["codigociudad"];
    
      $statement = $connect->prepare("   
  delete from ciudad  WHERE codigociudad = :codigociudad
      ");
      
      $statement->execute(
        array(
         
          ':codigociudad'               =>  $codigociudad
        )
      );
      
      
    
     header("location:VistaCiudad.php?ciudad=$codigociudad");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT c.codigociudad,c.descripcion,p.descripcion AS pais FROM ciudad c,pais p
WHERE c.codigopais=p.codigopais
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
      <td>Codigo</td>
        <td>Ciudad</td>
        <td>Pais</td>
                    
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaCiudad.php?ciudad='.$row["codigociudad"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["codigociudad"].'</td> 
     <td>'.$row["descripcion"].'</td>
    <td>'.$row["pais"].'</td>
    
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
 