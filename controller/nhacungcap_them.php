<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    $GET_USER_BY_ID = "SELECT id, account_name FROM account WHERE username = '$session_name'";
    $result_GET_USER_BY_ID = $conn->query($GET_USER_BY_ID);
    $row = $result_GET_USER_BY_ID->fetch_assoc();
    $ncc_CreatedBy = $row["account_name"];
    $hoadon_SessionID = $row["id"];
    if(isset($_POST["ThemNhaCungCap"])) {
        $ncc_id = $_POST["ncc_id"];
        $ncc_name = $_POST["ncc_name"];
        $ncc_address = $_POST["ncc_address"];
        $ncc_matchday = $_POST["ncc_matchday"];
        $ncc_note = $_POST["ncc_note"];
        $sql_ThemNCC = "INSERT INTO nhacungcap (ncc_id, ncc_name, ncc_address, ncc_matchday, ncc_note) VALUES ('$ncc_id', '$ncc_name','$ncc_address','$ncc_matchday','$ncc_note')";
        // write log
        $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$ncc_CreatedBy','Thêm nhà cung cấp')";
        try {
            $result = $conn->query($sql_ThemNCC);
            $result_log = $conn->query($SQL_WriteLog);
            if($result == true && $result_log == true) {
                header("Location: ../nhacungcap.php");
                }
        } catch (Exception $ex) {
            echo "<h1>Mã nhà cung cấp đã tồn tại.</h1>";
            echo "<a href='../nhacungcap.php'><button>Quay lại</button></a>";
        }
    }
    mysqli_close($conn);   
?>