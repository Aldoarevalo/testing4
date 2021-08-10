
<?php
//index.php

include('database_connection.php');

$almac = '';
$codigo = '';
$query = "
 SELECT * FROM almacen where codigoalmacen=1  ORDER BY almacen ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $almac .= '<option value="'.$row["almacen"].'">'.$row["almacen"].'</option>';
  $codigo .= '<option value="'.$row["codigoalmacen"].'">'.$row["codigoalmacen"].'</option>';
}

?>
<?php
//index.php

include('database_connection.php');

$producto = '';

$query = "
 SELECT * FROM productos  ORDER BY producto ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $producto .= '<option value="'.$row["producto"].'">'.$row["producto"].'</option>';
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
  
      <link rel="stylesheet" href="jquery1102/themes/base/jquery.ui.all.css">
	<script src="jquery1102/jquery-1.9.1.js"></script>
	<script src="jquery1102/ui/jquery.ui.core.js"></script>
	<script src="jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="jquery1102/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="jquery1102/demos/demos.css">
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
      <style>
	.ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
	</style>
     
        <title>Registrar Pedido de Compras</title>
        <Script src="AJAX/ajax_producto.js"></Script>
         <Script src="AJAX/ajax_masDetalle.js"></Script>
    </head>
    <body id="hhmenu">
       <link rel="stylesheet" type="text/css" href="estilo.css">
        
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
        
    
            <h3><a style="color: black" href="Transferencias.jsp">Reporte de Pedido de Compras</a></h3> 
      
        <form id="getactionordencompra"method="post" action="insert.php">
              
               <input type="hidden" name="accion" value="registraction="Controlador"arpedidocompra" />
               
            <h4><a style="color: black" href="Reportes de Compras.jsp">Registrar Peido de Compras</a></h4>
            
      <label id="labelempresaordencompra">Almacen</label>  
       
        <select  id="cboempresaordenor"  name="comboalmacenpedido"> 
       <?php echo $almac; ?> 
            
        </select>
   

     <label id="labelcentrodecostosorden" >Cliente</label>       
<select id="cbocentrodecostosor"  name="clientepedido"> 
            <option>ALIMENTOS Y SERVICIOS S.R.L</option>   
        </select>
     
                
        
    <div>
   <label style="top:210px;">Fecha:<input type="text" id="fromix" name="fecha"/></label>

<label style="top:210px;margin-left: 290px; ">Vencimiento:<input type="text" id="to" name="vencimient"/></label>

 <select style="margin-left:80px;position:inherit;top:0px; width: 0px;padding: 0px;background-color: whitesmoke;"   name="combocodigoalmacenpedido"> 
       <?php echo $codigo; ?> 
            
        </select>      
    
    
         
       <label7 id="labelpedidocompra" for="InvtransferenceNotes">Notas</label7>
       
         
         <input type="text" name="guardar" value=""id="textopedidocompra" />
    </div>

  
    

   
                <td colspan="2">
                    
               <div class="row">
         <table style="margin-left:30px;" id="invoice-item-table" class="table table-bordered" style="margin-left: 200px;width:1100px;margin-top:100px; ">
                    <tr>
                      <th width="1%">Nro°.</th>
                        <th width="7%">codigo.</th>
                      <th width="20%">Producto</th>
                      <th width="5%">Precio</th>
                      <th width="5%">Cantidad</th>
                      <th width="5%">Totales.</th>
                  
                      <th width="5%" rowspan="1">Total</th>
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
             
                  <div style="margin-left:455px;">
<!--                      <th><button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>-->
                      <button  type="button" name="add_row" id="add_row" class="btn btn-info">+</button>
                  </div>
                         <div style="margin-left:30px">
                     
                             
  <select   name="producto" id="producto" class="form-control action  selectpicker "  data-live-search="true" title="Buscar Productos ...">
    
     <?php echo $producto; ?>
    </select>
                       
                                    </div>
                  <select  style="top:590px;position: relative;margin-left:90px;" name="codigo" id="codigo" >
     
    </select>
                    <select style="top:590px;position:relative;margin-left:90px;" name="precio" id="precio" >
    
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
                  <input type="submit" name="crear_pedido" id="crear_pedido" class="btn btn-info" value="Create" />
                   
                </td>
              </tr>
          </table>
         
      
    </div>
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
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
            html_code += '<td ><input  type="text" value="'+codigo+'" name="item_cod[]"id="item_cod'+count+'" readonly="false" class="form-control readonly="false" input-sm1" /></td>';
           html_code += '<td ><input  type="text" value="'+producto+'" name="item_name[]"id="item_name'+count+'" readonly="false" class="form-control   input-sm" /></td>';
          html_code += '<td><input type="text"value="'+precio+'" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
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
          if($.trim($('#to').val()).length == 0)
          {
            alert("Please Enter Reciever Name");
            return false;
          }
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
</script>
<script>
$(document).ready(function(){
 $('#employee_list').click(function(){
  var id= $('#employee_list').val();
  if(id != '')
  {
   $.ajax({
    url:"fetch1.php",
    method:"POST",
    data:{id:id},
    dataType:"JSON",
    success:function(data)
    {
        
     $('#employee_details').css("display");
    $('#item_name').text(data.name);
     $('#employee_address').text(data.address);
     $('#employee_gender').text(data.gender);
     $('#employee_designation').text(data.designation);
     $('#employee_age').text(data.age);
    }
   })
  }
  else
  {
   alert("Please Select Employee");
   $('#employee_details').css("display");
  }
 });
});
</script>
  
                    </form>
            
    
          
    </body>
    
</html>
                                       