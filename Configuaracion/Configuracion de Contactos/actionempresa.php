<?php
//Database connection by using PHP PDO

  include('../../database_connection.php');
  if(isset($_POST["crear_emp"]))
  { 

          $statement = $connect->query("SELECT (max(cod_emp)+1)cod_emp from empresa");
            $cod_emp = $statement->fetchColumn(); 
           
         
           
         $statement = $connect->prepare
            
            ("
        
      INSERT INTO empresa
        (cod_emp,rucempresa,empresa,direccion,telefono)
        VALUES (:cod_emp,:txtruc,:txtnomempresa,:txtdireccion,:txttelefono)
    ");
                
    $statement->execute(
      array(
           ':cod_emp'               =>  $cod_emp,
          ':txtruc'               =>  trim($_POST["txtruc"]),
           ':txtnomempresa'               =>  trim($_POST["txtnomempresa"]),
          ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
           ':txttelefono'               =>  trim($_POST["txttelefono"]),
         
      )
    );


   
      header("location:VistaEmpresa.php?empresa=$cod_emp");
}
 
   if(isset($_POST["updateempresa"]))
  {
 
      
      $cod_emp = $_POST["cod_emp"];
      
    
      $statement = $connect->prepare
              
              ("   
  UPDATE empresa 
        SET rucempresa = :txtruc,
          empresa = :txtnomempresa,
          direccion =:txtdireccion,
          telefono =:txttelefono
       
        WHERE cod_emp = :cod_emp
      ");
      
      $statement->execute(
        array(
          ':txtruc'               =>  trim($_POST["txtruc"]),
           ':txtnomempresa'               =>  trim($_POST["txtnomempresa"]),
          ':txtdireccion'               =>  trim($_POST["txtdireccion"]),
           ':txttelefono'               =>  trim($_POST["txttelefono"]),
        
         
          ':cod_emp'               =>  $cod_emp
        )
      );
      
      
//      $result = $statement->fetchAll();
            
     header("location:VistaEmpresa.php?empresa=$cod_emp");
  }
 if(isset($_POST["deleteim"]))
  {

      
      $cod_emp  = $_POST["cod_emp"];
    
      $statement = $connect->prepare("   
  delete from empresa  WHERE cod_emp =:cod_emp 
      ");
      
      $statement->execute(
        array(
         
          ':cod_emp'               =>  $cod_emp 
        )
      );
      
      
     
            
    header("location:VistaEmpresa.php?empresa=$cod_emp");
  }
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
    
 {
  $statement = $connect->prepare("SELECT * from empresa order by cod_emp ASC
  
 ");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
    <th width="0%">Ver</th>
    
     <td>Id</td>
     <td>Ruc</td>
     <td>Nombre</td>
     <td>Direccion</td>
      <td>Telefono</td>
                  
                       
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td><a href="VistaEmpresa.php?empresa='.$row["cod_emp"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
     <td>'.$row["cod_emp"].'</td>
     <td> '.$row["rucempresa"].' </td>     
     <td> '.$row["empresa"].' </td>
     <td> '.$row["direccion"].' </td>    
      <td> '.$row["telefono"].' </td>   
    
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
 