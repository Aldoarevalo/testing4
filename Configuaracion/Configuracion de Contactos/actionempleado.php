<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_emp"]))
  { 

          $statement = $connect->query("SELECT (max(codigoempleado)+1)codigoempleado from empleado");
            $cod_emp = $statement->fetchColumn(); 
           
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO empleado
        (codigoempleado,ciemp,nombres,direccion,nrtelefono,codigociudad,codigopais,Idsucursal )
        VALUES (:codigoempleado,:txtci,:txtnomemple,:txtdireccion,:txttelefono,:combociudad,:combopais,:combosuc)
    ");
                
    $statement->execute(
      array(
           ':codigoempleado'               =>  $cod_emp,
          ':txtci'               =>  trim($_POST["txtci"]),
           ':txtnomemple'               =>  trim($_POST["txtnomemple"]),
          ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
           ':txttelefono'               =>  trim($_POST["txttelefono"]),
          ':combociudad'               =>  trim($_POST["combociudad"]),
          ':combopais'               =>  trim($_POST["combopais"]),
           ':combosuc'               =>  trim($_POST["combosuc"]),
      )
    );


   
      header("location:VistaEmpleado.php?empleado=$cod_emp");
}
 
   if(isset($_POST["editarempleado"]))
  {
  
      
      $codigoempleado = $_POST["codigoempleado"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE empleado 
        SET ciemp = :txtci,
          nombres = :txtnomemple,
          direccion =:txtdireccion,
          nrtelefono =:txttelefono,
          codigociudad =:combociudad,
          codigopais =:combopais,
          Idsucursal =:combosuc
       
        WHERE codigoempleado = :codigoempleado
      ");
      
      $statement->execute(
        array(
        ':codigoempleado'               =>  $codigoempleado,
          ':txtci'               =>  trim($_POST["txtci"]),
           ':txtnomemple'               =>  trim($_POST["txtnomemple"]),
          ':txtdireccion'               =>  trim($_POST["txtdireccion"]), 
          ':txttelefono'               =>  trim($_POST["txttelefono"]),
           ':combociudad'               =>  trim($_POST["combociudad"]),
           ':combopais'               =>  trim($_POST["combopais"]),
           ':combosuc'               =>  trim($_POST["combosuc"]),
        
         
          ':codigoempleado'               =>  $codigoempleado
        )
      );
      
      
//      $result = $statement->fetchAll();
            
    header("location:VistaEmpleado.php?empleado=$codigoempleado");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $codigoempleado  = $_POST["codigoempleado"];
    
      $statement = $connect->prepare("   
  delete from empleado  WHERE codigoempleado  = :codigoempleado 
      ");
      
      $statement->execute(
        array(
         
          ':codigoempleado'               =>  $codigoempleado 
        )
      );
      
      
      
            
    header("location:VistaEmpleado.php?empleado=$codigoempleado");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT e.codigoempleado,e.nombres,e.ciemp,e.direccion,e.nrtelefono,c.descripcion as ciudad,p.descripcion as pais,s.nombre as sucursal

FROM pais p,ciudad c, empleado e,sucursal s WHERE e.codigociudad=c.codigociudad AND p.codigopais=e.codigopais group BY e.codigoempleado ASC
  
  
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>CI</td>
     <td>Nombres</td>
     <td>Direccion</td>
      <td>Telefono</td>
       <td>Pais</td>
      <td>Ciudad</td>           
       <td>Sucursal</td>                      
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaEmpleado.php?empleado='.$row["codigoempleado"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["ciemp"].'</td>
     <td> '.$row["nombres"].' </td>     
     <td> '.$row["direccion"].' </td>
     <td> '.$row["nrtelefono"].' </td>    
      <td> '.$row["pais"].' </td>   
      <td> '.$row["ciudad"].' </td> 
       <td> '.$row["sucursal"].' </td>       
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
 