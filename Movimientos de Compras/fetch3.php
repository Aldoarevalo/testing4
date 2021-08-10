<?php

{
 include('../database_connection.php');

 $output = '';

 if($_POST["action"] == 'factura')
 {
  $query = "
SELECT * FROM compracabecera
  WHERE nrcomprobante = :factura
  GROUP BY id_compra
 
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':factura'  => $_POST["query"]
   )
  );
  $result = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result as $row)
  {
   $output .= '<option value="'.$row["id_compra"].'">'.$row["id_compra"].'</option>';
    
  }
 }
 
  echo $output;
  }
  
// $output1 = '';
// if($_POST["action"] == 'combosub1')
// {
//  $query2 = "
//  SELECT * FROM categoriadeproductos
//  WHERE codigosubrubro = :combosub1 
//  GROUP BY nombrecategoria
//  ";
//  $statement = $connect->prepare($query2);
//  $statement->execute(
//   array(
//    ':combosub1'  => $_POST["query2"]
//   )
//  );
//  $result2 = $statement->fetchAll();
////  $output .= '<option value="">Select State</option>';
//  foreach($result2 as $row)
//  {
//   $output1 .= '<option value="'.$row["idcategoria"].'">'.$row["nombrecategoria"].'</option>';
//    
//  }
//  echo $output1;
// }
 
?>
