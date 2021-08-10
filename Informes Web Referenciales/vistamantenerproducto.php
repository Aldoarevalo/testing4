<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"], $_POST["a_sub"],$_POST["a_sub1"])) 
 {  
      $connect = mysqli_connect("127.0.0.1", "root", "", "comprastockproduccion");  
      $output = '';  
      $query = "  
SELECT * FROM vistaoproduccion
 
           WHERE fechaelaboracion BETWEEN '".$_POST["from_date"]."' AND  '".$_POST["to_date"]."' and idorden BETWEEN '".$_POST["a_sub"]."' AND  '".$_POST["a_sub1"]."'
               and fechaentrega BETWEEN '".$_POST["to_date"]."' AND  '".$_POST["to_date"]."'";  
      $result = mysqli_query($connect, $query);
      
      $output .= '  
        <table class="table table-bordered">
                <tr>  
                
                     <th width="5%">Idorden</th>  
                     <th width="30%">producto</th>  
                     <th width="30%">marca</th>  
                     <th width="10%">Sub-rubro</th>  
                    
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  

           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr> 
                     <td>'. $row["idorden"] .'</td>
                      <td>'. $row["codigoproducto"] .'</td>  
                           <td>'. $row["producto"] .'</td>  
                       <td>'. $row["nombres"] .'</td>  
                           <td>'. $row["cliente"] .'</td> 
         <td>'. $row["fechaelaboracion"] .'</td> 
             <td>'. $row["fechaentrega"] .'</td>                 
                            
                               <td><a href="../print_invoice.php?pdf=1&id='.$row["codigoproducto"].'">PDF</a></td>         
                            <td><a href="preview.php?invoice='.$row["cliente"].'"><span class="btn btn-warning btn-xs update">Ver</span></a></td>    
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
