<?php
    session_start();
    $session_name = $_SESSION['username'];
    $dateTimeNow = Date("d/m/Y H:i:s");
    require '../connect/conn.php';
    if(isset($_POST["ThemNhanVien"])) {
        $u_id = $_POST["u_id"];
        $u_fn = $_POST["u_fn"];
        $u_ln = $_POST["u_ln"];
        $u_dob = $_POST["u_dob"];
        $u_user = $_POST["u_user"];
        $u_pwd = $_POST["u_pwd"];
        $u_role = $_POST["u_role"];
        $sql_ThemNv2 = "INSERT INTO staff (staff_id, first_name, last_name, dob) VALUES ('$u_id', '$u_fn', '$u_ln', '$u_dob')";
        $sql_ThemNv = "INSERT INTO account (id, username, pwd, `role`, isActive) VALUES ('$u_id','$u_user', '$u_pwd', '$u_role', '1')";
        $SQL_WriteLog = "INSERT INTO record (record_by, record_date, record_action) VALUES ('$session_name', '$dateTimeNow','Thêm nhân viên mới')";
        $result = $conn->query($sql_ThemNv);
        $result2 = $conn->query($sql_ThemNv2);
        $result_log = $conn->query($SQL_WriteLog);

        if($result == true && $result2 && $result_log) {
        header("Location: ../nhanvien.php");
        }
        else {
            echo "Có lỗi xảy ra.";
        }
    }
    mysqli_close($conn);   
?>