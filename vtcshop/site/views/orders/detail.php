<div class="wrapper">
    <div class="dashboard_content">
        <div class="dashboard_content_breadcrumb">
            <p class="breadcrumb-text">CHI TIẾT SẢN PHẨM</p>
            <ul class="breadcrumb-link">
                <li><a href="<?php echo _WEB_ROOT; ?>/admin/home">Trang chủ</a></li>
                <li><a href="<?php echo _WEB_ROOT; ?>/admin/product">Danh sách đơn hàng</a></li>
                <li><a href="">Chi tiết đơn hàng</a></li>
            </ul>
        </div>
        <div class="dashboard_content_body">
            <div class="body-left">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" placeholder="Nhập tên sản phẩm">
                <div id="errorname" class="error-text"></div>

                <label for="price">Giá:</label>
                <input type="number" id="price" placeholder="Nhập giá sản phẩm">
                <div id="errorprice" class="error-text"></div>

                <label for="qty">Số lượng:</label>
                <input type="number" id="qty" placeholder="Nhập số lượng sản phẩm">
                <div id="errorqty" class="error-text"></div>
            </div>
        </div>
        <div class="footer">
            <div class="btn-save" id="btn-save">Lưu</div>
        </div>
    </div>
</div>