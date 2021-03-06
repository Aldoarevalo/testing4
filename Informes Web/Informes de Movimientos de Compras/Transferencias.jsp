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
          <link rel="stylesheet" href="../jquery1102/themes/base/jquery.ui.all.css">
	<script src="../jquery1102/jquery-1.9.1.js"></script>
	<script src="../jquery1102/ui/jquery.ui.core.js"></script>
	<script src="../jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="../jquery1102/ui/jquery.ui.mouse.js"></script>
	<script src="../jquery1102/ui/jquery.ui.draggable.js"></script>
	<script src="../jquery1102/ui/jquery.ui.position.js"></script>
	<script src="../jquery1102/ui/jquery.ui.resizable.js"></script>
	<script src="../jquery1102/ui/jquery.ui.button.js"></script>
	<script src="../jquery1102/ui/jquery.ui.dialog.js"></script>
	<script src="../jquery1102/ui/jquery.ui.effect.js"></script>
	<script src="../jquery1102/ui/jquery.ui.effect-blind.js"></script>
	<script src="../jquery1102/ui/jquery.ui.effect-explode.js"></script>
	<link rel="stylesheet" href="../jquery1102/demos/demos.css">
        <title>Monto de Transferencias</title>
    </head>
    <script>
	$(function() {
		var name = $( "#name" ),
			email = $( "#email" ),
			password = $( "#password" ),
			allFields = $( [] ).add( name ).add( email ).add( password ),
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
   <body id="hhmenu"> 
      <link rel="stylesheet" type="text/css" href="../estilo.css">    
   
       
   
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
             <li><a href="../Compras/??rdenesDeCompras.jsp">??rdenes de Compra</a> </li>
           <li><a href="">Registrar Nota de Cr??dito</a> </li>
            <li><a href="">Notas de Cr??dito</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
      
           <li><a >Stock</a>
               <ul id="sub-menu"> 
                 
             <li><a href="">Inventario</a> </li>
           <li><a href="">Movimientos de Stock</a> </li>
             <li><a href="../RegistrarTransferencia.jsp">Transferencias</a> </li>
           <li><a href="">Pedido de Transferencia</a> </li>
            <li><a href="">Registro de Perdidas</a> </li>
                     
              
                 </ul>         
           </li> 
            <li><a >Produccion</a>
               <ul id="sub-menu"> 
                 
             <li><a href="">Registrar ??rden de Producci??n</a> </li>
           <li><a href="">Listar ??rdenes de Producci??n</a> </li>
             <li><a href="Transferencias.jsp">Centros de Producci??n</a> </li>
           <li><a href="">Lineas de Producci??n</a> </li>
            <li><a href="">Administrar Materia Prima</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
           
      </ul> 
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="../RegistrarTransferencia.jsp">Registrar Transferencia</a></li>
		<li><a href="Transferencias.jsp">Listar Transferencias</a></li>
		<li><a href="montodetransferencias.jsp">Monto de Transferencias</a></li>	
		<li><a href="resumendetransferencias.jsp">Resumenes de transferencias</a></li>
		<li><a href="#">Comparativo de Transferencias a Sucursal</a></li>
		
	
	
</div>
       <h3><a style="color: black" href="Transferencias.jsp">transferencias</a></h3>
        <form id="getaction">
            <h4><a style="color: black" href="Reportes de Compras.jsp">Compras</a></h4>
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
                    out.println("Se ha producido una excepci????n try "+error3.getMessage());
                }

            }



            //out.println("<p>Codigo = "+sentencia_sql.getString(1)+ "</p>");
            out.println("<p>Sesion iniciado/"+ sentencia_sql.getString(2)+ "</p>");
           }
           %>
     <center><body>
            
        
         
             
       
        
      
        <div>
                  
  Filtrar <input id="searchTerm" type="text" onkeyup="doSearch()" />
     <table id="Tabla1"border="1"cellspacing="0"cellpading="0"rules="all">
                <tr style="background-color:whitesmoke">
                    <td colspan="10"></td>
                     
                </tr>
                
               
                <tr style="background-color:whitesmoke;font-family: Berlin,cursive,fantasy ;">
                       <td>Id</td>
                       <td>Pedidod</td>
                       <td>N??mero de Transferencia de Almac??n</td>
                       <td>Almac??n de Origen</td>
                       <td>Almac??n de Destino</td>
                       <td>Receptor</td>
                       <td>Fecha</td>
                       <td>Costo</td>
                       <td>Estado</td>
                      <td>Usuario</td>
                 
                   </tr>
                <%-- Lista de todos los productos --%>
                <%
                            ArrayList<TransferenciaCabecera> lista = TransferenciaCabeceraBD.obtenerTransferencias();
                            for (TransferenciaCabecera t : lista) {
                %>
                <tr style="font-family: Berlin,cursive,fantasy ;">
                   <td><a name="v1" href="vistatransferencia.jsp?id=<%= t.getNrid()%>"><%= t.getNrid()%></a> </td>
                   <td><%= t.getnrpedido()%></td>
                   <td><%= t.getnrtransferencialmacen()%></td>
                   <td><%= t.getAlmacenorigen()%></td>
                   <td><%= t.getAlmacendestino()%></td>
                   <td><%= t.getReceptor()%></td> 
                   <td><%= t.getfechat()%></td>
                   <td><%= t.getCosto()%></td>
                   <td><%= t.getEstado()%></td>
                   <td><%= t.getusuario()%></td>
                                  
                    <%-- Enlaces a las paginas de actualizar o anadir al carrito --%>
                   
                </tr>
                <%
                            }
                %>

            </table>
       
        </form>
<div id="dialog-form" title="Create new user">
	
	<form>
	<fieldset style="height:444px;width:450px ">
			</fieldset>
            <input type="submit" value="" />
	</form>
</div>
    </body>
</html>
