<?php
    class Product extends Controller {
        public $data = [];
        public $productModel;
        public $categoryModel;
        public function __construct() {
            $this->productModel = $this->model('ProductModel');
            $this->categoryModel = $this->model('CategoryModel');
        }

        public function index() {
            $this->data['content'] = 'product/list';
            $this->data['subcontent']['title'] = 'Danh sách sản phẩm';
            $from = 0;
            $num = 8;
            $this->data['subcontent']['product'] = $this->productModel->getProductPerPage($from,$num);
            $allProduct = $this->productModel->getAllProduct();
            $productCount = count($allProduct);
            $this->data['subcontent']['pageTotal'] = ceil($productCount / 8);
            $this->render('layouts/admin_layout', $this->data);
        }
        public function pagination() {
            if(isset($_GET['pageNumber'])) {
                $pageNumber = $_GET['pageNumber'];
                $num = 8;
                $from = ($pageNumber - 1) * $num;
                $pageResult = $this->productModel->getProductPerPage($from,$num);
                $numm = ($num * $pageNumber) - 7;
                echo '<table class="dashboard_content_table">
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
                <tbody class="table-scroll">';
                foreach($pageResult as $product) {
                echo '<tr>
                <td class="c1">'.$numm.'</td>
                <td class="c8">'.$product['name'].'</td>
                <td class="c2">'.number_format($product['price'],0,'','.').' VND</td>
                <td class="c1">'.$product['quantity'].'</td>
                <td class="c1">'.$product['sold'].'</td>
                <td class="c6">'.$product['brand'].'</td>
                <td class="c7 btn-delete" id="btn-open-modal-'.$product['id'].'">Xóa</td>
                <td class="c7 btn-edit" id="btn-edit-'.$product['id'].'"><a href="'._WEB_ROOT.'/admin/product/editProduct?id='.$product['id'].'">Sửa</a></td>
                </tr>';
                    $numm +=1;
                }
                echo '</tbody>
                    </table>';
                foreach($pageResult as $product){
                    echo '<div class="modalSuccess">
                    <div class="modalS modalD-'.$product['id'].'">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Xác nhận xóa sản phẩm này!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-close" id="btn-close-'.$product['id'].'">Hủy</div>
                                <div class="btn-delete" id="btn-delete-'.$product['id'].'"><a href="'._WEB_ROOT.'/admin/product">Xác nhận</a></div>
                            </div>
                        </div>
                    </div>
                </div>';
                    }
                echo '<script type="text/javascript">
                $(document).ready(function() {';
                    
                    foreach($pageResult as $product){
                echo  'const modal'.$product['id'].' = document.querySelector(".modalD-'.$product['id'].'");
                $("#btn-open-modal-'.$product['id'].'").click(function() {
                    modal'.$product['id'].'.classList.add("open");
                });
                $("#btn-close-'.$product['id'].'").click(function() {
                    modal'.$product['id'].'.classList.remove("open");
                });
                $("#btn-delete-'.$product['id'].'").click(function() {
                    let id = '.$product['id'].';
                    $.ajax({
                        url: "'._WEB_ROOT.'/admin/product/deleteProduct",
                        method: "GET",
                        data: {id:id}
                    });
                });';
                    }
                echo '});
                    </script>';
            }
        }

        public function addProduct() {
            unset($_SESSION['editProduct']);
            $this->data['content'] = 'product/addProduct';
            $this->data['subcontent']['title'] = 'Thêm sản phẩm';
            $this->data['subcontent']['brand'] = $this->productModel->getProductBrand();
            $this->data['subcontent']['cat'] = $this->productModel->getProductCat();
            $this->render('layouts/admin_layout', $this->data);
        }
        public function processAddProduct() {
            if($_POST['name'] != "" && $_POST['price'] != "" && $_POST['qty'] != "") {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $cat1 = $_POST['brand'];
                $cat2 = $_POST['category'];
                $checkProduct = $this->productModel->checkProduct($name);
                if($checkProduct == null) {
                $this->productModel->addProduct($name,$price,$qty);
                $getProduct = $this->productModel->getLastProduct();
                $product_id = $getProduct[0]['MAX(id)'];
                $this->categoryModel->addProductCategories($product_id, $cat1);
                $this->categoryModel->addProductCategories($product_id, $cat2);
                echo '<div class="modalP open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Thêm sản phẩm thành công!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/product">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-closeP">Tiếp tục thêm</div>
                            </div>
                        </div>
                    </div>';
                echo '<script src="'._WEB_ROOT.'/public/assets/JS/modalSuccess.js"></script>';
            }
            else {
                echo '<div class="modalP open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Thêm sản phẩm thất bại!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/product">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-closeP">Tiếp tục thêm</div>
                            </div>
                        </div>
                    </div>';
                echo '<script src="'._WEB_ROOT.'/public/assets/JS/modalSuccess.js"></script>';
            }
        }else {
            echo '<div class="modalP open">
                    <div class="modal_content">
                        <div class="modal_content_header">Thêm thất bại</div>
                        <div class="modal_content_body">
                            <p>Sản phẩm này đã tồn tại!</p>
                        </div>
                        <div class="modal_content_footer">
                            <div class="btn-list"><a href="'._WEB_ROOT.'/admin/product">Xem danh sách</a></div>
                            <div class="btn-close" id="btn-closeP">Tiếp tục thêm</div>
                        </div>
                    </div>
                </div>';
            echo '<script src="'._WEB_ROOT.'/public/assets/JS/modalSuccess.js"></script>';
        }
        
        }

        public function deleteProduct() {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->productModel->deleteProduct($id);
            }
        }

        public function findProduct() {
            if(isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $dataSearch = $this->productModel->findProduct($keyword);
                $numm = 1;
                echo '<table class="dashboard_content_table">
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
                <tbody class="table-scroll">';
                foreach($dataSearch as $product) {
                echo '<tr>
                <td class="c1">'.$numm.'</td>
                <td class="c8">'.$product['name'].'</td>
                <td class="c2">'.number_format($product['price'],0,'','.').' VND</td>
                <td class="c1">'.$product['quantity'].'</td>
                <td class="c1">'.$product['sold'].'</td>
                <td class="c6">'.$product['brand'].'</td>
                <td class="c7 btn-delete" id="btn-open-modal-'.$product['id'].'">Xóa</td>
                <td class="c7 btn-edit" id="btn-edit-'.$product['id'].'"><a href="'._WEB_ROOT.'/admin/product/editProduct?id='.$product['id'].'">Sửa</a></td>
                </tr>';
                    $numm +=1;
                }
                echo '</tbody>
                    </table>';
                foreach($dataSearch as $product){
                    echo '<div class="modalSuccess">
                    <div class="modalS modalD-'.$product['id'].'">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Xác nhận xóa sản phẩm này!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-close" id="btn-close-'.$product['id'].'">Hủy</div>
                                <div class="btn-delete" id="btn-delete-'.$product['id'].'"><a href="'._WEB_ROOT.'/admin/product">Xác nhận</a></div>
                            </div>
                        </div>
                    </div>
                </div>';
                    }
                echo '<script type="text/javascript">
                $(document).ready(function() {';
                    
                    foreach($dataSearch as $product){
                echo  'const modal'.$product['id'].' = document.querySelector(".modalD-'.$product['id'].'");
                $("#btn-open-modal-'.$product['id'].'").click(function() {
                    modal'.$product['id'].'.classList.add("open");
                });
                $("#btn-close-'.$product['id'].'").click(function() {
                    modal'.$product['id'].'.classList.remove("open");
                });
                $("#btn-delete-'.$product['id'].'").click(function() {
                    let id = '.$product['id'].';
                    $.ajax({
                        url: "'._WEB_ROOT.'/admin/product/deleteProduct",
                        method: "GET",
                        data: {id:id}
                    });
                });';
                    }
                echo '});
                    </script>';
            }
        }
        public function checkProduct() {
            if(isset($_GET['name'])) {
                $name = $_GET['name'];
                if($name != "") {
                    if(empty($_SESSION['editProduct'])) {
                    $checkProduct = $this->productModel->checkProduct($name);
                    if($checkProduct != null) {
                        echo 'Đã tồn tại sản phẩm này!';
                    }
                    }else {
                        $nameS = $_SESSION['editProduct'][0]['name'];
                        if($name != $nameS) {
                            $checkProduct = $this->productModel->checkProduct($name);
                            if($checkProduct != null) {
                                echo 'Đã tồn tại sản phẩm này!';
                        }
                    }
                }
                }else {
                    echo 'Không được để trống tên sản phẩm!';
                }
            }
        }

        public function editProduct() {
            $request =  new Request();
            $data = $request->getFields();
            $this->data['content'] = 'product/editProduct';
            $this->data['subcontent']['title'] = 'Sửa thông tin sản phẩm';
            $this->data['subcontent']['brand'] = $this->productModel->getProductBrand();
            $this->data['subcontent']['cat'] = $this->productModel->getProductCat();
            if(isset($data['id'])) {
                $id = $data['id'];
                $product = $this->data['subcontent']['product'] = $this->productModel->getProductById($id);
                $_SESSION['editProduct'] = $product;
            }
            $this->render('layouts/admin_layout', $this->data);
        }

        public function processEditProduct() {
            if($_POST['name'] != "" && $_POST['price'] != "" && $_POST['qty'] != "" && $_POST['sold'] != "") {
                $product_id = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $sold = $_POST['sold'];
                $cat1 = $_POST['brand'];
                $cat2 = $_POST['category'];
                $this->productModel->editProduct($product_id,$name,$price,$qty,$sold);
                $this->categoryModel->deleteProductCat($product_id);
                $this->categoryModel->addProductCategories($product_id, $cat2);
                $this->categoryModel->addProductCategories($product_id, $cat1);
                echo '<div class="modalP open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Sửa sản phẩm thành công!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/product">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-closeP">Tiếp tục Sửa</div>
                            </div>
                        </div>
                    </div>';
                echo '<script src="'._WEB_ROOT.'/public/assets/JS/modalSuccess.js"></script>';
            }
            else {
                echo '<div class="modalP open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Sửa sản phẩm thất bại!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/product">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-closeP">Tiếp tục Sửa</div>
                            </div>
                        </div>
                    </div>';
                echo '<script src="'._WEB_ROOT.'/public/assets/JS/modalSuccess.js"></script>';
            }
        }
    }
?>