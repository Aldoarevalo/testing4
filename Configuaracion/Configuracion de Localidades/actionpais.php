<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crearpais"]))
  { 

          $statement = $connect->query("SELECT (max(codigopais)+1)codigopais from pais");
            $codigopais = $statement->fetchColumn(); 
          
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO pais
        (codigopais,descripcion)
        VALUES (:codigopais,:txtNombrepais)
    ");
                
    $statement->execute(
      array(
           ':codigopais'               =>  $codigopais,
          ':txtNombrepais'               =>  trim($_POST["txtNombrepais"]),

         
         
      )
    );

	?>
		
	
<?php
			
header("location:VistaPais.php?pais=$codigopais");
}
 
   if(isset($_POST["editarpais"]))
  {
  
      
      $codigopais = $_POST["codigopais"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE pais 
        SET descripcion = :txtNombrepais
         
       
        WHERE codigopais = :codigopais
      ");
      
      $statement->execute(
        array(
          ':txtNombrepais'               =>  trim($_POST["txtNombrepais"]),
          
         
        
         
          ':codigopais'               =>  $codigopais
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaPais.php?pais=$codigopais");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $codigopais = $_POST["codigopais"];
    
      $statement = $connect->prepare("   
  delete from pais  WHERE codigopais = :codigopais
      ");
      
      $statement->execute(
        array(
         
          ':codigopais'               =>  $codigopais
        )
      );
      
      
    
     header("location:VistaPais.php?pais=$codigopais");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * from pais
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
      <td>Codigo</td>
                       <td>Pais</td>
                     
                    
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaPais.php?pais='.$row["codigopais"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["codigopais"].'</td> 
     <td>'.$row["descripcion"].'</td>
  
    
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
 