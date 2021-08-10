<?php
//index.php

include('../database_connection.php');

$marca = '';

$query = "
 SELECT fechaelaboracion  FROM vistaoproduccion  ORDER BY fechaelaboracion  ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $marca .= '<option value="'.$row["fechaelaboracion"].'">'.$row["fechaelaboracion"].'</option>';
 
}

?>
<?php
//index.php

include('../database_connection.php');

$rubros = '';

$query = "
 SELECT * FROM vistaoproduccion   ORDER BY fechaentrega  ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $rubros .= '<option value="'.$row["fechaentrega"].'">'.$row["fechaentrega"].'</option>';
 
}

?>
<?php
//index.php

include('../database_connection.php');

$subrubros = '';

$query = "
 SELECT * FROM vistaoproduccion  ORDER BY idorden ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $subrubros .= '<option value="'.$row["idorden"].'">'.$row["idorden"].'</option>';
 
}

?>
<?php
//index.php

include('../database_connection.php');

$um = '';

$query = "
 SELECT * FROM vistaoproduccion  ORDER BY idorden ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $um .= '<option value="'.$row["idorden"].'">'.$row["idorden"].'</option>';
 
}

?>

<?php
//index.php

include('../database_connection.php');

$categ = '';

$query = "
 SELECT * FROM categoriadeproductos   ORDER BY nombrecategoria ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $categ .= '<option value="'.$row["idcategoria"].'">'.$row["nombrecategoria"].'</option>';
 
}

?>
<?php
//index.php

include('../database_connection.php');

$imp = '';

$query = "
 SELECT * FROM impuestos   ORDER BY nombre ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $imp .= '<option value="'.$row["idimpuesto"].'">'.$row["nombre"].'</option>';
 
}

?>
<link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../bootstrap.min.css">
     
    <script src="../jquery.min.js"></script>
<!--    <script src="bootstrap.min.js"></script>-->
    <script src="adsbygoogle.js"></script>
    <script src="../jquery.dataTables.min.js"></script>
    <script src="../dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../dataTables.bootstrap.min.css">
<!--       <script src="buscador/datos/jquery-1.6.4.min.js"></script>
<script src="buscador/datos/jquery-1.6.4.min.js"></script>-->
<!--  <link rel="stylesheet"href="bootstrap.min.css">-->
   <link rel="stylesheet" href="../buscador/dist/css/bootstrap-select.css">
<!--  <script src="buscador/datos/jquery.min.js"></script>-->
<!--  <script src="buscador/datos/bootstrap.min.js"></script>-->
  <script src="../buscador/dist/js/bootstrap-select.js"></script>
        
          <script src="../jquery1102/ui/jquery-ui.js"></script>  
           <link rel="stylesheet" href="../jquery1102/themes/base/jquery-ui.css">  
     
	<link rel="stylesheet" href="../../jquery1102/themes/base/jquery.ui.all.css">
	<script src="../jquery1102/jquery-1.9.1.js"></script>
	<script src="../jquery1102/ui/jquery.ui.core.js"></script>
	<script src="../jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="../jquery1102/ui/jquery.ui.tabs.js"></script>
        <script src="../jquery1102/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="../../jquery1102/demos/demos.css">
        <link rel="stylesheet" href="../estilo.css">
        
        
        
        
              
   
	<script src="../jquery1102/ui/jquery.ui.mouse.js"></script>
	<script src="../jquery1102/ui/jquery.ui.draggable.js"></script>
	<script src="../jquery1102/ui/jquery.ui.position.js"></script>
	<script src="../jquery1102/ui/jquery.ui.resizable.js"></script>
	<script src="../jquery1102/ui/jquery.ui.button.js"></script>
	<script src="../jquery1102/ui/jquery.ui.dialog.js"></script>
	<script src="../jquery1102/ui/jquery.ui.effect.js"></script>
	<script src="../jquery1102/ui/jquery.ui.effect-blind.js"></script>
	<script src="../jquery1102/ui/jquery.ui.effect-explode.js"></script>
        <link rel="stylesheet" type="text/css" href="../tcal.css" />
<script type="text/javascript" src="../tcal.js"></script>
	<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1800, height=1800, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 2000px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
        	<script>
	$(function() {
		var 
			
			allFields = $( [] ),
			tips = $( ".validateTips" );

		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 540,
                    
			width: 500,
                       
			modal: true,
                        
                        show: {
				effect: "blind",
				duration: 1000
			},
			hide: {
				effect: "explode",
				duration: 1000
			},
			
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		$( "#filter" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
	});
	</script>
        <script>
      $(function() {
		$( "#from_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
                        showOn: "button",
			buttonImage: "../jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
                            
				$( "#to_date" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
                         showOn: "button",
			buttonImage: "../jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
				$( "#from_date" ).datepicker( "option", "maxDate", selectedDate );
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
            
	$(function() {
		$( "#tabs" ).tabs({
//			event: "mouseover"
		});
	});
        $(function() {
		$( "#tabs2" ).tabs({
//			event: "mouseover"
		});
	});
	</script>
        <script>  
      $(document).ready(function(){  
//           $.datepicker.setDefaults({  
//                dateFormat: 'yy-mm-dd'   
//           });  
           $(function(){  
                $("#combomarcas")();  
                  ("#comborubroprod")();  
                 
                  ("#combosub1")(); 
                   ("#combocat1")(); 
           });  
           $('#filtro').click(function(){  
                var from_date = $('#combomarcas').val();  
                var to_date = $('#comborubroprod').val();  
                 var a_sub = $('#combosub1').val();
                   var a_sub1 = $('#combocat1').val();  
                if(from_date != '' && to_date != ''&& a_sub != ''&& a_sub1 != '')  
                {  
                     $.ajax({  
                          url:"vistamantenerproducto.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date, a_sub:a_sub,a_sub1:a_sub1},  
                          success:function(data)  
                          {  
                               $('#Tabla1').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Por Favor Seleccione una Fecha");  
                }  
           });  
      });  
 </script>
 <div id="tabs">
	<ul>
		<li><a href="#tabs-1">Consulta de Configuracion de Producto</a></li>
		<li><a href="#tabs-2">Consulta de Configuracion de Categorias</a></li>
		<li><a href="#tabs-3">Consulta de Configuracion de Costos</a></li>
                <li><a href="#tabs-4">Consulta de Congiguracion de Contactos</a></li>
                 <li><a href="#tabs-5">Consulta de Congiguracion de Localidades</a></li>
                  <li><a href="#tabs-6">Consulta de Congiguracion de Unidades</a></li>
	</ul>
	<div id="tabs-1">
<!--            <p> Consulta de Productos</p> 
		<p> -->
             <center>
             <div id="tabs2">
                 <link rel="stylesheet" href="../estilo.css">
	<ul>
		<li><a href="#tabs2-1">Consulta de Productos</a></li>
		<li><a href="#tabs2-2">Consulta de Impuestos</a></li>
                <li><a href="#tabs2-3">Consulta de Marcas</a></li>
	</ul>
                 <div id="tabs2-1">
                      
                <form method="post"action="../print_invoice.php">   
    
 
    <label>   Marcaeee
                      d 
                         <select  id="combomarcas"  class=" form-group"  name="combomarcas"  > 
                         
                         <?php echo $marca; ?>
                           </select> 
          </label>
                         <label style="margin-left: 250px;" id="labelgeneral2">Rubro
           <select  id="comborubroprod"  name="comborubroprod"> 
          
                      <?php echo $rubros; ?> 

        </select>
       </label>
                     <label style="margin-left: 430px;" >Sub-Rubro
           <select type=""  id="combosub1"  name="combosub"> 
              <option> seleccio </option>
          <?php echo $subrubros; ?> 
           
        
        </select>
                         </label>
                           <label style="margin-left: 730px;" id="">Categoria-De-Productos
                         <select  id="combocat1"  name="combocategoria"> 
           <option> seleccio </option>
              <?php echo $um; ?> 
        
        </select>
                               </label>
   <div class="col-md-16" style="margin-left: 80px;">  
        <input type="hidden" name="idPedidoCompra" id="idPedidoCompra " value="<?php echo $row["idorden"]; ?>" />
       <input type="submit" value="fil" name="pdf" id="pdf" />
       
                     <input  type="button" name="filtro" id="filtro" value="Filtrar" class="btn btn-info" />  
                </div>
     
                <div style="clear:both"></div>                 
                <br />    
                 <div style="margin-left: 490px;" > 
      
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                        
 
              </div>
        
 <div class="content" id="content">  
    
     <div id="Tabla1"> 
     <table id="Tabla1"border="1"cellspacing="0"cellpading="0"rules="all"class="table table-bordered table-striped">
                 <thead>
        <tr style="background-color:white">
                       
                       <td>Codigo</td>
                       <td>Producto</td>
                       <td>Marca</td>
                       <td>Rubros</td>
                       <td>Sub-Rubros</td>
                       <td>Categoria</td>  
                       <td>Precio</td>
                       <td>Impuesto</td>
                       <td>Unidad-De-Medida</td>  
                      
                      
                 
                   </tr>
           
        </thead>
      
       
              <tr>
                <td></td>
               
                    
               
               

             
        

            </table>
     </div>
                 </div>
                    <div id="dialog-form" title="Filtros">
	
	
	<fieldset style="height:444px;width:450px ">
            
		  <label  style="margin-left: 240px;"  id="labelgeneral1">Marca</label>
                        <div class="form-group">
<label style="top:150px;margin-left: 320px; ">Vencimiento:<input  name="to_date" id="to_date"/></label>
<span class="help-block" id="error"></span>
          </div>
                         <select  id="combomar1"  class="datepicker"  name="combomarcas"  > 
                         
                         <?php echo $marca; ?>
                           </select> 
                <input style="margin-top: 462px;margin-left:180px "  type="submit" value="grabar" />
	</fieldset>
	
</div>
                </form> 
           </div>  
                 
                 <div id="tabs2-2">
                   
    
<!--  <h3 align="center">Consulta de Pedido de Compras</h3>  -->
                   <div class="form-group">
   <label style="top:150px;">Fecha:<input type="date" name="from_date" id="from_date"/></label>
   
      <span class="help-block" id="error"></span>
</div>
          <div class="form-group">
<label style="top:150px;margin-left: 320px; ">Vencimiento:<input type="text" name="to_date" id="to_date"/></label>
<span class="help-block" id="error"></span>
          </div>
   <div class="col-md-16" style="margin-left: 80px;">  
                     <input  type="button" name="filtro" id="filtro" value="Filtrar" class="btn btn-info" />  
                </div>
      
                <div style="clear:both"></div>                 
                <br />  
                 <div style="margin-left: 490px;" > 
      <form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="create_pdf"id="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>            
   Buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
              </div>
 <div class="content" id="content">  
     <div id="Tabla1"> 
     <table id="Tabla1"border="1"cellspacing="0"cellpading="0"rules="all"class="table table-bordered table-striped">
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
      
       
              <tr>
                <td></td>
               
                    
               
               

     </table>
     </div>
                 </div>
           </div>  
                 <div id="tabs2-3">
                   
    
<!--  <h3 align="center">Consulta de Pedido de Compras</h3>  -->
                   <div class="form-group">
   <label style="top:150px;">Fecha:<input type="text" name="from_date" id="from_date"/></label>
   
      <span class="help-block" id="error"></span>
</div>
          <div class="form-group">
<label style="top:150px;margin-left: 320px; ">Vencimiento:<input type="text" name="to_date" id="to_date"/></label>
<span class="help-block" id="error"></span>
          </div>
   <div class="col-md-16" style="margin-left: 80px;">  
                     <input  type="button" name="filtro" id="filtro" value="Filtrar" class="btn btn-info" />  
                </div>
      
                <div style="clear:both"></div>                 
                <br />  
                 <div style="margin-left: 490px;" > 
      <form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>            
   Buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
              </div>
 <div class="content" id="content">  
     <div id="Tabla1"> 
     <table id="Tabla1"border="1"cellspacing="0"cellpading="0"rules="all"class="table table-bordered table-striped">
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
      
       
              <tr>
                <td></td>
               
                    
               
               

             
        

            </table>
     </div>
                 </div>
           </div>     
<!--                    <a id="filter">Filtros</a>-->
                   
        
                </center>

</p>

	</div>
	<div id="tabs-2">
       <center>
    <?php $h1 = "Consulta de Produccion";
            	 echo '<h1>'.$h1.'</h3>'
				?>       
    
<!--  <h3 align="center">Consulta de Pedido de Compras</h3>  -->
                   <div class="form-group">
   <label style="top:150px;">Fecha:<input type="text" name="from_date" id="from_date"/></label>
   
      <span class="help-block" id="error"></span>
</div>
          <div class="form-group">
<label style="top:150px;margin-left: 320px; ">Vencimiento:<input type="text" name="to_date" id="to_date"/></label>
<span class="help-block" id="error"></span>
          </div>
   <div class="col-md-16" style="margin-left: 80px;">  
                     <input  type="button" name="filtro" id="filtro" value="Filtrar" class="btn btn-info" />  
                </div>
      
                <div style="clear:both"></div>                 
                <br />  
                 <div style="margin-left: 490px;" > 
      <form method="post"action="print_invoice.php">
                	<input type="hidden" name="reportee_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="createe_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>            
   Buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
              </div>
 <div class="content" id="content">  
     <div id="Tabla1"> 
     <table id="Tabla1"border="1"cellspacing="0"cellpading="0"rules="all"class="table table-bordered table-striped">
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
      
       
              <tr>
                <td></td>
               
                    
               
               

             
        

            </table>
     </div>
                </center>
	</div>

<div id="tabs-3">
<p> 
                    
<center>
    <?php $h1 = "Consulta de Pedidos de Compras";
            	 echo '<h1>'.$h1.'</h3>'
				?>       
    
<!--  <h3 align="center">Consulta de Pedido de Compras</h3>  -->
                   <div class="form-group">
   <label style="top:150px;">Fecha:<input type="text" name="from_date" id="from_date"/></label>
   
      <span class="help-block" id="error"></span>
</div>
          <div class="form-group">
<label style="top:150px;margin-left: 320px; ">Vencimiento:<input type="text" name="to_date" id="to_date"/></label>
<span class="help-block" id="error"></span>
          </div>
   <div class="col-md-16" style="margin-left: 80px;">  
                     <input  type="button" name="filtro" id="filtro" value="Filtrar" class="btn btn-info" />  
                </div>
      
                <div style="clear:both"></div>                 
                <br />  
                 <div style="margin-left: 490px;" > 
      <form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>            
   Buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
              </div>
 <div class="content" id="content">  
     <div id="Tabla1"> 
     <table id="Tabla1"border="1"cellspacing="0"cellpading="0"rules="all"class="table table-bordered table-striped">
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
      
       
              <tr>
                <td></td>
               
                    
               
               

             
        

            </table>
     </div>
                </center>
      </div>              
<div id="tabs-4">
		<p>
</p>   <a id="filter">Filtros</a> 
	</div>
                	<div id="tabs-5">
		<p> siete
</p>
	</div>
                	<div id="tabs-6">
		<p>sdfaf
</p>
	</div>
</p></div>
                	