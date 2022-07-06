<?php
    $countOrder = $this->data['subcontent']['countOrder'];
    $countProduct = $this->data['subcontent']['countProduct'];
    $countUser = $this->data['subcontent']['countUser'];
    $logintime = $this->data['subcontent']['logintime'];
?>

<div class="wrapper">
    <div class="dashboard">
        <div class="dashboard_header">
            <p class="header-text">Hệ thống quản lý shop thương mại điện tử VTC</p>
            <p class="header-text">Front-end: Tài Chánh + Văn Việt + Xuân Trung - Back-end: Ngô Xuân Trung</p>
        </div>
        <div class="dashboard_body">
            <p class="body-title">Thống kê</p>
            <div class="dashboard_body_statistics">
                <div class="orders cat-box">
                    <p class="title-box">Đơn hàng</p>
                    <p class="text-box">Có tất cả <span class="text-order"><?php echo $countOrder[0]['COUNT(id)']; ?></span> đơn hàng</p>
                </div>
                <div class="products cat-box">
                    <p class="title-box">Sản phẩm</p>
                    <p class="text-box">Có tất cả <span class="text-product"><?php echo $countProduct[0]['COUNT(id)']; ?></span> sản phẩm</p>
                </div>
                <div class="users cat-box">
                    <p class="title-box">Người dùng</p>
                    <p class="text-box">Có tất cả <span class="text-user"><?php echo $countUser[0]['COUNT(id)']; ?></span> người dùng</p>
                </div>
            </div>
            <p class="body-title">Lịch sử truy cập</p>
            <table class="adm-table">
                <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Họ tên</th>
                    <th>Thời gian đăng nhập</th>
                </tr>
                </thead>
                <tbody class="table-scroll">
                <?php foreach($logintime as $value): ?>
                <tr >
                    <td class="adm-thumbnail"><img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/khok<?php echo rand(1,4); ?>.jpg" alt=""></td>
                    <td class="adm-name"><?php echo $value['fullname']; ?></td>
                    <td class="adm-logintime"><?php echo $value['logintime']; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>