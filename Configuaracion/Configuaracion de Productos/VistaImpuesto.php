
<!DOCTYPE html>
<html>
<head>

<title>
Vista Impuesto
</title>
   <link rel="stylesheet" type="text/css" href="../../estilo.css">
     <link rel="stylesheet" href="../../bootstrap.min.css" />
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
   
   
<body id="hhmenu">
      
        
         <div id="menu-wrapper" >
    
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
   
         <form method="post"action="actioni.php">
   
          <div id="menu">
	
		<li><a href="Registrar Transferencia.jsp">Registrar Peido de Compras</a></li>
		<li><?php
					$impuesto=$_GET['impuesto'];
include('../../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM impuestos
            WHERE idimpuesto= :impuesto
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':impuesto'       =>  $_GET["impuesto"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
               {
            echo '
              <tr>
              
               
              
               
                           <td style="margin-left:100px;"><a href="EditarImpuesto.php?updatep=1&impuesto='.$row["idimpuesto"].'"><span class="btn btn-success btn-large"><i class="icon-print"></i>Editar</span></a></td>
               
              </tr>
            ';
          
        }
				?>		</li>
		<li>  <input type="hidden" name="idimpuesto" id="idimpuesto <?php echo $m; ?>" value="<?php echo $row["idimpuesto"]; ?>" />
                 <input  name="deleteim"  type="submit" value="Eliminar"class="btn btn-success btn-large"  />	</li>
	
				<?php
					}
				?>
	
</div>
<div class="content" id="content">
  
<?php
					$impuesto=$_GET['impuesto'];
include('../../database_connection.php');
$statement = $connect->prepare(" SELECT * FROM impuestos
            WHERE idimpuesto= :impuesto
            LIMIT 1
        
        ");
        $statement->execute(
          array(
            ':impuesto'       =>  $_GET["impuesto"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
       
				?>
				<tr class="record">
                                <div class="row" style="margin-left: 500px;">
                    <div class="col-md-8">
                      <br /> <b>Id :</b>
                      
                        <b>  </b><b ><?php echo $row['idimpuesto']; ?></b><br />
                        
                    </div>
                                    
                    <div class="col-md-8">
                     <br /> <b>Nombre :</b>
                        <b>  </b><b><?php echo $row['nombre']; ?></b><br />
                      
                      
                    </div>
                            
                                     <div class="col-md-8">
                     <br /> <b>Tasa :</b>
                        <b>  </b><b><?php echo $row['tasa']; ?></b><br />
                      
                      
                    </div>
                                       <div class="col-md-8">
                     <br /> <b>Aplicar a Ventas:</b>
                        <b>  </b><b><?php echo $row['aplicarventas']; ?></b><br />
                      
                      
                    </div>
                                  <div class="col-md-8">
                      <br /> <b>Aplicar a Compras :</b>
                        <b>  </b><b><?php echo $row['aplicarcompras']; ?></b><br />
                      
                    </div>
                                        <div class="col-md-8">
                      <br /> <b>Empresa :</b>
                        <b>  </b><b><?php echo $row['empresa']; ?></b><br />
                      
                    </div>
                                                            <div  class="col-md-8">
                      <br /> <b>Fecha de Registro :</b>
                        <b>  </b><b></b><br />
                      
                    </div>
	
                                                            <div  class="col-md-8">
                      <br /> <b>Registrado Por :</b>
                        <b>  </b><b></b><br />
                      
                    </div>
                                    <div  class="col-md-8">
                      <br /> <b>Fecha Ultima Modificacion :</b>
                        <b>  </b><b></b><br />
                      
                    </div>
                                    
                                    <div  class="col-md-8">
                      <br /> <b>Modificado Por:</b>
                        <b>  </b><b></b><br />
                      
                    </div>
                                    
                                    
                                    
                                    
                                  
                  </div>    
			
		   </div>   		
			
                 </form>
				<?php
					}
				?>
<!--                                <div class="pull-right" style="margin-left:500px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button c><i class="icon-print"></i> Print</button></a>
		</div>	-->
 


