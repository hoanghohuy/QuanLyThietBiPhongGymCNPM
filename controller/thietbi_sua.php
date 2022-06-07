<?php
   session_start();
   $session_name = $_SESSION['username'];
   $dateTimeNow = Date("d/m/Y H:i:s"); 
   require '../connect/conn.php';
   if(isset($_POST["SuaThietBi"])) {
       $eq_id = $_POST["eq_id"];
       $eq_name = $_POST["eq_name"];
       $eq_ncc = $_POST["eq_ncc"];
       $group_id = $_POST["group_id"];
    // $eq_quantity = $_POST["eq_quantity"];
       $eq_ngaynhaphang = $_POST["eq_ngaynhaphang"];
       $eq_ngayhethanbaohanh = $_POST["eq_ngayhethanbaohanh"];
       $eq_dongia = $_POST["eq_dongia"];
       $eq_status = $_POST["eq_status"];

        $eq_image = $_FILES['eq_image'];
        $eq_imageName = $_FILES['eq_image']['name'];
        $eq_imageTmpName = $_FILES['eq_image']['tmp_name'];
        $eq_imageError = $_FILES['eq_image']['error'];
        $eq_imageSize = $_FILES['eq_image']['size'];
        $eq_imageExt = explode('.',$eq_imageName);
        $eq_imageActualExt = strtolower(end($eq_imageExt));
        $eq_imageAllowed = array('jpeg','jpg', 'png');
        if (in_array($eq_imageActualExt, $eq_imageAllowed)) {
            # code...
            if ($eq_imageError === 0) {
                # code...
                if ($eq_imageSize < 500000) {
                    # code...
                    $eq_imageNameNew = uniqid('',true).".".$eq_imageActualExt;
                    $eq_imageDestination = '../assets/thietbi/'.$eq_imageNameNew;
                    echo $eq_imageNameNew;
                    move_uploaded_file($eq_imageTmpName, $eq_imageDestination);
                    echo "Upload thành công";
                } else {
                    # code...
                    echo "Kích thước file quá lớn, vui lòng chọn file có dung lượng bé hơn 50MB";
                }
                
            } else {
                # code...
                echo "Không thể upload ảnh!";
            }
            
        } else {
            # code...
            echo "Vui lòng chọn loại file thích hợp!";
        }
        if($eq_imageNameNew == '') {
        $SQL_SuaEQ = "UPDATE equipment SET eq_name = '$eq_name', group_id = '$group_id', `ncc_id` = '$eq_ncc', `eq_ngaynhaphang`='$eq_ngaynhaphang', `eq_ngayhethanbaohanh`='$eq_ngayhethanbaohanh', `eq_dongia`='$eq_dongia', `eq_status` = '$eq_status' WHERE `eq_id` = '$eq_id'";
        }
        else {
        $SQL_SuaEQ = "UPDATE equipment SET eq_name = '$eq_name', group_id = '$group_id', `ncc_id` = '$eq_ncc', `eq_ngaynhaphang`='$eq_ngaynhaphang', `eq_ngayhethanbaohanh`='$eq_ngayhethanbaohanh', `eq_dongia`='$eq_dongia', `eq_status` = '$eq_status', `eq_image` = '$eq_imageNameNew' WHERE `eq_id` = '$eq_id'";
        }
       $SQL_WriteLog = "INSERT INTO record (record_by, record_action) VALUES ('$session_name', 'Sửa thông tin thiết bị')";
       
       try {
           //code...
           $result = $conn->query($SQL_SuaEQ);
           $result_log = $conn->query($SQL_WriteLog);
           if($result == true  && $result_log == true) {
            header("Location: ../thietbi.php");
            }
       } catch (Exception $ex) {
           //throw $th;
           echo "Có lỗi xảy ra.";
       }
   }
   else {
       echo "Có lỗi xảy ra, vui lòng thử lại sau!!!";
   }
?>
