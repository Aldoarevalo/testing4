<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_cliente"]))
  { 

          $statement = $connect->query("SELECT (max(id)+1)id from cliente");
            $id = $statement->fetchColumn(); 
           
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO cliente
        (id,Ci_Cliente,clinombres,Direccion,Telefono,codigociudad,codigopais)
        VALUES (:id,:txtruc,:txtnomcli,:txtdireccion,:txttelefono,:combociudad,:combopais)
    ");
                
    $statement->execute(
      array(
           ':id'               =>  $id,
          ':txtruc'               =>  trim($_POST["txtruc"]),
           ':txtnomcli'               =>  trim($_POST["txtnomcli"]),
          ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
           ':txttelefono'               =>  trim($_POST["txttelefono"]),
          
           ':combociudad'               =>  trim($_POST["combociudad"]),
           ':combopais'               =>  trim($_POST["combopais"]),
      )
    );


   
      header("location:VistaCliente.php?cliente=$id");
}
 
   if(isset($_POST["editarcliente"]))
  {
  
      
      $id = $_POST["id"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE cliente 
        SET
          Ci_cliente = :txtruc,  
          clinombres = :txtnomcli,
          Direccion =:txtdireccion,
          Telefono =:txttelefono,
          codigociudad =:combociudad,
          
          codigopais =:combopais
       
        WHERE id = :id
      ");
      
      $statement->execute(
        array(
         ':id'               =>  $id,
          ':txtruc'               =>  trim($_POST["txtruc"]),
           ':txtnomcli'               =>  trim($_POST["txtnomcli"]),
           ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
            ':txttelefono'               =>  trim($_POST["txttelefono"]), 
            ':combociudad'               =>  trim($_POST["combociudad"]),
            ':combopais'               =>  trim($_POST["combopais"]),
         
        
         
          ':id'               =>  $id
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaCliente.php?cliente=$id");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $id = $_POST["id"];
    
      $statement = $connect->prepare("   
  delete from cliente  WHERE id = :id
      ");
      
      $statement->execute(
        array(
         
          ':id'               =>  $id
        )
      );
      
      
    
            
    header("location:VistaCliente.php?cliente=$id");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT cl.id, cl.Ci_Cliente,cl.clinombres,cl.Direccion,cl.Telefono,c.descripcion AS ciudad,p.descripcion AS pais

FROM cliente cl,pais p, ciudad c WHERE cl.codigociudad=c.codigociudad AND cl.codigopais=p.codigopais ORDER BY cl.id ASC
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
   
     <td>Ruc</td>
     <td>Cliente</td>
     <td>Telefono</td>
      <td>Direccion</td>
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
     <td><a href="VistaCliente.php?cliente='.$row["id"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["Ci_Cliente"].'</td>
     <td> '.$row["clinombres"].' </td>     
     <td> '.$row["Direccion"].' </td>
     <td> '.$row["Telefono"].' </td> 
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
 