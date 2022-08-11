<?php
    $orderList = $this->data['subcontent']['order'];
    $pageTotal = $this->data['subcontent']['pageTotal'];
?>

<div class="wrapper">
    <div class="dashboard_content">
        <div class="dashboard_content_breadcrumb">
            <p class="breadcrumb-text">DANH SÁCH ĐƠN HÀNG</p>
            <ul class="breadcrumb-link">
                <li>
                    <a href="<?php echo _WEB_ROOT; ?>/admin/home">Trang chủ</a>
                </li>
                <li>
                    <a >Danh sách đơn hàng</a>
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
                        <th class="c2">Mã đơn hàng</th>
                        <th class="c3">Họ tên</th>
                        <th class="c4">Tổng số sản phẩm</th>
                        <th class="c5">Tổng số tiền</th>
                        <th class="c6">Thời gian mua hàng</th>
                    </tr>
                </thead>
                <tbody class="table-scroll">
                    <?php $num = 1; foreach($orderList as $order): ?>
                        
                    <tr>
                        <td class="c1"><?php echo $num; ?></td>
                        <td class="c2"><?php echo $order['id']; ?></td>
                        <td class="c3"><?php echo $order['fullname']; ?></td>
                        <td class="c4"><?php echo $order['totalQty']; ?></td>
                        <td class="c5"><?php echo number_format($order['totalPrice'],0,' ','.'); ?> VND</td>
                        <td class="c6"><?php echo $order['order_date']; ?></td>
                        <td class="c6"><?php echo $order['order_date']; ?></td>
                        <td class="c7 btn-view">
                            <a href="<?php echo _WEB_ROOT; ?>/admin/order/detail?order_id=<?php echo $order['id']; ?>">Xem</a></td>
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
        </div>
    </div>
</div>

<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/pagination.js"></script>

<script>
    $(document).ready(function() {
        <?php for($i = 1; $i <= $pageTotal; $i++): ?>
        $('#page-<?php echo $i; ?>').click(function() {
            var pageNumber = <?php echo $i; ?>;
            $.ajax({
                url: '<?php echo _WEB_ROOT; ?>/admin/order/pagination',
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
                url: "<?php echo _WEB_ROOT; ?>/admin/order/findOrder",
                method: "GET",
                data: {keyword:keyword},
                success: function(data) {
                    $("#dataPage").html(data);
                }
            });
        });
    });
</script>