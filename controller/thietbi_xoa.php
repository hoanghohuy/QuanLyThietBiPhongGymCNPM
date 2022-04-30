<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if (isset($_POST["XoaThietBi"])) {
        $eq_id = $_POST["eq_id"];
        $sqlxoa ="DELETE FROM equipment WHERE `eq_id` = '$eq_id'";
        $SQL_WriteLog = "INSERT INTO record (record_by, record_date, record_action) VALUES ('$session_name', '$dateTimeNow', 'Xóa thiết bị')";
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