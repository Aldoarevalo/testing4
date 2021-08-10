<?php
//print_invoice.php
 if(isset($_POST["combomarcas"], $_POST["comborubroprod"],$_POST["combosub"],$_POST["combocategoria"])) 
{
 require_once 'pdf.php';
 include('database_connection.php');
 $output = '';
 $statement = $connect->prepare("
  SELECT * FROM vistaoproduccion
 WHERE fechaelaboracion  BETWEEN :combomarcas and :comborubroprod and idorden BETWEEN :combosub and :combocategoria

 ");
 $statement->execute(
  array(
   ':combomarcas'       =>  $_POST["combomarcas"],
     ':comborubroprod'       =>  $_POST["comborubroprod"] ,
 ':combosub'       =>  $_POST["combosub"],
     ':combocategoria'       =>  $_POST["combocategoria"]
  )
 );
 $result = $statement->fetchAll();
   
 foreach($result as $row)
 {
  
  $output .= '
 <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
     <td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
    </tr>
    <tr>
     <td colspan="2">
      <table width="100%" cellpadding="5">
       <tr>
        <td width="65%">
         To,<br />
         <b>RECEIVER (BILL TO)</b><br />
         Name : '.$row["fechaelaboracion"].'<br /> 
         Billing Address : '.$row["idorden"].'<br />
        </td>
        <td width="35%">
         Reverse Charge<br />
         Invoice No. : '.$row["idorden"].'<br />
         Invoice Date : '.$row["idorden"].'<br />
        </td>
       </tr>
      </table>
      <br />
      <table width="100%" border="1" cellpadding="5" cellspacing="0">
       <tr>
        <th>Sr No.</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actual Amt.</th>
       
       </tr>
     
        
       ';
  $statement = $connect->prepare(
   " SELECT distinct codigoproducto,producto FROM vistaoproduccion
  WHERE  idorden  BETWEEN :combosub and :combocategoria"
  );
  $statement->execute(
   array(
 ':combosub'       =>  $_POST["combosub"],
     ':combocategoria'       =>  $_POST["combocategoria"] 
   )
  );
  $item_result = $statement->fetchAll();
  $count = 0;
  foreach($item_result as $sub_row)
  {
   $count++;
   $output .= '
   <tr>
    <td>'.$count.'</td>
    
   
  
   <td>'.$sub_row["producto"].'</td>
    <td>'.$sub_row["codigoproducto"].'</td>
   </tr>
   ';
  }
  $output .= '
  <tr>
   <td align="right" colspan="11"><b>Total</b></td>
   <td align="right"><b>'.$row["totalp"].'</b></td>
  </tr>
  ';
  $output .= '
      </table>
     </td>
    </tr>
   </table>
  ';
 }
 $pdf = new Pdf();
 $file_name = 'Invoice-'.$row["idorden"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}
 else if(isset($_POST["fil"],$_POST["combomarcas"], $_POST["comborubroprod"])) 
{
 require_once 'pdf.php';
 include('database_connection.php');
 $output = '';
 $statement = $connect->prepare("
  SELECT * FROM vistaoproduccion
 WHERE fechaelaboracion  BETWEEN :combomarcas and :comborubroprod 

 ");
 $statement->execute(
  array(
   ':combomarcas'       =>  $_POST["combomarcas"],
     ':comborubroprod'       =>  $_POST["comborubroprod"] ,

  )
 );
 $result = $statement->fetchAll();
   
 foreach($result as $row)
 {
  
  $output .= '
 <table width="100%" border="1" cellpadding="5" cellspacing="0">
    
    <tr>
     <td colspan="2">
      <table width="100%" cellpadding="5">
       <tr>
        <td width="65%">
         To,<br />
         <b>RECEIVER (BILL TO)</b><br />
         Name : '.$row["fechaelaboracion"].'<br /> 
         Billing Address : '.$row["idorden"].'<br />
        </td>
        <td width="35%">
         Reverse Charge<br />
         Invoice No. : '.$row["idorden"].'<br />
         Invoice Date : '.$row["idorden"].'<br />
        </td>
       </tr>
      </table>
      <br />
      <table width="100%" border="1" cellpadding="5" cellspacing="0">
       <tr>
        <th>Sr No.</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actual Amt.</th>
       
       </tr>
     
        
       ';
  $statement = $connect->prepare(
   "  SELECT * FROM vistaoproduccion
 WHERE fechaelaboracion  BETWEEN :combomarcas and :comborubroprod 
  "
  );
  $statement->execute(
   array(
  ':combomarcas'       =>  $_POST["combomarcas"],
     ':comborubroprod'       =>  $_POST["comborubroprod"] ,
   )
  );
  $item_result = $statement->fetchAll();
  $count = 0;
  foreach($item_result as $sub_row)
  {
   $count++;
   $output .= '
   <tr>
    <td>'.$count.'</td>
    
   
  
   <td>'.$sub_row["producto"].'</td>
    <td>'.$sub_row["codigoproducto"].'</td>
   </tr>
   ';
  }
  $output .= '
  <tr>
   <td align="right" colspan="11"><b>Total</b></td>
   <td align="right"><b>'.$row["totalp"].'</b></td>
  </tr>
  ';
  $output .= '
      </table>
     </td>
    </tr>
   </table>
  ';
 }
 $pdf = new Pdf();
 $file_name = 'Invoice-'.$row["idorden"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}
?>