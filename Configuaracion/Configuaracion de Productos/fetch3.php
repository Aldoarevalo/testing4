<?php

{
 include('../../database_connection.php');

 $output = '';

 if($_POST["action"] == 'comborub1')
 {
  $query = "
SELECT * FROM subrubros
  WHERE codigorubro = :comborub1
  GROUP BY subrubro
 
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':comborub1'  => $_POST["query"]
   )
  );
  $result = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result as $row)
  {
   $output .= '<option value="'.$row["codigosubrubro"].'">'.$row["subrubro"].'</option>';
    
  }
 }
 
  echo $output;
  }
  
 $output1 = '';
 if($_POST["action"] == 'combosub1')
 {
  $query2 = "
  SELECT * FROM categoriadeproductos
  WHERE codigosubrubro = :combosub1 
  GROUP BY nombrecategoria
  ";
  $statement = $connect->prepare($query2);
  $statement->execute(
   array(
    ':combosub1'  => $_POST["query2"]
   )
  );
  $result2 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result2 as $row)
  {
   $output1 .= '<option value="'.$row["idcategoria"].'">'.$row["nombrecategoria"].'</option>';
    
  }
  echo $output1;
 }
 
?>
