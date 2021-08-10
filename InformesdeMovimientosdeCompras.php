<?php
require_once('conexion.php');
	$usuario = 'SELECT * FROM unproducto ORDER BY idpedidoCompra DESC';
	$usuarios=$mysqli->query($usuario);
        ?>
<?php
	

if(isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');

	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Miguel Caro');
	$pdf->SetTitle($_POST['reporte_name']);

	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false);
	$pdf->SetAutoPageBreak(true, 20);
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';

	$content .= '
            <div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'.$_POST['reporte_name'].'</h1>
	  <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>DNI</th>
            <th>A. PATERNO</th>
            <th>A. MATERNO</th>
            <th>NOMBRES</th>
            <th>AREA</th>
            <th>SUELDO</th>
          </tr>
        </thead>
	';

	while ($user=$usuarios->fetch_assoc()) {		  
	$content .= '
            
		<tr>
            <td>'.$user['idpedidoCompra'].'</td>
            <td>'.$user['Fecha'].'</td>
            <td>'.$user['Vencimiento'].'</td>
        </tr>
	';
	}

	$content .= '</table>';

	$content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>Pdf Creator </span><a href="http://www.redecodifica.com">By Miguel Angel</a>
            </div>
        </div>

	';

	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?> 




<link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
     
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
        
          <script src="jquery1102/ui/jquery-ui.js"></script>  
           <link rel="stylesheet" href="../../jquery1102/themes/base/jquery-ui.css">  
     
	<link rel="stylesheet" href="jquery1102/themes/base/jquery.ui.all.css">
	<script src="jquery1102/jquery-1.9.1.js"></script>
	<script src="jquery1102/ui/jquery.ui.core.js"></script>
	<script src="jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="jquery1102/ui/jquery.ui.tabs.js"></script>
        <script src="jquery1102/ui/jquery.ui.datepicker.js"></script>
<!--	<link rel="stylesheet" href="../../jquery1102/demos/demos.css">-->
        <link rel="stylesheet" href="estilo.css">
        <script>
      $(function() {
		$( "#from_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
                        showOn: "button",
			buttonImage: "../../jquery1102/demos/images/calendar.gif",
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
			buttonImage: "../../jquery1102/demos/images/calendar.gif",
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
	</script>
        <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filtro').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"vistapedidocompras.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
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
<p> 
                    
<center>
    <?php $h1 = "Reporte de Empleados - Enero 2017";
            	 echo '<h1>'.$h1.'</h1>'
				?>       
    
  <h3 align="center">Consulta de Pedido de Compras</h3><br />  
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
                    

</p>