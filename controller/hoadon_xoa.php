<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if (isset($_POST["XoaHoaDon"])) {
        $hoadon_id = $_POST["hd_id"];
        $sqlxoa ="DELETE FROM hoadon WHERE `hoadon_id` = '$hoadon_id'";
        $result = $conn->query($sqlxoa);
        $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$session_name', 'Xóa hóa đơn')";
        $result_log = $conn->query($SQL_WriteLog);
        if($result == true  && $result_log == true) {
        header("Location: ../hoadon.php");
        }
        else {
            echo "Có lỗi xảy ra! Hãy thử lại sau!!!";
        }
    }
 ?>