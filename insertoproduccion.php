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

  if(isset($_POST["crear_ing"]))
  { 
//    $order_total_before_tax = 0;
//    $order_total_tax1 = 0;
//    $order_total_tax2 = 0;
//    $order_total_tax3 = 0;
//    $order_total_tax = 0;
//    $order_total_after_tax = 0;
          $statement = $connect->query("SELECT (max(idIngreso)+1)idIngreso from ingresodeproduccioncabecera");
           $idIngreso = $statement->fetchColumn();
    $statement = $connect->prepare("
      INSERT INTO  ingresodeproduccioncabecera
        (idIngreso,Fecha,PersonaAcargo,Notas,codigoalmacen,idorden)
        VALUES (:idIngreso,:fecha,:empleado,:guardar,:comboorigen,:id)
    ");
//     $query = "CALL insertUser('".$first_name."', '".$last_name."')";  
//                     $statement = $connect->query($connect, $query);  
//                     echo 'Data Inserted';  
    $statement->execute(
      array(
           ':idIngreso'               =>  $idIngreso,
          ':fecha'               =>  trim($_POST["fecha"]),
           ':empleado'               =>  trim($_POST["empleado"]),
           ':guardar'               =>  trim($_POST["guardar"]),
//        
          ':comboorigen'               =>  trim($_POST["comboorigen"]),
               ':id'               =>  trim($_POST["id"]),
          
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
          INSERT INTO ingresodeproducciondetalle
          (idIngreso, codigoproducto, Cantidadingresada)
          VALUES (:idIngreso, :item_cod, :order_item_price1)
        ");

        $statement->execute(
          array(
            ':idIngreso'               =>  $idIngreso,
            ':item_cod'              =>  trim($_POST["item_cod"][$count]),
            ':order_item_price1'          =>  trim($_POST["order_item_price1"][$count]),

            
          )
        );
      }
//      $order_total_tax = $order_total_tax1 + $order_total_tax2 + $order_total_tax3;

      $statement = $connect->prepare("
       UPDATE ingresodeproducciondetalle
        SET  
        idorden = :id,
       idCentroDeProduccion = :centro,
       codigoalmacen = :combodestino
        WHERE idIngreso = :idIngreso
      ");
   
      $statement->execute(
        array(
         
         
          ':id'               =>  trim($_POST["id"]),
            ':centro'               =>  trim($_POST["centro"]),
            ':combodestino'               =>  trim($_POST["combodestino"]),
           ':idIngreso'               =>  $idIngreso
        )
      );
      
      header("location:vistaingproduccion.php?ingreso=$idIngreso");
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