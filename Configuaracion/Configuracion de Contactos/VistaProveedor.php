
<!DOCTYPE html>
<html>
<head>

<title>
Vista Proveedor
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
   
         <form method="post"action="actionproveedor.php">
   
          <div id="menu">
	
		<li><a href="MantenerProveedor.php">Mantener Proveedor</a></li>
		<li><?php
					$cod_emp=$_GET['proveedor'];
include('../../database_connection.php');
$statement = $connect->prepare("
        SELECT pr.id,pr.Rucproveedor,pr.nombreprov,pr.nrtelefono,pr.direccion,pr.timbrado,c.descripcion AS ciudad,p.descripcion AS pais

FROM proveedor pr,pais p, ciudad c WHERE pr.codigociudad=c.codigociudad AND pr.codigopais=p.codigopais and pr.id = :proveedor
ORDER BY pr.RucProveedor ASC
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':proveedor'       =>  $_GET["proveedor"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
               {
            echo '
              <tr>
              
               
              
               
                           <td style="margin-left:100px;"><a href="EditarProveedor.php?updatep=1&proveedor='.$row["id"].'"><span class="btn btn-success btn-large"><i class="icon-print"></i>Editar</span></a></td>
               
              </tr>
            ';
          
        }
				?>		</li>
		<li>  <input type="hidden" name="id" id="id <?php echo $m; ?>" value="<?php echo $row["id"]; ?>" />
                 <input  name="deleteim"  type="submit" value="Eliminar"class="btn btn-success btn-large"  />	</li>
	
				<?php
					}
				?>
	
</div>
<div class="content" id="content">
  
<?php
					$cod_emp=$_GET['proveedor'];
include('../../database_connection.php');
$statement = $connect->prepare("SELECT pr.id, pr.Rucproveedor,pr.nombreprov,pr.nrtelefono,pr.direccion,pr.timbrado,c.descripcion AS ciudad,p.descripcion AS pais

FROM proveedor pr,pais p, ciudad c WHERE pr.codigociudad=c.codigociudad AND pr.codigopais=p.codigopais and pr.id = :proveedor
ORDER BY pr.RucProveedor ASC
            LIMIT 1
        
        ");
        $statement->execute(
          array(
            ':proveedor'       =>  $_GET["proveedor"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
       
				?>
				<tr class="record">
                                <div class="row" style="margin-left: 500px;">
                    <div class="col-md-8">
                      <br /> <b>Id :</b>
                      
                        <b>  </b><b ><?php echo $row['id']; ?></b><br />
                        
                    </div>
                                    
                    <div class="col-md-8">
                     <br /> <b>Ruc :</b>
                        <b>  </b><b><?php echo $row['Rucproveedor']; ?></b><br />
                      
                      
                    </div>
                                    <div class="col-md-8">
                     <br /> <b>Proveedor :</b>
                        <b>  </b><b><?php echo $row['nombreprov']; ?></b><br />
                      
                      
                    </div>
                       <div class="col-md-8">
                     <br /> <b>Telefono :</b>
                        <b>  </b><b><?php echo $row['nrtelefono']; ?></b><br />
                      
                      
                    </div>       
                     <div class="col-md-8">
                     <br /> <b>Direccion :</b>
                        <b>  </b><b><?php echo $row['direccion']; ?></b><br />
                      
                      
                    </div> 
             <div class="col-md-8">
                     <br /> <b>Timbrado :</b>
                        <b>  </b><b><?php echo $row['timbrado']; ?></b><br />
                      
                      
                    </div>
                
                                    <div class="col-md-8">
                     <br /> <b>Ciudad :</b>
                        <b>  </b><b><?php echo $row['ciudad']; ?></b><br />
                      
                      
                    </div>
                                    <div class="col-md-8">
                     <br /> <b>Pais :</b>
                        <b>  </b><b><?php echo $row['pais']; ?></b><br />
                      
                      
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
 


