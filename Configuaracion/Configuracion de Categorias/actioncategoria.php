<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["grabarcategoria"]))
  { 

          $statement = $connect->query("SELECT (max(idcategoria)+1)idcategoria from categoriadeproductos");
            $idcategoria = $statement->fetchColumn(); 
           
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO categoriadeproductos
        (idcategoria,nombrecategoria,codigosubrubro)
        VALUES (:idcategoria,:nombrecategoria,:combosubrubros)
    ");
                
    $statement->execute(
      array(
           ':idcategoria'               =>  $idcategoria,
          ':nombrecategoria'               =>  trim($_POST["nombrecategoria"]),
           ':combosubrubros'               =>  trim($_POST["combosubrubros"]),
         
         
      )
    );


   
      header("location:VistaCategoria.php?categoria=$idcategoria");
}
 
   if(isset($_POST["updatecategoria"]))
  {

      
      $idcategoria = $_POST["idcategoria"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE categoriadeproductos 
        SET nombrecategoria = :txtnombre,
          codigosubrubro = :combosubrubros
       
        WHERE idcategoria = :idcategoria
      ");
      
      $statement->execute(
        array(
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
           ':combosubrubros'               =>  trim($_POST["combosubrubros"]),
         
        
         
          ':idcategoria'               =>  $idcategoria
        )
      );
      
      
    
            
    header("location:VistaCategoria.php?categoria=$idcategoria");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $idcategoria = $_POST["idcategoria"];
    
      $statement = $connect->prepare("   
  delete from categoriadeproductos  WHERE idcategoria = :idcategoria
      ");
      
      $statement->execute(
        array(
         
          ':idcategoria'               =>  $idcategoria
        )
      );
      
      
    
    header("location:VistaCategoria.php?categoria=$idcategoria ");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * from categoriadeproductos order by idcategoria ASC
  
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>IdCategoria</td>
     <td>Categoria</td>
     <td>Usuario</td>
                       
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaCategoria.php?categoria='.$row["idcategoria"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["idcategoria"].'</td>
     <td> '.$row["nombrecategoria"].' </td>
     <td> '.$row["usuario"].' </td>    
     
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
 