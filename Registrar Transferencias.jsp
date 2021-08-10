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
   <link rel="stylesheet" href="bootstrap-select-1.12.2/dist/css/bootstrap-select.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="bootstrap-select-1.12.2/dist/js/bootstrap-select.js"></script>
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
        <link rel="stylesheet" type="estilo.css="hojaestilo.css">
         
             
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
        
        
            <h3><a style="color: black" href="Transferencias.jsp">transferencias</a></h3>
          
       
           
        <form id="getaction" method="post" action="Controlador">
           <input type="hidden" name="accion" value="grabartrans" />
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
           
        
     <label1 >Motivo de perdida</label1>       
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
      
   
        
         
       <div class="form-group">
      <label style="position: relative;top: 20px;" class="col-md-1 control-label" for="lunch">Bucar:</label>
    </div>
       
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
      String nombre=(String)
      lunch.getSelectedItem()
    
      <label style="top:285px" >Fecha: <input type="text" id="datepicker">&nbsp;<input type="text" id="alternate" size="30"/></label>
      
       <label7 id="label7" for="InvtransferenceNotes">Notas</label7>
         <input id="buscar" type="text" name="textarea " value=""  />
       
         <input type="submit" value="VistaPrevia" name="vista" />
  <table  id="Tabla2"border="1"cellspacing="0"cellpading="0"rules="all">
                <tr style="background-color:linen;">
                    <td colspan="4">Productos </td>
                     
                </tr>
                    <%
                       ArrayList<Productos> lista = (ArrayList<Productos>)session.getAttribute("carrito");
                       if(lista!=null){
                          for (Productos d : lista) {
                        %>
                          <tr>
                 <td><input type="text" name="codigo" value="<%= d.getCodigoProducto()%>" /></td>
                                          
                <td><input type="text" name="nombre" value="<%= d.getNombre()%>" /></td>
                 
                  <td><input type="text" name="cantid" value="<%= d.getCantidad()%>" /></td>
                                           
                        </tr>
                        <%
                                        }
                                    }
                        %>
               <tr style="background-color:linen;">
                       <td>Codigo</td>
                       <td>Producto</td>
                       <td>Precio</td>
                       <td>Cantidad</td>
                       
                      </tr>
                            
                
       
                        
                    
                    <%-- Enlaces a las paginas de actualizar o anadir al carrito --%>
             
           
        </table>
       </form>
      
       <form  id="getaction" method="post" action="Controlador">
      <input type="hidden" name="accion" value="AnadirCarrito" />
       <div style="top: 40px;" class="form-group">
      <label style="position: relative;top: 30px;" class="col-md-1 control-label" for="lunch">Bucar:</label>
       <label style="position: absolute;top: 555px;margin-left:580px;">Ingrese la Cantidad:</label>
      <input style="margin-left:605px;position:absolute;top: 555px; " type="text" name="txtCantidad" value="0" />
       <input style="margin-left:780px;position:absolute;top: 555px; " value="Cargar" type="submit">
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
                
                 
                     
      
        
          
            <div style="margin-left:700px;" id="result_detalle">
                <select value="Buscar Productos ..."name="producto"  >
           
        </select>
                </select>
            
               
                </div>
      
      
        
       
                 
        
                 </form> 
                    
                 
                      <input type="button" value="Page1" onClick="newPage('CONFIRMAR.jsp')">    
                   
   
            </body>
</html>
