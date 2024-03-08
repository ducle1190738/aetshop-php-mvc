<link href="assets\css\UserProfile.css" rel="stylesheet">
<script>
function SnH_Ps_change() {
    let x = document.getElementById("OldPassword");
    let y = document.getElementById("NwPassword");
    let z = document.getElementById("CofNwPassword");

    if (x.type === "password") {
        document.getElementById('ShowHidePs').textContent = 'Ẩn mật khẩu';
        x.type = "text";
        y.type = "text";
        z.type = "text";

    } else {
        document.getElementById('ShowHidePs').textContent = 'Hiện mật khẩu';
        x.type = "password";
        y.type = "password";
        z.type = "password";

    }
}

function DisableIP() {
    let a = document.getElementById("UserName");
    let b = document.getElementById("Email");
    let c = document.getElementById("YourAddress");
    let d = document.getElementById("Numberphone");
    let e = document.getElementById("sbinfo");
    let f = document.getElementById("btn-dis");
    if (a.disabled === false) {
        a.disabled = true;
        b.disabled = true;
        c.disabled = true;
        d.disabled = true;
        e.disabled = true;
        f.textContent = "Thay đổi";
        f.className = "text-danger";
    } else {
        a.disabled = false;
        b.disabled = false;
        c.disabled = false;
        d.disabled = false;
        e.disabled = false;
        f.textContent = "Bỏ thay đổi";
        f.className = "text-primary";
    }
}

function DisableIP2() {
    let a = document.getElementById("OldPassword");
    let b = document.getElementById("NwPassword");
    let c = document.getElementById("CofNwPassword");
    let d = document.getElementById("sbinfo2");
    let e = document.getElementById("btn-dis2");
    if (a.disabled === false) {
        a.disabled = true;
        b.disabled = true;
        c.disabled = true;
        d.disabled = true;
        e.textContent = "Thay đổi";
        e.className = "text-danger";

    } else {
        a.disabled = false;
        b.disabled = false;
        c.disabled = false;
        d.disabled = false;
        e.textContent = "Hủy thay đổi";
        e.className = "text-primary";

    }
}
</script>
<title>Khách hàng - Profile</title>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-3 my-lg-0 my-md-1">
            <div id="sidebar" class="bg-blue">
                <div class="h4 text-white">Tài khoản</div>
                <ul>
                    <li class="active">
                        <a href="index.php?action=User&act=profile"
                            class="text-decoration-none d-flex align-sets-start">
                            <div class="far fa-user pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Thông tin của tôi
                                </div>
                                <div class="link-desc">Thay đổi chi tiết hồ sơ và mật khẩu của bạn
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=User&act=wishlist"
                            class="text-decoration-none d-flex align-sets-start">
                            <div class="fas fa-box-open pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Danh sách yêu thích</div>
                                <div class="link-desc">Xem & Quản lý danh sách yêu thích
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=User&act=topup" class="text-decoration-none d-flex align-sets-start">
                            <div class="fas fa-credit-card pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Nạp tiền
                                </div>
                                <div class="link-desc">Thêm số dư vào tài khoản của bạn
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=User&act=PurchaseHistory"
                            class="text-decoration-none d-flex align-sets-start">
                            <div class="fas fa-cash-register pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Lịch sử mua hàng
                                </div>
                                <div class="link-desc">Xem & quản lý hóa đơn </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
                <div class="d-flex flex-column">
                    <div class="h5">Xin chào <?php echo $_SESSION['tenkh'] ?></div>
                    <div>Email đăng nhập: <?php echo $_SESSION['email'] ?></div>
                </div>
                <div class="d-flex my-4 flex-wrap">
                    <div class="box me-4 my-1 bg-light">
                        <img src="././assets/img/cardboard.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Hàng đã mua</div>
                            <div class="ms-auto number">
                                <?php
                                $ord = new Hoadon();
                                echo  $ord->getCountBill($_SESSION['makh']);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light">
                        <img src="././assets/img/cart.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Trong giỏ hàng</div>
                            <div class="ms-auto number">
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    $gh = new giohang();
                                    $CartTotal = $gh->CartTotal();
                                    echo $CartTotal;
                                } else {
                                    echo 0;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light">
                        <img src="././assets/img/love-heart.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Yêu thích</div>
                            <div class="ms-auto number">
                                <?php
                                $us = new User();
                                echo $us->getWishListCout($_SESSION['makh']);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light pl-4 pr-4">
                        <img src="././assets/img/cash.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Số dư tài khoản</div>
                            <div class="ms-auto number pl-1"> <?php echo number_format($_SESSION['sodu']) ?>đ</div>
                        </div>
                    </div>
                </div>
                <div class="text-uppercase"><span class="mr-2">Thông tin của tôi </span><a type="button" id='btn-dis'
                        class="text-danger" onclick="DisableIP()">Thay đổi</a></div>
                <form action="index.php?action=User&act=changeprofile" method="POST">
                    <input type="hidden" name="makh" value="<?php echo $_SESSION['makh'] ?>">
                    <div class="form-outline mt-4">
                        <input type="text" id="UserName" class="form-control" name="UserName"
                            value="<?php echo $_SESSION['tenkh'] ?>" disabled />
                        <label class="form-label" for="UserName">Tên người dùng</label>
                    </div>
                    <div class="form-outline mt-4">
                        <input type="email" id="Email" class="form-control " name="Email"
                            value="<?php echo $_SESSION['email'] ?>" disabled />
                        <label class="form-label" for="Email">Email</label>
                    </div>

                    <div class="form-outline mt-4">
                        <input type="text" id="YourAddress" class="form-control" name="Address"
                            value="<?php echo $_SESSION['diachi'] ?>" disabled />
                        <label class="form-label" for="YourAddress">Địa chỉ</label>
                    </div>
                    <div class="form-outline mt-4 mb-3">
                        <input type="number" id="Numberphone" class="form-control" name="NumberPhone" maxlength="11"
                            value="<?php echo trim($_SESSION['sodienthoai']) ?>" disabled />
                        <label class="form-label" for="Numberphone">Số điện thoại</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" id="sbinfo" class="btn btn-primary btn-block mb-4" disabled>Đổi thông tin
                    </button>
                </form>
                <div class="text-uppercase"><span class="mr-2">Đổi mật khẩu mới</span><a type="button" id='btn-dis2'
                        class="text-danger" onclick="DisableIP2()">Thay đổi</a></div>
                <?php
                $oldpass = '';
                $newpass = '';
                $confirmpass = '';
                $oldpass_error = '';
                $newpass_error = '';
                $confirmpass_error = '';
                if (isset($_POST['OldPassword']) && isset($_POST['NwPassword']) && isset($_POST['CofNwPassword'])) {
                    $oldpass = $_POST['OldPassword'];
                    $newpass = $_POST['NwPassword'];
                    $confirmpass = $_POST['CofNwPassword'];

                    $us = new user();
                    $check  = $us->login($_SESSION['email'], md5($oldpass));
                    if ($check != null) {

                        if ($oldpass == $newpass) {
                            $newpass_error = 'Mật khẩu mới không được giống mật khẩu cũ';
                        } else {
                            $uppercase = preg_match('@[A-Z]@', $newpass);
                            $lowercase = preg_match('@[a-z]@', $newpass);
                            $number    = preg_match('@[0-9]@', $newpass);
                            // Must be a minimum of 8 characters
                            if (strlen($newpass) >= 8) {
                                // Must contain at least one uppercase character
                                if ($uppercase) {
                                    // Must contain at least one lowercase character
                                    if ($lowercase) {
                                        if (!$number) {
                                            $newpass_error = 'Mật khẩu phải chứa một số';
                                        }
                                    } else {
                                        $newpass_error = 'Mật khẩu phải chứa ký tự chữ thường';
                                    }
                                } else {
                                    $newpass_error = 'Mật khẩu phải chứa ký tự viết hoa';
                                }
                            } else {
                                $newpass_error = 'Mật khẩu cần dài ít nhất 8 ký tự';
                            }
                        }
                        if ($newpass != $confirmpass) {
                            $confirmpass_error = 'Mật khẩu xác nhận không đúng';
                        }
                    } else {
                        $oldpass_error = 'Mật khẩu cũ không đúng';
                    }
                }
                ?>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <form action="index.php?action=User&act=changePass" method="POST">
                            <input type="hidden" name="makh" value="<?php echo $_SESSION['makh'] ?>">
                            <div class="form-outline mt-4">
                                <input type="password" id="OldPassword"
                                    class="form-control <?php echo $oldpass_error != '' ? 'error-input' : '' ?>"
                                    name="OldPassword" value="<?php echo $oldpass ?>" required disabled />
                                <label class="form-label" for="OldPassword">Mật khẩu cũ</label>
                            </div>
                            <?php
                            if ($oldpass_error != '') {
                                echo '<small class="text-danger">' . $oldpass_error . '</small>';
                            }
                            ?>
                            <div class="form-outline mt-4">
                                <input type="password" id="NwPassword"
                                    class="form-control <?php echo $newpass_error != '' ? 'error-input' : '' ?>"
                                    name="NwPassword" value="<?php echo $newpass ?>" required disabled />
                                <label class="form-label" for="NwPassword">Mật khẩu mới
                                </label>
                            </div>
                            <?php
                            if ($newpass_error != '') {
                                echo '<small class="text-danger">' . $newpass_error . '</small>';
                            }
                            ?>
                            <div class="form-outline mt-4 ">
                                <input type="password" id="CofNwPassword"
                                    class="form-control <?php echo $confirmpass_error != '' ? 'error-input' : '' ?>"
                                    name="CofNwPassword" value="<?php echo $confirmpass ?>" required disabled />
                                <label class="form-label" for="CofNwPassword">Xác nhận mật khẩu mới
                                </label>
                            </div>
                            <?php
                            if ($confirmpass_error != '') {
                                echo '<small class="text-danger">' . $confirmpass_error . '</small>';
                            }
                            ?> <div class="custom-control custom-checkbox form-outline mt-1 mb-2">
                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked"
                                    onclick="SnH_Ps_change()">
                                <label class="custom-control-label" for="defaultUnchecked" id="ShowHidePs">Hiện mật khẩu
                                </label>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4 w-50" id="sbinfo2" disabled>Xác
                                nhận thay đổi</button>
                        </form>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h4>Mật khẩu của bạn</h4>
                        <p>Phải có 8 ký tự trở lên
                        </p>
                        <p>Phải có ít nhất 1 số, ít nhất 1 ký tự viết hoa và ít nhất 1 ký tự viết thường
                        </p>
                        <p>Không được giống với mật khẩu đang sử dụng
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>