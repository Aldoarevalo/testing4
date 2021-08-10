
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" type="text/css" href="../../estilo.css">
     <link rel="stylesheet" href="../../bootstrap.min.css" />
        <title>Editar Sucursal</title>
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
      elseif(isset($_GET["updatep"]) && isset($_GET["sucursal"]))
      {
include('../../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM sucursal
            WHERE Idsucursal= :sucursal
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':sucursal'       =>  $_GET["sucursal"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
             
				?>	
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
     
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="MantenerSucursal.php">Mantener Sucursal</a></li>
		
		
	
	
</div>
        
         <h3 id="h6" style="color: black">Editar Sucursal</a></h3>    
       <form method="post" action="actionsucursal.php" id="getmoneda">
                 <h4 id="h1" style="color: black">Editar Sucursal</h4>
                      
             <div>
         
                <input type="hidden" name="accion" value="grabarproveedor" />
               
                         
       
                
                  <label id="labelsimbolo">Prefijo</label>
                   <input style="text-decoration-color:blue;" id="txtsimbolo"type="text" name="txtpref" value="<?php echo $row["prefijo"]; ?>"  placeholder="Ingrese un Ruc Para la Empresa" />
                     <label id="labelprecioventa">Sucursal Nombre</label>
                     <input id="txtprecioventa" type="text" name="txtnomsuc" value="<?php echo $row["nombre"]; ?>" placeholder="Ingrese un Nombre Para la Empresa" />
                       <label id="labelpreciocompra">Direccion</label>
                         <input id="txtpreciocompra" type="text" name="txtdireccion" value="<?php echo $row["direccion"]; ?>" placeholder="Ingrese una Direccion Para la Empresa" />
                         <label id="labelpreciocompra">Telefono</label>
                         <input id="txtpreciocompra" type="text" name="txttelefono" value="<?php echo $row["telefono"]; ?>" placeholder="Ingrese un numero de Telefono" />
                         <input type="hidden" name="Idsucursal" id="Idsucursal <?php echo $m; ?>" value="<?php echo $row["Idsucursal"]; ?>" />
                            <input id="gravarimpuesto" type="submit" value="Grabar" name="updasuc" />
                     
                   
                
            </div>
        </form>

        </body>
</html>
  <?php 
        }
      }