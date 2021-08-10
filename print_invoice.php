<?php
include('database_connection.php');
 if(isset($_POST["createe_pdf"],$_POST["combomarcas"], $_POST["comborubroprod"],$_POST["combosub"],$_POST["combocategoria"])) 
{
 require_once 'pdf.php';
 require_once('tcpdf/tcpdf.php');
 $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Miguel Caro');
	$pdf->SetTitle($_POST['reporte_name']);

	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false);
	$pdf->SetAutoPageBreak(true, 20);
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

 
 $output = '';
 $statement = $connect->prepare("
  SELECT * FROM unproducto
 WHERE Fecha BETWEEN :combomarcas and :comborubroprod and idPedidoCompra BETWEEN :combosub and :combocategoria

 ");
 $statement->execute(
  array(
   ':combomarcas'       =>  $_POST["combomarcas"],
     ':comborubroprod'       =>  $_POST["comborubroprod"] ,
 ':combosub'       =>  $_POST["combosub"],
     ':combocategoria'       =>  $_POST["combocategoria"]
  )
 );
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';

  if($statement->rowCount() >= 1)
   
 {
        $count = 0;
   foreach($result as $rowCount)
   {
  $count++;
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
         Name : '.$rowCount["fechaelaboracion"].'<br /> 
         Billing Address : '.$rowCount["idorden"].'<br />
        </td>
        <td width="35%">
         Reverse Charge<br />
         Invoice No. : '.$rowCount["idorden"].'<br />
         Invoice Date : '.$rowCount["idorden"].'<br />
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
     
        <tr>
    <td>'.$count.'</td>
    
   
  
   <td>'.$rowCount["producto"].'</td>
    <td>'.$rowCount["codigoproducto"].'</td>
   </tr>
   
 
  <tr>
   <td align="right" colspan="11"><b>Total</b></td>
   <td align="right"><b>'.$rowCount["totalp"].'</b></td>
  </tr>
  
 
      </table>
     </td>
    </tr>
   </table>
    ';
   }
  }
  else
  {
    echo  $output .= '
    <tr>
     <td align="center">Data not Found</td>
    </tr>
   ';
  }
  $pdf = new Pdf();
 $file_name = 'Invoice-'.$rowCount["idorden"].'.pdf';
 
  $pdf->loadHtml($output);
   $pdf->render();
    $pdf->stream($file_name, array("Attachment" => false));
 
 
 




}
 

?>