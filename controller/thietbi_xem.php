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
$sql_sel_eq = "SELECT eq_id, eq_name, ncc_id, eq_quantity, eq_ngaynhaphang, eq_ngayhethanbaohanh, eq_dongia, eq_status FROM equipment WHERE eq_id ='$id'";
$result = $conn->query($sql_sel_eq);
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