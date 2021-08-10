<?php

{
 include('../../database_connection.php');

 $output = '';

 if($_POST["action"] == 'centrodeproduccion')
 {
  $query = "
SELECT * FROM subrubros
  WHERE codigorubro = :centrodeprduccion 
  GROUP BY subrubro
 
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':centrodeprduccion'  => $_POST["query"]
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
 if($_POST["action"] == 'cboestado')
 {
  $query2 = "
  SELECT * FROM categoriadeproductos
  WHERE codigosubrubro = :cboestado 
  GROUP BY nombrecategoria
  ";
  $statement = $connect->prepare($query2);
  $statement->execute(
   array(
    ':cboestado'  => $_POST["query2"]
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
