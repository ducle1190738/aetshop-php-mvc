<title>Admin - Check Authentication</title>
<style>
.error-input {
    background: #ff000045 !important;
}

#layoutAuthentication {
    /* background:  rgba(3, 0, 0, 0.5) no-repeat center center; */
    background-size: 100%;
    min-height: 100%;
    background: linear-gradient(180deg, rgba(0, 41, 255, 0.4), rgba(0, 0, 0, 0.6)), url(./assets/img/background.gif);
    background-size: cover;
}
</style>
<script>
function SnH_Ps() {
    var x = document.getElementById("Password");
    if (x.type === "password") {
        document.getElementById('ShowHidePs').textContent = 'Ẩn mật khẩu';
        x.type = "text";
    } else {
        document.getElementById('ShowHidePs').textContent = 'Hiện mật khẩu';
        x.type = "password";
    }
}
</script>
<?php
$email = '';
$email_error = false;
$pass = '';
$pass_error = false;
$auth_error = '';
if (isset($_POST['Email'])) {
    $email = $_POST['Email'];
    $pass = $_POST['Password'];
    $kt = new user();
    $check = $kt->ExistUser($email);
    if (!$check) {
        $email_error = true;
    } else {
        $check2 = $kt->login($email, md5($pass));
        if ($check2) {
            if ($check['vaitro'] == 0) {
                $auth_error = 'Bạn không có quyền truy cập vào trang admin';
            }
        } else {
            $pass_error = true;
        }
    }
}
?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center mt-5 pt-5">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header  <?php echo $auth_error ? 'error-input' : '' ?> text-center">
                            <div class="d-flexmb-3 mt-4 pb-1 ">
                                <span class="h2 fw-bold mb-0  text-center ">AETSHOP - <span class="text-success">Trang
                                        Admin</span></span>
                            </div>
                            <h2 class="text-center">Đăng nhập</h2>
                        </div>
                        <div class="card-body <?php echo $auth_error ? 'error-input' : '' ?>">
                            <form method="POST" action="index.php?action=Auth&act=login">
                                <div class="form-floating mb-3">
                                    <input class="form-control <?php echo $email_error ? 'error-input' : '' ?>"
                                        value="<?php echo $email ?>" id="inputEmail" type="email"
                                        placeholder="name@example.com" name="Email" />
                                    <label for="inputEmail">Email</label>
                                    <?php
                                    if ($email_error) {
                                        echo '<small class="text-danger">Email is not registered</small>';
                                    }
                                    ?>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control <?php echo $pass_error ? 'error-input' : '' ?>"
                                        value="<?php echo $pass ?>" id="Password" type="password" placeholder="Password"
                                        name="Password" />
                                    <label for="inputPassword">Mật khẩu</label>
                                    <?php
                                    if ($pass_error) {
                                        echo '<small class="text-danger">Invalid password</small>';
                                    }
                                    ?>
                                </div>
                                <div class="custom-control custom-checkbox form-outline mb-4">
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked"
                                        onclick="SnH_Ps()">
                                    <label class="custom-control-label" for="defaultUnchecked" id="ShowHidePs">Hiện mật
                                        khẩu</label>
                                </div>
                                <div class="text-center mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary w-50">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <?php
                            if ($auth_error) {
                                echo '<h4 class="text-danger">' . $auth_error . '</h4>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; AET TEAM 2024</div>
                </div>
            </div>
        </footer>
    </div>
</div>