<?php
//print_invoice.php
 if(isset($_POST["combosub"],$_POST["combocategoria"])) 
{
 require_once 'pdf.php';
 include('database_connection.php');
 $output = '';
 $statement = $connect->prepare("
  SELECT * FROM vistaoproduccion 
 WHERE  idorden BETWEEN :combosub and :combocategoria

 ");
 $statement->execute(
  array(
   ':combosub'       =>  $_POST["combosub"],
     ':combocategoria'       =>  $_POST["combocategoria"]
  )
 );
 $result = $statement->fetchAll();
    $count = 0;
 foreach($result as $row)
 {
  $output .= '

         <table border="1">
<thead>
<tr>
<th></th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
</tbody>

   

     
      
       ';
 

 
 
 
  {
    
   $count++;
   $output .= '
   <tr>
    <td>'.$count.'</td>
          <td>'.$row["idorden"].'</td>
    <td>'.$row["producto"].'</td>
    <td>'.$row["idorden"].'</td>
   
   </tr>
   ';
  }
  '
 
  

 
      </table>
    

  ';
 }
 $pdf = new Pdf();
 $file_name = 'Invoice-'.$row["codigoproducto"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}
?>