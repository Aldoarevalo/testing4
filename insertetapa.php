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

  if(isset($_POST["crear_etapa"]))
  { 
//    $order_total_before_tax = 0;
//    $order_total_tax1 = 0;
//    $order_total_tax2 = 0;
//    $order_total_tax3 = 0;
//    $order_total_tax = 0;
//    $order_total_after_tax = 0;
          $statement = $connect->query("SELECT (max(idEtapa)+1)idEtapa from etapacabecera");
           $idEtapa = $statement->fetchColumn();
    $statement = $connect->prepare("
      INSERT INTO etapacabecera 
        (idEtapa,Fecha,Notas,Ci_Cliente,codigoempleado,codigoalmacen,Idsucursal,tipoproduccion,idCentroDeProduccion)
        VALUES (:idEtapa,:fecha,:guardar,:cliente,:combopersonaacargo,:comboorigen,:combosucursaletapa,:combotipodeproduccion,:cbcentrodeproduccion)
    ");
//     $query = "CALL insertUser('".$first_name."', '".$last_name."')";  
//                     $statement = $connect->query($connect, $query);  
//                     echo 'Data Inserted';  
    $statement->execute(
      array(
           ':idEtapa'               =>  $idEtapa,
          ':fecha'               =>  trim($_POST["fecha"]),
         
           ':guardar'               =>  trim($_POST["guardar"]),
          ':cliente'               =>  trim($_POST["cliente"]),
          ':combopersonaacargo'               =>  trim($_POST["combopersonaacargo"]),
          ':comboorigen'               =>  trim($_POST["comboorigen"]),
          ':combosucursaletapa'               =>  trim($_POST["combosucursaletapa"]),
           ':combotipodeproduccion'               =>  trim($_POST["combotipodeproduccion"]),
           ':cbcentrodeproduccion'               =>  trim($_POST["cbcentrodeproduccion"]),
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
          INSERT INTO etapadetalle 
          (idEtapa, codigoproducto, cantidad,precio)
          VALUES (:idEtapa, :item_cod, :order_item_price, :order_item_quantity)
        ");

        $statement->execute(
          array(
            ':idEtapa'               =>  $idEtapa,
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
       UPDATE etapadetalle
        SET  
       codigoalmacen = :comboalmdestino 
      
      
        WHERE idEtapa = :idEtapa
      ");
   
      $statement->execute(
        array(
         
         
          ':comboalmdestino'               =>  trim($_POST["comboalmdestino"]),
          
           ':idEtapa'               =>  $idEtapa
        )
      );
      
      header("location:vistaetapa.php?etapa=$idEtapa");
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