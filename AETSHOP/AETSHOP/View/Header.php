<script>
document.addEventListener("DOMContentLoaded", function() {
    // Cập nhật nội dung của thẻ <span> khi trang được tải lại
    var spanElement = document.getElementById("slsp");
    var cartTotal = <?php echo isset($_SESSION['cart']) ? $CartTotal : 0; ?>;
    spanElement.innerText = cartTotal;
});
</script>
<div id="preloader"></div>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a class="emailtop" href="mailto:contact@example.com">aet@gmail.com</a>
            <i class="bi bi-phone-fill phone-icon"></i> 0343157340
        </div>
        <div class="social-links d-none d-md-block">
            <a href="https://twitter.com/?lang=vi" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/?locale=vi_VN" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</section>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.php?action=Home"><img src="././assets/img/logo-w.png" alt="logo"
                    class="pb-1" width="" class="img-fluid"> AETSHOP</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="./assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto <?php echo isset($_GET['action']) && $_GET['action'] == 'Home' && !isset($_GET['act']) ? 'active' : ''; ?>
                                                <?php if (!isset($_GET['action'])) {
                                                    echo 'active';
                                                } ?> " href="index.php?action=Home">
                        Trang chủ
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto menu <?php echo isset($_GET['action']) && $_GET['action'] == 'Home' && isset($_GET['act']) && $_GET['act'] == 'About' ? 'active' : ''; ?> "
                        href="index.php?action=Home&act=About">
                        Giới thiệu
                    </a>
                </li>
                <li class="dropdown menu">
                    <a href="index.php?action=Shop"
                        class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' ? 'active' : ''; ?>">
                        <span> Danh mục </span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="text-left ">
                        <li>
                            <a href="index.php?action=Shop&type=Entertainment"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Entertainment' ? 'active' : ''; ?>">
                                Giải trí</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Work"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Work' ? 'active' : ''; ?>">
                                Làm việc</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Learn"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Learn' ? 'active' : ''; ?>">
                                Học tập</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Game Steam"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Game Steam' ? 'active' : ''; ?>">
                                Steam</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Origin"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Origin' ? 'active' : ''; ?>">
                                Origin</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Windows"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Windows' ? 'active' : ''; ?>">
                                Windows, Office</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Drive"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Drive' ? 'active' : ''; ?>">

                                Google Drive</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Wallet"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Wallet' ? 'active' : ''; ?>">

                                Wallet
                            </a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=iTunes"
                                class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'iTunes' ? 'active' : ''; ?>">

                                iTunes, Xbox
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link scrollto menu <?php echo isset($_GET['action']) && $_GET['action'] == 'Home' && isset($_GET['act']) && $_GET['act'] == 'Feedback' ? 'active' : ''; ?>"
                        href="index.php?action=Home&act=Feedback">
                        <span class="text-center">Phản hồi</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION['email']) && isset($_SESSION['makh'])) {
                ?>
                <li>
                    <!-- Warning -->
                    <div class="ml-4 btn-group p-2">
                        <a type="button" href="index.php?action=User&act=profile" class="btn btn-warning pr-3 pl-3"><i
                                class="bi bi-person-circle pr-2" style="font-size:16px;"></i>
                            <?php echo  $_SESSION['tenkh'] ?></a>
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu w-100" style="background-color: #2579f2;">
                            <a class="dropdown-item float-start pl-3" href="index.php?action=User&act=topup">
                                <span><i class="bi bi-cash-coin"></i> Số dư</span>
                                <span class="ml-0 pl-0 pr-3">
                                    <br>
                                    <?php echo number_format($_SESSION['sodu']) ?>đ <i class="bi bi-plus-circle-dotted"
                                        style="font-weight: bold; font-size: 16px"></i>
                                </span>
                            </a>
                            <a class="dropdown-item pl-3" href="index.php?action=User&act=wishlist"><span><i
                                        class="bi bi-bookmark-heart" style="font-weight: bold; font-size: 16px"></i>
                                    Danh sách yêu thích </span></a>
                            <a class="dropdown-item pl-3" href="index.php?action=User&act=PurchaseHistory"><span><i
                                        class="bi bi-list-check" style="font-weight: bold; font-size: 16px"></i>
                                    Lịch sử thanh toán </span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-left pl-3" href="index.php?action=User&act=logout"><span><i
                                        class="bi bi-box-arrow-right" style="font-weight: bold; font-size: 16px"></i>
                                    Đăng xuất </span></a>
                            <?php
                                if ($_SESSION['vaitro'] != 0) :
                                ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-left pl-3" href="./Admin"><span><i class="bi bi-incognito"
                                        style="font-weight: bold; font-size: 16px"></i> Admin</span></a>
                            <?php
                                endif;
                                ?>
                        </div>
                    </div>
                </li>
                <?php
                } else {
                ?>
                <li>
                    <a class="signup scrollto buttonsp" href="index.php?action=User&act=sign-up">
                        Đăng ký
                    </a>
                </li>
                <li>
                    <a class="login scrollto buttonln" href="index.php?action=User&act=login">
                        Đăng nhập
                    </a>
                </li>
                <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>

</header><!-- End Header -->
<div class="container mt-2 mb-4 search-bar">
    <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-9 mt-3">
            <form action="index.php?" method="get">
                <div class="input-group">
                    <input name="action" value="Search" hidden>
                    <input type="search" name="Search" class="form-control rounded" placeholder="Tìm kiếm"
                        aria-label="Search" aria-describedby="search-addon"
                        value="<?php echo isset($_GET["Search"]) ? $_GET["Search"] : '' ?>" />
                    <button type="submit" class="btn btn-outline-primary">
                        Tìm kiếm <i class='fas fa-search'></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-3 text-center btn-cart mt-2">
            <a href='index.php?action=Cart' class="btn w-75"><i class="bi bi-cart"></i>Giỏ hàng
                <span id="slsp">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $gh = new giohang();
                        $CartTotal = $gh->CartTotal();
                        echo $CartTotal;
                    } else {
                        echo 0;
                    }
                    ?>
                </span>
            </a>
        </div>
    </div>
</div>
<button type="button" class="btn bg-light btn-outline-primary rounded text-center" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<div class="text-center alert-width text-danger">
    <h2>Kích thước thiết bị quá nhỏ vui lòng đổi thiết thị khác để xem đầy đủ nội dung</h2>
    <i class="bi bi-aspect-ratio" style="font-size:30px"></i>
</div>