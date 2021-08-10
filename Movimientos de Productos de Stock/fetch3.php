<?php

{
 include('../database_connection.php');

 $output = '';

 if($_POST["action"] == 'cboempresaordenor')
 {
  $query = "
SELECT * FROM almacen
  WHERE codigoalmacen = :cboempresaordenor
  GROUP BY Idsucursal
 
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':cboempresaordenor'  => $_POST["query"]
   )
  );
  $result = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result as $row)
  {
   $output .= '<option value="'.$row["Idsucursal"].'">'.$row["Idsucursal"].'</option>';
    
  }
   echo $output;
 }
 
 
$output3 = '';
 if($_POST["action"] == 'producto')
 {
  $query3 = "
 SELECT idimpuesto FROM productos
  WHERE producto = :producto 
  GROUP BY codigoproducto
  ";
  $statement = $connect->prepare($query3);
  $statement->execute(
   array(
    ':producto'  => $_POST["query3"]
   )
  );
  $result3 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result3 as $row)
  {
   $output3 .= '<option value="'.$row["idimpuesto"].'">'.$row["idimpuesto"].'</option>';
    
  }
  echo $output3;
 }
  
 $output1 = '';
 if($_POST["action"] == 'aldo')
 {
  $query2 = "
  SELECT * FROM almacen
  WHERE codigoalmacen = :aldo
  GROUP BY Idsucursal
  ";
  $statement = $connect->prepare($query2);
  $statement->execute(
   array(
    ':aldo'  => $_POST["query2"]
   )
  );
  $result2 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result2 as $row)
  {
   $output1 .= '<option value="'.$row["Idsucursal"].'">'.$row["Idsucursal"].'</option>';
    
  }
  echo $output1;
 }
   }
?>
