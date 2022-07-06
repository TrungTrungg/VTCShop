<?php   
    $productName = $this->data['subcontent']['productDetail'][0]['name'];
    $productId = $this->data['subcontent']['productDetail'][0]['id'];
    if (isset($this->data['subcontent']['productDetail'][0]['price']))
        $productPrice = 
        number_format($this->data['subcontent']['productDetail'][0]['price'],0," ",".");
    else $productPrice = ' ';
        $cateName = 
        $this->data['subcontent']['productDetail'][0]['catename'];
?>

<div class="wrapper">
    <div class="detail_content">
        <div class="detail_header"></div>
        <div class="detail_body">
            <div class="detail_img">
                <div class="slideshow-container">
                    <?php foreach($this->data['subcontent']['productDetail'] as $productItem): ?>
                        <?php for($i = 1 ; $i <=4 ; $i++): ?>
                        <div class="mySlides fadee">
                            <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $productItem['name'] ?>/<?php echo $i; ?>.png">
                        </div>
                        <?php endfor; ?>
                    <?php endforeach; ?>
                </div>
                <br />
                <div class="img_slide">
                    <?php for($i = 1 ; $i <=4 ; $i++):
                        $fileIMG = "./public/assets/styles/IMG/products/".$productName."/".$i.".png";
                        if(file_exists($fileIMG)): ?>
                            <img class="dot" onclick="currentSlide(<?php echo $i; ?>)" 
                                    src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $productItem['name'] ?>/<?php echo $i; ?>.png" />
                        <?php  else: break; endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="detail_info">
                <p class="detail_info_name"><?php echo $productName; ?></p>
                <ul>
                    <p class="detail_info_title main_title">Thông tin chung:</p>
                    <li>
                        <p class="detail_info_title">Hãng:
                            <a href="<?php echo _WEB_ROOT; ?>/category?category=<?php echo  $cateName; ?>">
                                <span><?php echo $cateName; ?></span>
                            </a>
                        </p>
                    </li>
                    <li><p class="detail_info_title">Bảo hành:</p><span>12 tháng</span></li>
                    <li><p class="detail_info_title">Tình trạng:</p><span>Mới</span></li>
                </ul>
                <p class="detail_info_price">Giá sản phẩm: <span><?php echo $productPrice; ?> VND</span></p>
                
                    <a href="<?php echo _WEB_ROOT; ?>/cart" id="btn-submit"><button class="btn-buy">Đặt hàng</button></a>
                
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
                data:{product_id:<?php echo $productId; ?>}
            });
        });
    });
</script>