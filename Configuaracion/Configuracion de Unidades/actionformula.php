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
        $idReceta = $_POST["idReceta"];
        
       $statement = $connect->prepare("
                DELETE FROM formulas WHERE idReceta = :idReceta
            ");
            $statement->execute(
                array(
                    ':idReceta'       =>      $idReceta
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
         
           ':order_item_quantity'               =>  trim($_POST["order_item_quantity"][$count]),
           ':order_item_final_amount'               =>  trim($_POST["order_item_final_amount"][$count]),
          ':order_item_price'               =>  trim($_POST["order_item_price"][$count]),
       
          )
        );   
     }
      $statement = $connect->prepare("   
 UPDATE receta
        SET
   
       Nombre =:formula
         
        WHERE idReceta = :idReceta 
      ");
      
      $statement->execute(
        array(
     
         
          ':formula'             =>  trim($_POST["formula"]),
        
             ':idReceta'               =>  $idReceta,
         
        
        )
      );
   
 
      
      
//      $result = $statement->fetchAll();
            
    header("location:MantenerFormula.php");
  
  
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
    <th width="0%">Eliminar</th>
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
        <td><button type="button" id="'.$row["idReceta"].'" class="btn btn-danger btn-xs delete">Eliminar</button></td>
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
 if($_POST["action"] == "Delete")
 {
 $statement = $connect->prepare(
   "DELETE FROM formulas WHERE idReceta = :id"
  );
  $result = $statement->execute(
   array(
    ':id' => $_POST["id"]
   )
  );
  $statement = $connect->prepare(
   "DELETE FROM receta WHERE idReceta = :id"
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
 