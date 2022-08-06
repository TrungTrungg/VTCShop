<?php 
    class OrderModel extends Model{
        public function __construct() {
            parent::__construct();
        }
        public function getAllOrder() {
            $query = "SELECT orders.*, SUM(order_details.price) as totalPrice, 
                                        SUM(order_details.quantity) as totalQty
                                        FROM orders, order_details 
                                        WHERE orders.id = order_details.order_id 
                                        GROUP BY orders.id";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOrderById($id) {
            $query = "SELECT orders.*, 
                            order_details.*, 
                            products.name FROM orders 
                                            JOIN order_details ON orders.id = order_details.order_id
                                            JOIN products ON order_details.product_id = products.id
                                            WHERE orders.id = '$id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function saveOrder($user_id,$fullname,$email,$phone_number,$address,$order_date) {
            $query ="INSERT INTO orders(user_id, fullname, email, phone_number, address, order_date) VALUES('$user_id','$fullname','$email','$phone_number','$address','$order_date')";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOrder(){
            $query = "SELECT MAX(id) FROM orders";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function saveOrderDetail($order_id,$product_id,$price,$quantity) {
            $query ="INSERT INTO order_details(order_id, product_id, price, quantity) 
                        VALUES('$order_id','$product_id','$price','$quantity')";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getOrderDetail($order_id) {
            $query ="SELECT order_details.*,products.name FROM order_details JOIN products    
                                            ON order_details.product_id = products.id
                                            WHERE order_id ='$order_id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOrderPerPage($from, $num) {
            $query = "SELECT orders.*, SUM(order_details.price) as totalPrice,
                                        SUM(order_details.quantity) as totalQty
                                        FROM orders, order_details
                                        WHERE orders.id = order_details.order_id
                                        GROUP BY orders.id
                                        ORDER BY orders.id DESC
                                        LIMIT $from, $num";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function findOrder($keyword) {
            $query = "SELECT orders.*, SUM(order_details.price) as totalPrice,
                                        SUM(order_details.quantity) as totalQty
                                        FROM orders, order_details
                                        WHERE orders.id LIKE '%$keyword%'
                                        GROUP BY orders.id
                                        ORDER BY orders.id DESC
                                        LIMIT 0, 8";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateStatus($status,$order_id) {
            $query = "UPDATE orders SET status = $status WHERE id = '$order_id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getStatus($order_id) {
            $query = "SELECT status FROM orders WHERE id = '$order_id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>