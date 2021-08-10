<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_plantilla"]))
  { 
//    $order_total_before_tax = 0;
//    $order_total_tax1 = 0;
//    $order_total_tax2 = 0;
//    $order_total_tax3 = 0;
//    $order_total_tax = 0;
//    $order_total_after_tax = 0;
          $statement = $connect->query("SELECT (max(idplantilla)+1)idplantilla from plantillas");
           $idplantilla = $statement->fetchColumn();
       $statement = $connect->prepare
        
      ("INSERT INTO plantillas
        (idplantilla,nombreplantilla)
        VALUES (:idplantilla,:nombreplantilla)
    ");
                
    $statement->execute(
      array(
           ':idplantilla'               =>  $idplantilla,
         ':nombreplantilla'               =>  trim($_POST["nombreplantilla"]),
          
         
      )
    );    
    for($count=0; $count<$_POST["total_item"]; $count++)
      {
//        $order_total_before_tax = $order_total_before_tax + floatval(trim($_POST["order_item_actual_amount"][$count]));
//
//        $order_total_tax1 = $order_total_tax1 + floatval(trim($_POST["order_item_tax1_amount"][$count]));
//
//        $order_total_tax2 = $order_total_tax2 + floatval(trim($_POST["order_item_tax2_amount"][$count]));
//
//        $order_total_tax3 = $order_total_tax3 + floatval(trim($_POST["order_item_tax3_amount"][$count]));
//
//        $order_total_after_tax = $order_total_after_tax + floatval(trim($_POST["order_item_final_amount"][$count]));

        $statement = $connect->prepare("
          INSERT INTO plantillasproductos
        (idplantilla,codigoproducto,idCentroDeProduccion,idCentroDeCosto,idmarca)
        VALUES (:idplantilla,:item_cod,:centroproduccion,:centrodecosto,:marca)
    
        ");

        $statement->execute(
          array(
            ':idplantilla'               =>  $idplantilla,
         ':item_cod'              =>  trim($_POST["item_cod"][$count]),
         
           ':centroproduccion'               =>  trim($_POST["centroproduccion"]),
           ':centrodecosto'               =>  trim($_POST["centrodecosto"]),
          ':marca'               =>  trim($_POST["marca"]),
          
          )
        );
      }
//      $order_total_tax = $order_total_tax1 + $order_total_tax2 + $order_total_tax3;
//
//      $statement = $connect->prepare("
//       UPDATE pedidocabecera
//        SET  
//        fecha = :fecha, 
//        vencimient = :vencimient, 
//       guardar = :guardar, 
//        combocodigoalmacenpedido = :combocodigoalmacenpedido, 
//        clietepedido= :clietepedido
//      
//        WHERE idPedidoCompra = :idPedidoCompra
//      ");
//   
//      $statement->execute(
//        array(
//         
//         
//          ':fecha'               =>  trim($_POST["fecha"]),
//           ':vencimient'               =>  trim($_POST["vencimient"]),
//           ':guardar'               =>  trim($_POST["guardar"]),
//           ':combocodigoalmacenpedido'               =>  trim($_POST["combocodigoalmacenpedido"]),
//          ':clientepedido'               =>  trim($_POST["clientepedido"]),
//           ':idPedidoCompra'               =>  $idPedidoCompra
//        )
//      );
//      
      header("location:MantenerPlantillaDeProductos.php");
//      header("location: sales.php?id=$w&invoice=$a");
//      registrar.php?update=1&idPedidoCompra
  
  }
if(isset($_POST["updatef"]))
      
  {
        $idplantilla = $_POST["idplantilla"];
        
       $statement = $connect->prepare("
                DELETE FROM plantillasproductos WHERE idplantilla = :idplantilla
            ");
            $statement->execute(
                array(
                    ':idplantilla'       =>      $idplantilla
                )
            );
  
            
    for($count=0; $count<$_POST["total_item"]; $count++)
      {
      
      $statement = $connect->prepare("
          INSERT INTO plantillasproductos
        (idplantilla,codigoproducto,idCentroDeProduccion,idCentroDeCosto,idmarca)
        VALUES (:idplantilla,:item_cod, :centroproduccion,:centrodecosto,:marca)
    
        ");

        $statement->execute(
          array(
            ':idplantilla'               =>  $idplantilla,
         ':item_cod'              =>  trim($_POST["item_cod"][$count]),
           ':centroproduccion'               =>  trim($_POST["centroproduccion"]),
           ':centrodecosto'               =>  trim($_POST["centrodecosto"]),
           ':marca'               =>  trim($_POST["marca"]),
         
       
          )
        );   
     }
      $statement = $connect->prepare("   
 UPDATE plantillas
        SET
   
       nombreplantilla =:nombreplantilla
         
        WHERE idplantilla = :idplantilla 
      ");
      
      $statement->execute(
        array(
     
         
          ':nombreplantilla'             =>  trim($_POST["nombreplantilla"]),
        
             ':idplantilla'               =>  $idplantilla,
         
        
        )
      );
   
 
      
      
//      $result = $statement->fetchAll();
            
    header("location:MantenerPlantilla.php");
  
  
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("select * from plantillasv");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Eliminar</th>
      <th width="0%">Editar</th>
    
                       <td>IdPlantilla</td>
                        <td>Plantilla</td>
                       <td>Producto</td>
                       <td>Codigo-Producto</td>
                       <td>CentrodeProduccion</td>  
                       <td>CentrodeCostos</td>
                      <td>Marca</td> 
                      
                      
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
    <td><button type="button" id="'.$row["idplantilla"].'" class="btn btn-danger btn-xs delete">Eliminar</button></td>
      <td><a href="EditarPlantilla.php?updatep=1&idplantilla='.$row["idplantilla"].'"><span class="btn btn-warning btn-xs update">Editar</span></a></td>
    <td>'.$row["idplantilla"].'</td>
     <td>'.$row["nombreplantilla"].'</td>
    <td>'.$row["producto"].'</td>    
     <td>'.$row["codigoproducto"].'</td>
     <td>'.$row["centrodeproduccion"].'</td>
      <td>'.$row["nombrecentro"].'</td>
      <td>'.$row["marca"].'</td>
        
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
 if($_POST["action"] == "Delete")
 {
 $statement = $connect->prepare(
   "DELETE FROM plantillasproductos WHERE idplantilla = :id"
  );
  $result = $statement->execute(
   array(
    ':id' => $_POST["id"]
   )
  );
  $statement = $connect->prepare(
   "DELETE FROM plantillas WHERE idplantilla = :id"
  );
  $result = $statement->execute(
   array(
    ':id' => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Deleted';
  }
 }
 
 }

?>
 