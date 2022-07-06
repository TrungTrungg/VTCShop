<?php
    $res = new Response();
    if(isset($_SESSION['admin'])) {
        $res->redirect('admin/home');
    }

?>

<div id="errorModal"></div>
<div class="wrapper">
        <div class="login">
            <div class="login_content">
                    <div class="login_content_header">
                        <h1>Đăng nhập quản trị viên</h1>
                    </div>
                    <form method="POST">
                    <div class="login_content_body">
                        <input type="text" placeholder="Nhập tài khoản" name="username" id="username">
                        <input type="password" placeholder="Nhập mật khẩu" name="password" id="password">
                    </div>
                    <div class="login_content_footer">
                        <button type="submit" id="btn-login"><p class="js-open-login">Đăng nhập</p></button>
                    </div>
                    </form>

            </div>
        </div>
    </div>
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/modalLR.js"></script>

<script>
    $(document).ready(function() {
        $('#btn-login').click(function() {
            let username = $('#username').val();
            let password = $('#password').val();
            $.ajax({
                url: "<?php echo _WEB_ROOT; ?>/admin/user/login",
                method: "POST",
                data: {username:username,password:password},
                success: function(data) {
                    $('#errorModal').html(data);
                }
            })
        })
    })
</script>