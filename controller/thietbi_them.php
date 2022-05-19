<?php 
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if(isset($_POST["ThemThietBi"])) {
        $eq_id = $_POST["eq_id"];
        $eq_name = $_POST["eq_name"];
        $eq_ncc = $_POST["eq_ncc"];
        // $eq_quantity = $_POST["eq_quantity"];
        $group_id = $_POST["group_id"];
        $eq_ngaynhaphang = $_POST["eq_ngaynhaphang"];
        $eq_ngayhethanbaohanh = $_POST["eq_ngayhethanbaohanh"];
        $eq_dongia = $_POST["eq_dongia"];
        $sql_ThemTB = "INSERT INTO equipment (eq_id, eq_name, group_id, ncc_id, eq_ngaynhaphang, eq_ngayhethanbaohanh, eq_dongia, eq_status) VALUES ('$eq_id', '$eq_name', '$group_id','$eq_ncc','$eq_ngaynhaphang', '$eq_ngayhethanbaohanh','$eq_dongia','Tốt')";
        
        $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$session_name', 'Thêm thiết bị')";
        
        try {
            //code...
            $result = $conn->query($sql_ThemTB);
            $result_log = $conn->query($SQL_WriteLog);
            if($result == true  && $result_log == true) {
                header("Location: ../thietbi.php");
                }

        } catch (Exception $ex) {
            //throw $th;
            echo "<h1>Mã thiết bị đã tồn tại</h1>";
            echo "<a href='../thietbi.php'><button>Quay lại</button></a>";
        }
    }
    mysqli_close($conn);   
?>