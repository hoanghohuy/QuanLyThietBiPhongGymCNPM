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
$sql_selnccbyid = "SELECT ncc_id ,ncc_name, ncc_address, ncc_matchday, ncc_note FROM nhacungcap WHERE ncc_id = '$id'";
$result = $conn->query($sql_selnccbyid);
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