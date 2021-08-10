<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_suc"]))
  { 

          $statement = $connect->query("SELECT (max(Idsucursal)+1)Idsucursal from sucursal");
            $idsuc = $statement->fetchColumn(); 
           
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO sucursal
        (Idsucursal,prefijo,nombre,direccion,telefono)
        VALUES (:Idsucursal,:txtprefijo,:txtprefijo,:txtdireccion,:txttelefono)
    ");
                
    $statement->execute(
      array(
           ':Idsucursal'               =>  $idsuc,
          ':txtprefijo'               =>  trim($_POST["txtprefijo"]),
           ':txtnomsuc'               =>  trim($_POST["txtnomsuc"]),
          ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
           ':txttelefono'               =>  trim($_POST["txttelefono"]),
         
      )
    );


   
      header("location:VistaSucursal.php?sucursal=$idsuc");
}
 
   if(isset($_POST["updasuc"]))
  {
 
      
      $Idsucursal = $_POST["Idsucursal"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE sucursal 
        SET prefijo = :txtpref,
          nombre = :txtnomsuc,
          direccion =:txtdireccion,
          telefono =:txttelefono
       
        WHERE Idsucursal = :Idsucursal
      ");
      
      $statement->execute(
        array(
          ':txtpref'               =>  trim($_POST["txtpref"]),
           ':txtnomsuc'               =>  trim($_POST["txtnomsuc"]),
          ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
           ':txttelefono'               =>  trim($_POST["txttelefono"]),
        
         
          ':Idsucursal'               =>  $Idsucursal
        )
      );
      
      
//      $result = $statement->fetchAll();
            
     header("location:VistaSucursal.php?sucursal=$Idsucursal");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $Idsucursal = $_POST["Idsucursal"];
    
      $statement = $connect->prepare("   
  delete from sucursal  WHERE Idsucursal = :Idsucursal
      ");
      
      $statement->execute(
        array(
         
          ':Idsucursal'               =>  $Idsucursal
        )
      );
      
      
     
            
    header("location:VistaSucursal.php?sucursal=$Idsucursal");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * from sucursal order by Idsucursal ASC
  
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>Id</td>
     <td>Prefijo</td>
     <td>Nombre</td>
     <td>Direccion</td>
     <td>Telefono</td>                  
      <td>Empresa</td>                    
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaSucursal.php?sucursal='.$row["Idsucursal"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["Idsucursal"].'</td>
     <td> '.$row["prefijo"].' </td>     
     <td> '.$row["nombre"].' </td>
     <td> '.$row["direccion"].' </td>    
      <td> '.$row["telefono"].' </td>  
      <td> '.$row["empresa"].' </td>      
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
 