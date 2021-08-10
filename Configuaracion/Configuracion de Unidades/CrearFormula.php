<?php
//index.php

include('../../database_connection.php');

$um = '';

$query = "
 SELECT * FROM unidaddemedida   ORDER BY nombres ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $um .= '<option value="'.$row["idunidaddemedida"].'">'.$row["nombres"].'</option>';
 
}

?>



<?php
//index.php

include('../../database_connection.php');

$rubros = '';

$query = "
 SELECT * FROM rubros   ORDER BY nombre ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $rubros .= '<option value="'.$row["codigorubro"].'">'.$row["nombre"].'</option>';
 
}

?>
<?php
//index.php

include('../../database_connection.php');

$subrubros = '';

$query = "
 SELECT * FROM subrubros   ORDER BY subrubro ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $subrubros .= '<option value="'.$row["codigosubrubro"].'">'.$row["subrubro"].'</option>';
 
}

?>
<?php
//index.php

include('../../database_connection.php');

$producto = '';

$query = "  SELECT p.codigoproducto,p.producto,c.nombrecategoria FROM productos p,categoriadeproductos c 
 WHERE p.idcategoria=c.idcategoria ORDER BY p.codigoproducto,p.producto,c.nombrecategoria ASC ";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $producto .= '<option value="'.$row["producto"].'">'.$row["codigoproducto"].'.'.$row["producto"].'.'.$row["nombrecategoria"].'</option>';
}

?>
<?php
//index.php

include('../../database_connection.php');

$producto1 = '';

$query = "  SELECT p.codigoproducto,p.producto,c.nombrecategoria FROM productos p,categoriadeproductos c 
 WHERE p.idcategoria=c.idcategoria ORDER BY p.codigoproducto,p.producto,c.nombrecategoria ASC ";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
  $producto1 .= '<option value="'.$row["producto"].'">'.$row["codigoproducto"].'.'.$row["producto"].'.'.$row["nombrecategoria"].'</option>';

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
    <link rel="stylesheet" href="../../bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="../../jquery.min.js"></script>
<!--    <script src="bootstrap.min.js"></script>-->
    <script src="adsbygoogle.js"></script>
    <script src="../../jquery.dataTables.min.js"></script>
    <script src="../../dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../dataTables.bootstrap.min.css">
<!--       <script src="buscador/datos/jquery-1.6.4.min.js"></script>
<script src="buscador/datos/jquery-1.6.4.min.js"></script>-->
<!--  <link rel="stylesheet"href="bootstrap.min.css">-->
   <link rel="stylesheet" href="../../buscador/dist/css/bootstrap-select.css">
<!--  <script src="buscador/datos/jquery.min.js"></script>-->
<!--  <script src="buscador/datos/bootstrap.min.js"></script>-->
  <script src="../../buscador/dist/js/bootstrap-select.js"></script>
  
      <link rel="stylesheet" href="jquery1102/themes/base/jquery.ui.all.css">
	<script src="../../jquery1102/jquery-1.9.1.js"></script>
	<script src="../../jquery1102/ui/jquery.ui.core.js"></script>
	<script src="../../jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="../../jquery1102/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="../../jquery1102/demos/demos.css">
        
           
             <script src="../../bootstrap/js/bootstrap.min.js"></script>
<!--    <script src="assets/jquery-1.11.2.min.js"></script>-->
    <script src="../../assets/jquery.validate.min.js"></script>
    <script src="../../assets/validadorcompras.js"></script>
<!--    <script>
    $(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query2 = $(this).val();
   
   var result2 = '';
 
   if(action == "cboestado")
   {
    result2 = 'categoria';
    
   }
  
   $.ajax({
    url:"fetch2.php",
    method:"POST",
    data:{action:action, query2:query2},
    success:function(data){
     $('#'+result2).html(data);
   
    }
   })
  }
 });
 
});
</script>   --> 
        <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   
   var result = '';
 
   if(action == "centrodeproduccion")
   {
    result = 'cboestado';
    
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
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query2 = $(this).val();
   
   var result2 = '';
 
   if(action == "cboestado")
   {
    result2 = 'categoria';
    
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
	
        	$(function() {
		$( "#datepicker" ).datepicker({
                    altField: "#alternate",
			altFormat: "DD, d MM, yy",
			showOn: "button",
			buttonImage: "../../jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	});
  
	
function agregarfila() {
    if (tabla.getElementsByTagName("tr").length < 180) {
        crearElementos();
      
    } else {
        alert("Solo puede agregar 18 registros");
    }
}


function crearElementos()
{
    var tabla = document.getElementById("Tablaordenesdeproduccion");
    var fila = tabla.insertRow(1);

    // celda1.appendChild(t1);
    //celda2.appendChild(t2);

    var celda1 = fila.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "checkbox";
    celda1.appendChild(element1);

    var celda2 = fila.insertCell(1);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.disabled = "true";
    celda2.appendChild(element2);


    var celda3 = fila.insertCell(2);
    var element3 = document.createElement('a');
    var linkText = document.createTextNode("Buscar");
    element3.appendChild(linkText);
    element3.title = "Buscar";
    element3.href = "javascript:ventana('Configuracion/Categoria de Productos.jsp');"; //ventana que retorna los articulos
    celda3.appendChild(element3);
                       

    var celda4 = fila.insertCell(3);
    var element4 = document.createElement("input");
    element4.type = "text";
    element4.disabled = "true";
    celda4.appendChild(element4);

    var celda5 = fila.insertCell(4);
    var element5 = document.createElement("input");
    element5.type = "text";
    celda5.appendChild(element5);

}

function borrarFila() {
    try {
        var tabla = document.getElementById("Tablaordenesdeproduccion");
        var rowCount = tabla.rows.length;


        for (var i = 0; i < rowCount; i++) {

            var row = tabla.rows[i];
            var chkbox = row.cells[0].childNodes[0];

            if (null !== chkbox && true === chkbox.checked) {

                tabla.deleteRow(i);
                rowCount--;
                i--;
            }
        }
    } catch (e) {
        alert(e);
    }
}

</script>

        
        <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   
   var result = '';
 
   if(action == "formula")
   {
    result = 'codigo1';
    
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
//$(document).ready(function(){
// $('.action').change(function(){
//  if($(this).val() != '')
//  {
//   var action = $(this).attr("id");
//   var query2 = $(this).val();
//   
//   var result2 = '';
// 
//   if(action == "formula")
//   {
//    result2 = 'codigo2';
//    
//   }
//  
//   $.ajax({
//    url:"fetch.php",
//    method:"POST",
//    data:{action:action, query2:query2},
//    success:function(data){
//     $('#'+result2).html(data);
//   
//    }
//   })
//  }
// });
// 
//});
 </script>
       <link rel="stylesheet" type="text/css" href="../../estilo.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Registrar Órdenes de Producción</title>
         <Script src="AJAX/ajax_producto.js"></Script>
         <Script src="AJAX/ajax_masDetalle.js"></Script>
    </head>
    <body id="hhmenu">
       
        
          <div id="menu-wrapper">
    
     <ul id="hmenu"> 
        
         <li><a >Configuracion</a>
            
               <ul id="sub-menu"> 
                 
            <li><a href="Informes Web/Informes de Movimientos de Compras/Informes de Movimientos de Compras.jsp">Productos</a> </li>
            <li><a href="Configuracion/Categoria de Productos.jsp">Categoria de Productos</a> </li>
            <li><a href="Configuracion/Marcas.jsp">Marcas</a> </li>    
            <li><a href="Configuracion/Rubros.jsp">Rubros</a> </li>
            
   
            <li><a href="jquery-ui-1.10.2/demos/dialog/newjsp.jsp">Plantillas de Productos</a> </li>
            <li><a href="Configuracion/Centro de Costos.jsp">Centro de Costos</a></li>
            <li><a href="Configuracion/Monedas.jsp">Monedas</a> </li>
            <li><a href="Configuracion/Impuestos.jsp">Impuestos</a> </li>
            <li><a href="Configuracion/Usuarios.jsp">Usuarios</a></li>
            <li><a href="Configuracion/Empleados.jsp">Empleados</a></li>
            <li><a href="Configuracion/Empresas.jsp">Empresas</a> </li>
            <li><a href="Configuracion/Sucursales.jsp">Sucursales</a></li>
            <li><a href="Configuracion/Almacenes.jsp">Almacenes</a> </li>
            <li><a href="Configuracion/Proveedores.jsp">Proveedores</a> </li>
            <li><a href="Configuracion/Centros de Produccion.jsp">Centros de Produccion</a> </li>
            <li><a href="MDI.java" new="_JFrame">mid</a></li>
            <li> <a href="MDI.java" target="_top"></a>mdiddd</li>
            <a href="" target="_top"></a>
             <a href="Reporte">Reporte de Ventas</a>
             
                 </ul> 
                      
           </li> 
        </li> 
            <li><a >Compras</a>
               <ul id="sub-menu"> 
               
             <li><a href="PedidoDeCompras.jsp">Registrar Pedido de Compras</a><li>  
          
             <li><a href="RegistrarPresupuestoDeProveedor.jsp">Registrar Presupuesto de Proveedor</a> </li>
             <li><a href="CrearOrdendeCompra.jsp">Registrar Órdenes de Compras</a> </li>
           <li><a href="RegistrarCompra.jsp">Registrar Compras</a> </li>
            <li><a href="RegistrarNotaDeCredito.jsp">Registrar Ajustes de Iventario</a> </li>
            <li><a href="RegistrarNotaDeCredito.jsp">Registrar Nota de Credito y Debito</a> </li>
            <li><a href="RegistrarPedidodeTransferencia.jsp">Registrar Pedido de Remisio</a> </li>
                  <li><a href="RegistrarNotaDeRemision.jsp">Registrar Nota de Remision</a> </li> 
                     
                       <li><a href="Stock/inventario.jsp">controlar Inventario por Depositos</a> </li>
                           <li><a href="Stock/inventario.jsp"></a> </li>
               </ul>    
           </li> 
      
           <li><a >Producion</a>
               <ul id="sub-menu"> 
                 
                     <li><a href="RegistrarEtapadeProduccion.jsp">Registrar Etapa de Produccion</a> </li>
              <li><a href="RegistrarOrdendeProduccion.jsp">Registrar etapa de Producción</a> </li>
             <li><a href="Stock/Transferencias.jsp">asignar materia prima</a> </li>
             <li><a href="Stock/Pedidos.jsp">Pedido de Transferencia</a> </li>
            <li><a href="NewJDialog.java">Registro de Perdidas</a> </li>
          
              
                 </ul>         
           </li> 
            <li><a >facturacion</a>
               <ul id="sub-menu"> 
                 
             <li><a href="RegistrarOrdendeProduccion.jsp">Registrar Órden de Producción</a> </li>
           <li><a href="Produccion/ListarOrdenesdeProduccion.jsp">Listar Órdenes de Producción</a> </li>
             <li><a href="newjsp.jsp">Centros de Producción</a> </li>
           <li><a href="">Lineas de Producción</a> </li>
            <li><a href="AdministrarMateriaPrima.jsp">Administrar Materia Prima</a> </li>
       
                     
                 </ul> 
                      
           </li> 
          <li><a >Informes</a>
            
               <ul id="sub-menu"> 
                 
            <li><a href="Informes Web/Informes de Movimientos de Compras/Informes de Movimientos de Compras.jsp">Iformes de compras</a> </li>
            <li><a href="Informes Web/Informes de Movimientos de Productos/Informes de Movimientos de Productos.jsp">informes de Productos</a> </li>
            <li><a href="Configuracion/Marcas.jsp">Marcas</a> </li>    
            <li><a href="Configuracion/Rubros.jsp">Rubros</a> </li>
            
   
            
             
                 </ul> 
                      
           </li> 
        </li>  
      </ul> 
              
    </div>
   
          <div id="menu" >
	
		<li><a href="MantenerFormula.php">Mantener Formula</a></li>
		
	
</div>
        
        
            <h3  ><a style="color: black;" href="Transferencias.jsp">Crear Formula</a></h3>    
        <form id="getactionorden" name="getactionorden" method="post"action="actionformula.php">
            <input type="hidden" name="accion" value="registrarproduccion" />
            <h4><a style="color: black" href="Reportes de Compras.jsp">Crear Formula</a></h4>
   
      <label113 id="label113" >Rubro</label113>                      
        <select  id="centrodeproduccion"  name="centrodeproduccion" class="form-control action"> 
              <option value="">Seleccione un Rubro</option>
        <?php echo $rubros; ?>      
        
        
        </select>


     <label1 id="labelestadoorden">Sub-Rubro</label1>       
<select id="cboestado"  name="cboestado" class="form-control action" title="Buscar Nombre Para Formula ..."> 
        <option value="">Select Un subRubro</option>
                       
           
        </select>
  <label style="position:absolute;top:180px;margin-left:610px;">Categoria de Producto:</label>                 
<select id="categoria"  name="categoria" > 
     <option value="">Select Una Categoria</option>     
                         
           
        </select>
                       
                        
   
        <div>
    
       <label id="labeltipoproduccion">Unidad de Medida</label>                      
        <select  id="cbotipoproduccion"  name="um"> 
          
            <?php echo $um; ?>

        </select>
                   
         <label style="position:absolute;top:345px;margin-left:430px;">Buscar Nombre de Formula:                 
         <select style="margin-right: 20px"   name="formula" id="formula" class="form-control action selectpicker" data-live-search="true"  title="Buscar Nombre Para Formula ..."> 
           <?php echo $producto1; ?>        
            
         </select></label> 
           <select style="margin-left: 20px;position: relative;" name="codigo1" id="codigo1">
             
         </select>
<!--       <select style="margin-left: 560px;position: relative;" name="codigo2" id="codigo2">
             
         </select> -->
<!--         <label style="margin-top: 315px;">Notas</label>-->
<!--          <label style="margin-top: 892px;">Buscar Persona a Cargo</label>-->
<!--         <input id="datosordenes" type="text" name="guardar" />-->
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
                     
                      <th width="5%">Formula.</th>
                       <th width="5%">Cantidad Resultante.</th>
                   <th width="5%">Composicion.</th>
                   
                    <th width="1%"></th>
                   <th width="3%" rowspan="2"></th>
                    </tr>
                    <tr>
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
<!--               <tr>
                     
                         
                <td align="right"><b>Total</td>
                 <td align="right"><b><span id="final_total_amt"></span></b></td>
              </tr>-->
              
              <tr>
                <td colspan="2">    <div style="margin-left:455px;margin-bottom: 10px;">
<!--                      <th><button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>-->
                      <button  type="button" name="add_row" id="add_row" class="btn btn-info">+</button>
                  </div>
                    <div style="margin-left:30px;">
                     
                             
                             
  <select   name="producto" id="producto"  class="form-control action selectpicker "  data-live-search="true" title="Buscar Productos Para Formula">
    
     <?php echo $producto; ?>
    </select>
                       
                                  </div>
                 
        </td>
              </tr>
              
              <tr>
                <td colspan="2" align="center">
                    
                  <input type="hidden" name="total_item" id="total_item" value="" />
                  <input type="hidden" name="idPedidoCompra" id="idPedidoCompra " value="" />
                   
                  <input type="submit" name="crear_formula" id="crear_formula" class="btn btn-info" value="Gravar" />
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
        
        
//          var al = $("#cboalmdestino").val();
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          html_code += '<td ><input  type="text" value="'+codigo+'" name="item_cod[]"id="item_cod'+count+'" readonly="false" class="form-control readonly="false" input-sm1" /></td>';
          html_code += '<td ><input  type="required" value="'+producto+'" name="item_name[]"id="item_name'+count+'" readonly="false" class="form-control   input-sm" /></td>';
         
          html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'"   class="form-control input-sm number_only order_item_quantity" /></td>';
//          html_code += '<td><input type="text"value="'+nombres+'" name="order_item_um[]" id="order_item_um'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_um" /></td>';
          html_code += '<td><input type="number" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
//          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
            
          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
//            html_code += '<td><input type="text" style=" width:0px; height: 0px;background-color:white;margin-left:0px;" value="'+al+'" name="al[]" id="al'+count+'" data-srno="'+count+'" /></td>';
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

        

        $('#crear_formula').click(function(){
//          if($.trim($('#cboalmdestino').val()).length == 0)
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

          $('#getactionorden').submit();

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
    url:"../../fetch.php",
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
    url:"../../fetch.php",
    method:"POST",
    data:{action:action, query2:query2},
    success:function(data){
     $('#'+result2).html(data);
   
    }
   })
  }
 });
 
});
//$(document).ready(function(){
// $('.action').change(function(){
//  if($(this).val() != '')
//  {
//   var action = $(this).attr("id");
//   var query1 = $(this).val();
//   
//   var result1 = '';
// 
//   if(action == "producto")
//   {
//    result1 = 'precio';
//    
//   }
//  
//   $.ajax({
//    url:"../../fetch.php",
//    method:"POST",
//    data:{action:action, query1:query1},
//    success:function(data){
//     $('#'+result1).html(data);
//   
//    }
//   })
//  }
// });
// 
//});
</script>

     </div>
  
 <select  style="margin-top:5px;position: relative;left:0px;" name="codigo" id="codigo" >
     
    </select>
<!--                    <select style="margin-top:2px;position:relative;left:0px;" name="precio" id="precio" >
    
   </select>-->
                    
                                <select style="margin-top:6px;position:relative;left:0px;" name="nombres" id="nombres" >
    
   </select>
