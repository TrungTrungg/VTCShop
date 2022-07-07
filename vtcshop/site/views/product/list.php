<?php 
    $products = $this->data['subcontent']['product'];
    $pageTotal = $this->data['subcontent']['pageTotal'];
?>

<body>
    <div class="wrapper">
        <div class="dashboard_content">
            <div class="dashboard_content_breadcrumb">
                <p class="breadcrumb-text">DANH SÁCH SẢN PHẨM</p>
                <ul class="breadcrumb-link">
                    <li>
                        <a href="<?php echo _WEB_ROOT; ?>/admin/home">Trang chủ</a>
                    </li>
                    <li>
                        <a href="">Danh sách sản phẩm</a>
                    </li>
                </ul>
            </div>
            <div class="search">
                <input type="text" placeholder="tìm..." id="search">
            </div>
            <div id="dataPage">
                <table class="dashboard_content_table">
                    <thead>
                        <tr>
                            <th class="c1">STT</th>
                            <th class="c8">Tên sản phẩm</th>
                            <th class="c2">Giá</th>
                            <th class="c1">Số Lượng</th>
                            <th class="c1">Đã bán</th>
                            <th class="c6">Hãng</th>
                            <th class="c7"></th>
                            <th class="c7"></th>
                        </tr>
                    </thead>
                    <tbody class="table-scroll">
                        <?php $num = 1; foreach($products as $product): ?>
                            <tr>
                                <td class="c1"><?php echo $num; ?></td>
                                <td class="c8"><?php echo $product['name']; ?></td>
                                <td class="c2"><?php echo number_format($product['price'],0,'','.'); ?> VND</td>
                                <td class="c1"><?php echo $product['quantity']; ?></td>
                                <td class="c1"><?php echo $product['sold']; ?></td>
                                <td class="c6"><?php echo $product['brand']; ?></td>
                                <td class="c7 btn-delete" id="btn-open-modal-<?php echo $product['id']; ?>">Xóa</td>
                                <td class="c7 btn-edit" id="btn-edit-<?php echo $product['id']; ?>"><a href="<?php echo _WEB_ROOT; ?>/admin/product/editProduct?id=<?php echo $product['id']; ?>">Sửa</a></td>
                            </tr>
                        <?php $num++; endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="cate_footer">
                <div class="pagination">
                    <div class="pagination-container">
                        <div class="pagination-hover-overlay"></div>
                        <a class="pagination-prev" id="prev">
                            <span class="icon-pagination icon-pagination-prev">
                                <i class="icon material-icons">
                                    keyboard_arrow_left
                                </i>
                            </span>
                        </a>
                        <?php for($i = 1; $i <= $pageTotal; $i++): ?>
                            <a class="pagination-page-number" id="page-<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endfor; ?>
                        <a class="pagination-next" id="next">
                            <span class="icon-pagination icon-pagination-next">
                                <i class="icon material-icons">
                                    keyboard_arrow_left
                                </i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="btn-add"><a href="<?php echo _WEB_ROOT; ?>/admin/product/addProduct">Thêm sản phẩm</a></div>
            </div>
        </div>
        <?php foreach($products as $product): ?>
            <div class="modalSuccess">
                <div class="modalD modalD-<?php echo $product['id'] ?>">
                    <div class="modal_content">
                        <div class="modal_content_header">Thông báo</div>
                        <div class="modal_content_body">
                            <p>Xác nhận xóa sản phẩm này!</p>
                        </div>
                        <div class="modal_content_footer">
                            <div class="btn-close" id="btn-close-<?php echo $product['id']; ?>">Hủy</div>
                            <div class="btn-delete" id="btn-delete-<?php echo $product['id']; ?>">Xác nhận</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/pagination.js"></script></div>

<script type="text/javascript">
    $(document).ready(function() {
        <?php foreach($products as $product): ?>
            const modal<?php echo $product['id'] ?> = document.querySelector('.modalD-<?php echo $product['id'] ?>');
            $('#btn-open-modal-<?php echo $product['id']; ?>').click(function() {
                modal<?php echo $product['id'] ?>.classList.add('open');
            });
            $('#btn-close-<?php echo $product['id']; ?>').click(function() {
                modal<?php echo $product['id'] ?>.classList.remove('open');
            });
            $('#btn-delete-<?php echo $product['id']; ?>').click(function() {
                let id = <?php echo $product['id']; ?>;
                $.ajax({
                    url: '<?php echo _WEB_ROOT; ?>/admin/product/deleteProduct',
                    method: 'GET',
                    data: {id:id}
                });
                window.location.reload();
            });
        <?php endforeach; ?>

        <?php for($i = 1; $i <= $pageTotal; $i++): ?>
            $('#page-<?php echo $i; ?>').click(function() {
                var pageNumber = <?php echo $i; ?>;
                $.ajax({
                    url: '<?php echo _WEB_ROOT; ?>/admin/product/pagination',
                    method: 'GET',
                    data: {pageNumber:pageNumber},
                    success: function(data) {
                        $('#dataPage').html(data);
                    }
                });
            });
        <?php endfor; ?>

        $("#search").keyup(function() {
            let keyword = $("#search").val();
            $.ajax({
                url: "<?php echo _WEB_ROOT; ?>/admin/product/findProduct",
                method: "GET",
                data: {keyword:keyword},
                success: function(data) {
                    $("#dataPage").html(data);
                }
            });
        });
    });
</script>
    