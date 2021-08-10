
<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" type="text/css" href="../../estilo.css">
     <link rel="stylesheet" href="../../bootstrap.min.css" />
        <title>Crear Unidad de Medida</title>
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
      elseif(isset($_GET["updatep"]) && isset($_GET["um"]))
      {
include('../../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM unidaddemedida
WHERE idunidaddemedida=:um
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':um'       =>  $_GET["um"]
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
	
		<li><a href="MantenerRubro.php">Mantener Unidad de Medida</a></li>
		
		
	
	
</div>
        
         <h3 id="h6" style="color: black">Crear Unidad de Medida</h3>    
       <form method="post" action="actionum.php" id="getform">
               <h4 id="h1" style="color: black">Crear Unidad de Medida</h4>
                      
             <div>
         
<!--                <input type="hidden" name="accion" value="grabarimpuesto" />-->
               
                   <label id="labelsubrubro">Nombre</label>
               <select  id="combosubrubros"  name="combonombre"  > 
          
                      <option>X1</option>
                       <option>KG</option>
                      <option>Lt</option>
                       <option>PACK 12</option>
                       <option>PACK 6</option>
                       <option>PACK 24</option>
                        <option>PACK 4</option>
                       <option>BOLSA 5K</option>
                       <option>BOLSA 30K</option>
                        <option>BOLSA 50K</option>
                       <option>PLANCHA DE HUEVO</option>
        </select>
                          
       
                <label id="labelgeneral">Cantidad</label>
                 <input id="txtnombremoneda" type="text" name="txtcant" value="<?php echo $row["cantidad"]; ?>" />
                                <label id="labelsubrubro">Unidad de Medida Estándar</label>
               <select  id="combosubrubros"  name="comboum" > 
          
                       <option>Unidades</option>
                       <option>Kilogramos</option>
                      <option>Litros</option>
                      


        
        </select>
                    <input type="hidden" name="idunidaddemedida" id="idunidaddemedida <?php echo $m; ?>" value="<?php echo $row["idunidaddemedida"]; ?>" />
                            <input  id="gravarimpuesto" type="submit" value="Grabar" name="editarum" />
                     
                   
                
            </div>
        </form>

        </body>
</html>
 <?php 
        }
      }