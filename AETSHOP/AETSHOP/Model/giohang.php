<?php
class giohang
{
    // Phương thức thêm một sản phẩm vào giỏ hàng
    function add_item($key, $quantity)
    {
        // Xử lý trường hợp số lượng là 0
        $quantity = $quantity == 0 ? 1 : $quantity;
        $key_session = '';
        // Kiểm tra xem session giỏ hàng đã được tạo chưa
        if (isset($_SESSION['cart'])) {
            // Duyệt qua từng sản phẩm trong giỏ hàng
            foreach ($_SESSION['cart'] as $key2 => $item) {
                // Kiểm tra xem mã sản phẩm của sản phẩm hiện tại có trùng với mã sản phẩm mới thêm vào không
                if ($key == $item['mahh']) {
                    // Nếu trùng, lưu lại khóa của sản phẩm trong giỏ hàng
                    $key_session = $key2;
                }
            }

            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            if (isset($_SESSION['cart'][$key_session])) {
                // Tính toán số lượng mới bằng cách thêm vào số lượng hiện tại
                $quantitynew = $quantity + $_SESSION['cart'][$key_session]['soluong'];
                // Gọi phương thức Update để cập nhật thông tin sản phẩm
                $this->Update($key_session, $quantitynew);
            }

            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
            if ($key_session == '') {
                // Tạo một đối tượng của class hanghoa để lấy thông tin chi tiết sản phẩm
                $pros = new hanghoa();
                // Gọi phương thức của đối tượng $pros để lấy thông tin chi tiết sản phẩm dựa $key
                $pro = $pros->getProductDetails($key);
                // Lấy các thông tin chi tiết của sản phẩm
                $mahh = $pro['mahh'];
                $tenhh = $pro['tenhh'];
                $hinh  = $pro['hinh'];
                $cost = $pro['dongia'];
                $thoihan = $pro['thoihan'];
                $giamgia = $pro['giamgia'];
                // Tính toán tổng giá, dựa trên việc có giảm giá hay không
                $total  = $giamgia == 0 ? ($cost * $quantity) : ($giamgia * $quantity);

                // Tạo một mảng đại diện cho sản phẩm
                $item = array(
                    'mahh' => $mahh,
                    'hinh' => $hinh,
                    'name' => $tenhh,
                    'thoihan' => $thoihan,
                    'dongia' => $cost,
                    'giamgia' => $giamgia,
                    'soluong' => $quantity,
                    'total' => $total
                );
                // Thêm mảng mới đại diện cho sản phẩm vào mảng giỏ hàng (session 'cart')
                $_SESSION['cart'][] = $item;
            }
        }
    }

    // Phương thức tính tổng giá trị của giỏ hàng
    function getTotal()
    {
        $total  = 0;
        // Duyệt qua mỗi sản phẩm trong giỏ hàng và tính tổng giá trị
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['total'];
        }
        return $total;
    }

    // Phương thức xóa một sản phẩm khỏi giỏ hàng dựa trên khóa $key
    function Remove($key)
    {
        // Sử dụng unset để xóa phần tử có khóa $key ra khỏi mảng giỏ hàng (session 'cart')
        unset($_SESSION['cart'][$key]);
    }


    // Phương thức xóa toàn bộ sản phẩm khỏi giỏ hàng
    function deleteAll()
    {
        // Duyệt qua mỗi phần tử trong mảng giỏ hàng (session 'cart')
        foreach ($_SESSION['cart'] as $key => $item) {
            // Sử dụng unset để xóa phần tử có khóa $key ra khỏi mảng giỏ hàng (session 'cart')
            unset($_SESSION['cart'][$key]);
        }
    }

    // Phương thức trả về số lượng sản phẩm trong giỏ hàng
    function CartTotal()
    {
        // Sử dụng hàm count để đếm số lượng phần tử trong mảng giỏ hàng (session 'cart')
        return count($_SESSION['cart']);
    }

    // Phương thức cập nhật số lượng của một sản phẩm trong giỏ hàng
    function Update($key, $qty)
    {
        // Kiểm tra nếu số lượng là 0, thì xóa sản phẩm khỏi giỏ hàng
        if ($qty == 0) {
            $this->Remove($key);
        } else {
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $_SESSION['cart'][$key]['soluong'] = $qty;
            // Tính lại tổng giá trị của sản phẩm sau khi cập nhật số lượng
            $_SESSION['cart'][$key]['total'] = $_SESSION['cart'][$key]['giamgia'] > 0 ? $_SESSION['cart'][$key]['giamgia'] * $_SESSION['cart'][$key]['soluong'] : $_SESSION['cart'][$key]['dongia'] * $_SESSION['cart'][$key]['soluong'];
        }
    }
}