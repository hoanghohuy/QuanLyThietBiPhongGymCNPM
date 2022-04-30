<?php 
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if(isset($_POST["ThemThietBi"])) {
        $eq_id = $_POST["eq_id"];
        $eq_name = $_POST["eq_name"];
        $eq_ncc = $_POST["eq_ncc"];
        $eq_quantity = $_POST["eq_quantity"];
        $eq_ngaynhaphang = $_POST["eq_ngaynhaphang"];
        $eq_ngayhethanbaohanh = $_POST["eq_ngayhethanbaohanh"];
        $eq_dongia = $_POST["eq_dongia"];
        $sql_ThemTB = "INSERT INTO equipment (eq_id, eq_name, ncc_id, eq_quantity, eq_ngaynhaphang, eq_ngayhethanbaohanh, eq_dongia, eq_status) VALUES ('NULL', '$eq_name','$eq_ncc','$eq_quantity','$eq_ngaynhaphang', '$eq_ngayhethanbaohanh','$eq_dongia','Tốt')";
        $result = $conn->query($sql_ThemTB);
        $SQL_WriteLog = "INSERT INTO record (record_by, record_date, record_action) VALUES ('$session_name', '$dateTimeNow','Thêm thiết bị')";
        $result_log = $conn->query($SQL_WriteLog);
        if($result == true  && $result_log == true) {
        header("Location: ../thietbi.php");
        }
        else {
            echo "Có lỗi xảy ra.";
        }
    }
    mysqli_close($conn);   
?>