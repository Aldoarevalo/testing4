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
<html>
    <head>
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
    <script src="assets/validadorordencompras.js"></script>
            
        <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   
   var result = '';
 
   if(action == "prov")
   {
    result = 'pres';
    
   }
  
   $.ajax({
    url:"fetch2.php",
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
         <script>
	$(function() {
		$( "#from" ).datepicker({
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
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
        $( "#from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
                         showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
				$( "#fecha" ).datepicker( "option", "maxDate", selectedDate );
			}
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
	
		<li><a href="Registrar Transferencia.jsp">Crear Orden de Compra</a></li>
		<li><a href="Transferencias.jsp">Listar Ãrdenes de Compra</a></li>
		
	
	
</div>
        
        
            <h3><a style="color: black" href="Transferencias.jsp">Ãrdenes de Compra</a></h3>    
        <form id="getactionordencompra"method="post"action="insertordencompra.php" >
               <input type="hidden" name="accion" value="registrarOrden" />
            <h4><a style="color: black" href="Reportes de Compras.jsp">Crear Orden de Compra</a></h4>
       
      <label id="labelempresaordencompra">Almacen</label>                      
        <select  id="cboempresaordenor"  name="comboempresaordencompra"> 
          <option> Materias Primar </option> 
           
        
        </select>


     <label id="labelcentrodecostosorden" >Centro de Costos </label>       
<select id="cbocentrodecostosor"  name="combocentrodecostosorden"> 
        <?php echo $centrocosto; ?>        
        </select>
      
        <div class="form-group">
          
     
   
     
   <label style="top:250px">Fecha:<input type="text" id="from" name="from"readonly="false"/>   <span class="help-block" id="error"></span></label>
   
               
</div>
     <div class="form-group">
<label style="top:250px;margin-left: 290px; ">Vencimiento:<input type="text" id="to" name="to"readonly="false"/><span class="help-block" id="error"></span></label>

</div>
  <div class="form-group">
 <div  style="margin: 40px;position: absolute;margin-left: 120px;" >
     <label style="position: relative;top:4px;margin-left:0px;">buscar Proveedor:</label>

    
    
                <select   name="prov" id="prov"  class="form-control action  selectpicker "  data-live-search="true" title="Buscar Presupuesto de Proveedor ...">
     <?php echo $prov; ?>
      </select>
             <span class="help-block" id="error"></span>
   </div>
     </div>     
      <div  style="margin: 130px;position: absolute;" class="form-group">
     <label style="position: relative;top:4px;margin-left:0px;">buscar Presupuesto de Proveedor:</label>

    
    
                <select   name="pres" id="pres" class=" form-control action"  >
    
      </select>
      
   </div>
    
       
     
        <div class="form-group">
         
     <div style="margin-top:40px;"> 
          
       <label id="labelnotasordenc" style="position:relative;" for="InvtransferenceNotes">Notas</label>
       
         
         <input id="textopresupues" type="text" name="guardar" value=""id="textopedidocompra" />
   <span class="help-block" id="error"></span>
            </div>
            </div> 
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
                      <th width="5%">Precio.</th>
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
             
                  <div style="margin-left:455px;">
<!--                      <th><button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>-->
                      <button  type="button" name="add_row" id="add_row" class="btn btn-info">+</button>
                  </div>
                         <div style="margin-left:30px">
                             
                             
  <select    name="producto" id="producto" class="form-control action  selectpicker "  data-live-search="true" title="Buscar Productos ...">
    
    <?php echo $producto; ?>
       
     
    </select>
                       
                                    </div>
                  <select  style="top:105px;position: relative;margin-left:90px;" name="codigo" id="codigo" >
     
    </select>
                    <select style="top:105px;position:relative;margin-left:90px;" name="precio" id="precio" >
    
   </select>
                                <select style="top:105px;position:relative;margin-left:90px;" name="nombres" id="nombres" >
    
   </select>
                  
                </td>
              </tr>
            
              <tr>
                 
                <td align="right"><b>Total</td>
                <td align="right"><b><span id="final_total_amt" ></span></b></td>
              
                </tr>
            
              <tr>
                
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                 
                   
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
        
         
         <label id="labelterminosdepagoorden" >TÃ©rminos de Pago</label>       
<select id="cboterminosdepagoorden"  name="comboterminosdepagoorden"> 
    <option> Contado </option>
      <option> Credito </option>
        </select>
        <div class="form-group">
        <label id="labelfechaentregaorden" >Fecha de Entrega</label> 
         <input  id="fecha" type="text" name="fecha" value=""readonly="false"  />
          <span class="help-block" id="error"></span>
         </div>
          <div class="form-group">
         <div>
      
          <label id="labelsitioentrega" >Sitio de Entrega</label> 
            
         <input id="txtsitioentrega" type="text" name="txtssitios" value=""  />
         <span class="help-block" id="error"></span>
         </div>
      
          </div>
<!--        <input id="Aceptargrabarorden" value="Aceptar" type="submit">-->
           <input type="hidden" name="total_item" id="total_item" value="1" />
                  <input type="submit" name="crear_orden" id="Aceptargrabarorden" class="btn btn-info" value="Aceptar" />
         </form>
        
          
    </body>
</html>
                                      