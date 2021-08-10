<%-- 
    Document   : FormListOrdenesDeCompras
    Created on : 15-may-2015, 11:21:01
    Author     : User
--%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.Connection"%>
<%@page import="Modelo.*" %>
<%@page import="java.util.*" %>
<%@page import="java.util.*,java.io.*,java.lang.*,java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Notas de Crédito de Compra</title>
          <script language="javascript">
		function doSearch()
		{
			var tableReg = document.getElementById('Tabla1');
			var searchText = document.getElementById('searchTerm').value.toLowerCase();
			var cellsOfRow="";
			var found=false;
			var compareWith="";
 
			// Recorremos todas las filas con contenido de la tabla
			for (var i = 1; i < tableReg.rows.length; i++)
			{
				cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
				found = false;
				// Recorremos todas las celdas
				for (var j = 0; j < cellsOfRow.length && !found; j++)
				{
					compareWith = cellsOfRow[j].innerHTML.toLowerCase();
					// Buscamos el texto en el contenido de la celda
					if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
					{
						found = true;
					}
				}
				if(found)
				{
					tableReg.rows[i].style.display = '';
				} else {
					// si no ha encontrado ninguna coincidencia, esconde la
					// fila de la tabla
					tableReg.rows[i].style.display = 'none';
				}
			}
		}
	</script>
    </head>
     <body id="hhmenu"> 
     <link rel="stylesheet" type="text/css" href="../estilo.css">     
   
       
   
    </head>
    <div id="menu-wrapper">
    
     <ul id="hmenu"> 
         <li id="hhhmenu"><a >Configuracion</a>
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
                 
             <li><a href="Registrar Compra.jsp">Registrar Compra</a> </li>
           <li><a href="">Reporte de Compras</a> </li>
             <li><a href="ÓrdenesDeCompras.jsp">Órdenes de Compra</a> </li>
           <li><a href="">Registrar Nota de Crédito</a> </li>
            <li><a href="">Notas de Crédito</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
      
           <li><a >Stock</a>
               <ul id="sub-menu"> 
                 
             <li><a href="">Inventario</a> </li>
           <li><a href="">Movimientos de Stock</a> </li>
             <li><a href="../Stock/Transferencias.jsp">Transferencias</a> </li>
           <li><a href="">Pedido de Transferencia</a> </li>
            <li><a href="">Registro de Perdidas</a> </li>
                     
              
                 </ul>         
           </li> 
            <li><a >Produccion</a>
               <ul id="sub-menu"> 
                 
             <li><a href="">Registrar Órden de Producción</a> </li>
           <li><a href="">Listar Órdenes de Producción</a> </li>
           <li><a href="../Stock/Transferencias.jsp">Centros de Producción</a> </li>
           <li><a href="">Lineas de Producción</a> </li>
           <li><a href="http://../Inicio.jsp">Administrar Materia Prima</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
           
      </ul> 
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="RegistrarNotaDeCredito.jsp">Registrar Nótas de Credito</a></li>
		<li><a href="NotasDeCredito.jsp">Listar Nótas de Credito</a></li>
                
</div>
       <h3>Notas de Crédito de Compra</h3>
        <form id="getactionnotadecredito">
            <h4><a style="color: black" href="Reportes de Compras.jsp">Notas de Crédito</a></h4>
       <a id="print" href="http://192.168.1.250:8888/purchase_orders?print=1" class="printer" target="_blank">Imprimir</a>
        <a id="filter" href="javascript:void(0)" class="opt more" rel="itemsFilters">Filtros</a>
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
                  
  Filtrar <input id="searchTerm" type="text" onkeyup="doSearch()" />
     <table id="Tabla1"border="1"cellspacing="0"cellpading="0"rules="all">
                <tr style="background-color:transparent">
                    <td colspan="5"></td>
                     
                </tr>
                
               
                <tr style="background-color:whitesmoke">
                       <td>Id</td>
                       <td>Contacto</td>
                       <td>Fecha</td>
                       <td>Cliente</td>
                       <td style="color:black ">Monto</td>  
                      
                       
                      
                 
                   </tr>
                <%-- Lista de todos los productos --%>
                <%
                            ArrayList<CreditoCabecera> lista4 = CreditoDetalle.obtenerCreditoCabecera();
                            for (CreditoCabecera f : lista4) {
                %>
                <tr>
                   <td><%= f.getID()%> </td>
                   <td><%= f.getComprobante()%></td>
                   <td><%= f.getFecha()%></td>
                   <td><%= f.getCliente()%></td>
                   <td><%= f.getEmpresa()%></td>
                  
                   
                                  
                    <%-- Enlaces a las paginas de actualizar o anadir al carrito --%>
                  
                </tr>
                <%
                            }
                %>

            </table>
                </center>
        </form>>
    </body>
</html>
