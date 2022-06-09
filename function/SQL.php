<?php
    function GET_ID_BY_SESSION($session_name) {
    require './connect/conn.php';
    $GET_USER_BY_ID = "SELECT id, account_name FROM account WHERE username = '$session_name'";
    $result_GET_USER_BY_ID = $conn->query($GET_USER_BY_ID);
    $row = $result_GET_USER_BY_ID->fetch_assoc();
    $hoadon_SessionID = $row["id"];
    return $hoadon_SessionID;
    }

    function GET_NAME_BY_SESSION($session_name) {
    require './connect/conn.php';
    $GET_USER_BY_ID = "SELECT id, account_name FROM account WHERE username = '$session_name'";
    $result_GET_USER_BY_ID = $conn->query($GET_USER_BY_ID);
    $row = $result_GET_USER_BY_ID->fetch_assoc();
    $hoadon_SessionName = $row["account_name"];
    return $hoadon_SessionName;
    }
?>