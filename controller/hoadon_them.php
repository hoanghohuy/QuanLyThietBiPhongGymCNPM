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
    if(isset($_POST["AddHoaDon"])) {
        $hoadon_id = $_POST["hoadon_id"];
        $ncc_id = $_POST["ncc_id"];
        $eq_name = $_POST["hd_eq_name"];
        $soluong = $_POST["soluong"];
        $dongia = $_POST["hd_unit"];
        $ngaylaphoadon = $_POST["ngaylaphoadon"];
        $total = $_POST["total"];
        $hoadon_type = $_POST["hoadon_type"];
        $sql_ThemHD = "INSERT INTO hoadon (hoadon_id, staff_id, eq_name, ncc_id, soluong, hoadon_dongia, ngaylaphoadon, total, hoadon_type, hoadon_CreactedBy) VALUES ('$hoadon_id', '$hoadon_SessionID', '$eq_name', '$ncc_id','$soluong', '$dongia','$ngaylaphoadon','$total','$hoadon_type', '$hoadon_CreatedBy')";
        
        $SQL_WriteLog = "INSERT INTO record (record_by,  record_action) VALUES ('$hoadon_CreatedBy', 'Nhập hóa đơn mới')";
        
        try {
            //code...
            $result = $conn->query($sql_ThemHD);
            $result_log = $conn->query($SQL_WriteLog);
            if($result && $result_log) {
                header("Location: ../hoadon.php");
            }
        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
            echo "<h2>Không được thêm mã hóa đơn đã có </h2>";
            echo "<a href='../hoadon.php'><button>Quay lại</button></a>";
        }
    }
    mysqli_close($conn);   
?>