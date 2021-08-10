
<!DOCTYPE html>
<html>
<head>

<title>
Producto
</title>
    <script src="../../jquery.min.js"></script>
  <link rel="stylesheet" href="../../bootstrap.min.css" />
  <script src="../../bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../../estilo.css">
    
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
<script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser() // This function will fetch data from table and display under <div id="result">
 {
  var action = "Load";
  $.ajax({
   url : "action.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#Tabla1').html(data); //It will display data under div tag with id result
   }
  });
 }
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  if(confirm("Are you sure you want to remove this data?")) //Confim Box if OK then
  {
   var action = "Delete"; //Define action variable value Delete
   $.ajax({
    url:"action.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{id:id, action:action}, //Data send to server from ajax method
    success:function(data)
    {
     fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
     alert(data);    //It will pop up which data it was received from server side
    }
   })
  }
  else  //Confim Box if cancel then 
  {
   return false; //No action will perform
  }
 });
});


</script>

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
   
         <form method="post"action="action.php">
   
          <div id="menu">
	
		<li><a href="CrearProducto.php">Crear Producto</a></li>
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
         SELECT p.codigoproducto,p.precio,p.producto,c.nombrecategoria AS categoria,i.nombre AS impuesto,r.nombre AS rubro,s.subrubro AS subrubro,m.nombre as marca,
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
                        <b>  </b><b><?php echo $row['producto']; ?></b><br />
                      
                      
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
 


