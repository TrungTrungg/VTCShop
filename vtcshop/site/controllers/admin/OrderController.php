<?php
    class Order extends Controller{
        public $data = [];
        public $orderModel;

        public function __construct() {
            $this->orderModel = $this->model('OrderModel');
        }
        public function index() {
            $from = 0;
            $num = 8;
            $this->data['content'] = 'orders/list';
            $this->data['subcontent']['title'] = 'Danh sách đơn hàng';
            $this->data['subcontent']['order'] = $this->orderModel->getOrderPerPage($from,$num);
            $allOrder = $this->orderModel->getAllOrder();
            $orderCount = count($allOrder);
            $this->data['subcontent']['pageTotal'] = ceil($orderCount / 8);
            $this->render('layouts/admin_layout', $this->data);
        }

        public function detail() {
            if(isset($_GET['order_id'])) {
                $order_id = $_GET['order_id'];
                $data = $this->orderModel->getOrderById($order_id);
                $this->data['subcontent']['data'] = $data[0];
                $this->data['subcontent']['order_detail'] = $this->orderModel->getOrderDetail($order_id);
            }
            $this->data['content'] = 'orders/detail';
            $this->data['subcontent']['title'] = 'Chi tiết đơn hàng';
            $this->render('layouts/admin_layout', $this->data);
        }

        public function pagination() {
            if(isset($_GET['pageNumber'])) {
                $pageNumber = $_GET['pageNumber'];
                $num = 8;
                $from = ($pageNumber - 1) * $num;
                $pageResult = $this->orderModel->getOrderPerPage($from,$num);
                $numm = ($num * $pageNumber) - 7;
                foreach($pageResult as $order) {
                echo '<tr>
                    <td class="c1">'.$numm.'</td>
                    <td class="c2">'.$order['id'].'</td>
                    <td class="c3">'.$order['fullname'].'</td>
                    <td class="c4">'.$order['totalQty'].'</td>
                    <td class="c5">'.number_format($order['totalPrice'],0,' ','.').' VND</td>
                    <td class="c6">'.$order['order_date'].'</td>
                    <td class="c7 btn-edit">
                        <a href="'._WEB_ROOT.'/admin/order/detail?order_id='.$order['id'].'">Xem</a></td>
                    </tr>';
                    $numm +=1;
                }
            }
        }

        public function update_status() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['status']) && isset($data['order_id'])) {
                $status = $data['status'];
                $order_id = $data['order_id'];
                if($status == 0) {
                    $this->orderModel->updateStatus(1,$order_id);
                    echo '<div class="order-status fin" id="btn-edit">Đã hoàn thành</div>';
                }else {
                    $this->orderModel->updateStatus(0,$order_id);
                    echo '<div class="order-status" id="btn-edit">Chưa hoàn thành</div>';
                }

            }
        }
    }

?>