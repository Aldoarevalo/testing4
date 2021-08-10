
<!DOCTYPE html>
<html>
<head>

<title>
Vista Empleado
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
   
         <form method="post"action="actionempleado.php">
   
          <div id="menu">
	
		<li><a href="MantenerEmpleado.php">Mantener Empleado</a></li>
		<li><?php
					$cod_emp=$_GET['empleado'];
include('../../database_connection.php');
$statement = $connect->prepare("
SELECT e.codigoempleado,e.ciemp,e.nombres,e.direccion,e.nrtelefono,p.descripcion as pais,c.descripcion as ciudad,s.nombre sucursal

FROM empleado e,ciudad c,pais p,sucursal s
WHERE c.codigociudad=e.codigociudad AND p.codigopais=e.codigopais AND s.Idsucursal=e.Idsucursal and e.codigoempleado=:empleado
limit 1
        ");
        $statement->execute(
          array(
            ':empleado'       =>  $_GET["empleado"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
               {
            echo '
              <tr>
              
               
              
               
                           <td style="margin-left:100px;"><a href="EditarEmpleado.php?updatep=1&empleado='.$row["codigoempleado"].'"><span class="btn btn-success btn-large"><i class="icon-print"></i>Editar</span></a></td>
               
              </tr>
            ';
          
        }
				?>		</li>
		<li>  <input type="hidden" name="codigoempleado" id="codigoempleado  <?php echo $m; ?>" value="<?php echo $row["codigoempleado"]; ?>" />
                 <input  name="deleteim"  type="submit" value="Eliminar"class="btn btn-success btn-large"  />	</li>
	
				<?php
					}
				?>
	
</div>
<div class="content" id="content">
  
<?php
					$cod_emp=$_GET['empleado'];
include('../../database_connection.php');
$statement = $connect->prepare("SELECT e.codigoempleado,e.ciemp,e.nombres,e.direccion,e.nrtelefono,p.descripcion as pais,c.descripcion as ciudad,s.nombre sucursal

FROM empleado e,ciudad c,pais p,sucursal s
WHERE c.codigociudad=e.codigociudad AND p.codigopais=e.codigopais AND s.Idsucursal=e.Idsucursal and e.codigoempleado=:empleado
limit 1
        
        ");
        $statement->execute(
          array(
            ':empleado'       =>  $_GET["empleado"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
       
				?>
				<tr class="record">
                                <div class="row" style="margin-left: 500px;">
                    <div class="col-md-8">
                      <br /> <b>Id :</b>
                      
                        <b>  </b><b ><?php echo $row['codigoempleado']; ?></b><br />
                        
                    </div>
                                    
                    <div class="col-md-8">
                     <br /> <b>Ruc :</b>
                        <b>  </b><b><?php echo $row['ciemp']; ?></b><br />
                      
                      
                    </div>
                                     <div class="col-md-8">
                     <br /> <b>Cliente :</b>
                        <b>  </b><b><?php echo $row['nombres']; ?></b><br />
                      
                      
                    </div>
                       <div class="col-md-8">
                     <br /> <b>Direccion :</b>
                        <b>  </b><b><?php echo $row['direccion']; ?></b><br />
                      
                      
                    </div>       
                     <div class="col-md-8">
                     <br /> <b>Telefono :</b>
                        <b>  </b><b><?php echo $row['nrtelefono']; ?></b><br />
                      
                      
                    </div> 
            
                
                                    <div class="col-md-8">
                     <br /> <b>Ciudad :</b>
                        <b>  </b><b><?php echo $row['ciudad']; ?></b><br />
                      
                      
                    </div>
                                    <div class="col-md-8">
                     <br /> <b>Pais :</b>
                        <b>  </b><b><?php echo $row['pais']; ?></b><br />
                      
                      
                    </div>
                                                  <div class="col-md-8">
                     <br /> <b>Sucursal :</b>
                        <b>  </b><b><?php echo $row['sucursal']; ?></b><br />
                      
                      
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
 


