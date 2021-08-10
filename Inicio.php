
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inicio</title>
        
    
        
        
        
        
  <link rel="stylesheet" href="bootstrap.min.css" />
 
        <link rel="stylesheet" href="estilo.css">
        
        
        	
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
       
   
       
   
    </head>
    
    <div id="menu-wrapper">
    
    <div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
                                    
					<li><a href="">Configuracion</a>
                                        <ul>
							<li><a href="">Configuracion de Productos</a>
                                                        
                                                        <ul>
									<li><a href="Configuaracion/Configuaracion de Productos/MantenerProductos.php">Mantener Producto</a></li>
									<li><a href="Configuaracion/Configuaracion de Productos/MantenerImpuesto.php">Mantener Impuesto</a></li>
									<li><a href="Configuaracion/Configuaracion de Productos/MantenerMarca.php">Mantener Marca</a></li>
									
								</ul>
                                                        </li>
							<li><a href="">Configuracion de Categorias</a>
                                                        <ul>
									<li><a href="Configuaracion/Configuracion de Categorias/MantenerRubro.php">Mantener Rubro</a></li>
									<li><a href="Configuaracion/Configuracion de Categorias/MantenersubRubro.php">Mantener Sub-Rubro</a></li>
									<li><a href="Configuaracion/Configuracion de Categorias/MantenerCategoriaDeProductos.php">Mantener Categoria de Producto</a></li>
									
								</ul>
                                                        </li>
							<li><a href="">Congiguracion de Costos</a>
                                                        <ul>
									<li><a href="Configuaracion/Configuracion de Costos/MantenerCentroDeCostos.php">Mantener Centro de Costos</a></li>
									<li><a href="Configuaracion/Configuracion de Costos/MantenerCentroDeProduccion.php">Matener Centro de Produccion</a></li>
									<li><a href="Configuaracion/Configuracion de Costos/MantenerAlmacen.php">Mantener Almacen</a></li>
                                                                        <li><a href="Configuaracion/Configuracion de Costos/MantenerBanco.php">Mantener Banco</a></li>
									
								</ul>
                                                        </li>
							<li><a href="">Configuración de Contactos</a>
								<ul>
									<li><a href="Configuaracion/Configuracion de Contactos/MantenerEmpresa.php">Mantener Empresa</a></li>
									<li><a href="Configuaracion/Configuracion de Contactos/MantenerSucursal.php">Mantener Sucursal</a></li>
									<li><a href="Configuaracion/Configuracion de Contactos/MantenerProveedor.php">Mantener Proveedor</a></li>
									<li><a href="Configuaracion/Configuracion de Contactos/MantenerCliente.php">Mantener Cliente</a></li>
                                                                        <li><a href="Configuaracion/Configuracion de Contactos/MantenerUsuario.php">Mantener Usuario</a></li>
									<li><a href="Configuaracion/Configuracion de Contactos/MantenerEmpleado.php">Mantener Empledo</a></li>
								</ul>
							</li>
                                                        <li><a href="">Configuración de Localidades</a>
								<ul>
									<li><a href="Configuaracion/Configuracion de Localidades/MantenerCiudad.php">Mantener Ciudad</a></li>
									<li><a href="Configuaracion/Configuracion de Localidades/MantenerPais.php">Mantener Pais</a></li>
									
								</ul>
							</li>
                                                        <li><a href="">Configuración de Unidades</a>
								<ul>
									<li><a href="Configuaracion/Configuracion de Unidades/MantenerUnidadDeMedida.php">Mantener Unidad de Medida</a></li>
									<li><a href="Configuaracion/Configuracion de Unidades/MantenerFormula.php">Mantener Formula</a></li>
									<li><a href="Configuaracion/Configuracion de Unidades/MantenerPlantillaDeProductos.php">Mantener Plantilla de Productos</a></li>
									<li><a href="Configuaracion/Configuracion de Unidades/MantenerListadoDePrecioDeProveedor.php">Mantener Lista de Precios de Proveedores</a></li>
                                                                       
								</ul>
							</li>
						</ul>
                                        </li>
                                        <li><a href="">Compras</a>
                                        <ul>
							<li><a href="">Movimientos de Compras</a>
                                                        <ul>
									<li><a href="RegistrarPedidodeCompras.php">Registrar Pedido de Compras</a></li>
									<li><a href="RegistrarPresupuestoDeProveedor.php">Registrar Presupuesto de Proveedor</a></li>
									<li><a href="Registrarordenesdecompras.php">Registrar Orden de Compras</a></li>
									<li><a href="RegistrarCompras.php">Registrar Compras</a></li>
                                                                        <li><a href="Movimientos de Compras/RegistrarNotaDeCreditoyDebito.php">Registrar Notas de Credito-Debito</a></li>
                                                                      
								</ul>
                                                        
                                                        </li>
							<li><a href="">Movimientos de Productos de Stock</a>
                                                        <ul>
								<li><a href="Movimientos de Productos de Stock/RegistrarAjustesDeInventario.php">Registrar ajustes de inventario</a></li>
                                                                <li><a href="Movimientos de Productos de Stock/RegistrarNotaDeRemisionDeCompra.php">Registrar Nota de Remision de Compra</a></li>
						                 <li><a href="Movimientos de Productos de Stock/RegistrarPedidoDeRemision.php">Registrar Pedido de Nota de Remision</a></li>
						                <li><a href="Registrarordenesdecompras.php">Controlar el inventario por depósitos</a></li>
							        
								</ul>
                                                        
                                                        </li>
							
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
							<li><a href="">Movimientos de Ordenes</a>
                                                        <ul>
									<li><a href="RegistrarEtapadeProduccion.php">Registrar Etapa de Produccion</a></li>
									<li><a href="">Subme</a></li>
									<li><a href="RegistrarOrdenDeProduccion.php">Registrar Orden de Produccion</a></li>
									<li><a href="">Submenu4</a></li>
                                                                        <li><a href="">Submenu4</a></li>
                                                                        <li><a href="RegistrarProduccionTerminada.php">Registrar Produccion Terminada</a></li>
								</ul>
                                                        </li>
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
					<li><a href="">Facturacion</a>
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
                                        
					<li><a href="">Informes Web </a>
                                         <ul>
							<li><a href="Informes Web/Informes de Movimientos de Compras/Informes de Movimientos de Compras.php">Infomes de Movimientos de Compras</a> </li>
							<li><a href="">sub menu</a></li>
							<li><a href="">Submenu3</a></li>
							<li><a href="">Submenu4</a> </li>
							<li><a href="">sub menu</a></li>
							<li><a href="">Submenu3</a></li>
							<li><a href="Informes Web Referenciales/Informes de Referenciales.php">Informes Web de Referenciales</a> 
                                                        
                                                        
                                                        </li>	
							
						</ul>
                                        </li>
                                        
				</ul>
                            
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
    </div>
   
        
   
          <div id="menu">
	
		
		
	
	
</div>
    
     

            
         
  
        
 
     
            
        
         
             
       
        
      
     
                  

 
 
      
            
            
      </div>
<li>		<a  href="javascript:Clickheretoprint()" style="font-size:20px;"><button  class="btn btn-success btn-large"><i class="icon-print"></i> Imprimir</button></a></li>



       


   

      