<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["grabarimpuesto"]))
  { 

          $statement = $connect->query("SELECT (max(idimpuesto)+1)idimpuesto from impuestos");
           $idimpuesto = $statement->fetchColumn(); 
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO impuestos
        (idimpuesto,nombre,tasa,aplicarventas,aplicarcompras)
        VALUES (:idimpuesto,:txtnombre,:txttasa,:txtaplicarventas,:txtaplicarcompras)
    ");
                
    $statement->execute(
      array(
           ':idimpuesto'               =>  $idimpuesto,
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
          ':txttasa'               =>  trim($_POST["txttasa"]),
           ':txtaplicarventas'               =>  trim($_POST["txtaplicarventas"]),
           ':txtaplicarcompras'               =>  trim($_POST["txtaplicarcompras"]),
         
      )
    );


   
      header("location:VistaImpuesto.php?impuesto=$idimpuesto");
}
 
   if(isset($_POST["updateimpuesto"]))
  {

      
      $idimpuesto = $_POST["idimpuesto"];
    
      $statement = $connect->prepare("   
  UPDATE impuestos 
        SET nombre = :txtnombre, 
       tasa = :txttasa,
       aplicarventas=:txtaplicarventas,
       aplicarcompras=:txtaplicarcompras
       
        WHERE idimpuesto = :idimpuesto
      ");
      
      $statement->execute(
        array(
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
          ':txttasa'             =>  trim($_POST["txttasa"]),
           ':txtaplicarventas'             =>  trim($_POST["txtaplicarventas"]),
           ':txtaplicarcompras'             =>  trim($_POST["txtaplicarcompras"]),
         
        
         
          ':idimpuesto'               =>  $idimpuesto
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaImpuesto.php?impuesto=$idimpuesto");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $idimpuesto = $_POST["idimpuesto"];
    
      $statement = $connect->prepare("   
  delete from impuestos  WHERE idimpuesto = :idimpuesto
      ");
      
      $statement->execute(
        array(
         
          ':idimpuesto'               =>  $idimpuesto 
        )
      );
      
      
      
            
    header("location:VistaImpuesto.php?impuesto=$idimpuesto ");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("select * from impuestos
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>Id</td>
                       <td>Nombre</td>
                       <td>Tasa</td>
                       <td>Aplicar a Ventas</td>
                       <td>Aplicar a Compras</td>
                       <td>Empresa</td>  
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaImpuesto.php?impuesto='.$row["idimpuesto"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["idimpuesto"].'</td>
     <td>IVA '.$row["nombre"].' </td>
     <td>'.$row["tasa"].'%</td>
      <td>'.$row["aplicarventas"].'</td>
      <td>'.$row["aplicarcompras"].'</td>
      <td>'.$row["empresa"].'</td> 
         
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
 