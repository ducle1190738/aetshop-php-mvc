<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'EditUser':
            include "./View/EditUser.php";
            break;
        case 'UpdateUser':
            if (isset($_POST['makh'])) {
                $makh = $_POST['makh'];
                $tenkh = $_POST['tenkh'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sodienthoai = $_POST['sodienthoai'];
                $vaitro = $_POST['vaitro'];
                $ad = new admin();
                $User  = $ad->getSingleUser($makh);
                if ($User) {
                    $ad->updateUser($makh, $tenkh, $email, $diachi, $sodienthoai, $vaitro);
                    echo "<script>alert('Cập nhật người dùng thành công')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alluser"/>';
                } else {
                    echo "<script>alert('Cập nhật người dùng không thành công')</script>";
                    include "./View/EditUser.php";
                }
            }
            break;
        case 'DeleteUser':
            if (isset($_GET['id'])) {
                $makh  = $_GET['id'];
                $ad = new admin();
                $User = $ad->getSingleUser($makh);
                if ($User) {
                    $ad->deleteUser($makh);
                    echo "<script>alert('Đã xóa người dùng')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alluser"/>';
                } else {
                    echo "<script>alert('Người dùng không tồn tại')</script>";
                    include "./View/AllUser.php";
                }
            } else {
                echo "<script>alert('Xóa người dùng thất bại')</script>";
                include "./View/AllUser.php";
            }
            break;
    }
}
