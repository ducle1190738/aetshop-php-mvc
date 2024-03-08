<?php
// SearchController.php kiểm tra xem có tham số "Search" được truyền qua URL không


// Kiểm tra xem tham số "Search" được truyền qua URL không và đồng thời kiểm tra xem giá trị của nó có khác rỗng không
if (isset($_GET['Search']) && $_GET['Search'] != '') {
    include './View/ProductSearch.php';
} else {
    include './View/Shop.php';
}
