<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_lista"]))
  { 
//    $order_total_before_tax = 0;
//    $order_total_tax1 = 0;
//    $order_total_tax2 = 0;
//    $order_total_tax3 = 0;
//    $order_total_tax = 0;
//    $order_total_after_tax = 0;
          $statement = $connect->query("SELECT (max(idListado)+1)idListado from listadodepreciosdeproductos");
           $idplantilla = $statement->fetchColumn();
//    $statement = $connect->prepare("
//      INSERT INTO formulas 
//        (idFormulas,codigoproducto,codigo,codigosubrubro,codigorubro,idcategoria,idunidaddemedida,Nombre,Formula,Composicion,Cantidadresultante)
//        VALUES (:idFormulas,:item_cod, :codigo1,:subrubro,:rubro,:categoria,:um,:formula,:order_item_um,:order_item_final_amount,:order_item_price)
//    ");
//     $query = "CALL insertUser('".$first_name."', '".$last_name."')";  
//                     $statement = $connect->query($connect, $query);  
//                     echo 'Data Inserted';  
//    $statement->execute(
//      array(
//           ':idFormulas'               =>  $idPedidoCompra,
//          ':item_cod'               =>  trim($_POST["item_cod"]),
//           ':codigo1'               =>  trim($_POST["codigo1"]),
//           ':subrubro'               =>  trim($_POST["subrubro"]),
//           ':rubro'               =>  trim($_POST["rubro"]),
//          ':categoria'               =>  trim($_POST["categoria"]),
//          ':um'               =>  trim($_POST["um"]),
//           ':formula'               =>  trim($_POST["formula"]),
//          ':order_item_um'               =>  trim($_POST["order_item_um"]),
//      )
//    );

//      $statement = $connect->query("SELECT (max(id)+1)id from pedidodetalle");
//     $id = $statement->fetchColumn();

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
          INSERT INTO listadodepreciosdeproductos
        (idListado,codigoproducto,RucProveedor,precioporenvase,cantidadporenvase,unidaddemedida)
        VALUES (:idListado,:item_cod,:provee,:order_item_quantity,:order_item_price,:order_item_um)
    
        ");

        $statement->execute(
          array(
            ':idListado'               =>  $idplantilla,
         ':item_cod'              =>  trim($_POST["item_cod"][$count]),
           ':provee'               =>  trim($_POST["provee"]),
           ':order_item_quantity'               =>  trim($_POST["order_item_quantity"][$count]),
           ':order_item_price'               =>  trim($_POST["order_item_price"][$count]),    
          ':order_item_um'               =>  trim($_POST["order_item_um"][$count]),
          
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
      header("location:MantenerListadoDePrecioDeProveedor.php");
//      header("location: sales.php?id=$w&invoice=$a");
//      registrar.php?update=1&idPedidoCompra
  
  }
 if(isset($_POST["updatef"]))
      
  {
        $idListado = $_POST["idListado"];
        
       $statement = $connect->prepare("
                DELETE FROM listadodepreciosdeproductos WHERE idListado = :idListado
            ");
            $statement->execute(
                array(
                    ':idListado'       =>      $idListado
                )
            );
  
            
    for($count=0; $count<$_POST["total_item"]; $count++)
      {
      
      $statement = $connect->prepare("
          INSERT INTO listadodepreciosdeproductos
        (idListado,codigoproducto,RucProveedor,precioporenvase,cantidadporenvase,unidaddemedida)
        VALUES (:idListado,:item_cod,:provee,:order_item_quantity,:order_item_price,:order_item_um)
    
        ");

        $statement->execute(
          array(
            ':idListado'               =>  $idListado,
         ':item_cod'              =>  trim($_POST["item_cod"][$count]),
           ':provee'               =>  trim($_POST["provee"]),
           ':order_item_quantity'               =>  trim($_POST["order_item_quantity"][$count]),
           ':order_item_price'               =>  trim($_POST["order_item_price"][$count]),
            ':order_item_um'               =>  trim($_POST["order_item_um"][$count]),
       
          )
        );   
     }
  
    header("location:MantenerListadoDePrecioDeProveedor.php");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("select * from listados");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Eliminar</th>
      <th width="0%">Editar</th>
    
                       <td>IdListado</td>
                        <td>CodigoProducto</td>
                       <td>Producto</td>
                       <td>Precio Por Envase</td>
                       <td>Cantidad Por Envase</td>
                       <td>Unidad de Medida</td>
                       <td>Proveedor</td>
                       <td>Ruc-Proveedor</td>  
                      
                       
                      
                      
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><button type="button" id="'.$row["idListado"].'" class="btn btn-danger btn-xs delete">Eliminar</button></td>
     <td><a href="EditarListado.php?updatep=1&idListado='.$row["idListado"].'"><span class="btn btn-warning btn-xs update">Editar</span></a></td>
   <td>'.$row["idListado"].'</td>
   <td>'.$row["codigoproducto"].'</td>
     <td>'.$row["producto"].'</td>
    <td>'.$row["precioporenvase"].'</td>    
     <td>'.$row["cantidadporenvase"].'</td>
     <td>'.$row["unidaddemedida"].'</td>
      <td>'.$row["nombreprov"].'</td>
       <td>'.$row["RucProveedor"].'</td>
        
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
   "DELETE FROM listadodepreciosdeproductos WHERE idListado = :id"
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
 