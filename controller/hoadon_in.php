<?php
header('Content-Type: charset=utf-8');
use Sabberworm\CSS\Property\Charset;

session_start();
if(isset($_POST["InHoaDon"])) {
	$signature = $_SESSION["username"];
    $hoadon_id = $_POST["hd_id"];
    $hd_by = $_POST["hd_by"];
    $eq_name = $_POST["hd_eq_name"];
    $ncc_id = $_POST["hd_eq_ncc"];
    $soluong = $_POST["hd_quantity"];
	$dongia = $_POST["hd_unit"];
    $ngaylaphoadon = $_POST["hd_createDate"];
    $total = $_POST["hd_total"];
    $hoadon_type = $_POST["hd_type"];
}
$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>HOA DON</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="100%">
	Nhan vien : '.$hd_by.'<br /> 
	Loai hoa don : '.$hoadon_type.'
	</td>
	<td width="100%">         
	Hoa don #. :'.$hoadon_id.' <br />
	Ngay lap hoa don :'.$ngaylaphoadon.' <br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">STT.</th>
	<th align="left">Nha cung cap</th>
	<th align="left">Ten thiet bi</th>
	<th align="left">So luong</th>
	<th align="left">Don gia</th>
	<th align="left">Thanh tien</th> 
	</tr>';
    $count = 0;
    $count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$ncc_id.'</td>
	<td align="left">'.$eq_name.'</td>
	<td align="left">'.$soluong.'</td>
	<td align="left">'.$dongia.'</td>
	<td align="left">'.$total.'</td>   
	</tr>';
$output .= '
	<tr>
	<td align="right" colspan="5">Phi phat sinh: </td>
	<td align="left">0</td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Tong cong:</b></td>
	<td align="left"><b>'.$total.'</b></td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
$output .= '<h3 align="right">Nguoi lap hoa don</h3>
            <h4 align="right">'.$signature.'</h4>
            <h4 align="right">'.$hd_by.'</h4>';

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
   