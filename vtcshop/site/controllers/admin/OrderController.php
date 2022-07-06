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
                    </tr>';
                    $numm +=1;
                }
            }
        }
    }

?>