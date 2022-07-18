<?php
    $res  =  new Response();
    if(isset($_SESSION['user']))
        $res->redirect('');
?>

<div id="errorModal"></div>
<div class="wrapper">
        <div class="login">
            <div class="login_content">
                <form method="POST">
                    <div class="login_content_header">
                        <h1>Đăng nhập</h1>
                    </div>
                    <div class="login_content_body">
                        <input type="text" placeholder="Nhập tài khoản" name="username" id="username">
                        <input type="password" placeholder="Nhập mật khẩu" name="password" id="password">
                    </div>
                    <div class="login_content_footer">
                        <button type="submit" id="btn-login"><p class="js-open-login">Đăng nhập</p></button>
                    </div>
                </form>
                <p>Chưa có tài khoản? <a href="./regist" class="login_content_regist">Tạo tài khoản</a></p>
            </div>
        </div>
    </div>


                                <!-- modalAccount -->
<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/modalLR.js"></script>

<script type="text/javascript" >
$(document).ready(function(){
    if($('#username').val() != '' && $('#password').val() != '') {
        $('#btn-login').click(function() {
        var username = $('#username').val();
        var password = $('#password').val();
            $.ajax({
                url:'<?php echo _WEB_ROOT; ?>/user/login',
                method: 'POST',
                data: {username:username, password:password},
                success: function(data) {
                    $("#errorModal").html(data);
                }
        })
    })
    }else {
        $("#errorModal").html('');
    }
    
})

</script>
