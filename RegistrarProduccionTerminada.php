<?php
  //invoice.php  
  include('database_connection.php');

  $statement = $connect->prepare("
    SELECT * FROM vistaoproduccion
    ORDER BY idorden DESC
  ");

  $statement->execute();

  $all_result = $statement->fetchAll();

  $total_rows = $statement->rowCount();
?>
<?php
//index.php

include('database_connection.php');

$almac = '';

$query = "
 SELECT * FROM almacen  ORDER BY almacen ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $almac .= '<option value="'.$row["codigoalmacen"].'">'.$row["almacen"].'</option>';
 
}

?>
<?php
//index.php

include('database_connection.php');

$centrocosto = '';

$query = "
 SELECT * FROM centrodecostos  ORDER BY idcentrodecosto ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $centrocosto .= '<option value="'.$row["idCentroDeCosto"].'">'.$row["nombrecentro"].'</option>';
 
}

?>
<?php
//index.php

include('database_connection.php');

$cen = '';

$query = "
 SELECT * FROM centrodeproduccion  ORDER BY idCentroDeProduccion   ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $cen .= '<option value="'.$row["idCentroDeProduccion"].'">'.$row["centrodeproduccion"].'</option>'; 
 
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
<?php
//index.php

include('database_connection.php');

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
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
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
    <link rel="stylesheet" type="text/css" href="estilo.css">
      <link rel="stylesheet" href="jquery1102/themes/base/jquery.ui.all.css">
	<script src="jquery1102/jquery-1.9.1.js"></script>
	<script src="jquery1102/ui/jquery.ui.core.js"></script>
	<script src="jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="jquery1102/ui/jquery.ui.datepicker.js"></script>
<!--	<link rel="stylesheet" href="jquery1102/demos/demos.css">-->
 <script>
	
        function doSearch()
		{
			var tableReg = document.getElementById('data-table');
			var searchText = document.getElementById('searchTerm').value.toLowerCase();
			var cellsOfRow="";
			var found=false;
			var compareWith="";
 
			// Recorremos todas las filas con contenido de la tabla
			for (var i = 1; i < tableReg.rows.length; i++)
			{
				cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
				found = false;
				// Recorremos todas las celdas
				for (var j = 0; j < cellsOfRow.length && !found; j++)
				{
					compareWith = cellsOfRow[j].innerHTML.toLowerCase();
					// Buscamos el texto en el contenido de la celda
					if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
					{
						found = true;
					}
				}
				if(found)
				{
					tableReg.rows[i].style.display = '';
				} else {
					// si no ha encontrado ninguna coincidencia, esconde la
					// fila de la tabla
					tableReg.rows[i].style.display = 'none';
				}
			}
		}
	</script>

   <script>
      $(function() {
		$( "#fromix" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
                        showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
                            
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
                         showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
				$( "#fromix" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
        $( "#datepicker" ).datepicker({
                    altField: "#alternate",
			altFormat: "DD, d MM, yy",
			showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	$(function() {
		$( "#fecha" ).datepicker();
	});
        $( "#lunch2" ).autocomplete({
					source: data,
					minLength: 0,
					select: function( event, ui ) {
						log( ui.item ?
							"Selected: " + ui.item.value + ", geon: " + ui.item.id :
							"Nothing selected, input was " + this.value );
					}
				});
                                      </script>
    <style>
      /* Remove the navbar's default margin-bottom and rounded borders */ 
      .navbar {
      margin-bottom: 4px;
      border-radius: 0;
      }
      /* Add a gray background color and some padding to the footer */
      footer {
      background-color: #f2f2f2;
      padding: 25px;
      }
      .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
      }
      .navbar-brand
      {
      padding:5px 40px;
      }
      .navbar-brand:hover
      {
      background-color:#ffffff;
      }
      /* Hide the carousel text when the screen is less than 600 pixels wide */
      @media (max-width: 600px) {
      .carousel-caption {
      display: none; 
      }
      }
    </style>
  </head>
  <body>
    <style>
      .box
      {
      width: 100%;
      max-width: 1390px;
      border-radius: 5px;
      border:1px solid #ccc;
      padding: 15px;
      margin: 0 auto;                
      margin-top:50px;
      box-sizing:border-box;
      }
    </style>
<!--    <link rel="stylesheet" href="datepicker.css">
    <script src="bootstrap-datepicker1.js"></script>-->
    <script>
      $(document).ready(function(){
        $('#order_date').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });
      });
    </script>
<!--    <div class="container-fluid">-->
      <?php
      if(isset($_GET["add"]))
      {
      ?>
           <div>
  
      <form method="post" id="invoice_form">
   
        <div class="table-responsive">
            
          <table class="table table-bordered">
            <tr>
                
              <td colspan="2" align="center"><h2 style="margin-top:10.5px">Registrar Pedido de Compras</h2></td>
   
              
               <body id="hhmenu">
      
        
         <div id="menu-wrapper" >
    
     <ul id="hmenu" > 
         <li><a >Configuracion</a>
               <ul id="sub-menu"> 
                 
             <li><a href="Productos.jsp">Productos</a> </li>
            <li><a href="Categoria de Productos.Jsp">Categoria de Productos</a> </li>
            <li><a href="Marcas.Jsp">Marcas</a> </li>    
            <li><a href="registrarProducto.jsp">Rubros</a> </li>
            <li><a href="">Sub-Rubros</a> </li>
            <li><a href="Configuracion/Plantillas de Productos.jsp">Plantillas de Productos</a></li>
            <li><a href="">Centro de Costos</a></li>
            <li><a href="registrarProducto.jsp">Monedas</a> </li>
            <li><a href="">Impuestos</a> </li>
            <li><a href="">Usuarios</a></li>
            <li><a href="">Impuestos</a> </li>
            <li><a href="">Usuarios</a></li>
            <li><a href="">Empresas</a> </li>
            <li><a href="">Sucursales</a></li>
            <li><a href="">Centros de Produccion</a> </li>
             <li><a href="">Unidades de Medidas</a></li>  
                     
                     
                 </ul> 
                      
           </li> 
        </li> 
            <li><a >Compras</a>
               <ul id="sub-menu"> 
                 
                   <li><a href="../Compras/Registrar Compra.jsp">Registrar Compra</a> </li>
           <li><a href="">Reporte de Compras</a> </li>
             <li><a href="../Compras/ÃrdenesDeCompras.jsp">Ãrdenes de Compra</a> </li>
           <li><a href="">Registrar Nota de CrÃ©dito</a> </li>
            <li><a href="">Notas de CrÃ©dito</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
      
           <li><a >Stock</a>
               <ul id="sub-menu"> 
                 
             <li><a href="">Inventario</a> </li>
           <li><a href="">Movimientos de Stock</a> </li>
             <li><a href="Transferencias.jsp">Transferencias</a> </li>
           <li><a href="">Pedido de Transferencia</a> </li>
            <li><a href="">Registro de Perdidas</a> </li>
                     
              
                 </ul>         
           </li> 
            <li><a >Produccion</a>
               <ul id="sub-menu"> 
                 
             <li><a href="">Registrar Ãrden de ProducciÃ³n</a> </li>
           <li><a href="">Listar Ãrdenes de ProducciÃ³n</a> </li>
             <li><a href="Transferencias.jsp">Centros de ProducciÃ³n</a> </li>
           <li><a href="">Lineas de ProducciÃ³n</a> </li>
            <li><a href="">Administrar Materia Prima</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
           
      </ul> 
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="Registrar Transferencia.jsp">Registrar Peido de Compras</a></li>
		<li><a href="Transferencias.jsp">Reporte de Pedido de Compras</a></li>
		
	
	
</div>
<!--                   <form id="getactionordencompra"method="post" action="Controlador">-->
         <h3><a style="color: black" href="Transferencias.jsp">Reporte de Pedido de Compras</a></h3> 
         
          </body>
          
            </tr>
            <style>
#labelpedidoinv {
   position: absolute;
    top:150px;
   margin-left:682px;
    display: block;
    color: #585858;
    font-weight: bold;
    margin-bottom: 0px;
}
#cboalmacenpedido  {
   
  margin-top:20px;
       margin-bottom: 0px ;
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
}
#labelsucursalpedido {
   
    position: absolute;
    top:150px;
   margin-left:400px;
    display: block;
    color: #585858;
    font-weight: bold;
    margin-bottom: 0px;
}

#cboempresaordenor  {
    margin-top:25px;
       margin-bottom: 0px ;
   margin-left: 300px;
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
    margin-bottom: 25px
}
    </style>
    
            <tr>
                
                <td colspan="2">
                    
               <div class="row">
                    
             
 <label id="labelsucursalpedido" style>sucursal</label>                      
        <select  id="cboempresaordenor"  name="combosucursalpedidocompra"> 
          
          
        
        </select>
     
     <label id="labelpedidoinv" > Almacen </label>       
<select id="cboalmacenpedido"  name="cboalmacenpedidocompra"> 
            
        </select>
           
    <div>
<!--   <label style="top:210px">Fecha:<input type="text" id="fromix" name="fromixis"/></label>

<label style="top:210px;margin-left: 290px; ">Vencimiento:<input type="text" id="to" name="totis"/></label>-->
 <label7 id="labelpedidocompra" for="InvtransferenceNotes">Notas</label7>
       
         
         <input type="text" name="GUARDAR" value=""id="textopedidocompra" />
   
<!--                 <div class="col-md-8">
                      To,<br />
                       
                        <b>RECEIVER (BILL TO)</b><br />
                     
                     <input type="text" name="order_receiver_name" id="order_receiver_name" class="form-control input-sm" placeholder="Enter Receiver Name" />
                        <textarea name="order_receiver_address" id="order_receiver_address" class="form-control" placeholder="Enter Billing Address"></textarea>
                    </div>
                  <div class="col-md-4">
                      Reverse Charge<br />
                    
                  <input type="text" name="order_no" id="order_no" class="form-control input-sm" placeholder="Enter Invoice No." />
                      <input type="text" name="order_date" id="order_date" class="form-control input-sm" readonly placeholder="Select Invoice Date" />
                    </div>
                  </div>-->
                  <br />
                  <table id="invoice-item-table" class="table table-bordered" style="margin-left: 200px;width:1100px;margin-top:100px; ">
                    <tr>
                      <th width="7%">Sr No.</th>
                      <th width="20%">Item Name</th>
                      <th width="5%">Quantity</th>
                      <th width="5%">Price</th>
                      <th width="10%">Actual Amt.</th>
                    <th width="12.5%" colspan="2">Tax1 (%)</th>
                      <th width="12.5%" colspan="2">Tax2 (%)</th>
                      <th width="12.5%" colspan="2">Tax3 (%)</th>
                      <th width="12.5%" rowspan="2">Total</th>
                      <th width="3%" rowspan="2"></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                     <th>Rate</th>
                     <th>Amt.</th>
                      <th>Rate</th>
                      <th>Amt.</th>
                      <th>Rate</th>
                      <th>Amt.</th>
                    </tr>
                    <tr>
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
                    </tr>
                  </table>
                         <div style="margin-left:200px">
                   <select name="productos" id="lunch2" class="selectpicker" data-live-search="true" title="Buscar Productos ...">
            <option style="flex-zise: 10px">QUESO DANBO X KILO</option>
        <option>JAMONADA X KILO</option>
        <option>Sugar, Spice and all things nice</option>
        <option>Baby Back Ribs</option>
        <option>A really really long option made to illustrate an issue with the live search in an inline form</option>

    </select>
                                    </div>
                  <div align="right">
                    <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button>
                  </div>
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
                  <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-info" value="Create" />
                </td>
              </tr>
          </table>
            <input type="text" name="aldo" value="" /> 
        </div>
      </form>
        <form>
<!--        <input type="text" id="name" placeholder="Name">
        <input type="text" id="email" placeholder="Email Address">-->
    	<input type="button" class="add-row" value="Add Row">
    </form>
                   
      <script>
     $(document).ready(function(){
        var final_total_amt = $('#final_total_amt').text();
        var count = 1;
        
        $(document).on('click', '#add_row', function(){
          count++;
          $('#total_item').val(count);
          var html_code = '';
          var lunch2 = $("#lunch2").val();
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';

          html_code += '<td ><input  type="text" value="'+lunch2+'" name="item_name[]"id="item_name'+count+'" class="form-control input-sm" /></td>';
          html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
             html_code
          html_code += '<td><input type="text" name="order_item_tax1_rate[]" id="order_item_tax1_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax1_rate" /></td>';
          html_code += '<td><input type="text" name="order_item_tax1_amount[]" id="order_item_tax1_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax1_amount" /></td>';
          html_code += '<td><input type="text" name="order_item_tax2_rate[]" id="order_item_tax2_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax2_rate" /></td>';
          html_code += '<td><input type="text" name="order_item_tax2_amount[]" id="order_item_tax2_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax2_amount" /></td>';
          html_code += '<td><input type="text" name="order_item_tax3_rate[]" id="order_item_tax3_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax3_rate" /></td>';
          html_code += '<td><input type="text" name="order_item_tax3_amount[]" id="order_item_tax3_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax3_amount" /></td>';
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
            var tax1_rate = 0;
            var tax1_amount = 0;
            var tax2_rate = 0;
            var tax2_amount = 0;
            var tax3_rate = 0;
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
                tax1_rate = $('#order_item_tax1_rate'+j).val();
                if(tax1_rate > 0)
                {
                  tax1_amount = parseFloat(actual_amount)*parseFloat(tax1_rate)/100;
                  $('#order_item_tax1_amount'+j).val(tax1_amount);
                }
                tax2_rate = $('#order_item_tax2_rate'+j).val();
                if(tax2_rate > 0)
                {
                  tax2_amount = parseFloat(actual_amount)*parseFloat(tax2_rate)/100;
                  $('#order_item_tax2_amount'+j).val(tax2_amount);
                }
                tax3_rate = $('#order_item_tax3_rate'+j).val();
                if(tax3_rate > 0)
                {
                  tax3_amount = parseFloat(actual_amount)*parseFloat(tax3_rate)/100;
                  $('#order_item_tax3_amount'+j).val(tax3_amount);
                }
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

        $(document).on('blur', '.order_item_tax1_rate', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_tax2_rate', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_tax3_rate', function(){
          cal_final_total(count);
        });

        $('#create_invoice').click(function(){
          if($.trim($('#order_receiver_name').val()).length == 0)
          {
            alert("Please Enter Reciever Name");
            return false;
          }

          if($.trim($('#order_no').val()).length == 0)
          {
            alert("Please Enter Invoice Number");
            return false;
          }

          if($.trim($('#order_date').val()).length == 0)
          {
            alert("Please Select Invoice Date");
            return false;
          }

          for(var no=1; no<=count; no++)
          {
            if($.trim($('#item_name'+no).val()).length == 0)
            {
              alert("Please Enter Item Name");
              $('#item_name'+no).focus();
              return false;
            }

            if($.trim($('#order_item_quantity'+no).val()).length == 0)
            {
              alert("Please Enter Quantity");
              $('#order_item_quantity'+no).focus();
              return false;
            }

            if($.trim($('#order_item_price'+no).val()).length == 0)
            {
              alert("Please Enter Price");
              $('#order_item_price'+no).focus();
              return false;
            }

          }

          $('#invoice_form').submit();

        });

      });
      
      </script>
            
      <?php
      }
      elseif(isset($_GET["ingreso"]) && isset($_GET["idorden"]))
      {
        $statement = $connect->prepare("
          SELECT * FROM vistaoproduccion
            WHERE idorden = :idorden
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':idorden'       =>  $_GET["idorden"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
        ?>
<!--        <script>
        $(document).ready(function(){
          $('#order_no').val("<?php echo $row["order_no"]; ?>");
          $('#order_date').val("<?php echo $row["order_date"]; ?>");
          $('#order_receiver_name').val("<?php echo $row["order_receiver_name"]; ?>");
          $('#order_receiver_address').val("<?php echo $row["order_receiver_address"]; ?>");
        });
        </script>-->
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
	
		<li><a href="Registrar Transferencia.jsp">Registrar Peido de Compras</a></li>
		<li><a href="Transferencias.jsp">Reporte de Pedido de Compras</a></li>
		
	
	
</div>
                    <h3><a style="color: black" href="Transferencias.jsp">Reporte de Pedido de Compras</a></h3> 
      
         <form method="post"action="insertoproduccion.php" id="getactionordencompra">
 
      <h4><a style="color: black" href="Reportes de Compras.jsp">Registrar Peido de Compras</a></h4>
    <label id="labelempresaordencompra">Almacen de Origen</label>  
       
        <select  id="cboempresaordenor"  name="comboorigen"> 
       <?php echo $almac; ?> 
            
        </select>
   

     <label id="labelcentrodecostosorden" >Centro de Produccion</label>       
<select id="cbocentrodecostosor"  name="centro"> 
          
               <?php echo $cen; ?> 
        </select>     
      <div class="col-md-8">
                      <br /> <b>Almacen de Destino:</b>
<select id="cbocentrodecostosor"  name="combodestino"> 
          
               <?php echo $almac; ?> 
        </select> 
                          </div>
        <div class="col-md-8">
                      <br /> <b>Id:</b>
<!--                        <b>  </b><b><?php echo $row['idorden']; ?></b><br />-->
                        <input style="width:200px;" type="text" name="id" value="<?php echo $row['idorden']; ?>"readonly="false" />
                    </div>
       <div class="col-md-8">
                      <br /> <b>Persona a cargo :</b>
                        <b>  </b><b></b><br />
                        <input style="width:450px;" type="text" name="empleado" value="<?php echo $row['empleado']; ?>"readonly="false" />
                    </div>
               
        
    <div>


 <label style="top:480px;">Fecha:<input type="text" id="fromix" name="fecha"/></label>
    
        
    
       <label7 id="labelpedidocompra" for="InvtransferenceNotes">Notas</label7>
       
         
         <input type="text" name="guardar" value=""id="textopedidocompra" />
    </div>
    
  
       <div >
            <table class="table table-bordered">
                <tr> 
                <tr>
                
                <td colspan="2">
                    
               <div class="row">
                  <table id="invoice-item-table" class="table table-bordered">
                   <tr>     
                      <th width="1%">Nro°.</th>
                        <th width="7%">codigo.</th>
                      <th width="20%">Producto.</th>
                      <th width="5%">Um.</th>
          
                        <th width="5%">Cantidad Segun Orden.</th>
                        <th width="5%">Produccion Parcial.</th>
                        <th width="5%">Diferencia.</th>
                         <th width="5%">Cantidad A Ingresar.</th>
<!--                      <th width="5%">Total.</th>
                  
                      <th width="5%" rowspan="2">Totales.</th>-->
                      <th width="3%" rowspan="2"></th>
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
                    <?php
                    $statement = $connect->prepare("
                      SELECT * FROM vistaoproduccion 
                      WHERE idorden = :idorden
                    ");
                    $statement->execute(
                      array(
                        ':idorden'       =>  $_GET["idorden"]
                      )
                    );
                    $item_result = $statement->fetchAll();
                    $m = 0;
                    foreach($item_result as $sub_row)
                    {
                      $m = $m + 1;
                    ?>
                    <tr>
                       <td><span id="sr_no"><?php echo $m; ?></span></td>
                       <td><input type="text" name="item_cod[]" id="item_name<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["codigoproducto"]; ?>"readonly="false" /></td>
                      <td><input type="text" name="item_name[]" id="item_name<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["producto"]; ?>" readonly="false"/></td>
<!--                      <td><input type="text" name="order_item_quantity[]" id="order_item_quantity<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_quantity" value = "<?php echo $sub_row["precio"]; ?>" readonly="false"/></td>-->
                       <td><input type="text" name="order_item_um[]" id="order_item_um<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_um" value = "<?php echo $sub_row["nombres"]; ?>" readonly="false"/></td>
                      <td><input type="text" name="order_item_price[]" id="order_item_price<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_price" value="<?php echo $sub_row["cantidad"]; ?>" readonly="false" /></td>
                        <td><input type="text" name="order_item_price[]" id="order_item_price<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_price" value="" readonly="false" /></td>
                           <td><input type="text" name="order_item_price2[]" id="order_item_price2<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_price2" value="" readonly="true" /></td>
                          <td><input type="text" name="order_item_price1[]" id="order_item_price1<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_price1" value="" /></td>
                          
<!--                      <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_actual_amount" value="<?php echo $sub_row["total"];?>" readonly="false" /></td>
           
                      <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" readonly class="form-control input-sm order_item_final_amount" value="<?php  echo $sub_row["total"]; ?>" /></td>-->
                      
                      <td></td>
                    </tr>
                    <?php
                    }
                    ?>
       </table>
                </td>
              </tr>
 
                  
            <tr>
                     
                         
<!--                <td align="right"><b>Total</td>
                 <td align="right"><b><span id="final_total_amt"><?php echo $sub_row["totalp"]; ?></span></b></td>-->
              </tr>
              
              <tr>
                <td colspan="2">    <div style="margin-left:455px;">
<!--                      <th><button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>-->
                      <button  type="button" name="add_row" id="add_row" class="btn btn-info">+</button>
                  </div>
                         <div style="margin-left:30px">
                             
                             
  <select   name="producto" id="producto" class="form-control action  selectpicker "  data-live-search="true" title="Buscar Productos ...">
    
     <?php echo $producto; ?>
    </select>
                       
                                    </div>
                
        </td>
              </tr>
              
              <tr>
                <td colspan="2" align="center">
                    
                  <input type="hidden" name="total_item" id="total_item" value="<?php echo $m; ?>" />
                  <input type="hidden" name="idPedidoCompra" id="idPedidoCompra <?php echo $m; ?>" value="<?php echo $row["idPedidoCompra"]; ?>" />
                  <input type="submit" name="crear_ing" id="crear_ing" class="btn btn-info" value="Editar" />
                </td>
                
              </tr>
              
          </table>
        <div  style="margin-top:20px;position:relative;left:80px;">
                  <select  name="codigo" id="codigo" >
     
    </select>
                    <select  name="precio" id="precio" >
    
   </select>
                    
                                <select name="nombres" id="nombres" >
    
   </select>
                        </div>  
      </form>
       <script>
     $(document).ready(function(){
         var final_total_amt = $('#final_total_amt').text();
       var count = "<?php echo $m; ?>";
         
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
           html_code += '<td ><input  type="text" value="'+producto+'" name="item_name[]"id="item_name'+count+'" readonly="false" class="form-control   input-sm" /></td>';
//          html_code += '<td><input type="text"value="'+precio+'" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_quantity" /></td>';
           html_code += '<td><input type="text"value="'+nombres+'" name="order_item_um[]" id="order_item_um'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_um" /></td>';
          html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'"readonly="false" class="form-control input-sm number_only order_item_price" /></td>'         
        
             html_code += '<td ><input  type="text" value="" name="order_item_price[]"id="name'+count+'" readonly="false" class="form-control  " /></td>';
             html_code += '<td><input type="text" name="order_item_price2[]" id="order_item_price2'+count+'" data-srno="'+count+'" readonly="true" class="form-control input-sm number_only order_item_price2"   /></td>';
             html_code += '<td><input type="text" name="order_item_price1[]" id="order_item_price1'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price1" /></td>';
//               html_code += '<td ><input  type="text" value="" name="item[]"id="item'+count+'" readonly="false" class="form-control   " /></td>';
//          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
//            
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
              var price1 = 0;
            var actual_amount = 0;
    var actual_amount1 = 0;
            var tax1_amount = 0;

            var tax2_amount = 0;

            var tax3_amount = 0;
            var item_total = 0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              price = $('#order_item_price1'+j).val();
              if(price > 0)
              {
                price1 = $('#order_item_price'+j).val();
              if(price1 > 0)
              {   
//                actual_amount = parseFloat(quantity) * parseFloat(price);
//                $('#order_item_actual_amount'+j).val(actual_amount);
//                 actual_amount1 = parseFloat(price1) - parseFloat(price);
//                $('#order_item_price2'+j).val(actual_amount1);

//                item_total = parseFloat(actual_amount) + parseFloat(tax1_amount) + parseFloat(tax2_amount) + parseFloat(tax3_amount);
//                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
//                $('#order_item_final_amount'+j).val(item_total);
              }
            }
                   }
          }
//          $('#final_total_amt').text(final_item_total);
        }

        $(document).on('blur', '.order_item_price1', function(){
          cal_final_total(count);
        });

        

        $('#crear_ing').click(function(){
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
</script>
        <?php 
        }
      }
      else
      {
      ?>
      <h3 align="center">inf</h3>

      <br />
      <div align="right">
<!--        <a href="registrar1.php?add=1" class="btn btn-info btn-xs">Create</a>-->
 Filtrar <input id="searchTerm" type="text" onkeyup="doSearch()" />
      </div>
      <br />
       <div id="c">
      <table id="data-table" class="table table-bordered table-striped">
        <thead>
          <tr>
      
            <th>Id.</th>
            <th>Fecha de Elaboracion</th>
            <th>Fecha de Entrega</th>
            <th>Almacen de orgingen</th>
             <th>Almacen de ingreso</th>
            <th>Persona a Cargo</th>
            <th>Centro de Produccion</th>
             <th>Cliente</th>
            <th>Notas</th>
          </tr>
        </thead>
        <?php
        if($total_rows > 0)
        {
          foreach($all_result as $row)
          {
            echo '
              <tr>
                <td>'.$row["idorden"].'</td>
                <td>'.$row["fechaelaboracion"].'</td>
                <td>'.$row["fechaentrega"].'</td> 
                     <td>'.$row["almacenorigen"].'</td>
                 <td>'.$row["almacendestino"].'</td> 
                       <td>'.$row["empleado"].'</td>      
                <td>'.$row["centrodeproduccion"].'</td>
                <td>'.$row["cliente"].'</td>
                  <td>'.$row["Notas"].'</td>
            <td><a href="print_invoice.php?pdf=1&id='.$row["idorden"].'">PDF</a></td>         
 <td><a href="vistaordenp.php?ordenp='.$row["idorden"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>
                <td><a href="RegistrarProduccionTerminada.php?ingreso=1&idorden='.$row["idorden"].'"><span class="glyphicon glyphicon-edit">Registrar Produccion Terminada</span></a></td>
             
              </tr>
            ';
          }
        }
        ?>
      </table>
          </div>
      <?php
      }
      ?>
    </div>
    <br>
    <footer class="container-fluid text-center">
      <p>Footer Text</p>
       </footer>
 
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    var table = $('#data-table').DataTable({
          "order":[],
          "columnDefs":[
          {
            "targets":[4, 5, 6],
            "orderable":false
          },
        ],
        "pageLength": 25
        });
    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to remove this?"))
      {
        window.location.href="invoice.php?delete=1&id="+id;
      }
      else
      {
        return false;
      }
    });
  });

</script>

<script>
$(document).ready(function(){
$('.number_only').keypress(function(e){
return isNumbers(e, this);      
});
function isNumbers(evt, element) 
{
var charCode = (evt.which) ? evt.which : event.keyCode;
if (
(charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
(charCode < 48 || charCode > 57))
return false;
return true;
}
});
</script>