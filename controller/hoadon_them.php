<?php 
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if(isset($_POST["AddHoaDon"])) {
        $hoadon_id = $_POST["hoadon_id"];
        $eq_id = $_POST["eq_id"];
        $ncc_id = $_POST["ncc_id"];
        $soluong = $_POST["soluong"];
        $ngaylaphoadon = $_POST["ngaylaphoadon"];
        $total = $_POST["total"];
        $hoadon_type = $_POST["hoadon_type"];
        $sql_ThemHD = "INSERT INTO hoadon (hoadon_id, staff_id, eq_id, ncc_id, soluong, ngaylaphoadon, total, hoadon_type) VALUES ('$hoadon_id', '1','$eq_id','$ncc_id','$soluong', '$ngaylaphoadon','$total','$hoadon_type')";
        
        $SQL_WriteLog = "INSERT INTO record (record_by,  record_action) VALUES ('$session_name', 'Nhập hóa đơn mới')";
        
        try {
            //code...
            $result = $conn->query($sql_ThemHD);
            $result_log = $conn->query($SQL_WriteLog);
            if($result && $result_log) {
                header("Location: ../hoadon.php");
            }
        } catch (Exception $ex) {
            //throw $th;
            echo "<h1>Mã hóa đơn đã tồn tại</h1>";
            echo "<a href='../hoadon.php'><button>Quay lại</button></a>";
        }
    }
    mysqli_close($conn);   
?>