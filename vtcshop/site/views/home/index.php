<?php
    $brand_data = $this->data['subcontent']['brand_data'];
    $laptop_data = $this->data['subcontent']['laptop_data'];
    $pc_data = $this->data['subcontent']['pc_data'];
    $keyboard_data = $this->data['subcontent']['keyboard_data'];
    $mouse_data = $this->data['subcontent']['mouse_data'];
?>


<div class="wrapper">
    <div class="content">
        <section id="brand" class="brand_main">
            <div class="brand_header">
                <p class="text">Thương hiệu sản phẩm</p class="text">
            </div>
            <div class="brand_body">
                <div class="brand_item">
                    <?php foreach($brand_data as $brand_item):  ?>
                        <div class="brand_img">
                            <a href="<?php echo _WEB_ROOT; ?>/category?category=<?php echo  $brand_item['name']; ?>">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/Brands/<?php echo $brand_item['name']; ?>.png" 
                                    alt="<?php echo $brand_item['name']; ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="laptop" class="outstanding_laptop">
            <div class="outslaptop_header">
                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/banner-laptop.png" alt="bannerLaptop">
            </div>
            <div class="outslaptop_body">
                <?php foreach($laptop_data as $laptop_item): ?>
                    <a class="outslaptop_item" href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $laptop_item['name']; ?>">
                        <div class="laptop_img">
                            <img class="outslaptop_img <?php echo $laptop_item['is_trend'] == 1 ? 'img' : false; ?>" 
                                    src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $laptop_item['name'] ?>.png" 
                                        alt="<?php echo $laptop_item['name'] ?>" />
                                        </div>
                                        <h2 class="outslaptop_text"><?php echo $laptop_item['name'] ?></h2>
                                        <p class="outslaptop_price"><?php echo number_format($laptop_item['price'],0," ","."); ?> VND</p>
                    </a>
                <?php endforeach; ?>
        </section>
        
        <section id="pc" class="PC_main">
            <div class="PC_header">
                <p class="text">TOP PC bán chạy</p>
            </div>
            <div class="PC_body">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php for($i = 0; $i < 8; $i++): 
                            $pc_item = $pc_data[$i]; ?>
                            <div class="swiper-slide">
                                <a href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $pc_item['name']; ?>">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $pc_item['name']; ?>.png" 
                                            alt="<?php echo $pc_item['name']; ?>">
                                    <h2 class="outslaptop_text"><?php echo $pc_item['name']; ?></h2>
                                    <p class="outslaptop_price"><?php echo number_format($pc_item['price'],0," ","."); ?> VND</p>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="keyboard" >
            <div class="product_main">
                <div class="product_header">
                    <p class="text">Bàn phím giá rẻ</p>
                </div>
                <div class="product_body">
                    <?php for($i = 0 ; $i < 5 ; $i++):
                            $keyboard_item = $keyboard_data[$i] ?>
                        <div class="product_item">
                            <a href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $keyboard_item['name']; ?>">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $keyboard_item['name']; ?>.png" 
                                        alt="<?php echo $keyboard_item['name']; ?>" />
                                <h2 class="product_text_lg"><?php echo $keyboard_item['name']; ?></h2>
                                <p class="product_price"><?php echo number_format($keyboard_item['price'],0," ","."); ?> VND</p>
                            </a>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>

        <section id="mouse" >
            <div class="product_main">
                <div class="product_header">
                    <p class="text">Chuột giá rẻ</p>
                </div>
                <div class="product_body">
                    <?php for($i = 0 ; $i < 5 ; $i++):
                            $mouse_item = $mouse_data[$i] ?>
                        <div class="product_item">
                            <a href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $mouse_item['name']; ?>">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $mouse_item['name']; ?>.png" 
                                        alt="<?php echo $mouse_item['name']; ?>" />
                                <h2 class="product_text_lg"><?php echo $mouse_item['name']; ?></h2>
                                <p class="product_price"><?php echo number_format($mouse_item['price'],0," ","."); ?> VND</p>
                            </a>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/swiperPC.js"></script>
