<?php 
    $brands = $this->data['subcontent']['brand'];
    $cats = $this->data['subcontent']['cat'];
?>

<div class="modalSuccess"></div>
<div class="wrapper">
    <div class="dashboard_content">
        <div class="dashboard_content_breadcrumb">
            <p class="breadcrumb-text">THÊM SẢN PHẨM</p>
            <ul class="breadcrumb-link">
                <li><a href="<?php echo _WEB_ROOT; ?>/admin/home">Trang chủ</a></li>
                <li><a href="<?php echo _WEB_ROOT; ?>/admin/product">Danh sách sản phẩm</a></li>
                <li><a href="">Thêm sản phẩm</a></li>
            </ul>
        </div>
        <div class="dashboard_content_body">
            <div class="body-left">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" placeholder="Nhập tên sản phẩm">
                <div id="errorname" class="error-text"></div>

                <label for="price">Giá:</label>
                <input type="number" id="price" placeholder="Nhập giá sản phẩm">
                <div id="errorprice" class="error-text"></div>

                <label for="qty">Số lượng:</label>
                <input type="number" id="qty" placeholder="Nhập số lượng sản phẩm">
                <div id="errorqty" class="error-text"></div>
            </div>
            <div class="body-right">
                <label for="category">Danh mục:</label>
                <select name="" id="category">
                    <option value="" hidden>Chọn danh mục:</option>
                    <?php  foreach($cats as $cat): ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name'];?></option>
                    <?php  endforeach; ?>
                </select>

                <label for="brand">Hãng:</label>
                <select name="" id="brand">
                    <option value="" hidden>Chọn hãng:</option>
                    <?php  foreach($brands as $brand): ?>
                    <option value="<?php echo $brand['id']; ?>"><?php echo $brand['name'];?></option>
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
            let name = $('#name').val();
            let price = $('#price').val();
            let qty = $('#qty').val();
            let category = $('#category').val();
            let brand = $('#brand').val();
            $.ajax({
                url: '<?php echo _WEB_ROOT; ?>/admin/product/processAddProduct',
                method: 'POST',
                data: {name:name,price:price,qty:qty,category:category,brand:brand},
                success: function(data) {
                    $('.modalSuccess').html(data);
                    $('#name').val("");
                    $('#price').val("");
                    $('#qty').val("");
                    $('#category').val("");
                    $('#brand').val("");
                }
            });
        });
    });
</script>
