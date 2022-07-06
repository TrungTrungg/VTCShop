
<div class="modalSuccess">
</div>
<div class="wrapper">
        <div class="dashboard_content">
            <div class="dashboard_content_breadcrumb">
                <p class="breadcrumb-text">THÊM NGƯỜI DÙNG</p>
                <ul class="breadcrumb-link">
                    <li>
                        <a href="<?php echo _WEB_ROOT; ?>/admin/home">Trang chủ</a>
                    </li>
                    <li>
                        <a href="<?php echo _WEB_ROOT; ?>/admin/user">Danh sách người dùng</a>
                    </li>
                    <li>
                        <a href="">Thêm người dùng</a>
                    </li>
                </ul>
            </div>
            <div class="dashboard_content_body">
                <div class="body-left">
                    <label for="username">Tên tài khoản:</label>
                    <input type="text" id="username" placeholder="Nhập Username">
                    <div id="errorUsername" class="error-text"></div>

                    <label for="name">Họ tên:</label>
                    <input type="text" id="name" placeholder="Nhập họ tên">
                    <div id="errorname" class="error-text"></div>

                    <label for="email">Email:</label>
                    <input type="text" id="email" placeholder="Nhập email">
                    <div id="erroremail" class="error-text"></div>

                    <label for="phone_number">Số điện thoại:</label>
                    <input type="text" id="phone_number" placeholder=" Nhập số điện thoại">
                    <div id="errorphone" class="error-text"></div>

                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ">
                    <div id="erroraddress" class="error-text"></div>

                    <label for="password">Mật khẩu:</label>
                    <input type="text" id="password" placeholder="Nhập mật khẩu">
                    <div id="errorpassword" class="error-text"></div>
                </div>
                <div class="body-right">
                    <label for="role">Quyền hạn:</label>
                    <select name="" id="role">
                        <option value="" hidden>Chọn quyền:</option>
                        <option value="2">Người dùng</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>
            <div class="footer">
                <div class="btn-save" id="btn-save">Lưu</div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $("#username").blur(function() {
            let username =  $("#username").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT; ?>/admin/user/checkUser",
                method: "GET",
                data: {username:username},
                success: function(data){
                    $('#errorUsername').html(data);
                }
            });
        });
        $("#username").click(function() {
            $('#errorUsername').html("");
        });

        $("#name").blur(function() {
            let fullname =  $("#name").val();
            if(fullname === "")
            $('#errorname').html("Không được để trống họ tên!")
        })
        $("#name").click(function() {
            $('#errorname').html("");
        });

        $("#email").blur(function() {
            let email =  $("#email").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT; ?>/admin/user/checkUser",
                method: "GET",
                data: {email:email},
                success: function(data){
                    $('#erroremail').html(data);

                }
            })
        })
        $("#email").click(function() {
            $('#erroremail').html("");
        });

        $("#phone_number").blur(function() {
            let phone_number =  $("#phone_number").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT; ?>/admin/user/checkUser",
                method: "GET",
                data: {phone_number:phone_number},
                success: function(data){
                    $('#errorphone').html(data);

                }
            })
        })
        $("#phone_number").click(function() {
            $('#errorphone').html("");
        });

        $("#address").blur(function() {
            let address =  $("#address").val();
            if(address === "")
            $('#erroraddress').html("Không được để trống địa chỉ!")
        })
        $("#address").click(function() {
            $('#erroraddress').html("");
        });

        $("#password").blur(function() {
            let password =  $("#password").val();
            if(password === "")
            $('#errorpassword').html("Không được để trống mật khẩu!")
        })
        $("#password").click(function() {
            $('#errorpassword').html("");
        });

        $('#btn-save').click(function() {
            let username = $('#username').val();
            let name = $('#name').val();
            let email = $('#email').val();
            let phone_number = $('#phone_number').val();
            let address = $('#address').val();
            let password = $('#password').val();
            let role_id = $('#role').val();
            $.ajax({
                url: '<?php echo _WEB_ROOT; ?>/admin/user/processAddUser',
                method: 'POST',
                data: {username:username,name:name,email:email,phone_number:phone_number,address:address,password:password,role_id:role_id},
                success: function(data) {
                    $('.modalSuccess').html(data);
                    $('#username').val("");
                    $('#name').val("");
                    $('#email').val("");
                    $('#phone_number').val("");
                    $('#address').val("");
                    $('#password').val("");
                }
            })
        })
    })
</script>