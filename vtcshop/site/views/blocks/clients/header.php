<div class="header">
    <div class="wrapper">
        <div class="header_content">
            <div class="header_content_logo">
                <a href="<?php echo _WEB_ROOT; ?>/home">
                    <p>VTC</p>
                </a>
            </div>
            <div class="header_content_search">
                <form class="header_content_search" action="<?php echo _WEB_ROOT; ?>/category" method="GET">
                    <input type="text" id="search" value ="" name="nameSearch" class="search_inputField" placeholder="Bạn tìm gì..." />
                    <div class="search_suggestions" id="search_suggestions">
                    </div>
                    <button class="search_button" type="submit">
                        <i class="fas fa-search search_icon"></i>
                        <span>Tìm kiếm</span>
                    </button>
                </form>
            </div>
            <div class="header_content_account">
                <i class="fa fa-user account_icon"></i>
                <span> <?php echo isset($_SESSION['user'])? $_SESSION['user'][0]['fullname'] : 'Đăng nhập / Đăng ký <br /> Tài khoản <i class="fas fa-caret-down"></i>' ; ?>
                    
                </span>
                <div class="btn_item">
                    <?php
                    if(isset($_SESSION['user'])): ?>
                        <a href="<?php echo _WEB_ROOT; ?>/user/logout" class="btn_logout js-login">Đăng xuất</a>
                    <?php else:?>
                            <a href="<?php echo _WEB_ROOT; ?>/user/login" class="btn_login js-login">Đăng nhập</a>
                            <a href="<?php echo _WEB_ROOT; ?>/user/regist" class="btn_regist js-regist">Tạo tài khoản</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="header_content_cart">
                <a href="<?php echo _WEB_ROOT; ?>/cart">
                    <div class="cart_button">
                        <i class="fas fa-shopping-cart cart_icon"></i>
                        <span>Giỏ hàng</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="header_nav">
            <div class="nav">
                <div class="nav_left">
                    <ul>
                        <li class="nav_main_menu">
                            <label for="danhmuc"><i class="fas fa-bars nav_icon"></i> Danh mục sản phẩm</label>
                            <ul class="nav_submenu">
                                <?php foreach ($subcontent['client_menu'] as $key => $submenu): ?>
                                    <?php if($submenu['parent_id'] == 0): ?>
                                        <li class="nav_menu">
                                            <i class="<?php echo $submenu['icon']; ?> nav_subicon"></i> <?php echo $submenu['name']; ?>
                                            <?php unset($submenu[$key]) ?>
                                            <?php $largemenu_parentID = $submenu['id']; ?>
                                            <ul class="large_menu">
                                            <?php foreach ($subcontent['client_menu'] as $key => $largemenu): ?>
                                            <?php if($largemenu['parent_id'] == $largemenu_parentID): ?>
                                                <li class="nav_largemenu">
                                                    <p class="text"><?php echo $largemenu['name']; ?></p>
                                                    <?php unset($largemenu[$key]) ?>
                                                    <?php $largesubmenu_parentID = $largemenu['id']; ?>
                                                    <ul class="large_submenu">
                                                    <?php foreach ($subcontent['client_menu'] as $key => $largesubmenu): ?>
                                                        <?php if($largesubmenu['parent_id'] == $largesubmenu_parentID): ?>
                                                            <li>
                                                                <a href="<?php echo _WEB_ROOT; ?>/category?<?php echo $largesubmenu['conditions']; ?>&catename=<?php echo $largesubmenu['name']; ?>">
                                                                            <?php echo $largesubmenu['name']; ?>
                                                            </a>
                                                        </li>
                                                            <?php endif; ?>
                                                            <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                            </ul>
                                        </li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php echo isset($this->data['subcontent']['navright'])?$this->data['subcontent']['navright']:false; ?>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/modalAccount.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search').keyup(function() {
            var keyword = $('#search').val();
            $.ajax({
                url: '<?php echo _WEB_ROOT; ?>/category/searchProductItem',
                method: 'GET',
                data: {keyword:keyword},
                success: function(data) {
                    if(keyword != "" && keyword != " ") {
                        $('#search_suggestions').html(data);
                    }else {
                        $('#search_suggestions').html('');
                    }
                }
            })
        })
    })
</script>
