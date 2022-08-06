<?php

    class Cart extends Controller {
        public $orderModel;
        public $modelProduct;
        public $data = [];

        public function __construct() {
            $this->modelProduct = $this->model('ProductModel');
            $this->orderModel = $this->model('OrderModel');
        }

        public function index() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['product_id'])) {
                $product_id = $data['product_id'];
                $product = $this->modelProduct->getProductByIdC($product_id);
                if(empty($_SESSION['cart']) || !array_key_exists($product_id, $_SESSION['cart'])) {
                    $product[0]['qtyBuy'] = 1;
                    $_SESSION['cart'][$product_id] = $product;
                }else {
                    $_SESSION['cart'][$product_id][0]['qtyBuy'] +=1;
                }
            }
            
            $this->data['subcontent']['cart'] = $_SESSION['cart'];
            $this->data['subcontent']['title'] = 'Giỏ hàng'; 
            $this->data['content'] = 'cart/cart'; 
            $this->render('layouts/client_layout', $this->data);
        }
        public function removeProduct() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['product_id'])) {
                $product_id = $data['product_id'];
                $_SESSION['cart'][$product_id][0]['qtyBuy'] = 0;
                unset($_SESSION['cart'][$product_id]);
            }
            if(isset($_SESSION['cart'])) {
                $data_cart = $_SESSION['cart'];
                setcookie('data_cart', json_encode($data_cart), time() + 24 * 60 * 60, '/');
            }
        }

        public function updateQty() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($_SESSION['cart'])) {
                if(isset($data['product_id'])) {
                    $product_id = $data['product_id'];
                    if(isset($data['qty'])) {
                        $qty = $data['qty'];
                        if($qty == 0){
                            unset($_SESSION['cart'][$product_id]);
                            if(!empty($_SESSION['cart']))
                                echo 'notEmpty';
                            else {
                                echo 'isEmpty';
                            }
                        }else {
                            $_SESSION['cart'][$product_id][0]['qtyBuy'] = $qty;
                            $price = $_SESSION['cart'][$product_id][0]['price'] *
                            $_SESSION['cart'][$product_id][0]['qtyBuy'];
                            echo $price;
                        }
                    }
                }
            }
            if(isset($_SESSION['cart'])) {
                $data_cart = $_SESSION['cart'];
                setcookie('data_cart', json_encode($data_cart), time() + 24 * 60 * 60, '/');
            }
        }

        public function checkout() {
            $this->data['content'] = 'cart/checkout';
            $this->data['subcontent']['title'] = 'Thanh toán'; 
            $this->render('layouts/checkout_layout', $this->data);
        }

        public function addCus() {
            $req = new Request();
            $data = $req->getFields();
            if($data['fullname']!="" && $data['address']!="" && 
            $data['phone_number']!="" && $data['email']!="") {
                $fullname = $data['fullname'];
                $address = $data['address'];
                $phone_number = $data['phone_number'];
                $email = $data['email'];
                $order_date = date('Y-m-d H:i:s');
                if(empty($_SESSION['user'])) {
                    $password = md5(123456);
                    $role_id = 3;
                    $username = null;
                    $this->model('UserModel')->addUser($username, $fullname, $email, $phone_number,$address, $password, $role_id);
                    $get_customer = $this->model('UserModel')->getLastUser();
                    $user_id = $get_customer[0]['MAX(id)'];
                    $this->orderModel->saveOrder($user_id,$fullname,$email,$phone_number,$address,$order_date);
                } else {
                    $user_id = $_SESSION['user'][0]['id'];
                    $this->orderModel->saveOrder($user_id,$fullname,$email,$phone_number,$address,$order_date);
                }
            }
        }
        public function saveOrder() {
            $req = new Request();
            $data = $req->getFields();
            if($data['fullname'] != "" && $data['address'] != "" && 
            $data['phone_number'] != "" && $data['email'] != "") {
                $fullname = $data['fullname'];
                $address = $data['address'];
                $get_order = $this->orderModel->get_order();
                $order_id = $get_order[0]['MAX(id)'];
                $phone_number = $data['phone_number'];
                if(!empty($_SESSION['cart'])) {
                    $carts = $_SESSION['cart'];
                    foreach($carts as $cart) {
                        $product_id = $cart[0]['id'];
                        $price = $cart[0]['price'];
                        $qty = $cart[0]['qtyBuy'];
                    $this->orderModel->saveOrderDetail($order_id,$product_id,$price,$qty);
                    $this->modelProduct->updateProductSold($product_id,$qty);
                    }
                    $get_order_detail = $this->orderModel->get_orderDetail($order_id);
                    setcookie('data_cart','',time() - 24 * 60 * 60, '/');
                    unset($_SESSION['cart']);
                    echo    '<div class="wrapper">
                                <div class="modal_account js-modal-login open">
                                    <div class="modal_content" style="width: 120rem; left:10%;">
                                        <p class="modal-htext">Thông tin hóa đơn</p>
                                        <div class="modal_header"></div>
                                        <div class="modal_body">
                                            <div class="checkout-modal">
                                                <table class="cusInfo">
                                                    <tr>
                                                        <td class="text-bold">Mã hóa đơn:</td>
                                                        <td>'.$order_id.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold">Tên khách hàng:</td>
                                                        <td>'.$fullname.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold">Số điện thoại:</td>
                                                        <td>'.$phone_number.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold">Địa chỉ:</td>
                                                        <td>'.$address.'</td>
                                                    </tr>
                                                </table>
                                                <table class="cartInfo">
                                                    <tr>
                                                        <th class="name text-bold">Tên sản phẩm</th>
                                                        <th class="qty text-bold">Số lượng</th>
                                                        <th class="text-bold">Đơn giá</th>
                                                    </tr>';
                                                    $sum = 0;
                                                    foreach($get_order_detail as $value) {
                                                        $total_price = $value['quantity'] * $value['price'];
                                                        echo '<tr>
                                                        <td class="name">'.$value['name'].'</td>
                                                        <td class="qty">'.$value['quantity'].'</td>
                                                        <td class="price">'.number_format($value['price'],0," ",".").' VND</td>
                                                        </tr>';
                                                        $sum +=  $total_price;
                                                    };
                                                    echo'
                                                    <tr>
                                                        <td colspan="2" class="text-bold" style="text-align: left;">
                                                        Tổng thành tiền</td>
                                                        <td class="price">'.number_format($sum,0," ",".").' VND</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="btn" >
                                                <button class="js-close-login" id="btn-close"><a href="'._WEB_ROOT.'/home">Đồng ý!</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                }
            }
        }
    }
?>