<?php
require_once '../connect/conn.php';
ob_start();
$id = $_GET['id'];
header('Content-Type: application/json');
if(!isset($id) || !is_numeric($id) || intval($id) < 1){
	echo json_encode(array(
		"result" => false,
		"message" => "ID khong hop le"
	));
	exit();
}
$Sql_Sel_Hoadon = "SELECT h.hoadon_id, s.last_name, h.eq_name, n.ncc_name, h.ngaylaphoadon, h.soluong, h.total, h.hoadon_type 
FROM hoadon as h, nhacungcap as n, staff as s, equipment as e 
WHERE h.staff_id = s.staff_id AND h.ncc_id = n.ncc_id AND h.hoadon_id = '$id'";
$result = $conn->query($Sql_Sel_Hoadon);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	echo json_encode(array(
			"result" => true,
			"message" => "Lay thanh cong",
			"data" => $row
		));
		break;
    }
}else{
	echo json_encode(array(
		"result" => false,
		"message" => "Id khong ton tai",
	));
}
ob_end_flush();
?>