<?php
    $user = $this->data['subcontent']['user_info'][0];
    $id = $user['id'];
    $username = $user['username'];
    $fullname = $user['fullname'];
    $email = $user['email'];
    $phone_number = $user['phone_number'];
    $address = $user['address'];
    $role_id = $user['role_id'];
?>
<div class="modalSuccess">
</div>
<div class="wrapper">
        <div class="dashboard_content">
            <div class="dashboard_content_breadcrumb">
                <p class="breadcrumb-text">SỬA THÔNG TIN NGƯỜI DÙNG</p>
                <ul class="breadcrumb-link">
                    <li>
                        <a href="<?php echo _WEB_ROOT; ?>/admin/home">Trang chủ</a>
                    </li>
                    <li>
                        <a href="<?php echo _WEB_ROOT; ?>/admin/user">Danh sách người dùng</a>
                    </li>
                    <li>
                        <a href="">Sửa thông tin người dùng</a>
                    </li>
                </ul>
            </div>
            <div class="dashboard_content_body">
                <div class="body-left">
                    <input type="hidden" id="id" value="<?php echo $id; ?>">
                    <label for="username">Tên tài khoản:</label>
                    <input type="text" id="username" placeholder="Nhập Username" disabled="true" value="<?php echo $username; ?>">
                    <div id="errorUsername" class="error-text"></div>

                    <label for="name">Họ tên:</label>
                    <input type="text" id="name" placeholder="Nhập họ tên" value="<?php echo $fullname; ?>">
                    <div id="errorname" class="error-text"></div>

                    <label for="email">Email:</label>
                    <input type="text" id="email" placeholder="Nhập email" value="<?php echo $email; ?>">
                    <div id="erroremail" class="error-text"></div>

                    <label for="phone_number">Số điện thoại:</label>
                    <input type="text" id="phone_number" placeholder=" Nhập số điện thoại" value="<?php echo $phone_number; ?>">
                    <div id="errorphone" class="error-text"></div>

                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ" value="<?php echo $address; ?>">
                    <div id="erroraddress" class="error-text"></div>

                    <label for="password">Mật khẩu mới:</label>
                    <input type="text" id="password" placeholder="Nhập mật khẩu" value="">
                    <div id="errorpassword" class="error-text"></div>
                </div>
                <div class="body-right">
                    <label for="role">Quyền hạn:</label>
                    <select name="role" id="role">
                    <?php if($role_id == 2): ?>
                        <option value="2">Người dùng</option>
                        <option value="1">Admin</option>
                    <?php else: ?>
                        <option value="1">Admin</option>
                        <option value="2">Người dùng</option>
                    <?php endif; ?>
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
                data: {email:email, id:<?php echo $id; ?>},
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
                data: {phone_number:phone_number, id:<?php echo $id; ?>},
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

        $("#password").click(function() {
            $('#errorpassword').html("");
        });
        })

        $("#btn-save").click(function() {
            let id = $("#id").val();
            let fullname = $("#name").val();
            let email = $("#email").val();
            let phone_number = $("#phone_number").val();
            let address = $("#address").val();
            let password = $("#password").val();
            let role_id = $('#role').val();
            $.ajax({
                url: "<?php echo _WEB_ROOT; ?>/admin/user/processEditUser",
                method: "POST",
                data: {id:id,fullname:fullname,email:email,phone_number:phone_number,address:address,password:password,role_id:role_id},
                success: function(data) {
                    $('.modalSuccess').html(data);
                }
            })
        })


    </script>