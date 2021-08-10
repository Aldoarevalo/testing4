<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_prod"]))
  { 

          $statement = $connect->query("SELECT (max(codigoproducto)+1)codigoproducto from productos");
           $idPedidoCompra = $statement->fetchColumn(); 
//            $statement = $connect->query("SELECT (idmarca)as idmarca  from marca where idmarca=:combomarcas");
//        $statement = $connect->query("SELECT (idimpuesto)as idimpuesto  from impuestos where idumpuesto=:comboimpuesto");
//         $statement = $connect->query("SELECT (idunidaddemedida)as idunidaddemedida  from iunidademedida where iunidademedida=:comboum");
//            $statement = $connect->query("SELECT (codigosubrubro)as codigosubrubro  from subrubros where codigosubrubro=:combosub");
//                $statement = $connect->query("SELECT (codigorubro)as codigorubro  from rubros where codigorubro=:comborubroprod");
//                             $statement = $connect->query("SELECT (idcategoria)as idcategoria  from categoriadeproductos where idcategoria=:combocategoria");
    $statement = $connect->prepare
            
            ("
        
      INSERT INTO productos 
        (codigoproducto,producto,precio,idmarca,idimpuesto,idunidaddemedida,codigosubrubro,codigorubro,idcategoria)
        VALUES (:codigoproducto,:txtnombre,:txtprecio,:combomarcas,:comboimpuesto,:comboum,:combosub1,:comborub1,:combocat1)
    ");
                
    $statement->execute(
      array(
           ':codigoproducto'               =>  $idPedidoCompra,
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
          ':txtprecio'               =>  trim($_POST["txtprecio"]),
           ':combomarcas'               =>  trim($_POST["combomarcas"]),
           ':comboimpuesto'               =>  trim($_POST["comboimpuesto"]),
           ':comboum'               =>  trim($_POST["comboum"]),
           ':combosub1'               =>  trim($_POST["combosub1"]),
           ':comborub1'               =>  trim($_POST["comborub1"]),
           ':combocat1'               =>  trim($_POST["combocat1"]),
      )
    );


   
      header("location:VistaProducto.php?producto=$idPedidoCompra");
}
 
   if(isset($_POST["update_invoice"]))
  {

      
      $codigoproducto = $_POST["codigoproducto"];
    
      $statement = $connect->prepare("   
  UPDATE productos 
        SET producto = :txtnombre, 
         idimpuesto = :comboimpuesto,
          idmarca = :combomarcas,
          idunidaddemedida = :comboum,       
          codigosubrubro = :combosub1,
          codigorubro = :comborub1,
          idcategoria = :combocat1,
          precio = :txtprecio
      
        WHERE codigoproducto = :codigoproducto 
      ");
      
      $statement->execute(
        array(
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
          ':comboimpuesto'             =>  trim($_POST["comboimpuesto"]),
          ':combomarcas'               =>  trim($_POST["combomarcas"]),
          ':comboum'             =>  trim($_POST["comboum"]),
           ':combosub1'               =>  trim($_POST["combosub1"]),
          ':comborub1'             =>  trim($_POST["comborub1"]),
          ':txtnombre'               =>  trim($_POST["txtnombre"]),
          ':combocat1'             =>  trim($_POST["combocat1"]),
           ':txtprecio'               =>  trim($_POST["txtprecio"]),
         
        
         
          ':codigoproducto'               =>  $codigoproducto
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaProducto.php?producto=$codigoproducto");
  }
 if(isset($_POST["delete"]))
  {

      
      $codigoproducto = $_POST["codigoproducto"];
    
      $statement = $connect->prepare("   
  delete from productos  WHERE codigoproducto = :codigoproducto 
      ");
      
      $statement->execute(
        array(
         
          ':codigoproducto'               =>  $codigoproducto
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaProducto.php?producto=$codigoproducto");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT p.codigoproducto,p.precio,p.producto,c.nombrecategoria AS categoria,i.nombre AS impuesto,r.nombre AS rubro,s.subrubro AS subrubro,m.nombre as marca,
         um.nombres as unidadm
FROM productos p,impuestos i,subrubros s,rubros r,categoriadeproductos c,marca m,unidaddemedida um
WHERE c.idcategoria=p.idcategoria AND i.idimpuesto=p.idimpuesto AND r.codigorubro=p.codigorubro 
AND s.codigosubrubro=p.codigosubrubro and m.idmarca=p.idmarca AND um.idunidaddemedida=p.idunidaddemedida");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>Codigo</td>
                       <td>Producto</td>
                       <td>Marca</td>
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
       
     <td><a href="VistaProducto.php?producto='.$row["codigoproducto"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["codigoproducto"].'</td>
     <td>'.$row["producto"].'</td>
     <td>'.$row["marca"].'</td>
      <td>'.$row["rubro"].'</td>
      <td>'.$row["subrubro"].'</td>
      <td>'.$row["categoria"].'</td> 
       <td>'.$row["precio"].'</td> 
       <td>'.$row["impuesto"].'</td>  
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
   "DELETE FROM productos WHERE codigoproducto = :id"
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
 