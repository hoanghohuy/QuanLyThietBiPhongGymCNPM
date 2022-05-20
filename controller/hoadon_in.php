<?php
session_start();
if(isset($_POST["InHoaDon"])) {
    $hoadon_id = $_POST["hd_id"];
    $hd_by = $_POST["hd_by"];
    $eq_name = $_POST["hd_eq_name"];
    $ncc_id = $_POST["hd_eq_ncc"];
    $soluong = $_POST["hd_quantity"];
    $ngaylaphoadon = $_POST["hd_createDate"];
    $total = $_POST["hd_total"];
    $hoadon_type = $_POST["hd_type"];
}
$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	Name : '.$hd_by.'<br /> 
	Billing Type : '.$hoadon_type.'
	</td>
	<td width="35%">         
	Invoice No. :'.$hoadon_id.' <br />
	Invoice Date :'.$ngaylaphoadon.' <br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Sr No.</th>
	<th align="left">Item Code</th>
	<th align="left">Item Name</th>
	<th align="left">So luong</th>
	<th align="left">Don gia</th>
	<th align="left">Actual Amt.</th> 
	</tr>';
    $count = 0;
    $count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$ncc_id.'</td>
	<td align="left">'.$eq_name.'</td>
	<td align="left">'.$soluong.'</td>
	<td align="left">dongia</td>
	<td align="left">'.$total.'</td>   
	</tr>';
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Sub Total</b></td>
	<td align="left"><b></b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Tax Rate :</b></td>
	<td align="left"></td>
	</tr>
	<tr>
	<td align="right" colspan="5">Tax Amount: </td>
	<td align="left"></td>
	</tr>
	<tr>
	<td align="right" colspan="5">Total: </td>
	<td align="left"></td>
	</tr>
	<tr>
	<td align="right" colspan="5">Amount Paid:</td>
	<td align="left"></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Amount Due:</b></td>
	<td align="left"></td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
$output .= '<h3 align="right">Nguoi lap hoa don</h3>
            <h4 align="right">Hoang</h4>';

// create pdf of invoice	
$invoiceFileName = 'Invoice.pdf';
require_once '../vendor/autoload.php';
    // vendor\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>   
   