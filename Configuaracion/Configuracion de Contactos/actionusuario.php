<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_user"]))
  { 

          $statement = $connect->query("SELECT (max(idusuario)+1)idusuario from usuario");
            $idsuc = $statement->fetchColumn(); 
           
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO usuario
        (idusuario,usuario,logging,paswor,tipousuario,Idsucursal)
        VALUES (:idusuario,:txtnombreuser,:txtloggin,:txtpaswor,:combotipouser,:combosuc)
    ");
                
    $statement->execute(
      array(
           ':idusuario'               =>  $idsuc,
          ':txtnombreuser'               =>  trim($_POST["txtnombreuser"]),
           ':txtloggin'               =>  trim($_POST["txtloggin"]),
          ':txtpaswor'               =>  trim($_POST["txtpaswor"]),
           ':combotipouser'               =>  trim($_POST["combotipouser"]),
          ':combosuc'               =>  trim($_POST["combosuc"]),
      )
    );


   
      header("location:VistaUsuario.php?usuario=$idsuc");
}
 
   if(isset($_POST["update"]))
  {
 
     
      $idusuario = $_POST["idusuario"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE usuario 
        SET usuario = :txtnombreuser,
          tipousuario = :combotipouser,
          logging = :txtloggin,
          paswor = :txtpaswor, 
         Idsucursal = :combosuc
        WHERE idusuario = :idusuario
      ");
      
      $statement->execute(
        array(
          ':txtnombreuser'               =>  trim($_POST["txtnombreuser"]),
           ':combotipouser'               =>  trim($_POST["combotipouser"]),
           ':txtloggin'               =>  trim($_POST["txtloggin"]),
          ':txtpaswor'               =>  trim($_POST["txtpaswor"]),
           ':combosuc'               =>  trim($_POST["combosuc"]),
          ':idusuario'               =>  $idusuario
        )
      );
      
      
 
            
    header("location:VistaUsuario.php?usuario=$idusuario");
  }
  
   if(isset($_POST["update1"]))
  {
 
     
      $idusuario = $_POST["idusuario"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE usuario 
        SET usuario = :txtnombreuser,
         
          logging = :txtloggin,
          paswor = :txtpaswor
       
        WHERE idusuario = :idusuario
      ");
      
      $statement->execute(
        array(
          ':txtnombreuser'               =>  trim($_POST["txtnombreuser"]),
      
           ':txtloggin'               =>  trim($_POST["txtloggin"]),
          ':txtpaswor'               =>  trim($_POST["txtpaswor"]),
         
          ':idusuario'               =>  $idusuario
        )
      );
      
      
 
            
    header("location:VistaUsuario.php?usuario=$idusuario");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $idusuario = $_POST["idusuario"];
    
      $statement = $connect->prepare("   
  delete from usuario  WHERE idusuario = :idusuario
      ");
      
      $statement->execute(
        array(
         
          ':idusuario'               =>  $idusuario
        )
      );
      
      
      
            
      header("location:VistaUsuario.php?usuario=$idusuario");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT u.idusuario,u.usuario,u.logging,u.paswor,u.tipousuario,s.nombre FROM usuario u ,sucursal s

WHERE u.Idsucursal=s.Idsucursal ORDER BY idusuario
  
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>Usuario</td>
     <td>Tipodeusuario</td>
     <td>Loggin</td>
     <td>Sucursal</td>
                    
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaUsuario.php?usuario='.$row["idusuario"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
       <td>'.$row["idusuario"].'</td>
<td>'.$row["usuario"].'</td>
     <td> '.$row["tipousuario"].' </td>     
     <td> '.$row["logging"].' </td>
     <td> '.$row["nombre"].' </td>    
        
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
 