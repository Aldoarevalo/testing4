
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
   <head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear Cliente</title>
         <link rel="stylesheet" type="text/css" href="../../estilo.css">
<!--     <link rel="stylesheet" href="../../bootstrap.min.css" type="text/css"  />-->
<!--     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
   -->
<link rel="stylesheet" href="../Configuaracion de Productos/assets/signup-form.css" type="text/css" />
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
                
        <style>
            
            #txtpreciop {
     top:199px;
   /*   margin:20px 10px;
/*    padding:3px 150px;
    background-color:white;*/
   position: absolute;
   margin-left:50px;
    border-radius: 5px;
    border: 1px solid #C4C4C4;
    width: 254px;
    height: 30px;
    font-family: Helvetica,Arial,sans-serif;
    }
    #txtnombreprod {
/*       margin-top:20px;*/
     margin:20px 10px;
/*    padding:3px 150px;
    background-color:white;*/
   margin-left:230px;
    border-radius: 5px;
    border: 1px solid #C4C4C4;
    width: 354px;
    height: 30px;
    font-family: Helvetica,Arial,sans-serif;
    

    
}
#labelgeneral12{
 
   position: relative;
    top:21px;
   margin-left:300px;
    display: block;
    color: #585858;
    font-weight: bold;
    margin-bottom: 0px;
}
#labelgeneral1{
 
   position: relative;
    top:27.5px;
   margin-left:300px;
    display: block;
    color: #585858;
    font-weight: bold;
    margin-bottom: 0px;
}
#labelgeneral2{
 
   position: relative;
    top:15px;
   margin-left:300px;
    display: block;
    color: #585858;
    font-weight: bold;
    margin-bottom: 5px;
}
#txtcodpro {
/*       margin-top:20px;*/
     margin:20px 10px;
/*    padding:3px 150px;
    background-color:white;*/
   margin-left:230px;
    border-radius: 5px;
    border: 1px solid #C4C4C4;
    width: 354px;
    height: 30px;
    font-family: Helvetica,Arial,sans-serif;
    

    
}
#combomar1 {
    
    margin-top:22px;
       margin-bottom: 0px ;
   margin-left: 240px;
    display: inline-block;
    cursor: pointer;
    width: 254px;
    border: 1px solid #C4C4C4;
    background: transparent url("../img/elements/select.png") repeat scroll right top;
    padding: 8px;
    font-weight: bold;
    font-size: 12px;
    color: #979797;
    text-shadow: 0px 1px #FFF;
    border-radius: 6px;
    font-family: Helvetica,Arial,sans-serif;
    margin-bottom: 25px;
}
#comborub1 {
    position: relative;
    margin-top:25px;
       margin-bottom: 5px ;
   margin-left: 30px;
    display: inline-block;
    cursor: pointer;
    width: 254px;
    border: 1px solid #C4C4C4;
    background: transparent url("../img/elements/select.png") repeat scroll right top;
    padding: 8px;
    font-weight: bold;
    font-size: 12px;
    color: #979797;
    text-shadow: 0px 1px #FFF;
    border-radius: 6px;
    font-family: Helvetica,Arial,sans-serif;
    margin-bottom: 25px;
  
}
#combosub1{
   position: relative;
    margin-top:46px;
       margin-bottom: 0px ;
   margin-left: 240px;
    display: inline-block;
    cursor: pointer;
    width: 254px;
    border: 1px solid #C4C4C4;
    background: transparent url("../img/elements/select.png") repeat scroll right top;
    padding: 8px;
    font-weight: bold;
    font-size: 12px;
    color: #979797;
    text-shadow: 0px 1px #FFF;
    border-radius: 6px;
    font-family: Helvetica,Arial,sans-serif;
    margin-bottom: 25px;
  
}
 #combocat1 {
   position: absolute;
    top:480px;
       margin-bottom: 5px ;
   margin-left: 35px;
    display: inline-block;
    cursor: pointer;
    width: 254px;
    border: 1px solid #C4C4C4;
    background: transparent url("../img/elements/select.png") repeat scroll right top;
    padding: 8px;
    font-weight: bold;
    font-size: 12px;
    color: #979797;
    text-shadow: 0px 1px #FFF;
    border-radius: 6px;
    font-family: Helvetica,Arial,sans-serif;
    margin-bottom: 25px;
  
} 
#comboimp1  {
    margin-top:22px;
       margin-bottom: 0px ;
   margin-left: 240px;
    display: inline-block;
    cursor: pointer;
    width: 254px;
    border: 1px solid #C4C4C4;
    background: transparent url("../img/elements/select.png") repeat scroll right top;
    padding: 8px;
    font-weight: bold;
    font-size: 12px;
    color: #979797;
    text-shadow: 0px 1px #FFF;
    border-radius: 6px;
    font-family: Helvetica,Arial,sans-serif;
    margin-bottom: 25px;
}
#combounidad1 {
   position: absolute;
    top:580px;
       margin-bottom: 0px ;
   margin-left: 35px;
    display: inline-block;
    cursor: pointer;
    width: 254px;
    border: 1px solid #C4C4C4;
    background: transparent url("../img/elements/select.png") repeat scroll right top;
    padding: 8px;
    font-weight: bold;
    font-size: 12px;
    color: #979797;
    text-shadow: 0px 1px #FFF;
    border-radius: 6px;
    font-family: Helvetica,Arial,sans-serif;
    margin-bottom: 25px;
  
}

#gravarprod {
/*  margin: 100px;*/

  margin-bottom: 70px;
    background-color: #5CACF3;
    background-image: -moz-linear-gradient(center top , #6EBFFF 0%, #6FBDFC 50%, #5CACF3 50%, #509EE8 100%);
    border: 1px solid #2979A9;
    border-radius: 5px;
    box-shadow: 0px 1px 3px #C3EBFF inset;
    color: #FFF;
    font: bold 12px/1 helvetica,arial,sans-serif;
    padding: 10px 20px;
    text-align: center;
    text-shadow: 0px 1px 1px #335778;
    margin-left:270px;
    margin-top: 30px;
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
     
           
         
        
             
             <li></li>
            <li></li>
  
    </div>
   
        
   
          <div id="menu">
	
<!--		<li><a href="crearempleado.jsp">Crear Proveedor</a></li>-->
		<li><a href="Configuracion/MantenerCliente.php">Mantener Cliete</a></li>
		
	
	
</div>
     
         <h6 id="h6" style="color: black">Crear Cliente</h6>    
        <form method="post"  action="actioncliente.php" id="getmoneda" name ="getmoneda"  class="formularioTipo1">
                <h1 id="h1" style="color: black">Crear Cliente</a></h1>    
                      
              <div>
         
                <input type="hidden" name="accion" value="grabarproveedor" />
               
                         
       
                  <div class="form-group">
                  <label id="labelsimbolo">Ruc de Cliente</label>
                   <input id="txtsimbolo"type="text" name="txtruc" value="" />
                     <span class="help-block" id="error"></span>
                     </div>
                   <div class="form-group">
                     <label id="labelprecioventa">Nombre de Cliente</label>
                     <input id="txtprecioventa" type="text" name="txtnomcli" value="" />
                          <span class="help-block" id="error"></span>
                        </div>
                <div class="form-group">
                       <label id="labelpreciocompra">Telefono</label>
                         <input id="txtpreciocompra" type="text" name="txttelefono" value="" />
                                <div class="form-group">
                         <label id="labelpreciocompra">Direccion</label>
                         <input id="txtpreciocompra" type="text" name="txtdireccion" value="" />
                          <span class="help-block" id="error"></span>
                        </div>
<!--                          <label id="labelpreciocompra">Timbrado</label>
                         <input class="col-md-12" id="txtpreciocompra" type="text" name="txttimbrado" value="0" />-->
                          <label id="labelsubrubro">ciudad</label>
                         <select  id="combosubrubros"  name="combociudad"> 
           <?php echo $ciudad; ?>
            
        
        </select>
             <label id="labelsubrubro">Pais</label>
           <select  id="combosubrubros"  name="combopais"> 
          
            <?php echo $pais; ?>
        
        </select>
       
                     
                   
                
            </div>
                  <input id="gravarmoneda" type="submit" value="Grabar" name="crear_cliente" />
        </form>
         

            <script src="../Configuaracion de Productos/bootstrap1/js/bootstrap.min.js"></script>
    <script src="../Configuaracion de Productos/assets1/jquery-1.11.2.min.js"></script>
    <script src="../Configuaracion de Productos/assets1/jquery.validate.min.js"></script>
    <script src="../Configuaracion de Productos/assets/ass2.js"></script>    

        </body>
</html></

