
<!DOCTYPE html>
<html>
<head>

<title>
Pedido de Compra
</title>
 <link href="css/bootstrap.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../../bootstrap.min.css">
    <script src="../../jquery.min.js"></script>
    <script src="../../bootstrap.min.js"></script>
    <script src="../../adsbygoogle.js"></script>
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
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1800, height=1800, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
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
        window.location.href="action.php?delete=1&id="+id;
      }
      else
      {
        return false;
      }
    });
  });

</script>

    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../estilo.css">
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1800, height=1800, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


<body id="hhmenu">
      
        
         <div id="menu-wrapper" >
    <li>		<a  href="javascript:Clickheretoprint()" style="font-size:20px;"><button  class="btn btn-success btn-large"><i class="icon-print"></i> Imprimir</button></a></li>
     <ul id="hmenu" > 
        
      </ul> 
    </div>
   
         <form method="post"action="action.php">
   
          <div id="menu">
	
		<li><a href="Registrar Transferencia.jsp">Registrar Peido de Compras</a></li>
		<li><?php
					$invoice=$_GET['producto'];
include('../../database_connection.php');
$statement = $connect->prepare("
          SELECT * FROM productos
            WHERE codigoproducto= :producto
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':producto'       =>  $_GET["producto"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
               {
            echo '
              <tr>
              
               
              
                
                <td style="margin-left:100px;"><a href="EditarProducto.php?updatep=1&codigoproducto='.$row["codigoproducto"].'"><span class="btn btn-success btn-large"><i class="icon-print"></i>Editar</span></a></td>
               
              </tr>
            ';
          
        }
				?>		</li>
		<li>  <input type="hidden" name="codigoproducto" id="codigoproducto <?php echo $m; ?>" value="<?php echo $row["codigoproducto"]; ?>" />
                 <input  name="delete"  type="submit" value="Eliminar"class="btn btn-success btn-large"  />	</li>
	
				<?php
					}
				?>
	
</div>
<div class="content" id="content">
  
<?php
					$invoice=$_GET['producto'];
include('../../database_connection.php');
$statement = $connect->prepare("
         SELECT p.codigoproducto,p.precio,p.nombre,c.nombrecategoria AS categoria,i.nombre AS impuesto,r.nombre AS rubro,s.subrubro AS subrubro,m.nombre as marca,
         um.nombres as unidadm
FROM productos p,impuestos i,subrubros s,rubros r,categoriadeproductos c,marca m,unidaddemedida um
WHERE c.idcategoria=p.idcategoria AND i.idimpuesto=p.idimpuesto AND r.codigorubro=p.codigorubro 
AND s.codigosubrubro=p.codigosubrubro and m.idmarca=p.idmarca AND um.idunidaddemedida=p.idunidaddemedida
and codigoproducto=:producto limit 1
         
        ");
        $statement->execute(
          array(
            ':producto'       =>  $_GET["producto"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
       
				?>
				<tr class="record">
                                <div class="row" style="margin-left: 500px;">
                    <div class="col-md-8">
                      <br /> <b>Codigo :</b>
                      
                        <b>  </b><b ><?php echo $row['codigoproducto']; ?></b><br />
                        
                    </div>
                                    
                    <div class="col-md-8">
                     <br /> <b>Nombre :</b>
                        <b>  </b><b><?php echo $row['nombre']; ?></b><br />
                      
                      
                    </div>
                            
                                     <div class="col-md-8">
                     <br /> <b>Unidad de Medida :</b>
                        <b>  </b><b><?php echo $row['unidadm']; ?></b><br />
                      
                      
                    </div>
                                       <div class="col-md-8">
                     <br /> <b>Precio:</b>
                        <b>  </b><b><?php echo $row['precio']; ?></b><br />
                      
                      
                    </div>
                                  <div class="col-md-8">
                      <br /> <b>Rubro :</b>
                        <b>  </b><b><?php echo $row['rubro']; ?></b><br />
                      
                    </div>
                                        <div class="col-md-8">
                      <br /> <b>Sub-Rubro :</b>
                        <b>  </b><b><?php echo $row['subrubro']; ?></b><br />
                      
                    </div>
                                                            <div  class="col-md-8">
                      <br /> <b>Impuesto :</b>
                        <b>  </b><b><?php echo $row['impuesto']; ?></b><br />
                      
                    </div>
	
                                                            <div  class="col-md-8">
                      <br /> <b>Categoria de Producto :</b>
                        <b>  </b><b><?php echo $row['categoria']; ?></b><br />
                      
                    </div>
                                    <div  class="col-md-8">
                      <br /> <b>Marca :</b>
                        <b>  </b><b><?php echo $row['marca']; ?></b><br />
                      
                    </div>
                                    
                                    <div  class="col-md-8">
                      <br /> <b>Registro:</b>
                        <b>  </b><b></b><br />
                      
                    </div>
                                    
                                    <div  class="col-md-8">
                      <br /> <b>Usuario :</b>
                        <b>  </b><b></b><br />
                      
                    </div>
                                    
                                    <div  class="col-md-8">
                      <br /> <b>Ultima Modificacion :</b>
                        <b>  </b><b></b><br />
                      
                    </div>
                                    
                                    <div  class="col-md-8">
                      <br /> <b>Usuario de La Modificacion :</b>
                        <b>  </b><b></b><br />
                      
                    </div>
                  </div>    
			
		   </div>   		
			
                 </form>
				<?php
					}
				?>
<!--                                <div class="pull-right" style="margin-left:500px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button c><i class="icon-print"></i> Print</button></a>
		</div>	-->
 


