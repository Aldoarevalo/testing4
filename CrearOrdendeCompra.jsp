<%@page import="ModeloConexion.coneBD"%>
<%@page import="ModeloMovimientosDeCompras.OrdenCompraDetalle"%>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           <%-- 
    Document   : Menu
    Created on : 05-mar-2016, 17:35:37
    Author     : User
--%>


<%@page import="java.util.ArrayList"%>
<%@page import="ajax.logic.productoBo" %>
<%@page import="ajax.bean.productoBean" %>
<%@page import="java.sql.Connection"%>
<%@page import="Modelo.*" %>
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
		$( "#from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
                        showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
                            
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
                         showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
        $( "#datepicker" ).datepicker({
                    altField: "#alternate",
			altFormat: "DD, d MM, yy",
			showOn: "button",
			buttonImage: "jquery1102/demos/images/calendar.gif",
			buttonImageOnly: true
		});
	$(function() {
		$( "#fecha" ).datepicker();
	});
        $( "#lunch2" ).autocomplete({
					source: data,
					minLength: 0,
					select: function( event, ui ) {
						log( ui.item ?
							"Selected: " + ui.item.value + ", geon: " + ui.item.id :
							"Nothing selected, input was " + this.value );
					}
				});
			
		
	
	</script>
  
      <style>
	.ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
	</style>
     
        <title>CrearÓrdendeCompra</title>
        <Script src="AJAX/ajax_producto.js"></Script>
         <Script src="AJAX/ajax_masDetalle.js"></Script>
    </head>
    <body id="hhmenu">
       <link rel="stylesheet" type="text/css" href="estilo.css">
        
         <div id="menu-wrapper" >
    
     <ul id="hmenu" > 
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
	
		<li><a href="Registrar Transferencia.jsp">Crear Orden de Compra</a></li>
		<li><a href="Transferencias.jsp">Listar Órdenes de Compra</a></li>
		
	
	
</div>
        
        
            <h3><a style="color: black" href="Transferencias.jsp">Órdenes de Compra</a></h3>    
        <form id="getactionordencompra"method="post" action="Controlador">
               <input type="hidden" name="accion" value="registrarOrden" />
            <h4><a style="color: black" href="Reportes de Compras.jsp">Crear Orden de Compra</a></h4>
       
      <label id="labelempresaordencompra">Empresa</label>                      
        <select  id="cboempresaordenor"  name="comboempresaordencompra"> 
          
            <%

            coneBD cn=new coneBD();
           
             try
                {
          cn.conectar();                     
           String Sql="select * from empresa;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                out.println("<option>"+cn.rt.getString(3)+"<option>"  );                       
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                        
           %> 
        
        </select>


     <label id="labelcentrodecostosorden" >Centro de Costos </label>       
<select id="cbocentrodecostosor"  name="combocentrodecostosorden"> 
           <%      
             try
                {
          cn.conectar();                     
           String Sql="select * from centrodecostos;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                out.println("<option>"+cn.rt.getString(2)+"<option>"  );                       
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                                
           %>        
        </select>
      
                <label id="labelmonedaorden" >hhhh</label>       
<select style="background:white;margin-left:1500px; "  name="comboalmacenorden"> 
           
        </select>
        
    <div>
   <label style="top:210px">Fecha:<input type="text" id="from" name="from"/></label>

<label style="top:210px;margin-left: 290px; ">Vencimiento:<input type="text" id="to" name="to"/></label>


    
       
      <div  style="margin: 70px;position: absolute;" class="form-group">
     <label style="position: relative;top:4px;margin-left:0px;">buscar Presupuesto de Proveedor:</label>

    
    
                <select   name="pres" id="lunch2" class="selectpicker" data-live-search="true" title="Buscar Presupuesto de Proveedor ...">
      <%  
           
             try
                {
          cn.conectar();                     
           String Sql="select * from presupuestocabecera;";
           cn.st=cn.conec.createStatement();
            cn.rt=cn.st.executeQuery(Sql);
            while(cn.rt.next())  { 
                out.println("<option>"+cn.rt.getString(1));                       
                }
            
               } catch (Exception e)
                {
                    out.println(e.toString());
                }
                

                                
           %>   
      </select>
         
   </div>
      
         
         
         
         
         
       <label7 id="label7" for="InvtransferenceNotes">Notas</label7>
         <input id="buscar" type="text" name="notaordenss" value=""  />
         
    </div>
        <table id="tablacrearorden"border="1"cellspacing="0"cellpading="0"rules="all">
                <tr style="background-color:linen;">
                    <td colspan="5">Productos</td>
                     
                </tr>
                
               
                <tr style="background-color:linen;">
                       <td>Codigo</td>
                       <td>Producto</td>
                       <td>Cantidad</td>
                       <td>Precio</td>
                       <td>Total</td>
                      
                 
                   </tr>
                   
                     <%
                                    ArrayList<OrdenCompraDetalle> lista = (ArrayList<OrdenCompraDetalle>)session.getAttribute("orden");
                                    if(lista!=null){
                                        for (OrdenCompraDetalle d : lista) {
                        %>
                                        <tr>
                                      <td><%= d.getCodigoProducto()%></td>
                                      <td><%= d.getNombre()%></td>
                                       <td><%= d.getCantidad()%></td>
                                      <td><%= d.getNombre().getPrecio()%></td>   
                                        <td><%= d.getDescuento()%></td> 
                                        </tr>
                        <%
                                        }
                                    }
                        %>
        </table>
        
         
         <label id="labelterminosdepagoorden" >Términos de Pago</label>       
<select id="cboterminosdepagoorden"  name="comboterminosdepagoorden"> 
    <option> Contado </option>
      <option> Credito </option>
        </select>
        <label id="labelfechaentregaorden" >Fecha de Entrega</label> 
         <input  id="fecha" type="text" name="fechaentrega" value=""  />
          <label id="labelsitioentrega" >Sitio de Entrega</label> 
         <input id="txtsitioentrega" type="text" name="txtssitios" value=""  />
        <input id="Aceptargrabarorden" value="Aceptar" type="submit">
         </form>
        <form style="top:0px;"  id="gett111" method="post" action="Controlador">
      <input type="hidden" name="accion" value="AnadirOrden" />
       <div style="top: 0px;" class="form-group">
     
      
       <label style="position: relative;top:50px;margin-left:425px;">Ingrese la Cantidad:</label>
      <input style="margin-left:425px;position:relative;top: 50px; " type="text" name="txtCantidad" value="0" />
       <input style="margin-left:5px;position:absolute;top: 60px; " value="Cargar" type="submit">
    </div>
     
   
      <select onchange="getDetalleProducto(this.value)"   name="productos" id="lunch2" class="selectpicker" data-live-search="true" title="Buscar Productos ...">
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
                
                 
                     
      
        
          
            <div style="position:absolute;top: 70px;"  id="result_detalle">
                <select value="Buscar Productos ..."name="producto"  >
           
        </select>
              
            
               
                </div>
                    </form>
    
          
    </body>
</html>
                                      