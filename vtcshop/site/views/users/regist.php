<?php
$res = new Response();
 if(isset($_SESSION['user']))
 $res->redirect('');
?>
<div id="errorModal"></div>

<div class="wrapper">
        <div class="login">
            <div class="login_content">
                <form  method="post">
                    <div class="login_content_header">
                        <h1>Đăng ký</h1>
                    </div>
                    <div class="login_content_body">
                        <input type="text" placeholder="Nhập tên tài khoản" id="txtName" name="username">
                        <div class="error_text" id="errorName"></div>
                        <input type="text" placeholder="Nhập email" id="txtEmail" name="email">
                        <div class="error_text" id="errorEmail"></div>
                        <input type="text" placeholder="Nhập số điện thoại" id="txtPhone" name="phone_number">
                        <div class="error_text" id="errorPhone"></div>
                        <input type="password" placeholder="Nhập mật khẩu" id="txtPass" name="password">
                        <div class="error_text" id="errorPassword"></div>
                        <input type="text" placeholder="Họ và tên" id="txtFname" name="fullname">
                        <div class="error_text" id="errorFname"></div>
                    </div>
                    <div class="login_content_footer_border">
                        <button type="submit" name="submit" id="btn-regist"><p class="btn_regist">Đăng ký</p></button>
                    </div>
                </form>
                <p>Đã có tài khoản? <a href="./login" class="login_content_login">Đăng nhập</a></p>
            </div>
        </div>
    </div>

    <!-- modalAccount -->
<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/modalLR.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#txtName').blur(function() {
                var txtN = $(this).val();
                $.ajax({
                    url:'<?php echo _WEB_ROOT; ?>/user/registUser',
                    method: 'GET',
                    data: {username:txtN},
                    success: function(data){
                            $('#errorName').html(data);
                        }
                })
            })
            $('#txtName').click(function() {
                            $('#errorName').html('');
            })
            $('#txtEmail').blur(function() {
                var txtE = $(this).val();
                $.ajax({
                    url:'<?php echo _WEB_ROOT; ?>/user/registUser',
                    method: 'GET',
                    data: {email:txtE},
                    success: function(data){
                            $('#errorEmail').html(data);
                        }
                })
            })
            $('#txtEmail').click(function() {
                            $('#errorEmail').html('');
            })
            $('#txtPhone').blur(function() {
                var txtP = $(this).val();
                $.ajax({
                    url:'<?php echo _WEB_ROOT; ?>/user/registUser',
                    method: 'GET',
                    data: {phone_number:txtP},
                    success: function(data){
                            $('#errorPhone').html(data);
                        }
                })
            })
            $('#txtPass').blur(function() {
                var txtPass = $(this).val();
                    if(txtPass == "")
                $('#errorPassword').html("<p>Không được để trống mật khẩu!</p>");
            })

            $('#txtPass').click(function() {
                $('#errorPassword').html('');
            })
            $('#txtFname').blur(function() {
                var txtFname = $(this).val();
                    if(txtFname == "")
                $('#errorFname').html("<p>Không được để trống họ tên!</p>");
            })
            $('#txtFname').click(function() {
                $('#errorFname').html('');
            })

            $('#btn-regist').click(function() {
                var txtN = $('#txtName').val();
                var txtE = $('#txtEmail').val();
                var txtP = $('#txtPhone').val();
                var txtPass = $('#txtPass').val();
                var txtFname = $('#txtFname').val();
                $.ajax({
                    url:'<?php echo _WEB_ROOT; ?>/user/regist',
                    method: 'POST',
                    data: {username:txtN, email:txtE, phone_number:txtP, password:txtPass, fullname:txtFname},
                    success: function(data){
                            $('#errorModal').html(data);
                        }
                })
            })

            

        })

    </script>