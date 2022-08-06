<?php 
    $product_detail = $this->data['subcontent']['product_detail'];
    $product_name = $product_detail[0]['name'];
    $product_id = $product_detail[0]['id'];
    if (isset($product_detail[0]['price']))
        $product_price = 
        number_format($product_detail[0]['price'],0," ",".");
    else $product_price = ' ';
        $cate_name = 
        $product_detail[0]['cate_name'];
?>

<div class="wrapper">
    <div class="detail_content">
        <div class="detail_header"></div>
        <div class="detail_body">
            <div class="detail_img">
                <div class="slideshow-container">
                    <?php foreach($product_detail as $product_item): ?>
                        <?php for($i = 1 ; $i <=4 ; $i++): ?>
                        <div class="mySlides fadee">
                            <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $product_item['name'] ?>/<?php echo $i; ?>.png">
                        </div>
                        <?php endfor; ?>
                    <?php endforeach; ?>
                </div>
                <br />
                <div class="img_slide">
                    <?php for($i = 1 ; $i <=4 ; $i++):
                        $fileIMG = "./public/assets/styles/IMG/products/".$product_name."/".$i.".png";
                        if(file_exists($fileIMG)): ?>
                            <img class="dot" onclick="currentSlide(<?php echo $i; ?>)" 
                                    src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $product_item['name'] ?>/<?php echo $i; ?>.png" />
                        <?php  else: break; endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="detail_info">
                <p class="detail_info_name"><?php echo $product_name; ?></p>
                <ul>
                    <p class="detail_info_title main_title">Thông tin chung:</p>
                    <li>
                        <p class="detail_info_title">Hãng:
                            <a href="<?php echo _WEB_ROOT; ?>/category?category=<?php echo  $cate_name; ?>">
                                <span><?php echo $cate_name; ?></span>
                            </a>
                        </p>
                    </li>
                    <li><p class="detail_info_title">Bảo hành:</p><span>12 tháng</span></li>
                    <li><p class="detail_info_title">Tình trạng:</p><span>Mới</span></li>
                </ul>
                <p class="detail_info_price">Giá sản phẩm: <span><?php echo $product_price; ?> VND</span></p>
                
                    <a id="btn-submit"><button class="btn-buy">Đặt hàng</button></a>
                
            </div>
        </div>
    </div>
</div>

<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/swiperGalery.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-submit").click(function() {
            $.ajax({
                url:"<?php echo _WEB_ROOT; ?>/cart",
                method: "GET",
                data:{product_id:<?php echo $product_id; ?>}
                
            });
            window.setTimeout(function() {
                window.location.href = '<?php echo _WEB_ROOT; ?>/cart';
            }, 500);

        });

    });
</script>