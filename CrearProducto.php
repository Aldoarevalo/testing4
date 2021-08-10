
<?php
//index.php

include('database_connection.php');

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

include('database_connection.php');

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

include('database_connection.php');

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

include('database_connection.php');

$um = '';

$query = "
 SELECT * FROM unidaddemedida   ORDER BY nombres ASC
";
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $um .= '<option value="'.$row["codigo"].'">'.$row["nombres"].'</option>';
 
}

?>

<?php
//index.php

include('database_connection.php');

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

include('database_connection.php');

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
#combomar {
    
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
#comborub {
    position: relative;
    margin-top:22px;
       margin-bottom: 0px ;
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
#combosub {
   position: relative;
    margin-top:42px;
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
 #combocat {
   position: absolute;
    top:490px;
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
#comboimp  {
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
#combounidad {
   position: absolute;
    top:587px;
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
  margin: 100px;
  margin-bottom: 60px;
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
    margin-left:370px;
    margin-top: 20px;
}

        </style> 
    </head>
    <body id="hhmenu">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        
         <div id="menu-wrapper">
    
     
           
           
                      
        
           
  
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="crearempleado.jsp">Crear Producto</a></li>
		<li><a href="Configuracion/Productos.jsp">Listar Productos</a></li>
		
	
	
</div>
     
         <h3 style="color: black">Crear Producto</h3>    
        <form method="post" action="action.php" id="getmoneda">
             <input type="hidden" name="total_item" id="total_item" value="1" />
                <h4><a style="color: black" href="Configuracion/Productos.jsp">Listar Empleados</a></h4>    
                      
             <div>
         
<!--                <input type="hidden" name="accion" value="grabarproducto" />-->
               
                         
       
                
                  <label style="margin-left: 230px;" id="labelgeneral">Codigo</label>
                   <input  id="txtcodpro"type="text" name="txtcodpro" value="" />
                 <label style="margin-left: 230px;" id="labelgeneral">Nombre</label>
                   <input  id="txtnombreprod"type="text" name="txtnombre" value="" />
                     <label style="margin-left: 650px;position: absolute;top: 183px;" >Precio</label>
                     <input  id="txtpreciop" type="text" name="txtprecio" value="" />
               
                          <label style="margin-left: 240px;"  id="labelgeneral">Marca</label>
                         <select  id="combomar"  name="combomarcas" > 
          <?php echo $marca; ?> 
            
        </select>
             <label style="position:absolute;top: 369px;margin-left: 530px;" id="">Rubro</label>
           <select  id="comborub"  name="comborubroprod"> 
          
                      <?php echo $rubros; ?> 

        </select>
               <label style="position:absolute;top: 470px;margin-left: 240px;" id="">Sub-Rubro</label>
           <select  id="combosub"  name="combosub"> 
          <?php echo $subrubros; ?> 
           
        
        </select>
            <label style="position:absolute;top: 473px;margin-left: 530px;" id="">Categoria-De-Productos</label>
                         <select  id="combocat"  name="combocategoria"> 
          
              <?php echo $categ; ?> 
        
        </select>
            <label style="margin-left: 240px;" id="labelgeneral">Impuesto</label>
                         <select  id="comboimp"  name="comboimpuesto"> 
             <?php echo $imp; ?> 
            
        </select>
            <label style="position:absolute;top: 570px;margin-left: 530px;">Unidad-De-Medida</label>
                         <select  id="combounidad"  name="comboum"> 
          
              <?php echo $um; ?> 
        
        </select>
                            <input class="btn btn-info" style="margin-left: 450px" id="gravarprod" type="submit" value="Grabar" name="gravarprod" />
                 <input type="submit" name="crear_pedido" id="crear_pedido" class="btn btn-info" value="Create" />     
                   
                
            </div>
        </form>

        </body>
</html>

