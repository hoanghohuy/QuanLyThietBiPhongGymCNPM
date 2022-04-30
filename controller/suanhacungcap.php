<?php 
   session_start();
   $session_name = $_SESSION['username'];
   $dateTimeNow = Date("d/m/Y H:i:s");
   require '../connect/conn.php';
   if(isset($_POST["SuaNhaCungCap"])) {
       $ncc_id = $_POST["ncc_id"];
       $ncc_name = $_POST["ncc_name"];
       $ncc_address = $_POST["ncc_address"];
       $ncc_matchday = $_POST["ncc_matchday"];
       $ncc_note = $_POST["ncc_note"];
       $SQL_SuaNCC = "UPDATE nhacungcap SET ncc_name = '$ncc_name', `ncc_address` = '$ncc_address', `ncc_matchday` = '$ncc_matchday', `ncc_note`='$ncc_note' WHERE ncc_id = '$ncc_id'";
       $result = $conn->query($SQL_SuaNCC);
       $SQL_WriteLog = "INSERT INTO record (record_by, record_date, record_action) VALUES ('$session_name', '$dateTimeNow','Sửa nhà cung cấp')";
       $result_log = $conn->query($SQL_WriteLog);
       if($result == true  && $result_log == true) {
       header("Location: ../nhacungcap.php");
       }
       else {
           echo "Có lỗi xảy ra.";
       }
   }
   else {
       echo "K có gì cả!!! đòi hack hay gì";
   }
?>
