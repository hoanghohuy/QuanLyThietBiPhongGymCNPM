<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if (isset($_POST["XoaNhaCungCap"])) {
        $ncc_id = $_POST["ncc_id"];
        $sqlxoa ="DELETE FROM nhacungcap WHERE `ncc_id` = '$ncc_id'";
        $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$session_name', 'Xóa nhà cung cấp')";
        
        try {
            //code...
            $result = $conn->query($sqlxoa);
            $result_log = $conn->query($SQL_WriteLog);
            if($result == true  && $result_log == true) {
                header("Location: ../nhacungcap.php");
                }
        } catch (Exception $ex) {
            //throw $th;
            echo "Có lỗi xảy ra! Hãy thử lại sau!!!";
        }
    }
 ?>