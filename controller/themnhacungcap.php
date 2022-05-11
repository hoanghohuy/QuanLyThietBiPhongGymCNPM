<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if(isset($_POST["ThemNhaCungCap"])) {
        $ncc_id = $_POST["ncc_id"];
        $ncc_name = $_POST["ncc_name"];
        $ncc_address = $_POST["ncc_address"];
        $ncc_matchday = $_POST["ncc_matchday"];
        $ncc_note = $_POST["ncc_note"];
        $sql_ThemNCC = "INSERT INTO nhacungcap (ncc_id, ncc_name, ncc_address, ncc_matchday, ncc_note) VALUES ('$ncc_id', '$ncc_name','$ncc_address','$ncc_matchday','$ncc_note')";
        $result = $conn->query($sql_ThemNCC);
        // write log
        $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$session_name','Thêm nhà cung cấp')";
        $result_log = $conn->query($SQL_WriteLog);
        if($result == true && $result_log == true) {
        header("Location: ../nhacungcap.php");
        }
        else {
            echo "Có lỗi xảy ra.";
        }
    }
    mysqli_close($conn);   
?>