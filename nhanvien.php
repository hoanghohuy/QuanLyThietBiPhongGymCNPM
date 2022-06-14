<?php
session_start();
if(!isset($_SESSION['username']) || !$_SESSION['username']) {
    header("Location: index.php");
    exit();
}
require './function/SQL.php';
require './connect/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nhân Viên - Quản Lý Thiết Bị Phòng Gym</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-dumbbell"></i>
                </div>
                <div class="sidebar-brand-text mx-2">THIETBIGYM.NET</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Profiles
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-circle"></i>
                    <span>CÁ NHÂN</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cá nhân:</h6>
                        <a class="collapse-item" href="profile.php">Thông tin</a>
                        <a class="collapse-item" href="activity_log.php">Hoạt Động</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Quản lý
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-users"></i>
                    <span>THÀNH VIÊN</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chức năng:</h6>
                        <a class="collapse-item active" href="#">Nhân viên</a>
                        <a class="collapse-item" href="khachhang.php">Khách hàng</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="thietbi.php">
                    <i class="fas fa-toolbox"></i>
                    <span>THIẾT BỊ</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="nhacungcap.php">
                    <i class="fas fa-people-carry"></i>
                    <span>NHÀ CUNG CẤP</span></a>
            </li>

            <!-- Nav Item - Hóa đơn -->
            <li class="nav-item">
                <a class="nav-link" href="hoadon.php">
                    <i class="fas fa-file-invoice"></i>
                    <span>HÓA ĐƠN</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php
                                require_once './function/SQL.php';
                                echo GET_NAME_BY_SESSION($_SESSION["username"]); 
                                ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ NHÂN VIÊN</h1>
                    <p class="mb-4">Trang quản lý tất cả các Nhân viên quản lý thiết bị phòng Gym được tải lên từ Cơ sở dữ liệu</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Nhân Viên</h6>
                        </div>
                        <?php
                        if ($_SESSION["username"] == 'admin') : ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã NV</th>
                                                <th>Họ</th>
                                                <th>Tên</th>
                                                <th>Ngày sinh</th>
                                                <th>Email</th>
                                                <th>username</th>
                                                <th>Lương</th>
                                                <th>Chức vụ</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Mã NV</th>
                                                <th>Họ</th>
                                                <th>Tên</th>
                                                <th>Ngày sinh</th>
                                                <th>Email</th>
                                                <th>username</th>
                                                <th>Lương</th>
                                                <th>Chức vụ</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            require_once './connect/conn.php';
                                            $sql_user = "SELECT account.id, staff.first_name, staff.last_name, staff.dob, account.email, account.username,staff.staff_salary, account.pwd, account.role, account.isActive FROM account, staff WHERE account.id = staff.staff_id";
                                            $result = $conn->query($sql_user)
                                            ?>
                                            <?php if ($result->num_rows > 0)
                                                while ($row = $result->fetch_assoc()) : ?>

                                                <tr>
                                                    <td><?= $row["id"] ?></td>
                                                    <td><?= $row["first_name"] ?></td>
                                                    <td><?= $row["last_name"] ?></td>
                                                    <td><?= $row["dob"] ?></td>
                                                    <td><?= $row["email"] ?></td>
                                                    <td><?= $row["username"] ?></td>
                                                    <td><?= $row["staff_salary"] ?>đ</td>
                                                    <td><?= ($row["role"] == 0 ? "Admin" : "Nhân viên") ?></td>
                                                    <td class="<?= ($row["isActive"] == 1 ? "btn-success" : "btn-warning") ?>"><?= ($row["isActive"] == 1 ? "Hoạt động" : "Bị Khóa") ?></td>
                                                    <td>
                                                        <button type='button' class='btn btn-primary btn-suanv' data-toggle='modal' data-target='#SuaNV_Modal' data-id="<?php echo $row["id"] ?>"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger btn-xoanv" data-toggle="modal" data-target='#DeteteNV_Modal' data-id="<?php echo $row["id"] ?>"><i class='fas fa-trash'></i></button>
                                                    </td>
                                                </tr>
                                            <?php endwhile ?>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary" data-toggle='modal' data-target='#AddUserModal'">Thêm nhân viên mới</button>
                            </div>

                        <?php else : ?>
                            <h6 class='m-0 font-weight-bold text-primary'>Bạn không có quyền thực hiện hành động này!</h6>
                        <?php endif ?>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class=" sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy;Quản Lý Thiết Bị Phòng Gym 2021</span>
                            </div>
                        </div>
                        </footer>
                        <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Đăng xuất Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận Đăng xuất?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên hiện tại của mình.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="./controller/log_out.php">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- AddUserModal -->
            <div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên mới</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="./controller/nhanvien_them.php">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Mã nhân viên:</label>
                                    <input type="text" class="form-control" name="u_id" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Họ và tên đệm:</label>
                                    <input type="text" class="form-control" name="u_fn" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Tên:</label>
                                    <input type="text" class="form-control" name="u_ln" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Ngày sinh (yyyy/mm/dd):</label>
                                    <input type="text" class="form-control" name="u_dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" name="u_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" name="u_user" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Password:</label>
                                    <input type="text" class="form-control" name="u_pwd" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Lương:</label>
                                    <input type="text" class="form-control" name="u_salary" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Chức vụ:</label>
                                    <select class="form-control" name="u_role">
                                        <option value="1" selected>Nhân viên</option>
                                        <option value="0">Admin</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="ThemNhanVien">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Sua nhan vien -->
            <div class="modal fade" id="SuaNV_Modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa nhân viên</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="./controller/nhanvien_sua_controller.php">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Mã nhân viên:</label>
                                    <input readonly type="text" class="form-control" name="u_id" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Họ và tên đệm:</label>
                                    <input type="text" class="form-control" name="u_fn" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Tên:</label>
                                    <input type="text" class="form-control" name="u_ln" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Ngày sinh (yyyy/mm/dd):</label>
                                    <input type="text" class="form-control" name="u_dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="text" class="form-control" name="u_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" name="u_user" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Password:</label>
                                    <input type="text" class="form-control" name="u_pwd" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Lương:</label>
                                    <input type="text" class="form-control" name="u_salary" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Chức vụ:</label>
                                    <select class="form-control" name="u_role">
                                        <option value="1" selected>Nhân viên</option>
                                        <option value="0">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Trạng thái:</label>
                                    <select class="form-control" name="u_isActive">
                                        <option value="1" selected>Hoạt động</option>
                                        <option value="0">Bị khóa</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="SuaNhanVien">Lưu lại</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Xóa nhân viên -->
            <div class="modal fade" id="DeteteNV_Modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa nhân viên</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="./controller/nhanvien_xoa.php">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Mã nhân viên:</label>
                                    <input type="text" class="form-control" name="u_id" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Họ và tên đệm:</label>
                                    <input type="text" class="form-control" name="u_fn" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Tên:</label>
                                    <input type="text" class="form-control" name="u_ln" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Ngày sinh (yyyy/mm/dd):</label>
                                    <input type="text" class="form-control" name="u_dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" name="u_user" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Lương:</label>
                                    <input type="text" class="form-control" name="u_salary" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Chức vụ:</label>
                                    <select class="form-control" name="u_role">
                                        <option value="1" selected>Nhân viên</option>
                                        <option value="0">Admin</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="XoaNhanVien">Xóa</button>
                                </div>
                            </form>
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
            <script src="js/custom.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/datatables-demo.js"></script>

</body>

</html>