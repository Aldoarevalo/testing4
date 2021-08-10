<?php
//index.php

include('../../database_connection.php');

$pais = '';

$query = "
 SELECT * FROM pais   ORDER BY codigopais ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $pais .= '<option value="'.$row["codigopais"].'">'.$row["descripcion"].'</option>';
 
}

?>
<?php
//index.php

include('../../database_connection.php');

$ciudad = '';

$query = "
 SELECT * FROM ciudad  ORDER BY codigociudad ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $ciudad .= '<option value="'.$row["codigociudad"].'">'.$row["descripcion"].'</option>';
 
}

?>
<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" type="text/css" href="../../estilo.css">
     <link rel="stylesheet" href="../../bootstrap.min.css" />
        <title>Crear Rubro</title>
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
	
		<li><a href="MantenerEmpresa.php">Mantener Empresa</a></li>
		
		
	
	
</div>
        
         <h3 id="h6" style="color: black">Crear Empresa</h3>    
         <form method="post" action="actionempresa.php" id="getmoneda">
                 <h4 id="h1" style="color: black">Crear Empresa</h4>
                      
             <div>
         
                <input type="hidden" name="accion" value="grabarproveedor" />
               
                         
       
                
                  <label id="labelsimbolo">Ruc</label>
                   <input style="text-decoration-color:blue;" id="txtsimbolo"type="text" name="txtruc" value=""  placeholder="Ingrese un Ruc Para la Empresa" />
                     <label id="labelprecioventa">Empresa Nombre</label>
                     <input id="txtprecioventa" type="text" name="txtnomempresa" value=""  placeholder="Ingrese un Nombre Para la Empresa" />
                       <label id="labelpreciocompra">Direccion</label>
                         <input id="txtpreciocompra" type="text" name="txtdireccion" value="" placeholder="Ingrese una Direccion Para la Empresa" />
                         <label id="labelpreciocompra">Telefono</label>
                         <input id="txtpreciocompra" type="text" name="txttelefono" value=""  placeholder="Ingrese un numero de Telefono" />
<!--                          <label id="labelsubrubro">ciudad</label>
                         <select  id="combosubrubros"  name="combociudad"> 
             <?php echo $ciudad; ?> -->
 
        
<!--        </select>
             <label id="labelsubrubro">Pais</label>
           <select  id="combosubrubros" class=""  name="combopais"> 
                 <?php echo $pais; ?> 
    
        
        </select>-->
         <input style="margin-left: 50px" name="crear_emp" id="gravarprod" type="submit" value="Grabar"  class="btn btn-info" />
                     
                     
                   
                
            </div>
        </form>

        </body>
</html>
