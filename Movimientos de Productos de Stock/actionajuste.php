<?php
//Database connection by using PHP PDO

  include('../database_connection.php');
  if(isset($_POST["crear_pedido"]))
  { 
//    $order_total_before_tax = 0;
//    $order_total_tax1 = 0;
//    $order_total_tax2 = 0;
//    $order_total_tax3 = 0;
//    $order_total_tax = 0;
//    $order_total_after_tax = 0;
          $statement = $connect->query("SELECT (max(idAjuste)+1)idAjuste from ajustecabecera");

           $idAjuste = $statement->fetchColumn();
    $statement = $connect->prepare("
      INSERT INTO ajustecabecera
        (idAjuste,Fecha,Notas,idcategoria,codigoalmacen,Idsucursal)
        VALUES (:idAjuste,:fecha,:guardar,:categoria,:cboempresaordenor,:suc)
    ");
//     $query = "CALL insertUser('".$first_name."', '".$last_name."')";  
//                     $statement = $connect->query($connect, $query);  
//                     echo 'Data Inserted';  
    $statement->execute(
      array(
           ':idAjuste'               =>  $idAjuste,
          ':fecha'               =>  trim($_POST["fecha"]),
           ':guardar'               =>  trim($_POST["guardar"]),
           ':categoria'               =>  trim($_POST["categoria"]),
           ':cboempresaordenor'               =>  trim($_POST["cboempresaordenor"]),
           ':suc'               =>  trim($_POST["suc"]),
          
      )
    );

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
          INSERT INTO ajustedetalle 
          (idAjuste,codigoproducto,Esperada,deportada,Faltante,Sobrante,codigoalmacen)
          VALUES (:idAjuste,:item_cod,:order_item_quantity,:order_item_price,:order_item_actual_amount,:order_item_actual_amount1,:cboempresaordenor)
        ");

        $statement->execute(
          array(
            ':idAjuste'               =>  $idAjuste,
            ':item_cod'              =>  trim($_POST["item_cod"][$count]),
            ':order_item_quantity'           =>  trim($_POST["order_item_quantity"][$count]),
            ':order_item_price'          =>  trim($_POST["order_item_price"][$count]),
             ':order_item_actual_amount'           =>  trim($_POST["order_item_actual_amount"][$count]),
              ':order_item_actual_amount1'           =>  trim($_POST["order_item_actual_amount1"][$count]),
               ':cboempresaordenor'               =>  trim($_POST["cboempresaordenor"]),
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
      header("location:VistaAjuste.php?idAjuste=$idAjuste");
//      header("location: sales.php?id=$w&invoice=$a");
//      registrar.php?update=1&idPedidoCompra
  

}
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * FROM productos ORDER BY nombre DESC");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
     <th width="0%">ID</th>
     <td>Codigo</td>
                       <td>Nombre</td>
                       <td>Linea</td>
                       <td>Rubros</td>
                       <td>Sub-Rubros</td>
                       <td>Categoria</td>  
                       <td>Precio</td>
                       <td>Impuesto</td>
                       <td>Unidad-De-Medida</td>  
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="../../registrar.php?update=1&codigoproducto='.$row["codigoproducto"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["codigoproducto"].'</td>
     <td>'.$row["nombre"].'</td>
     <td>'.$row["precio"].'</td>
    
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
 