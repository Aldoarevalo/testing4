<?php

{
 include('database_connection.php');

 $output = '';

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
 }
 
  echo $output;
  }
?>
