<?php
//index.php

include('database_connection.php');

$almacen = '';

$query = "
 SELECT * FROM almacen  ORDER BY codigoalmacen ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $almacen .= '<option value="'.$row["codigoalmacen"].'">'.$row["almacen"].'</option>'; 
 
}

?>
<?php
//index.php

include('database_connection.php');

$producto = '';

$query = "  SELECT * FROM productosv 
 ";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $producto .= '<option value="'.$row["producto"].'">'.$row["codigoproducto"].'..'.$row["producto"].'..'.$row["categoria"].'</option>';
}

?>

<?php
//index.php

include('database_connection.php');

$suc = '';

$query = "
 SELECT * FROM sucursal  ORDER BY Idsucursal ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $suc .= '<option value="'.$row["Idsucursal"].'">'.$row["nombre"].'</option>'; 
 
}

?>
<?php
//index.php

include('database_connection.php');

$orden = '';

$query = "
 SELECT * FROM ordencompracabecera  ORDER BY idordencompra ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $orden .= '<option value="'.$row["idordencompra"].'">'.$row["idordencompra"].'</option>'; 
 
}

?>
<?php
//index.php

include('database_connection.php');

$cen = '';

$query = "
 SELECT * FROM centrodecostos  ORDER BY idCentroDeCosto  ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $cen .= '<option value="'.$row["idCentroDeCosto"].'">'.$row["nombrecentro"].'</option>'; 
 
}

?>



<?php
//index.php

include('database_connection.php');

$prov = '';

$query = "
 SELECT * FROM proveedor  ORDER BY RucProveedor ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $prov .= '<option value="'.$row["RucProveedor"].'">'.$row["nombreprov"].'_'.$row["RucProveedor"].'</option>'; 
 
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
    <link rel="stylesheet" href="bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="jquery.min.js"></script>
<!--    <script src="bootstrap.min.js"></script>-->
    <script src="adsbygoogle.js"></script>
    <script src="jquery.dataTables.min.js"></script>
    <script src="dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="dataTables.bootstrap.min.css">
<!--       <script src="buscador/datos/jquery-1.6.4.min.js"></script>
<script src="buscador/datos/jquery-1.6.4.min.js"></script>-->
<!--  <link rel="stylesheet"href="bootstrap.min.css">-->
   <link rel="stylesheet" href="buscador/dist/css/bootstrap-select.css">
<!--  <script src="buscador/datos/jquery.min.js"></script>-->
<!--  <script src="buscador/datos/bootstrap.min.js"></script>-->
  <script src="buscador/dist/js/bootstrap-select.js"></script>
  
      <link rel="stylesheet" href="jquery1102/themes/base/jquery.ui.all.css">
	<script src="jquery1102/jquery-1.9.1.js"></script>
	<script src="jquery1102/ui/jquery.ui.core.js"></script>
	<script src="jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="jquery1102/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="jquery1102/demos/demos.css">
        
           
             <script src="bootstrap/js/bootstrap.min.js"></script>
<!--    <script src="assets/jquery-1.11.2.min.js"></script>-->
    <script src="assets/jquery.validate.min.js"></script>
    <script src="assets/validadorcompras.js"></script>
             <script>
	
        	
        	$(function() {
		$( "#fecha1" ).datepicker({
                    altField: "#alternate",
			altFormat: "DD, d MM, yy",
			showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	});
        $(function() {
		$( "#textfechadepago" ).datepicker({
                       altField: "#textPlazocredito",
			altFormat: "d",
			showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	});
         $(function() {
		$( "#textvenctimbrado" ).datepicker({
                        showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	});
         $(function() {
		$( "#textfechaentregaproductos" ).datepicker({
                        showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	});
            
      
        
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
    <body id="hhmenu"border="10" >
       <link rel="stylesheet" type="text/css" href="estilo.css">    
   </head>
    <div id="menu-wrapper" >
    
       <div id="header" >
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav" >
                                    
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
                                        
					<li><a href="">Informes web</a>
                                         <ul>
							<li><a href="Informes Web/Informes de Movimientos de Compras/Informes de Movimientos de Compras.php">Informes de Movimientos de Compras</a></li>
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
	
		<li><a href="Registrar Compra.jsp">Registrar Compra</a></li>
		<li><a href="Reportes de Compras.jsp">Reporte de Compras</a></li>
		
	
	
</div>
    <h3><a style="color: black" href="Reportes de Compras.jsp">Compras</a></h3>
  
    <form id="getaction"  method="post" action="insertcompra.php" name="formcomra">
        <input type="hidden" name="accion" value="registrarcomm" />
          <h4><a style="color: black" href="Reportes de Compras.jsp">Compras</a></h4>
              <label4 style="margin-top:30px;">Empresa </label4>                
        <select  id="cboempresa"  name="comboempresacompra"> 
          
           <option>Alimentos y Servicios S.R.L</option>
                        
          

        </select>


       <label5 style="margin-top:33px;">Sucursal </label5>   
<select id="cbosucursal"  name="combosucursalcompra"> 
  <?php echo $suc; ?>         
        </select>
       
       
         
       <div class="form-group">
            <span class="help-block" id="error"></span>
      <label style="position: relative;top: 15px;margin-bottom:0px; " class="col-md-1 control-label" for="lunch">Proveedor:</label>
    
       
                <select   name="provee" id="provee" class="selectpicker" data-live-search="true" title="Buscar Proveedor ...">
          <?php echo $prov; ?>
      </select>
       </div>
       <div class="form-group">  
          <span class="help-block" id="error"></span>
        <label9>Fecha
            <input style="margin-right: 0px;margin-top: 25px;"type="text" id="fecha1" name="txtfecha" value="" readonly="false" /></label9>
            
             </div>
         <div>
            <div class="form-group">
              
          <label10>Número de Comprobante</label10>
           <span class="help-block" id="error"></span>
          <input id="textnumerofactura" type="text" name="nrfac" value=""/>
        
      </div>
               </div>
         <label11> Tipo de Comprobante</label11>   
<select id="cbotipocomprobante"  name="combotipocomprobante"> 
     <option>Factura</option><option>Cheque</option>
        </select>
         <div class="form-group">
              <span class="help-block" id="error"></span>
            <label12 >Código de Timbrado</label12>
            <input id="texttimbrado" type="text" name="txttimbrado" value=""  />
            </div>
          <div class="form-group">
              <span class="help-block" id="error"></span>
       <label13>Vencimiento del Timbrado</label13>
       <input id="textvenctimbrado" type="text" name="texvencimiento" value=""  />
      </div>
       <input id="checkimpueto" type="checkbox" name="checkimpueto" value="ON" checked="checked" />
        <label id="gravarimpuesto">centro de cost</label>
            <label id="centrodecostos"></label>
           <select id="cbocentrodecostos"  name="combocentrodecostoscompra"> 
           

                 <?php echo $cen; ?>                
            

        </select>
          
        <label id="labelterminosdepago">Términos de Pago</label>
           <select id="cboterminosdepago"  name="comboterminosdepago"> 
               <option>Contado</option>  <option>Credito</option>

        </select>
        <div class="form-group">
      <label style="position: relative;top: 15px;margin-bottom:0px; " class="col-md-1 control-label" for="lunch"> Orden:</label>
    </div>
       
                <select   name="orden" id="orden" class="selectpicker" data-live-search="true" title="Buscar Orden de Compra ...">
       <?php echo $orden; ?>     
      </select>
          <div class="form-group">
            <label id="labelnotas1">Notas</label>
       <input id="textnotas1" type="text" name="notascompra" value=""/>
         <span class="help-block" id="error"></span>
        </div>
        <h8 id="articulosdecompra">Artículos de la Compra</h8>
        
        <div class="form-group">  
          <span class="help-block" id="error"></span>
       
      
            
          <table class="table table-bordered" style="margin-top:20px;">
                <tr> 
                <tr>
                
                <td colspan="2">
<!--                     <div class="row">-->
                        
         <table style="margin-left:0px;" id="invoice-item-table" class="table table-bordered">
                     <tr>
                      <th width="1%">Nro°.</th>             

                        <th width="7%">codigo.</th>
                      <th width="20%">Producto.</th>
                       <th width="5%">Lista de Precio.</th>
                       <th width="5%">Cantidad Por envase.</th>
                        <th width="5%">Precio Por Envase.</th>
                      
                        <th width="8%">Cantidad</th>
                        <th width="5%">um</th>
                          <th width="5%">Precio Um Standart Um Standart.</th>
                         <th width="15%">Cantidad Um Standart</th>
                          <th width="15%">descuento</th>
                         <th width="15%">Total</th>
                         <th width="15%" rowspan="2">Totales.</th>
                         <th width="13%" rowspan="2"></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
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
             
                  <div style="margin-left:455px;">
<!--                      <th><button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>-->
                      <button  type="button" name="add_row" id="add_row" class="btn btn-info">+</button>
                  </div>
                         <div style="margin-left:30px">
                             
                             
  <select    name="producto" id="producto" class="form-control action  selectpicker "  data-live-search="true" title="Buscar Productos ...">
    
    <?php echo $producto; ?>
       
     
    </select>
                       
                                    </div>
                  <select  style="top:15px;position: relative;margin-left:90px;" name="codigo" id="codigo" >
     
    </select>
                    <select style="top:15px;position:relative;margin-left:90px;" name="precio" id="precio" >
    
   </select>
                                <select style="top:15px;position:relative;margin-left:90px;" name="nombres" id="nombres" >
    
   </select>
                 
                </td>
              </tr>
             
              <tr>
                  
                <td align="right"><b>Total</td>
                <td align="right"><b><span id="final_total_amt"></span></b></td>
              </tr>
              <tr>
                
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <input type="hidden" name="total_item" id="total_item" value="1" />
<!--                  <input type="submit" name="crear_presup" id="crear_prsup" class="btn btn-info" value="Create" />-->
                   
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
          var precio = $("#precio").val();
          var nombres = $("#nombres").val();
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          html_code += '<td ><input  type="text" value="'+codigo+'" name="item_cod[]"id="item_cod'+count+'" readonly="false" class="form-control readonly="false" input-sm1" /></td>';
          html_code += '<td ><input  type="required" value="'+producto+'" name="item_name[]"id="item_name'+count+'" readonly="false" class="form-control   input-sm" /></td>';
            html_code += '<td><input type="text" name="order_item_listado[]" id="order_item_listado'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_listado" /></td>';
             html_code += '<td><input type="text" name="order_cant_envase[]" id="order_cant_envase'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_cant_envase" /></td>';
              html_code += '<td><input type="text" name="order_envase_price[]" id="order_envase_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_envase_price" /></td>';
         
             html_code += '<td><input type="number" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
          
          html_code += '<td><input type="text"value="'+nombres+'" name="order_item_um[]" id="order_item_um'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_um" /></td>';
        html_code += '<td><input type="text"value="'+precio+'" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_quantity" /></td>';
            html_code += '<td><input type="text"value="" name="order_sta_price[]" id="order_sta_price'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_sta_price" /></td>';
             html_code += '<td><input type="text"value="0" name="descuento[]" id="descuento'+count+'" data-srno="'+count+'"   class="form-control input-sm number_only descuento" /></td>';
          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
            
          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
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
          count-1+2;
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
            var descuento = 0 ;

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
                   descuento = $('#descuento'+j).val();
                if(descuento >= 0)
                   {
                actual_amount = parseFloat(quantity) * parseFloat(price) - parseFloat(descuento);
                $('#order_item_actual_amount'+j).val(actual_amount);

                item_total = parseFloat(actual_amount) + parseFloat(tax1_amount) + parseFloat(tax2_amount) + parseFloat(tax3_amount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#order_item_final_amount'+j).val(item_total);
              }
            }
          }
                 }
          $('#final_total_amt').text(final_item_total);
        }

        $(document).on('blur', '.order_item_price', function(){
          cal_final_total(count);
        });

        

        $('#crear_presup').click(function(){
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

          $('#invoice_form').submit();

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
    url:"fetch.php",
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
    url:"fetch.php",
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
    url:"fetch.php",
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
      </div>
         <div class="form-group">  
          <span class="help-block" id="error"></span>
         <label id="labelfechapago">Fecha de Pago</label>
          <input id="textfechadepago" type="text" name="tetfecgadepagos" value="" readonly="false"  />
          </div >
           <label id="labelplazodecredito">Plazo de Credito</label>
          <input id="textPlazocredito" type="text" name="textplazo" value="" readonly="false"  />
<!--            <label id="labelmontopago">Monto</label>
          <input id="textmontopago" type="text" name="textmontopag " value="" readonly="false"  />-->
           <div class="form-group">  
          <span class="help-block" id="error"></span>
        <h9 id="fechaentregaproductos">Fecha de Entrega Productos</h9>
        <input id="textfechaentregaproductos" type="text" name="txtfechaetrega" value="" readonly="false"  />
         </div>
          <label id="labelalmacen">Almacén</label>
           <select id="cboalmacen"  name="comboalmacen"> 
            <?php echo $almacen; ?>    
        </select>
        
        
        <input id="Aceptar1" name ="crear_compra"value="Aceptar" type="submit">
    </form>
     
    </body>
  
</html>































































