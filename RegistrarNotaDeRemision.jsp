<%-- 
    Document   : Menu
    Created on : 05-mar-2016, 17:35:37
    Author     : User
--%>

<%@page import="ModeloMovimietosDeProductos.*"%>
<%@page import="ajax.bean.productoBean"%>
<%@page import="ajax.logic.productoBo"%>
<%@page import="javax.servlet.jsp.tagext.TryCatchFinally"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.sql.*" %>
<%@page import="ModeloConexion.*" %>
<%@page import="java.util.*" %>
<%@page import="java.util.*,java.io.*,java.lang.*,java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    
    <head>
        
        
    <a href=></a>
              <script src="buscador/datos/jquery-1.6.4.min.js"></script>
<script src="buscador/datos/jquery-1.6.4.min.js"></script>
  <link rel="stylesheet"href="buscador/datos/bootstrap.min.css">
   <link rel="stylesheet" href="buscador/dist/css/bootstrap-select.css">
  <script src="buscador/datos/jquery.min.js"></script>
  <script src="buscador/datos/bootstrap.min.js"></script>
  <script src="buscador/dist/js/bootstrap-select.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta charset="utf-8">
            
      
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
      
function newPage(url){
window.open(url,"","aldo");
}

      </script>
      
      <style>
	.ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
	</style>
     
        
        <title>Registrar Transferencia</title>
          <Script src="AJAX/ajax_producto.js"></Script>
         <Script src="AJAX/ajax_masDetalle.js"></Script>
    </head>
    <body id="hhmenu">
      <link rel="stylesheet" type="text/css" href="estilo.css">
         
             
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
   
   
        <div id="menu">
	
		<li><a href="Registrar Transferencia.jsp">Reporte de Notas de Remision</a></li>
		
	
	
</div>
        
        
         
          
       
           <h3><a style="color: black" href="Transferencias.jsp">Reporte de Notas de Remision</a></h3> 
        <form id="gett" method="post" action="Controlador">
           <input type="hidden" name="accion" value="RegistrarTransferencia" />
            <h4><a style="color: black" href="Reportes de Compras.jsp">Registrar Nota de Remision</a></h4>
       
      <label>Almacen de Origen </label>
      
                 
        <select  id="aldo"  name="comboorigen"> 
          
            <%

       Conexion cn=new Conexion();
           
             try
                {
          cn.conectar();                     
           String Sql="select* from almacen;";
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
           
        
     <label1 >Almacen de Destino </label1>       
<select id="aldo1"  name="combodestino"> 
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
      
   
        
           <label style="top:220px" >Fecha: <input type="text" id="datepicker" name="fechast">&nbsp;<input type="text" id="alternate" size="30"/></label>
           <div  style="margin: 50px;position: absolute;" class="form-group">
     <label style="position: relative;top:4px;margin-left:0px;">buscar:</label>
   
       
                <select   name="lunch" id="lunch" class="selectpicker" data-live-search="true" title="Buscar Conductor ...">
      <%  
           
             try
                {
          cn.conectar();                     
           String Sql="select * from empleado;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                out.println("<option>"+cn.rt.getString(2)+cn.rt.getString(3));                       
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                                
           %>   
      </select>
       </div>
    
    
      
       <label7 style="" id="label7" for="InvtransferenceNotes">Notas</label7>
         <input id="buscar" type="text" name="nottransferencia" value=""  />
       
    
  <table  id="Tabla21"border="1"cellspacing="0"cellpading="0"rules="all">
                <tr style="background-color:linen;">
                    <td colspan="6">Productos </td>
                       <tr style="background-color:linen;">
                      <td>codigo</td>
                            <td>nombre</td>
                           
                            
                         <td>cn</td>
                         <td>precio</td>
                            <td>unidad de medida</td>
                      </tr>
                            
                </tr>
                 <%
                                    ArrayList<TransferenciaDetalle> lista = (ArrayList<TransferenciaDetalle>)session.getAttribute("transferencia");
                                    if(lista!=null){
                                        for (TransferenciaDetalle d : lista) {
                        %>
                                        <tr>
                                               <td><%= d.getCodigoProducto()%></td>
                                            <td><%= d.getProducto()%></td>
                                        
                                         
                                            <td><%= d.getCantidad()%></td>
                                            <td><%= d.getCosto()%></td>
                                        
                                          
                                        </tr>
                        <%
                                        }
                                    }
                        %>
          
             
                 
                        
                    
                    <%-- Enlaces a las paginas de actualizar o anadir al carrito --%>
             
           
        </table>
             <input id="Aceptartransnferencia" value="Aceptar" type="submit">    
       </form>
      
       <form style="top:0px;"  id="gett2" method="post" action="Controlador">
      <input type="hidden" name="accion" value="AnadirTransferencia" />
       <div style="top: 50px;" class="form-group">
     
      
     
       <label style="position: relative;top:50px;margin-left:425px;">Ingrese la Cantidad:</label>
      <input style="margin-left:425px;position:relative;top: 61px; " type="text" name="txtCantidad" value="0" />
       <input style="margin-left:600px;position:relative;top: 32px; " value="Cargar" type="submit">

     
   
<select onchange="getDetalleProducto(this.value)" name="lunchbucar" id="lunch2" class="selectpicker" data-live-search="true" title="Buscar Productos ...">
          
         <%
                    int id_pro;
                    String desc_pro = null;
                    ArrayList lst_pro = new ArrayList();
                    productoBo pro_bo = new productoBo();
                    lst_pro = pro_bo.getProductos();
                    if(lst_pro.size() > 0){
                        for(int i = 0; i<lst_pro.size(); i++){
                            id_pro = ((productoBean)lst_pro.get(i)).getId_pro();
                            desc_pro = ((productoBean)lst_pro.get(i)).getNombre();
                           out.println("<option value=" + id_pro + ">" + desc_pro + - id_pro+ "</option>");
                           
                        }
                    }                    
                %> 

    </select>
                
                 
                     
      
        
          
            <div  id="result_detalle" style="top: 73px;position: absolute;">
                <select value="Buscar Productos ..."name="producto" >
           
        </select>
              
            
               
                </div>
      
            </div>
                 </form> 
                    
                 
     
                   
   
            </body>
</html>
