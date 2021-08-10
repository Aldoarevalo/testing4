<?php
//fetch.php

if(isset($_POST['action']))
{
 include('database_connection.php');

 $output = '';

 if($_POST["action"] == 'producto')
 {
  $query = "
  SELECT codigoproducto FROM productos
  WHERE producto = :producto 
  GROUP BY codigoproducto
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':producto'  => $_POST["query"]
   )
  );
  $result = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result as $row)
  {
   $output .= '<option value="'.$row["codigoproducto"].'">'.$row["codigoproducto"].'</option>';
    
  }
 }
 
  echo $output;
 $output1 = '';
 if($_POST["action"] == 'producto')
 {
  $query1 = "
  SELECT precio FROM productos
  WHERE producto = :producto 
  GROUP BY codigoproducto
  ";
  $statement = $connect->prepare($query1);
  $statement->execute(
   array(
    ':producto'  => $_POST["query1"]
   )
  );
  $result1 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result1 as $row)
  {
   $output1 .= '<option value="'.$row["precio"].'">'.$row["precio"].'</option>';
    
  }
 }
 echo $output1;
  $output2 = '';
 if($_POST["action"] == 'producto')
 {
  $query2 = "
SELECT
  DISTINCT`u`.`nombres` AS `nombres`
   
FROM unidaddemedida u,productos p WHERE p.idunidaddemedida= u.idunidaddemedida AND p.producto=:producto
 
  GROUP BY nombres
  ";
  $statement = $connect->prepare($query2);
  $statement->execute(
   array(
    ':producto'  => $_POST["query2"]
   )
  );
  $result2 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result2 as $row)
  {
   $output2 .= '<option value="'.$row["nombres"].'">'.$row["nombres"].'</option>';
    
  }
 }
  echo $output2;
}
 $output4 = '';
 if($_POST["action"] == 'prov')
 {
  $query = "
  SELECT idPresupuesto FROM presupuestocabecera
  WHERE RucProveedor = :prov
  GROUP BY idPresupuesto
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':prov'  => $_POST["query"]
   )
  );
  $result = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result as $row)
  {
   $output .= '<option value="'.$row["idPresupuesto"].'">'.$row["idPresupuesto"].'</option>';
    
  }
    echo $output4;
 }
 
 $output5 = '';
 if($_POST["action"] == 'formula')
 {
  $query5 = "
 SELECT codigoproducto FROM productos
  WHERE producto = :formula 
  GROUP BY codigoproducto
  ";
  $statement = $connect->prepare($query5);
  $statement->execute(
   array(
    ':formula'  => $_POST["query"]
   )
  );
  $result5 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result5 as $row)
  {
   $output .= '<option value="'.$row["codigoproducto"].'">'.$row["codigoproducto"].'</option>';
    
  }
    echo $output5;
    $outputt = '';
 if($_POST["action"] == 'producto')
 {
  $querys = "
SELECT
  DISTINCT`u`.`idunidaddemedida` AS `id`
   
FROM unidaddemedida u,productos p WHERE p.idunidaddemedida= u.idunidaddemedida AND p.producto=:producto
 
  GROUP BY id
  ";
  $statement = $connect->prepare($querys);
  $statement->execute(
   array(
    ':producto'  => $_POST["querys"]
   )
  );
  $resultt = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($resultt as $row)
  {
   $outputt .= '<option value="'.$row["idunidaddemedida"].'">'.$row["idunidaddemedida"].'</option>';
    
  }
 }
  echo $outputt;
 }
 {
  $query4 = "
 SELECT
  DISTINCT`i`.`nombre` AS `impuesto`
   
FROM impuestos i,productos p WHERE p.idimpuesto= i.idimpuesto AND p.producto=:producto
 
  GROUP BY nombre
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
  echo $output4;
 }

?>

