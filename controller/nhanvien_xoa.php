<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if (isset($_POST["XoaNhanVien"])) {
        $u_id = $_POST["u_id"];
        $sqlxoa2 ="DELETE FROM account WHERE `id` = '$u_id'";
        $sqlxoa ="DELETE FROM staff WHERE `staff_id` = '$u_id'";
        $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$session_name', 'Xóa nhân viên')";
        try {
            //code...
            $result2 = $conn->query($sqlxoa2);
            $result = $conn->query($sqlxoa);
            $result_log = $conn->query($SQL_WriteLog);
            if($result == true && $result2== true && $result_log) {
                header("Location: ../nhanvien.php");
                }
        } catch (Exception $ex) {
            //throw $th;
            echo "Có lỗi xảy ra! Hãy thử lại sau!!!";
        }
    }
 ?>