<?php
$res = new Response();
if(isset($_SESSION['user'])) {
    $fullname = $_SESSION['user'][0]['fullname'];
    $address = $_SESSION['user'][0]['address'];
    $phone_number = $_SESSION['user'][0]['phone_number'];
    $email = $_SESSION['user'][0]['email'];
}
if(!empty($_SESSION['cart'])) {
    $cart =$_SESSION['cart'];
}else {
    $res ->redirect('cart');
}
?>

<div id="modalSuccess"></div>
<div class="wrapperr">
    <div class="checkout_content">
        <div class="checkout_content_header">
            <i class="fa fa-credit-card icon"></i>
            <p class="header_text">Thanh toán</p>
        </div>
        <div >
            <ul class="breadcrumb">
            <li><a href="<?php echo _WEB_ROOT; ?>/home">Trang chủ</a></li>
            <li><a href="<?php echo _WEB_ROOT; ?>/cart">Giỏ hàng</a></li>
            <li>Thanh toán</li>
            </ul>
        </div>
        <div class="checkout_content_body">
            <div class="cus-info">
                <p class="cus-text">Thông tin khách hàng</p>
                <label for="fullname">Họ tên:</label>
                <input type="text" id="fullname" value="<?php echo isset($_SESSION['user']) ? $fullname : false;?>">
                <div class="error" id="errorName"></div>
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" value="<?php echo isset($_SESSION['user']) ? $address : false;?>">
                <div class="error" id="errorAddress"></div>
                <label for="phone_number">Số điện thoại:</label>
                <input type="text" id="phone_number" value="<?php echo isset($_SESSION['user']) ? $phone_number : false;?>">
                <div class="error" id="errorPhone"></div>
                <label for="email">Email:</label>
                <input type="text" id="email" value="<?php echo isset($_SESSION['user']) ? $email : false;?>">
                <div class="error" id="errorEmail"></div>
                <div class="btn-order" id="btn-order">
                    <p class="order-text">Đặt hàng</p>
                </div>
            </div>
            <div class="cart-info">
                <p class="cart-text">Thông tin giỏ hàng</p>
                <table class="table-cart">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Sản phẩm</th>
                            <th class="product-name">Tên</th>
                            <th class="product-quantity">Số Lượng</th>
                            <th class="product-price">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sum = 0; foreach($cart as $key => $value): ?>
                            <tr class="product-items">
                                <td class="product-thumbnail">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $value[0]['name']; ?>.png" 
                                        alt="<?php echo $value[0]['name']; ?>">
                                </td>
                                <td class="product-name"><?php echo $value[0]['name']; ?></td>
                                <td class="product-quantity"><?php echo $value[0]['qtyBuy']; ?></td>
                                <td class="product-price"><?php echo number_format($total = $value[0]['qtyBuy'] * $value[0]['price'],0," ","."); ?> VND</td>
                            </tr>
                        <?php $sum += $total; endforeach; ?>
                            <tr class="product-totalPrice">
                                <td class="totalPrice" colspan="3">Tổng thành tiền:</td>
                                <td class="price"><?php echo number_format($sum,0," ","."); ?> VND</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/modalLR.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#fullname').blur(function() {
            var fullname = $(this).val();
                if(fullname == "") {
                    $('#errorName').html('Không được để trống họ tên!');
                };
        });
        $('#fullname').click(function() {
                    $('#errorName').html("");
        });

        $('#address').blur(function() {
            var fullname = $(this).val();
                if(fullname == "") {
                    $('#errorAddress').html('Không được để trống địa chỉ!');
                };
        });
        $('#address').click(function() {
                    $('#errorAddress').html("");
        });

        $('#phone_number').blur(function() {
            var fullname = $(this).val();
                if(fullname == "") {
                    $('#errorPhone').html('Không được để trống số điện thoại!');
                };
        });
        $('#phone_number').click(function() {
                    $('#errorPhone').html("");
        });

        $('#email').blur(function() {
            var fullname = $(this).val();
                if(fullname == "") {
                    $('#errorEmail').html('Không được để trống email!');
                };
        });
        $('#email').click(function() {
                    $('#errorEmail').html("");
        });

        $('#btn-order').click(function() {
            var fullname = $('#fullname').val();
            var address = $('#address').val();
            var phone_number = $('#phone_number').val();
            var email = $('#email').val();
            console.log(fullname);
            $.ajax({
                url:'<?php echo _WEB_ROOT; ?>/cart/addCus',
                method: 'POST',
                data: {fullname:fullname, address:address, phone_number:phone_number, email:email}
            });
        });

        $('#btn-order').click(function() {
        <?php  if(isset($_SESSION['cart'])): ?>
            var fullname = $('#fullname').val();
            var address = $('#address').val();
            var phone_number = $('#phone_number').val();
            var email = $('#email').val();
            $.ajax({
                url:'<?php echo _WEB_ROOT; ?>/cart/saveOrder',
                method: 'POST',
                data: {fullname:fullname, address:address, phone_number:phone_number, email:email},
                success: function(data) {
                    $('#modalSuccess').html(data);
                }
            });
        <?php endif; ?>
        });
    });
</script>
        
