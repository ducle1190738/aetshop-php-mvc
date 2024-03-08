<?php
// CartController.php xử lý các thao tác liên quan đến giỏ hàng của người dùng


// $_SESSION['cart'] nếu chưa khởi tạo nó sẽ tạo một mảng trống để lưu trữ giỏ hàng
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//Nếu có dữ liệu được gửi qua phương thức POST (mahh và soluong)
if (isset($_POST['mahh'])) {
    // Lấy thông tin sản phẩm và số lượng từ POST request
    $mahh = (int)$_POST['mahh'];
    $soluong = (int) $_POST['soluong'];

    // Tạo đối tượng giohang và thêm sản phẩm vào giỏ hàng
    $gh = new giohang();
    $gh->add_item($mahh, $soluong);
    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=cart"/>';
}
if (isset($_GET['act'])) {
    // Kiểm tra và xử lý hành động 'deleteAll'
    if ($_GET['act'] == 'deleteAll') {
        $gh = new giohang();
        $gh->deleteAll();
        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=cart"/>';
    }

    // Kiểm tra và xử lý hành động 'add-to-cart' và 'idproduct' được đặt trong session
    if ($_GET['act'] == "add-to-cart" && isset($_SESSION['idproduct'])) {
        // Lấy ID sản phẩm từ session
        $mahh = (int)$_SESSION['idproduct'];
        // Đặt số lượng sản phẩm là 1, Tạo một đối tượng giohang,Thêm sản phẩm vào giỏ hàng
        $soluong = 1;
        $gh = new giohang();
        $gh->add_item($mahh, $soluong);
        echo "<script>alert('Thêm sản phẩm vào giỏ hàng thàng công')</script>";
        // Xóa session 'idproduct' vì sản phẩm đã được thêm vào giỏ hàng
        unset($_SESSION['idproduct']);
        // Chuyển hướng trang về chi tiết sản phẩm vừa được thêm vào giỏ hàng
        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Details&id=' . $mahh . '"/>';
    }

    // Kiểm tra và xử lý hành động 'detete_item' và 'id' từ URL
    if ($_GET['act'] == "detete_item" && isset($_GET['id'])) {
        // Tạo một đối tượng giohang và xóa một sản phẩm từ giỏ hàng dựa trên ID
        $gh = new giohang();
        $gh->Remove($_GET['id']);
        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=cart"/>';
    }

    // Kiểm tra và xử lý hành động 'update_cart' từ URL
    if ($_GET['act'] == "update_cart") {
        // Lấy danh sách mới của số lượng sản phẩm từ dữ liệu gửi qua POST
        $newlist  = $_POST['newqty'];
        // Duyệt qua danh sách mới và cập nhật số lượng trong giỏ hàng
        foreach ($newlist as $key => $qty) {
            // Kiểm tra xem số lượng mới có khác với số lượng hiện tại trong giỏ hàng hay không
            if ($_SESSION['cart'][$key] != $qty) {
                // Tạo đối tượng giohang và cập nhật số lượng sản phẩm trong giỏ hàng
                $gh = new giohang();
                $gh->Update($key, $qty);
            }
        }
    }
}

// Hiển thị giao diện giỏ hàng cho người dùng
include './View/Cart.php';
