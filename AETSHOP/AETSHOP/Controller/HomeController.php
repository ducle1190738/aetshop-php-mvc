<?php
// HomeController.php quản lý việc định hình trang web dựa trên tham số "act" truyền vào qua URL


//Khởi tạo biến $act= "Home"
$act  = "Home";
// Kiểm tra xem có tham số "act" nào được truyền vào không
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
            // Có tham số "act", mã sẽ sử dụng câu lệnh switch để kiểm tra giá trị của "act" và bao gồm file view tương ứng
        case "About":
            include './View/About.php';
            break;
        case "Feedback":
            include './View/Feecback.php';
            break;
        default:
            include './View/' . $act . '.php'; // include './View/Home.php';
    }
} else {
    include './View/' . $act . '.php';
}
