<%-- 
    Document   : Menu
    Created on : 05-mar-2016, 17:35:37
    Author     : User
--%>

<%@page import="ajax.bean.productoBean"%>
<%@page import="ajax.logic.productoBo"%>
<%@page import="javax.servlet.jsp.tagext.TryCatchFinally"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.sql.*" %>
<%@page import="Modelo.*" %>
<%@page import="java.util.*" %>
<%@page import="java.util.*,java.io.*,java.lang.*,java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    
    <head>
        
        
    <a href=></a>
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="http://jquery-1.6.4.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
   <link rel="stylesheet" href="buscador/dist/css/bootstrap-select.css">
    <script src="https://select3.js"></script>
  <script src="https://select2.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
	
		<li><a href="Registrar Transferencia.jsp">Registrar Transferencia</a></li>
		<li><a href="Transferencias.jsp">Listar Transferencias</a></li>
		<li><a href="#">Monto de Transferencias</a></li>	
		<li><a href="#">Resumenes de transferencias</a></li>
		<li><a href="#">Comparativo de Transferencias a Sucursal</a></li>
	
	
</div>
        
        
         
          
       
           <h3><a style="color: black" href="Transferencias.jsp">Órdenes de Producción</a></h3> 
        <form id="gett" method="post" action="Controlador">
           <input type="hidden" name="accion" value="RegistrarTransferencia" />
            <h4><a style="color: black" href="Reportes de Compras.jsp">Compras</a></h4>
       
      <label>Almacen de Origen </label>
      
                 
        <select  id="aldo"  name="comboorigen"> 
          
            <%

            coneBD cn=new coneBD();
           
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
                    <td colspan="5">Productos </td>
                     
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
          
               <tr style="background-color:linen;">
                      <td>codigo</td>
                            <td>nombre</td>
                           
                            
                            <td>cn</td>
                         
                      </tr>
                            
                 
                        
                    
                    <%-- Enlaces a las paginas de actualizar o anadir al carrito --%>
             
           
        </table>
             <input id="Aceptartransnferencia" value="Aceptar" type="submit">    
       </form>
      
       <form style="top:0px;"  id="gett2" method="post" action="Controlador">
      <input type="hidden" name="accion" value="AnadirTransferencia" />
       <div style="top: 90px;" class="form-group">
     
      
     
       <label style="position: relative;top:50px;margin-left:425px;">Ingrese la Cantidad:</label>
      <input style="margin-left:425px;position:relative;top: 50px; " type="text" name="txtCantidad" value="0" />
       <input style="margin-left:10px;position:relative;top: 50px; " value="Cargar" type="submit">
    </div>
     
   
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
                
                 
                     
      
        
          
            <div  id="result_detalle" style="margin-top: 0px;">
                <select value="Buscar Productos ..."name="producto" >
           
        </select>
              
            
               
                </div>
      
        
                 </form> 
                    
                 
     
                   
   
            </body>
</html>
