<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_proveedor"]))
  { 

          $statement = $connect->query("SELECT (max(id)+1)id from proveedor");
            $id = $statement->fetchColumn(); 
           
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO proveedor
        (id,RucProveedor,nombreprov,nrtelefono,direccion,timbrado,codigociudad,codigopais)
        VALUES (:id,:txtruc,:txtnomprovee,:txttelefono,:txtdireccion,:txttimbrado,:combociudad,:combopais)
    ");
                
    $statement->execute(
      array(
           ':id'               =>  $id,
          ':txtruc'               =>  trim($_POST["txtruc"]),
           ':txtnomprovee'               =>  trim($_POST["txtnomprovee"]),
          ':txttelefono'               =>  trim($_POST["txttelefono"]),
           ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
          ':txttimbrado'               =>  trim($_POST["txttimbrado"]),
           ':combociudad'               =>  trim($_POST["combociudad"]),
           ':combopais'               =>  trim($_POST["combopais"]),
      )
    );


   
      header("location:VistaProveedor.php?proveedor=$id");
}
 
   if(isset($_POST["updateprov"]))
  {
  
      
      $id = $_POST["id"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE proveedor 
        SET RucProveedor = :txtruc,
          nombreprov = :txtnomprovee,
          nrtelefono =:txttelefono,
          direccion =:txtdireccion,
          timbrado =:txttimbrado,
          codigociudad =:combociudad,
          codigopais =:combopais
       
        WHERE id = :id
      ");
      
      $statement->execute(
        array(
        ':id'               =>  $id,
          ':txtruc'               =>  trim($_POST["txtruc"]),
           ':txtnomprovee'               =>  trim($_POST["txtnomprovee"]),
          ':txttelefono'               =>  trim($_POST["txttelefono"]),
           ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
          ':txttimbrado'               =>  trim($_POST["txttimbrado"]),
           ':combociudad'               =>  trim($_POST["combociudad"]),
           ':combopais'               =>  trim($_POST["combopais"]),
         
        
         
          ':id'               =>  $id
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaProveedor.php?proveedor=$id");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $id = $_POST["id"];
    
      $statement = $connect->prepare("   
  delete from proveedor  WHERE id = :id
      ");
      
      $statement->execute(
        array(
         
          ':id'               =>  $id
        )
      );
      
      
     
            
    header("location:VistaProveedor.php?proveedor=$id");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT pr.id,pr.Rucproveedor,pr.nombreprov,pr.nrtelefono,pr.direccion,pr.timbrado,c.descripcion as ciudad,p.descripcion as pais

FROM proveedor pr,pais p, ciudad c WHERE pr.codigociudad=c.codigociudad AND pr.codigopais=p.codigopais ORDER BY pr.RucProveedor ASC
  
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
   
     <td>Ruc</td>
     <td>Proveedor</td>
     <td>Telefono</td>
      <td>Direccion</td>
      <td>Timbrado</td>
      <td>Ciudad</td>            
       <td>Pais</td>                
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaProveedor.php?proveedor='.$row["id"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["Rucproveedor"].'</td>
     <td> '.$row["nombreprov"].' </td>     
     <td> '.$row["nrtelefono"].' </td>
     <td> '.$row["direccion"].' </td> 
     <td> '.$row["timbrado"].' </td>      
      <td> '.$row["ciudad"].' </td>   
      <td> '.$row["pais"].' </td>   
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
 