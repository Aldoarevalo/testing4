<%-- 
    Document   : crearempleado
    Created on : 20/11/2016, 11:52:39 AM
    Author     : ALDO
--%>

<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.Connection"%>
<%@page import="Modelo.*" %>
<%@page import="java.util.*" %>
<%@page import="java.util.*,java.io.*,java.lang.*,java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear Producto</title>
        <style>
            
            #txtpreciop {
     top:163px;
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
    top:357px;
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
    top:457px;
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
    
     <ul id="hmenu"> 
         <li><a >Configuracion▾</a> 
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
             <li><a href="../Compras/ÓrdenesDeCompras.jsp">Órdenes de Compra</a> </li>
           <li><a href="">Registrar Nota de Crédito</a> </li>
            <li><a href="">Notas de Crédito</a> </li>
                     
                     
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
                 
             <li><a href="">Registrar Órden de Producción</a> </li>
           <li><a href="">Listar Órdenes de Producción</a> </li>
             <li><a href="Transferencias.jsp">Centros de Producción</a> </li>
           <li><a href="">Lineas de Producción</a> </li>
            <li><a href="">Administrar Materia Prima</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
           
      </ul> 
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="crearempleado.jsp">Crear Producto</a></li>
		<li><a href="Configuracion/Productos.jsp">Listar Productos</a></li>
		
	
	
</div>
        <%-- En el action del formulario le decimos que llama al Controlador --%>
         <h3 style="color: black">Crear Producto</h3>    
        <form method="post" action="Controlador" id="getmoneda">
                <h4><a style="color: black" href="Configuracion/Productos.jsp">Listar Empleados</a></h4>    
                      
             <div>
         
                <input type="hidden" name="accion" value="grabarproducto" />
               
                         
       
                
                  <label style="margin-left: 250px;" id="labelgeneral">Nombre</label>
                   <input  id="txtnombreprod"type="text" name="txtnombre" value="" />
                     <label style="margin-left: 570px;position: absolute;top: 148px;" >Precio</label>
                     <input  id="txtpreciop" type="text" name="txtprecio" value="" />
               
                          <label id="labelgeneral">Marca</label>
                         <select  id="combomar"  name="combomarcas"> 
          
            <%

            coneBD cn=new coneBD();
           
             try
                {
          cn.conectar();                     
           String Sql="select * from marca;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                  out.println("<option>"+cn.rt.getString(2)  );                        
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                        
           %> 
        
        </select>
             <label style="position:absolute;top: 240px;margin-left: 530px;" id="">Rubro</label>
           <select  id="comborub"  name="comborubroprod"> 
          
            <%

           
           
             try
                {
          cn.conectar();                     
           String Sql="select * from rubros;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                  out.println("<option>"+cn.rt.getString(2)  );                        
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                        
           %> 
        
        </select>
               <label style="position:absolute;top: 340px;margin-left: 240px;" id="">Sub-Rubro</label>
           <select  id="combosub"  name="combosub"> 
          
            <%

           
           
             try
                {
          cn.conectar();                     
           String Sql="select * from subrubros;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                  out.println("<option>"+cn.rt.getString(2)  );                        
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                        
           %> 
        
        </select>
            <label style="position:absolute;top: 340px;margin-left: 550px;" id="">Categoria-De-Productos</label>
                         <select  id="combocat"  name="combocategoria"> 
          
            <%

    
           
             try
                {
          cn.conectar();                     
           String Sql="select * from categoriadeproductos;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                  out.println("<option>"+cn.rt.getString(2)  );                        
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                        
           %> 
        
        </select>
            <label id="labelgeneral">Impuesto</label>
                         <select  id="comboimp"  name="comboimpuesto"> 
          
            <%


           
             try
                {
          cn.conectar();                     
           String Sql="select * from impuestos;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                  out.println("<option>"+cn.rt.getString(2)  );                        
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                        
           %> 
        
        </select>
            <label style="position:absolute;top: 440px;margin-left: 550px;">Unidad-De-Medida</label>
                         <select  id="combounidad"  name="comboum"> 
          
            <%

           
           
             try
                {
          cn.conectar();                     
           String Sql="select * from unidaddemedida;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                  out.println("<option>"+cn.rt.getString(2)  );                        
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                        
           %> 
        
        </select>
                            <input style="margin-left: 450px" id="gravarprod" type="submit" value="Grabar" name="v1" />
                     
                   
                
            </div>
        </form>

        </body>
</html>

