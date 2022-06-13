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
   if(isset($_POST["SuaNhaCungCap"])) {
       $ncc_id = $_POST["ncc_id"];
       $ncc_name = $_POST["ncc_name"];
       $ncc_address = $_POST["ncc_address"];
       $ncc_matchday = $_POST["ncc_matchday"];
       $ncc_note = $_POST["ncc_note"];
       $SQL_SuaNCC = "UPDATE nhacungcap SET ncc_name = '$ncc_name', `ncc_address` = '$ncc_address', `ncc_matchday` = '$ncc_matchday', `ncc_note`='$ncc_note' WHERE ncc_id = '$ncc_id'";
       $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$ncc_CreatedBy', 'Sửa nhà cung cấp')";
       try {
           //code...
           $result = $conn->query($SQL_SuaNCC);
           $result_log = $conn->query($SQL_WriteLog);
           if($result == true  && $result_log == true) {
            header("Location: ../nhacungcap.php");
            }
       } catch (Exception $ex) {
           //throw $th;
           echo "Có lỗi xảy ra.";
       }
   }
?>
