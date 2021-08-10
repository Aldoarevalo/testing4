<?php
//index.php

include('../../database_connection.php');

$sucursal = '';

$query = "
 SELECT * FROM sucursal   ORDER BY nombre ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $sucursal .= '<option value="'.$row["Idsucursal"].'">'.$row["nombre"].'</option>';
 
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear Producto</title>
         <link rel="stylesheet" type="text/css" href="../../estilo.css">
<!--     <link rel="stylesheet" href="../../bootstrap.min.css" type="text/css"  />-->
<!--     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
   -->
<link rel="stylesheet" href="../Configuaracion de Productos/assets/signup-form.css" type="text/css" />
        <title>Crear Impuesto</title>
        <style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:800px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav {
				width:1000px; /*Le establecemos un ancho*/
				margin:0 auto; /*Centramos automaticamente*/
			}

			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:aquamarine;
				color: #080808;
/*                                font-weight:  bold;*/
				text-decoration:none;
                                text-decoration-color: black;
				padding:10px 26px;
				display:block;                            
                                font-size:16px;
                            
			}
			
			.nav li a:hover {
				background-color:aquamarine;
                                text-decoration: none;
                                  background: dodgerblue;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
		</style>
    </head>
  <?php
      if(isset($_GET["add"]))
      {
      ?>
         
                   <?php
      }
      elseif(isset($_GET["updateuser"]) && isset($_GET["idusuario"]))
      {
include('../../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM usuario 

WHERE  idusuario=:idusuario
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':idusuario'       =>  $_GET["idusuario"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
             
				?>	
     <script>
        $(document).ready(function(){
          $('#txtcodpro').val("<?php echo $row["nombre"]; ?>");
          $('#txtnombreprod').val("<?php echo $row["precio"]; ?>");
          $('#textopedidocompra').val("<?php echo $row["Notas"]; ?>");
        
        });
        </script>
    <body id="hhmenu">
       
        
         <div id="menu-wrapper">
    
      <div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
                                    
					<li><a href="">Configuracion</a>
                                        <ul>
							<li><a href="">Submenu1</a></li>
							<li><a href="">Submenu2</a></li>
							<li><a href="">Submenu3</a></li>
							<li><a href="">Submenu4</a>
								<ul>
									<li><a href="">Submenu1</a></li>
									<li><a href="">Submenu2</a></li>
									<li><a href="">Submenu3</a></li>
									<li><a href="">Submenu4</a></li>
								</ul>
							</li>
						</ul>
                                        </li>
                                        <li><a href="">Configuracion</a>
                                        <ul>
							<li><a href="">Submenu1</a></li>
							<li><a href="">Submenu2</a></li>
							<li><a href="">Submenu3</a></li>
							<li><a href="">Submenu4</a>
								<ul>
									<li><a href="">Submenu1</a></li>
									<li><a href="">Submenu2</a></li>
									<li><a href="">Submenu3</a></li>
									<li><a href="">Submenu4</a></li>
								</ul>
							</li>
						</ul>
                                        </li>
					<li><a href="">Compras</a>
						 <ul>
							<li><a href="">Submenu1</a></li>
							<li><a href="">Submenu2</a></li>
							<li><a href="">Submenu3</a></li>
							<li><a href="">Submenu4</a>
								<ul>
									<li><a href="">Submenu1</a></li>
									<li><a href="">Submenu2</a></li>
									<li><a href="">Submenu3</a></li>
									<li><a href="">Submenu4</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="">Stock</a>
						 <ul>
							<li><a href="">Submenu1</a></li>
							<li><a href="">Submenu2</a></li>
							<li><a href="">Submenu3</a></li>
							<li><a href="">Submenu4</a>
								<ul>
									<li><a href="">Submenu1</a></li>
									<li><a href="">Submenu2</a></li>
									<li><a href="">Submenu3</a></li>
									<li><a href="">Submenu4</a></li>
								</ul>
							</li>
						</ul>
					</li>
                                        
					<li><a href="">Produccion</a>
                                         <ul>
							<li><a href="">Submenu1</a></li>
							<li><a href="">Submenu2</a></li>
							<li><a href="">Submenu3</a></li>
							<li><a href="">Submenu4</a>
								<ul>
									<li><a href="">Submenu1</a></li>
									<li><a href="">Submenu2</a></li>
									<li><a href="">Submenu3</a></li>
									<li><a href="">Submenu4</a></li>
								</ul>
							</li>
						</ul>
                                        </li>
                                        
				</ul>
                            
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
      <li></li>
            <li></li>
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="MantenerUsuario.php">Mantener Usuario</a></li>
		
		
	
	
</div>
        
        <h6 id="h6" style="color: black">Editar Usuario</h6>    
        <form method="post" action="actionusuario.php" id="getform">
                <h1 id="h1" style="color: black">Editar Usuario</h1> 
                      
             <div>
         
             
               
                         
       
                
                  <label id="labelgeneral">Nombre</label>
                   <input id="txtsimbolo"type="text" name="txtnombreuser" value="<?php echo $row["usuario"]; ?>" />
                     <label id="labelgeneral">Tipo de Usuario</label>
                     <select  id="combosubrubros"  name="combotipouser"  value="<?php echo $row["tipousuario"]; ?>"> 
          
                            <option>Administrador</option>
                             <option>Operadores de Deposito</option>
                             <option>Operadores de Produccion</option>
                             <option>Operadores de Sucursales</option>
                             <option>Operadores de Pagos y Cobros</option>
                             <option>Operadores de Auditoria</option>
                          
                       
        
        </select>
                       <label id="labelizquierda1">Logging</label>
                         <input id="txtizquierza" type="text" name="txtloggin" value="<?php echo $row["logging"]; ?>" />
                         <label id="labelizquierda">Paswor</label>
                         <input id="txtizquierza1" type="text" name="txtpaswor" value="<?php echo $row["paswor"]; ?>" />
                          <label id="labelgeneral">Sucursal</label>
                         <select  id="combosubrubros"  name="combosuc"> 
             <?php echo $sucursal; ?>
            
        </select>
                          <input type="text1" name="" value="<?php echo $row["idusuario"]; ?>" />
        
        <input type="hidden" name="idusuario" id="idusuario <?php echo $m; ?>" value="<?php echo $row["idusuario"]; ?>" />
                            <input id="gravar" type="submit" value="Grabar" name="update" />
                     
                   
                
            </div>
        </form>

            <script src="../Configuaracion de Productos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Configuaracion de Productos/assets/jquery-1.11.2.min.js"></script>
    <script src="../Configuaracion de Productos/assets/jquery.validate.min.js"></script>
    <script src="../Configuaracion de Productos/assets/ass.js"></script>    
        </body>
</html>
  <?php 
        }
      }