<?php 

    $brands = $this->data['subcontent']['brand'];
    $cats = $this->data['subcontent']['cat'];
    $product = $this->data['subcontent']['product'][0];
    $id = $product['id'];
    $name = $product['name'];
    $price = $product['price'];
    $qty = $product['quantity'];
    $sold = $product['sold'];
    $cate_id = $product['cat_id'];
    $brand_id = $this->data['subcontent']['product'][1]['cat_id'];
?>

<div class="modalSuccess"></div>
<div class="wrapper">
    <div class="dashboard_content">
        <div class="dashboard_content_breadcrumb">
            <p class="breadcrumb-text">SỬA THÔNG TIN SẢN PHẨM</p>
            <ul class="breadcrumb-link">
                <li>
                    <a href="<?php echo _WEB_ROOT; ?>/admin/home">Trang chủ</a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT; ?>/admin/product">Danh sách sản phẩm</a>
                </li>
                <li>
                    <a href="">Sửa thông tin sản phẩm</a>
                </li>
            </ul>
        </div>
        <div class="dashboard_content_body">
            <div class="body-left">
                <input type="hidden" id="id" value="<?php echo $id; ?>">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" placeholder="Nhập tên sản phẩm" value="<?php echo $name; ?>">
                <div id="errorname" class="error-text"></div>

                <label for="price">Giá:</label>
                <input type="number" id="price" placeholder="Nhập giá sản phẩm" value="<?php echo $price; ?>">
                <div id="errorprice" class="error-text"></div>

                <label for="qty">Số lượng:</label>
                <input type="number" id="qty" placeholder="Nhập số lượng sản phẩm" value="<?php echo $qty; ?>"> 
                <div id="errorqty" class="error-text"></div>

                <label for="sold">Đã bán:</label>
                <input type="number" id="sold" placeholder="Nhập số lượng đã bán" value="<?php echo $sold; ?>"> 
                <div id="errorsold" class="error-text"></div>
            </div>
            <div class="body-right">
                <label for="category">Danh mục:</label>
                <select name="" id="category">
                    <?php foreach($cats as $cat): ?>
                    <option value="<?php echo $cat['id'] ?>"
                    <?php echo $cat['id'] == $cate_id ? "selected" : false; ?>>
                    <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="brand">Hãng:</label>
                <select name="" id="brand">
                    <?php  foreach($brands as $value): ?>
                    <option value="<?php echo $value['id']; ?>" 
                    <?php echo $value['id'] == $brand_id ? "selected" : false; ?>>
                    <?php echo $value['name'];?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
        </div>
        <div class="footer">
            <div class="btn-save" id="btn-save">Lưu</div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#name').blur(function() {
            let name = $('#name').val();
            $.ajax({
                url: "<?php echo _WEB_ROOT;?>/admin/product/checkProduct",
                method: "GET",
                data: {name:name},
                success: function(data) {
                    $("#errorname").html(data);
                }
            });
        });
        $('#name').click(function() {
            $("#errorname").html("");
        });
        
        $('#price').blur(function() {
            let price = $('#price').val();
            if(price ==="")
            $("#errorprice").html("Không được để trống giá sản phẩm!");
            if(price < 0) {
            $("#errorprice").html("Giá không hợp lệ!");
            $('#price').val("");
            };
        });

        $('#sold').blur(function() {
            let sold = $('#sold').val();
            if(sold ==="")
            $("#errorsold").html("Không được để trống số lượng bán!");
            if(sold < 0) {
            $("#errorsold").html("Số lượng không hợp lệ!");
            $('#sold').val("");
            };
        });
        $('#sold').click(function() {
            $("#errorsold").html("");
        });

        $('#price').click(function() {
            $("#errorprice").html("");
        });

        $('#qty').blur(function() {
            let qty = $('#qty').val();
            if(qty ==="") 
            $("#errorqty").html("Không được để trống số lượng sản phẩm!");
            if(qty < 0) {
            $("#errorqty").html("Số lượng không hợp lệ!");
            $('#qty').val("");
            };
        });
        $('#qty').click(function() {
            $("#errorqty").html("");
        });

        $('#btn-save').click(function() {
            let id = $('#id').val();
            let name = $('#name').val();
            let price = $('#price').val();
            let qty = $('#qty').val();
            let sold = $('#sold').val();
            let category = $('#category').val();
            let brand = $('#brand').val();
            $.ajax({
                url: '<?php echo _WEB_ROOT; ?>/admin/product/processEditProduct',
                method: 'POST',
                data: {id:id,name:name,price:price,qty:qty,category:category,brand:brand,sold:sold},
                success: function(data) {
                    $('.modalSuccess').html(data);
                }
            });
        });
    });
</script>
