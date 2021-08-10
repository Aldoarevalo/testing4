<%-- 
    Document   : Menu
    Created on : 05-mar-2016, 17:35:37
    Author     : User
--%>
<%@page import="ModeloMovimientosDeOrdenes.*"%>
<%@page import="ModeloConexion.*"%>
<%@page import="ajax.bean.productoBean"%>
<%@page import="ajax.logic.productoBo"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.Connection"%>
<%@page import="Modelo.*" %>
<%@page import="java.util.*" %>
<%@page import="java.util.*,java.io.*,java.lang.*,java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
           <script src="buscador/datos/jquery-1.6.4.min.js"></script>
<script src="buscador/datos/jquery-1.6.4.min.js"></script>
  <link rel="stylesheet"href="buscador/datos/bootstrap.min.css">
   <link rel="stylesheet" href="buscador/dist/css/bootstrap-select.css">
  <script src="buscador/datos/jquery.min.js"></script>
  <script src="buscador/datos/bootstrap.min.js"></script>
  <script src="buscador/dist/js/bootstrap-select.js"></script>
  
            <link rel="stylesheet" href="jquery1102/themes/base/jquery.ui.all.css">
	<script src="jquery1102/jquery-1.9.1.js"></script>
	<script src="jquery1102/ui/jquery.ui.core.js"></script>
	<script src="jquery1102/ui/jquery.ui.widget.js"></script>
	<script src="jquery1102/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="jquery1102/demos/demos.css">
     <script>
	
        	$(function() {
		$( "#datepicker" ).datepicker({
                    altField: "#alternate",
			altFormat: "DD, d MM, yy",
			showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	});
  
	
function agregarfila() {
    if (tabla.getElementsByTagName("tr").length < 180) {
        crearElementos();
      
    } else {
        alert("Solo puede agregar 18 registros");
    }
}


function crearElementos()
{
    var tabla = document.getElementById("Tablaordenesdeproduccion");
    var fila = tabla.insertRow(1);

    // celda1.appendChild(t1);
    //celda2.appendChild(t2);

    var celda1 = fila.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "checkbox";
    celda1.appendChild(element1);

    var celda2 = fila.insertCell(1);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.disabled = "true";
    celda2.appendChild(element2);


    var celda3 = fila.insertCell(2);
    var element3 = document.createElement('a');
    var linkText = document.createTextNode("Buscar");
    element3.appendChild(linkText);
    element3.title = "Buscar";
    element3.href = "javascript:ventana('Configuracion/Categoria de Productos.jsp');"; //ventana que retorna los articulos
    celda3.appendChild(element3);
                       

    var celda4 = fila.insertCell(3);
    var element4 = document.createElement("input");
    element4.type = "text";
    element4.disabled = "true";
    celda4.appendChild(element4);

    var celda5 = fila.insertCell(4);
    var element5 = document.createElement("input");
    element5.type = "text";
    celda5.appendChild(element5);

}

function borrarFila() {
    try {
        var tabla = document.getElementById("Tablaordenesdeproduccion");
        var rowCount = tabla.rows.length;


        for (var i = 0; i < rowCount; i++) {

            var row = tabla.rows[i];
            var chkbox = row.cells[0].childNodes[0];

            if (null !== chkbox && true === chkbox.checked) {

                tabla.deleteRow(i);
                rowCount--;
                i--;
            }
        }
    } catch (e) {
        alert(e);
    }
}

</script>

      </script>
       <link rel="stylesheet" type="text/css" href="estilo.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Registrar Órdenes de Producción</title>
         <Script src="AJAX/ajax_producto.js"></Script>
         <Script src="AJAX/ajax_masDetalle.js"></Script>
    </head>
    <body id="hhmenu">
       
        
          <div id="menu-wrapper">
    
     <ul id="hmenu"> 
        
         <li><a >Configuracion</a>
            
               <ul id="sub-menu"> 
                 
            <li><a href="Informes Web/Informes de Movimientos de Compras/Informes de Movimientos de Compras.jsp">Productos</a> </li>
            <li><a href="Configuracion/Categoria de Productos.jsp">Categoria de Productos</a> </li>
            <li><a href="Configuracion/Marcas.jsp">Marcas</a> </li>    
            <li><a href="Configuracion/Rubros.jsp">Rubros</a> </li>
            
   
            <li><a href="jquery-ui-1.10.2/demos/dialog/newjsp.jsp">Plantillas de Productos</a> </li>
            <li><a href="Configuracion/Centro de Costos.jsp">Centro de Costos</a></li>
            <li><a href="Configuracion/Monedas.jsp">Monedas</a> </li>
            <li><a href="Configuracion/Impuestos.jsp">Impuestos</a> </li>
            <li><a href="Configuracion/Usuarios.jsp">Usuarios</a></li>
            <li><a href="Configuracion/Empleados.jsp">Empleados</a></li>
            <li><a href="Configuracion/Empresas.jsp">Empresas</a> </li>
            <li><a href="Configuracion/Sucursales.jsp">Sucursales</a></li>
            <li><a href="Configuracion/Almacenes.jsp">Almacenes</a> </li>
            <li><a href="Configuracion/Proveedores.jsp">Proveedores</a> </li>
            <li><a href="Configuracion/Centros de Produccion.jsp">Centros de Produccion</a> </li>
            <li><a href="MDI.java" new="_JFrame">mid</a></li>
            <li> <a href="MDI.java" target="_top"></a>mdiddd</li>
            <a href="" target="_top"></a>
             <a href="Reporte">Reporte de Ventas</a>
             
                 </ul> 
                      
           </li> 
        </li> 
            <li><a >Compras</a>
               <ul id="sub-menu"> 
               
             <li><a href="PedidoDeCompras.jsp">Registrar Pedido de Compras</a><li>  
          
             <li><a href="RegistrarPresupuestoDeProveedor.jsp">Registrar Presupuesto de Proveedor</a> </li>
             <li><a href="CrearOrdendeCompra.jsp">Registrar Órdenes de Compras</a> </li>
           <li><a href="RegistrarCompra.jsp">Registrar Compras</a> </li>
            <li><a href="RegistrarNotaDeCredito.jsp">Registrar Ajustes de Iventario</a> </li>
            <li><a href="RegistrarNotaDeCredito.jsp">Registrar Nota de Credito y Debito</a> </li>
            <li><a href="RegistrarPedidodeTransferencia.jsp">Registrar Pedido de Remisio</a> </li>
                  <li><a href="RegistrarNotaDeRemision.jsp">Registrar Nota de Remision</a> </li> 
                     
                       <li><a href="Stock/inventario.jsp">controlar Inventario por Depositos</a> </li>
                           <li><a href="Stock/inventario.jsp"></a> </li>
               </ul>    
           </li> 
      
           <li><a >Producion</a>
               <ul id="sub-menu"> 
                 
                     <li><a href="RegistrarEtapadeProduccion.jsp">Registrar Etapa de Produccion</a> </li>
              <li><a href="RegistrarOrdendeProduccion.jsp">Registrar etapa de Producción</a> </li>
             <li><a href="Stock/Transferencias.jsp">asignar materia prima</a> </li>
             <li><a href="Stock/Pedidos.jsp">Pedido de Transferencia</a> </li>
            <li><a href="NewJDialog.java">Registro de Perdidas</a> </li>
          
              
                 </ul>         
           </li> 
            <li><a >facturacion</a>
               <ul id="sub-menu"> 
                 
             <li><a href="RegistrarOrdendeProduccion.jsp">Registrar Órden de Producción</a> </li>
           <li><a href="Produccion/ListarOrdenesdeProduccion.jsp">Listar Órdenes de Producción</a> </li>
             <li><a href="newjsp.jsp">Centros de Producción</a> </li>
           <li><a href="">Lineas de Producción</a> </li>
            <li><a href="AdministrarMateriaPrima.jsp">Administrar Materia Prima</a> </li>
       
                     
                 </ul> 
                      
           </li> 
          <li><a >Informes</a>
            
               <ul id="sub-menu"> 
                 
            <li><a href="Informes Web/Informes de Movimientos de Compras/Informes de Movimientos de Compras.jsp">Iformes de compras</a> </li>
            <li><a href="Informes Web/Informes de Movimientos de Productos/Informes de Movimientos de Productos.jsp">informes de Productos</a> </li>
            <li><a href="Configuracion/Marcas.jsp">Marcas</a> </li>    
            <li><a href="Configuracion/Rubros.jsp">Rubros</a> </li>
            
   
            
             
                 </ul> 
                      
           </li> 
        </li>  
      </ul> 
              
    </div>
   
          <div id="menu" >
	
		<li><a href="Registrar Transferencia.jsp">Reporte de Etapa de Produccion</a></li>
		
	
</div>
        
        
            <h3  ><a style="color: black;" href="Transferencias.jsp">Reporte de Etapa de Produccion</a></h3>    
        <form id="getactionorden" method="post" action="Controlador">
            <input type="hidden" name="accion" value="registrarproduccion" />
            <h4><a style="color: black" href="Reportes de Compras.jsp">Registrar Etapa de Producción</a></h4>
   
      <label>Centro de Producción</label>                      
        <select  id="centrodeproduccion"  name="cbcentrodeproduccion"> 
          
            <%

            Conexion cn=new Conexion();
           
             try
                {
          cn.conectar();                     
           String Sql="select * from centrodeproduccion;";
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


     <label1 >Estado</label1>       
<select id="cboestado"  name="comboestado" > 
         
           <option>Terminado<option>                        
           
        </select>
      
    <div >
        <label style="top:200px;position: absolute" >Fecha: <input name="fecha" type="text" id="datepicker">&nbsp;<input type="text" id="alternate" size="30"/></label>
               
        </div>
        <div>
    
       <label id="labeltipoproduccion">Tipo</label>                      
        <select  id="cbotipoproduccion"  name="combotipodeproduccion"> 
          
           <option selected="selected">PARA STOCK</option>
<option >PEDIDOS SUCURSALES</option>
<option >PEDIDOS ESTACIONES</option>
<option >PEDIDOS EVENTOS</option>
<option >PEDIDOS CANTINAS</option>
<option >Default</option>
<option >TIPO RESTAURANTE</option>
        </select>
                   
         <label style="position:absolute;top:254px;margin-left:430px;">Buscar Cliente:</label>                  
         <select style="margin-right: 20px"   name="" id="lunch2" class="selectpicker" data-live-search="true"  title="Buscar Clientes ..."> 
          
            <%

        
             try
                {
          cn.conectar();                     
           String Sql="select * from almacen;";
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
                         
         <label style="margin-top: 235px;">Notas</label>
          <label style="margin-top: 582px;">Buscar Persona a Cargo</label>
         <input id="datosordenes" type="text" name="textarea " value=""title="Buscar Clientes ..." />
          <table id="Tablasetapa"border="1"cellspacing="0"cellpading="0"rules="all">
                <tr style="background-color:linen;">
                    <td colspan="4">Productos</td>
                    
                        
               </tr>
           
                 <%
                                    ArrayList<ProduccionDetalle> lista = (ArrayList<ProduccionDetalle>)session.getAttribute("produccion");
                                    if(lista!=null){
                                        for (ProduccionDetalle d : lista) {
                        %>
                              
                                        <tr>
                                            <TD width="10%"><INPUT type="checkbox" NAME="chk"/></TD>     
                                    <td><%= d.getCodigoProducto()%></td>
                                     <td><%= d.getProducto()%></td>
                                      <td><%= d.getCantidad()%></td>
                                        <td>borrar</td> 
                                          
                                        
                                          
                                        </tr>
                        <%
                                        }
                                    }
                        %>
          
               <tr style="background-color:linen;">
                      <td>codigo</td>
                            <td>nombre</td>
                           
                            
                            <td>cn</td>
                         
                      </tr>
                            
                 </table>
                 
                        <div style="margin-top:75px;margin-left: 20px;margin-bottom: 20px;" class="form-group">                    
         <select  id="cbopersonaacargo"  name="combopersonaacargo" class="selectpicker" data-live-search="true" title="Buscar Persona a cargo"> 
          
            <%

        
             try
                {
          cn.conectar();                     
           String Sql="select * from empleado;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                out.println("<option>"+cn.rt.getString(3) );                       
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                        
           %> 
        
        </select>
           </div>
         <label id="labelplantillaorden">Plantilla</label>                      
        <select  id="cboplantillaorden"  name="comboplantilla"title="ninguno ..."> 
          
            <%

        
             try
                {
          cn.conectar();                     
           String Sql="select * from plantilla;";
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
        <label id="labelalmdestino">Almacén de Destino</label>                      
        <select  id="cboalmdestino"  name="comboalmdestino"> 
          
            <%

        
             try
                {
          cn.conectar();                     
           String Sql="select * from almacen;";
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
            
    </div>
           
       
           
          <label id="labelalmorigen">Almacén de Origen</label>                      
        <select  id="cboalmorigen"  name="comboorigen"> 
          
            <%

        
             try
                {
          cn.conectar();                     
           String Sql="select * from almacen;";
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
         
           
                
        <input id="Aceptarordenp" value="Aceptar" type="submit">
         </form>
           
            <form style="top:0px;"  id="gett1" method="post" action="Controlador">
      <input type="hidden" name="accion" value="AnadirProduccion" 
      
             <div >
                 <div style="margin-top:85px;margin-left: 0px;margin-bottom: 50px;" class="form-group">
       <label style="position: relative;top:34px;margin-left:430px;">Ingrese la Cantidad:</label>
      <input style="margin-left:425px;position:relative;top: 34px; " type="text" name="txtCantidad" value="0" />
       <input style="margin-left:588px;position:absolute;top: 132px; " value="Cargar" type="submit">

   
            
      <select onchange="getDetalleProducto(this.value)" name="productos" id="lunch2" class="selectpicker" data-live-search="true"  title="Buscar Productos ...">
            <%
                    int id_pro;
                    String desc_pro = null;
                    ArrayList lst_pros = new ArrayList();
                    productoBo pro_bo = new productoBo();
                    lst_pros = pro_bo.getProductoss();
                    if(lst_pros.size() > 0){
                        for(int i = 0; i<lst_pros.size(); i++){
                            id_pro = ((productoBean)lst_pros.get(i)).getId_pro();
                            desc_pro = ((productoBean)lst_pros.get(i)).getNombre();
                           out.println("<option value=" + id_pro + ">" + desc_pro + - id_pro+ "</option>");
                           
                        }
                    }                    
                %> 

    </select>
                
    
</div>
                 
         <div style="position:absolute;top: 130px;"  style="margin-left:700px;" id="result_detalle">
                <select value="Buscar Productos ..."name="producto"  >
           
        </select>
              
            
               
                </div>
      
                 </form>
                
             
                    
                     
       
               
    </body>
</html>
