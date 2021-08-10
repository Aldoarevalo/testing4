<?php

{
 include('../../database_connection.php');

 $output = '';

 if($_POST["action"] == 'formula')
 {
  $query = "
SELECT codigoproducto FROM productos
  WHERE producto = :formula 
  GROUP BY codigoproducto
 
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':formula'  => $_POST["query"]
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
  }
  
 $output1 = '';
 if($_POST["action"] == 'formula')
 {
  $query2 = "
  SELECT producto FROM productos
  WHERE producto = :formula 
  GROUP BY codigoproducto
  ";
  $statement = $connect->prepare($query2);
  $statement->execute(
   array(
    ':formula'  => $_POST["query2"]
   )
  );
  $result2 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result2 as $row)
  {
   $output1 .= '<option value="'.$row["producto"].'">'.$row["producto"].'</option>';
    
  }
  echo $output1;
 }
 
?>
