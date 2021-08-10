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

$marca = '';

$query = "
 SELECT * FROM marca   ORDER BY idmarca ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $marca .= '<option value="'.$row["idmarca"].'">'.$row["nombre"].'</option>';
 
}

?>
<?php
//index.php

include('../../database_connection.php');

$cenc = '';

$query = "
 SELECT * FROM centrodecostos  ORDER BY idCentroDeCosto  ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $cenc .= '<option value="'.$row["idCentroDeCosto"].'">'.$row["nombrecentro"].'</option>'; 
 
}

?>

<?php
//index.php

include('../../database_connection.php');

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
<!DOCTYPE html>
<html>
       <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <a href=></a>
     <title>Editar Plantilla</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../../bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="../../estilo.css">
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
         
                   <?php
      }
      elseif(isset($_GET["updatep"]) && isset($_GET["idplantilla"]))
      {
        $statement = $connect->prepare("
          SELECT * FROM plantillasv
            WHERE idplantilla = :idplantilla group by idplantilla
           
        ");
        $statement->execute(
          array(
            ':idplantilla'       =>  $_GET["idplantilla"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
        ?>
<!--        <script>
        $(document).ready(function(){
          $('#fromix').val("<?php echo $row["Fecha"]; ?>");
          $('#to').val("<?php echo $row["Vencimiento"]; ?>");
          $('#textopedidocompra').val("<?php echo $row["Notas"]; ?>");
        
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
        
        
            <h3  ><a style="color: black;" href="Transferencias.jsp">Crear Formula</a></h3>    
        <form id="getactionorden" name="getactionorden" method="post"action="actionplantilla.php">
            <input type="hidden" name="accion" value="registrarproduccion" />
            <h4><a style="color: black" href="Reportes de Compras.jsp">Crear Plantilla</a></h4>
   
      <label113 id="label113" >Centro de Costos</label113>                      
        <select  id="centrodeproduccion"  name="centrodecosto" class="form-control action"> 
             
        <?php echo $cenc; ?>      
        
        
        </select>


     <label1 id="labelestadoorden">Marca</label1>       
<select id="cboestado"  name="marca" class="form-control action" title="Buscar Productos Para la Plantilla ..."> 
        <?php echo $marca; ?>     
                       
           
        </select>
  <label style="position:absolute;top:180px;margin-left:610px;">Centro de Produccion:</label>                 
<select id="categoria"  name="centroproduccion" > 
      <?php echo $cen; ?>         
                         
           
        </select>
                       
                        
   
        <div>
    

<label id="labelgeneral">Nombre de Plantilla Nueva</label>
       <input id="txtnombrecategoria" type="text" name="nombreplantilla" value = "<?php echo $row["nombreplantilla"]; ?>" />
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
                        <th width="20%">Unidad de Medida.</th>
                   
                    <th width="1%"></th>
                  
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                     
                        
                    
                    </tr>
                    <?php
                    $statement = $connect->prepare("
                    SELECT * FROM plantillasv
                   
                      WHERE idplantilla = :idplantilla order by idplantilla
                    ");
                    $statement->execute(
                      array(
                        ':idplantilla'       =>  $_GET["idplantilla"]
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
                       <td><input type="text" name="item_cod[]" id="item_name<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["codigoproducto"]; ?>" /></td>
                      <td><input type="text" name="item_name[]" id="item_name<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["producto"]; ?>" /></td>
                      <td><input type="text" name="order_item_um[]" id="order_item_um<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_um" value = "<?php echo $sub_row["nombres"]; ?>"/></td>

<!--                      <td><input type="text" name="order_item_price[]" id="order_item_price<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_price" value="<?php echo $sub_row["cantidadresultante"]; ?>" /></td>
                      <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_actual_amount" value="<?php echo $sub_row["composicion"];?>" readonly /></td>-->
           

                       
                      <td></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </table>
                </td>
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
                  <input type="hidden" name="idplantilla" id="idplantilla <?php echo $m; ?>" value="<?php echo $row["idplantilla"]; ?>" />
                  <input type="submit" name="updatef" id="updatef" class="btn btn-info" value="Editar" />
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
         var nombres = $("#nombres").val();
        
//          var al = $("#cboalmdestino").val();
         html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          html_code += '<td ><input  type="text" value="'+codigo+'" name="item_cod[]"id="item_cod'+count+'" readonly="false" class="form-control readonly="false" input-sm1" /></td>';
          html_code += '<td ><input  type="required" value="'+producto+'" name="item_name[]"id="item_name'+count+'" readonly="false" class="form-control   input-sm" /></td>';
//          html_code += '<td><input type="text"value="'+precio+'" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'"   class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text"value="'+nombres+'" name="order_item_um[]" id="order_item_um'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_um" /></td>';
//          html_code += '<td><input type="number" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
//          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
            
//          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
//            html_code += '<td><input type="text" style=" width:0px; height: 0px;background-color:white;margin-left:0px;" value="'+al+'" name="al[]" id="al'+count+'" data-srno="'+count+'" /></td>';
          html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';          $('#invoice-item-table').append(html_code);
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

        

        $('#updatef').click(function(){
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
  
     
      </form>
     
        <?php 
        }
      }
      else
      {
      ?>
      <h3 align="center">Invoice System Using Jquery PHP Mysql and Bootstrap</h3>


 
      <table id="data-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="1%">Nro°.</th>
                        <th width="7%">codigo.</th>
                      <th width="20%">Producto</th>
                      <th width="5%">Precio</th>
                       <th width="5%">Um</th>
                      <th width="5%">Cantidad</th>
                      <th width="5%">Totales.</th>
                  
                      <th width="5%" rowspan="2">Total</th>
          </tr>
        </thead>
        //<?php
//        if($total_rows > 0)
//        {
//          foreach($all_result as $row)
//          {
//            echo '
//              <tr>
//                <td>'.$row["idPedidoCompra"].'</td>
//                <td>'.$row["Fecha"].'</td>
//                <td>'.$row["Vencimiento"].'</td>
//                <td>'.$row["codigoalmacen"].'</td>
//                <td><a href="print_invoice.php?pdf=1&idPedidoCompra='.$row["idPedidoCompra"].'">PDF</a></td>
//                <td><a href="registrar.php?update=1&idPedidoCompra='.$row["idPedidoCompra"].'"><span class="glyphicon glyphicon-edit"></span></a></td>
//                <td><a href="#" idPedidoCompra="'.$row["idPedidoCompra"].'" class="delete"><span class="glyphicon glyphicon-remove"></span></a></td>
//              </tr>
//            ';
//          }
//        }
//        ?>
      </table>

      <?php
      }
      ?>
   </div>

  </body>
</html>
