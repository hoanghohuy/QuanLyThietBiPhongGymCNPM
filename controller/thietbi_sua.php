<?php
   session_start();
   $session_name = $_SESSION['username'];
   $dateTimeNow = Date("d/m/Y H:i:s"); 
   require '../connect/conn.php';
   if(isset($_POST["SuaThietBi"])) {
       $eq_id = $_POST["eq_id"];
       $eq_name = $_POST["eq_name"];
       $eq_ncc = $_POST["eq_ncc"];
       $eq_quantity = $_POST["eq_quantity"];
       $eq_ngaynhaphang = $_POST["eq_ngaynhaphang"];
       $eq_ngayhethanbaohanh = $_POST["eq_ngayhethanbaohanh"];
       $eq_dongia = $_POST["eq_dongia"];
       $SQL_SuaEQ = "UPDATE equipment SET eq_name = '$eq_name', `ncc_id` = '$eq_ncc', `eq_quantity` = '$eq_quantity', `eq_ngaynhaphang`='$eq_ngaynhaphang', `eq_ngayhethanbaohanh`='$eq_ngayhethanbaohanh', `eq_dongia`='$eq_dongia' WHERE eq_id = '$eq_id'";
       $result = $conn->query($SQL_SuaEQ);
       $SQL_WriteLog = "INSERT INTO record (record_by, record_date, record_action) VALUES ('$session_name', '$dateTimeNow','Sửa thông tin thiết bị thành $eq_name')";
       $result_log = $conn->query($SQL_WriteLog);
       if($result == true  && $result_log == true) {
       header("Location: ../thietbi.php");
       }
       else {
           echo "Có lỗi xảy ra.";
       }
   }
   else {
       echo "K có gì cả!!! đòi hack hay gì";
   }
?>
