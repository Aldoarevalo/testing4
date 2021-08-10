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

$emp = '';

$query = "
 SELECT * FROM empresa  where cod_emp=1 ORDER BY rucempresa ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $emp .= '<option value="'.$row["rucempresa"].'">'.$row["empresa"].'</option>';
 
}

?>
<?php
//index.php

include('../database_connection.php');

$compra = '';

$query = "
 SELECT * FROM compracabecera   ORDER BY id_compra ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $compra .= '<option value="'.$row["nrcomprobante"].'">'.$row["nrcomprobante"].'</option>';
 
}

?>
<?php
//index.php

include('../database_connection.php');

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

<html lang="en">
  <head>
    <title>Registrar Notas de Credito o Debito</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="../estilo.css">
    <script src="../jquery.min.js"></script>
<!--    <script src="bootstrap.min.js"></script>-->
    <script src="adsbygoogle.js"></script>
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
    <script src="../assets/register.js"></script>
    <script>
      $(function() {
		$( "#fromix" ).datepicker({
			defaultDate: "+0w",
//			changeMonth: true,
			numberOfMonths: 1,
                        showOn: "button",
			buttonImage: "../jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
                            
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			defaultDate: "+0w",
//			changeMonth: true,
			numberOfMonths: 1,
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
                                      <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   
   var result = '';
 
   if(action == "factura")
   {
    result = 'idcompra';
    
   }
  
   $.ajax({
    url:"fetch3.php",
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
    </head>
    <body id="hhmenu"border="10">
 
   </head>
    <div id="menu-wrapper">
    
     <ul id="hmenu"> 
         <li><a >Configuracion</a>
               <ul id="sub-menu"> 
                 
            <li><a href="Productos.jsp">Productos</a> </li>
            <li><a href="Categoria de Productos.Jsp">Categoria de Productos</a> </li>
            <li><a href="Marcas.Jsp">Marcas</a> </li>    
            <li><a href="registrarProducto.jsp">Rubros</a> </li>
            <li><a href="">Sub-Rubros</a> </li>
            <li><a href="">Plantillas de Productos</a> </li>
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
                 
             <li><a href="Registrar Compra.jsp">Registrar Compra</a> </li>
           <li><a href="ReporteDeCompras.jsp">Reporte de Compras</a> </li>
             <li><a href="ÓrdenesDeCompras.jsp">Órdenes de Compra</a> </li>
           <li><a href="">Registrar Nota de Crédito</a> </li>
            <li><a href="">Notas de Crédito</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
      
           <li><a >Stock</a>
               <ul id="sub-menu"> 
                 
             <li><a href="">Inventario</a> </li>
           <li><a href="">Movimientos de Stock</a> </li>
             <li><a href="../Stock/Transferencias.jsp">Transferencias</a> </li>
           <li><a href="">Pedido de Transferencia</a> </li>
            <li><a href="">Registro de Perdidas</a> </li>
                     
              
                 </ul>         
           </li> 
            <li><a >Produccion</a>
               <ul id="sub-menu"> 
                 
             <li><a href="">Registrar Órden de Producción</a> </li>
           <li><a href="">Listar Órdenes de Producción</a> </li>
             <li><a href="Transferencias.jsp">Centros de Producción</a> </li>
           <li><a href="">Lineas de Producción</a> </li>
            <li><a href="">Administrar Materia Prima</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
           
      </ul> 
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="Registrar Compra.jsp">Registrar Notas de Crédito</a></li>
		<li><a href="Reportes de Compras.jsp">Listar Notas de Crédito</a></li>
		
	
	
</div>
    <h3><a style="color: black" href="Reportes de Compras.jsp">Reporte de Notas de Crédito y Debito</a></h3>
  
    <form id="getaction" method="post"action="actioncreditocompra.php">
          <h4><a style="color: black" href="Reportes de Compras.jsp">Registrar Nótas de Crédito y Debito</a></h4>
              <label id="labelempresaordencompra">Almacen</label>              
        <select  id="cboempresa"  name="empresa"> 
          
        <?php echo $emp; ?>       
        
        </select>


      

       
       <label id="labelcentrodecostosorden"style="margin-left: 325px;" >Buscar Proveedor</label> 
       <select id="cboestado"  name="prov"class="selectpicker" data-hide-disabled="true" data-live-search="true"title="Buscar Proveedor" > 
         
           <?php echo $prov; ?>                    
           
        </select>
        
          <label id="nrcomprobantenc">Número de Comprobante</label>
        <input id="textnumerocom" type="text" name="comprobante" value="" placeholder="Ingrese el Numero de Nota de Credito" />
<!--        <label id="fechanotacredito">Fecha</label>-->
     <label style="top:310px;">Fecha:<input type="text" id="fromix" name="fecha"/></label>

       <label id="Monedanc">Tipo de Comprobante</label>           
        <select  id="cbomonedanc"  name="tipo"> 
          
         
                <option> Para Nota de Credito </option>
                <option>Para Nota de Debito </option>
       

        
        </select>  
            
       <label id="labelcentrodecostosorden"style="margin-left: 325px;top: 345px;" >Almacen</label>          
        <select  id="cboalmacennc"  name="almacen"> 
          
           <?php echo $almac; ?>         
        
        </select> 
           <div
        <label id="seleccionefacuras">Seleccione Facturas      </label> 
         <select style="margin-right: 20px"   name="factura" id="factura" class="form-control action selectpicker " data-live-search="true"  title="Buscar Facturas de Compras.."> 
            <?php echo $compra; ?> 
           
         </select>
  
         </div>
          <label id="labelnotasnc">Notas</label>
       <input id="textnotasnc" type="text" name="guardar" value=""  />
        
        <input id="checkdevolver" type="checkbox" name="checkimpueto" value="ON" checked="checked" />
        <label id="devolveritems">Devolver Items</label>
        
        <h1 id="itemsnc">Items</h1>
      
          
                     
      
        
       
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
                      <th width="5%">Unitario.</th>
                       <th width="5%">Um.</th>
                      <th width="5%">Cantidad.</th>
                      <th width="5%">Total.</th>
                  
                      <th width="5%" rowspan="2">Totales.</th>
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
                     
                         
                <td align="right"><b>Total</td>
                 <td align="right"><b><span id="final_total_amt"></span></b></td>
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
                   
                  <input type="submit" name="crear_pedido" id="crear_pedido" class="btn btn-info" value="Gravar" />
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
          html_code += '<td><input type="text"value="'+precio+'" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text"value="'+nombres+'" name="order_item_um[]" id="order_item_um'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_um" /></td>';
          html_code += '<td><input type="number" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
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

        

        $('#crear_pedido').click(function(){
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

          $('#getaction').submit();

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
     </div>
  
 <select  style="margin-top:5px;position: relative;left:0px;" name="codigo" id="codigo" >
     
    </select>
                    <select style="margin-top:2px;position:relative;left:0px;" name="precio" id="precio" >
    
   </select>
                    
                                <select style="margin-top:6px;position:relative;left:0px;" name="nombres" id="nombres" >
    
   </select>
           <select style="margin-top:6px;position:relative;left:0px;" name="idcompra" id="idcompra">
             
         </select>

</div>
    </form>
    
    </body>
  
</html>
