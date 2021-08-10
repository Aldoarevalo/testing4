<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_formula"]))
  { 
//    $order_total_before_tax = 0;
//    $order_total_tax1 = 0;
//    $order_total_tax2 = 0;
//    $order_total_tax3 = 0;
//    $order_total_tax = 0;
//    $order_total_after_tax = 0;
          $statement = $connect->query("SELECT (max(idReceta)+1)idReceta from receta");
           $idReceta = $statement->fetchColumn();
      $statement = $connect->prepare
            
            ("
        
      INSERT INTO receta
        (idReceta,Nombre)
        VALUES (:idReceta,:formula)
    ");
                
    $statement->execute(
      array(
           ':idReceta'               =>  $idReceta,
         ':formula'               =>  trim($_POST["formula"]),
          
         
      )
    );

      for($count=0; $count<$_POST["total_item"]; $count++)
      {


        $statement = $connect->prepare("
          INSERT INTO formulas 
        (idReceta,codigoproducto,codigo,codigosubrubro,codigorubro,idcategoria,idunidaddemedida,Formula,Composicion,Cantidadresultante)
        VALUES (:idReceta,:item_cod, :codigo1,:cboestado,:centrodeproduccion,:categoria,:um,:order_item_quantity,:order_item_final_amount,:order_item_price)
    
        ");

        $statement->execute(
          array(
            ':idReceta'               =>  $idReceta,
         ':item_cod'              =>  trim($_POST["item_cod"][$count]),
           ':codigo1'               =>  trim($_POST["codigo1"]),
           ':cboestado'               =>  trim($_POST["cboestado"]),
           ':centrodeproduccion'               =>  trim($_POST["centrodeproduccion"]),
          ':categoria'               =>  trim($_POST["categoria"]),
          ':um'               =>  trim($_POST["um"]),
//           ':formula'               =>  trim($_POST["formula"]),
           ':order_item_quantity'               =>  trim($_POST["order_item_quantity"][$count]),
           ':order_item_final_amount'               =>  trim($_POST["order_item_final_amount"][$count]),
          ':order_item_price'               =>  trim($_POST["order_item_price"][$count]),
   
          )
        );
      }

      header("location:MantenerFormula.php");
//      header("location: sales.php?id=$w&invoice=$a");
//      registrar.php?update=1&idPedidoCompra
  
  }
 if(isset($_POST["updatef"]))
      
  {
        $idFormulas = $_POST["idFormulas"];
//        
//         $statement = $connect->query("SELECT (idFormulas)idFormulas from formulas where idFormulas=$idFormulas");
//           $idFormula = $statement->fetchColumn();   
   
  
            
    for($count=0; $count<$_POST["total_item"]; $count++)
      {
//      $statement = $connect->prepare("
//          INSERT INTO formulas 
//        (idFormulas,codigoproducto,codigo,codigosubrubro,codigorubro,idcategoria,idunidaddemedida,Nombre,Formula,Composicion,Cantidadresultante)
//        VALUES (:idFormulas,:item_cod, :codigo1,:cboestado,:centrodeproduccion,:categoria,:um,:formula,:order_item_quantity,:order_item_final_amount,:order_item_price)
//    
//        ");
//
//        $statement->execute(
//          array(
//            ':idFormulas'               =>  $idFormula,
//         ':item_cod'              =>  trim($_POST["item_cod"][$count]),
//           ':codigo1'               =>  trim($_POST["codigo1"]),
//           ':cboestado'               =>  trim($_POST["cboestado"]),
//           ':centrodeproduccion'               =>  trim($_POST["centrodeproduccion"]),
//          ':categoria'               =>  trim($_POST["categoria"]),
//          ':um'               =>  trim($_POST["um"]),
//           ':formula'               =>  trim($_POST["formula"]),
//           ':order_item_quantity'               =>  trim($_POST["order_item_quantity"][$count]),
//           ':order_item_final_amount'               =>  trim($_POST["order_item_final_amount"][$count]),
//          ':order_item_price'               =>  trim($_POST["order_item_price"][$count]),
//   
//          )
//        );   
  $statement = $connect->prepare("
               UPDATE formulas 
        SET
      codigoproducto = :item_cod2 
      
  WHERE codigoproducto=:item_cod2
            ");
            $statement->execute(
                array(
                    ':item_cod2'               =>  trim($_POST["item_cod2"][$count]),
                )
            );
      $statement = $connect->prepare("   
 UPDATE formulas 
        SET
      idFormulas = :idFormulas ,
       
         codigo = :codigo1,
          codigosubrubro = :cboestado,
          codigorubro = :centrodeproduccion,       
          idcategoria = :categoria,
          idunidaddemedida = :um,
          Nombre = :formula,
          Formula = :order_item_quantity2,
          Composicion = :order_item_actual_amount2,
          cantidadresultante =:order_item_price2
        WHERE idFormulas = :idFormulas 
      ");
      
      $statement->execute(
        array(
      ':idFormulas'                =>  trim($_POST["idFormulas"][$count]),
         
          ':codigo1'             =>  trim($_POST["codigo1"]),
          ':cboestado'               =>  trim($_POST["cboestado"]),
          ':centrodeproduccion'             =>  trim($_POST["centrodeproduccion"]),
           ':categoria'               =>  trim($_POST["categoria"]),
          ':um'             =>  trim($_POST["um"]),
          ':formula'               =>  trim($_POST["formula"]),
          ':order_item_quantity2'             =>  trim($_POST["order_item_quantity2"][$count]),
           ':order_item_actual_amount2'               =>  trim($_POST["order_item_actual_amount2"][$count]),
           ':order_item_price2'             =>  trim($_POST["order_item_price2"][$count]),
        
         
          ':idFormulas'               =>  $idFormulas,
        )
      );
   
 
      
      
//      $result = $statement->fetchAll();
            
    header("location:MantenerFormula.php");
  }
  
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * from formulasv order by idReceta");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
      <th width="0%">Editar</th>
     <td>IdFormula</td>
                       <td>codigo</td>
                        <td>Categoria</td>
                       <td>Nombre</td>
                       <td>codigoproducto</td>
                       <td>Producto</td>  
                       <td>composicion</td>
                       <td>Formula</td>  
                       <td>cantidadresultante</td>
                       <td>unidadm</td>
                      
                      
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaProducto.php?producto='.$row["idReceta"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
    <td><a href="EditarFormula.php?updatep=1&idReceta='.$row["idReceta"].'"><span class="btn btn-warning btn-xs update">Editar</span></a></td>
    <td>'.$row["idReceta"].'</td>
     <td>'.$row["codigo"].'</td>
    <td>'.$row["categoria"].'</td>    
     <td>'.$row["Nombre"].'</td>
     <td>'.$row["codigoproducto"].'</td>
      <td>'.$row["producto"].'</td>
      <td>'.$row["composicion"].'</td>
      <td>'.$row["Formula"].'</td> 
       <td>'.$row["cantidadresultante"].'</td> 
       <td>'.$row["unidadm"].'</td>  
        
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
 