<?php
  //invoice.php  
  include('database_connection.php');

//  $statement = $connect->prepare("
//    SELECT * FROM tbl_order 
//    ORDER BY order_id DESC
//  ");
//
//  $statement->execute();
//
//  $all_result = $statement->fetchAll();
//
//  $total_rows = $statement->rowCount();

  if(isset($_POST["crear_orden"]))
  { 
//    $order_total_before_tax = 0;
//    $order_total_tax1 = 0;
//    $order_total_tax2 = 0;
//    $order_total_tax3 = 0;
//    $order_total_tax = 0;
//    $order_total_after_tax = 0;
          $statement = $connect->query("SELECT (max(idorden)+1)idorden from ordenproduccioncabecera");
           $idorden = $statement->fetchColumn();
    $statement = $connect->prepare("
      INSERT INTO ordenproduccioncabecera 
        (idorden,fechaelaboracion,fechaentrega,tipoproduccion,Ci_Cliente,Notas,idCentroDeProduccion,codigoalmacen,codigoempleado,idPresupuesto)
        VALUES (:idorden,:from,:to,:combotipodeproduccionordenp,:cliente,:guardar,:cbcentrodeproduccionorden,:comboorigen,:combopersonaacargo,:presp)
    ");
//     $query = "CALL insertUser('".$first_name."', '".$last_name."')";  
//                     $statement = $connect->query($connect, $query);  
//                     echo 'Data Inserted';  
    $statement->execute(
      array(
           ':idorden'               =>  $idorden,
          ':from'               =>  trim($_POST["from"]),
            ':to'               =>  trim($_POST["to"]),
           ':combotipodeproduccionordenp'               =>  trim($_POST["combotipodeproduccionordenp"]),
          ':cliente'               =>  trim($_POST["cliente"]),
          ':guardar'               =>  trim($_POST["guardar"]),
          ':cbcentrodeproduccionorden'               =>  trim($_POST["cbcentrodeproduccionorden"]),
          ':comboorigen'               =>  trim($_POST["comboorigen"]),
           ':combopersonaacargo'               =>  trim($_POST["combopersonaacargo"]),
           ':presp'               =>  trim($_POST["presp"]),
      )
    );
//
//                $statement = $connect->query("SELECT (codigoalmacen)as codigoalmacen  from almacen where codigoalmacen=1");

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
//$id = uniqid();
//           $statement = $connect->query("SELECT (codigoalmacen)as codigoalmacen  from almacen where codigoalmacen=:comboalmdestino");
//            $id = $statement->fetchColumn();
        $statement = $connect->prepare("
          INSERT INTO ordendeproducciondetalle
          (idorden,codigoproducto,cantidad,precio)
          VALUES (:idorden,:item_cod, :order_item_price,:order_item_quantity)
        ");

        $statement->execute(
          array(
            ':idorden'               =>  $idorden,
            ':item_cod'              =>  trim($_POST["item_cod"][$count]),
            ':order_item_price'          =>  trim($_POST["order_item_price"][$count]),
            ':order_item_quantity'           =>  trim($_POST["order_item_quantity"][$count]),
//               ':id'               =>  $id,
//               ':al'           =>  trim($_POST["al"][$count]),
          )
        );
                   
      }
     
//      $order_total_tax = $order_total_tax1 + $order_total_tax2 + $order_total_tax3;
//
      $statement = $connect->prepare("
       UPDATE ordendeproducciondetalle
        SET  
       codigoalmacen = :comboalmdestino, 
        idplantilla = :comboplantilla
      
        WHERE idorden = :idorden
      ");
   
      $statement->execute(
        array(
         
         
          ':comboalmdestino'               =>  trim($_POST["comboalmdestino"]),
            
           ':comboplantilla'               =>  trim($_POST["comboplantilla"]),
           ':idorden'               =>  $idorden
        )
      );
      
      header("location:vistaordenp.php?ordenp=$idorden");
//      header("location: sales.php?id=$w&invoice=$a");
//      registrar.php?update=1&idPedidoCompra
  }
  

  if(isset($_POST["update_invoice"]))
  {
//    $order_total_before_tax = 0;
//      $order_total_tax1 = 0;
//      $order_total_tax2 = 0;
//      $order_total_tax3 = 0;
//      $order_total_tax = 0;
//      $order_total_after_tax = 0;
      
      $idPedidoCompra = $_POST["idPedidoCompra"];
      
      
      
      $statement = $connect->prepare("
                DELETE FROM pedidodetalle WHERE idPedidoCompra = :idPedidoCompra
            ");
            $statement->execute(
                array(
                    ':idPedidoCompra'       =>      $idPedidoCompra
                )
            );
      
      for($count=0; $count<$_POST["total_item"]; $count++)
      {
//        $order_total_before_tax = $order_total_before_tax + floatval(trim($_POST["order_item_actual_amount"][$count]));
//        $order_total_tax1 = $order_total_tax1 + floatval(trim($_POST["order_item_tax1_amount"][$count]));
//        $order_total_tax2 = $order_total_tax2 + floatval(trim($_POST["order_item_tax2_amount"][$count]));
//        $order_total_tax3 = $order_total_tax3 + floatval(trim($_POST["order_item_tax3_amount"][$count]));
//        $order_total_after_tax = $order_total_after_tax + floatval(trim($_POST["order_item_final_amount"][$count]));
     $id = uniqid();
          $statement = $connect->prepare("
        INSERT INTO pedidodetalle 
          (idPedidoCompra, codigoproducto, cantidad,precio,id)
          VALUES (:idPedidoCompra, :item_cod, :order_item_price, :order_item_quantity,:id)
        ");
        $statement->execute(
      
             array(
           ':idPedidoCompra'               =>  $idPedidoCompra,
            ':item_cod'              =>  trim($_POST["item_cod"][$count]),
            ':order_item_price'          =>  trim($_POST["order_item_price"][$count]),
            ':order_item_quantity'           =>  trim($_POST["order_item_quantity"][$count]),
               ':id'               =>  $id
          )
        );
        $result = $statement->fetchAll();
      }
//      $order_total_tax = $order_total_tax1 + $order_total_tax2 + $order_total_tax3;
      $statement = $connect->prepare("   
  UPDATE pedidocabecera 
        SET Fecha = :fecha, 
        Vencimiento = :vencimient, 
        Notas = :guardar 
       
       
        WHERE idPedidoCompra = :idPedidoCompra 
      ");
      
      $statement->execute(
        array(
          ':fecha'               =>  trim($_POST["fecha"]),
          ':vencimient'             =>  trim($_POST["vencimient"]),
          ':guardar'        =>  trim($_POST["guardar"]),
        
         
          ':idPedidoCompra'               =>  $idPedidoCompra
        )
      );
      
      
      $result = $statement->fetchAll();
            
     header("location:preview.php?invoice=$idPedidoCompra");
  }
 if(isset($_POST["pdf"]))
  {
//    $order_total_before_tax = 0;
//      $order_total_tax1 = 0;
//      $order_total_tax2 = 0;
//      $order_total_tax3 = 0;
//      $order_total_tax = 0;
//      $order_total_after_tax = 0;
      
      $idPedidoCompra = $_POST["combosub"];
      
      
      
            
     header("location:print_invoice.php?combosub=$idPedidoCompra");
  }
  if(isset($_GET["delete"]) && isset($_GET["id"]))
  {
    $statement = $connect->prepare("DELETE FROM tbl_order WHERE order_id = :id");
    $statement->execute(
      array(
        ':id'       =>      $_GET["id"]
      )
    );
    $statement = $connect->prepare(
      "DELETE FROM tbl_order_item WHERE order_id = :id");
    $statement->execute(
      array(
        ':id'       =>      $_GET["id"]
      )
    );
    header("location:invoice.php");
  }

  ?>