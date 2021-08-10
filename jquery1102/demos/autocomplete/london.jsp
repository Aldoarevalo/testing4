<%-- Importaciones que son necesarias para que se muestre el JSP --%>
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
        <title>Reporte de Compras</title>
       
    </head>
    
   <body id="hhmenu"> 
      <link rel="stylesheet" type="text/css" href="../hojaestilo.css">    
   
       
   
    </head>
    
    <div id="menu-wrapper">
    
     <ul id="hmenu"> 
        
         <li><a >Configuracion</a>
               <ul id="sub-menu"> 
                 
            <li><a href="Productos.jsp">Productos</a> </li>
            <li><a href="Categoria de Productos.Jsp">Categoria de Productos</a> </li>
            <li><a href="Marcas.Jsp">Marcas</a> </li>    
            <li><a href="registrarProducto.jsp">Rubros</a> </li>
            <li><a href="">Sub-Rubros</a> </li>
            <li><a href="">Plantillas de Productos</a> </li>
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
	
		<li><a href="Registrar Transferencia.jsp">Registrar Transferencia</a></li>
		<li><a href="Transferencias.jsp">Listar Transferencias</a></li>
		<li><a href="#">Monto de Transferencias</a></li>	
		<li><a href="#">Resumenes de transferencias</a></li>
		<li><a href="#">Comparativo de Transferencias a Sucursal</a></li>
		
	
	
</div>
       <h3><a style="color: black" href="Transferencias.jsp">transferencias</a></h3>
        <form id="getaction">
            <h4><a style="color: black" href="Reportes de Compras.jsp">Compras</a></h4>
       <a id="print" href="http://192.168.1.250:8888/purchase_orders?print=1" class="printer" target="_blank">Imprimir</a>
        <a id="filter">Filtros</a>
  <%
        String usuario_sesion;
        HttpSession sesion=request.getSession();
        usuario_sesion=(String) sesion.getAttribute("usuario");
        ResultSet sentencia_sql;
        String urljdbc;
        String loginjdbc;
        String passjdbc;
        Connection conexion=null;
        Statement sentencia=null;
        StringBuffer built_stmt=new StringBuffer();
        String accion_origen;
        int posicion=0;
        if (usuario_sesion==null)
            out.println("");
        else
        {
            out.println("Bienvenido!");
            sentencia_sql=(ResultSet) sesion.getAttribute("cursor");
            if (sentencia_sql==null)
            {
                try
                {
                    Class.forName("com.mysql.jdbc.Driver");
                    urljdbc = "jdbc:mysql://localhost/comprastockproduccion";
                    loginjdbc = "root";
                    passjdbc = "";
                    conexion = DriverManager.getConnection(urljdbc,loginjdbc,passjdbc);
                    sentencia = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,ResultSet.CONCUR_READ_ONLY);
                    built_stmt.append("select * from usuario");
                    sentencia_sql= sentencia.executeQuery(built_stmt.toString());
                    sesion.setAttribute("cursor",sentencia_sql);
                    sentencia_sql.first();
                    posicion=1;
                }
                catch (Exception error3)
                {
                    out.println("Se ha producido una excepciÃ³n try "+error3.getMessage());
                }

            }



            //out.println("<p>Codigo = "+sentencia_sql.getString(1)+ "</p>");
            out.println("<p>Sesion iniciado/"+ sentencia_sql.getString(2)+ "</p>");
           }
           %>
     <center>
            
        
         
             
       
        
      
        <div>
                  

     <table id="Tabla1"border="1"cellspacing="0"cellpading="0"rules="all">
                <tr style="background-color:whitesmoke">
                    <td colspan="12"></td>
                     
                </tr>
                
               
                <tr style="background-color:whitesmoke">
                       <td>Id</td>
                       <td>Factura</td>
                       <td>Proveedor</td>
                       <td>Fecha</td>
                       <td>Almacen</td>
                       <td>Sucursal</td>  
                       <td>Centro de Costos</td>
                       <td>Terminos de Pago</td>
                       <td>Usuario</td>  
                       <td>Moneda</td>  
                       <td>Monto</td>
                        <td>ID de ORDEN</td>
                      
                 
                   </tr>
                <%-- Lista de todos los productos --%>
                <%
                            ArrayList<CompraCabecera> lista2 =CompraDetalleBD.obtenerCompraCabecera();
                            for (CompraCabecera f : lista2) {
                %>
                <tr id="geoname">
                   <td><%= f.getID()%> </td>
                   <td><%= f.getFactura()%></td>
                   <td><%= f.getproveedor()%></td>
                   <td><%= f.getFecha()%></td>
                    <td><%= f.getalmacen()%></td>
                   <td><%= f.getsucursal()%></td>
                   <td><%=  f.getcentrodecostos()%></td>
                   <td><%= f.getterminosdepago()%></td> 
                   <td><%= f.getusuario()%></td>
                   <td><%= f.getmonedas()%></td>
                    <td><%= f.gettotales()%></td>
                     <td><%= f.getidorden()%></td>             
                    <%-- Enlaces a las paginas de actualizar o anadir al carrito --%>
                 
                </tr>
                <%
                            }
                %>

            </table>
       </center>
        </form>
                <div  id="dialog-form" title="Create new user">
	<p class="validateTips">All form fields are required.</p>

	
	<fieldset style="height: 520px;">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
		<label for="password">Password</label>
		<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
        
                </div>

    </body>
</html>
