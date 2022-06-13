<?php 

function GuiMatKhauMail($email, $matkhau) {
require "./PHPMailer-master/src/PHPMailer.php"; 
    require "./PHPMailer-master/src/SMTP.php"; 
    require './PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'webbanxemay.hoangtuannga@gmail.com'; // SMTP username
        $mail->Password = 'rhkbtqpsuuscdngo';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('webbanxemay.hoangtuannga@gmail.com', 'ThietBiGym.Net' ); 
        $mail->addAddress($email); 
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'YÊU CẦU GỬI LẠI MẬT KHẨU';
        $noidungthu = "<p>Khi bạn nhận đc thư này, đồng nghĩa bạn hay ai đó đã yêu cầu cấp lại mật khẩu từ ThietBiGym.Net</p>
        <p>Tuyệt đối không cung cấp mật khẩu cho bất kì ai</p>
        Mật khẩu mới của bạn là: {$matkhau}";
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        // gui mail thành công
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }

    }

?>