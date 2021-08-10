<%-- 
    Document   : EditarMiInformacion
    Created on : 15/01/2017, 04:33:19 AM
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

                <%
Usuarios user = UsuariosBD.obtenerObtenerUser((request.getParameter("id")));
%>
 

<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>EditarSucursal</title>
        
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
	
		<li><a href="CrearUsuario.jsp">Crear Usuario</a></li>
		<li><a href="Configuracion/Usuarios.jsp">Listar Usuarios</a></li>
		
	
	
</div>
        <%-- En el action del formulario le decimos que llama al Controlador --%>
         <h3 style="color: black">Editar Informacion Personal</h3>    
        <form method="post" action="Controlador" id="getmoneda">
               <h4><a style="color: black" href="Configuracion/Usuarios.jsp">Listar Usuarios</a></h4>
                      
         <div>
                    <%-- Indica al controlador que vamos hacer una modificacion --%>
                    <input type="hidden" name="accion" value="edituserinf" />
                       <label id="labelgeneral">ID</label>
                     <input id="txtnombremoneda" type="text" name="txtiduser" value="<%= user.getIduser()%>"readonly />
                <label id="labelgeneral">Nombre</label>
                 <input id="txtnombremoneda" type="text" name="txtusuario" value="<%= user.getUsuario()%>" />
                
                  <label id="labelgeneral">Logging</label>
                   <input id="txtsimbolo"type="text" name="txtlogging" value="<%= user.getLoggin()%>" />
                     <label id="labelgeneral">Pasword</label>
                   <input id="txtsimbolo"type="text" name="txtpaswor" value="<%= user.getPaswor()%>" />
                
               
                           <input  id="gravarmoneda" type="submit" value="Registrar" name="v2"
                      
                              />     
                           
                                        
                                         
                    	
                       
            </div>
        </form>

        </body>
</html>
