<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crearbanco"]))
  { 

          $statement = $connect->query("SELECT (max(idcuentabanco)+1)idcuentabanco from bancos");
            $idcuentabanco = $statement->fetchColumn(); 
          
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO bancos
        (idcuentabanco,CuentaBanco,NumeroSipap)
        VALUES (:idcuentabanco,:txtbanco,:txtsipap)
    ");
                
    $statement->execute(
      array(
           ':idcuentabanco'               =>  $idcuentabanco,
          ':txtbanco'               =>  trim($_POST["txtbanco"]),
           ':txtsipap'               =>  trim($_POST["txtsipap"]),
         
         
      )
    );

	?>
		
	
<?php
			
header("location:VistaBanco.php?banco=$idcuentabanco");
}
 
   if(isset($_POST["updatebanco"]))
  {
 
      
      $idcuentabanco = $_POST["idcuentabanco"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE bancos 
        SET CuentaBanco = :txtbanco,
          NumeroSipap  = :txtsipap
       
        WHERE idcuentabanco = :idcuentabanco
      ");
      
      $statement->execute(
        array(
          ':txtbanco'               =>  trim($_POST["txtbanco"]),
           ':txtsipap'               =>  trim($_POST["txtsipap"]),
         
        
         
          ':idcuentabanco'               =>  $idcuentabanco
        )
      );
      
      
//      $result = $statement->fetchAll();
            
  header("location:VistaBanco.php?banco=$idcuentabanco");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $idcuentabanco = $_POST["idcuentabanco"];
    
      $statement = $connect->prepare("   
  delete from bancos  WHERE idcuentabanco = :idcuentabanco
      ");
      
      $statement->execute(
        array(
         
          ':idcuentabanco'               =>  $idcuentabanco
        )
      );
      
      
   
            
    header("location:VistaBanco.php?banco=$idcuentabanco");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * FROM bancos
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
      <td>Id</td>
                       <td>Cuenta-Banco</td>
                       <td>Número SIPAP</td>
                    
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
     <td><a href="VistaBanco.php?banco='.$row["idcuentabanco"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["idcuentabanco"].'</td> 
     <td>'.$row["CuentaBanco"].'</td>
     <td> '.$row["NumeroSipap"].' </td>
   

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
 