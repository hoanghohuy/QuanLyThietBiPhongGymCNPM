<?php
require_once './connect/conn.php';
session_start();
require './function/SQL.php';
require './connect/conn.php';
$session_name = $_SESSION['username'];
$GET_USER_BY_ID = "SELECT id, account_name FROM account WHERE username = '$session_name'";
$result_GET_USER_BY_ID = $conn->query($GET_USER_BY_ID);
$row = $result_GET_USER_BY_ID->fetch_assoc();
$hoadon_UserID = $row["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hóa Đơn - Quản Lý Thiết Bị Phòng Gym</title>

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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-users"></i>
                    <span>THÀNH VIÊN</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chức năng:</h6>
                        <a class="collapse-item" href="nhanvien.php">Nhân viên</a>
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
            <li class="nav-item active">
                <a class="nav-link" href="#">
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
                    <h1 class="h3 mb-2 text-gray-800">THỐNG KÊ HÓA ĐƠN</h1>
                    <p class="mb-4">Trang quản lý tất cả hóa đơn liên quan thiết bị phòng Gym</p>
                    <p style="color: red" class="mb-4">Lưu ý: Nhân viên chỉ được xem các hóa đơn do mình tạo ra.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Hóa Đơn</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <th>Người lập phiếu</th>
                                            <th>Thiết bị</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Ngày lập phiếu</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Loại hóa đơn</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <th>Người lập phiếu</th>
                                            <th>Thiết bị</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Ngày lập phiếu</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Loại hóa đơn</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if($session_name == 'admin') {
                                            $Sql_Hoadon = "SELECT * FROM `hoadon`";
                                        }
                                        else {
                                        $Sql_Hoadon ="SELECT * FROM `hoadon` WHERE staff_id = '$hoadon_UserID'";
                                        }
                                        $result = $conn->query($Sql_Hoadon);
                                        ?>
                                        <?php if ($result->num_rows > 0)
                                            while ($row = $result->fetch_assoc()) : ?>
                                            <tr>
                                                <td><?= $row['hoadon_id'] ?></td>
                                                <td><?= $row['hoadon_CreactedBy'] ?></td>
                                                <td><?= $row['eq_name'] ?></td>
                                                <td><?php
                                                $ncc_id = $row['ncc_id'];
                                                $GET_NCC_NAME_BY_NCC_ID = "SELECT ncc_name FROM nhacungcap WHERE ncc_id ='$ncc_id'";
                                                $result_GET_NCC_NAME_BY_NCC_ID = $conn->query($GET_NCC_NAME_BY_NCC_ID);
                                                $row2 = $result_GET_NCC_NAME_BY_NCC_ID->fetch_assoc();
                                                echo $row2["ncc_name"]
                                                 
                                                ?></td>
                                                <td><?= $row['ngaylaphoadon'] ?></td>
                                                <td><?= $row['soluong'] ?></td>
                                                <td><?= $row['total'] ?></td>
                                                <td><?= $row['hoadon_type'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-showhd" data-toggle="modal" data-target="#DetailHoaDon" data-id="<?php echo $row['hoadon_id'] ?>" ><i class="fas fa-eye"></i></button>
                                                    <button type="button" class="btn btn-primary btn-edithd" data-toggle="modal" data-target="#EditHoaDon" data-id="<?php echo $row['hoadon_id']?>"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-xoahd" data-toggle="modal" data-target="#DeleteHoaDon" data-id="<?php echo $row['hoadon_id']?>"><i class='fas fa-trash'></i></i></button>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle='modal' data-target="#AddHoaDon">Nhập hóa đơn mới</button>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Quản Lý Thiết Bị Phòng Gym 2021</span>
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

    <!-- MODAL THÊM HÓA ĐƠN MỚI -->
    <div class="modal fade" id="AddHoaDon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm hóa đơn mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="./controller/hoadon_them.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mã hóa đơn:</label>
                            <input type="text" class="form-control" name="hoadon_id" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên thiết bị:</label>
                            <input type="text" class="form-control" name="hd_eq_name" required>
                        </div>
                        <!-- // nha cung cap -->
                        <div class="form-group">
                            <label>Tên nhà cung cấp</label>
                            <select class="form-control" name="ncc_id">
                                <?php
                                $sql = "SELECT ncc_id, ncc_name from nhacungcap";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Load dữ liệu lên website
                                    while ($row = $result->fetch_assoc()) {
                                        echo  "<option value='" . $row["ncc_id"] . "'>" . $row["ncc_name"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Số lượng:</label>
                            <input type="text" class="form-control" name="soluong" required>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Ngày lập hóa đơn:</label>
                            <input type="text" class="form-control" name="ngaylaphoadon" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Thành tiền:</label>
                            <input readonly type="text" class="form-control" name="total" required placeholder="đ">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Loại hóa đơn:</label>
                            <select class="form-control" name="hoadon_type">
                                <option value="Nhập hàng"> Nhập hàng </option>
                                <option value="Xuất hàng"> Xuất hàng </option>
                                <option value="Trả hàng"> Trả hàng </option>
                                <option value="Gửi bảo hành"> Gửi bảo hành </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="AddHoaDon">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL SỬA HÓA ĐƠN -->
    <div class="modal fade" id="EditHoaDon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="./controller/hoadon_sua.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mã hóa đơn:</label>
                            <input readonly type="text" class="form-control" name="hd_id" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Người lập hóa đơn:</label>
                            <input type="text" class="form-control" name="hd_by" readonly>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên thiết bị:</label>
                            <input type="text" class="form-control" name="hd_eq_name" required>
                        </div>
                        <!-- // nha cung cap -->
                        <div class="form-group">
                            <label>Tên nhà cung cấp</label>
                            <select class="form-control" name="hd_eq_ncc">
                                <?php
                                $sql = "SELECT ncc_id, ncc_name from nhacungcap";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Load dữ liệu lên website
                                    while ($row = $result->fetch_assoc()) {
                                        echo            "<option value='" . $row["ncc_id"] . "'>" . $row["ncc_name"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Số lượng:</label>
                            <input type="text" class="form-control" name="hd_quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Ngày lập:</label>
                            <input type="text" class="form-control" name="hd_createDate" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Thành tiền:</label>
                            <input type="text" class="form-control" name="hd_total" required placeholder="đ">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Loại hóa đơn:</label>
                            <select class="form-control" name="hd_type">
                                <option value="Nhập hàng"> Nhập hàng </option>
                                <option value="Xuất hàng"> Xuất hàng </option>
                                <option value="Trả hàng"> Trả hàng </option>
                                <option value="Gửi bảo hành"> Gửi bảo hành </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="SuaHoaDon">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL XEM HÓA ĐƠN -->
    <div class="modal fade" id="DetailHoaDon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xem thông tin hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="./controller/hoadon_in.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mã hóa đơn:</label>
                            <input readonly type="text" class="form-control" name="hd_id" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Người lập hóa đơn:</label>
                            <input readonly type="text" class="form-control" name="hd_by" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên thiết bị:</label>
                            <input readonly type="text" class="form-control" name="hd_eq_name" required>
                        </div>
                        <!-- // nha cung cap -->
                        <div class="form-group">
                            <label>Tên nhà cung cấp</label>
                            <input readonly type="text" class="form-control" name="hd_eq_ncc" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Số lượng:</label>
                            <input readonly type="text" class="form-control" name="hd_quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Ngày lập:</label>
                            <input readonly type="text" class="form-control" name="hd_createDate" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Thành tiền:</label>
                            <input readonly type="text" class="form-control" name="hd_total" required placeholder="đ">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Loại hóa đơn:</label>
                            <select readonly class="form-control" name="hd_type">
                                <option value="Nhập hàng"> Nhập hàng </option>
                                <option value="Xuất hàng"> Xuất hàng </option>
                                <option value="Trả hàng"> Trả hàng </option>
                                <option value="Gửi bảo hành"> Gửi bảo hành </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="InHoaDon">In Hóa Đơn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL XÓA HÓA ĐƠN -->
    <div class="modal fade" id="DeleteHoaDon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="./controller/hoadon_xoa.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mã hóa đơn:</label>
                            <input readonly type="text" class="form-control" name="hd_id" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Người lập hóa đơn:</label>
                            <input readonly type="text" class="form-control" name="hd_by" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên thiết bị:</label>
                            <input readonly type="text" class="form-control" name="hd_eq_name" required>
                        </div>
                        <!-- // nha cung cap -->
                        <div class="form-group">
                            <label>Tên nhà cung cấp</label>
                            <select readonly class="form-control" name="hd_eq_ncc">
                                <?php
                                $sql = "SELECT ncc_id, ncc_name from nhacungcap";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Load dữ liệu lên website
                                    while ($row = $result->fetch_assoc()) {
                                        echo            "<option value='" . $row["ncc_id"] . "'>" . $row["ncc_name"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Số lượng:</label>
                            <input readonly type="text" class="form-control" name="hd_quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Ngày lập:</label>
                            <input readonly type="text" class="form-control" name="hd_createDate" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Thành tiền:</label>
                            <input readonly type="text" class="form-control" name="hd_total" required placeholder="đ">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Loại hóa đơn:</label>
                            <select readonly class="form-control" name="hd_type">
                                <option value="Nhập hàng"> Nhập hàng </option>
                                <option value="Xuất hàng"> Xuất hàng </option>
                                <option value="Trả hàng"> Trả hàng </option>
                                <option value="Gửi bảo hành"> Gửi bảo hành </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="XoaHoaDon">Xóa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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