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

<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" type="text/css" href="../../estilo.css">
     <link rel="stylesheet" href="../../bootstrap.min.css" />
        <title>Crear Ciudad</title>
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
                <?php
      if(isset($_GET["add"]))
      {
      ?>
         
                   <?php
      }
      elseif(isset($_GET["updatep"]) && isset($_GET["ciudad"]))
      {
include('../../database_connection.php');
$statement = $connect->prepare("
          SELECT c.codigociudad,c.descripcion,p.descripcion AS pais FROM ciudad c,pais p
WHERE c.codigopais=p.codigopais and codigociudad=:ciudad
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':ciudad'       =>  $_GET["ciudad"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
             
				?>
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
	
		<li><a href="MantenerCiudad.php">Mantener Ciudad</a></li>
		
		
	
	
</div>
        
         <h3 id="h6" style="color: black">Crear Ciudad</h3>    
      <form method="post" action="actionciudad.php" id="getform">
               <h4 id="h1" style="color: black">Crear Ciudad</h4>
                      
             <div>
         
<!--                <input type="hidden" name="accion" value="grabarimpuesto" />-->
               
        
                     <label id="labelsubrubro">Pais</label>
               <select  id="combosubrubros"  name="combopais"> 
          
              <?php echo $pais; ?> 


        
        </select>      
                          
       
               <label id="labelgeneral">Nueva Ciudad</label>
                 <input style="width: 384px;" id="txtnuevorubro" type="text" name="txtNombreciudad" value="<?php echo $row["descripcion"]; ?>"  />
                  
                          <input type="hidden" name="codigociudad" id="codigociudad <?php echo $m; ?>" value="<?php echo $row["codigociudad"]; ?>" />
                            <input  id="gravarrubro" type="submit" value="Aceptar" name="editarciudad" />
                   
                
            </div>
        </form>


        </body>
</html>
 <?php 
        }
      }