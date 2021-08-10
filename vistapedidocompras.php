<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "comprastockproduccion");  
      $output = '';  
      $query = "  
           SELECT DISTINCT idpedidocompra,Fecha,Vencimiento,cliente,Notas,almacen,totalp FROM unproducto  
           WHERE Fecha BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);
      
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                
                     <th width="5%">Id</th>  
                     <th width="30%">Fecha</th>  
                     <th width="30%">Vencimiento</th>  
                     <th width="10%">Cliente</th>  
                     <th width="12%">Notas</th>
                      <th width="10%">Almacen</th>  
                     <th width="12%">Total</th>
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
//           foreach($result as $row)
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["idpedidocompra"] .'</td>  
                          <td>'. $row["Fecha"] .'</td>  
                          <td>'. $row["Vencimiento"] .'</td>  
                          <td> '. $row["cliente"] .'</td>  
                          <td>'. $row["Notas"] .'</td> 
                           <td>'. $row["almacen"] .'</td>
                              <td>'. $row["totalp"] .'</td>  
                                  <td><a href="print_invoice.php?pdf=1&id='.$row["idpedidocompra"].'">PDF</a></td>
                            <td><a href="preview.php?invoice='.$row["idpedidocompra"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>    
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
