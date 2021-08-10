
<%-- <%-- 
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
<%@page import="ModeloConexion.*" %>

<%@page import="ModeloConfiguracionDeProductos.*"%>
<%@page import="ModeloMovimientosDeCompras.*" %>
<%@page import="java.util.*" %>
<%@page import="java.util.*,java.io.*,java.lang.*,java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">


<html>
    <head>
           <script src="buscador/datos/jquery-1.6.4.min.js"></script>
<script src="buscador/datos/jquery-1.6.4.min.js"></script>
  <link rel="stylesheet"href="buscador/datos/bootstrap.min.css">
   <link rel="stylesheet" href="buscador/dist/css/bootstrap-select.css">
  <script src="buscador/datos/jquery.min.js"></script>
  <script src="buscador/datos/bootstrap.min.js"></script>
  <script src="buscador/dist/js/bootstrap-select.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Registrar Nota de Credito y Debito</title>
         <Script src="AJAX/ajax_producto.js"></Script>
         <Script src="AJAX/ajax_masDetalle.js"></Script>
    </head>
    <body id="hhmenu"border="10">
       <link rel="stylesheet" type="text/css" href="estilo.css">    
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
                 
             <li><a href="Registrar Compra.jsp">Registrar Compra</a> </li>
           <li><a href="ReporteDeCompras.jsp">Reporte de Compras</a> </li>
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
             <li><a href="Transferencias.jsp">Centros de Producción</a> </li>
           <li><a href="">Lineas de Producción</a> </li>
            <li><a href="">Administrar Materia Prima</a> </li>
                     
                     
                 </ul> 
                      
           </li> 
           
      </ul> 
    </div>
   
        
   
          <div id="menu">
	
		<li><a href="Registrar Compra.jsp">Registrar Notas de Crédito</a></li>
		<li><a href="Reportes de Compras.jsp">Listar Notas de Crédito</a></li>
		
	
	
</div>
    <h3><a style="color: black" href="Reportes de Compras.jsp">Reporte de Notas de Crédito y Debito</a></h3>
  
    <form id="getaction">
          <h4><a style="color: black" href="Reportes de Compras.jsp">Registrar Nótas de Crédito y Debito</a></h4>
              <label4>Empresa </label4>                
        <select  id="cboempresa"  name="comboempresa"> 
          
            <%

            Conexion cn=new Conexion();
           
             try
                {
          cn.conectar();                     
           String Sql="select usuario,nombrecategoria from categoriadeproductos;";
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


      

       
        <label id="labelproveedornc"> Buscar Proveedor</label>
      
       <select id="cboestado"  name="comboestado"class="selectpicker" data-hide-disabled="true" data-live-search="true"title="Buscar Proveedor" > 
         
           <option>Terminado<option>                        
           
        </select>
        
          <label id="nrcomprobantenc">Número de Comprobante</label>
        <input id="textnumerocom" type="text" name="texnumerocomprobante " value=""  />
        <label id="fechanotacredito">Fecha</label>
       <input style="margin-right: 50px" id="textfechanotacredito" type="text" name="textarea " value=""  />

       <label id="Monedanc">Tipo de Comprobante</label>           
        <select  id="cbomonedanc"  name="combomonedanc"> 
          
         
                <option> Para Nota de Credito </option>
                <option>Para Nota de Debito </option>
       

        
        </select>  
            
           <label id="almacennc">Almacen</label>           
        <select  id="cboalmacennc"  name="combomonedanc"> 
          
            <%

         
           
             try
                {
          cn.conectar();                     
           String Sql="select usuario,nombrecategoria from categoriadeproductos;";
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
           <div
        <label id="seleccionefacuras">Seleccione Facturas      </label> 
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
  
         </div>
          <label id="labelnotasnc">Notas</label>
       <input id="textnotasnc" type="text" name="textarea " value=""  />
        
        <input id="checkdevolver" type="checkbox" name="checkimpueto" value="ON" checked="checked" />
        <label id="devolveritems">Devolver Items</label>
        
        <h1 id="itemsnc">Items</h1>
      
          <div style="top: 15px;position: relative;margin-left: 65px;" class="form-group">
     
      
       <label style="position: relative;top:35px;margin-left:425px;">Ingrese la Cantidad:</label>
      <input style="margin-left:425px;position:relative;top: 35px; " type="text" name="txtCantidad" value="0" />
       <input style="margin-left:5px;position:relative;top: 35px; " value="Cargar" type="submit">
    
         
        
   
      <select onchange="getDetalleProducto(this.value)"   name="productos" style="margin-left: 60px"   class="selectpicker" data-live-search="true" title="Buscar Productos ...">
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
              
              </div>    
                     
      
         <div style="position:absolute;top: 805px;margin-left: 100px;"  id="result_detalle">
                <select value="Buscar Productos ..."name="producto"  >
           
        </select>
              
            
               
                </div>   
       
        <table id="Tabla4"border="1"cellspacing="0"cellpading="0"rules="all">
                <tr style="background-color:linen;">
                    <td colspan="6">Productos</td>
                     
                </tr>
                
               
                <tr style="background-color:linen;">
                       <td>Codigo</td>
                       <td>Producto</td>
                       <td>Cantidad</td>
                         <td>UM</td>
                       <td>Unitario</td>
                        <td>Total</td>
                      
                   </tr>
        </table>
         
        
        
        <input id="Aceptarnc" value="Aceptar" type="submit">
    </form>
    
    </body>
  
</html>
