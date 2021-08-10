
<?php
//index.php

include('../../database_connection.php');

$marca = '';

$query = "
 SELECT * FROM marca   ORDER BY nombre ASC
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

include('../../database_connection.php');

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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
   <head>
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear Producto</title>
         <link rel="stylesheet" type="text/css" href="../../estilo.css">
         
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
          <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
 <script src="../../jquery.min.js"></script>
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
                
        <style>
            
            #txtpreciop {
     top:199px;
   /*   margin:20px 10px;
/*    padding:3px 150px;
    background-color:white;*/
   position: absolute;
   margin-left:50px;
    border-radius: 5px;
    border: 1px solid #C4C4C4;
    width: 254px;
    height: 30px;
    font-family: Helvetica,Arial,sans-serif;
    }
    #txtnombreprod {
/*       margin-top:20px;*/
     margin:20px 10px;
/*    padding:3px 150px;
    background-color:white;*/
   margin-left:230px;
    border-radius: 5px;
    border: 1px solid #C4C4C4;
    width: 354px;
    height: 30px;
    font-family: Helvetica,Arial,sans-serif;
    

    
}
#labelgeneral12{
 
   position: relative;
    top:21px;
   margin-left:300px;
    display: block;
    color: #585858;
    font-weight: bold;
    margin-bottom: 0px;
}
#labelgeneral1{
 
   position: relative;
    top:27.5px;
   margin-left:300px;
    display: block;
    color: #585858;
    font-weight: bold;
    margin-bottom: 0px;
}
#labelgeneral2{
 
   position: relative;
    top:15px;
   margin-left:300px;
    display: block;
    color: #585858;
    font-weight: bold;
    margin-bottom: 5px;
}
#txtcodpro {
/*       margin-top:20px;*/
     margin:20px 10px;
/*    padding:3px 150px;
    background-color:white;*/
   margin-left:230px;
    border-radius: 5px;
    border: 1px solid #C4C4C4;
    width: 354px;
    height: 30px;
    font-family: Helvetica,Arial,sans-serif;
    

    
}
#combomar1 {
    
    margin-top:22px;
       margin-bottom: 0px ;
   margin-left: 240px;
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
    margin-bottom: 25px;
}
#comborub1 {
    position: relative;
    margin-top:25px;
       margin-bottom: 5px ;
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
    margin-bottom: 25px;
  
}
#combosub1{
   position: relative;
    margin-top:46px;
       margin-bottom: 0px ;
   margin-left: 240px;
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
    margin-bottom: 25px;
  
}
 #combocat1 {
   position: absolute;
    top:480px;
       margin-bottom: 5px ;
   margin-left: 35px;
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
    margin-bottom: 25px;
  
} 
#comboimp1  {
    margin-top:22px;
       margin-bottom: 0px ;
   margin-left: 240px;
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
    margin-bottom: 25px;
}
#combounidad1 {
   position: absolute;
    top:580px;
       margin-bottom: 0px ;
   margin-left: 35px;
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
    margin-bottom: 25px;
  
}

#gravarprod {
/*  margin: 100px;*/

  margin-bottom: 70px;
    background-color: #5CACF3;
    background-image: -moz-linear-gradient(center top , #6EBFFF 0%, #6FBDFC 50%, #5CACF3 50%, #509EE8 100%);
    border: 1px solid #2979A9;
    border-radius: 5px;
    box-shadow: 0px 1px 3px #C3EBFF inset;
    color: #FFF;
    font: bold 12px/1 helvetica,arial,sans-serif;
    padding: 10px 20px;
    text-align: center;
    text-shadow: 0px 1px 1px #335778;
    margin-left:270px;
    margin-top: 30px;
}

        </style> 
<script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser() // This function will fetch data from table and display under <div id="result">
 {
  var action = "Load";
  $.ajax({
   url : "actioni.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#Tabla1').html(data); //It will display data under div tag with id result
   }
  });
 }

});
</script>
     <?php
      if(isset($_GET["add"]))
      {
      ?>
         
                   <?php
      }
      elseif(isset($_GET["updatep"]) && isset($_GET["codigoproducto"]))
      {
        $statement = $connect->prepare("
          SELECT * FROM productos 
            WHERE codigoproducto = :codigoproducto
           
        ");
        $statement->execute(
          array(
            ':codigoproducto'       =>  $_GET["codigoproducto"],
             
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
        ?>
        <script>
        $(document).ready(function(){
          $('#txtcodpro').val("<?php echo $row["nombre"]; ?>");
          $('#txtnombreprod').val("<?php echo $row["precio"]; ?>");
          $('#textopedidocompra').val("<?php echo $row["Notas"]; ?>");
        
        });
        </script>
        
    </head>
    <body id="hhmenu">
      
         <div id="menu-wrapper">
    
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
     
           
           
                      
        <li></li>
            <li></li>
             
           
  
    </div>
   
   
        
   
          <div id="menu">
	
		<li><a href="crearempleado.jsp">Crear Producto</a></li>
		<li><a href="Configuracion/Productos.jsp">Listar Productos</a></li>
		
	
	
</div>
     
        <h6 id="h6" style="color: black">Crear Producto</h6>    
        <form method="post" action="action.php" id="getmoneda">
                <h1 id="h1"><a style="color: black" href="Configuracion/Productos.jsp">Listar Empleados</a></h1>    
                      
             <div>
         
<!--                <input type="hidden" name="accion" value="grabarproducto" />-->
               
                         
       
                 <div class="form-group">
                          <div class="input-group">
                  <label style="margin-left: 230px;" id="labelgeneral12">Nombre</label>
                   <input  id="txtcodpro"type="text" name="txtnombre" value="<?php echo $row["producto"]; ?>" />
                     <span class="help-block" id="error"></span>
                        </div>
                        </div>
           <div class="form-group">
                          <div class="input-group">
                 <label style="margin-left: 230px;" id="labelgeneral12">Precio</label>
                   <input  id="txtnombreprod"type="text" name="txtprecio" value="<?php echo $row["precio"]; ?>"  placeholder="Ingrese un Precio Para el Producto" />
                   <span class="help-block" id="error"></span>
                        </div>
                        </div>
               
                          <label style="margin-left: 240px;"  id="labelgeneral1">Marca</label>
                         <select  id="combomar1"  name="combomarcas"> 
          <?php echo $marca; ?> 
            
        </select>
             <label style="position:absolute;top: 355px;margin-left: 530px;" id="labelgeneral2">Rubro</label>
           <select  id="comborub1"  name="comborub1" class="form-control action" > 
          
                      <?php echo $rubros; ?> 

        </select>
               <label style="position:absolute;top: 461px;margin-left: 240px;" id="labelgeneral">Sub-Rubro</label>
           <select type=""  id="combosub1"  name="combosub1" class="form-control action" > 
          <?php echo $subrubros; ?> 
           
        
        </select>
            <label style="position:absolute;top: 461px;margin-left: 35px;" id="">Categoria-De-Productos</label>
                         <select  id="combocat1"  name="combocat1"> 
          
              <?php echo $categ; ?> 
        
        </select>
            <label style="margin-left: 240px;" id="labelgeneral">Impuesto</label>
                         <select  id="comboimp1"  name="comboimpuesto"> 
             <?php echo $imp; ?> 
            
        </select>
            <label style="position:absolute;top: 561px;margin-left: 35px;">Unidad-De-Medida</label>
                         <select  id="combounidad1"  name="comboum"> 
          
              <?php echo $um; ?> 
        
        </select>
                           
                     
<!--                   <input type="submit" name="crear_pedido" id="gravarprod" class="btn btn-info" value="Create" />     -->
                
            </div>
                  <input type="hidden" name="codigoproducto" id="codigoproducto <?php echo $m; ?>" value="<?php echo $row["codigoproducto"]; ?>" />
                 <input style="margin-left: 450px" name="update_invoice" id="gravarprod" type="submit" value="Editar"  />
        </form>
        <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   
   var result = '';
 
   if(action == "comborub1")
   {
    result = 'combosub1';
    
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
 
   if(action == "combosub1")
   {
    result2 = 'combocat1';
    
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
  <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery-1.11.2.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>
    <script src="assets/register.js"></script>    

      
      
        </body>
</html>
      <?php 
        }
      }