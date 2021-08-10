
<?php
//index.php

include('../../database_connection.php');

$subrubros = '';

$query = "
 SELECT * FROM subrubros   ORDER BY codigosubrubro ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $subrubros .= '<option value="'.$row["codigosubrubro"].'">'.$row["subrubro"].'</option>';
 
}

?>

<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" type="text/css" href="../../estilo.css">
     <link rel="stylesheet" href="../../bootstrap.min.css" />
        <title>Editar Sub-Rubro</title>
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
      elseif(isset($_GET["updatep"]) && isset($_GET["categoria"]))
      {
include('../../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM categoriadeproductos
            WHERE idcategoria= :categoria
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':categoria'       =>  $_GET["categoria"]
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
	
		<li><a href="MantenerCategoriaDeProductos.php">Mantener Categoria de Productos</a></li>
		
		
	
	
</div>
        
         <h3 id="h6" style="color: black">Editar Categoria</a></h3>    
        <form method="post" action="actioncategoria.php" id="getmoneda">
               <h4 id="h1" style="color: black">Editar SubRubro</h4>
                      
             <div>
         
 <label id="labelsubrubro">Sub-Rubro</label>
               <select  id="combosubrubros"  name="combosubrubros"> 
          
              <?php echo $subrubros; ?> 


        
        </select>
                         
       
                <label id="labelgeneral">Nombre de Categoria de Producto</label>
                 <input id="txtnombremoneda" type="text" name="txtnombre" value="<?php echo $row["nombrecategoria"]; ?>" />
                  
                         <input type="hidden" name="idcategoria" id="idcategoria <?php echo $m; ?>" value="<?php echo $row["idcategoria"]; ?>" />
                            <input id="gravarimpuesto" type="submit" value="Grabar" name="updatecategoria" />
                     
                   
                
            </div>
        </form>

        </body>
</html>
  <?php 
        }
      }