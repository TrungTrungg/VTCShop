<?php 
    $order_data = $this->data['subcontent']['data'];
    $order_detail = $this->data['subcontent']['order_detail'];
?>

<div class="wrapper">
    <div class="dashboard_content">
        <div class="dashboard_content_breadcrumb">
            <p class="breadcrumb-text">CHI TIẾT ĐƠN HÀNG <?php echo $order_data['order_id']; ?></p>
            <ul class="breadcrumb-link">
                <li><a href="<?php echo _WEB_ROOT; ?>/admin/home">Trang chủ</a></li>
                <li><a href="<?php echo _WEB_ROOT; ?>/admin/product">Danh sách đơn hàng</a></li>
                <li><a href="">Chi tiết đơn hàng</a></li>
            </ul>
        </div>
        <div class="dashboard_content_body" style="grid-template-columns: 1.5fr 2fr;">
            <div class="body-left">
                <?php foreach($order_data as $key => $value): ?>
                    <?php if($key == 'id' || $key == 'user_id' || $key == 'product_id' || $key == 'price' || $key == 'quantity' || $key == 'name' || $key == 'order_id' || $key == 'status'): continue; endif;?>
                <div>
                    <p style="display:inline-block; width:18rem;"><?php echo ucfirst($key); ?>: </p>
                    <p style="display:inline-block; margin-bottom: 3rem;"><?php echo $value; ?></p>
                </div>
                <?php endforeach; ?>
                <?php echo $order_data['status'] == 0 ? '<div class="order-status">Chưa hoàn thành</div>' : '<div class="order-status fin">Hoàn thành</div>'; ?>
            </div>
            <div class="body-right">
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
                        <?php $sum = 0; foreach($order_detail as $value): ?>
                            <tr class="product-items">
                                <td class="product-thumbnail">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $value['name']; ?>.png" 
                                        alt="<?php echo $value['name']; ?>">
                                </td>
                                <td class="product-name"><?php echo $value['name']; ?></td>
                                <td class="product-quantity"><?php echo $value['quantity']; ?></td>
                                <td class="product-price"><?php echo number_format($total = $value['quantity'] * $value['price'],0," ","."); ?> VND</td>
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
        <div class="footer">
            <div class="btn-save" id="btn-save"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="color: #fff;">Trở về</a></div>
        </div>
    </div>
</div>