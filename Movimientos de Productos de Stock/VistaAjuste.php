<!DOCTYPE html>
<html>
<head>

<title>
Vista Ajuste
</title>
 <link href="css/bootstrap.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="../jquery.min.js"></script>
    <script src="../bootstrap.min.js"></script>
    <script src="../adsbygoogle.js"></script>
    <script src="../jquery.dataTables.min.js"></script>
    <script src="../dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="../dataTables.bootstrap.min.css">
<!--       <script src="buscador/datos/jquery-1.6.4.min.js"></script>
<script src="buscador/datos/jquery-1.6.4.min.js"></script>-->
<!--  <link rel="stylesheet"href="bootstrap.min.css">-->
   <link rel="stylesheet" href="../buscador/dist/css/bootstrap-select.css">
<!--  <script src="buscador/datos/jquery.min.js"></script>-->
<!--  <script src="buscador/datos/bootstrap.min.js"></script>-->
  <script src="../buscador/dist/js/bootstrap-select.js"></script>
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1800, height=1800, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
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
   
        
   
          <div id="menu">
	
	<li class=""><a href="Registrar Transferencia.jsp">Informes de Movimientos de Stock</a></li>
		<li><?php
					$idAjuste=$_GET['idAjuste'];
                                       
include('../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM vistaajuste
             WHERE idAjuste = :idAjuste
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':idAjuste'       =>  $_GET["idAjuste"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
               {
            echo '
              <tr>
              
               
              
                
                <td style="margin-left:100px;"><a href="EditarPedidoCompras.php?update1=1&idpedidocompra='.$row["idAjuste"].'"><span class="btn btn-success btn-large"><i class="icon-print"></i>Editar</span></a></td>
               
              </tr>
            ';
          
        }
				?>		</li>
		<li>  <input type="hidden" name="codigoproducto" id="codigoproducto <?php echo $m; ?>" value="<?php echo $row["idAjuste"]; ?>" />
                 <input  name="delete"  type="submit" value="Eliminar"class="btn btn-success btn-large"  />	</li>
	
				<?php
					}
				?>
	

		<li>		<a  href="javascript:Clickheretoprint()" style="font-size:20px;"><button  class="btn btn-success btn-large"><i class="icon-print"></i> Imprimir</button></a></li>
		
	
	
</div>
<div class="content" id="content">
<?php
					$idAjuste=$_GET['idAjuste'];
include('../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM vistaajuste
            WHERE idAjuste = :idAjuste
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':idAjuste'       =>  $_GET["idAjuste"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
				?>
				<tr class="record">
                                <div class="row" style="margin-left: 500px;">
                    <div class="col-md-8">
                      <br /> <b>ID :</b>
                        <b>  </b><b><?php echo $row['idAjuste']; ?></b><br />
                       
                    </div>
                                    
                    <div class="col-md-8">
                     <br /> <b>Fecha :</b>
                        <b>  </b><b><?php echo $row['Fecha']; ?></b><br />
                      
                      
                    </div>
                                        <div class="col-md-8">
                     <br /> <b>Vencimiento:</b>
                        <b>  </b><b><?php echo $row['Notas']; ?></b><br />
                      
                      
                    </div>
                                    <div class="col-md-8">
                      <br /> <b>Almacen :</b>
                        <b>  </b><b><?php echo $row['almacen']; ?></b><br />
                      
                    </div>
                                        <div class="col-md-8">
                      <br /> <b>Categoria de Producto :</b>
                        <b>  </b><b><?php echo $row['nombrecategoria']; ?></b><br />
                      
                    </div>
                                                            <div  class="col-md-8">
                    
                    </div>
                  </div>    
<!--				<td><?php echo $row['Fecha']; ?></td>
				<td><?php echo $row['idPedidoCompra']; ?></td>
				<td><?php echo $row['Vencimiento']; ?></td>
				<td>-->
				
				
				
				<?php
					}
				?>
<!--                                <div class="pull-right" style="margin-left:500px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button c><i class="icon-print"></i> Print</button></a>
		</div>	-->
 



 



	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
           
        </div><!--/span-->
		
	<div class="span10">
	


<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	
	
	</div>
	<div style="width: 136px; float: left; height: 70px;">
            
	<table cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<b>Items</b>
<!--			<b><?php echo $idAjuste ?></b>-->
		</tr>
		
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 120%; margin-top:-120px;">
	<table border="2" cellpadding="1" rules="all" style="font-family: arial; font-size: 13px;	text-align:left;" width="100%">
		<thead >
			<tr >
				<th  >Nro°</th>
				<th >Codigo</th>
				<th width="20%">Producto</th>
                                <th width="20%">Precio</th>
				<th>Esperada</th>
                                <th>Deportada</th>
				<th>Faltante</th>
				<th>Sobrante</th>
                               
			</tr>
		</thead>
		<tbody rules="all"  cellspacing="1" border="2">
			
				<?php
					$idAjuste=$_GET['idAjuste'];
include('../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM vistaajuste
            WHERE idAjuste = :idAjuste
         
        ");
        $statement->execute(
          array(
            ':idAjuste'       =>  $_GET["idAjuste"]
            )
          );
        $item_result = $statement->fetchAll();
                    $m = 0;
                    foreach($item_result as $sub_row){
                         $m = $m + 1;
				?>
				<tr style="font-family:arial; font-size:15px;"  >
                         
                      <td ><span id="sr_no"><?php echo $m; ?></span></td>
                      
                       <td><?php echo $sub_row["codigoproducto"]; ?></td>
                      <td width="40%" ><?php echo $sub_row["producto"]; ?></td>
                      <td><?php echo $sub_row["precio"]; ?></td>
                      <td><?php echo $sub_row["Esperada"]; ?></td>
                       <td><?php echo $sub_row["Deportada"]; ?></td>
                      <td><?php echo $sub_row["Faltante"]; ?></td>
                      <td><?php echo $sub_row["Sobrante"];?></td>
           
                     
                    
                    </tr>
				
			
				
					
					<?php
					}
				?>
					
				
                  
				
					
                                        <tr>
                                        <td  colspan="6" style=" text-align:right;"><strong    style="font-size: 12px;">Total Faltante: &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;"><?php  echo $sub_row["totalfaltante"]; ?>
					</strong></td>
                                        </tr>
				 <tr>
                                        <td  colspan="6" style=" text-align:right;"><strong    style="font-size: 12px;">Total Sobrante: &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;"><?php  echo $sub_row["totalsobrante"]; ?>
					</strong></td>
                                        </tr>
				
			
		</tbody>
	</table>
             
	
           
	</div>
    
	</div>
            
	</div>
	</div>

</div>

</div>


<div style="margin-left: 500px;">
                      <br /> <b>usuario :</b>
                        <b>  </b><b><?php echo $sub_row['Fecha']; ?></b><br />
                      
                    </div>
    <div style="margin-left: 500px;">
                      <br /> <b>Registro :</b>
                        <b>  </b><b><?php echo $sub_row['Fecha']; ?></b><br />
                      
                    </div>
    <div style="margin-left: 500px;" >
                      <br /> <b>Ultima Modificacion :</b>
                        <b>  </b><b><?php echo $sub_row['Fecha']; ?></b><br />
                      
                    </div>
    <div style="margin-left: 500px;">
                      <br /> <b>Usuario de La Modificacion:</b>
                        <b>  </b><b><?php echo $sub_row['Fecha']; ?></b><br />
                      
                    </div>