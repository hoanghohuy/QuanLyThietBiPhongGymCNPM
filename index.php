<?php
session_start();
if (isset($_POST["login"])) {
    // khai bao mang chua loi.
    $api_url     = 'https://www.google.com/recaptcha/api/siteverify';
    $site_key    = '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI';
    $secret_key  = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
    $error = [];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty(trim($_POST['username']))) {
        $errors['username']['required'] = 'Tên đăng nhập không được bỏ trống!';
    }
    // kiem tra da nhap vao password chua
    if (empty(trim($_POST['password']))) {
        $errors['password']['required'] = 'Mật khẩu không được bỏ trống!';
    }

    // kiem tra da xac minh captcha chua
    $site_key_post = $_POST['g-recaptcha-response'];
    if (empty($site_key_post)) {
        $errors['recaptcha']['required'] = 'Vui lòng xác minh mã Captcha!';
    }

    if (empty($errors)) {
        require_once './connect/conn.php';
        $username = $_POST['username'];
        $password = $_POST['password'];

        // cau query
        $sql_login = "SELECT `username`, `pwd` FROM `account` WHERE `username` = '$username' and `pwd` = md5($password) and `isActive` = '1'";
        $result = mysqli_query($conn, $sql_login);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            header("Location: ./dashboard.php");
            $_SESSION["username"] = $username;
        } else
            $errors['login']['required'] = 'Thông tin tài khoản, mật khẩu không chính xác hoặc đang bị khóa!';
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

    <title>Login Quản Lý Thiết Bị Gym</title>
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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Quản Lý Thiết Bị Phòng Gym - Login</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" placeholder="Tên đăng nhập" class="form-control form-control-user" value="<?php echo (!empty($_POST['username'])) ? $_POST['username'] : false; ?>">
                                            <?php
                                            if (!empty($errors['username']['required'])) {
                                                echo "<p class='text-danger' style='font-size: 15px; text-align: center'>" . $errors['username']['required'] . "</p>";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Mật khẩu" value="<?php echo (!empty($_POST['password'])) ? $_POST['password'] : false; ?>">
                                            <?php
                                            if (!empty($errors['password']['required'])) {
                                                echo "<p class='text-danger' style='font-size: 15px; text-align: center'>" . $errors['password']['required'] . "</p>";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ghi nhớ</label>
                                            </div>
                                        </div>
                                        <div class="g-recaptcha" style="padding-bottom: 1rem; margin-left: 20px" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                                        <?php
                                        if (!empty($errors['recaptcha']['required'])) {
                                            echo "<span style='color: red; padding-bottom: 1rem; display: block; text-align: center'>" 
                                            . $errors['recaptcha']['required'] . "</span>";
                                        } ?>
                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block" name="login"></input>
                                        <br />
                                        <?php
                                        if (!empty($errors['login']['required'])) {
                                            echo "<p class='text-danger' style='font-size: 15px; text-align: center'>" . $errors['login']['required'] . "</p>";
                                        }
                                        ?>
                                        <!-- <hr>
                                        <a href="dashboard.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="dashboard.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
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