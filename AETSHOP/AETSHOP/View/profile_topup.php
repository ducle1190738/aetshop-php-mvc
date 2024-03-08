<link href="assets\css\UserProfile.css" rel="stylesheet">
<title>Nạp tiền</title>
<?php
$card = new CreditCard();
$us = new User();
$cardname = '';
$cardnumber = '';
$cvv = '';
$card_error = '';

$password = '';
$balance = '';
$password_error = '';
$balance_error = '';


if (isset($_POST['Cardname']) && isset($_POST['Password'])) {
    $cardname = $_POST['Cardname'];
    $cardnumber = $_POST['Cardnumber'];
    $cvv = $_POST['CVV'];

    $makh = $_POST['makh'];
    $password = $_POST['Password'];
    $balance = $_POST['Balance'];
    $cardname = strtoupper($card->ReplaceUnicode(trim($cardname)));
    $getus  = $us->getInfo($makh);
    $getcard = $card->getCard($cardname, $cardnumber, $cvv);

    if (!$getcard) {
        $card_error = "Credit card not found";
    } else {
        $balance_card = $getcard['Balance'];
        $id_card = $getcard['IdCard'];
        if ($balance_card < $balance) {
            $card_error = "The balance you want to top-up is more than the balance in the credit card";
        }
    }


    if ($getus['matkhau'] != md5($password)) {
        $password_error = "Sai mật khẩu";
    }

    if ($balance  < 50000) {
        $balance_error = 'Giá trị nhỏ nhất là 50,000đ';
    }
}

?>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-3 my-lg-0 my-md-1">
            <div id="sidebar" class="bg-blue">
                <div class="h4 text-white">Tài khoản</div>
                <ul>
                    <li>
                        <a href="index.php?action=User&act=profile" class="text-decoration-none d-flex align-sets-start">
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
                        <a href="index.php?action=User&act=wishlist" class="text-decoration-none d-flex align-sets-start">
                            <div class="fas fa-box-open pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Danh sách yêu thích</div>
                                <div class="link-desc">Xem & Quản lý danh sách yêu thích
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="active">
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
                        <a href="index.php?action=User&act=PurchaseHistory" class="text-decoration-none d-flex align-sets-start">
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
                <div class="text-uppercase"><i class="bi bi-credit-card"></i> Nạp tiền</div>
                <form action="index.php?action=User&act=add_balace_user" method="POST">
                    <div class="text-uppercase mt-4 text-primary">Thông tin Credit Card</div>
                    <div class="form-outline mb-3">
                        <input value="<?php echo $cardname ?>" type="text" id="Cardname" class="form-control " name="Cardname" value="" required />
                        <label class="form-label" for="Cardname">Tên Card</label>
                    </div>
                    <div class="row mb-4">
                        <div class="col-8">
                            <div class="form-outline">
                                <input value="<?php echo $cardnumber ?>" type="number" id="Cardnumber" class="form-control" name="Cardnumber" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;" required />
                                <label class="form-label" for="Cardnumber">Số Card </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline">
                                <input value="<?php echo $cvv ?>" type="number" id="CVV" class="form-control" name="CVV" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" required />
                                <label class="form-label" for="CVV">CVV</label>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($card_error != '') :
                        echo '<div class="p-3 rounded text-light" style="background-color: #FF684C;"> <i class="bi bi-exclamation-octagon"></i>' . $card_error . '</div>';
                    endif;
                    ?>
                    <div class="text-uppercase mt-4 text-primary">MẬT KHẨU VÀ SỐ DƯ BẠN MUỐN NẠP TIỀN
                    </div>

                    <input type="hidden" name="makh" value="<?php echo $_SESSION['makh'] ?>">
                    <div class="form-outline mb-3">
                        <input type="password" id="Password" class="form-control <?php echo $password_error != '' ? 'error-input' : '' ?>" name="Password" value="<?php echo $password ?>" required />
                        <label class="form-label" for="Password">Mật khẩu</label>
                    </div>
                    <?php
                    if ($password_error != '') {
                        echo '<small class="text-danger">' . $password_error . '</small>';
                    }
                    ?>
                    <div class="custom-control custom-checkbox form-outline mb-4">
                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked" onclick="SnH_Ps()">
                        <label class="custom-control-label" for="defaultUnchecked" id="ShowHidePs">Hiện mật khẩu</label>
                    </div>
                    <div class="form-outline mt-4">
                        <input type="number" id="Balance" class="form-control <?php echo $balance_error != '' ? 'error-input' : '' ?>" name="Balance" value="<?php echo $balance ?>" min="10000" required />
                        <label class="form-label" for="Balance">Số tiền muốn nạp</label>
                    </div>
                    <?php
                    if ($balance_error != '') {
                        echo '<small class="text-danger">' . $balance_error . '</small>';
                    }
                    ?>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mt-4 mb-4">Nạp tiền</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    function SnH_Ps() {
        var x = document.getElementById("Password");
        if (x.type === "password") {
            document.getElementById('ShowHidePs').textContent = 'Hide Password';
            x.type = "text";
        } else {
            document.getElementById('ShowHidePs').textContent = 'Show Password';
            x.type = "password";
        }
    }
</script>