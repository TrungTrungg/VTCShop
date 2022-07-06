<div class="wrapper">
    <div class="content">
        <section id="brand" class="brand_main">
            <div class="brand_header">
                <p class="text">Thương hiệu sản phẩm</p class="text">
            </div>
            <div class="brand_body">
                <div class="brand_item">
                    <?php foreach($this->data['subcontent']['brandData'] as $brandItem):  ?>
                        <div class="brand_img">
                            <a href="<?php echo _WEB_ROOT; ?>/category?category=<?php echo  $brandItem['name']; ?>">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/Brands/<?php echo $brandItem['name']; ?>.png" 
                                    alt="<?php echo $brandItem['name']; ?>">
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
                <?php foreach($this->data['subcontent']['laptopData'] as $laptopItem): ?>
                    <a class="outslaptop_item" href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $laptopItem['name']; ?>">
                        <div class="laptop_img">
                            <img class="outslaptop_img <?php echo $laptopItem['is_trend'] == 1 ? 'img' : false; ?>" 
                                    src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $laptopItem['name'] ?>.png" 
                                        alt="<?php echo $laptopItem['name'] ?>" />
                                        </div>
                                        <h2 class="outslaptop_text"><?php echo $laptopItem['name'] ?></h2>
                                        <p class="outslaptop_price"><?php echo number_format($laptopItem['price'],0," ","."); ?> VND</p>
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
                            $pcItem = $this->data['subcontent']['pcData'][$i]; ?>
                            <div class="swiper-slide">
                                <a href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $pcItem['name']; ?>">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $pcItem['name']; ?>.png" 
                                            alt="<?php echo $pcItem['name']; ?>">
                                    <h2 class="outslaptop_text"><?php echo $pcItem['name']; ?></h2>
                                    <p class="outslaptop_price"><?php echo number_format($pcItem['price'],0," ","."); ?> VND</p>
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
                            $keyboardItem = $this->data['subcontent']['keyboardData'][$i] ?>
                        <div class="product_item">
                            <a href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $keyboardItem['name']; ?>">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $keyboardItem['name']; ?>.png" 
                                        alt="<?php echo $keyboardItem['name']; ?>" />
                                <h2 class="product_text_lg"><?php echo $keyboardItem['name']; ?></h2>
                                <p class="product_price"><?php echo number_format($keyboardItem['price'],0," ","."); ?> VND</p>
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
                            $mouseItem = $this->data['subcontent']['mouseData'][$i] ?>
                        <div class="product_item">
                            <a href="<?php echo _WEB_ROOT; ?>/detail?name=<?php echo $mouseItem['name']; ?>">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/styles/IMG/products/<?php echo $mouseItem['name']; ?>.png" 
                                        alt="<?php echo $mouseItem['name']; ?>" />
                                <h2 class="product_text_lg"><?php echo $mouseItem['name']; ?></h2>
                                <p class="product_price"><?php echo number_format($mouseItem['price'],0," ","."); ?> VND</p>
                            </a>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/swiperPC.js"></script>
