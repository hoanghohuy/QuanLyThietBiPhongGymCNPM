<?php
$api_url     = 'https://www.google.com/recaptcha/api/siteverify';
$site_key    = '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI';
$secret_key  = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
session_start();
if (isset($_POST["forgot-pass"])) {
    //khai báo mảng error chứa lỗi
    $errors = [];
    $email = $_POST["email"];
    // kiem tra da nhap vao email chua
    if (empty(trim($_POST['email']))) {
        $errors['email']['required'] = 'Vui lòng nhập vào email!';
    }
    $site_key_post    = $_POST['g-recaptcha-response'];
    if (empty($site_key_post)) {
        $errors['recaptcha']['required'] = 'Vui lòng xác minh mã Captcha!';
    }
    //lấy IP của khach
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $remoteip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $remoteip = $_SERVER['REMOTE_ADDR'];
    }

    //tạo link kết nối
    $api_url = $api_url . '?secret=' . $secret_key . '&response=' . $site_key_post . '&remoteip=' . $remoteip;
    //lấy kết quả trả về từ google
    $response = file_get_contents($api_url);
    //dữ liệu trả về dạng json
    $response = json_decode($response);
    if ($response->success == true) {
        if (empty($errors)) {
            require_once './connect/conn.php';
            // chống SQL Injection = bằng hàm lọc real_escape_string...
            // chống XSS = bằng hàm lọc htmlspecialchars...
            $email = htmlspecialchars($conn->real_escape_string($_POST["email"]), ENT_QUOTES);
            $result = mysqli_query($conn, "SELECT username FROM `account` WHERE `EMAIL` = '$email'");
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $matkhau = rand(0, 999999);
                echo $matkhau;
                // ma hoa mat khau bang ham ma hoa md5
                try {
                    //code...
                    $result = mysqli_query($conn, "UPDATE account SET `pwd` = md5($matkhau) WHERE `EMAIL` = '$email'");
                    require './function/forgotPass_Method.php';
                      GuiMatKhauMail($email, $matkhau);
                    $errors['email']['isSuccess'] = 'Thành công! Mật khẩu mới đã gửi về Email !';
                } catch (Exception $ex) {
                    //throw $th;
                    $errors['email']['isSuccess'] = 'Lỗi không gửi được Email !';
                }
                
                
            } else
                $errors['email']['isAvailable'] = 'Email không tồn tại!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản Lý Thiết Bị Gym - Forgot Password</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Quản Lý Thiết Bị Phòng Gym - Quên Mật Khẩu?</h1>
                                        <p class="mb-4">
                                            Chỉ cần nhập địa chỉ email của bạn vào bên dưới và chúng tôi sẽ gửi cho bạn một mật khẩu mới trong Email để đặt lại mật khẩu của bạn!
                                        </p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" 
                                            aria-describedby="emailHelp" 
                                            placeholder="Enter Email Address..."
                                            value="<?php echo (!empty($_POST['username']))?$_POST['username']:false; ?>"
                                            >
                                        </div>
                                        <?php
                                        if (!empty($errors['email']['required'])) {
                                            echo "<span style='color: red; display: block; text-align: center'>" . $errors['email']['required'] . "</span>";
                                        }
                                        ?>
                                        <div class="g-recaptcha" style="padding-bottom: 1rem; margin-left: 20px" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                                        <?php
                                        if (!empty($errors['recaptcha']['required'])) {
                                            echo "<span style='color: red; padding-bottom: 1rem; display: block; text-align: center'>" 
                                            . $errors['recaptcha']['required'] . "</span>";
                                        } ?>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="forgot-pass" value="Quên mật khẩu" />
                                        <?php
                                        if (!empty($errors['email']['isSuccess'])) {
                                            echo "<span style='color: red; padding-bottom: 1rem; display: block; text-align: center'>" 
                                            . $errors['email']['isSuccess'] . "</span>";
                                        } ?>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="index.php">Đã có tài khoản, Đăng nhập ngay!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>