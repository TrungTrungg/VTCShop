<?php 
$request = new Request();
$data = $request->getFields();
if(isset($this->data['subcontent']['category']))
    $category = $this->data['subcontent']['category'];
if(isset($this->data['subcontent']['pageTotal']))
    $pageTotal = $this->data['subcontent']['pageTotal'];
if(isset($this->data['subcontent']['pageConditions']))
    $pageConditions =  $this->data['subcontent']['pageConditions'];
?>

<div class="wrapper">
    <div class="category_content">
        <div class="cate_header">
            <p>Danh mục sản phẩm <?php echo isset($data['category'])?strtoupper($data['category']) : false; ?>
            <?php echo isset($data['catename'])?': '.$data['catename'] : false; ?></p>
        </div>
        <div class="cate_body" id="cateItem">
            <?php if(isset($pageTotal)): ?>
                <?php $cateCount = 0; foreach($category as $cateItem): $cateCount++;?>
                    <div class="cate_item">
                        <div class="item_top">
                            <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $cateItem['name']; ?>.png" 
                            alt="<?php echo $cateItem['name']; ?>" />
                            <a href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $cateItem['name']; ?>">
                                    <div class="item_buy">
                                        <p class="text">Click để xem chi tiết</p>
                                        <div class="btn_buy">Đặt hàng</div>
                                    </div>
                            </a>
                        </div>
                        <div class="item_bottom">
                            <h2 class="product_text_lg"><?php echo $cateItem['name']; ?></h2>
                            <p class="product_price"><?php echo number_format($cateItem['price'],0," ","."); ?> VND</p">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if(!isset($pageTotal)): ?>
                <?php for($i = 1; $i <=4 ; $i++): ?>
                    <div class="cate_item">
                            <div class="item_top">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/khok<?php echo $i; ?>.jpg" alt="" />
                            </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
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
                <?php if(isset($pageTotal)): ?>
                    <?php for($i = 1; $i <= $pageTotal; $i++): ?>
                        <a class="pagination-page-number" id="page-<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>
                <?php endif; ?>
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
        <?php if($pageTotal != 0): ?>
            <?php for($i = 1; $i <= $pageTotal; $i++): ?>
            $('#page-<?php echo $i; ?>').click(function() {
                var pageNumber = <?php echo $i; ?>;
                var pageConditions = "<?php echo $pageConditions; ?>";
                $.ajax({
                    url:'<?php echo _WEB_ROOT; ?>/category/Pagination',
                    method: 'GET',
                    data: {pageNumber:pageNumber, pageConditions:pageConditions},
                    success: function(data){
                        $('#cateItem').html(data);
                    }
                });
            });
            <?php endfor; ?>
        <?php endif; ?>
    });
</script>
