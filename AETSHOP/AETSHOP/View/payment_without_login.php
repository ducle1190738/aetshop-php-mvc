<link rel="stylesheet" href="./assets/css/payment.css">
<title>Payment</title>
<?php
$card = new CreditCard();
$cardname = '';
$cardnumber = '';
$cvv = '';
$card_error = '';

$username = '';
$email = '';
$numberphone = '';
$address = '';
$user_error  = '';

if (isset($_POST['Cardname'])) {
    $cardname = $_POST['Cardname'];
    $cardnumber = $_POST['Cardnumber'];
    $cvv = $_POST['CVV'];
    $cardname = strtoupper($card->ReplaceUnicode(trim($cardname)));
    $getcard = $card->getCard($cardname, $cardnumber, $cvv);
    $balance_card = $getcard ? $getcard['Balance'] : 0;
    $id_card = $getcard ? $getcard['IdCard'] : -1;

    $gh = new giohang();
    $tong =  $gh->getTotal();

    if (!$getcard) {
        $card_error = "Credit card not found";
    } else {
        if ($balance_card < $tong) {
            $card_error = "Amount to pay is larger than your balance";
        }
    }

    $us = new User();
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $numberphone = $_POST['NumberPhone'];
    $address = $_POST['Address'];

    $checkEmail = $us->ExistUser($email);
    $checkDt = $us->ExistUserDt($numberphone);

    if ($checkEmail) {
        $user_error  = 'Email của bạn đã được đăng ký, vui lòng sử dụng Email khác hoặc ';
    }
    if ($checkDt) {
        $user_error  = 'Số điện thoại của bạn đã được đăng ký, vui lòng sử dụng số điện thoại khác hoặc ';
    }
    if ($checkDt && $checkEmail) {
        $user_error = 'Email và số điện thoại của bạn đã được đăng ký, vui lòng sử dụng Email và số điện thoại khác hoặc ';
    }
}
?>
<div class="container mt-5">
    <div class="payment">
        <div class="mb-4">
            <h2>Xác nhận đơn hàng và thanh toán </h2>
            <span>Vui lòng thực hiện thanh toán, sau đó bạn có thể tận hưởng tất cả các tính năng và lợi ích. </span>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="card p-3 text-white mb-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><strong>Sản phẩm</strong></th>
                                <th><strong>Số lượng</strong></th>
                                <th class="text-right"><strong>Thành tiền</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
                                <tr>
                                    <td><?php echo $item['name'] ?> ( <?php echo $item['thoihan'] ?> )</td>
                                    <td class="text-center"><?php echo $item['soluong'] ?></td>
                                    <td class="text-right"><?php echo number_format($item['total'], 2) ?><u>đ</u></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <th colspan="2" class="text-right fw-bold">Tổng tiền</th>
                            <th class="text-right text-decoration-underline fst-italic">
                                <?php
                                $gh = new giohang();
                                $tong =  $gh->getTotal();
                                echo number_format($tong, 2);
                                ?>đ
                            </th>
                        </tfoot>
                    </table>
                </div>
                <h6 class="pt-2" style="color: #393f81;">Bạn đã có tài khoản ? <a href="index.php?action=User&act=login" style="color: blue;">Đăng nhập tại đây</a></h6>
                <h6 class="pb-2" style="color: #393f81;">Bạn chưa có tài khoản? <a href="index.php?action=User&act=sign-up" style="color: red;">Đăng ký tại đây
                    </a></h6>
            </div>
            <div class="col-lg-7 col-md-12">
                <form method="post" action="index.php?action=Order&act=CreditCard">
                    <div class="card p-3">
                        <h6 class="text-uppercase">THÔNG TIN CREDIT CARD </h6>
                        <div class="inputbox mt-3">
                            <input value="<?php echo $cardname ?>" type="text" name="Cardname" class="form-control" required>
                            <span>Tên Card</span>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="inputbox mt-3 mr-2">
                                    <input value="<?php echo $cardnumber ?>" type="number" name="Cardnumber" class="form-control" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;">
                                    <i class="fa fa-credit-card"></i>
                                    <span>Số Card</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex flex-row">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $cvv ?>" type="number" name="CVV" class="form-control" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                        <span>CVV</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($card_error != '') :
                            echo '<div class="p-3 rounded text-light" style="background-color: #FF684C;"> <i class="bi bi-exclamation-octagon"></i> ' . $card_error . '</div>';
                        endif;
                        ?>
                        <div class="mt-4 mb-4">
                            <h6 class="text-uppercase">Thông tin người dùng</h6>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $username ?>" type="text" name="Username" class="form-control" required>
                                        <span>Họ và tên</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $email ?>" type="text" name="Email" class="form-control" required>
                                        <span>Email</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $numberphone ?>" type="number" name="NumberPhone" class="form-control" required onKeyPress="if(this.value.length==11) return false;">
                                        <span>Số điện thoại</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input value="<?php echo $address ?>" type="text" name="Address" class="form-control" required>
                                        <span>Địa chỉ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($user_error  != '') :
                            echo '<div class="p-3 rounded text-light" style="background-color: #FF684C;"> <i class="bi bi-exclamation-octagon"></i> ' . $user_error  . '<a href="index.php?action=User&act=login">log in</a> to continue paying</div>';
                        endif;
                        ?>
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <a href="index.php?action=Cart">Quay lại</a>
                        <button class="btn btn-success px-3" type="submit">
                            Thanh toán <?php
                                        echo number_format($tong, 2);
                                        ?>đ
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>