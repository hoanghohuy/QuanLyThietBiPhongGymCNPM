<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    $GET_USER_BY_ID = "SELECT id, account_name FROM account WHERE username = '$session_name'";
    $result_GET_USER_BY_ID = $conn->query($GET_USER_BY_ID);
    $row = $result_GET_USER_BY_ID->fetch_assoc();
    $eq_CreatedBy = $row["account_name"];
    $hoadon_SessionID = $row["id"];
    if (isset($_POST["XoaThietBi"])) {
        $eq_id = $_POST["eq_id"];
        $sqlxoa ="DELETE FROM equipment WHERE `eq_id` = '$eq_id'";
        $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$eq_CreatedBy', 'Xóa thiết bị')";
        $result_log = $conn->query($SQL_WriteLog);
        $result = $conn->query($sqlxoa);
        if($result == true  && $result_log == true) {
        header("Location: ../thietbi.php");
        }
        else {
            echo "Có lỗi xảy ra! Hãy thử lại sau!!!";
        }
    }
 ?>