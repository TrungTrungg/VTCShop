<?php
    $res = new Response();
    if(!isset($_SESSION['admin'])) {
        $res ->redirect('admin/user/login');
    }
?>

<div class="header_bg">
    <div class="wrapper">
        <div class="header_content">
            <div class="header_content_top">
                <div class="phone-contact">
                    <i class="fa fa-phone icon"></i>
                    <span>0339747323</span>
                </div>
                <div class="logo"><a href="<?php echo _WEB_ROOT; ?>/admin/home">VTC</a></div>
                <div class="account">
                    <p><?php echo isset($_SESSION['admin']) ? $_SESSION['admin'][0]['fullname'].'</p>'.
                    '<div class="btn-logout"><p><a href="'._WEB_ROOT.'/admin/user/logout">Đăng xuất</a></p></div>':false; ?>
                </div>
            </div>
            <div class="header_content_nav">
                <ul class="nav_menu">
                    <li class="menu"><a href="<?php echo _WEB_ROOT; ?>/admin/order"><span><i class="fa fa-check-square-o icon"></i></span>Quản lý đơn hàng</a></li>
                    <li class="menu"><a href="<?php echo _WEB_ROOT; ?>/admin/user"><span><i class="fa fa-users icon"></i></span>Quản lý người dùng</a></li>
                    <li class="menu"><a href="<?php echo _WEB_ROOT; ?>/admin/product"><span><i class="fa fa-paypal icon" aria-hidden="true"></i>
                    </span>Quản lý sản phẩm</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>