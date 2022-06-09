<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    if (isset($_POST["SuaNhanVien"])) {
    $u_id = $_POST['u_id'];
    $u_fn = $_POST['u_fn'];
    $u_ln = $_POST['u_ln'];
    $u_dob = $_POST['u_dob'];
    $u_user = $_POST['u_user'];
    $u_pwd = $_POST['u_pwd'];
    $u_role = $_POST['u_role'];
    $u_isActive = $_POST['u_isActive'];
    require '../connect/conn.php';
    $sql_Sua_User = "UPDATE account as a, staff as s SET s.first_name = '$u_fn', s.last_name = '$u_ln', s.dob = '$u_dob', a.username = '$u_user', a.pwd = md5($u_pwd), a.role = '$u_role', a.isActive = '$u_isActive' WHERE a.id = s.staff_id AND id ='$u_id'";
    // write log
    $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$session_name', 'Sửa nhân viên')";
        try {
            //code...
            $result = $conn->query($sql_Sua_User);
            $result_log = $conn->query($SQL_WriteLog);
            if($result == true && $result_log ) {
                header("Location: ../nhanvien.php");
                }
        } catch (\Throwable $th) {
            echo "Có lỗi xảy ra.";
        }
   }
?>