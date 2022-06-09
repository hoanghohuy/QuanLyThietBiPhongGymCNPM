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
$sql_sel_user = "SELECT account.id, staff.first_name, staff.last_name, staff.dob, account.username, account.pwd, staff.staff_salary, account.role, account.isActive FROM account, staff WHERE account.id = staff.staff_id AND id ='$id'";
$result = $conn->query($sql_sel_user);
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