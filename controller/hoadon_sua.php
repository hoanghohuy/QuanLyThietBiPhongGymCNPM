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
   if(isset($_POST["SuaHoaDon"])) {
        $hoadon_id = $_POST["hd_id"];
        $hd_by = $_POST["hd_by"];
        $eq_name = $_POST["hd_eq_name"];
        $ncc_id = $_POST["hd_eq_ncc"];
        $soluong = $_POST["hd_quantity"];
        $ngaylaphoadon = $_POST["hd_createDate"];
        $total = $_POST["hd_total"];
        $hoadon_type = $_POST["hd_type"];
       $SQL_SuaHD = "UPDATE hoadon SET eq_name = '$eq_name', `ncc_id` = '$ncc_id', `soluong`='$soluong', `ngaylaphoadon`='$ngaylaphoadon', `total` = '$total', `hoadon_type`='$hoadon_type' WHERE `hoadon_id` = '$hoadon_id'";
       
       $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$session_name', 'Sửa thông tin hóa đơn')";
       
       try {
           //code...
           $result = $conn->query($SQL_SuaHD);
           $result_log = $conn->query($SQL_WriteLog);
           if($result == true  && $result_log == true) {
            header("Location: ../hoadon.php");
            }
       } catch (Exception $ex) {
           //throw $th;
           echo "Có lỗi xảy ra.";
       }
   }
   else {
       echo "K có gì cả!!! đòi hack hay gì";
   }
