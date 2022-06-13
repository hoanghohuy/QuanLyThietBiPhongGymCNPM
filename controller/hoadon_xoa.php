<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    $GET_USER_BY_ID = "SELECT id, account_name FROM account WHERE username = '$session_name'";
    $result_GET_USER_BY_ID = $conn->query($GET_USER_BY_ID);
    $row = $result_GET_USER_BY_ID->fetch_assoc();
    $hoadon_CreatedBy = $row["account_name"];
    $hoadon_SessionID = $row["id"];
    if (isset($_POST["XoaHoaDon"])) {
        $hoadon_id = $_POST["hd_id"];
        $sqlxoa ="DELETE FROM hoadon WHERE `hoadon_id` = '$hoadon_id'";
        
        $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$hoadon_CreatedBy', 'Xóa hóa đơn')";
        
        try {
            //code...
            $result = $conn->query($sqlxoa);
            $result_log = $conn->query($SQL_WriteLog);
            if($result == true  && $result_log == true) {
                header("Location: ../hoadon.php");
                }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Có lỗi xảy ra! Hãy thử lại sau!!!";
        }
    }
 ?>