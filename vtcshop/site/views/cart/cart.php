<?php
    if(isset($_SESSION['cart'])) {
        $cart =$this->data['subcontent']['cart'];
    }
?>

<div class="wrapper">
    <div class="cart_content">
        <div class="cart_header">
            <p>Giỏ hàng</p>
        </div>
        <?php if(!empty($_SESSION['cart'])): ?>
            <div id="cart_form">
                <div class="cart_body">
                    <table class="cart_table">
                        <thead class="cart_table_head">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody class="cart_table_body">
                        <?php $sum = 0; foreach($cart as $key => $value): ?>
                            <tr id="productInfo">
                                <td class="cart_tableImg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $value[0]['name']; ?>.png" 
                                            alt="<?php echo $value[0]['name']; ?>">
                                </td>
                                <td class="cart_tableName">
                                    <a href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $value[0]['name']; ?>">
                                                                    <?php echo $value[0]['name']; ?></a>
                                </td>
                                <td class="cart_tableQuanity">
                                    <input type="number" min="1" maxlengtd="50" name="qty" 
                                            value="<?php echo $value[0]['qtyBuy']; ?>"
                                            id="qty-<?php echo $key; ?>">
                                </td>
                                <td class="cart_tablePrice" id="Pprice-<?php echo $key; ?>">
                                    <?php echo number_format($value[0]['price'] * $value[0]['qtyBuy'],0," ","."); ?> VND
                                </td>
                                <td class="cart_tableDelete">
                                    <!-- <a href="<?php echo _WEB_ROOT; ?>/cart"> -->
                                        <i class="fas fa-trash-alt" id="btn-delete-<?php echo $key; ?>"></i>
                                    <!-- </a> -->
                                </td>
                            </tr >
                            <?php $sum += $value[0]['price'] * $value[0]['qtyBuy'];?>
                            <tr>
                            <?php  endforeach; ?>
                                <td colspan="3" class="cart_sum">Tổng tiền:</td>
                                <td class="cart_tablePrice" id="totalPrice"><?php echo number_format($sum,0," ","."); ?> VND</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart_footer">
                    <div class="btn_item">
                        <button><a href="<?php echo _WEB_ROOT; ?>/cart/checkout">Thanh toán</a></button>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <p class="empty_cart">Chưa có sản phẩm nào trong giỏ hàng!<br/><a href="<?php echo _WEB_ROOT; ?>/home">Mua hàng?</a></p>
        <?php endif; ?>
    </div>
</div>
<pre>


<script type="text/javascript">
    $(document).ready(function() {
    <?php if(isset($_SESSION['cart'])): ?>
        <?php foreach($cart as $key => $value):?>
        $('#btn-delete-<?php echo $key; ?>').click(function() {
            $.ajax({
                url: '<?php echo _WEB_ROOT; ?>/cart/removeProduct',
                method: 'GET',
                data: {product_id:<?php echo $key; ?>},
                success: function(data) {
                    window.location.reload();
                }
            })
        });

        $('#qty-<?php echo $key; ?>').click(function() {
            var qty = $('#qty-<?php echo $key; ?>').val();
            $.ajax({
                url: '<?php echo _WEB_ROOT; ?>/cart/updateQty',
                method: 'GET',
                data: {product_id:<?php echo $key; ?>, qty:qty},
                success: function(data) {
                    $('#Pprice-<?php echo $key; ?>').html(new Intl.NumberFormat(['ban', 'id']).format(data) + " VND");
                        data = data - <?php echo $value[0]['price'] * $value[0]['qtyBuy']?> ;
                    $('#totalPrice').html(new Intl.NumberFormat(['ban', 'id']).format(<?php echo $sum;?> + data) + " VND");
                    if(data === 'notEmpty') {
                    $('#productInfo').html('');
                    }
                    if(data === 'isEmpty') {
                        $('#cart_form').html('<p class="empty_cart">Chưa có sản phẩm nào trong giỏ hàng!<br/>'+
                        '<a href="<?php echo _WEB_ROOT; ?>/home">Mua hàng?</a></p>');
                    }
                }
            })
        })

        $('#qty-<?php echo $key; ?>').blur(function() {
            var qty = $('#qty-<?php echo $key; ?>').val();
            $.ajax({
                url: '<?php echo _WEB_ROOT; ?>/cart/updateQty',
                method: 'GET',
                data: {product_id:<?php echo $key; ?>, qty:qty},
                success: function(data) {
                    console.log(data);
                    if(data === 'notEmpty') {
                        $('#productInfo').html('');
                    }
                    if(data === 'isEmpty') {
                        $('#cart_form').html('<p class="empty_cart">Chưa có sản phẩm nào trong giỏ hàng!<br/>'+
                        '<a href="<?php echo _WEB_ROOT; ?>/home">Mua hàng?</a></p>');
                    }
                    if(!isNaN(data) && data != 0) {
                        $('#Pprice-<?php echo $key; ?>').html(new Intl.NumberFormat(['ban', 'id']).format(data) + " VND");
                        data = data - <?php echo $value[0]['price'] * $value[0]['qtyBuy']?> ;
                        $('#totalPrice').html(new Intl.NumberFormat(['ban', 'id']).format(<?php echo $sum;?> + data) + " VND");
                    }
                }
            })
        })
        <?php endforeach; ?>
    <?php endif; ?>
    });
</script>


