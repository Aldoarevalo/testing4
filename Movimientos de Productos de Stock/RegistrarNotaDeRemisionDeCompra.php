<?php
//index.php

include('../database_connection.php');

$producto = '';

$query = "  SELECT p.codigoproducto,p.producto,c.nombrecategoria FROM productos p,categoriadeproductos c 
 WHERE p.idcategoria=c.idcategoria ORDER BY p.codigoproducto,p.producto,c.nombrecategoria ASC ";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $producto .= '<option value="'.$row["producto"].'">'.$row["codigoproducto"].'..'.$row["producto"].'..'.$row["nombrecategoria"].'</option>';
}

?>
<?php
//index.php

include('../database_connection.php');

$almac = '';

$query = "
 SELECT * FROM almacen   ORDER BY almacen ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $almac .= '<option value="'.$row["codigoalmacen"].'">'.$row["codigoalmacen"].'.'.$row["almacen"].'</option>';
 
}

?>
<?php
//index.php

include('../database_connection.php');

$almac1 = '';

$query = "
 SELECT * FROM almacen   ORDER BY almacen ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $almac1 .= '<option value="'.$row["codigoalmacen"].'">'.$row["codigoalmacen"].'.'.$row["almacen"].'</option>';
 
}

?>
<?php
//index.php

include('../database_connection.php');

$con = '';

$query = "
 SELECT * FROM empleado  ORDER BY codigoempleado ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $con .= '<option value="'.$row["codigoempleado"].'">'.$row["ciemp"].'_'.$row["nombres"].'</option>'; 
 
}

?>
<html>
       <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <a href=></a>
     <title>Registrar Presupuesto de Proveedor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="../estilo.css">
    <script src="../jquery.min.js"></script>
<!--    <script src="bootstrap.min.js"></script>-->
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
  
      <link rel="stylesheet" href="../jquery1102/themes/base/jquery.ui.all.css">
	<script src="../jquery1102/jquery-1.9.1.js"></script>
	<script src="../jquery1102/ui/jquery.ui.core.js"></script>
	<script src="../jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="../jquery1102/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="../jquery1102/demos/demos.css">
        
           
             <script src="../bootstrap/js/bootstrap.min.js"></script>
<!--    <script src="assets/jquery-1.11.2.min.js"></script>-->
    <script src="../assets/jquery.validate.min.js"></script>
    <script src="../assets/validadorcompras.js"></script>
         <script>
	
        	$(function() {
		$( "#datepicker" ).datepicker({
                    altField: "#alternate",
			altFormat: "DD, d MM, yy",
			showOn: "button",
			buttonImage: "../jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	});
      
function newPage(url){
window.open(url,"","aldo");
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
						                 <li><a href="RegistrarPresupuestoDeProveedor.php">Registrar Presupuesto de Proveedor</a></li>
						                <li><a href="Registrarordenesdecompras.php">Registrar Orden de Compras</a></li>
							        
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
    
     
          
       
           <h3><a style="color: black" href="Transferencias.jsp">Reporte de Notas de Remision</a></h3> 
        <form method="post"action="actionremision.php" id="gett">
           <input type="hidden" name="accion" value="RegistrarTransferencia" />
            <h4><a style="color: black" href="Reportes de Compras.jsp">Registrar Nota de Remision</a></h4>
       
      <label id="labelempresaordencompra">Almacen de Origen</label>  
      
                 
        <select  id="aldo"  name="aldo" class="form-control action"> 
          
           
              <?php echo $almac; ?> 
        
        </select>
           
        
    <label id="labelcentrodecostosorden" >Almacen de Destino</label>       
<select id="aldo1"  name="destino"> 
            <?php echo $almac1; ?>    
        </select>
      
   
        
           <label style="top:250px" >Fecha: <input readonly="false"type="text" id="datepicker" name="fecha">&nbsp;<input readonly="false" type="text" id="alternate" size="30"/></label>
           <div  style="margin: 50px;position: absolute;" class="form-group">
     <label style="position: relative;top:4px;margin-left:0px;">buscar:</label>
   
       
                <select   name="conductor" id="conductor" class="selectpicker" data-live-search="true" title="Buscar Conductor ...">
        <?php echo $con; ?>  
      </select>
       </div>
         
    
      
       <label7 style="" id="label7" for="InvtransferenceNotes">Notas</label7>
         <input type="text" name="guardar" value=""id="textopedidocompra" />
       
    
 
              
       <span class="help-block" id="error"></span>
       </div>
    </div>
     
  
  <span class="help-block" id="error"></span>
       </div>
    </div>
     
  
       
       <div style="margin-left:0px;" >
        <div class="form-group">  
          <span class="help-block" id="error"></span>    
          <table class="table table-bordered">
                <tr> 
                <tr>
                
                <td colspan="2">
<!--                     <div class="row">-->
                        
         <table style="margin-left:0px;" id="invoice-item-table" class="table table-bordered">
                     <tr>
                      <th width="1%">Nro°.</th>             

                        <th width="7%">codigo.</th>
                      <th width="20%">Producto.</th>
                       <th width="5%">Unidad de Medida.</th>
                      <th width="5%">Cantidad.</th>
                     <th width="1%"></th>
                    <th width="1%"></th>
                      
                   <th width="3%" rowspan="2"></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      
                       
                      
                    
                    </tr>
<!--                    <tr>
                      <td><span id="sr_no">1</span></td>
                      <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" /></td>
                      <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
                      <td><input type="text" name="order_item_price[]" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
                      <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount1" data-srno="1" class="form-control input-sm order_item_actual_amount" readonly /></td>
                     <td><input type="text" name="order_item_tax1_rate[]" id="order_item_tax1_rate1" data-srno="1" class="form-control input-sm number_only order_item_tax1_rate" /></td>
                      <td><input type="text" name="order_item_tax1_amount[]" id="order_item_tax1_amount1" data-srno="1" readonly class="form-control input-sm order_item_tax1_amount" /></td>
                      <td><input type="text" name="order_item_tax2_rate[]" id="order_item_tax2_rate1" data-srno="1" class="form-control input-sm number_only order_item_tax2_rate" /></td>
                      <td><input type="text" name="order_item_tax2_amount[]" id="order_item_tax2_amount1" data-srno="1" readonly class="form-control input-sm order_item_tax2_amount" /></td>
                      <td><input type="text" name="order_item_tax3_rate[]" id="order_item_tax3_rate1" data-srno="1" class="form-control input-sm number_only order_item_tax3_rate" /></td>
                      <td><input type="text" name="order_item_tax3_amount[]" id="order_item_tax3_amount1" data-srno="1" readonly class="form-control input-sm order_item_tax3_amount" /></td>
                      <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" data-srno="1" readonly class="form-control input-sm order_item_final_amount" /></td>
                      <td></td>
                    </tr>-->
                  </table>
               <tr>
                     
                         
<!--                <td align="right"><b>Total</td>
                 <td align="right"><b><span id="final_total_amt"></span></b></td>-->
              </tr>
              
              <tr>
                <td colspan="2">    <div style="margin-left:455px;margin-bottom: 10px;">
<!--                      <th><button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>-->
                      <button  type="button" name="add_row" id="add_row" class="btn btn-info">+</button>
                  </div>
                    <div style="margin-left:30px;">
                     
                             
                             
  <select   name="producto" id="producto"  class="form-control action selectpicker "  data-live-search="true" title="     Buscar Productos .......................">
    
     <?php echo $producto; ?>
    </select>
                       
                                  </div>
                 
        </td>
              </tr>
              
              <tr>
                <td colspan="2" align="center">
                    
                  <input type="hidden" name="total_item" id="total_item" value="" />
                  <input type="hidden" name="idPedidoCompra" id="idPedidoCompra " value="" />
                   
                  <input type="submit" name="crear_remision" id="crear_remision" class="btn btn-info" value="Gravar" />
                </td>
                
              </tr>
          </table>
      
      

                  <script>
     $(document).ready(function(){
         var final_total_amt = $('#final_total_amt').text();
        var count = 0;
         
        $(document).on('click', '#add_row', function(){
          count++;
        
          $('#total_item').val(count);
          var html_code = '';
          var producto = $("#producto").val();
          var codigo = $("#codigo").val();
         var impuesto = $("#impuesto").val();
          var precio = $("#precio").val();
          var nombres = $("#nombres").val();
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          html_code += '<td ><input  type="text" value="'+codigo+'" name="item_cod[]"id="item_cod'+count+'" readonly="false" class="form-control readonly="false" input-sm1" /></td>';
          html_code += '<td ><input  type="required" value="'+producto+'" name="item_name[]"id="item_name'+count+'" readonly="false" class="form-control   input-sm" /></td>';
//          html_code += '<td><input type="text"value="'+precio+'" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text"value="'+nombres+'" name="order_item_um[]" id="order_item_um'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_um" /></td>';
          html_code += '<td><input type="number" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
//          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
       html_code += '<td><input type="text" style=" width:0px; height: 0px;background-color:white;margin-left:0px;" value="'+impuesto+'" name="al[]" id="al'+count+'" data-srno="'+count+'" /></td>';
        html_code += '<td><input type="text" style=" width:0px; height: 0px;background-color:white;margin-left:0px;" value="'+precio+'" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" /></td>';      
//          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
          html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
        });
        
        $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_final_amount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);
        });

        function cal_final_total(count)
        {
          var final_item_total = 0;
          for(j=1; j<=count; j++)
          {
            var quantity = 0;
            var price = 0;
            var actual_amount = 0;

            var tax1_amount = 0;

            var tax2_amount = 0;

            var tax3_amount = 0;
            var item_total = 0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              price = $('#order_item_price'+j).val();
              if(price > 0)
              {
                actual_amount = parseFloat(quantity) * parseFloat(price);
                $('#order_item_actual_amount'+j).val(actual_amount);

                item_total = parseFloat(actual_amount) + parseFloat(tax1_amount) + parseFloat(tax2_amount) + parseFloat(tax3_amount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#order_item_final_amount'+j).val(item_total);
              }
            }
          }
          $('#final_total_amt').text(final_item_total);
        }

        $(document).on('blur', '.order_item_price', function(){
          cal_final_total(count);
        });

        

        $('#crear_remision').click(function(){
//          if($.trim($('#order_receiver_name').val()).length == 0)
//          {
//            alert("Please Enter Reciever Name");
//            return false;
//          }
//
//          if($.trim($('#order_no').val()).length == 0)
//          {
//            alert("Please Enter Invoice Number");
//            return false;
//          }
//
//          if($.trim($('#order_date').val()).length == 0)
//          {
//            alert("Please Select Invoice Date");
//            return false;
//          }
//
//          for(var no=1; no<=count; no++)
//          {
//            if($.trim($('#item_name'+no).val()).length == 0)
//            {
//              alert("Please Enter Item Name");
//              $('#item_name'+no).focus();
//              return false;
//            }
//
//            if($.trim($('#order_item_quantity'+no).val()).length == 0)
//            {
//              alert("Please Enter Quantity");
//              $('#order_item_quantity'+no).focus();
//              return false;
//            }
//
//            if($.trim($('#order_item_price'+no).val()).length == 0)
//            {
//              alert("Please Enter Price");
//              $('#order_item_price'+no).focus();
//              return false;
//            }
//
//          }

          $('#gett').submit();

        });

      });
      </script>
      <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   
   var result = '';
 
   if(action == "producto")
   {
    result = 'codigo';
    
   }
  
   $.ajax({
    url:"../fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
   
    }
   })
  }
 });
 
});
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query2 = $(this).val();
   
   var result2 = '';
 
   if(action == "producto")
   {
    result2 = 'nombres';
    
   }
  
   $.ajax({
    url:"../fetch.php",
    method:"POST",
    data:{action:action, query2:query2},
    success:function(data){
     $('#'+result2).html(data);
   
    }
   })
  }
 });
 
});
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query1 = $(this).val();
   
   var result1 = '';
 
   if(action == "producto")
   {
    result1 = 'precio';
    
   }
  
   $.ajax({
    url:"../fetch.php",
    method:"POST",
    data:{action:action, query1:query1},
    success:function(data){
     $('#'+result1).html(data);
   
    }
   })
  }
 });

});
</script>

 <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query2 = $(this).val();
   
   var result2 = '';
 
   if(action == "aldo")
   {
    result2 = 'suc';
    
   }
  
   $.ajax({
    url:"fetch3.php",
    method:"POST",
    data:{action:action, query2:query2},
    success:function(data){
     $('#'+result2).html(data);
   
    }
   })
  }
 });
 
});
 </script>
   <script>
  $(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   
   var result = '';
 
   if(action == "producto")
   {
    result = 'impuesto';
    
   }
  
   $.ajax({
    url:"fetch4.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
   
    }
   })
  }
 });
 });
  </script>
     </div>
  
 <select  style="margin-top:5px;position: relative;left:0px;" name="codigo" id="codigo" >
     
    </select>
                    <select style="margin-top:2px;position:relative;left:0px;" name="precio" id="precio" >
    
   </select>
                    
                                <select style="margin-top:6px;position:relative;left:0px;" name="nombres" id="nombres" >
    
   </select>
           <select style="margin-top:6px;position:relative;left:0px;" name="suc" id="suc">
             
         </select>
 <select style="margin-top:8px;position:relative;left:0px;" name="impuesto" id="impuesto">
             
         </select>

</div>
    </form>
    
    </body>
  
</html>
 
       </form>
      
      
                 
     
                   
   
            </body>
</html>
