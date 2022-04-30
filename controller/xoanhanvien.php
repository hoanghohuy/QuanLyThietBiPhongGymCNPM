<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if (isset($_POST["XoaNhanVien"])) {
        $u_id = $_POST["u_id"];
        $sqlxoa2 ="DELETE FROM account WHERE `id` = '$u_id'";
        $result2 = $conn->query($sqlxoa2);
        $sqlxoa ="DELETE FROM staff WHERE `staff_id` = '$u_id'";
        $result = $conn->query($sqlxoa);
        $SQL_WriteLog = "INSERT INTO record (record_by, record_date, record_action) VALUES ('$session_name', '$dateTimeNow','Xóa nhân viên')";
        $result_log = $conn->query($SQL_WriteLog);
        if($result == true && $result2== true && $result_log) {
        header("Location: ../nhanvien.php");
        }
        else {
            echo "Có lỗi xảy ra! Hãy thử lại sau!!!";
        }
    }
 ?>